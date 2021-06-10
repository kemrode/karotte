<?php
namespace src\Controller;

use src\Model\ProductModel;
use src\Model\SellerModel;
use src\Model\TagModel;
use Symfony\Component\Debug\Exception\ClassNotFoundException;

Class ProductController extends AbstractController
{

    public function DeleteProduct(int $productId){
        try {
            if(!ProductModel::IsThisProductBelongToSeller($_SESSION["USER_ID"], $productId ))
                throw new \Exception("Vous ne pouvez pas supprimer un produit qui n'est pas dans votre boutique");
            ProductModel::DeleteProduct($productId);
            $_SESSION["message"] = "Produit supprimé";
        }
        catch(\Exception $ex){
            $_SESSION["alert"] = $ex->getMessage();
        }
        finally{
            return $_SESSION['USER_ID'];
        }

    }

    public function UpdateProductInfo(){
        try {
            $valueExpected = [
                "PROD_ID" => "Veuillez contacter l'administrateur",
                "PROD_NAME" => "Nom du produit",
                "PROD_PRICE" => "Prix",
                "PROD_DESC" => "Description"
            ];
            $product = new ProductModel();

            // Storing all $_POST variable into session to avoid rewriting them in the form in case of error
            foreach ($valueExpected as $field=>$error){
                $_SESSION[$field] = $_POST[$field];
            }

            // Treatment of posted variable, if empty throw an exception
            foreach ($valueExpected as $field=>$error){
                if($this->GetTreatedValueFromPostIfIsset($field) == null)
                    throw new \InvalidArgumentException("Veuillez renseigner le champs ".$error);
                if(property_exists($product, $field))
                    $product->{$field} = $this->GetTreatedValueFromPostIfIsset($field);
            }
            $product->setPRODUSERID($_SESSION["USER_ID"]);
            $product->UpdateProduct();

            // Unsetting all stored variable from post
            foreach ($valueExpected as $field=>$error){
                if(isset($_SESSION[$field]))
                    unset($_SESSION[$field]);
            }
            $_SESSION["message"] = "Produit mis à jour";
        }
        catch(\InvalidArgumentException $e){
            $_SESSION["alert"] = $e->getMessage();
        }
        catch(\Exception $e){
            $_SESSION["alert"] = "une erreur interne s'est produite veuillez nous excuser pour la gêne occasionée";
        }        finally {
            $id = $_SESSION['USER_ID'];
            header("location:/Profile/SellerProfileView/$id");
            exit;
        }
    }

    public function AddProduct(){
        try {

            $newProduct = new ProductModel();
            $tag = new TagModel();

            $valueExpected = [
                "PROD_NAME" => "Nom du produit",
                "PROD_PRICE" => "Prix",
                "PROD_QTY" => "Quantité",
                "PROD_DESC" => "Description"
            ];

            // Storing all $_POST variable into session to avoid rewriting them in the form in case of error
            foreach ($valueExpected as $field=>$error){
                $_SESSION[$field] = $_POST[$field];
            }

            // Treatment of posted variable, if empty throw an exception
            foreach ($valueExpected as $field=>$error){
                if($this->GetTreatedValueFromPostIfIsset($field) == null)
                    throw new \InvalidArgumentException("Veuillez renseigner le champs ".$error);
                if(property_exists($newProduct, $field))
                    $newProduct->{$field} = $this->GetTreatedValueFromPostIfIsset($field);
            }

            var_dump($_POST);
            if($this->GetTreatedValueFromPostIfIsset("pict") != null)
            $pictPath = ProductModel::UploadPictureToServer($_POST["pict"]);
            $newProduct->setPRODPICT($pictPath);
            $tag->PostTag();
            $newProduct->AddProductToSellerShop();

            $_SESSION["message"] = "Produit ajouté";
        }
        catch(\InvalidArgumentException $e){
            $_SESSION["alert"] = $e->getMessage();
        }
        catch(\Exception $e){
            $_SESSION["alert"] = "une erreur interne s'est produite veuillez nous excuser pour la gêne occasionée";
        }        finally {
            $id = $_SESSION['USER_ID'];
            header("location:/Profile/SellerProfileView/$id");
            exit;
        }


    }
}