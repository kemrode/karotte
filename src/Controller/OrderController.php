<?php


namespace src\Controller;
use src\Model\BDD;
use src\Model\OrderModel;
use src\Model\ProductModel;
use src\Model\SellerModel;

class OrderController extends AbstractController
{
    public function LastOrder(){
        $lastOrder = OrderModel::GetLastOrderNumber();
        $newOrder = (int)$lastOrder[0] + 1;
        return $newOrder;
    }
    public function CreateOrder(){
        if(count($_SESSION["basket"]) > 0){
            $newOrder = self::LastOrder();
            foreach($_SESSION["basket"] as $product=>$value) {
                $_SESSION["basket"][$product] = $value;
                $order = new OrderModel();
                $order->setORDERNUMBER($newOrder);
                $order->setUSERID($_SESSION["USER_ID"]);
                $order->setPRODID($product);
                $order->setSELLID($_SESSION['basket'][$product]["productSellerId"]);
                $order->setORDERPRODQTY($_SESSION['basket'][$product]["productQuantity"]);
                $order->setPRODPRICE($_SESSION['basket'][$product]["productPrice"]);
                $order->setPRODTOTALPRICE(($_SESSION['basket'][$product]["productQuantity"]) * ($_SESSION['basket'][$product]["productPrice"]));
                $result = $order->CreateOrder(BDD::getInstance());
                if ($result == true) {
                    //echo "coucou";

                    /*unset($_SESSION["basket"]);*/
                } else {
                    //echo "failed";
                }
            }
            $this->SendMailToSeller(($_SESSION['basket'][$product]["productSellerId"]), $newOrder);
            unset($_SESSION["basket"]);

            header('location:/');
        } else{
            header('location:/');
        }
    }
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
    }
    public function SendMailToSeller($seller_id, $orderNumber){
        $user_id = $_SESSION["USER_ID"];
        $orderArray = [];
        $orders = OrderModel::GetOrderNumbersFromUserIdAndSellerId($user_id, $seller_id, $orderNumber);
        foreach ($orders as $orderNumber){
            $orderList = OrderModel::GetOrderById($orderNumber["ORDER_ID"]);
            array_push($orderArray, $orderList);
        }
        $seller = SellerModel::GetSellerAndUserInformationFromId($seller_id);
        $seller_mail = $seller['user']['USER_EMAIL'];
        //Interrogation google Captcha avec le token
        //Instancier/Configurer SwiftMailer
        $transport = (new \Swift_SmtpTransport('smtp.mailtrap.io', 465))
            ->setUsername("e1b65b5de77cec")
            ->setPassword("3c5157939e58bf");
        $mailer = new \Swift_Mailer($transport);
        //Writing message
        $message = (new \Swift_Message("Contact depuis le site"))
            ->setFrom(["contact@karotte.fr"=>"Karotte"])
            ->setTo([$seller_mail])
            ->setBody($this->twig->render("mail/mail.html.twig", ["orderArray"=> $orderArray], ["seller"=> $seller]), "text/html");
        //send message
        $result = $mailer->send($message);
        if($result == true){
            header("location:/");
        }else{
            echo "Oups";
        }
    }
}