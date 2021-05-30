<?php


namespace src\Controller;
use src\Model\BDD;
use src\Model\OrderModel;
use src\Model\ProductModel;
use src\Model\SellerModel;

class OrderController extends AbstractController
{
    public function CreateOrder(){
        if(count($_SESSION["basket"]) > 1){
            /*for( $i = 0; $i< count($_SESSION["basket"]); $i++) {*/
            foreach($_SESSION["basket"] as $product=>$value) {
                $_SESSION["basket"][$product] = $value;
                $order = new OrderModel();
                $order->setUSERID($_SESSION["USER_ID"]);
                $order->setPRODID($product);
                $order->setSELLID($_SESSION['basket'][$product]["productSellerId"]);
                $order->setORDERPRODQTY($_SESSION['basket'][$product]["productQuantity"]);
                $order->setPRODPRICE($_SESSION['basket'][$product]["productPrice"]);
                $order->setPRODTOTALPRICE(($_SESSION['basket'][$product]["productQuantity"]) * ($_SESSION['basket'][$product]["productPrice"]));
                $result = $order->CreateOrder(BDD::getInstance());

                if ($result == "ok") {
                    echo "coucou";
                    unset($_SESSION["basket"][$product]);

                    /*unset($_SESSION["basket"]);*/
                } else {
                    echo "failed";
                }
            }
            header('location:/');
        } else{
            header('location:/');
        }
    }

    public function GetAllOrdersFromUserId($id){
        $orderList = OrderModel::GetOrdersFromUserId($id);

        return $this->twig->render("user/order.html.twig", ["orderList"=>$orderList]);
    }
}