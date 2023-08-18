<?php 

    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){}
    else header("location: PageNotFound.php");

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
		<link rel="stylesheet" href="css/change-password.css">
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
<div class="container_big" style="padding: 0px 30px">
    <div class="pt-3" id="big_update">
        <img src="http://localhost/<?php echo $User->avatar ?>" >
        <br>      
        <hr>
        <form method="POST" action="../Controller/ControllerUser.php?change_password=1" enctype="multipart/form-data">
            <p id="title_update_infor"><i class="fa-solid fa-bolt"></i> Change Password</p>
            <div class="col-7 mx-auto">
                <div class="row mb-2">
                    <label for="inputPassword" class="col-sm-5 col-form-label"><i class="fa-solid fa-key mr-1"></i></i>Old Password</label>
                    <div class="col-sm-7">
                        <input minlength="<?php echo ENUM::MIN_PASSWORD ?>" value="" name="old_password" type="password" class="form-control" id="floatingInputName" placeholder="Old Password" required autofocus>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="inputPassword" class="col-sm-5 col-form-label"><i class="fa-solid fa-key mr-1"></i></i>Confirm Old Password</label>
                    <div class="col-sm-7">
                        <input minlength="<?php echo ENUM::MIN_PASSWORD ?>" value="" name="confirm_old_password" type="password" class="form-control" id="floatingInputName" placeholder="Confirm Old Password" required autofocus>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="inputPassword" class="col-sm-5 col-form-label"><i class="fa-solid fa-key mr-1"></i></i>New Password</label>
                    <div class="col-sm-7">
                        <input minlength="<?php echo ENUM::MIN_PASSWORD ?>" value="" name="new_password" type="password" class="form-control" id="floatingInputName" placeholder="New Password" required autofocus>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2 mx-auto">
                    <button class="col-12 mx-auto btn btn-outline-success text-uppercase" type="submit"><i class="fa-solid fa-floppy-disk mr-2"></i> SAVE</button>
                </div>
            </div>
        </form>  
        <br>      
    </div>
</div>
</div>
<script src="js/sidebar-dashboard.js"></script>
</body>
</html>
