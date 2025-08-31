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
    // $profile_pic = ($conn, $_FILES['profile_pic']);


    // File upload handling


    // dfghjyuioyvitemhfwiuenhxuybefwgemfwbef


    $profile_picture_path = '';
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "profile";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $file_name = basename($_FILES["profile_pic"]["name"]);
        $target_file = $target_dir . uniqid() . '-' . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate the image
        $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
        if ($check !== false) {
            if ($_FILES["profile_pic"]["size"] <= 5000000) {
                $allowed_types = array("jpg", "jpeg", "png", "gif");
                if (in_array($imageFileType, $allowed_types)) {
                    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                        $profile_picture_path = $target_file;
                    } else {
                        $_SESSION['profile_update_error'] = "Sorry, there was an error uploading your profile picture.";
                        header("Location: ../dashboard.php#profile.php");
                        exit();
                    }
                } else {
                    $_SESSION['profile_update_error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    header("Location: ../dashboard.php#profile.php");
                    exit();
                }
            } else {
                $_SESSION['profile_update_error'] = "Sorry, your file is too large.";
                header("Location: ../dashboard.php#profile.php");
                exit();
            }
        } else {
            $_SESSION['profile_update_error'] = "File is not an image.";
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
    header("Location: ../dashboard.php#profile.php");
    exit();
}
















//     $sql = "UPDATE `sms_lsc` . `users` SET `mother_name` = '{$m_name}', `father_name`='{$f_name}' ,`address`='{$address}', dob='{$dob}' where email ='{$email_id}';";
//     $result = mysqli_query($conn, $sql);

//     if ($result) {
//         $_SESSION['profile_update_success'] = "Profile updated successfully.";
//         header("Location: ../dashboard.php");
//         exit();
//     } else {
//         $_SESSION['profile_update_error'] = "Failed to update profile. Please try again.";
//         header("Location: ../profile.php");
//         exit();
//     }
// } else {
//     header("Location: ../profile.php");
//     exit();
// }





$conn->close();

?>