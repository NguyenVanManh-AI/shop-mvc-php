<?php 

include_once __DIR__ . "/../Bean/Category.php"; 
include_once "DB.php";

class CategoryDAO {

    public $link ; 

    public function __construct() {
        $DB = new DB();
        $this->link = $DB->getConnection();
    }

    /**
     * all
     * 
     * @return array 
     */
    public function all () 
    {
        $id_user = $_SESSION['user']->id;
        $sql = "SELECT * FROM categories WHERE id_user = '$id_user' ORDER BY id DESC";
        $rs = mysqli_query($this->link, $sql);
        $categories = [];
        if ($rs->num_rows > 0) {
            while($row = $rs->fetch_assoc()) {
                $category = new stdClass(); 
                $category->id = $row['id'];
                $category->id_user = $row['id_user'];
                $category->name = $row['name'];
                array_push($categories, $category);
            }
        }

        return $categories;
    }

    /**
     * update
     * 
     * @param Category $category
     * @param int $id_category
     * @return string 
     */
    public function update (Category $category, $id_category) 
    {
        try {
            $sql = "UPDATE categories SET name='$category->name' WHERE id='$id_category'";
            $rs = mysqli_query($this->link, $sql);

            return "@Update Category Success !";
        }
        catch (Exception $e) {
            return "Update Category Failse !";
        }
    }

    /**
     * add 
     * 
     * @param Category $category
     * @return string 
     */
    public function add (Category $category) 
    {
        try {

            $id_user = $_SESSION['user']->id;
            $sql = "INSERT categories SET id_user='$id_user',name='$category->name'";
            $rs = mysqli_query($this->link, $sql);

            return "@Add Category Failse !";
        }
        catch (Exception $e) {
            return "Add Category Failse !";
        }
    }

    /**
     * delete
     * 
     * @param int $id_category
     * @return string 
     */
    public function delete ($id_category) 
    {
        try {
            $sql = "SELECT * FROM products WHERE id_category = '$id_category'";
            $rs = mysqli_query ($this->link, $sql);
            if ($rs->num_rows > 0) {
                $n = $rs->num_rows;

                return "This category has $n products, you can not delete it !";
            } else {
                $sql = "DELETE FROM categories WHERE id='$id_category'";
                $rs = mysqli_query ($this->link, $sql);

                return "@Delete Category Success !";
            }
        }
        catch (Exception $e) {
            return "Delete Category Failse !";
        }
    }

    /**
     * allSearch
     * 
     * @param string $search_text
     * @return array 
     */
    public function allSearch ($search_text) 
    {
        $id_user = $_SESSION['user']->id;
        $sql = "SELECT * FROM categories WHERE id_user = '$id_user' AND name like '%$search_text%' ORDER BY id DESC";
        $rs = mysqli_query($this->link, $sql);
        $categories = [];
        if ($rs->num_rows > 0) {
            while($row = $rs->fetch_assoc()) {
                $category = new stdClass(); 
                $category->id = $row['id'];
                $category->id_user = $row['id_user'];
                $category->name = $row['name'];
                array_push($categories, $category);
            }
        }

        return $categories;
    }
    
}   

?>
