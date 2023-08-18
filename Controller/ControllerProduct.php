<?php 

if(!isset($_SESSION)) session_start(); 
include_once("../Model/Bo/ProductBO.php");
include_once __DIR__ . "/../Model/Bean/Product.php"; 

class ControllerProduct {
    
    public function __construct() {

    }

    /**
     * check 
     */
    public function check () 
    {
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: ../View/ViewInfor.php");
            exit;
        }
    }

    /**
     * invoke 
     */
    public function invoke () 
    {
        $ProductBO = new ProductBO();
        
        if (isset($_GET['add'])) {
            $Product = new Product($_SESSION['user']->id, $_POST['id_category'], $_POST['name'], $_POST['price'], $_POST['description']);
            $message = $ProductBO->add($Product, $_POST['image_remove']);
            $jsCode = "<script>
                localStorage.setItem('message', '$message');
                window.location.href = '../View/AddProduct.php';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['all'])) {

            $message = $ProductBO->all($_SESSION['user']->id);
            $jsCode = "<script>
                localStorage.setItem('message', '$message');
                window.location.href = '../View/AllProduct.php';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['edit'])) {

            $message = $ProductBO->edit($_GET['id_product']);
            $id_product = $_GET['id_product'];
            $jsCode = "<script>
                localStorage.setItem('message', '$message');
                window.location.href = '../View/EditProduct.php?id_product=$id_product';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['update'])) {

            $Product = new Product($_SESSION['user']->id, $_POST['id_category'], $_POST['name'], $_POST['price'], $_POST['description']);
            $message = $ProductBO->update($Product, $_POST['id_product'], $_POST['image_remove'], $_POST['image_old_remove']);

            $id_product = $_POST['id_product'];
            $jsCode = "<script>
                localStorage.setItem('message', '$message');
                window.location.href = '../View/EditProduct.php?id_product=$id_product';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['delete'])) {

            $message = $ProductBO->delete($_GET['id_product']);
            $ProductBO->all($_SESSION['user']->id); 
            $jsCode = "<script>
                localStorage.setItem('message', '$message');
                window.location.href = '../View/AllProduct.php';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['home'])) {

            $message = $ProductBO->all($_SESSION['user']->id);
            $jsCode = "<script>
                localStorage.setItem('message', '@Show All Product Success !');
            </script>";
            echo $jsCode;

        } else if (isset($_GET['details'])) {

            $message = $ProductBO->edit($_GET['id_product']);
            $id_product = $_GET['id_product'];
            $jsCode = "<script>
                localStorage.setItem('message', '@Show Product Success !');
            </script>";
            echo $jsCode;

        } else if (isset($_GET['allsearch'])) {

            $search_text = $_GET['search_text'];
            $products = $ProductBO->allSearch($_SESSION['user']->id, $search_text);
            $respon = array('products' => $products);
            header('Content-type: application/json');
            echo json_encode($respon);

        } else {
            require_once("../View/Login.php");
        }
    }
};

$Controler_Auth = new ControllerProduct();
$Controler_Auth->invoke();

?>
