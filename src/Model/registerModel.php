<?php

class user {
    private String $name;
    private String $surname;
    private String $pseudo;
    private String $password;
    private String $email;
    private String $zipCode;
    private String $city;
    private String $phoneNumber;
    private Int $id;

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

}

