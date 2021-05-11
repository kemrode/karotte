<?php
//require 'src/Model/registerModel.php';
//require '../Model/BDD.php';
require '../Controller/bddConfig.php';
require '../Model/userModel.php';

//namespace src\Controller;
/*class registerController extends AbstractController {

    public function index(){
        return $this->twig->render("register/registerView.html.twig");
    }
}*/

if (isset($_POST['joinUpBtn'])){
    if (!empty($_POST['itemName'])){
        $newUserName=htmlspecialchars($_POST['itemName']);
    }
    if (!empty($_POST['itemSurname'])){
        $newUserSurname=htmlspecialchars($_POST['itemSurname']);
    }
    if (!empty($_POST['itemPseudo'])){
        $newUserPseudo=htmlspecialchars($_POST['itemPseudo']);
    }
    if(!empty($_POST['itemAdress'])){
        $newUserAdress=htmlspecialchars($_POST['itemAdress']);
    }
    if(!empty($_POST['itemPostCode'])){
        $newUserPostCode=htmlspecialchars($_POST['itemPostCode']);
    }
    if (!empty($_POST['itemCity'])){
        $newUserCity=htmlspecialchars($_POST['itemCity']);
        $newUserCity;
    }
    if(!empty($_POST['itemMail'])){
        $newUserMail=htmlspecialchars($_POST['itemMail']);
        $newUserMail;
    }

    $newUserPassword=htmlspecialchars($_POST['itemPasswrd']);
    $newUserPasswrdVerif=htmlspecialchars($_POST['itemPasswrdVerif']);
    if($newUserPassword == $newUserPasswrdVerif){
        $newUserPasswd=$newUserPassword;
        echo $newUserPasswd;
    }
    else {
        echo 'error passwords !';
    }
    $userToRegisterBDD = $bdd->prepare('INSERT INTO USER(USER_NAME,USER_SURNAME,USER_PSEUDO,USER_PWD,USER_EMAIL,USER_ADDRESS,USER_ZIP_CODE,USER_CITY) VALUE (?,?,?,?,?,?,?,?)');
    $userToRegisterBDD->execute(array($newUserName,$newUserSurname,$newUserPseudo,$newUserPasswd,$newUserMail,$newUserAdress,$newUserPostCode,$newUserCity));

}