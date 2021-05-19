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

/*            $pdt = ProductModel::GetProductFromProductId(8);
            $coucou = '';
            $pdt->UpdateOffer(50);
            $coucou = '';*/
            return $this->twig->render("seller/Seller.html.twig",[
                "sellerList" => $sellerList
            ]);
        }
        catch(Exceptio $e){
            var_dump($e);
        }
    }



}