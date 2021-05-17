<?php
namespace src\Controller;

use src\Model\SellerModel;

class SellerController extends AbstractController {
    public function index(){}

    public function GetAllSellersLocationAndId(){
        try{
            header("Content-Type: application/json");
            return json_encode(SellerModel::GetAllSellerLocationAndId());
        }catch(\Exception $e){
            return json_encode([
                "error"=>"Une erreur est survenue lors du chargement des vendeurs"
            ]);
        }

    }
}