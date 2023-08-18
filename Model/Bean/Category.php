<?php 

class Category {

    public $id; 
    public $id_user; 
    public $name; 
    public $create_at; 
    public $update_at;

    public function __construct($id_user, $name) {
        $this->id_user = $id_user;
        $this->name = $name;
    }

}

?>
