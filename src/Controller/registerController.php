<?php
require '../Model/BDD.php';
require '../Model/userModel.php';

//namespace src\Controller;
/*class registerController extends AbstractController {

    public function index(){
        return $this->twig->render("register/registerView.html.twig");
    }
}*/

function postNewKarotte($userArray=array(), $sql){
    try {
        $bdd = \src\Model\BDD::getInstance();
        $userInfo = implode(';',$userArray);
        $infoToPost = explode(';',$userInfo);
        $registeringData = $bdd->prepare($sql);
        $registeringData->execute($infoToPost);
        $id=$bdd->lastInsertID();
    }
    catch(Exception $e) {
        die('Erreur :'.$e->getMessage());
    }
    return $id;
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
            case $valueItem==$_POST['prodKarotte']:
                break;
            case $valueItem==$_POST['userKarotte']:
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
function newKarotteUser(){
    $itemForBDD = backValuesItemsPost();
    $hashedPassword = password_hash($_POST['itemPasswrd'],PASSWORD_DEFAULT);
    $itemForBDD[]=$hashedPassword;
    $sql = 'INSERT INTO USER(USER_NAME,USER_SURNAME,USER_PSEUDO,USER_EMAIL,USER_ADDRESS,USER_ZIP_CODE,USER_CITY,USER_PHONE,USER_PWD) VALUE (?,?,?,?,?,?,?,?,?)';
    postNewKarotte($itemForBDD, $sql);
    unset($itemForBDD);
}

if(isset($_POST['joinUpBtn'])){
    $returnBool = passwordVerifying();
    $prod = $_POST['prodKarotte'];
    if ($returnBool==true){
        if ($prod=="0"){
            echo 'je suis dedans';
            newKarotteUser();
        }
        else {
            $id=newKarotteUser();
            var_dump($id);
            $sql='INSERT INTO SELLER(SELL_ID,SELL_NAME,SELL_LOC,SELL_PRES) VALUE(?,?,?,?)';
            //recupere l'ID user
            //inserer l'id et les infos spéciales dans la table vendeur
        }
    }
}
