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
		<link rel="stylesheet" href="css/viewinfor.css">
		<link rel="stylesheet" href="css/sidebar-dashboard.css">
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
        <form method="POST" action="../Controller/ControllerUser.php?update_infor=1" enctype="multipart/form-data">
            <br>
            <p id="title_update_infor"><i class="fa-solid fa-circle-user"></i> Update Information</p>
            <div class="form-group row ml-2 mr-2">
                <div class="col-8">
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label"><i class="fa-solid fa-user-check mr-1"></i> Full Name</label>
                        <div class="col-sm-9">
                            <input value="<?php echo $User->fullname ?>" name="name" type="text" class="form-control" id="floatingInputName" placeholder="Full Name" required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa-solid fa-envelope-circle-check mr-1"></i> Email</label>
                        <div class="col-sm-9">
                            <input hidden value="<?php echo $User->email ?>" name="email" type="email" class="form-control" id="floatingInputEmail" placeholder="email@example.com" required>
                            <input disabled value="<?php echo $User->email ?>" name="email" type="email" class="form-control" id="floatingInputEmail" placeholder="email@example.com" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa-solid fa-venus-mars mr-1"></i> Gender</label>
                        <div class="col-sm-9">
                            <div class="form-check mb-2">
                                <input name="gender" class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" 
                                <?php if($User->gender == '1') echo ('checked');?> required>
                                <label class="form-check-label" for="gridRadios1"> Men </label>
                            </div>
                            <div class="form-check">
                            <input name="gender" class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="0"
                            <?php if($User->gender == '0') echo ('checked');?> required>
                                <label class="form-check-label" for="gridRadios2"> Women </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4" id="upload_file_img">
                    <div id="dropbox">
                        <input type="file" name="avatar" id="image" accept="image/*">
                        <label for=""><i class="fa-solid fa-wand-magic-sparkles"></i> Avatar User</label>
                        <p>
                            <img id="upload_img" src="http://localhost/<?php echo $User->avatar ?>" >
                        </p>
                    </div>
                    <div id="image-container">
                        <img id="image-preview" src="#" alt="Preview">
                        <img id="cancel-btn" src="image/icon/error.png" >
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
            <div class="d-grid mb-2 mt-2">
                <div class="col-2 mx-auto">
                    <button class="col-12 mx-auto btn btn-outline-success text-uppercase" type="submit"><i class="fa-solid fa-floppy-disk mr-2"></i> SAVE</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
</div>
<script src="js/sidebar-dashboard.js"></script>
</body>
</html>
