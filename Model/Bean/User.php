<?php 

class User {
    
    public $id; 
    public $email; 
    public $password; 
    public $fullname;
    public $avatar;
    public $gender;  
    public $create_at; 
    public $update_at; 
    public $confirm_password;

    public function __construct($email, $password, $fullname, $avatar, $gender) {

        $this->email = $email; 
        $this->password = $password; 
        $this->fullname = $fullname;
        $this->avatar = $avatar;
        $this->gender = $gender;  
    
    }
}

?>

