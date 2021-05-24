<?php
namespace src\Controller;

use src\Model\ProductModel;
use src\Model\SellerModel;

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

    public function UpdateSellerProfile(){
        $user = new user();
        foreach ($user as $key=>$value){
            $_POST[$key]=$value;
        }
    }
}