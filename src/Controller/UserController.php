<?php


namespace src\Controller;
use src\Model\userModel;
use src\Model\BDD;

class UserController extends AbstractController
{
    public function Login(){
        if(isset($_REQUEST['btn_login'])){
            $userEmail = $_REQUEST['userEmail'];
            $userPwd = $_REQUEST['userPwd'];
            /*$role = $_REQUEST['txt_role'];*/

            if(empty($userEmail)){
                $errorMsg[]="please enter login";
            }else if(empty($userPwd)){
                $errorMsg[]="please enter password";
            }/*else if(empty($role)){
                $errorMsg[]="please select role";
            }*/else if($userEmail AND $userPwd /*AND $role*/){

                $user = new userModel();
                $user->setUserMail($userEmail);
                $user->setUserPasswd($userPwd);
                /*$user->setRole($role);*/

                $result = $user->Login(BDD::getInstance());

                if ($result == "admin"){
                    return $this->twig->render("User/Admin/adminHome.html.twig", ['session' => $_SESSION]);
                    /*return $this->twig->render("admin/admin_home.php");*/
                }elseif ($result == "user"){
                    return $this->twig->render("test.html.twig", ['session' => $_SESSION]);
                }else{
                    echo "pb1";
                }
            }
        }else{
            echo "pb2";
        }
    }

    public function getLoginView(){
        return $this->twig->render("connection/connectionView.html.twig");
    }

}