<?php


namespace src\Controller;

use src\Model\BDD;
use src\Model\SellerModel;
use src\Model\userModel;
use src\Controller\registerSellerController;


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
                    $newKarrotteToPost = $newKarrotte->postUser(BDD::getInstance());
                    //$this->typeKarotte($_POST['prodKarotte'], $_POST['userKarotte']);
                    //header('Location:/');
                    break;
                case false :
                    //redirect to error passwd page
                    $this->twig->render('error/error404View.html.twig');
                    break;
                default :
                    //redirect to error location page
                    $this->twig->render('error/error404View.html.twig');
                    break;
            }
            $this->typeKarotte($_POST['prodKarotte'], $_POST['userKarotte']);
        }
    }
    //function to switch case by checkbox in registerView
    private function typeKarotte($seller, $user) {
        switch (true){
            case $seller == "1" AND $user == "0":
                $newSeller = new registerSellerController();
                echo $newSeller->sellerView();
                //return $this.registerSellerController::sellerView();
                break;
            case $seller == "0" AND $user == "1" :
                header('Location:/');
                break;
            case $seller == $user :
                return $this->twig->render('error/error404View.html.twig');
        }
    }

    //function to verifying passwords are the same
    private function passwordVerifying(){
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