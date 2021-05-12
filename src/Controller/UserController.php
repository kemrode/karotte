<?php


namespace src\Controller;


use src\Model\BDD;
use src\Model\User;

class UserController extends AbstractController
{
    public function List(){
        session_start();
        if(isset($_SESSION["user_login"])){
            /*header("location: admin/admin_home.php");*/
            $user = new User();
            $userList = $user->GetAllUsers(BDD::getInstance());

            /*header("location: User/list.html");*/
            return $this->twig->render("User/Admin/list.html.twig", [
                "userList" => $userList
            ]);
        }else {
            header("Location:/");
        }
    }

    public function GetUserById($id){
        session_start();
        if(isset($_SESSION["user_login"])) {
            if (isset($id)) {
                $user = new User();
                $user->setId($id);
                $userForm = $user->GetUserById(BDD::getInstance());

                return $this->twig->render("User/Admin/edit.html.twig", ["userForm" => $userForm]);
            }
        }else{
            echo "nope";
        }
    }

    public function Add(){
        if(isset($_POST["username"],$_POST["userSurname"], $_POST["userPseudo"], $_POST["userPwd"], $_POST['userEmail'],
            $_POST['userAddress'], $_POST['userZipCode'], $_POST['userCity'], $_POST['userPhone'])){
            // Handle form
            echo "coucou";
            $user = new User();
            $user->setName($_POST["username"]);
            $user->setSurname($_POST["userSurname"]);
            $user->setPseudo($_POST["userPseudo"]);
            $user->setPassword($_POST["userPwd"]);
            $user->setEmail($_POST["userEmail"]);
            $user->setAddress($_POST["userAddress"]);
            $user->setZipCode($_POST["userZipCode"]);
            $user->setCity($_POST["userCity"]);
            $user->setPhoneNumber($_POST["userPhone"]);

            $result = $user->AddUser(BDD::getInstance());
            echo "test";
            if($result == "ok"){
                // redirection
                echo "hello";
                header("Location:");
                return $this->twig->render("Home/login.html.twig");

            }else{
                echo "Inscription échouée";
            }
        }else{
            // Formulaire html
            echo "Pb";
        }
    }

    public function Update($id){
        /*var_dump($id);*/
        session_start();
        if(isset($_SESSION["user_login"])) {
            /*var_dump($id);*/
            if (isset($id)) {

                $username_up = $_REQUEST['username'];
                $userSurname_up = $_REQUEST['userSurname'];
                $userPseudo_up = $_REQUEST['userPseudo'];
                $userPwd_up = $_REQUEST['userPwd'];
                $userEmail_up = $_REQUEST['userEmail'];
                $userAddress_up = $_REQUEST['userAddress'];
                $userZipCode_up = $_REQUEST['userZipCode'];
                $userCity_up = $_REQUEST['userCity'];
                $userPhone_up = $_REQUEST['userPhone'];

                $user = new User();
                $user->setId($id);
                $user->setName($username_up);
                $user->setSurname($userSurname_up);
                $user->setPseudo($userPseudo_up);
                $user->setPassword($userPwd_up);
                $user->setEmail($userEmail_up);
                $user->setAddress($userAddress_up);
                $user->setZipCode($userZipCode_up);
                $user->setCity($userCity_up);
                $user->setPhoneNumber($userPhone_up);
                var_dump($user);
                $result = $user->UpdateUser(BDD::getInstance());

                if ($result == "updated") {
                    header("Location:/?controller=user&action=list");
                } else {
                    echo "failed";
                }
            }
        }else{
            echo "nope";
        }
    }

    public function Delete($id){
        session_start();
        if(isset($_SESSION["admin_login"])) {
            var_dump($id);
            if (isset($id)) {
                $user = new User();
                $user->setId($id);

                $result = $user->DeleteUser(BDD::getInstance());

                if ($result == "deleted") {
                    header("Location:/?controller=user&action=list");
                } else {
                    echo "failed";
                }
            }
        }else{
            echo "nope";
        }
    }

    public function Login(){
        session_start();
        if(isset($_SESSION["admin_login"])){
            /*header("location: admin/admin_home.php");*/
            return $this->twig->render("User/Admin/adminHome.html.twig");
        }

        if(isset($_SESSION["user_login"])){
            return $this->twig->render("User/user/userHome.html.twig");
        }

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

                $user = new User();
                $user->setEmail($userEmail);
                $user->setPassword($userPwd);
                /*$user->setRole($role);*/

                $result = $user->Login(BDD::getInstance());

                if ($result == "admin"){
                    return $this->twig->render("User/Admin/adminHome.html.twig", ['session' => $_SESSION]);
                    /*return $this->twig->render("admin/admin_home.php");*/
                }elseif ($result == "user"){
                    return $this->twig->render("User/User/userHome.html.twig", ['session' => $_SESSION]);
                }else{
                    echo "pb1";
                }
            }
        }else{
            echo "pb2";
        }
    }

    public function Logout(){
        session_start();
        header("location:/");
        session_destroy();
    }
}