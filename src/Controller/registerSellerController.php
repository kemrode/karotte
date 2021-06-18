<?php


namespace src\Controller;

use src\Model\BDD;
use src\Model\SellerModel;
use src\Model\userModel;

class registerSellerController extends AbstractController {

    public function sellerView() {
        $sellerItems = ['nom','adresse','code postale','ville'];
        return $this->twig->render('register/registerSellerView.html.twig', ['sellerItems'=>$sellerItems]);
    }
    public function addNewSeller(){
        try {
            if (isset($_POST['okButton'])){
                $newSellerId = $_SESSION['USER_ID'];
                try{
                    $newSellerAdress = userModel::GetCoordinatesFromAdress($_POST['adresse'], $_POST['zipCode'], $_POST['ville']);
                }
                catch(\Exception $e){
                    $newSellerAdress= "49.382509;1.07448";
                }
                $newSeller = new SellerModel();
                $newSeller->setSELLID($newSellerId);
                $newSeller->setSELLNAME($_POST['nom']);
                $newSeller->setSELLLOC($newSellerAdress);
                $newSeller->setSELLPRES($_POST['presentation']);
                $newSellerToPost = $newSeller->postNewSeller(BDD::getInstance());
                $_SESSION['isSeller'] = true;
                header('Location:/');
            }
        } catch(\Exception $e){
            throw $e;
        }
    }
}