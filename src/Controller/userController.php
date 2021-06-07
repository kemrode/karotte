<?php


namespace src\Controller;


use src\Model\userModel;
use src\Model\BDD;

class userController extends AbstractController {

    public function connectionView(){
        return $this->twig->render("connection\connectionView.html.twig");
    }

    public function log(){
            if (isset($_POST['okButton'])){
                $user = new userModel();
                $user->setUSEREMAIL($_POST['connMail']);
                $user->setUSERPWD($_POST['connPWD']);
                $result = $user->loginUser(BDD::getInstance());
                if($result==true){
                    $userConnected = $user->fetchUser(BDD::getInstance());
                    foreach ($userConnected as $key=>$value){
                        $_SESSION[$key]=$value;
                        $_SESSION["basket"] = array();
                    }
                    header('Location:/');
                    return;
                } else {
                    return;
                }
            }
    }
}