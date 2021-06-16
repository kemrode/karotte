<?php
namespace src\Model;

class ProductModel{

    #region Attibutes ProductModel
    public int $PROD_ID;
    public int $PROD_USER_ID;
    public string $PROD_NAME;
    public int $PROD_QTY;
    public bool $PROD_OFFER_TAG = false;
    public ?int $PROD_OFFER = 0;
    public float $PROD_PRICE;
    public ?string $PROD_ORIGIN = "";
    public string $PROD_PICT;
    public ?string $PROD_DESC;


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
     * @return ProductModel
     */
    public function setPRODID(int $PROD_ID): ProductModel
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
     * @return ProductModel
     */
    public function setPRODUSERID(int $PROD_USER_ID): ProductModel
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
     * @return ProductModel
     */
    public function setPRODNAME(string $PROD_NAME): ProductModel
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
     * @return ProductModel
     */
    public function setPRODQTY(int $PROD_QTY): ProductModel
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
     * @return ProductModel
     */
    public function setPRODOFFERTAG(bool $PROD_OFFER_TAG): ProductModel
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
     * @return ProductModel
     */
    public function setPRODOFFER(int $PROD_OFFER): ProductModel
    {
        if($PROD_OFFER>0)
            $this->setPRODOFFERTAG(true);
        else
            $this->setPRODOFFERTAG(false);

        $this->PROD_OFFER = $PROD_OFFER;
        return $this;
    }

    /**
     * @return float
     */
    public function getPRODPRICE(): float
    {
        return $this->PROD_PRICE;
    }

    /**
     * @param float $PROD_PRICE
     * @return ProductModel
     */
    public function setPRODPRICE(float $PROD_PRICE): ProductModel
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
     * @return ProductModel
     */
    public function setPRODORIGIN(string $PROD_ORIGIN): ProductModel
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
     * @return ProductModel
     */
    public function setPRODPICT(string $PROD_PICT): ProductModel
    {


        $this->PROD_PICT = $PROD_PICT;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPRODDESC(): ?string
    {
        return $this->PROD_DESC;
    }

    /**
     * @param string|null $PROD_DESC
     * @return ProductModel
     */
    public function setPRODDESC(?string $PROD_DESC): ProductModel
    {
        $this->PROD_DESC = $PROD_DESC;
        return $this;
    }

    #endregion


    #region GET
    public static function GetAllProductFromUserId(int $userId){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT PROD_ID, PROD_USER_ID, PROD_NAME, PROD_QTY, PROD_OFFER_TAG, PROD_PRICE, PROD_ORIGIN, PROD_PICT, PROD_OFFER, PROD_DESC FROM PRODUCT WHERE PROD_USER_ID =:user_ID");
            $requete->execute([
                "user_ID" => $userId
            ]);
            return $requete->fetchAll(\PDO::FETCH_CLASS, "src\Model\ProductModel");
        }catch (\Exception $e){
            throw $e;
        }
    }
    public static function GetProductFromProductId(int $prodId){
        try{
            $bdd = BDD::getInstance();
        $requete = $bdd->prepare("SELECT PROD_ID, PROD_USER_ID, PROD_NAME, PROD_QTY, PROD_OFFER_TAG, PROD_PRICE, PROD_ORIGIN, PROD_PICT, PROD_OFFER, PROD_DESC FROM PRODUCT WHERE PROD_ID =:PROD_ID");
            $requete->execute([
                "PROD_ID" => $prodId
            ]);
            return $requete->fetch();
        }catch (\Exception $e){
            throw $e;
        }
    }
    public static function GetAllProductAndTagGroupedByTagFromSellerId($sellerId){
        try{
            $result = [];
            $bdd = BDD::getInstance();
            $tagList = TagModel::GetAllTagsFromSellerId($sellerId);
            $requete = $bdd->prepare("SELECT PROD_ID, PROD_USER_ID, PROD_NAME, PROD_QTY, PROD_OFFER_TAG, PROD_PRICE, PROD_ORIGIN, PROD_PICT, PROD_OFFER, PROD_DESC FROM PRODUCT WHERE PROD_USER_ID =:user_ID AND PROD_ID in (SELECT TP_ID_PRODUCT FROM TAGPRODUCT WHERE TP_TAG =:TP_TAG)");

            /* @var $tag TagModel */
            foreach ($tagList as $tag){
                $requete->execute([
                    "user_ID" => $sellerId,
                    "TP_TAG" => $tag->getTPTAG()
                ]);
                $result[$tag->getTPTAG()] = $requete->fetchAll();
            }
            return $result;
        }catch (\Exception $e){
            throw $e;
        }
    }
    public static function IsThisProductBelongToSeller($userId, $productId){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT PROD_USER_ID FROM PRODUCT WHERE PROD_ID=:productId");
            $requete->execute([
                "productId" => $productId
            ]);
            $result = $requete->fetch();
            if($result)
                return $result["PROD_USER_ID"] == $userId;
            else{
             throw new \Exception("Ce produit n'a pas été trouvé dans la base de donnée");
            }

        }
        catch(\Exception $e) {
            throw $e;
        }
    }
    #endregion
    #region POST
    public function AddProductToSellerShop(){
        try{
            // DB registration
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("INSERT INTO PRODUCT (PROD_USER_ID, PROD_NAME, PROD_QTY, PROD_OFFER_TAG, PROD_PRICE, PROD_ORIGIN, PROD_PICT, PROD_OFFER, PROD_DESC) VALUES (:PROD_USER_ID, :PROD_NAME, :PROD_QTY, :PROD_OFFER_TAG, :PROD_PRICE, :PROD_ORIGIN, :PROD_PICT, :PROD_OFFER, :PROD_DESC)");
            $requete->execute([
                "PROD_USER_ID" => $this->getPRODUSERID(),
                "PROD_NAME" => $this->getPRODNAME(),
                "PROD_QTY" => $this->getPRODQTY(),
                "PROD_OFFER_TAG" => (int) filter_var($this->isPRODOFFERTAG(), FILTER_VALIDATE_BOOLEAN),
                "PROD_PRICE" => $this->getPRODPRICE(),
                "PROD_ORIGIN" => $this->getPRODORIGIN(),
                "PROD_PICT" => $this->getPRODPICT(),
                "PROD_OFFER" => $this->getPRODOFFER(),
                "PROD_DESC" => $this->getPRODDESC()
            ]);
            return $bdd->lastInsertId();
        }catch (\Exception $e){
            throw $e;
        }
    }
    public static function UploadPictureToServer($PICT){
        // Treatment before uploading picture
        try {
            if (empty($PICT["tmp_name"]))
                throw new \OverflowException("Cette image est trop lourde pour être importee");
            if (!empty($PICT["name"])) {
                // Picture name
                $extension = pathinfo($PICT["name"], PATHINFO_EXTENSION);
                $nomImage = (uniqid()) . "." . $extension;
                // Storage folder
                $dateNow = new \DateTime();
                $repositoryName = $dateNow->format("Y/W");
                $folderPath = ROOT."/assets/img/files/products/$repositoryName";
                $relativePath = "/assets/img/files/products/$repositoryName"."/". $nomImage;
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0700, true);
                }
                // Copying pict into server
                move_uploaded_file($PICT["tmp_name"], ROOT.$relativePath);
                return $relativePath;
            }else {
                throw new \Exception();
            }
        }catch (\OverflowException $e) {
            throw $e;
        }
        catch(\Exception $e){
            throw new \Exception("Une erreur est survenue lors du chargement de l'image");
        }
    }
    #endregion
    #region PUT
    public function UpdateProduct(){
        try{
            // DB registration
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("UPDATE PRODUCT SET PROD_NAME=:PROD_NAME, PROD_PRICE=:PROD_PRICE, PROD_DESC=:PROD_DESC WHERE PROD_USER_ID=:PROD_USER_ID AND PROD_ID=:PROD_ID");
            $requete->execute([
                "PROD_NAME" => $this->getPRODNAME(),
                "PROD_PRICE" => $this->getPRODPRICE(),
                "PROD_DESC" => $this->getPRODDESC(),
                "PROD_USER_ID" => $this->getPRODUSERID(),
                "PROD_ID" => $this->getPRODID()
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }
    public function UpdateOffer($offerAmount){
        try{
            $this->setPRODOFFER($offerAmount);
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("UPDATE PRODUCT SET PROD_OFFER_TAG=:PROD_OFFER_TAG, PROD_OFFER=:PROD_OFFER WHERE PROD_ID=:PROD_ID");
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
    #region DELETE
    public static function DeleteProduct(int $productID){
        try{
            $bdd = BDD::getInstance();
            $queryFilePath = $bdd->prepare("SELECT PROD_PICT FROM PRODUCT WHERE PROD_ID =:productID");
            $queryFilePath->execute([

            ]);
            $result = $queryFilePath->fetch();
            // Removal of the picture if it is not the default picture
            if($result["PROD_PICT"] != "/assets/img/files/products/default.jpg")
                unlink($result["PROD_PICT"]);

            $query = $bdd->prepare("DELETE FROM PRODUCT WHERE PROD_ID =:productID");
            $query->execute([
                "productID" => $productID
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }
#endregion
}

