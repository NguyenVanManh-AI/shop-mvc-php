<?php 

include_once __DIR__ . "/../Bean/Product.php";
include_once __DIR__ . "/../Dao/ProductDAO.php";

class ProductBO {

    public $ProductDAO ;
    
    public function __construct() {
        $this->ProductDAO = new ProductDAO();
    }

    public function add (Product $product, $image_remove) {
        return $this->ProductDAO->add($product, $image_remove);
    } 

    public function all ($id_user) {
        return $this->ProductDAO->all($id_user);
    } 

    public function delete ($id_product) {
        return $this->ProductDAO->delete($id_product);
    } 

    public function edit ($id_product) {
        return $this->ProductDAO->edit($id_product);
    } 
    
    public function update (Product $product, $id_product, $image_remove, $image_old_remove) {
        return $this->ProductDAO->update($product, $id_product, $image_remove, $image_old_remove);
    } 
    
    public function allSearch ($id_user, $search_text) {
        return $this->ProductDAO->allSearch($id_user, $search_text);
    } 
}

?>
