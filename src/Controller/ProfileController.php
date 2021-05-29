<?php
namespace src\Controller;

use src\Model\SellerModel;

Class
ProfileController extends AbstractController{
    function index(){
        $sellerList = SellerModel::GetAllSellers();
        return $this->twig->render("profile/ProfileSeller.html.twig",["sellerList"=>$sellerList]);
    }
}