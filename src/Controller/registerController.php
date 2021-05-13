<?php
//require 'src/Model/registerModel.php';
//require '../Model/BDD.php';
//require '../Model/userModel.php';
require '../Controller/bddConfig.php';

//namespace src\Controller;
/*class registerController extends AbstractController {

    public function index(){
        return $this->twig->render("register/registerView.html.twig");
    }
}*/

function postNewUserRegistering($userArray=array()){
    global $bdd;
    var_dump($userArray);
    $sql = 'INSERT INTO USER(USER_NAME,USER_SURNAME,USER_PSEUDO,USER_EMAIL,USER_ADDRESS,USER_ZIP_CODE,USER_CITY) VALUE (?,?,?,?,?,?,?)';
    $registeringData = $bdd->prepare($sql);

    //$sql = 'INSERT INTO USER(USER_NAME :userName,USER_SURNAME :userSurname,USER_PSEUDO :userPseudo,USER_EMAIL :userMail,USER_ADDRESS :userAddress,USER_ZIP_CODE :userZipCode,USER_CITY :userCity)';
    //$registeringData = $bdd->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    foreach ($userArray as $key => $valueItem){
        $registeringData->execute(array($valueItem));
        //$value = $registeringData->fetchAll();
    }

    //$sql = 'INSERT INTO USER(USER_NAME,USER_SURNAME,USER_PSEUDO,USER_EMAIL,USER_ADDRESS,USER_ZIP_CODE,USER_CITY) VALUE (?,?,?,?,?,?,?)';
    //$registeringData = $bdd->prepare('INSERT INTO USER(USER_NAME,USER_SURNAME,USER_PSEUDO,USER_EMAIL,USER_ADDRESS,USER_ZIP_CODE,USER_CITY) VALUE (?,?,?,?,?,?,?)');
    //$registeringData->execute(array($userArray));
}

function backValuesItemsPost(){
    $userItemsArray= array();
    foreach ($_POST as $valueItem){
        switch ($_POST){
            case $valueItem==$_POST['itemVerifPasswrd']:
                break;
            case $valueItem==$_POST['checkCGU']:
                break;
            case $valueItem==$_POST['joinUpBtn']:
                break;
            case $valueItem==$_POST['itemPasswrd']:
                $newUserItem= htmlspecialchars($valueItem);
                $userItemsArray[]=$newUserItem;
            default:
                if(!empty($_POST)){
                    $newUserItem= htmlspecialchars($valueItem);
                    $userItemsArray[]=$newUserItem;
                }
        }
    }
    return $userItemsArray;
}

function passwordVerifying(){
    if($_POST['itemPasswrd']==$_POST['itemVerifPasswrd']){
        return true;
    } else {
        echo "Error, passwords are not same !";
    }
}

if(isset($_POST['joinUpBtn'])){
    $returnBool = passwordVerifying();
    if ($returnBool==true){
        $itemForBDD = backValuesItemsPost();
        postNewUserRegistering($itemForBDD);
        unset($itemForBDD);
    }

    /*
    $itemForBDD = backValuesItemsPost();
    postNewUserRegistering($itemForBDD);
    unset($itemForBDD);*/
}
/*
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
    }
    else {
        echo 'error passwords !';
    }
    $userToRegisterBDD = $bdd->prepare('INSERT INTO USER(USER_NAME,USER_SURNAME,USER_PSEUDO,USER_PWD,USER_EMAIL,USER_ADDRESS,USER_ZIP_CODE,USER_CITY) VALUE (?,?,?,?,?,?,?,?)');
    $userToRegisterBDD->execute(array($newUserName,$newUserSurname,$newUserPseudo,$newUserPasswd,$newUserMail,$newUserAdress,$newUserPostCode,$newUserCity));

}*/