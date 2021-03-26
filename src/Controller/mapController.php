<?php
namespace src\Controller;

use src\Model\SellerModel;
use src\Model\BDD;

class MapController extends AbstractController {

    public function index(){
        try{
            $seller = new SellerModel();
            $sellerList = $seller->GetAllSellers(BDD::getInstance());
            return $this->twig->render("map/mapView.html.twig",[
                "sellerList" => $sellerList
            ]);
        }
        catch(Exceptio $e){
            var_dump($e);
        }
    }

}