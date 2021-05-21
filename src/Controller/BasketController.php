<?php


namespace src\Controller;
use src\Model\BasketModel;
use src\Model\BDD;

class BasketController extends AbstractController
{
    public function GetBasket(){
        return $this->twig->render("test.html.twig");
    }

    public function AddToBasket(){
        var_dump($_POST);
        try{
            $basket = new BasketModel();
            $basket->setBASKETUSERID($_POST["BASKET_USER_ID"]);
            $basket->setBASKETPRODUCTID($_POST["BASKET_PRODUCT_ID"]);
            $basket->setBASKETID($_POST["BASKET_USER_ID"]);
            $basket->setBASKETQUANTITY($_POST["BASKET_QUANTITY"]);
            $result = $basket->AddToBasket(BDD::getInstance());

            if($result == 'added'){
                echo "coucou";
            } else{
                echo "pb";
            }

            /*return $this->twig->render("home/home.html.twig", );*/
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

}