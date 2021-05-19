<?php
namespace src\Controller;

use src\Model\SellerModel;

class MapController extends AbstractController {

    public function index(){
        try{
            $seller = new SellerModel();
            $sellerList = $seller->GetAllSellers();
            return $this->twig->render("home/home.html.twig",[
                "sellerList" => $sellerList
            ]);
        }
        catch(\Exception $e){
            var_dump($e);
        }
    }



}