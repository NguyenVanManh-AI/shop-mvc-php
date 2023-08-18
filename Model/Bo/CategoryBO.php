<?php 

include_once __DIR__ . "/../Bean/Category.php";
include_once __DIR__ . "/../Dao/CategoryDAO.php";

class CategoryBO {

    public $CategoryDAO ;
    
    public function __construct() {
        $this->CategoryDAO = new CategoryDAO();
    }

    public function all () {
        return $this->CategoryDAO->all();
    } 

    public function update (Category $category, $id_category) {
        return $this->CategoryDAO->update($category, $id_category);
    } 

    public function add (Category $category) {
        return $this->CategoryDAO->add($category);
    } 

    public function delete ($id_category) {
        return $this->CategoryDAO->delete($id_category);
    } 

    public function allSearch ($search_text) {
        return $this->CategoryDAO->allSearch($search_text);
    } 
}

?>
