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
            "userAdress" => "Adresse",
            "userZipCode" => "Code postal",
            "userCity" => "Ville",
            "userPhoneNumber" => "téléphone"];

    }

    function index(){
        $sellerList = SellerModel::GetAllSellers();
        return $this->twig->render("profile/ProfileSeller.html.twig",["sellerList"=>$sellerList]);
    }

    public function SellerProfileView($id){
        $seller = SellerModel::GetSellerAndUserInformationFromId($id);
        $sellerList = SellerModel::GetAllSellers();
        $sellerProduct = ProductModel::GetAllProductAndTagGroupedByTagFromSellerId($id);
        return $this->twig->render("profile/ProfileSeller.html.twig",[
            "sellerInfo"=>$seller,
            "sellerList"=>$sellerList,
            "sellerProduct"=>$sellerProduct,
            "message"=> $this->getFlashMessage("message"),
            "alert"=> $this->getFlashMessage("alert")
        ]);
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
                if(property_exists($user, $field))
                    $user->{$field} = $this->GetTreatedValueFromPostIfIsset($field);
                if(property_exists($seller, $field))
                    $seller->{$field} = $this->GetTreatedValueFromPostIfIsset($field);
            }

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