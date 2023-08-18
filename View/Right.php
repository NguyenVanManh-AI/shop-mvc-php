<link rel="stylesheet" href="css/right.css">
<div id="right_min" >
    <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
        <div id="show_modal" data-toggle="modal" data-target="#modalUser">
            <span><?php echo $User->fullname ?></span> 
                <img id="upload_img" src="http://localhost/<?php echo $User->avatar ?>">
        </div>
        <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div id="modal_content" class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: transparent;border: none;">
                    <div id="outner_modal">
                        <div id="min_modal_content">
                            <a href="ViewInfor.php"><span><i class="fa-solid fa-user-check"></i></span><?php echo $User->fullname ?></a>
                            <a href="PersonalPage.php?id_user=<?php echo $User->id ?>"><span><i class="fa-solid fa-gear"></i></span> Personal page </a>
                            <a href=""><span><i class="fa-solid fa-question"></i></span> Help & Support </a>
                            <a href=""><span><i class="fa-solid fa-info"></i></span> Comments </a>
                            <a href='../Controller/ControllerUser.php?logout=1' ><span><i class="fa-solid fa-arrow-right-from-bracket"></i></span> Log out </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
    <div id="show_modal" data-toggle="modal" data-target="#modalUser">
        <a href="Login.php" style="border-radius: 10px" type="button" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-right-to-bracket mr-2"></i> Login</a>
    </div>
    <?php endif; ?>
</div>