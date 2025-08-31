<?php include_once 'header.php'; ?>
<?php include_once 'navigation.php'; ?>
<?php include_once 'php_database/forgot_token.php'; ?>
<?php
@$wrong_email = $_SESSION['wrong_email'];
@$right_email = $_SESSION['right_email'];
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
                        <h2>Forgot Password</h2>


                        <!-- <form class="send_otp" method="POST" action="mail/send_otp.php" enctype="multipart/form-data"> -->

                        <form class="send_otp" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email Id">
                            </div>
                            <div class="mb-3">
                                <?php
                                if (isset($_SESSION['right_email'])) {
                                    echo "<p style='color: blue;'>" . $right_email. "</p>";
                                    unset($_SESSION['right_email']);
                                }
                                ?>
                            </div>

                            <div class="mb-3">
                                <?php
                                if (isset($_SESSION['wrong_email'])) {
                                    echo "<p style='color: red;'>" . $wrong_email . "</p>";
                                    unset($_SESSION['wrong_email']);
                                }
                                ?>
                            </div>
                          
                            <div class="mb-3 style">
                                <button type="submit" class="btn btn-primary" id=send_otp> Send mail</button>
                                <!-- formaction="otp.php"  -->
                            </div>
                        </form>

                    </section>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'Footer.php'; ?>