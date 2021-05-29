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
            $passVerif = $this->passwordVerifying();
            $newKarrotte = new userModel();
            switch ($passVerif){
                case true :
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
                case false :
                    //redirect to error passwd page
                    return $this->twig->render('error/error404View.html.twig');
                    break;
                default :
                    //redirect to error location page
                    $this->twig->render('error/error404View.html.twig');
                    break;
            }
        }

    }
    //function to verifying passwords are the same
    public function passwordVerifying(){
        if(isset($_POST['itemPasswrd'])){
            $passwd = $_POST['itemPasswrd'];
        }
        if(isset($_POST['itemVerifPasswrd'])){
            $passwdVerif = $_POST['itemVerifPasswrd'];
        }
        if($passwd == $passwdVerif){
            return true;
        } else {
            return false;
        }
    }
}