<?php 

    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){}
    else header("location: PageNotFound.php");
    if(isset($_SESSION['categories'])) $categories = $_SESSION['categories'];

    $User = $_SESSION['user'];

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
		<link rel="stylesheet" href="css/category.css">
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
        <p id="title_update_infor"><i class="fa-solid fa-boxes-stacked"></i> Category</p>
        <div class="form-group row">
            <div class="col-11">
                <div class="row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Search</label>
                    <div class="col-sm-10">
                        <input value="" name="title" type="text" class="form-control" id="search" aria-describedby="titleHelp" placeholder="Search">
                    </div>
                    <a id="btn-search" href="" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i> </a>
                </div>
            </div>
            <div>
                <button data-toggle="modal" data-target="#exampleModalAddCategory" type="button" class="btn btn-outline-primary"> <i class="fa-solid fa-square-plus"></i> Add </button>
            </div>
        </div>
        <div id="bodytable">
            <div class="table" id="html_category">
                <?php foreach ($categories as $index => $category): ?>
                    <div class="item-category">
                        <div class="name"><span style="font-weight: bold;"> #<?php echo $index + 1 ?> </span><?php echo $category->name ?></div>
                        <div class="gr">
                            <button data-id_user='<?php echo $category->id_user ?>' data-name_category='<?php echo $category->name ?>' data-id_category='<?php echo $category->id ?>' data-toggle="modal" type="button" class="btn btn-outline-primary btn-edit"  data-toggle="modal" data-target="#exampleModalEdit"><i class="fa-solid fa-pencil"></i> Edit</button>
                            <form method="POST" action="../Controller/ControllerCategory.php?delete=1&id_category=<?php echo $category->id ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this category ?');">
                                <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Model Add Category -->
        <div style="background-color: rgb(80 80 80 / 46%);" class="modal fade" id="exampleModalAddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                    <form method="POST" action="../Controller/ControllerCategory.php?add=1">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-plus"></i> New Category </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label"><i class="fa-solid fa-list"></i> Name Category</label>
                                <input name="name" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" id="closeAdd" >Close</button>
                            <button type="submit" class="btn btn-outline-primary" >Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Model Add Category -->
        <!-- Model Edit Category -->
        <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" @click="resetpage($event)">
        <div class="modal-dialog" role="document" id="noclose">
            <div class="modal-content" id="noclose">
                <form method="POST" action="../Controller/ControllerCategory.php?update=1">
                    <div class="modal-header" id="noclose">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="noclose">
                        <label id="noclose" for="recipient-name" class="col-form-label"><i class="fa-solid fa-list"></i> Name Category</label>
                        <input id="nameCategory" type="text" name="name" class="form-control">
                        <input hidden id="idCategory" type="text" name="id_category" class="form-control">
                    </div>
                    <div class="modal-footer" id="noclose">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" @click="closeEdit" id="closedl">Close</button>
                        <button type="submit" class="btn btn-outline-primary" id="btn-save-edit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Model Edit Category -->
    </div>
</div>
<script src="js/sidebar-dashboard.js"></script>
<script src="js/category.js"></script>
<script src="js/ajax_category.js"></script>
</body>
</html>
