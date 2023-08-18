<?php 

    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){}
    else header("location: PageNotFound.php");

    $User = $_SESSION['user'];

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
		<link rel="stylesheet" href="css/allproduct.css">
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

<?php include 'SideBar.php';?>
<div class="home-main"> 
    <div id="main-component">
        <p id="title_update_infor"><i class="fa-solid fa-boxes-stacked"></i> All Product</p>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label">Search</label>
            <div class="col-sm-10">
                <input value="" name="title" type="text" class="form-control" id="search" aria-describedby="titleHelp" placeholder="Search">
            </div>
            <a href="" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i> </a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price (VNĐ) </th>
                <th class="text-center" scope="col">Images</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Feature</th>
                </tr>
            </thead>
            <tbody id="html_table">
            <?php foreach ($products as $index => $product): ?>
                <tr>
                    <th scope="row"><?php echo $index + 1 ?></th>
                    <td class="col-1"><?php echo $product->name_product ?></td>
                    <td><?php echo number_format($product->price) ?></td>
                    <td>
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
                    </td>
                    <td><?php echo $product->name_category ?></td>
                    <td>
                        <?php 
                            if (strlen($product->description) > ENUM::DESCRIPTION_STR) echo substr($product->description, 0, ENUM::DESCRIPTION_STR) . '...';
                            else echo $product->description;
                        ?>
                    </td>
                    <td style="display: flex;justify-content: center;">
                        <a style="margin-right: 10px;" href="../Controller/ControllerProduct.php?edit=1&id_product=<?php echo $product->id_product ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form method="POST" action="../Controller/ControllerProduct.php?delete=1&id_product=<?php echo $product->id_product ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this product ?');">
                            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="js/sidebar-dashboard.js"></script>
<script src="js/allproduct.js"></script>
</body>
</html>
