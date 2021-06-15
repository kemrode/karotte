<?php


namespace src\Controller;

use src\Model\SellerModel;
use src\Model\userModel;

class AdminController extends AbstractController
{
    public function index(){
        try {
          if($_SESSION["USER_ID"] != "171")
                    throw new \Exception();
                else{
                    $usersInfo = userModel::GetAllUser();
                    return $this->twig->render("admin/adminView.html.twig", [
                    "usersInfo"=> $usersInfo
                ]);
            }
        }
        catch(\Exception $e){
            header("location:/");
            exit;
        }
    }
    public function RemoveOneUserFromLogin(){
        try {
            if($_SESSION["USER_ID"] != 170)
                throw new \Exception("Vous n'etes pas autorisé à effectuer cette action");
            $userToBeDeleted = $this->GetTreatedValueFromPostIfIsset("userIdToBeDeleted");
            userModel::DeleteOneUser($userToBeDeleted);
        }catch(\Exception $e){
        }
    }
}