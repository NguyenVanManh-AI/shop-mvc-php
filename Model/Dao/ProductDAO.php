<?php 

include_once __DIR__ . "/../Bean/Product.php"; 
include_once __DIR__ . "/CategoryDAO.php";
include_once "DB.php";

class ProductDAO {

    public $link ; 

    public function __construct() {
        $DB = new DB();
        $this->link = $DB->getConnection();
    }

    /**
     * add
     * 
     * @param Product $product
     * @param string $image_remove
     * @return string 
     */
    public function add (Product $product, $image_remove) 
    {
        try {
            // save infor 
            $sql = "INSERT products SET id_user='$product->id_user',id_category='$product->id_category',price='$product->price',name='$product->name',description='$product->description'";
            $rs = mysqli_query($this->link, $sql);

            // get new product 
            $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
            $rs = mysqli_query($this->link, $sql);
            $id_product = null;

            if ($rs && $rs->num_rows === 1) {
                $product = $rs->fetch_assoc();
                $id_product = $product['id'];
            } 

            // save img 
            $targetDirectory = __DIR__  . "/../../View/image/products/";

            if (isset($_FILES['image_product']) && !empty($_FILES['image_product']['name'][0])) {
                $totalFiles = count($_FILES['image_product']['name']);
                $removedImages = explode("?", $image_remove);

                for ($i = 0; $i < $totalFiles; $i++) {
                    $fileName = basename($_FILES['image_product']['name'][$i]);
                
                    if (!in_array($fileName, $removedImages)) {
                        $fileName = mt_rand(1111111111, 9999999999) . '_' . basename($_FILES['image_product']['name'][$i]);
                        $newFileName = 'ShopPHP/View/image/products/' . $fileName;
                        $targetFile = $targetDirectory . $fileName;
                        move_uploaded_file($_FILES['image_product']['tmp_name'][$i], $targetFile);

                        $sql = "INSERT images SET id_product='$id_product',url='$newFileName'";
                        $rs = mysqli_query($this->link, $sql);
                    }
                }
            }

            return '@Add Product Success !';
        }
        catch (Exception $e){
            return 'Add Product Fail !';
        }

    }

    /**
     * all
     * 
     * @param int $id_user
     * @return string 
     */
    public function all ($id_user) 
    {
        try {
            $sql = "SELECT products.*, categories.*, products.id as id_product, products.name as name_product, categories.name as name_category 
            FROM products JOIN categories ON products.id_category = categories.id 
            WHERE products.id_user = $id_user
            ORDER BY products.id DESC";
            $rs = mysqli_query($this->link, $sql);
            $products = [];

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $product = new stdClass(); 
                    $product->id_product = $row['id_product'];
                    $product->name_product = $row['name_product'];
                    $product->name_category = $row['name_category'];
                    $product->price = $row['price'];
                    $product->description = $row['description'];

                    $id_product = $row['id_product'];

                    $sql_img = "SELECT * FROM images WHERE images.id_product = $id_product ";
                    $rs_img = mysqli_query($this->link, $sql_img);
                    $urls = [];

                    if ($rs_img->num_rows > 0) {
                        while ($row = $rs_img->fetch_assoc()) {
                            array_push($urls,$row['url']);
                        }

                    }

                    $product->urls = $urls;
                    array_push($products,$product);
                }
            }

            $_SESSION['products'] = $products;

            return '@Get All Product Success !';
        }
        catch (Exception $e){
            return '@Get All Product Fail !';
        }
    }

    /**
     * delete 
     * 
     * @param int $id_product 
     * @return string 
     */
    public function delete ($id_product) 
    {
        try {
            // delete product 
            $sql = "DELETE FROM products WHERE id='$id_product'";
            $rs = mysqli_query($this->link, $sql);

            // delete image file 
            $sql_img = "SELECT * FROM images WHERE images.id_product = $id_product ";
            $rs_img = mysqli_query($this->link, $sql_img);

            if ($rs_img->num_rows > 0) {
                while ($row = $rs_img->fetch_assoc()) {
                    $filename = basename($row['url']); 
                    unlink(__DIR__  . "/../../View/image/products/" . $filename);
                }
            }

            // delete image data
            $sql = "DELETE FROM images WHERE id_product='$id_product'";
            $rs = mysqli_query($this->link, $sql);

            return "@Delete Product Success !";
        }
        catch (Exception $e){
            return "Delete Product Fail !";
        }
    }

    /**
     * edit 
     * 
     * @param int $id_product   
     * @return string 
     */
    public function edit ($id_product) 
    {
        try {
            $sql = "SELECT products.*, categories.*, products.id as id_product, products.name as name_product, categories.name as name_category 
            FROM products JOIN categories ON products.id_category = categories.id 
            WHERE products.id = $id_product";
            $rs = mysqli_query($this->link, $sql);

            if ($rs && $rs->num_rows === 1) {
                $row = $rs->fetch_assoc();  
                $product = new stdClass(); 
                $product->id_product = $row['id_product'];
                $product->id_category = $row['id_category'];
                $product->name_product = $row['name_product'];
                $product->name_category = $row['name_category'];
                $product->price = $row['price'];
                $product->description = $row['description'];

                $id_product = $row['id_product'];

                $sql_img = "SELECT * FROM images WHERE images.id_product = $id_product ";
                $rs_img = mysqli_query($this->link, $sql_img);
                $urls = [];

                if ($rs_img->num_rows > 0) {
                    while ($row = $rs_img->fetch_assoc()) {
                        array_push($urls,$row['url']);
                    }
                }
                $product->urls = $urls;

            }
            $_SESSION['product'] = $product;

            // get all category 
            $CategoryDAO = new CategoryDAO();
            $_SESSION['categories'] = $CategoryDAO->all();

            return '@Get Product Success !';
        }
        catch (Exception $e){
            return '@Get Product Fail !';
        }
    }
    
    /**
     * update 
     * 
     * @param Product $product
     * @param int $id_product 
     * @param string $image_remove 
     * @param string $iamge_old_remove
     * @return string 
     */
    public function update (Product $product, $id_product, $image_remove, $image_old_remove)
    {
        try {

            // update data product 
            $sql = "UPDATE products SET name='$product->name',price='$product->price',description='$product->description',id_category='$product->id_category' WHERE id='$id_product'";
            $rs = mysqli_query($this->link, $sql);

            // delete old image 
            $removedImages = explode("?", $image_old_remove);
            foreach ($removedImages as $url) {

                if ($url != '') {
                    $filename = basename($url); 
                    unlink(__DIR__  . "/../../View/image/products/" . $filename);
                    $sql = "DELETE FROM images WHERE url like '%$url%'";
                    $rs = mysqli_query($this->link, $sql);
                }
            }

            // save new img 
            $targetDirectory = __DIR__  . "/../../View/image/products/";
            if (isset($_FILES['image_product']) && !empty($_FILES['image_product']['name'][0])) {
                $totalFiles = count($_FILES['image_product']['name']);
                $removedImages = explode("?", $image_remove);

                for ($i = 0; $i < $totalFiles; $i++) {
                    $fileName = basename($_FILES['image_product']['name'][$i]);
                    
                    if (!in_array($fileName, $removedImages)) {
                        $fileName = mt_rand(1111111111, 9999999999) . '_' . basename($_FILES['image_product']['name'][$i]);
                        $newFileName = 'ShopPHP/View/image/products/' . $fileName;
                        $targetFile = $targetDirectory . $fileName;
                        move_uploaded_file($_FILES['image_product']['tmp_name'][$i], $targetFile);

                        $sql = "INSERT images SET id_product='$id_product',url='$newFileName'";
                        $rs = mysqli_query($this->link, $sql);
                    }
                }
            }

            $this->edit($id_product);

            return '@Update Product Success !';
        }
        catch (Exception $e){
            return 'Update Product Fail !';
        }
    }

    /**
     * allSearch 
     * 
     * @param int $id_user
     * @param string $srearch_text 
     * @return array 
     */
    public function allSearch ($id_user, $search_text) 
    {
        try {
            $sql = "SELECT products.*, categories.*, products.id as id_product, products.name as name_product, categories.name as name_category 
            FROM products JOIN categories ON products.id_category = categories.id 
            WHERE products.id_user = $id_user AND (products.name like '%$search_text%' OR categories.name like '%$search_text%')
            ORDER BY products.id DESC";
            $rs = mysqli_query($this->link, $sql);
            $products = [];

            if ($rs->num_rows > 0) {
                while ($row = $rs->fetch_assoc()) {
                    $product = new stdClass(); 
                    $product->id_product = $row['id_product'];
                    $product->name_product = $row['name_product'];
                    $product->name_category = $row['name_category'];
                    $product->price = $row['price'];
                    $product->description = $row['description'];

                    $id_product = $row['id_product'];

                    $sql_img = "SELECT * FROM images WHERE images.id_product = $id_product ";
                    $rs_img = mysqli_query($this->link, $sql_img);
                    $urls = [];

                    if ($rs_img->num_rows > 0) {
                        while ($row = $rs_img->fetch_assoc()) {
                            array_push($urls,$row['url']);
                        }
                    }

                    $product->urls = $urls;
                    array_push($products,$product);
                }
            }

            return $products;
        }
        catch (Exception $e){
            return null;
        }
    }

}

?>

