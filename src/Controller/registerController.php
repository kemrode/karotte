<?php


namespace src\Controller;

use src\Model\BDD;
use src\Model\userModel;


class registerController extends AbstractController
{
    public function registerView(){
        return $this->twig->render('register/registerView.html.twig');
    }

    public function postNewUser(){
        if(isset($_POST['joinUpBtn'])){
            echo 'entrée dans la fonction';
            $passVerif = $this->passwordVerifying();
            $newKarrotte = new userModel();
            switch ($passVerif){
                case $passVerif == true :
                    $newKarrotte->setUserName($_POST['itemName']);
                    $newKarrotte->setUserSurname($_POST['itemSurname']);
                    $newKarrotte->setUserPseudo($_POST['itemPseudo']);
                    $newKarrotte->setUserPasswd(password_hash($_POST['itemPasswrd'], PASSWORD_DEFAULT));
                    $newKarrotte->setUserMail($_POST['itemMail']);
                    $newKarrotte->setUserAdress($_POST['itemAdress']);
                    $newKarrotte->setUserZipCode($_POST['itemPostCode']);
                    $newKarrotte->setUserCity($_POST['itemCity']);
                    $newKarrotte->setUserPhoneNumber($_POST['itemPhone']);
                    //$sql = "INSERT INTO USER (USER_NAME, USER_SURNAME, USER_PSEUDO, USER_PWD, USER_EMAIL, USER_ADDRESS, USER_ZIP_CODE, USER_CITY, USER_PHONE) VALUES (:name, :surname, :pseudo, :password, :email, :address, :zipPost, :city, :phoneNumber)";
                    $newKarrotteToPost = $newKarrotte->postUser(BDD::getInstance());
                    var_dump($newKarrotteToPost);
                    header('Location:/');
                    break;
                case $passVerif == false :
                    //redirect to error page
                    var_dump($newKarrotte);
                    break;
            }
        }

    }
    //function to verifying passwords are the same
    public function passwordVerifying(){
        if(isset($_POST['itemPasswrd']) == isset($_POST['itemVerifPasswrd'])){
            return true;
        } else {
            return false;
        }
    }
/*
    public function postNewKarotte($userArray=array(), $sql){
        try {
            $bdd = \src\Model\BDD::getInstance();
            $userInfo = implode(';',$userArray);
            $infoToPost = explode(';',$userInfo);
            $registeringData = $bdd->prepare($sql);
            $registeringData->execute($infoToPost);
            //$id=$bdd->lastInsertID();
        }
        catch(Exception $e) {
            die('Erreur :'.$e->getMessage());
        }
    }
*/
    /*
    public function backValuesItemsPost(){
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
    */

/*
    public function newKarotteUser($sql){
        $itemForBDD = backValuesItemsPost();
        $hashedPassword = password_hash($_POST['itemPasswrd'],PASSWORD_DEFAULT);
        $itemForBDD[]=$hashedPassword;
        postNewKarotte($itemForBDD, $sql);
        unset($itemForBDD);
    }
*/

    /*
if(isset($_POST['joinUpBtn'])){
    $returnBool = passwordVerifying();
    $prod = $_POST['prodKarotte'];
    if ($returnBool==true){
        $sql = 'INSERT INTO USER(USER_NAME,USER_SURNAME,USER_PSEUDO,USER_EMAIL,USER_ADDRESS,USER_ZIP_CODE,USER_CITY,USER_PHONE,USER_PWD) VALUE (?,?,?,?,?,?,?,?,?)';
        newKarotteUser($sql);
        if ($prod=="1"){
            header('Location');
        }
    }
}
    */

}