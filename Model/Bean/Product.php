<?php 

class Product {

    public $id; 
    public $id_user; 
    public $id_category; 
    public $name;  
    public $price;  
    public $description;
    public $create_at; 
    public $update_at;

    public function __construct($id_user, $id_category, $name, $price, $description) {

        $this->id_user = $id_user;
        $this->id_category = $id_category;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;

    }
}

?>

