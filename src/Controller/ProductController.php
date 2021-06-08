<?php
namespace src\Controller;

use src\Model\ProductModel;
use src\Model\SellerModel;
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

        }
        catch(\Exception $e){

        }
    }
}