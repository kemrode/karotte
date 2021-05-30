<?php


namespace src\Model;


class OrderModel
{
    private int $ORDER_ID;
    private int $USER_ID;
    private int $SELL_ID;
    private int $PROD_ID;
    private int $ORDER_PROD_QTY;
    private int $PROD_PRICE;
    private int $PROD_TOTAL_PRICE;
    private string $ORDER_DATE;

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



    public function CreateOrder(\PDO $bdd){
        try{
            $requete = $bdd->prepare("INSERT INTO `ORDER`( USER_ID, SELL_ID, PROD_ID, 
                    ORDER_PROD_QTY, PROD_PRICE, PROD_TOTAL_PRICE) 
            VALUES(:USER_ID, :SELL_ID, :PROD_ID, :ORDER_PROD_QTY, :PROD_PRICE, :PROD_TOTAL_PRICE)");
            $execute = $requete->execute([
                "USER_ID" => $this->getUSERID(),
                "SELL_ID" => $this->getSELLID(),
                "PROD_ID" => $this->getPRODID(),
                "ORDER_PROD_QTY" => $this->getORDERPRODQTY(),
                "PROD_PRICE" => $this->getPRODPRICE(),
                "PROD_TOTAL_PRICE" => $this->getPRODTOTALPRICE()
            ]);
            return "ok";

        }catch (\Exception $e){
           return $e->getMessage();
        }
    }

    public static function GetOrdersFromUserId($id){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT ORDER_ID, USER_ID,
            ORDER_PROD_QTY, PROD_TOTAL_PRICE, PRODUCT.PROD_ID, PROD_NAME, SELL_NAME, SELLER.SELL_ID
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


}