<?php
namespace src\Controller;

use src\Model\ProductModel;

Class ProductController extends AbstractController
{
    public function DeleteProduct(int $productId){
        ProductModel::DeleteProduct($productId);
        header("location:/Profile/SellerProfileView/");
        exit;
    }
}