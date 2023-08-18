<?php 

include_once __DIR__ . "/../Bean/User.php"; 
include_once "DB.php";

class UserDAO {

    public $link ; 

    public function __construct() {
        $DB = new DB();
        $this->link = $DB->getConnection();
    }

    /**
     * login 
     * 
     * @param User $user
     * @return string 
     */
    public function login (User $user) 
    {
        $email = $user->email;
        $password = $user->password;
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->link, $sql);

        if ($result && $result->num_rows === 1) {
            $_user = $result->fetch_assoc();
        
            if (password_verify($password, $_user['password'])) {
                session_start(); 
                $_SESSION['loggedin'] = true;
                $loggedInUser = new stdClass(); 
                $_user = array(
                    'id' => $_user['id'],
                    'email' => $_user['email'],
                    'password' => $_user['password'],
                    'fullname' => $_user['fullname'],
                    'avatar' => $_user['avatar'],
                    'gender' => $_user['gender']
                );
                $loggedInUser->id = $_user['id'];
                $loggedInUser->email = $_user['email'];
                $loggedInUser->password = $_user['password'];
                $loggedInUser->fullname = $_user['fullname'];
                $loggedInUser->avatar = $_user['avatar'];
                $loggedInUser->gender = $_user['gender'];
                $_SESSION['user'] = $loggedInUser;

                return "@Login success !";
            } 

            return "Password is not correct !";
        } 

        return "Email does not exist !";
    }

    /**
     * register 
     * 
     * @param User $user 
     * @param string $confirm_password 
     * @return string 
     */
    public function register (User $user,$confirm_password)
    {
        $sql = "SELECT * FROM users WHERE email = '$user->email'";
        $rs = mysqli_query($this->link, $sql);

        if ($rs->num_rows > 0) {
            return "User already exists !";
        } else if ($user->password != $confirm_password) {
            return "Confirm password does not match !";
        } else {
            $targetDirectory = __DIR__  . "/../../View/image/avatars/";
            $fileName = mt_rand(1111111111, 9999999999) . '_' . basename($_FILES['avatar']["name"]);
            $targetFile = $targetDirectory . $fileName; // Đường dẫn đầy đủ tới tệp tin
            $newFileName = 'ShopPHP/View/image/avatars/' . $fileName;
            move_uploaded_file($_FILES['avatar']["tmp_name"], $targetFile); // upload ảnh 
            $hash_password = password_hash($user->password, PASSWORD_DEFAULT);
            $sql = "INSERT users SET fullname='$user->fullname',email='$user->email',password='$hash_password',gender='$user->gender',avatar='$newFileName'";
            $rs = mysqli_query($this->link, $sql);

            return "@Register success !";
        }
    }

    /**
     * updaInfor 
     * 
     * @param User $user_update 
     * @param int $id_user
     * @return string 
     */
    public function updateInfor (User $user_update,$id_user)
    {
        try {
            $sql = "SELECT * FROM users WHERE id = '$id_user'";
            $result = mysqli_query($this->link, $sql);
            $newFileName = '';

            if ($_FILES['avatar']['name']) {
                if ($result && $result->num_rows === 1) {
                    $_user = $result->fetch_assoc();
                    $_user = array(
                        'id' => $_user['id'],
                        'email' => $_user['email'],
                        'password' => $_user['password'],
                        'fullname' => $_user['fullname'],
                        'avatar' => $_user['avatar'],
                        'gender' => $_user['gender']
                    );
                    $filename = basename($_user['avatar']); 
                    unlink(__DIR__  . "/../../View/image/avatars/" . $filename);
                } 

                $targetDirectory = __DIR__  . "/../../View/image/avatars/";
                $fileName = mt_rand(1111111111, 9999999999) . '_' . basename($_FILES['avatar']["name"]);
                $targetFile = $targetDirectory . $fileName; 
                $newFileName = 'ShopPHP/View/image/avatars/' . $fileName;
                move_uploaded_file($_FILES['avatar']["tmp_name"], $targetFile);

                $sql = "UPDATE users SET fullname='$user_update->fullname',gender='$user_update->gender',avatar='$newFileName' WHERE id='$id_user'";
                $rs = mysqli_query($this->link, $sql);
            } else {
                $sql = "UPDATE users SET fullname='$user_update->fullname',gender='$user_update->gender' WHERE id='$id_user'";
                $rs = mysqli_query($this->link, $sql);
            }
            $sql = "SELECT * FROM users WHERE id = '$id_user'";
            $result = mysqli_query($this->link, $sql);

            if ($result && $result->num_rows === 1) {
                $_user = $result->fetch_assoc();
                $_SESSION['loggedin'] = true;

                $loggedInUser = new stdClass(); 
                $_user = array(
                    'id' => $_user['id'],
                    'email' => $_user['email'],
                    'password' => $_user['password'],
                    'fullname' => $_user['fullname'],
                    'avatar' => $_user['avatar'],
                    'gender' => $_user['gender']
                );
                $loggedInUser->id = $_user['id'];
                $loggedInUser->email = $_user['email'];
                $loggedInUser->password = $_user['password'];
                $loggedInUser->fullname = $_user['fullname'];
                $loggedInUser->avatar = $_user['avatar'];
                $loggedInUser->gender = $_user['gender'];
                $_SESSION['user'] = $loggedInUser;
            } 

            return "@Update Infor Success !";
        }
        catch (Exception $e){
            return "Update Infor Failse !";
        }
    }

    /**
     * changePassword
     * 
     * @param int $id_user
     * @param string $old_password
     * @param string $comfirm_old_password 
     * @param string $new_password
     * @return string 
     */
    public function changePassword ($id_user, $old_password, $confirm_old_password, $new_password)
    {
        $sql = "SELECT * FROM users WHERE id = '$id_user'";
        $result = mysqli_query($this->link, $sql);
        $_user = $result->fetch_assoc();

        if(!(password_verify($old_password, $_user['password']))) return "Old password is incorrect !";
        if($old_password != $confirm_old_password) return "Old password and confirm old password is incorrect !";
        if($old_password == $new_password) return "The new password must not be the same as the old password !";

        $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$hash_new_password' WHERE id='$id_user'";
        $rs = mysqli_query($this->link, $sql);

        return "@Change password successfully !";
    }
}

?>
