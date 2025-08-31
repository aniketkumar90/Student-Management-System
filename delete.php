<?php
session_start();
$user_type = $_SESSION['user_type'];
?>

<div class="row">
    <div class="col-md-12">
        <div class="images_bg5 img-fluid">
            <img src="images/shape-5.png" alt="image">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="side-bar">
            <a href="dashboard.php">
                <h3><i class="bi bi-upc"></i>Dashboard</h3>
            </a>
            <div class="menu">

                <?php if ($user_type != 1 && $user_type != 2): ?>
                <div class="item">
                    <a class="sub-btn"><i class="bi bi-person icon"></i>Teacher </a>
                    <div class="sub-menu">
                        <a href="tcr_approved.php" id="approved-teacher" class="sub-item">Approved</a>
                        <a href="tcr_pending.php" id="pending-teacher" class="sub-item">Pending</a>
                        <a href="tcr_rejected.php" id="rejected-teacher" class="sub-item">Rejected</a>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($user_type != 2): ?>
                <div class="item">
                    <a class="sub-btn"><i class="bi bi-person icon"></i>Student </a>
                    <div class="sub-menu">
                        <a href="a_approved_stu.php" id="a_approved_student" class="sub-item">Approved</a>
                        <a href="a_pending_stu.php" id="a_pending_student" class="sub-item">Pending</a>
                        <a href="a_rejected_stu.php" id="a_rejected_student" class="sub-item">Rejected</a>
                    </div>
                </div>
                <?php endif; ?>

                <div class="item">
                    <a class="sub-btn"><i class="bi bi-border-width"></i>Assignment </a>
                    <div class="sub-menu">
                        <a href="view_Ass.php" id="view_assignment_admin" class="sub-item">View</a>
                        <a href="upload_Ass.php" id="upload_assignment_admin" class="sub-item">Add</a>
                    </div>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="bi bi-newspaper"></i>Notice </a>
                    <div class="sub-menu">
                        <a href="view_notice.php" id="view_notice" class="sub-item">View</a>
                        <a href="upload_notice.php" id="upload_notice" class="sub-item">Add</a>
                    </div>
                </div>
                <div class="item">
                    <a href="profile.php" id="view_profile"><i class="bi bi-newspaper"></i>Profile </a>
                </div>
                <div class="item"><a href="logout.php"><i class="bi bi-upc"></i>Sign Out</a></div>
            </div>
        </div>
    </div>
</div>





















<!-- Muskan -->

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



                        <img src="img/<?php echo $name; ?>.png" alt="profile_pic" width="100px">
                        <!-- <img src="images/RG_Logo.png" alt="profile_pic" width="100px"> -->

                        <form action="php_database/update_profile_db.php" method="POST" enctype="multipart/form-data">
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
                                <label for="address" class="form-group up_profile">Address:</label>

                                <textarea name="address" rows="3" cols="5" class="form-control" value="<?php echo $row['address'] ?>"> </textarea>
                            </div>

                            <div>
                                <label for="profile_pic" class="form-group up_profile">Profile Picture:</label>
                                <input type="file" name="profile_pic" class="form-control">
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


<!-- [31/05, 21:54] BCA Muskan R77:  -->


<?php include_once 'config_db.php'; ?>
<?php session_start();
if (!isset($_SESSION["email"])) {
    header("Location:../login.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
    $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
    $m_name = mysqli_real_escape_string($conn, $_POST['m_name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $profile_pic = @$_FILES['profile_pic'];
    $profile_pic_name = @$profile_pic['name'];
    $profile_pic_tmp_name = @$profile_pic['tmp_name'];
    $profile_pic_size = @$profile_pic['size'];
    $profile_pic_error = @$profile_pic['error'];
    $profile_pic_type = @$profile_pic['type'];

    $profile_pic_ext = implode(".", $profile_pic_name);
    $profile_pic_actual_ext = strtolower(end($profile_pic_ext));

    $allowed = array('jpg', 'jpeg', 'png');
    if ($profile_pic_name !== null) {
        $profile_pic_ext = implode('.' , $profile_pic_name);

        if (in_array($profile_pic_actual_ext, $allowed)) {
            if ($profile_pic_error === 0) {
                if ($profile_pic_size < 1000000) { // less than 1MB
                    $profile_pic_new_name = $email_id . "." . $profile_pic_actual_ext;
                    $profile_pic_destination = '../img/' . $profile_pic_new_name;
                    move_uploaded_file($profile_pic_tmp_name, $profile_pic_destination);


                    $sql = "UPDATE `sms_lsc` . `users` SET `mother_name` = '{$m_name}', `father_name`='{$f_name}' ,`address`='{$address}', dob='{$dob}', profile_pic ='{$profile_pic}'  where email ='{$email_id}';";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $_SESSION['profile_update_success'] = "Profile updated successfully.";
                        header("Location: ../dashboard.php");
                        exit();
                    } else {
                        $_SESSION['profile_update_error'] = "Failed to update profile. Please try again.";
                        header("Location: ../profile.php");
                        exit();
                    }
                }
            }
        }
    }
} else {
    header("Location: ../profile.php");
    exit();
}
$conn->close();

?>
