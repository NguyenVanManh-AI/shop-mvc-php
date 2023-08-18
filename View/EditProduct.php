<?php 

    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){}
    else header("location: PageNotFound.php");

    $User = $_SESSION['user'];
    
    if(isset($_SESSION['categories'])) $categories = $_SESSION['categories'];
    if(isset($_SESSION['product'])) $product = $_SESSION['product'];

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'Heade.php';?>
		<link rel="stylesheet" href="css/sidebar-dashboard.css">
		<link rel="stylesheet" href="css/editproduct.css">
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
        <form method="POST" action="../Controller/ControllerProduct.php?update=1" enctype="multipart/form-data">
            <p id="title_update_infor"><i class="fa-solid fa-boxes-stacked"></i> Add Product</p>
            <div class="form-group row ml-2 mr-2">
                <div class="col-7">
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-4 col-form-label"><i class="fa-solid fa-signature"></i> Product Name</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $product->name_product ?>" name="name" type="text" class="form-control" id="floatingInputName" placeholder="Product Name" required autofocus>
                            <input hidden value="<?php echo $product->id_product ?>" name="id_product" type="text" class="form-control" id="floatingInputName" placeholder="Product Name" required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-4 col-form-label"><i class="fa-solid fa-coins"></i> Product Price</label>
                        <div class="col-sm-8">
                            <input value="<?php echo $product->price ?>" name="price" type="text" class="form-control" id="floatingInputName" placeholder="0.00 VNĐ" required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-4 col-form-label"><i class="fa-solid fa-list"></i> Category Name</label>
                        <div class="col-sm-8">
                            <select name="id_category" class="form-control" id="exampleFormControlSelect1">
                                <option >Choose a category name</option>
                                <?php foreach ($categories as $index => $category): ?>
                                    <option <?php if ($category->id == $product->id_category) echo 'selected' ?> value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-4 col-form-label"><i class="fa-solid fa-asterisk"></i> Description</label>
                        <div class="col-sm-8">
                            <textarea value="" rows=3 name="description" type="text" class="form-control" id="floatingInputName" placeholder="Description" required autofocus><?php echo $product->description ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-5" id="upload_file_img">
                    <div class="row">
                        <div class="col-12 mb-3" id="big-container2">
                            <div id="image-container2" style="display: inline-block;"><div id="previewContainer2">
                                <?php foreach ($product->urls as $index => $url): ?>
                                    <div class="image-container">
                                        <img style="max-width: 200px; max-height: 200px;" src="<?php echo 'http://localhost/' . $url ?>" alt="Second slide">
                                        <span class="remove-image-old" name-image-old="<?php echo basename($url) ?>"><i class="fa-solid fa-xmark"></i></span>
                                    </div>
                                <?php endforeach; ?>
                            </div></div>
                        </div>
                        <div class="col-12">
                            <div id="dropbox">
                            <input type="file" name="image_product[]" id="image" multiple accept="image/*">
                            <input type="text" name="image_remove" hidden id="image_remove">
                            <input type="text" name="image_old_remove" hidden id="image_old_remove">
                            <label for=""><i class="fa-solid fa-wand-magic-sparkles"></i> New Images</label>
                            <p>
                                <img id="upload_img" src="image/icon/upload-file.png" >
                            </p>
                            </div>
                            <div id="image-container"><div id="previewContainer"></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid mb-2 mt-2">
                <div class="col-2 mx-auto">
                    <button class="col-12 mx-auto btn btn-outline-success text-uppercase" type="submit"><i class="fa-solid fa-floppy-disk mr-2"></i> SAVE</button>
                </div>
            </div>
        </form>
</div>
<script src="js/sidebar-dashboard.js"></script>
<script src="js/editproduct.js"></script>
</body>
</html>
