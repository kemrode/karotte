<?php


namespace src\Model;


class OrderModel
{
    private int $ORDER_ID;
    private int $ORDER_NUMBER;
    private int $USER_ID;
    private int $SELL_ID;
    private int $PROD_ID;
    private int $ORDER_PROD_QTY;
    private int $PROD_PRICE;
    private int $PROD_TOTAL_PRICE;
    private string $ORDER_DATE;
    private int $ORDER_TOTAL_PRICE;


    /**
     * @return int
     */
    public function getORDERNUMBER(): int
    {
        return $this->ORDER_NUMBER;
    }

    /**
     * @param int $ORDER_NUMBER
     */
    public function setORDERNUMBER(int $ORDER_NUMBER): void
    {
        $this->ORDER_NUMBER = $ORDER_NUMBER;
    }

    /*public function __construct($ORDER_LIST){
        $this->ORDER_LIST = $ORDER_LIST;
    }

    public function getOrder(){
        foreach ($this->ORDER_LIST as $order){
            $result += $order;
        }
    }*/

    /**
     * @return string
     */
    public function getORDERDATE(): string
    {
        return $this->ORDER_DATE;
    }

    /**
     * @param string $ORDER_DATE
     */
    public function setORDERDATE(string $ORDER_DATE): void
    {
        $this->ORDER_DATE = $ORDER_DATE;
    }
    /*private int $ORDER_TOTAL_PRICE;*/

    /**
     * @return int
     */
    public function getORDERID(): int
    {
        return $this->ORDER_ID;
    }

    /**
     * @param int $ORDER_ID
     */
    public function setORDERID(int $ORDER_ID): void
    {
        $this->ORDER_ID = $ORDER_ID;
    }

    /**
     * @return int
     */
    public function getUSERID(): int
    {
        return $this->USER_ID;
    }

    /**
     * @param int $USER_ID
     */
    public function setUSERID(int $USER_ID): void
    {
        $this->USER_ID = $USER_ID;
    }

    /**
     * @return int
     */
    public function getSELLID(): int
    {
        return $this->SELL_ID;
    }

    /**
     * @param int $SELL_ID
     */
    public function setSELLID(int $SELL_ID): void
    {
        $this->SELL_ID = $SELL_ID;
    }

    /**
     * @return int
     */
    public function getPRODID(): int
    {
        return $this->PROD_ID;
    }

    /**
     * @param int $PROD_ID
     */
    public function setPRODID(int $PROD_ID): void
    {
        $this->PROD_ID = $PROD_ID;
    }

    /**
     * @return int
     */
    public function getORDERPRODQTY(): int
    {
        return $this->ORDER_PROD_QTY;
    }

    /**
     * @param int $ORDER_PROD_QTY
     */
    public function setORDERPRODQTY(int $ORDER_PROD_QTY): void
    {
        $this->ORDER_PROD_QTY = $ORDER_PROD_QTY;
    }

    /**
     * @return int
     */
    public function getPRODPRICE(): int
    {
        return $this->PROD_PRICE;
    }

    /**
     * @param int $PROD_PRICE
     */
    public function setPRODPRICE(int $PROD_PRICE): void
    {
        $this->PROD_PRICE = $PROD_PRICE;
    }

    /**
     * @return int
     */
    public function getPRODTOTALPRICE(): int
    {
        return $this->PROD_TOTAL_PRICE;
    }

    /**
     * @param int $PROD_TOTAL_PRICE
     */
    public function setPRODTOTALPRICE(int $PROD_TOTAL_PRICE): void
    {
        $this->PROD_TOTAL_PRICE = $PROD_TOTAL_PRICE;
    }

    public static function GetLastOrderNumber(){
        try {
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT MAX(ORDER_NUMBER), USER_ID FROM `ORDER`");
            $requete->execute();

            return $requete->fetch();

        } catch (\Exception $e){
            throw $e;
        }
    }



    public function CreateOrder(\PDO $bdd){
        try{
            $requete = $bdd->prepare("INSERT INTO `ORDER`( ORDER_NUMBER, USER_ID, SELL_ID, PROD_ID, 
                    ORDER_PROD_QTY, PROD_PRICE, PROD_TOTAL_PRICE) 
            VALUES(:ORDER_NUMBER, :USER_ID, :SELL_ID, :PROD_ID, :ORDER_PROD_QTY, :PROD_PRICE, :PROD_TOTAL_PRICE)");
            $execute = $requete->execute([
                "ORDER_NUMBER" => $this->getORDERNUMBER(),
                "USER_ID" => $this->getUSERID(),
                "SELL_ID" => $this->getSELLID(),
                "PROD_ID" => $this->getPRODID(),
                "ORDER_PROD_QTY" => $this->getORDERPRODQTY(),
                "PROD_PRICE" => $this->getPRODPRICE(),
                "PROD_TOTAL_PRICE" => $this->getPRODTOTALPRICE()
            ]);
            return $requete->fetchAll();


        }catch (\Exception $e){
           return $e->getMessage();
        }
    }

    public static function GetOrdersFromUserId($id){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT ORDER_ID, USER_ID,
            ORDER_PROD_QTY, PROD_TOTAL_PRICE, PRODUCT.PROD_ID, PRODUCT.PROD_PRICE, PROD_NAME, SELL_NAME, SELLER.SELL_ID
            FROM `ORDER`
            INNER JOIN PRODUCT ON `ORDER`.PROD_ID = PRODUCT.PROD_ID
            INNER JOIN SELLER ON `ORDER`.SELL_ID = SELLER.SELL_ID 
            WHERE USER_ID=:USER_ID");

            /*$requete = $bdd->prepare("SELECT ORDER_ID, USER_ID,
            (SELECT SELL_ID, SELL_NAME, SELL_LOC, SELL_PRES FROM SELLER WHERE SELL_ID=:SELL_ID),
            (SELECT PROD_ID, PROD_USER_ID, PROD_NAME, PROD_QTY, PROD_OFFER_TAG, PROD_PRICE, PROD_ORIGIN, PROD_PICT, PROD_OFFER FROM PRODUCT WHERE PROD_ID =:PROD_ID),
            ORDER_PROD_QTY, PROD_PRICE, PROD_TOTAL_PRICE FROM `ORDER` WHERE USER_ID=:USER_ID");*/

            $requete->execute([
                "USER_ID" => $id
            ]);
            return $requete->fetchAll();
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    /*public static function GetOrdersByOrderNumber($orderNumber){
        $orders= [];
        try {
            $orders['listOfProduct'] =
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT ORDER_ID, USER_ID, SELLER.SELL_ID, PRODUCT.PROD_ID, ORDER_PROD_QTY, PRODUCT.PROD_PRICE, PROD_TOTAL_PRICE, ORDER_NUMBER 
            FROM `ORDER`
            INNER JOIN PRODUCT ON `ORDER`.PROD_ID = PRODUCT.PROD_ID
            INNER JOIN SELLER ON `ORDER`.SELL_ID = SELLER.SELL_ID 
            WHERE ORDER_NUMBER=:ORDER_NUMBER");
            $requete->execute([
                "ORDER_NUMBER"=>$orderNumber,
                "Orders"=>$orders
            ]);
            return $requete->fetchAll();

        } catch (\Exception $e){
            throw $e;
        }
    }*/


    public static function GetOrdersFromOrderNumber($orderNumber){
        /*var_dump($_REQUEST);*/
        try {
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT ORDER_ID, USER_ID, ORDER_PROD_QTY, PROD_TOTAL_PRICE, 
            PRODUCT.PROD_ID, PRODUCT.PROD_PRICE, PROD_NAME, SELL_NAME, SELLER.SELL_ID, ORDER_NUMBER
            FROM `ORDER`
            INNER JOIN PRODUCT ON `ORDER`.PROD_ID = PRODUCT.PROD_ID
            INNER JOIN SELLER ON `ORDER`.SELL_ID = SELLER.SELL_ID 
            WHERE ORDER_NUMBER=:ORDER_NUMBER");
            $requete->execute([
                "ORDER_NUMBER"=>$orderNumber
            ]);
            return $requete->fetchAll();
        } catch (\Exception $e){
            throw $e;
        }
    }

    /*public static function GetOrderInfo($orderNumber){
        try {
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT USER_ID, PROD_TOTAL_PRICE FROM `ORDER` WHERE ORDER_NUMBER=:ORDER_NUMBER");
            $requete->execute([
                "ORDER_NUMBER"=>$orderNumber
            ]);
            return $requete->fetchAll();
        } catch (\Exception $e){
            throw $e;
        }
    }*/

    public static function GetOrder($orderNumber){
        $order = [];
        try {
//            $order["user_ID"] = $_SESSION["USER_ID"];
            $order = self::GetOrdersFromOrderNumber($orderNumber);

            return $order;
        } catch (\Exception $e){
            throw $e;
        }
    }

    public static function GetOrderById($order_id){
        try {
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT ORDER_ID, USER_ID, ORDER_PROD_QTY, PROD_TOTAL_PRICE, 
            PRODUCT.PROD_ID, PRODUCT.PROD_PRICE, PROD_NAME, SELL_NAME, SELLER.SELL_ID, ORDER_NUMBER
            FROM `ORDER`
            INNER JOIN PRODUCT ON `ORDER`.PROD_ID = PRODUCT.PROD_ID
            INNER JOIN SELLER ON `ORDER`.SELL_ID = SELLER.SELL_ID 
            WHERE ORDER_ID=:ORDER_ID");
            $requete->execute([
                "ORDER_ID"=>$order_id
            ]);
            return $requete->fetchAll();
        } catch (\Exception $e){
            throw $e;
        }
    }

    //Regroup orders in One
    /*public static function GetAllOrders($id){
        $order = [];
        try {
            $order["user_ID"] = $_SESSION["USER_ID"];
            $order["orders"] = self::GetOrdersFromOrderNumber($orderNumber);

            return $order;
        } catch (\Exception $e){
            throw $e;
        }
    }*/

    public static function GetOrderNumbersFromUserId($id){
        $orders = [];
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT DISTINCT ORDER_NUMBER FROM `ORDER` WHERE USER_ID=:USER_ID");
            $requete->execute([
                "USER_ID"=>$id
            ]);
            return $requete->fetchAll();

        } catch (\Exception $e){
            throw $e;
        }
    }

    public static function GetOrderNumbersFromUserIdAndSellerId($user_id, $sell_id, $orderNumber){
        $orders = [];
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT ORDER_ID FROM `ORDER` WHERE USER_ID=:USER_ID AND SELL_ID=:SELL_ID AND ORDER_NUMBER=:ORDER_NUMBER");
            $requete->execute([
                "USER_ID"=>$user_id,
                "SELL_ID"=>$sell_id,
                "ORDER_NUMBER"=>$orderNumber
            ]);
            return $requete->fetchAll();

        } catch (\Exception $e){
            throw $e;
        }
    }

}