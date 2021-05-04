<?php
require 'src/Model/registerModel.php';

//namespace src\Controller;
class registerController extends AbstractController {

    public function index(){
        return $this->twig->render("register/registerView.html.twig");
    }
}


//A Faire : creation des fonctions pour créer, utiliser et poster les USERS dans la bdd