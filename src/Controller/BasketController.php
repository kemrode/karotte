<?php


namespace src\Controller;
use src\Model\BasketModel;
use src\Model\BDD;
use src\Model\ProductModel;
use src\Model\SellerModel;

class BasketController extends AbstractController
{
    public function GetBasket(){
        return $this->twig->render("test.html.twig");
    }

    public function GetUserBasket($id){
        $basket = BasketModel::GetUserBasket($id);
        $sellerList = SellerModel::GetAllSellers();

        var_dump($basket);

        return $this->twig->render("user/basket.html.twig",["basket"=>$basket, "sellerList"=>$sellerList]);


    }

    //Global var basket : initialize with session_start(). Basket_user_id -> user_id

    public function AddToBasket(){
        var_dump($_POST);
        try{
            $basket = new BasketModel();
            $basket->setBASKETUSERID($_POST["BASKET_USER_ID"]);
            $basket->setBASKETPRODUCTID($_POST["BASKET_PRODUCT_ID"]);
            $basket->setBASKETID($_POST["BASKET_ID"]);
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

    public function AddToBasketUser(int $userId){
        if(isset($_POST['BASKET_PRODUCT_ID'], $_POST["BASKET_QUANTITY"])){
            $product_id = (int)$_POST['BASKET_PRODUCT_ID'];
            $quantity = (int)$_POST["BASKET_QUANTITY"];
            $user_id = $_POST["BASKET_USER_ID"];

            try {
                //Check if product is available
                $checkProduct = ProductModel::GetProductFromProductId($product_id);
                var_dump($checkProduct['PROD_QTY']);

                if(isset($checkProduct['PROD_QTY']) && $checkProduct['PROD_QTY'] > $quantity){
                    var_dump("isOk");
                    $basket = new BasketModel();

                } else{
                    var_dump("notOk");
                }

                /*$basket = new BasketModel();
                $basket->setBASKETUSERID($user_id);

                $basket->setBASKETPRODUCTID($product_id);
                $basket->setBASKETQUANTITY($quantity);*/

            }catch (\Exception $e){
                return $e->getMessage();
            }
        }
    }

}