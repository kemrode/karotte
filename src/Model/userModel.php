<?php
namespace src\Model;


class userModel
{
    #region getters and setters

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserSurname(): string
    {
        return $this->userSurname;
    }

    /**
     * @param string $userSurname
     */
    public function setUserSurname(string $userSurname): void
    {
        $this->userSurname = $userSurname;
    }

    /**
     * @return string
     */
    public function getUserPseudo(): string
    {
        return $this->userPseudo;
    }

    /**
     * @param string $userPseudo
     */
    public function setUserPseudo(string $userPseudo): void
    {
        $this->userPseudo = $userPseudo;
    }

    /**
     * @return string
     */
    public function getUserPasswd(): string
    {
        return $this->userPasswd;
    }

    /**
     * @param string $userPasswd
     */
    public function setUserPasswd(string $userPasswd): void
    {
        $this->userPasswd = $userPasswd;
    }

    /**
     * @return string
     */
    public function getUserMail(): string
    {
        return $this->userMail;
    }

    /**
     * @param string $userMail
     */
    public function setUserMail(string $userMail): void
    {
        $this->userMail = $userMail;
    }

    /**
     * @return string
     */
    public function getUserAdress(): string
    {
        return $this->userAdress;
    }

    /**
     * @param string $userAdress
     */
    public function setUserAdress(string $userAdress): void
    {
        $this->userAdress = $userAdress;
    }


    /**
     * @return string
     */
    public function getUserCity(): string
    {
        return $this->userCity;
    }

    /**
     * @param string $userCity
     */
    public function setUserCity(string $userCity): void
    {
        $this->userCity = $userCity;
    }

    /**
     * @return string
     */
    public function getUserPhoneNumber(): string
    {
        return $this->userPhoneNumber;
    }

    /**
     * @param string $userPhoneNumber
     */
    public function setUserPhoneNumber(string $userPhoneNumber): void
    {
        $this->userPhoneNumber = $userPhoneNumber;
    }


    /**
     * @return Int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param Int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserZipCode(): int
    {
        return $this->userZipCode;
    }

    /**
     * @param int $userZipCode
     */
    public function setUserZipCode(int $userZipCode): void
    {
        $this->userZipCode = $userZipCode;
    }

    #endregion

    #region attributes
    public string $userSurname;
    public string $userPseudo;
    public string $userPasswd;
    public string $userMail;
    public string $userAdress;
    public int $userZipCode;
    public string $userCity;
    public string $userPhoneNumber;
    public Int $userId;

#endregion


    public function postUser(\PDO $bdd){
        try {
            $sql = "INSERT INTO USER (USER_NAME, USER_SURNAME, USER_PSEUDO, USER_PWD, USER_EMAIL, USER_ADDRESS, USER_ZIP_CODE, USER_CITY, USER_PHONE) VALUES (:USER_NAME, :USER_SURNAME, :USER_PSEUDO, :USER_PWD, :USER_EMAIL, :USER_ADDRESS, :USER_ZIP_CODE, :USER_CITY, :USER_PHONE)";
            $requete = $bdd->prepare($sql);
            $execute = $requete->execute([
                "USER_NAME" => $this->getUserName(),
                "USER_SURNAME" => $this->getUserSurname(),
                "USER_PSEUDO" => $this->getUserPseudo(),
                "USER_PWD" => $this->getUserPasswd(),
                "USER_EMAIL" => $this->getUserMail(),
                "USER_ADDRESS" => $this->getUserAdress(),
                "USER_ZIP_CODE" => $this->getUserZipCode(),
                "USER_CITY" => $this->getUserCity(),
                "USER_PHONE" => $this->getUserPhoneNumber()
            ]);
            $id = $bdd->lastInsertId();
            $this->setUserId($id);
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
        try {
            $mailLog = htmlentities($this->getUserMail());
            $pwdLog = htmlentities($this->getUserPasswd());
            $sql = 'SELECT USER_EMAIL, USER_PWD FROM USER WHERE USER_EMAIL=:mailLog LIMIT 1';
            sleep(1);
            $request = $bdd->prepare($sql);
            $request->setFetchMode(\PDO::FETCH_CLASS, "src\Model\userModel");
            $request->execute(['mailLog'=>$mailLog]);
            return $request->fetch();
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchUser(\PDO $bdd){
        try {
            $userConnect = $this->getUserMail();
            $sql = 'SELECT * FROM USER WHERE USER_EMAIL=:userConnect';
            $request = $bdd->prepare($sql);
            $request->setFetchMode(\PDO::FETCH_CLASS, "src\Model\userModel");
            $request->execute(['userConnect'=>$userConnect]);
            return $request->fetch();
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public static function fetchUserFromId(\PDO $bdd, $userId){
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
            'query' => "${address}+${zipCode}+${city}",
            'fields' => 'results.latitude',
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
    public function updateMember(\PDO $bdd, $id){
        try {
            $sql = 'UPDATE USER SET USER_EMAIL=:userMail, USER_PSEUDO=:userNickname, USER_PWD=:userPwd, USER_ADDRESS=:userAddress, USER_ZIP_CODE=:userZipCode, USER_CITY=:userCity, USER_PHONE=:userPhone WHERE USER_ID=:userId';
            $request = $bdd->prepare($sql);
            $request->execute([
                "userMail"=> $this->getUserMail(),
                "userNickname"=>$this->getUserPseudo(),
                "userPwd"=>$this->getUserPasswd(),
                "userAddress"=>$this->getUserAdress(),
                "userZipCode"=>$this->getUserZipCode(),
                "userCity"=>$this->getUserCity(),
                "userPhone"=>$this->getUserPhoneNumber(),
                "userId"=>$id
            ]);
            return true;
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public static function logout(){
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location:/');
    }

    //function to get the hash
    public static function getHash(\PDO $bdd, $userMail){
        try {
            $sql = 'SELECT USER_PWD from USER WHERE USER_EMAIL=:userMail LIMIT 1';
            $request = $bdd->prepare($sql);
            $request->setFetchMode(\PDO::FETCH_CLASS, 'src\Model\userModel');
            $request->execute(["userMail"=>$userMail]);
            return $request->fetch();
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }
}