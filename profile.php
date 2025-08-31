<?php


include_once 'php_database/config_db.php';

session_start();

if (!isset($_SESSION["email"])) {
    header("Location:Index.php");
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$dob = @$_SESSION['dob'];
$address = @$_SESSION['address'];
$user_type = $_SESSION['user_type'];
// $profile_pic = $_SESSION['profile_pic'];
?>

<div class="container container-fluid admin-profile">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 p_image">
            <h2 style="text-align:center"> <?php echo $name; ?> Profile</h2>
            <?php
            $sql = "SELECT * FROM `sms_lsc` . `users` where `email` = '{$email}'";
            $result = mysqli_query($conn, $sql) or die("user data not found");

            if (mysqli_num_rows($result) > 0) {
            ?>
                <div class="card profile-card">
                    <?php while ($row = mysqli_fetch_array($result)) { ?>



                        <img src="profile/<?php echo $email; ?>.png" alt="profile_pic" width="100px" height="100px">
                        <!-- <img src="images/RG_Logo.png" alt="profile_pic" width="100px"> -->

                        <form action="php_database/update_profile.php" method="POST" enctype="multipart/form-data">


                            <div>
                                <label for="profile_pic" class="form-group up_profile">Profile Picture:</label>
                                <input type="file" name="profile_pic" class="form-control" value="" >
                            </div>

                            <div>
                                <label for="name" class="form-group up_profile">Name:</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" disabled>
                            </div>
                            <div>
                                <label for="email" class="form-group up_profile">Email ID:</label>
                                <input type="email" class="form-control" disabled value="<?php echo $row['email']; ?>">
                                <input type="email" hidden name="email_id" class="form-control" value="<?php echo $row['email']; ?>">
                            </div>
                            <div>
                                <label for="f_name" class="form-group up_profile">Father's Name:</label>
                                <input type="text" name="f_name" class="form-control" value="<?php echo $row['father_name'] ?>">
                            </div>
                            <div>
                                <label for="m_name" class="form-group up_profile">Mother's Name:</label>
                                <input type="text" name="m_name" class="form-control" value="<?php echo $row['mother_name'] ?>">
                            </div>
                            <div>
                                <label for="dob" class="form-group up_profile">Date Of Birth:</label>
                                <input type="date" name="dob" class="form-control" value="<?php echo $row['dob'] ?>">
                            </div>
                            <div>
                                <label for="address" class="form-group up_profile">Address: <?php echo $row['address'] ?> </label>

                                <textarea name="address" rows="3" cols="5" class="form-control" value="<?php echo $row['address'] ?>"> </textarea>


                            </div>
                            <br>
                            <div class="row">
                                <!-- <div class="col">
                                    <a href="#change_pw.php"><button class="btn btn-primary" id="change_pw">Change Password</button></a>
                                </div> -->
                                <div class="col">
                                    <a href="#update_profile.php"><button class="btn btn-primary" id="update_profile_admin">Update Profile</button></a>
                                </div>
                            </div>


                        <?php } ?>
                        </form>
                    <?php } ?>
                </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>