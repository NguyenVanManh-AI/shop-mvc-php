<?php 

include_once("../Model/Bo/UserBO.php");
include_once __DIR__ . "/../Model/Bean/User.php"; 

class ControllerUser {
    
    public function __construct() {

    }

    /**
     * check 
     */
    public function check () {
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: ../View/ViewInfor.php");
            exit;
        }
    }

    /**
     * invoke 
     */
    public function invoke () {

        $UserBO = new UserBO();

        if (isset($_GET['login'])) {

            $User = new User($_POST['email'], $_POST['password'], '', '', '');
            $message = $UserBO->login($User);
            echo "<script>localStorage.setItem('message', '$message');</script>";
            if (strpos($message, '@') !== false) echo "<script>window.location.href = '../View/ViewInfor.php';</script>";
            else echo "<script>window.location.href = '../View/Login.php';</script>";

        } else if (isset($_GET['register'])) {

            $User = new User($_POST['email'], $_POST['password'], $_POST['name'], $_FILES['avatar'], $_POST['gender']);
            $confirm_password = $_POST['confirm-password']; 
            $message = $UserBO->register($User, $confirm_password);
            $jsCode = "<script>
                localStorage.setItem('message', '$message');
                window.location.href = '../View/Register.php';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['update_infor'])) {

            session_start();
            $id_user = $_SESSION['user']->id;
            $User = new User('','',$_POST['name'], $_FILES['avatar'], $_POST['gender']);
            $message = $UserBO->updateInfor($User, $id_user);
            $jsCode = "<script>
            localStorage.setItem('message', '$message');
            window.location.href = '../View/ViewInfor.php';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['logout'])) {

            session_start();
            $_SESSION = array(); 
            session_destroy();
            header("location: ../View/Login.php");
            exit;

        } else if (isset($_GET['change_password'])) {

            session_start();
            $id_user = $_SESSION['user']->id;
            $old_password = $_POST['old_password'];
            $confirm_old_password = $_POST['confirm_old_password'];
            $new_password = $_POST['new_password'];
            $message = $UserBO->changePassword($id_user, $old_password, $confirm_old_password, $new_password);
            $jsCode = "<script>
            localStorage.setItem('message', '$message');
            window.location.href = '../View/ChangePassword.php';
            </script>";
            echo $jsCode;

        } else {
            require_once("../View/Login.php");
        }
    }
};

$Controler_Auth = new ControllerUser();
$Controler_Auth->invoke();

?>
