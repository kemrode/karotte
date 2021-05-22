<?php
namespace src\Controller;

use src\Model\ProductModel;
use src\Model\SellerModel;

class SellerController extends AbstractController {
    public function index(){}

    public function RedirectToSellerPage($sellerId){

    }

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

    public function GetSellerById($id){
        $seller = SellerModel::GetSellerInformationFromId($id);
        $sellerList = SellerModel::GetAllSellers();
        $sellerProduct = ProductModel::GetAllProductAndTagGroupedByTagFromSellerId($id);

        return $this->twig->render("seller/Seller.html.twig",["seller"=>$seller, "sellerList"=>$sellerList, "sellerProduct"=>$sellerProduct]);
    }
}