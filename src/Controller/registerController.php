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
                    $newKarrotte->setUserName(htmlentities($_POST['itemName']));
                    $newKarrotte->setUserSurname(htmlentities($_POST['itemSurname']));
                    $newKarrotte->setUserPseudo(htmlentities($_POST['itemPseudo']));
                    $newKarrotte->setUserPasswd(password_hash(htmlentities($_POST['itemPasswrd']), PASSWORD_DEFAULT));
                    $newKarrotte->setUserMail(htmlentities($_POST['itemMail']));
                    $newKarrotte->setUserAdress(htmlentities($_POST['itemAdress']));
                    $newKarrotte->setUserZipCode(htmlentities($_POST['itemPostCode']));
                    $newKarrotte->setUserCity(htmlentities($_POST['itemCity']));
                    $newKarrotte->setUserPhoneNumber(htmlentities($_POST['itemPhone']));
                    //function to know if someone is already inside the bdd
                    $isAlreadyInDB = $newKarrotte::isAlreadyInside(BDD::getInstance(),$newKarrotte->getUserMail());
                    if($isAlreadyInDB == true){
                        header('Location:/');
                    } else {
                        $newKarrotteToPost = $newKarrotte->postUser(BDD::getInstance());
                        break;
                    }
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