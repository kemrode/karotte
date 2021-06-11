<?php
namespace src\Model;

use JsonSchema\Exception\ResourceNotFoundException;

class SellerModel{
    #region properties SellerModel

    private int $SELL_ID;
    private string $SELL_NAME;
    private string $SELL_LOC;
    private string $SELL_PRES;

    #endregion

    #region getters and setters ProductModel

    public function __set($name, $value)
    {
        $this->$name = $value;
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
     * @return string
     */
    public function getSELLLOC(): string
    {
        return $this->SELL_LOC;
    }

    /**
     * @param string $SELL_LOC
     * @return SellerModel
     */
    public function setSELLLOC(string $SELL_LOC): SellerModel
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


    #region POST

    public function postNewSeller(\PDO $bdd){
        try {
            $sql = 'INSERT INTO SELLER (SELL_ID, SELL_NAME, SELL_LOC, SELL_PRES) VALUES (:SELL_ID,:SELL_NAME,:SELL_LOC,:SELL_PRES)';
            $request = $bdd->prepare($sql);
            $request->execute([
                "SELL_ID" => $this->getSELLID(),
               "SELL_NAME" => $this->getSELLNAME(),
               "SELL_LOC" => $this->getSELLLOC(),
               "SELL_PRES" => $this->getSELLPRES()
            ]);
            return "ok";

        } catch (\Exception $e){
            throw $e;
        }
    }
    #endregion

    #region GET

    public static function GetAllSellers(){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT SELL_ID, SELL_NAME, SELL_LOC, SELL_PRES FROM SELLER");
            $requete->execute();
            return $requete->fetchAll();
        }catch (\Exception $e){
            throw $e;
        }
    }
    public static function GetAllSellerLocationAndIdAndName(){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT SELL_ID, SELL_LOC, SELL_NAME FROM SELLER");
            $requete->execute();
            return $requete->fetchAll();
        }catch (\Exception $e){
            throw $e;
        }
    }
    public static function GetSellerInformationFromId($id){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("SELECT SELL_ID, SELL_NAME, SELL_LOC, SELL_PRES FROM SELLER WHERE SELL_ID=:SELL_ID");
            $requete->execute([
                "SELL_ID" => $id
            ]);
            return $requete->fetch();
        }catch (\Exception $e){
            throw $e;
        }
    }

    public static function GetSellerAndUserInformationFromId($id){

        $info = [];
        try {
            $info['seller'] = self::GetSellerInformationFromId($id);
            $info['user'] = userModel::fetchUserFromId(BDD::getInstance(),$id);
            return $info;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    #endregion

    #region PUT
    public function UpdateSellerInfo(){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("UPDATE SELLER SET SELL_NAME=:sellName, SELL_PRES=:sellPres, SELL_LOC=:sellLoc WHERE SELL_ID=:sellId");
            return  $requete->execute([
                "sellName" => $this->getSELLNAME(),
                "sellPres" => $this->getSELLPRES(),
                "sellLoc" => $this->getSELLLOC(),
                "sellId" => $this->getSELLID(),
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }

    public function UpdateSellerLocInfo(){
        try{
            $bdd = BDD::getInstance();
            $requete = $bdd->prepare("UPDATE SELLER SET SELL_LOC=:sellLoc WHERE SELL_ID=:sellId");
            return  $requete->execute([
                "sellLoc" => $this->getSELLLOC(),
                "sellId" => $this->getSELLID()
            ]);
        }catch (\Exception $e){
            throw $e;
        }
    }

    #endregion
}
