<?php
namespace src\Controller;

use src\Model\ProductModel;
use src\Model\SellerModel;
use Twig\Node\Expression\Unary\PosUnary;

class MapController extends AbstractController {

    public function index(){
        try{
            $seller = new SellerModel();
            $sellerList = $seller->GetAllSellers();
            return $this->twig->render("seller/Seller.html.twig",[
                "sellerList" => $sellerList
            ]);
        }
        catch(Exceptio $e){
            var_dump($e);
        }
    }



}