<?php
namespace src\Model;
use PDO;

class user {
    private String $name;
    private String $surname;
    private String $pseudo;
    private String $password;
    private String $email;
    private String $adress;
    private String $zipCode;
    private String $city;
    private String $phoneNumber;
    private Int $id;

    /**
     * @return String
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param String $adress
     * @return user
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
        return $this;
    }

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param String $name
     * @return user
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return String
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param String $surname
     * @return user
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return String
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param String $pseudo
     * @return user
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param String $password
     * @return user
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return String
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param String $email
     * @return user
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return String
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param String $zipCode
     * @return user
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @return String
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param String $city
     * @return user
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return String
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param String $phoneNumber
     * @return user
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return Int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Int $id
     * @return user
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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

}



