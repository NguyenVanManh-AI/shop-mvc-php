<?php 

    if(!isset($_SESSION)) session_start(); 

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){}
    else header("location: PageNotFound.php");

    if(isset($_SESSION['user'])) $User = $_SESSION['user'];

    $_GET['home'] = 1; 

    include '../Controller/ControllerProduct.php';
    if(isset($_SESSION['products'])) $products = $_SESSION['products'];

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
                <div class="form_search">
                    <div class="input-group">
                        <input type="text" class="shadow-none form-control" id="text_search" placeholder="Search name product or name category">
                        <div class="input-group-prepend">
                            <div class="input-group-text" ><i class="fa-solid fa-magnifying-glass"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <?php include 'Right.php';?>
            </div>
        </div>
    </div>
    <div id="big_product" >
        <div id="inner_product" >
            <?php foreach ($products as $index => $product): ?>
                <div class="pr_detail">
                    <div class="pr_image">
                        <div id="carouselExampleControls<?php echo $product->id_product ?>" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active imgproduct">
                                    <img class="d-block w-100" src="<?php echo 'http://localhost/' . $product->urls[0] ?>" alt="Second slide">
                                </div>
                                <?php foreach ($product->urls as $index => $url): ?>
                                    <div class="carousel-item imgproduct">
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
                    <div class="pr_infor">
                        <p class="pr_price"><span><i class="fa-solid fa-coins"></i> Price </span> <span><?php echo number_format($product->price) ?> VNĐ</span></p>
                        <p class="pr_name"><span><i class="fa-brands fa-dropbox"></i> </span> <span><?php echo $product->name_product ?></span></p>
                        <p class="pr_category"><span><i class="fa-brands fa-pinterest-p"></i> Category </span> <span><?php echo $product->name_category ?></span></p>
                        <p class="pr_description">                        <?php 
                                if (strlen($product->description) > ENUM::DESCRIPTION_STR) echo substr($product->description, 0, ENUM::DESCRIPTION_STR) . '...';
                                else echo $product->description;
                            ?><a href="DetailProduct.php?id_product=<?php echo $product->id_product ?>">More</a> </p>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        
        </div>

    </div>
    <div id="toTop" v-if="showButton"><i class="fa-solid fa-chevron-up"></i></div>
</div>


<script src="js/sidebar-dashboard.js"></script>
<script src="js/left.js"></script>
<script src="js/home.js"></script>
</body>
</html>
