<?php
namespace src\Model;

class TagModel
{

    #region Attibutes TagModel
    public int $TP_ID_PRODUCT;
    public string $TP_TAG;
    public int $TP_ID;
    #endregion

    #region getters and setters TagModel
    /**
     * @return int
     */
    public function getTPIDPRODUCT(): int
    {
        return $this->TP_ID_PRODUCT;
    }

    /**
     * @param int $TP_ID_PRODUCT
     * @return TagModel
     */
    public function setTPIDPRODUCT(int $TP_ID_PRODUCT): TagModel
    {
        $this->TP_ID_PRODUCT = $TP_ID_PRODUCT;
        return $this;
    }

    /**
     * @return string
     */
    public function getTPTAG(): string
    {
        return $this->TP_TAG;
    }

    /**
     * @param string $TP_TAG
     * @return TagModel
     */
    public function setTPTAG(string $TP_TAG): TagModel
    {
        $this->TP_TAG = $TP_TAG;
        return $this;
    }

    /**
     * @return int
     */
    public function getTPID(): int
    {
        return $this->TP_ID;
    }

    /**
     * @param int $TP_ID
     * @return TagModel
     */
    public function setTPID(int $TP_ID): TagModel
    {
        $this->TP_ID = $TP_ID;
        return $this;
    }
    #endregion

    #region GET
    public static function GetAllTagsFromSellerId($sellerId){
        try{
            $bdd = BDD::getInstance();
            $sql = "SELECT DISTINCT TP_TAG FROM TAGPRODUCT WHERE TP_ID_PRODUCT IN (SELECT PROD_ID FROM PRODUCT WHERE PROD_USER_ID=:PROD_USER_ID ) GROUP BY TP_TAG";
            $requete = $bdd->prepare($sql);
            $requete->execute([
                "PROD_USER_ID" => $sellerId
            ]);
            return $requete->fetchAll(\PDO::FETCH_CLASS, "src\Model\TagModel");
        }catch (\Exception $e){
            throw $e;
        }
    }
    #endregion
    #region POST
    public function PostTag(){
        try{
            $bdd = BDD::getInstance();
            $sql = "INSERT INTO TAGPRODUCT (TP_ID_PRODUCT, TP_TAG) VALUES (:idProduct, :tpTag)";
            $requete = $bdd->prepare($sql);
            $requete->execute([
                "idProduct" => $this->getTPIDPRODUCT(),
                "tpTag" => $this->getTPTAG()
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }
    #endregion
}