<?php
namespace src\Controller;

use src\Model\SellerModel;

class SellerController extends AbstractController {
    public function index(){}

    public function GetAllSellerLocationAndIdAndName(){
        try{
            header("Content-Type: application/json");
            return json_encode(SellerModel::GetAllSellerLocationAndIdAndName());
        }catch(\Exception $e){
            return json_encode([
                "error"=>"Une erreur est survenue lors du chargement des vendeurs"
            ]);
        }
    }

    public function GetSellerInformationFromId($id){
        try{
            header("Content-Type: application/json");
            $id = (int) $id;
            return json_encode(SellerModel::GetSellerInformationFromId($id));
        }catch(\Exception $e){
            return json_encode([
                "error"=>"Une erreur est survenue lors du chargement des informations vendeur"
            ]);
        }
    }

}