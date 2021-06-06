<?php
namespace src\Model;


class userModel
{

    #region getters and setters

    /**
     * @return Int
     */
    public function getUSERID(): int
    {
        return $this->USER_ID;
    }

    /**
     * @param Int $USER_ID
     * @return userModel
     */
    public function setUSERID(int $USER_ID): userModel
    {
        $this->USER_ID = $USER_ID;
        return $this;
    }

    /**
     * @return string
     */
    public function getUSERNAME(): string
    {
        return $this->USER_NAME;
    }

    /**
     * @param string $USER_NAME
     * @return userModel
     */
    public function setUSERNAME(string $USER_NAME): userModel
    {
        $this->USER_NAME = $USER_NAME;
        return $this;
    }

    /**
     * @return string
     */
    public function getUSERSURNAME(): string
    {
        return $this->USER_SURNAME;
    }

    /**
     * @param string $USER_SURNAME
     * @return userModel
     */
    public function setUSERSURNAME(string $USER_SURNAME): userModel
    {
        $this->USER_SURNAME = $USER_SURNAME;
        return $this;
    }

    /**
     * @return string
     */
    public function getUSERPSEUDO(): string
    {
        return $this->USER_PSEUDO;
    }

    /**
     * @param string $USER_PSEUDO
     * @return userModel
     */
    public function setUSERPSEUDO(string $USER_PSEUDO): userModel
    {
        $this->USER_PSEUDO = $USER_PSEUDO;
        return $this;
    }

    /**
     * @return string
     */
    public function getUSERPWD(): string
    {
        return $this->USER_PWD;
    }

    /**
     * @param string $USER_PWD
     * @return userModel
     */
    public function setUSERPWD(string $USER_PWD): userModel
    {
        $this->USER_PWD = $USER_PWD;
        return $this;
    }

    /**
     * @return string
     */
    public function getUSEREMAIL(): string
    {
        return $this->USER_EMAIL;
    }

    /**
     * @param string $USER_EMAIL
     * @return userModel
     */
    public function setUSEREMAIL(string $USER_EMAIL): userModel
    {
        $this->USER_EMAIL = $USER_EMAIL;
        return $this;
    }

    /**
     * @return string
     */
    public function getUSERADDRESS(): string
    {
        return $this->USER_ADDRESS;
    }

    /**
     * @param string $USER_ADDRESS
     * @return userModel
     */
    public function setUSERADDRESS(string $USER_ADDRESS): userModel
    {
        $this->USER_ADDRESS = $USER_ADDRESS;
        return $this;
    }

    /**
     * @return int
     */
    public function getUSERZIPCODE(): int
    {
        return $this->USER_ZIP_CODE;
    }

    /**
     * @param int $USER_ZIP_CODE
     * @return userModel
     */
    public function setUSERZIPCODE(int $USER_ZIP_CODE): userModel
    {
        $this->USER_ZIP_CODE = $USER_ZIP_CODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getUSERCITY(): string
    {
        return $this->USER_CITY;
    }

    /**
     * @param string $USER_CITY
     * @return userModel
     */
    public function setUSERCITY(string $USER_CITY): userModel
    {
        $this->USER_CITY = $USER_CITY;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUSERPHONE(): ?string
    {
        return $this->USER_PHONE;
    }

    /**
     * @param string|null $USER_PHONE
     * @return userModel
     */
    public function setUSERPHONE(?string $USER_PHONE): userModel
    {
        $this->USER_PHONE = $USER_PHONE;
        return $this;
    }


    #endregion

    #region attributes
    public Int $USER_ID;
    public string $USER_NAME;
    public string $USER_SURNAME;
    public string $USER_PSEUDO;
    public string $USER_PWD;
    public string $USER_EMAIL;
    public string $USER_ADDRESS;
    public int $USER_ZIP_CODE;
    public string $USER_CITY;
    public ?string $USER_PHONE;

#endregion


    public function postUser(\PDO $bdd){
        try {
            $sql = "INSERT INTO USER (USER_NAME, USER_SURNAME, USER_PSEUDO, USER_PWD, USER_EMAIL, USER_ADDRESS, USER_ZIP_CODE, USER_CITY, USER_PHONE) VALUES (:USER_NAME, :USER_SURNAME, :USER_PSEUDO, :USER_PWD, :USER_EMAIL, :USER_ADDRESS, :USER_ZIP_CODE, :USER_CITY, :USER_PHONE)";
            $requete = $bdd->prepare($sql);
            $execute = $requete->execute([
                "USER_NAME" => $this->getUSERNAME(),
                "USER_SURNAME" => $this->getUSERSURNAME(),
                "USER_PSEUDO" => $this->getUSERPSEUDO(),
                "USER_PWD" => $this->getUSERPWD(),
                "USER_EMAIL" => $this->getUSEREMAIL(),
                "USER_ADDRESS" => $this->getUSERADDRESS(),
                "USER_ZIP_CODE" => $this->getUSERZIPCODE(),
                "USER_CITY" => $this->getUSERCITY(),
                "USER_PHONE" => $this->getUSERPHONE()
            ]);
            $id = $bdd->lastInsertId();
            $this->setUSERID($id);
            $_SESSION['userId'] = $id;
            return "ok";
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function getUserInfo(\PDO $bdd){
        $sql = "SELECT USER_PSEUDO FROM USER";
        $requete = $bdd->prepare($sql);
        $requete->execute();
        return $requete->fetch(\PDO::FETCH_CLASS, "src\Model\\registerModel");
    }

    public function loginUser(\PDO $bdd){
        $mailLog = htmlentities($this->getUSEREMAIL());
        $pwdLog = htmlentities($this->getUSERPWD());
        try {
            $sql = 'SELECT USER_EMAIL, USER_PWD FROM USER WHERE USER_EMAIL=:mailLog AND USER_PWD=:pwdLog';
            $request = $bdd->prepare($sql);
            $request->setFetchMode(\PDO::FETCH_CLASS, "src\Model\userModel");
            $request->execute(['mailLog'=>$mailLog, 'pwdLog'=>$pwdLog]);
            return $request->fetch();
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchUser(\PDO $bdd){
        try {
            $userConnect = $this->getUSEREMAIL();
            $sql = 'SELECT * FROM USER WHERE USER_EMAIL=:userConnect';
            $request = $bdd->prepare($sql);
            $request->setFetchMode(\PDO::FETCH_CLASS, "src\Model\userModel");
            $request->execute(['userConnect'=>$userConnect]);
            return $request->fetch();
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public static function fetchUserFromId($userId){
        try {
            $bdd = BDD::getInstance();
            $sql = 'SELECT * FROM USER WHERE USER_ID=:userId';
            $request = $bdd->prepare($sql);
            $request->execute(['userId'=>$userId]);
            return $request->fetch();
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }


    public static function GetCoordinatesFromAdress($address, $zipCode, $city){
        try{
            // query construction using global variable of the api key
            $buildQuery = http_build_query([
            'access_key' => positionstackApiKey,
            'query' => "${address} ${zipCode} ${city}",
            'fields' => 'results.latitude',
            'country'=> 'FR',
            'limit' => 1
        ]);
        $baseUrl= "http://api.positionstack.com/v1/forward";

        $curl = curl_init(sprintf('%s?%s', $baseUrl, $buildQuery));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $responseData = json_decode(curl_exec($curl),true);
        curl_close($curl);

        // If the response is not null, contains a field 'data' and the latitude is not null
        if($responseData != null){
            if(count($responseData['data'])>0){
                if(array_key_exists('latitude', $responseData['data'][0])){
                    return $responseData['data'][0]["latitude"].";".$responseData['data'][0]["longitude"];
                }
            }
        }
        // Else throw an exception
        throw new \Exception("L'adresse renseignée n'est pas valide");

        }catch(\Exception $e) {
            throw $e;
        }
    }

    public function UpdateUserInfo(){
        try {
            $bdd = BDD::getInstance();
            $sql = "UPDATE USER set USER_ADDRESS=:userAddress, USER_ZIP_CODE=:userZip, USER_CITY=:userCity, USER_PHONE=:userPhone WHERE USER_ID=:userId";
            $requete = $bdd->prepare($sql);
            $requete->execute([
                "userAddress" => $this->getUSERADDRESS(),
                "userZip" => $this->getUSERZIPCODE(),
                "userCity" => $this->getUSERCITY(),
                "userPhone" => $this->getUSERPHONE(),
                "userId" => $this->getUSERID(),
            ]);
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }
}