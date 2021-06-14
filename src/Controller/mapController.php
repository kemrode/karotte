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
                "sellerList" => $sellerList,
                "alert" => $this->getFlashMessage("alert"),
                "message" => $this->getFlashMessage("message")
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

    public function Logout(){
        header("location:/");
        session_destroy();
    }

}