<?php 
include_once 'config_db.php';
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
    $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
    $m_name = mysqli_real_escape_string($conn, $_POST['m_name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $profile_pic = $_FILES['profile_pic'];
    $profile_pic_name = $profile_pic['name'];
    $profile_pic_tmp_name = $profile_pic['tmp_name'];
    $profile_pic_size = $profile_pic['size'];
    $profile_pic_error = $profile_pic['error'];
    $profile_pic_type = $profile_pic['type'];

    // File upload handling
    $profile_picture_path = '';

    if ($profile_pic_name) {
        $profile_pic_ext = pathinfo($profile_pic_name, PATHINFO_EXTENSION);
        $profile_pic_actual_ext = strtolower($profile_pic_ext);

        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($profile_pic_actual_ext, $allowed)) {
            if ($profile_pic_error === 0) {
                if ($profile_pic_size < 1000000) { // less than 1MB
                    $profile_pic_new_name = $email_id . "." . $profile_pic_actual_ext;
                    $profile_pic_destination = '../profile/' . $profile_pic_new_name;
                    if (move_uploaded_file($profile_pic_tmp_name, $profile_pic_destination)) {
                        $profile_picture_path = $profile_pic_destination;
                    } else {
                        $_SESSION['profile_update_error'] = "Sorry, there was an error uploading your profile picture.";
                        header("Location: ../dashboard.php#profile.php");
                        exit();
                    }
                } else {
                    $_SESSION['profile_update_error'] = "Sorry, your file is too large.";
                    header("Location: ../dashboard.php#profile.php");
                    exit();
                }
            } else {
                $_SESSION['profile_update_error'] = "Sorry, there was an error with your file upload.";
                header("Location: ../dashboard.php#profile.php");
                exit();
            }
        } else {
            $_SESSION['profile_update_error'] = "Sorry, only JPG, JPEG, PNG files are allowed.";
            header("Location: ../dashboard.php#profile.php");
            exit();
        }
    }

    // Update the database
    if ($profile_picture_path) {
        $sql = "UPDATE `sms_lsc`.`users` SET `mother_name` = '{$m_name}', `father_name`='{$f_name}', `address`='{$address}', `dob`='{$dob}', `profile_pic`='{$profile_picture_path}' WHERE `email`='{$email_id}';";
    } else {
        $sql = "UPDATE `sms_lsc`.`users` SET `mother_name` = '{$m_name}', `father_name`='{$f_name}', `address`='{$address}', `dob`='{$dob}' WHERE `email`='{$email_id}';";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['profile_update_success'] = "Profile updated successfully.";
        header("Location: ../dashboard.php");
        exit();
    } else {
        $_SESSION['profile_update_error'] = "Failed to update profile. Please try again.";
        header("Location: ../dashboard.php#profile.php");
        exit();
    }
} else {
    header("Location: ../profile.php");
    exit();
}

$conn->close();
?>
