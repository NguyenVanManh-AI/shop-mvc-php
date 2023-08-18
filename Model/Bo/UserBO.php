<?php 

include_once __DIR__ . "/../Bean/User.php";
include_once __DIR__ . "/../Dao/UserDAO.php";

class UserBO {

    public $UserDAO ;
    
    public function __construct() {
        $this->UserDAO = new UserDAO();
    }

    public function login (User $user) {
        return $this->UserDAO->login($user);
    } 

    public function register (User $user, $confirm_password) {
        return $this->UserDAO->register($user, $confirm_password);
    } 

    public function updateInfor (User $user, $id_user) {
        return $this->UserDAO->updateInfor($user, $id_user);
    } 

    public function changePassword ($id_user, $old_password, $confirm_old_password, $new_password) {
        return $this->UserDAO->changePassword($id_user, $old_password, $confirm_old_password, $new_password);
    } 
}

?>
