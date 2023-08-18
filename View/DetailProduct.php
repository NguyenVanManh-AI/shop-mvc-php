<?php 

    if(!isset($_SESSION)) session_start(); 

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){}
    else header("location: PageNotFound.php");

    if(isset($_SESSION['user'])) $User = $_SESSION['user'];

    $_GET['details'] = 1; 
    include '../Controller/ControllerProduct.php';

    if(isset($_SESSION['products'])) $products = $_SESSION['products'];
    if(isset($_SESSION['product'])) $product = $_SESSION['product'];

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'Heade.php';?>
		<style>
			.form-control:focus {
				box-shadow: none; 
			}
		</style>
		<link rel="stylesheet" href="css/sidebar-dashboard.css">
        <link rel="stylesheet" href="css/middle.css">
        <link rel="stylesheet" href="css/product-details.css">
        <link rel="stylesheet" href="css/home.css">
	</head>
<body>
<script>
var message = localStorage.getItem('message');
if (message) {
	$(function(){
		if(message.indexOf('@') !== -1) toastr.success(message.replace(/@/g, ''));
		else toastr.error(message);
	})
	localStorage.removeItem('message'); 
}
</script>
<div id="big_main">
    <div id="top_main">
        <div class="row mr-0">
            <div class="col-9 d-flex justify-content-end">
                <div class="logo_blog" ><a href="Home.php"><img src="image/php.png"/></div></a> 
            </div>
            <div class="col-3">
                <?php include 'Right.php';?>
            </div>
        </div>
    </div>
    <div id="big_product" >
        <div id="inner_product" >
            <div class="pr_detail2">
                <div id="title_product" class="d-flex justify-content-center"><?php echo $product->name_product ?></div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 sp1 ">
                            <i class="fa-brands fa-dropbox mr-3"></i> Name Product 
                            </div>
                            <div class="col-8 sp2 purple">
                            <?php echo $product->name_product ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 sp1">
                            <i class="fa-solid fa-coins mr-3"></i> Price Product  
                            </div>
                            <div class="col-8 sp2 red">
                            <?php echo number_format($product->price) ?> VNĐ
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 sp1">
                            <i class="fa-brands fa-pinterest-p mr-3"></i> Category
                            </div>
                            <div class="col-8 sp2 purple">
                            <?php echo $product->name_category ?>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Show Details 
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body mt-4">
                                    <?php echo $product->description; ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="pr_image">
                        <div id="carouselExampleControls<?php echo $product->id_product ?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active imgproduct2">
                                    <img class="d-block w-100" src="<?php echo 'http://localhost/' . $product->urls[0] ?>" alt="Second slide">
                                </div>
                                <?php foreach ($product->urls as $index => $url): ?>
                                    <div class="carousel-item imgproduct2">
                                        <img class="d-block w-100" src="<?php echo 'http://localhost/' . $url ?>" alt="Second slide">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls<?php echo $product->id_product ?>" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls<?php echo $product->id_product ?>" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="toTop" v-if="showButton"><i class="fa-solid fa-chevron-up"></i></div>
</div>


<script src="js/sidebar-dashboard.js"></script>
<script src="js/left.js"></script>
<script src="js/home.js"></script>
</body>
</html>
