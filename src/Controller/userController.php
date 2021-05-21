<?php


namespace src\Controller;


use src\Model\userModel;
use src\Model\BDD;

class userController extends AbstractController {

    public function log(){
            if (isset($_POST['okButton'])){
                $user = new userModel();
                $user->setUserMail($_POST['connMail']);
                $user->setUserPasswd($_POST['connPwd']);
                $result = $user->loginUser(BDD::getInstance());
                if($result==true){
                    $userConnected = $user->fetchUser(BDD::getInstance());
                    $_SESSION['userName'] = $userConnected->getUserName();
                    $_SESSION['userSurname'] = $userConnected->getUserSurname();
                    $_SESSION['userPseudo'] = $userConnected->getUserZipCode();
                    $_SESSION['userMail'] = $userConnected->getUserMail();
                    $_SESSION['userAddress'] = $userConnected->getUserAdress();
                    $_SESSION['userZipCode'] = $userConnected->getUserZipCode();
                    $_SESSION['userCity'] = $userConnected->getUserCity();
                    $_SESSION['userPhone'] = $userConnected->getUserPhoneNumber();
                    header('Location:/');
                    return;
                } else {
                    return;
                }
            }
    }
}