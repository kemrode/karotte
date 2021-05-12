<?php


namespace src\Controller;


class HomeController extends AbstractController
{
    public function index(){
        session_start();
        if(isset($_SESSION["admin_login"]) || isset($_SESSION["membre_login"])) {
            return $this->twig->render("Home/homeLogged.html.twig", ['session' => $_SESSION]);
        }
        else{
            return $this->twig->render("Home/home.html.twig");
        }
    }

    public function Register(){
        /*header("Location:../Home/register.php");*/
        return $this->twig->render("Home/register.html.twig");
    }

    public function Login(){
        session_start();
        if(isset($_SESSION["admin_login"])){
            return $this->twig->render("User/Admin/adminHome.html.twig", ['session' => $_SESSION]);
        }
        if(isset($_SESSION["user_login"])){
            /*header("location: member/member_home.php");*/
            return $this->twig->render("User/User/userHome.html.twig", ['session' => $_SESSION]);
        } else{
            return $this->twig->render("Home/login.html.twig");
        }
    }

}