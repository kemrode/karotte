<?php
namespace src\Controller;

use src\Model\SellerModel;
use src\Model\BDD;

class MapController extends AbstractController {

    public function index(){
        try{
            $seller = new SellerModel();
            $sellerList = $seller->GetAllSellers(BDD::getInstance());
            return $this->twig->render("Home/home.html.twig",[
                "sellerList" => $sellerList
            ]);
        }
        catch(\Exception $e){
        }
    }

}