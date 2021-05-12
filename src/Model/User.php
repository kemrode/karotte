<?php


namespace src\Model;

class User
{
    private Int $id;
    private String $name;
    private String $surname;
    private String $pseudo;
    private String $password;
    private String $email;
    private String $address;
    private String $zipCode;
    private String $city;
    private String $phoneNumber;

    /**
     * @return Int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param Int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return String
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param String $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return String
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param String $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return String
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param String $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return String
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param String $zipCode
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return String
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param String $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return String
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param String $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }


    //CREATE
    public function AddUser(\PDO $bdd){
        try {
            $requete = $bdd->prepare("INSERT INTO USER ( USER_NAME, USER_SURNAME, USER_PSEUDO, 
                  USER_PWD, USER_EMAIL, USER_ADDRESS, USER_ZIP_CODE, USER_CITY, USER_PHONE) 
                  VALUES ( :USER_NAME, :USER_SURNAME, :USER_PSEUDO, :USER_PWD, :USER_EMAIL, :USER_ADDRESS, 
                          :USER_ZIP_CODE, :USER_CITY, :USER_PHONE)");
            $execute = $requete->execute([
                "USER_NAME" => $this->getName(),
                "USER_SURNAME" => $this->getSurname(),
                "USER_PSEUDO" => $this->getPseudo(),
                "USER_PWD" => $this->getPassword(),
                "USER_EMAIL" => $this->getEmail(),
                "USER_ADDRESS" => $this->getAddress(),
                "USER_ZIP_CODE" => $this->getZipCode(),
                "USER_CITY" => $this->getCity(),
                "USER_PHONE" => $this->getPhoneNumber()
            ]);
            return "ok";

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    //READ

    public function GetAllUsers(\PDO $bdd){
        try {
            $requete = $bdd->prepare("SELECT USER_ID, USER_NAME, USER_SURNAME, USER_PSEUDO, 
                  USER_PWD, USER_EMAIL, USER_ADDRESS, USER_ZIP_CODE, USER_CITY, USER_PHONE FROM USER");
            $execute = $requete->execute();
            return $requete->fetchAll();

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function GetUserById(\PDO $bdd){
        $id = $_REQUEST['param'];
        try {
            $requete = $bdd->prepare("SELECT USER_ID, USER_NAME, USER_SURNAME, USER_PSEUDO, 
                  USER_PWD, USER_EMAIL, USER_ADDRESS, USER_ZIP_CODE, USER_CITY, USER_PHONE FROM USER WHERE USER_ID =:id");
            $requete->bindParam(':id', $id);
            $execute = $requete->execute();
            return $requete->fetch();

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    //UPDATE
    public function UpdateUser(\PDO $bdd){
        $id = $_REQUEST['param'];
        var_dump($id);
        $username_up = $_POST['username'];
        $userSurname_up = $_POST['userSurname'];
        $userPseudo_up = $_POST['userPseudo'];
        $userPwd_up = $_POST['userPwd'];
        $userEmail_up = $_POST['userEmail'];
        $userAddress_up = $_POST['userAddress'];
        $userZipCode_up = $_POST['userZipCode'];
        $userCity_up = $_POST['userCity'];
        $userPhone_up = $_POST['userPhone'];

        // ADD USER ROLE ? SELLER OR NOT ?

        try {
            $requete = $bdd->prepare("UPDATE USER SET USER_NAME=:username_up, USER_SURNAME=:userSurname_up, 
                USER_PSEUDO=:userPseudo_up, USER_PWD=:userPwd_up, USER_EMAIL=:userEmail_up, USER_ADDRESS=:userAddress_up, 
                USER_ZIP_CODE=:userZipCode_up, USER_CITY=:userCity_up, USER_PHONE=:userPhone_up WHERE USER_ID=:id");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':username_up', $username_up);
            $requete->bindParam(':userSurname_up', $userSurname_up);
            $requete->bindParam(':userPseudo_up', $userPseudo_up);
            $requete->bindParam(':userPwd_up', $userPwd_up);
            $requete->bindParam(':userEmail_up', $userEmail_up);
            $requete->bindParam(':userAddress_up', $userAddress_up);
            $requete->bindParam(':userZipCode_up', $userZipCode_up);
            $requete->bindParam(':userCity_up', $userCity_up);
            $requete->bindParam(':userPhone_up', $userPhone_up);
            $execute = $requete->execute();
            return "updated";

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }


    //DELETE
    public function DeleteUser(\PDO $bdd){
        $id = $_REQUEST['param'];
        /*var_dump($id);*/
        try {
            $requete = $bdd->prepare("DELETE FROM USER WHERE USER_ID =:id");
            $requete->bindParam(':id', $id);
            $execute = $requete->execute();
            return "deleted";

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }


    public function Login(\PDO $bdd){
        $userEmail = $_POST['userEmail'];
        $userPwd = $_POST['userPwd'];
        /*$role = $_POST['txt_role'];*/
        $password_hash = password_hash($_POST['userPwd'], PASSWORD_DEFAULT);

        try {
            $requete = $bdd->prepare("SELECT USER_EMAIL,USER_PWD FROM USER WHERE USER_EMAIL=:userEmail 
                                              AND USER_PWD=:userPwd");
            $requete->bindParam(":userEmail", $userEmail);
            $requete->bindParam(":userPwd", $userPwd);
            $requete->execute();

            while ($row = $requete->fetch(\PDO::FETCH_ASSOC)){
                $dbUserEmail = $row["USER_EMAIL"];
                $dbUserPwd = $row["USER_PWD"];
            }
            /*if (password_verify($dbpassword, $password_hash)){
                echo "coucou";
            }*/

            if($userEmail != null AND $userPwd != null){
                if($requete->rowCount() > 0){
                    if($userEmail == $dbUserEmail AND $userPwd == $dbUserPwd /*AND $role == $dbrole*/){
                        $_SESSION["user_login"] = $userEmail;
                        return "user";

                        /*switch ($dbrole){
                            case "admin":
                                $_SESSION["admin_login"] = $login;
                                $loginMsg = "Admin successfully login !";
                                return "admin";
                                break;

                            case "membre":
                                $_SESSION["membre_login"] = $login;
                                $loginMsg = "Membre successfully login !";
                                return "membre";
                                break;

                            default:
                                $errorMsg[] = "wrong login or password or role";
                        }*/
                    }else {
                        $errorMsg[] = "wrong login or password or role";
                    }
                }else {
                    $errorMsg[] = "wrong login or password or role";
                }
            }else {
                $errorMsg[] = "wrong login or password or role";
            }

            return $requete->fetch();

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

}