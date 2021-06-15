<?php


namespace src\Controller;


use src\Model\SellerModel;
use src\Model\user;
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
            return $this->twig->render("profile\userProfil.html.twig",["member"=>$memberToSegue],);
        }
    }

    public function log(){
            if (isset($_POST['okButton'])){
                $logMail = htmlentities($_POST['connMail']);
                $logPasswd = htmlentities($_POST['connPWD']);
                $verifHash = $this->verifyHash($logMail,$logPasswd);
                switch ($verifHash){
                    case true:
                        $user = new userModel();
                        $user->setUserMail($logMail);
                        $user->setUserPasswd($logPasswd);
                        $result = $user->loginUser(BDD::getInstance());
                        if($result==true){
                            $userConnected = $user->fetchUser(BDD::getInstance());
                            foreach ($userConnected as $key=>$value){
                                $_SESSION[$key]=$value;
                            }
                            $_SESSION['connected'] = true;
                            $isSeller = new SellerModel();
                            $userId = $_SESSION['USER_ID'];
                            $resultSeller = $isSeller::GetSellerInformationFromId($userId);
                            switch ($resultSeller){
                                case true:
                                    $_SESSION['isSeller'] = true;
                                    break;
                                case false:
                                    $_SESSION['isseller'] = false;
                                    break;
                                default:
                                    $_SESSION['isSeller'] = false;
                                    break;
                            }
                            header('Location:/');
                            return;
                        } else {
                            $_SESSION['connected'] = false;
                            header('Location:/');
                            return;
                        }
                    case false:
                        $_SESSION['connected'] = false;
                        header('Location:/');
                        break;
                    default:
                        $_SESSION['connected'] = false;
                        header('Location:/');

                }
            }
    }
    public function logout(){
        userModel::logout();
    }

    //function to verify the hash -- to complete for Karotte
    public function verifyHash($userMail, $userPasswd){
        try {
            if(isset($_POST['connPWD'])){
                $hash = '';
                $arrayHash = userModel::getHash(BDD::getInstance(),$userMail);
                foreach ($arrayHash as $key=>$value){
                    $hash = $value ;
                }
                if (password_verify($userPasswd, $hash)){
                    return true;
                } else {
                    return false;
                }
            }
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    //function to delete a selected account
    public function deleteAccount(){
        try{
            if(isset($_POST['deleteAccountBTN'])){
                $user = new userModel();
                $idToDelete = $user->getUserId();
                $userDelete = $this->deleteAccount($idToDelete);
                $userLogOut = $this->logout();
            } else {
                echo $this->myAccount();
            }
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }
}