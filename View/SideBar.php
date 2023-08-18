<style>
    rte-floatpanel {
        display: none !important;
    }
</style>
<div class="sidebar" style="opacity: 1;">
    <ul class="nav-links" id="accordion"> 
        <div id="logo">
            <img id="img_logo" src="image/php.png" alt="">
            <span id="text_logo">Shop PHP</span>
            <span id="show_sidebar" ><i class="bx bx-menu"></i></span>
        </div>
        <li><a href="Home.php"><i class="fa-solid fa-house"></i><span class="link_name">Home</span></a></li> 
	        <li>
            <div >
                <a style="font-weight: 500 !important;" href="#" class="link_arrow" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa-solid fa-user-gear"></i>
                    <span class="link_name">Information Settings</span>
                    <i class="bx bxs-chevron-down arrow"></i>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body2 list_card">
                    <a href="ViewInfor.php"><i class="fa-solid fa-address-card"></i><span class="link_name">Update Information</span></a>
                    <a href="ChangePassword.php"><i class="fa-solid fa-key"></i><span class="link_name">Change Password</span></a>
                </div>
                </div>
            </div>
        </li>
        <li> 
            <div >
                <a href="#" class="link_arrow" data-toggle="collapse" data-target="#collapseArticle" aria-expanded="true" aria-controls="collapseOne">
                <i class="fa-brands fa-dropbox"></i><span class="link_name">Products</span><i class="bx bxs-chevron-down arrow"></i>
                </a>
                <div id="collapseArticle" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body2 list_card">
                        <a href="../Controller/ControllerProduct.php?all=1"><i class="fa-solid fa-border-all"></i><span class="link_name">All Product</span></a>
                        <a href="../Controller/ControllerCategory.php?all=1"><i class="fa-solid fa-square-plus"></i><span class="link_name">Add Product</span></a>
                    </div>
                </div>
            </div>
        </li>
        <li><a href="../Controller/ControllerCategory.php?show=1"><i class="fa-solid fa-list"></i><span class="link_name">Categories</span></a></li> 
        <li><a href="PersonalPage.php?id_user=<?php echo $User->id ?>"><i class="fa-solid fa-circle-user"></i><span class="link_name">Personal interface</span></a></li> 
        <li><a href="#"><i class="fa-solid fa-circle-question"></i><span class="link_name">Help</span></a></li> 
        <li><a href="#"><i class="fa-solid fa-circle-info"></i><span class="link_name">Comment</span></a></li>  
        <li>
            <div class="profile-details">
                <div class="name-job">
					<?php
						echo '<div class="profile_name">' . $User->fullname . '</div>';
					?>
					<div class="job">User</div>
                </div>
                <a href='../Controller/ControllerUser.php?logout=1' id="logout"><i class="bx bx-log-out"></i></a>
            </div>
        </li>
    </ul>
</div>