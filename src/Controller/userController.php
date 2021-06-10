<?php


namespace src\Controller;


use src\Model\userModel;
use src\Model\BDD;

class userController extends AbstractController {

    public function connectionView(){
        return $this->twig->render("connection\connectionView.html.twig");
    }

    public function myAccount(){
        $memberId = $_SESSION['USER_ID'];
        $memberToSegue = [];
        if ($memberId == null){
            header('Location:/');
        } else{
            $memberDatas = userModel::fetchUserFromId(BDD::getInstance(), $memberId);
            foreach ($memberDatas as $key=>$value){
                if($key != "USER_PWD"){
                    $memberToSegue[$key]=html_entity_decode($value);
                } else {
                    $memberToSegue[$key]=$value;
                }
            }
            return $this->twig->render("profile\userProfil.html.twig",["member"=>$memberToSegue]);
        }
    }

    public function log(){
            if (isset($_POST['okButton'])){
                $user = new userModel();
                $user->setUserMail($_POST['connMail']);
                $user->setUserPasswd($_POST['connPWD']);
                $result = $user->loginUser(BDD::getInstance());
                if($result==true){
                    $userConnected = $user->fetchUser(BDD::getInstance());
                    foreach ($userConnected as $key=>$value){
                        $_SESSION[$key]=$value;
                    }
                    header('Location:/');
                    return;
                } else {
                    return;
                }
            }
    }
    public function logout(){
        userModel::logout();
    }
}