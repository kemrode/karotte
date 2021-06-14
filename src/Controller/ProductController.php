<?php
namespace src\Controller;

use src\Model\ProductModel;
use src\Model\TagModel;

Class ProductController extends AbstractController
{

    public function DeleteProduct(int $productId){
        try {
            if(!ProductModel::IsThisProductBelongToSeller($_SESSION["userId"], $productId ))
                throw new \Exception("Vous ne pouvez pas supprimer un produit qui n'est pas dans votre boutique");
            ProductModel::DeleteProduct($productId);
            $_SESSION["message"] = "Produit supprimé";
        }
        catch(\Exception $ex){
            $_SESSION["alert"] = $ex->getMessage();
        }
        finally{
            return $_SESSION['userId'];
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
            $product->setPRODUSERID($_SESSION["userId"]);

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
            $id = $_SESSION['userId'];
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
                "PROD_DESC" => "Description",
                "TP_TAG" => "Catégorie"
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
                if(property_exists($tag, $field))
                    $tag->{$field} = $this->GetTreatedValueFromPostIfIsset($field);
            }
            $newProduct->setPRODUSERID($_SESSION["userId"]);

            // Get the picture path and save the file if set.
            if($_FILES["PROD_PICT"]["name"] != "")
                $pictPath = ProductModel::UploadPictureToServer($_FILES["PROD_PICT"]);
            // Else put a default picture
            else
                $pictPath = "/assets/img/files/products/default.jpg";

            $newProduct->setPRODPICT($pictPath);

            // Saving the product and put the Id inserted into $tag
            $tag->setTPIDPRODUCT($newProduct->AddProductToSellerShop());

            // Saving the category of product
            $tag->PostTag();

            // Return feedback
            $_SESSION["message"] = "Produit ajouté";
        }
        catch(\InvalidArgumentException $e){
            $_SESSION["alert"] = $e->getMessage();
        }
        catch(\OverflowException $e){
            $_SESSION["alert"] = $e->getMessage();
        }
        catch(\Exception $e){
            $_SESSION["alert"] = "une erreur interne s'est produite veuillez nous excuser pour la gêne occasionée";
        }        finally {
            $id = $_SESSION['userId'];
            header("location:/Profile/SellerProfileView/$id");
            exit;
        }


    }
}