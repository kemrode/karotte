<?php
namespace src\Controller;

use src\Model\ProductModel;
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

    public function RegisterMapPos($latLongZoom){
        $latLongZoom = json_decode($latLongZoom);
        $_SESSION['currentLatitude'] = $latLongZoom->latitude;
        $_SESSION['currentLongitude'] = $latLongZoom->longitude;
        $_SESSION['currentZoomLevel'] = $latLongZoom->zoomLevel;
    }

    // Test functions ProductModel
    public function addProduct(){
        try{
            $path = ProductModel::UploadPictureToServer($_FILES["PROD_PICT"]);
            echo $path;
        }
        catch(\Exception $e){
            return 1;
        }
    }
    public function getSellerInfo(){
        return json_encode(ProductModel::GetAllProductAndTagGroupedByTagFromSellerId(1));
    }



}