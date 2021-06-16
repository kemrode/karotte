<?php
namespace src\Controller;

use src\Model\ProductModel;
use src\Model\SellerModel;

class SellerController extends AbstractController {

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
    public function GetSellerById($id){
        try {
            if($id == $_SESSION["USER_ID"] && $id != "")
                $_SESSION["accessProfile"] = true;
            $seller = SellerModel::GetSellerInformationFromId($id);
            $sellerList = SellerModel::GetAllSellers();
            $sellerProduct = ProductModel::GetAllProductAndTagGroupedByTagFromSellerId($id);
            return $this->twig->render("seller/Seller.html.twig", [
                "seller" => $seller,
                "sellerList" => $sellerList,
                "sellerProduct" => $sellerProduct,
                "accessProfile"=>$this->getFlashMessage("accessProfile")
            ]);
        }
        catch (\Exception $e) {
            echo $this->index();
        }
    }
    #region JSON Functions
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
    #endregion
}
