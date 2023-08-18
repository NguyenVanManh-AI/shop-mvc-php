<?php 

  session_start();
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) header("location: Home.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'Heade.php';?>
    <link rel="stylesheet" href="css/login.css">
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
<div class="container-fluid ps-md-0">
    <div class="row g-0">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Welcome back!</h3>
              <form method="POST" action="../Controller/ControllerUser.php?login=1" enctype="multipart/form-data">
                  <div class="form-group has-float-label">
                    <input name="email" type="text" class="form-control" id="email" placeholder="name@example.com" required>
                    <label for="email">Email</label>
                  </div>

                  <div class="form-floating mb-3 has-float-label">
                    <input name="password"  type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>

                  <div class="row mb-2">
                    <div class="col-12">
                      <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                        <label class="form-check-label" for="rememberPasswordCheck">
                          Remember password
                        </label>
                      </div>
                    </div>
                  </div>
                    <div class="d-grid">
                    <button class="col-12 btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
                    <div class="text-center">
                      <a class="small" href="Register.php">Do not have an account ? Sign up here.</a>
                    </div>
                  </div>
                    <hr>
                </form>
                <div class="d-flex justify-content-center">
                  <a href="{{ route('main.view-main') }}" style="border-radius: 10px" type="button" class="btn btn-outline-primary"><i class="fa-solid fa-house"></i> Home</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
