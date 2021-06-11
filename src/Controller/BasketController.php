<?php


namespace src\Controller;
use src\Model\BDD;
use src\Model\OrderModel;
use src\Model\ProductModel;
use src\Model\BasketModel;
use src\Model\SellerModel;


class BasketController extends AbstractController
{
    public function GetBasket(){
        return $this->twig->render("test.html.twig");
    }

    public function GetUserBasket($id){
        $basket = BasketModel::GetUserBasket($_SESSION["USER_ID"]);
        $sellerList = SellerModel::GetAllSellers();



        return $this->twig->render("user/basket.html.twig",["basket"=>$basket, "sellerList"=>$sellerList]);
    }

    //Global var basket : initialize with session_start(). Basket_user_id -> user_id

    public function AddToBasket(){
        if(isset($_POST["BASKET_PRODUCT_ID"])){
            $productById = ProductModel::GetProductFromProductId($_POST["BASKET_PRODUCT_ID"]);
            $sellerById = SellerModel::GetSellerInformationFromId($productById["PROD_USER_ID"]);
            $sell_id = $sellerById['SELL_ID'];

            // Check if product already in basket. If true, add the quantity
            if(isset($_SESSION['basket'][$productById["PROD_ID"]]))
            {
                $_SESSION['basket'][$productById["PROD_ID"]]["productQuantity"] += $_POST["BASKET_QUANTITY"];
            } else{
                $_SESSION['basket'][$productById["PROD_ID"]] = array("productName"=>$productById["PROD_NAME"],
                    "productSeller"=>$sellerById["SELL_NAME"],
                    "productId"=>$productById["PROD_ID"],
                    "productSellerId"=>$sellerById["SELL_ID"],
                    "productQuantity"=>$_POST["BASKET_QUANTITY"],
                    "productPrice"=>$productById["PROD_PRICE"]);
            }
        }

        header("location:/Seller/GetSellerById/$sell_id");
    }

    public function UpdateBasket(){
        var_dump($_REQUEST);
        if(isset($_REQUEST["productQuantity"],$_REQUEST["param"])){
            if($_REQUEST["productQuantity"] == 0){
                unset($_SESSION['basket'][$_REQUEST["param"]]);
            } else {
                $_SESSION['basket'][$_REQUEST["param"]]["productQuantity"] = $_REQUEST["productQuantity"];
            }
        } else {
            header("location:/basket/getuserbasket/{$_SESSION["USER_ID"]}");
        }
        header("location:/basket/getuserbasket/{$_SESSION["USER_ID"]}");

    }


    public function Remove($productId){
        foreach ($_SESSION["basket"] as $k => $v){
            echo $k;
            echo $v;
            if($_REQUEST['param'] == $k){
                unset($_SESSION["basket"][$k]);
            }
        }
        header("location:/basket/GetUserBasket/{$_SESSION["USER_ID"]}");
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

    public function AddBasket($id){
        $_SESSION['cart_item'] = BasketModel::GetUserBasket($_SESSION["USER_ID"]);
        var_dump($_SESSION['cart_item']);
        /*$basket = BasketModel::GetUserBasket($id);*/
        $sellerList = SellerModel::GetAllSellers();

        var_dump($_POST);


        /*if(!empty($_POST["addToCartBtn"])){
            echo "coucou";
            switch ($_POST["addToCartBtn"]){
                case "add":*/
                    if(!empty($_POST["BASKET_QUANTITY"])){
                        //Get product by ID
                        $productById = ProductModel::GetProductFromProductId($_POST["BASKET_PRODUCT_ID"]);

                        var_dump($productById);

                        $itemArray = array($productById[0]["PROD_ID"] => array("PROD_NAME"=>$productById[0]["PROD_NAME"],
                            "PROD_QTY"=>$productById[0]["PROD_QTY"],
                            "PROD_PRICE"=>$productById[0]["PROD_PRICE"],
                            "PROD_PICT"=>$productById[0]["PROD_PICT"]));

                        if(!empty($_SESSION["cart_item"])){
                            if(in_array($productById[0]["PROD_ID"], array_keys($_SESSION["cart_item"]))){
                                foreach ($_SESSION["cart_item"] as $k => $v){
                                    if($productById[0]["PROD_ID"] == $k){
                                        if(empty($_SESSION["cart_item"][$k]["PROD_QTY"])){
                                            $_SESSION["cart_item"][$k]["PROD_QTY"] = 0;
                                        }
                                        $_SESSION["cart_item"][$k]["PROD_QTY"] += $_POST["PROD_QTY"];
                                    }
                                }
                            } else {
                                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $productById);
                            }
                        } else {
                            $_SESSION["cart_item"] = $productById;
                        }
                    }
            }
    /*    }

    }*/
}