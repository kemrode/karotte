<?php
namespace src\Model;

class TagModel
{

    #region Attibutes TagModel
    private int $TP_ID_PRODUCT;
    private string $TP_TAG;
    private int $TP_ID;
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

    #region function CRUD TagModel
    public static function GetAllTagsFromSellerId($sellerId){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT DISTINCT TP_TAG FROM TAGPRODUCT WHERE TP_ID_PRODUCT IN (SELECT PROD_ID FROM PRODUCT WHERE PROD_USER_ID=:PROD_USER_ID ) GROUP BY TP_TAG");
            $requete->execute([
                "PROD_USER_ID" => $sellerId
            ]);
            return $requete->fetchAll(\PDO::FETCH_CLASS, "src\Model\TagModel");
        }catch (\Exception $e){
            throw $e;
        }
    }

    #endregion
}