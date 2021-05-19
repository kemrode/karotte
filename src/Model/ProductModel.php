<?php
namespace src\Model;

class ProductModel{

    #region Attibutes ProductModel
    private int $PROD_ID;
    private int $PROD_USER_ID;
    private string $PROD_NAME;
    private int $PROD_QTY;
    private bool $PROD_OFFER_TAG;
    private ?int $PROD_OFFER;
    private int $PROD_PRICE;
    private ?string $PROD_ORIGIN;
    private string $PROD_PICT;
    #endregion

    #region getters and setters ProductModel

    /**
     * @return int
     */
    public function getPRODID(): int
    {
        return $this->PROD_ID;
    }

    /**
     * @param int $PROD_ID
     * @return Product
     */
    public function setPRODID(int $PROD_ID): Product
    {
        $this->PROD_ID = $PROD_ID;
        return $this;
    }

    /**
     * @return int
     */
    public function getPRODUSERID(): int
    {
        return $this->PROD_USER_ID;
    }

    /**
     * @param int $PROD_USER_ID
     * @return Product
     */
    public function setPRODUSERID(int $PROD_USER_ID): Product
    {
        $this->PROD_USER_ID = $PROD_USER_ID;
        return $this;
    }

    /**
     * @return string
     */
    public function getPRODNAME(): string
    {
        return $this->PROD_NAME;
    }

    /**
     * @param string $PROD_NAME
     * @return Product
     */
    public function setPRODNAME(string $PROD_NAME): Product
    {
        $this->PROD_NAME = $PROD_NAME;
        return $this;
    }

    /**
     * @return int
     */
    public function getPRODQTY(): int
    {
        return $this->PROD_QTY;
    }

    /**
     * @param int $PROD_QTY
     * @return Product
     */
    public function setPRODQTY(int $PROD_QTY): Product
    {
        $this->PROD_QTY = $PROD_QTY;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPRODOFFERTAG(): bool
    {
        return $this->PROD_OFFER_TAG;
    }

    /**
     * @param bool $PROD_OFFER_TAG
     * @return Product
     */
    public function setPRODOFFERTAG(bool $PROD_OFFER_TAG): Product
    {
        $this->PROD_OFFER_TAG = $PROD_OFFER_TAG;
        return $this;
    }

    /**
     * @return int
     */
    public function getPRODOFFER(): int
    {
        return $this->PROD_OFFER;
    }

    /**
     * @param int $PROD_OFFER
     * @return Product
     */
    public function setPRODOFFER(int $PROD_OFFER): Product
    {
        if($PROD_OFFER>0)
            $this->setPRODOFFERTAG(true);
        else
            $this->setPRODOFFERTAG(false);

        $this->PROD_OFFER = $PROD_OFFER;
        return $this;
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
     * @return Product
     */
    public function setPRODPRICE(int $PROD_PRICE): Product
    {
        $this->PROD_PRICE = $PROD_PRICE;
        return $this;
    }

    /**
     * @return string
     */
    public function getPRODORIGIN(): string
    {
        return $this->PROD_ORIGIN;
    }

    /**
     * @param string $PROD_ORIGIN
     * @return Product
     */
    public function setPRODORIGIN(string $PROD_ORIGIN): Product
    {
        $this->PROD_ORIGIN = $PROD_ORIGIN;
        return $this;
    }

    /**
     * @return string
     */
    public function getPRODPICT(): string
    {
        return $this->PROD_PICT;
    }

    /**
     * @param string $PROD_PICT
     * @return Product
     */
    public function setPRODPICT(string $PROD_PICT): Product
    {
        $this->PROD_PICT = $PROD_PICT;
        return $this;
    }
    #endregion

    #region function CRUD ProductModel

    public static function GetAllProductFromUserId(int $userId){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT PROD_ID, PROD_USER_ID, PROD_NAME, PROD_QTY, PROD_OFFER_TAG, PROD_PRICE, PROD_ORIGIN, PROD_PICT, PROD_OFFER FROM PRODUCT WHERE PROD_USER_ID =:user_ID");
            $requete->execute([
                "user_ID" => $userId
            ]);
            return $requete->fetchAll(\PDO::FETCH_CLASS, "src\Model\Product");
        }catch (\Exception $e){
            throw $e;
        }
    }

    public static function GetAllProductAndTagGroupedByTagFromUserId(int $userId){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT PROD_ID, PROD_USER_ID, PROD_NAME, PROD_QTY, PROD_OFFER_TAG, PROD_PRICE, PROD_ORIGIN, PROD_PICT, PROD_OFFER FROM PRODUCT WHERE PROD_USER_ID =:user_ID");
            $requete->execute([
                "user_ID" => $userId
            ]);
            return $requete->fetchAll(\PDO::FETCH_CLASS, "src\Model\Product");
        }catch (\Exception $e){
            throw $e;
        }
    }

    public function AddProductToSellerShop(){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("INSERT INTO PRODUCT (PROD_ID, PROD_USER_ID, PROD_NAME, PROD_QTY, PROD_OFFER_TAG, PROD_PRICE, PROD_ORIGIN, PROD_PICT, PROD_OFFER) VALUES (:PROD_ID, :PROD_USER_ID, :PROD_NAME, :PROD_QTY, PROD_OFFER_TAG, PROD_PRICE, PROD_ORIGIN, PROD_PICT, PROD_OFFER)");
            $requete->execute([
                "PROD_ID" => $this->getPRODID(),
                "PROD_USER_ID" => $this->getPRODUSERID(),
                "PROD_NAME" => $this->getPRODNAME(),
                "PROD_QTY" => $this->getPRODQTY(),
                "PROD_OFFER_TAG" => (int) filter_var($this->isPRODOFFERTAG(), FILTER_VALIDATE_BOOLEAN),
                "PROD_PRICE" => $this->getPRODPRICE(),
                "PROD_ORIGIN" => $this->getPRODORIGIN(),
                "PROD_PICT" => $this->getPRODPICT(),
                "PROD_OFFER" => $this->getPRODOFFER()
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }

    public function UpdateOfferOfOneProduct(){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("UPDATE PRODUCT SET PROD_OFFER_TAG=:PROD_OFFER_TAG, PROD_OFFER=:PROD_OFFER) WHERE PROD_ID=:PROD_ID");
            $requete->execute([
                "PROD_ID" => $this->getPRODID(),
                "PROD_OFFER_TAG" => (int) filter_var($this->isPRODOFFERTAG(), FILTER_VALIDATE_BOOLEAN),
                "PROD_OFFER" => $this->getPRODOFFER()
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }

    #endregion

}

