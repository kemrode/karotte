<?php
namespace src\Controller;

use src\Model\SellerModel;
use src\Model\BDD;

class SellerController extends AbstractController
{
    public function sellerPage() {
            try{
                $seller = new SellerModel();
                $sellerList = $seller->GetAllSellers(BDD::getInstance());
                return $this->twig->render("Seller/seller.html.twig",[
                    "sellerList" => $sellerList
                ]);
            }
            catch(\Exception $e){
            }
        }
}