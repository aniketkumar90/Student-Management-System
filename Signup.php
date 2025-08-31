<?php include 'header.php';?>
<?php include_once 'navigation.php'; ?>
<?php
// session_start();
if (isset($_SESSION["email"])) {
    header("Location:dashboard.php");
    // exit();
}
?>

<?php 

include 'php_database/signup_data.php'; 

?>

<div class="row">
    <div class="col-md-12">
        <div class="images_bg4 img-fluid">
            <img src="images/shape-4.png" alt="image">
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

<div class="container-fluid sign_up">
    <div class="row">

        <div class="col-6 sign">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <section class="login">
                        <h2>SignUp Now</h2>

                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo $name; ?>" autofocus>
                                <span class="error"> <?php echo $nameErr; ?></span>
                            </div>
                            <div class="mb-3">
                                <input name="phone_no" type="number" class="form-control" placeholder="Phone no" value="<?php echo $phone_no; ?>">
                                <span class="error"> <?php echo $phone_noErr; ?></span>

                            </div>
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email ID" value="<?php echo $email; ?>">

                                <span class="error"> <?php echo $emailErr; ?></span>
                            </div>
                            <div class="mb-3">
                                <input name="pass_word" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="mb-3">

                                <label> SignUp as </label>
                                <label class="form-check-label" for="student"> Student </label>
                                <input name="user_type" class="form-check-input" type="radio" id="student" value="2" <?php if ($user_type == "2") echo "checked"; ?>>
                                <label class="form-check-label" for="teacher">&emsp; &emsp; Teacher </label>
                                <input name="user_type" class="form-check-input" type="radio" id="teacher" value="1" <?php if ($user_type == "1") echo "checked"; ?>>
                                <span class="error"> <?php echo $usertypeErr; ?></span>

                            </div>

                            <div class="mb-3">
                            <input type="hidden" name="status" class="form-control" value="1">
                            </div>
                            <div class="mb-3 style">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button name="submit" type="submit" class="btn btn-primary">SignUp</button>
                                <p>Already have an account? <a href="login.php"> Login</a> </p>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="log_image">
                <img class="img-fluid" src="images/Signup.svg" alt="">
            </div>
        </div>
    </div>
</div>
<?php include_once 'Footer.php'; ?>

