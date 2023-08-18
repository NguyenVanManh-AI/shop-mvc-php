<?php 

	session_start();
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) header("location: Home.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'Heade.php';?>
		<link rel="stylesheet" href="css/register.css">
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
	<div class="container">
		<div class="row">
		  <div class="col-lg-10 col-xl-9 mx-auto">
			<div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
			  <div class="card-img-left d-none d-md-flex">
			  </div>
			  <div class="card-body pt-4 pb-4 pl-5 pr-5">
				<h5 class="card-title text-center mb-4 fw-light fs-5">Register</h5>
				<form method="POST" action="../Controller/ControllerUser.php?register=1" enctype="multipart/form-data">
				  <div class="form-floating mb-3 has-float-label">
					  <input name="name" type="text" class="form-control" id="floatingInputName" placeholder="Full Name" required autofocus>
					  <label for="floatingInputName">Name</label>
				  </div>
	
				  <div class="form-floating mb-3 has-float-label">
					<input name="email" type="email" class="form-control" id="floatingInputEmail" placeholder="email@example.com" required>
					<label for="floatingInputEmail">Email address</label>
				  </div>
				  <div class="form-floating mb-3 has-float-label">
					<input minlength="<?php echo ENUM::MIN_PASSWORD ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
					<label for="floatingPassword">Password</label>
				  </div>
	
				  <div class="form-floating mb-3 has-float-label">
					<input name="confirm-password" type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password" required>
					<label for="floatingPasswordConfirm">Confirm Password</label>
				  </div>
	
				  <div class="col-sm-12 border pt-2 mb-3">
					  <div class="row">
						  <div class="col-4">
							  <div class="form-check">
								  <input name="gender" class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked required>
								  <label class="form-check-label" for="gridRadios1"> Men </label>
							  </div>
							  <div class="form-check">
								  <input name="gender" class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="0" required>
								  <label class="form-check-label" for="gridRadios2"> Women </label>
							  </div>
						  </div>
						  <div class="col-8 pb-2 d-flex justify-content-end" >
							  <div id="dropbox">
								<input type="file" name="avatar" id="image" accept="image/*" required>
								  <p>
									<img id="upload_img" src="image/icon/upload-file2.png" >
								  </p>
							  </div>
							  <div id="image-container">
								  <img id="image-preview" src="#" alt="Preview">
								  <img id="cancel-btn" src="image/icon/error.png">
							  </div>
						  </div>
						  <script>
							  function readURL(input) {
								  if (input.files && input.files[0]) {
									  var reader = new FileReader();
									  reader.onload = function(e) {
										  $('#image-container').css('display', 'inline-block');
										  $('#image-preview').attr('src', e.target.result);
										  $('#image-preview').show();
										  $('#dropbox').hide();
										  $('#cancel-btn').show();
									  }
									  reader.readAsDataURL(input.files[0]);
								  }
							  }
							  $("#image").change(function() {
								  readURL(this);
							  });
							  $("#cancel-btn").click(function() {
								  $('#image-container').hide();
								  $('#image-preview').hide();
								  $('#dropbox').val('').show();
								  $('#cancel-btn').hide();
								  $('#image').val('');
							  });
						  </script>
					  </div>
				  </div>
				  <div class="d-grid mb-2">
					<button class="col-12 btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
				  </div>
				  <a class="d-block text-center mt-2 small" href="Login.php">Have an account? Sign In</a>
				</form>
				<hr class="my-4">
				<div class="d-flex justify-content-center">
				  <a href="" style="border-radius: 10px" type="button" class="btn btn-outline-primary"><i class="fa-solid fa-house"></i> Home</a>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
</body>
</html>