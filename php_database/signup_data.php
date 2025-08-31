<?php include 'config_db.php'; ?>
<?php include 'mail/testmail.php'; ?>

<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;



// session_start();
$name  = $phone_no = $email  = $pass_word = $user_type = $status = "";
$nameErr  = $phone_noErr = $emailErr = $pass_wordErr = $usertypeErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $is_valid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $is_valid = false;
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $is_valid = false;
        }
    }


    if (empty($_POST["phone_no"])) {
        $phone_noErr = "Phone no is required";
        $is_valid = false;
    } else {
        $phone_no = test_input($_POST["phone_no"]);
        if (!preg_match("/^[0-9]{10}$/", $phone_no)) {
            $phone_noErr = "Invalid Phone no format";
            $is_valid = false;
        }
    }



    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $is_valid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $is_valid = false;
        }
    }

    if (empty($_POST["pass_word"])) {
        $pass_wordErr = "Password is required";
        $is_valid = false;
    } else {
        $pass_word = ($_POST["pass_word"]);
        $hashed_password = password_hash($pass_word, PASSWORD_DEFAULT);
    }



    if (empty($_POST["user_type"])) {
        $usertypeErr = "User type is required";
        $is_valid = false;
    } else {
        $user_type = test_input($_POST["user_type"]);
    }

    if ($is_valid) {
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }


        mysqli_begin_transaction($conn);
        $email_id = $_POST['email'];
        $email = $_POST['email'];
        $phone_no = $_POST['phone_no'];
        $user_type = $_POST['user_type'];
        $pass_word = $_POST['pass_word'];
        $status = $_POST['status'];

        // $s_btn = $_POST['submit'];

        try {
            $pass_enc = password_hash($pass_word, PASSWORD_BCRYPT);
            $fetch_email = "SELECT * FROM `sms_lsc` . `login_details` WHERE email = '$email_id'";
            $fetch_phone = "SELECT * FROM `sms_lsc` . `users` WHERE phone = '$phone_no'";

            // $sql_user = "INSERT INTO `sms_lsc` . `users` (`name`, `email`,`phone`,`user_type`) VALUES ('{$name}','{$email_id}','{$phone_no}','{$user_type}');";
            // $sql_pass = "INSERT INTO `sms_lsc` . `login_details` (`email`,`password`) VALUES ('{$email_id}','{$pass_enc}');";
            // $sql_user_type = "INSERT INTO `sms_lsc` . `user_type` (`user_type`) VALUES ('{$user_type}');";
            // $sql_user_status = "INSERT INTO `sms_lsc` . `user_status` (`status`) VALUES ('{$status}');";


            $check_email = mysqli_query($conn, $fetch_email);
            $check_phone = mysqli_query($conn, $fetch_phone);
            $count = mysqli_num_rows($check_email);
            $count2 = mysqli_num_rows($check_phone);



            if ($count == 0 && $count2 == 0) {
                // echo 'asdfasd';


                mysqli_begin_transaction($conn);

                $name = mysqli_real_escape_string($conn, $name);
                $email_id = mysqli_real_escape_string($conn, $email_id);
                $phone_no = mysqli_real_escape_string($conn, $phone_no);
                $user_type = mysqli_real_escape_string($conn, $user_type);
                $pass_enc = mysqli_real_escape_string($conn, $pass_enc);

                $sql_user = "INSERT INTO `sms_lsc` . `users` (`name`, `email`,`phone`,`user_type` , `status`) VALUES ('{$name}','{$email_id}','{$phone_no}','{$user_type}' , '{$status}' );";
                $sql_pass = "INSERT INTO `sms_lsc` . `login_details` (`email`,`password`) VALUES ('{$email_id}','{$pass_enc}');";
                $sql_user_type = "INSERT INTO `sms_lsc` . `user_type` (`type`) VALUES ('{$user_type}');";
                $sql_user_status = "INSERT INTO `sms_lsc` . `user_status` (`status`) VALUES ('{$status}');";


                $signup_result = mysqli_query($conn, $sql_user);
                if ($signup_result) {

                    $signup_pass = mysqli_query($conn, $sql_pass);
                    $signup_user_type = mysqli_query($conn, $sql_user_type);
                    $signup_user_status = mysqli_query($conn, $sql_user_status);

                    if ($signup_pass and $signup_user_type and $signup_user_status) {
                        mysqli_commit($conn);


                        sendWelcomeMail($email, $name);

                        header("Location:login.php");

                        exit();
                    } else {
                        mysqli_rollback($conn);
                        $pass_wordErr = "Failed to insert password details";
                    }
                } else {
                    mysqli_rollback($conn);
                    $nameErr = "Failed to insert user details";
                }
            } else {
                $emailErr = "Email id or phone no already exists";
            }
        } catch (Exception $e) {

            mysqli_rollback($conn);
            echo $e->getMessage();
            // echo "asdf";
            header("Location:Signup.php");
            exit();
        } finally {
            mysqli_close($conn);
        }
    }
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>
