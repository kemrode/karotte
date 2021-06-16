<?php
namespace src\Controller;

use http\Exception\InvalidArgumentException;
use src\Model\BDD;
use src\Model\ProductModel;
use src\Model\SellerModel;
use src\Model\userModel;

Class ProfileController extends AbstractController{

    public function getValueExpected(){
        return [
            "SELL_ID" => "Contacter l'administrateur réseau",
            "SELL_NAME" => "Nom boutique",
            "SELL_PRES" => "présentation vendeur",
            "USER_ADDRESS" => "Adresse",
            "USER_ZIP_CODE" => "Code postal",
            "USER_CITY" => "Ville",
            "USER_PHONE" => "téléphone"];
    }
    function index(){
        header("location:/Profile/SellerProfileView".$_SESSION["USER_ID"]);
    }
    public function SellerProfileView($id){
        try {
            $id = ($id!="")?$id:$_SESSION["USER_ID"];
            if($id != $_SESSION["USER_ID"] || $id == ""){
                header("location:/Seller/GetSellerById".$id);
                exit;
            }
            $seller = SellerModel::GetSellerAndUserInformationFromId($id);
            $sellerList = SellerModel::GetAllSellers();
            $sellerProduct = ProductModel::GetAllProductAndTagGroupedByTagFromSellerId($id);
        }
        catch(\Exception $e){
            $_SESSION["alert"] = $e->getMessage();
            header("location:/");
            exit;
        }
        finally{
            return $this->twig->render("profile/ProfileSeller.html.twig",[
                "sellerInfo"=>$seller,
                "sellerList"=>$sellerList,
                "sellerProduct"=>$sellerProduct,
                "message"=> $this->getFlashMessage("message"),
                "alert"=> $this->getFlashMessage("alert")
            ]);
        }
    }
    public function CancelCurrentModification($id){
        $valueExpected = $this->getValueExpected();
        // Unsetting all stored variable from post
        foreach ($valueExpected as $field=>$error){
            unset($_SESSION[$field]);
        }
        header("location:/Profile/SellerProfileView/$id");
        exit;
    }
    public function UpdateSellerProfile($id){
        try {
            $user = new userModel();
            $seller = new SellerModel();
            $valueExpected = $this->getValueExpected();
            // Storing all $_POST variable into session to avoid rewriting them in the form in case of error
            foreach ($valueExpected as $field=>$error){
                $_SESSION[$field] = $_POST[$field];
            }

            // Treatment of posted variable, if empty throw an exception
            foreach ($valueExpected as $field=>$error){
                if($this->GetTreatedValueFromPostIfIsset($field) == null)
                    throw new \InvalidArgumentException("Veuillez renseigner le champs ".$error);
                if(property_exists($seller, $field))
                    $seller->{$field} = $this->GetTreatedValueFromPostIfIsset($field);
            }
            $user->setUserAdress($this->GetTreatedValueFromPostIfIsset("USER_ADDRESS"));
            $user->setUserCity($this->GetTreatedValueFromPostIfIsset("USER_CITY"));
            $user->setUserZipCode($this->GetTreatedValueFromPostIfIsset("USER_ZIP_CODE"));
            $user->setUserPhoneNumber($this->GetTreatedValueFromPostIfIsset("USER_PHONE"));
            // Update database
            $user->setUserId($seller->getSELLID());
            $user->updateMemberAddress(BDD::getInstance(),$seller->getSELLID());
            $seller->setSELLLOC($user::GetCoordinatesFromAdress($user->getUserAdress(), $user->getUserZipCode(), $user->getUserCity()));
            $seller->UpdateSellerInfo();
            // Unsetting all stored variable from post
            foreach ($valueExpected as $field=>$error){
                if(isset($_SESSION[$field]))
                    unset($_SESSION[$field]);
            }
            $_SESSION["message"] = "Profil mis à jour";
        }
        catch (\InvalidArgumentException $arg) {
            $_SESSION["alert"] = $arg->getMessage();
        }
        catch (\Exception $e) {
            $_SESSION["alert"] = "Une ereur s est produite : ".$e->getMessage();
        }
        finally {
            header("location:/Profile/SellerProfileView/$id");
            exit;
        }
    }
    //function to update user profile
    public function updateUser(){
        try {
            $memberId = $_GET['param'];
            $zipCodeStringyfying = strval($_POST['userZipCode']);
            $memberToUpdate = new userModel();
            $sellerToUpdate = new SellerModel();
            if(isset($_POST['okBtn'])){
                $memberToUpdate->setUserPseudo(htmlentities($_POST['userPseudo']));
                $memberToUpdate->setUserPasswd(password_hash(htmlentities($_POST['userPasswd']),PASSWORD_DEFAULT) );
                $memberToUpdate->setUserMail(htmlentities($_POST['userMail']));
                $memberToUpdate->setUserAdress(htmlentities($_POST['userAdress']));
                $memberToUpdate->setUserZipCode(htmlentities($zipCodeStringyfying));
                $memberToUpdate->setUserCity(htmlentities($_POST['userCity']));
                $memberToUpdate->setUserPhoneNumber(htmlentities($_POST['userPhone']));
                $memberToUpdate->updateMember(BDD::getInstance(), $memberId);

                $sellerToUpdate->setSELLLOC($memberToUpdate::GetCoordinatesFromAdress($memberToUpdate->getUserAdress(), $memberToUpdate->getUserZipCode(), $memberToUpdate->getUserCity()));
                $sellerToUpdate->setSELLID($memberId);
                $sellerToUpdate->UpdateSellerLocInfo();
                $view = new userController();
                echo $view->myAccount();
            }
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }
}