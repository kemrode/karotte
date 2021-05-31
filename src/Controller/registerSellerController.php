<?php


namespace src\Controller;


use src\Model\BDD;
use src\Model\SellerModel;


class registerSellerController extends AbstractController {

    public function sellerView() {
        $sellerItems = ['nom','adresse','code postale','ville'];
        return $this->twig->render('register/registerSellerView.html.twig', ['sellerItems'=>$sellerItems]);
    }

    public function addNewSeller(\PDO $bdd){

    }

}