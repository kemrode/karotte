<?php
namespace src\Model;


class userModel
{
    public string $userName;
    public string $userSurname;
    public string $userPseudo;
    public string $userPasswd;
    public string $userMail;
    public string $userAdress;
    public int $userZipCode;
    public string $userCity;
    public int $userPhoneNumber;
    public Int $userId;

    //regular expression

    /**
     * @return string
     */
    public function getUserPasswd(): string
    {
        return $this->userPasswd;
    }

    /**
     * @param string $userPasswd
     * @return userModel
     */
    public function setUserPasswd(string $userPasswd): userModel
    {
        $this->userPasswd = $userPasswd;
        return $this;
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
     * @return userModel
     */
    public function setUserMail(string $userMail): userModel
    {
        $this->userMail = $userMail;
        return $this;
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
     * @return userModel
     */
    public function setUserAdress(string $userAdress): userModel
    {
        $this->userAdress = $userAdress;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserZipCode(): string
    {
        return $this->userZipCode;
    }

    /**
     * @param string $userZipCode
     * @return userModel
     */
    public function setUserZipCode(string $userZipCode): userModel
    {
        $this->userZipCode = $userZipCode;
        return $this;
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
     * @return userModel
     */
    public function setUserCity(string $userCity): userModel
    {
        $this->userCity = $userCity;
        return $this;
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
     * @return userModel
     */
    public function setUserPhoneNumber(string $userPhoneNumber): userModel
    {
        $this->userPhoneNumber = $userPhoneNumber;
        return $this;
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
     * @return userModel
     */
    public function setUserId(int $userId): userModel
    {
        $this->userId = $userId;
        return $this;
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
     * @return userModel
     */
    public function setUserPseudo(string $userPseudo): userModel
    {
        $this->userPseudo = $userPseudo;
        return $this;
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


    //Function to POST users info
    public function postUser(\PDO $bdd){
        try {
            $requete = $bdd->prepare("INSERT INTO USER (USER_ID, USER_NAME, USER_SURNAME, USER_PSEUDO, USER_PWD, USER_EMAIL, USER_ADDRESS, USER_ZIP_CODE, USER_CITY, USER_PHONE) VALUES (:id, :name, :surname, :pseudo, :password, :email, :address, :zipPost, :city, :phoneNumber)");
            $execute = $requete->execute([
                "USER_ID" => $this->getId(),
                "USER_NAME" => $this->getName(),
                "USER_SURNAME" => $this->getSurname(),
                "USER_PSEUDO" => $this->getPseudo(),
                "USER_PWD" => $this->getPassword(),
                "USER_EMAIL" => $this->getEmail(),
                "USER_ADDRESS" => $this->getAdress(),
                "USER_ZIP_CODE" => $this->getZipCode(),
                "USER_CITY" => $this->getCity(),
                "USER_PHONE" => $this->getPhoneNumber()
            ]);
            return "ok";
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function getUserInfo(\PDO $bdd){
        $requete = $bdd->prepare("SELECT USER_PSEUDO FROM USER");
        $requete->execute();
        return $requete->fetch(\PDO::FETCH_CLASS, "src\Model\\registerModel");
    }

    public function loginUser(\PDO $bdd){
        $mailLog = htmlentities($this->getUserMail());
        $pwdLog = htmlentities($this->getUserPasswd());
        try {
            $sql = 'SELECT USER_EMAIL, USER_PWD FROM USER WHERE USER_MAIL=:mailLog AND USER_PWD=:pwdLog';
            $request = $bdd->prepare($sql);
            $request->execute(['mailLog'=>$mailLog, 'pwdLog'=>$pwdLog]);
            return $request->fetch(\PDO::FETCH_CLASS,"src\Model\userModel");
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchUser(\PDO $bdd){
        try {
            $userConnect = $this->getUserMail();
            $sql = 'SELECT * FROM USER WHERE USER_MAIL=:userConnect';
            $request = $bdd->prepare($sql);
            $request->execute(['userConnect'=>$userConnect]);
            return $request->fetch(\PDO::FETCH_CLASS, "src\Model\userModel");
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }
}