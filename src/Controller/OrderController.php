<?php


namespace src\Controller;
use src\Model\BDD;
use src\Model\OrderModel;
use src\Model\ProductModel;
use src\Model\SellerModel;

class OrderController extends AbstractController
{
    public function CreateOrder(){
        var_dump(count($_SESSION["basket"]));
        if(count($_SESSION["basket"]) > 0){
            /*for( $i = 0; $i< count($_SESSION["basket"]); $i++) {*/
            foreach($_SESSION["basket"] as $product=>$value) {
                $_SESSION["basket"][$product] = $value;
                $order = new OrderModel();
                $order->setORDERNUMBER(3);
                $order->setUSERID($_SESSION["USER_ID"]);
                $order->setPRODID($product);
                $order->setSELLID($_SESSION['basket'][$product]["productSellerId"]);
                $order->setORDERPRODQTY($_SESSION['basket'][$product]["productQuantity"]);
                $order->setPRODPRICE($_SESSION['basket'][$product]["productPrice"]);
                $order->setPRODTOTALPRICE(($_SESSION['basket'][$product]["productQuantity"]) * ($_SESSION['basket'][$product]["productPrice"]));
                $result = $order->CreateOrder(BDD::getInstance());

                if ($result == true) {
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

    /*public function GetAllOrdersFromUserId($id){
        $orderList = OrderModel::GetOrdersFromUserId($id);
        $sellerList = SellerModel::GetAllSellers();

        var_dump($orderList);
        die();

        return $this->twig->render("user/order.html.twig", ["orderList"=>$orderList, "sellerList"=>$sellerList]);
    }*/

    public function GetOrders($orderNumber){
        $orderList = OrderModel::GetOrder($orderNumber);
        $sellerList = SellerModel::GetAllSellers();

        return $this->twig->render("user/order.html.twig", ["orderList"=>$orderList, "sellerList"=>$sellerList]);

    }

    public function GetAllOrdersByUserId($id){
        $orders = OrderModel::GetOrderNumbersFromUserId($id);
        $sellerList = SellerModel::GetAllSellers();
        $orderArray = [];

        foreach ($orders as $orderNumber){
            /*var_dump($orderNumber["ORDER_NUMBER"]);*/
            $orderList = OrderModel::GetOrder($orderNumber["ORDER_NUMBER"]);
            /*var_dump($orderList);*/
            array_push($orderArray, $orderList);
        }
        return $this->twig->render("user/order.html.twig", ["orderArray"=>$orderArray, "sellerList"=>$sellerList]);

        /*var_dump($orders);*/
    }
}