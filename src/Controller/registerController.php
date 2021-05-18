<?php
require '../Model/BDD.php';
require '../Model/userModel.php';

//namespace src\Controller;
/*class registerController extends AbstractController {

    public function index(){
        return $this->twig->render("register/registerView.html.twig");
    }
}*/

function postNewUserRegistering($userArray=array()){
    try {
        $bdd = \src\Model\BDD::getInstance();
        $sql = 'INSERT INTO USER(USER_NAME,USER_SURNAME,USER_PSEUDO,USER_EMAIL,USER_ADDRESS,USER_ZIP_CODE,USER_CITY,USER_PHONE,USER_PWD) VALUE (?,?,?,?,?,?,?,?,?)';
        $userInfo = implode(';',$userArray);
        $infoToPost = explode(';',$userInfo);
        $registeringData = $bdd->prepare($sql);
        $registeringData->execute($infoToPost);
    }
    catch(Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
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
            default:
                if(!empty($_POST)){
                    $newUserItem= htmlentities($valueItem);
                    $userItemsArray[]=$newUserItem;
                }
        }
    }
    return $userItemsArray;
}
function passwordVerifying(){
    if(isset($_POST['itemPasswrd']) == isset($_POST['itemVerifPasswrd'])){
        return true;
    } else {
        echo "Error, passwords are not same !";
    }
}

if(isset($_POST['joinUpBtn'])){
    $itemForBDD = backValuesItemsPost();
    $returnBool = passwordVerifying();
    if ($returnBool==true){
        $hashedPassword = password_hash($_POST['itemPasswrd'],PASSWORD_DEFAULT);
        $itemForBDD[]=$hashedPassword;
        postNewUserRegistering($itemForBDD);
        unset($itemForBDD);
    }
}