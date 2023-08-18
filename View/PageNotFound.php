<?php 

	session_start();

	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
		header("location: Home.php");
	}

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
		<link rel="stylesheet" href="css/pagenotfound.css">
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
	<div id="page-not-found">
		<h1>PAGE NOT FOUND !</h1>
        <img src="image/404.jpg" alt="404">
        <a href='Login.php'><button class="btn btn-outline-dark">LOGIN</button></a>
	</div>
<script src="js/sidebar-dashboard.js"></script>
</body>
</html>
