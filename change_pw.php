<?php
//  include_once 'header.php'; 
// <?php include_once 'navigation.php'; ?>

?>

<div class="row">
    <div class="col-md-12">
        <div class="images_bg1 img-fluid">
            <img src="images/shape-2.png" alt="image">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="images_bg2 img-fluid">
            <img src="images/shape-1.png" alt="image">
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="log_image12">
                <img class="img-fluid" src="images/Forgot.png" alt="">
            </div>
        </div>
        <div class="col-md-6 log_data">
            <div class="row">
                <div class="col-9">
                    <section class="login">

                        <h2>Change Password</h2>


                        <form method="POST" action="php_database/change_pw_db.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="npassword" placeholder="New Password" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="mb-3 style">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
</div>


<?php 
// include_once 'footer.php';
 ?>
