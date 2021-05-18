<?php
namespace src\Controller;

use src\Model\SellerModel;
use src\Model\BDD;

class SellerController extends AbstractController
{
    public function sellerPage() {

        return $this->twig->render("Seller/seller.html.twig");
    }
}