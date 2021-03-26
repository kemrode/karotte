<?php
namespace src\Model;

class SellerModel{
    #region attributes SellerModel

    private int $SELL_ID;
    private string $SELL_NAME;
    private array $SELL_LOC;
    private string $SELL_PRES;

    #endregion

    #region getters and setters ProductModel

    /**
     * @return int
     */
    public function getSELLID(): int
    {
        return $this->SELL_ID;
    }

    /**
     * @param int $SELL_ID
     * @return SellerModel
     */
    public function setSELLID(int $SELL_ID): SellerModel
    {
        $this->SELL_ID = $SELL_ID;
        return $this;
    }

    /**
     * @return string
     */
    public function getSELLNAME(): string
    {
        return $this->SELL_NAME;
    }

    /**
     * @param string $SELL_NAME
     * @return SellerModel
     */
    public function setSELLNAME(string $SELL_NAME): SellerModel
    {
        $this->SELL_NAME = $SELL_NAME;
        return $this;
    }

    /**
     * @return array
     */
    public function getSELLLOC(): array
    {
        return $this->SELL_LOC;
    }

    /**
     * @param array $SELL_LOC
     * @return SellerModel
     */
    public function setSELLLOC(array $SELL_LOC): SellerModel
    {
        $this->SELL_LOC = $SELL_LOC;
        return $this;
    }

    /**
     * @return string
     */
    public function getSELLPRES(): string
    {
        return $this->SELL_PRES;
    }

    /**
     * @param string $SELL_PRES
     * @return SellerModel
     */
    public function setSELLPRES(string $SELL_PRES): SellerModel
    {
        $this->SELL_PRES = $SELL_PRES;
        return $this;
    }

    #endregion

    #region function CRUD ProductModel

    function GetAllSellers(\PDO $bdd){
        try{
            $requete = $bdd->prepare("SELECT SELL_ID, SELL_NAME, SELL_LOC, SELL_PRES FROM SELLER");
            $execute = $requete->execute();
            return $requete->fetchAll();
        }catch (\Exception $e){
            throw $e;
        }
    }

    #endregion
}