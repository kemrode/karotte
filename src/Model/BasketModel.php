<?php


namespace src\Model;


class BasketModel
{
    private int $BASKET_USER_ID;
    private int $BASKET_PRODUCT_ID;
    private int $BASKET_ID;
    private int $BASKET_QUANTITY;

    /**
     * @return int
     */
    public function getBASKETUSERID(): int
    {
        return $this->BASKET_USER_ID;
    }

    /**
     * @param int $BASKET_USER_ID
     */
    public function setBASKETUSERID(int $BASKET_USER_ID): void
    {
        $this->BASKET_USER_ID = $BASKET_USER_ID;
    }

    /**
     * @return int
     */
    public function getBASKETPRODUCTID(): int
    {
        return $this->BASKET_PRODUCT_ID;
    }

    /**
     * @param int $BASKET_PRODUCT_ID
     */
    public function setBASKETPRODUCTID(int $BASKET_PRODUCT_ID): void
    {
        $this->BASKET_PRODUCT_ID = $BASKET_PRODUCT_ID;
    }

    /**
     * @return int
     */
    public function getBASKETID(): int
    {
        return $this->BASKET_ID;
    }

    /**
     * @param int $BASKET_ID
     */
    public function setBASKETID(int $BASKET_ID): void
    {
        $this->BASKET_ID = $BASKET_ID;
    }

    /**
     * @return int
     */
    public function getBASKETQUANTITY(): int
    {
        return $this->BASKET_QUANTITY;
    }

    /**
     * @param int $BASKET_QUANTITY
     */
    public function setBASKETQUANTITY(int $BASKET_QUANTITY): void
    {
        $this->BASKET_QUANTITY = $BASKET_QUANTITY;
    }


    public function AddToBasket(\PDO $bdd){
        try {
        $request = $bdd->prepare("INSERT INTO BASKET(BASKET_USER_ID, BASKET_PRODUCT_ID, BASKET_ID, BASKET_QUANTITY)
        VALUES (:BASKET_USER_ID, :BASKET_PRODUCT_ID, :BASKET_ID, :BASKET_QUANTITY)");

        $execute = $request->execute([
           'BASKET_USER_ID' => $this->getBASKETUSERID(),
           'BASKET_PRODUCT_ID' => $this->getBASKETPRODUCTID(),
           'BASKET_ID' => $this->getBASKETID(),
            'BASKET_QUANTITY' => $this->getBASKETQUANTITY()
        ]);

        $_SESSION['cart'] = "coucou";

        return "added";

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function GetUserBasket(\PDO $bdd){
        $id = $_REQUEST['param'];

        try {
            $request = $bdd->prepare("SELECT BASKET_USER_ID, BASKET_PRODUCT_ID, BASKET_ID, BASKET_QUANTITY 
            FROM BASKET WHERE BASKET_USER_ID=:$id");

            $execute = $request->execute([
                'id' => $id
            ]);

            return $request->fetch();

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

}