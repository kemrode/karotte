<?php
namespace src\Controller;

use http\Exception\InvalidArgumentException;
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
            "alerte"=> $this->getFlashMessage("alerte")]);
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
            unset($_SESSION['alerte']);
            unset($_SESSION['message']);
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
            $user->UpdateUserInfo();
            $seller->setSELLLOC($user::GetCoordinatesFromAdress($user->getUSERADDRESS(), $user->getUSERZIPCODE(), $user->getUSERCITY()));
            $seller->UpdateSellerInfo();

            // Unsetting all stored variable from post
            foreach ($valueExpected as $field=>$error){
                if(isset($_SESSION[$field]))
                    unset($_SESSION[$field]);
            }
            $_SESSION["message"] = "Profil mis à jour";
        }
        catch (\InvalidArgumentException $arg) {
            $_SESSION["alerte"] = $arg->getMessage();
        }
        catch(\BadMethodCallException $e){
            $_SESSION["alerte"] = "Une ereur s est produite : ".$e->getMessage();
        }
        catch (\Exception $e) {
            $_SESSION["alerte"] = "Une ereur s est produite : ".$e->getMessage();
        }
        finally {
            header("location:/Profile/SellerProfileView/$id");
            exit;
        }
    }
}