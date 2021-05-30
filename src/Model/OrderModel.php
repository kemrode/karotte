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
    private int $ORDER_TOTAL_PRICE;

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

    /**
     * @return int
     */
    public function getORDERTOTALPRICE(): int
    {
        return $this->ORDER_TOTAL_PRICE;
    }

    /**
     * @param int $ORDER_TOTAL_PRICE
     */
    public function setORDERTOTALPRICE(int $ORDER_TOTAL_PRICE): void
    {
        $this->ORDER_TOTAL_PRICE = $ORDER_TOTAL_PRICE;
    }



    public function CreateOrder(\PDO $bdd){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("INSERT INTO ORDER(ORDER_ID,USER_ID, SELL_ID, PROD_ID, ORDER_PROD_QTY, PROD_PRICE, PROD_TOTAL_PRICE, ORDER_TOTAL_PRICE) VALUES(:ORDER_ID, :USER_ID, :SELL_ID, :PROD_ID, :ORDER_PROD_QTY, :PROD_PRICE, :PROD_TOTAL_PRICE, :ORDER_TOTAL_PRICE)");
            $execute = $requete->execute([
                "ORDER_ID"=>$this->getORDERID(),
                "USER_ID"=>$this->getUSERID(),
                "SELL_ID"=>$this->getUSERID(),
                "PROD_ID"=>$this->getPRODID(),
                "ORDER_PROD_QTY"=>$this->getORDERPRODQTY(),
                "PROD_PRICE"=>$this->getPRODPRICE(),
                "PROD_TOTAL_PRICE"=>$this->getPRODTOTALPRICE(),
                "ORDER_TOTAL_PRICE"=>$this->getORDERTOTALPRICE()
                ]);
            return "ok";
        }catch (\Exception $e){
            throw $e;
        }
    }




}