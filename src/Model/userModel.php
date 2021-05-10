<?php


namespace src\Model;
use PDO;


class userModel
{
    private string $userName;
    private string $userSurname;
    private string $userPseudo;
    private string $userPasswd;
    private string $userMail;
    private string $userAdress;
    private string $userZipCode;
    private string $userCity;
    private string $userPhoneNumber;
    private Int $userId;

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
     * @return userModel
     */
    public function setUserSurname(string $userSurname): userModel
    {
        $this->userSurname = $userSurname;
        return $this;
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
     * @return userModel
     */
    public function setUserName(string $userName): userModel
    {
        $this->userName = $userName;
        return $this;
    }
}