<?php
namespace src\Controller;

use http\Exception\InvalidArgumentException;
use src\Model\ProductModel;
use src\Model\SellerModel;
use src\Model\userModel;

Class ProfileController extends AbstractController{
    function index(){
        $sellerList = SellerModel::GetAllSellers();
        return $this->twig->render("profile/ProfileSeller.html.twig",["sellerList"=>$sellerList]);
    }

    public function SellerProfileView($id){
        $seller = SellerModel::GetSellerAndUserInformationFromId($id);
        $sellerList = SellerModel::GetAllSellers();
        $sellerProduct = ProductModel::GetAllProductAndTagGroupedByTagFromSellerId($id);
        return $this->twig->render("profile/ProfileSeller.html.twig",["sellerInfo"=>$seller, "sellerList"=>$sellerList, "sellerProduct"=>$sellerProduct]);
    }

    public function UpdateSellerProfile($id){
        try {
            unset($_SESSION['alerte']);

            $user = new userModel();
            $seller = new SellerModel();
            $valueExpected = [
                "SELL_NAME" => "Nom boutique",
                "SELL_PRES" => "présentation vendeur",
                "USER_ADDRESS" => "Adresse",
                "USER_ZIP_CODE" => "Code postal",
                "USER_PHONE" => "téléphone"];

            // Storing all $_POST variable into session to avoid rewriting them in the form in case of error
            foreach ($valueExpected as $field=>$error){
                $_SESSION[$field] = $_POST[$field];
            }

            // Treatment of posted variable, if empty throw an exception
            foreach ($valueExpected as $field=>$error){
                if($this->GetTreatedValueFromPostIfIsset($field) == null)
                    throw new \InvalidArgumentException("Veuillez renseigner le champs ".$error);
                $_POST[$field] = $this->GetTreatedValueFromPostIfIsset($field);
            }

            // Update database
            SellerModel::UpdateSellerInfoFromPost($id);

            // Unsetting all stored variable from post
            foreach ($valueExpected as $field=>$error){
                unset($_SESSION[$field]);
            }
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
            echo $this->SellerProfileView($id);
        }
    }
}