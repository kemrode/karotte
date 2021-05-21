<?php
namespace src\Model;


class userModel
{

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
     * @return int
     */
    public function getUserPhoneNumber(): int
    {
        return $this->userPhoneNumber;
    }

    /**
     * @param int $userPhoneNumber
     */
    public function setUserPhoneNumber(int $userPhoneNumber): void
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
}