<?php 

session_start();
include_once("../Model/Bo/CategoryBO.php");
include_once __DIR__ . "/../Model/Bean/Category.php"; 

class ControllerCategory {

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
        $CategoryBO = new CategoryBO();

        if(isset($_GET['all'])){

            $_SESSION['categories'] = $CategoryBO->all();
            $jsCode = "<script>
                window.location.href = '../View/AddProduct.php';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['show'])) {

            $_SESSION['categories'] = $CategoryBO->all();
            $jsCode = "<script>
                window.location.href = '../View/Category.php';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['update'])) {

            $Category = new Category('',$_POST['name']);
            $message = $CategoryBO->update($Category,$_POST['id_category']);
            $_SESSION['categories'] = $CategoryBO->all();
            $jsCode = "<script>
                localStorage.setItem('message', '$message');
                window.location.href = '../View/Category.php';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['add'])) {

            $Category = new Category('',$_POST['name']);
            $message = $CategoryBO->add($Category);
            $_SESSION['categories'] = $CategoryBO->all();
            $jsCode = "<script>
                localStorage.setItem('message', '$message');
                window.location.href = '../View/Category.php';
            </script>";
            echo $jsCode;
            
        } else if (isset($_GET['delete'])) {

            $message = $CategoryBO->delete($_GET['id_category']);
            $_SESSION['categories'] = $CategoryBO->all();
            $jsCode = "<script>
                localStorage.setItem('message', '$message');
                window.location.href = '../View/Category.php';
            </script>";
            echo $jsCode;

        } else if (isset($_GET['allsearch'])) {

            $categories = $CategoryBO->allSearch($_GET['search_text']);
            $respon = array('categories' => $categories);
            header('Content-type: application/json');
            echo json_encode($respon);

        } else {
            require_once("../View/Login.php");
        }
    }
};

$Controler_Auth = new ControllerCategory();
$Controler_Auth->invoke();

?>
