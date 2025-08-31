<?php
include 'config_db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

session_start();
$name = $phone_no = $email = $pass_word = $user_type = "";
$nameErr = $phone_noErr = $emailErr = $pass_wordErr = $usertypeErr = "";

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
        $phone_noErr = "Phone number is required";
        $is_valid = false;
    } else {
        $phone_no = test_input($_POST["phone_no"]);
        if (!preg_match("/^[0-9]{10}$/", $phone_no)) {
            $phone_noErr = "Invalid phone number format";
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
        $pass_word = $_POST["pass_word"];
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
        $phone_no = $_POST['phone_no'];
        $user_type = $_POST['user_type'];

        try {
            $pass_enc = password_hash($pass_word, PASSWORD_BCRYPT);
            $fetch_email = "SELECT * FROM `login_details` WHERE email = '$email_id'";
            $fetch_phone = "SELECT * FROM `users` WHERE phone = '$phone_no'";

            $sql_user = "INSERT INTO `users` (`name`, `email`, `phone`, `user_type`) VALUES ('$name', '$email_id', '$phone_no', '$user_type')";
            $sql_pass = "INSERT INTO `login_details` (`email`, `password`) VALUES ('$email_id', '$pass_enc')";

            $check_email = mysqli_query($conn, $fetch_email);
            $check_phone = mysqli_query($conn, $fetch_phone);
            $count = mysqli_num_rows($check_email);
            $count2 = mysqli_num_rows($check_phone);

            if ($count == 0 && $count2 == 0) {
                $signup_result = mysqli_query($conn, $sql_user);
                if ($signup_result) {
                    $signup_pass = mysqli_query($conn, $sql_pass);
                    if ($signup_pass) {
                        mysqli_commit($conn);

                        // Send welcome email
                        $mail = new PHPMailer(true);
                        try {
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'nee@gmail.com';
                            $mail->Password = 'mdvgkjdnhrgubjug';
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->Port = 587;

                            $mail->setFrom('nee@gmail.com', 'Navin');
                            $mail->addAddress($email_id, $name);

                            $mail->isHTML(true);
                            $mail->Subject = 'Welcome to Our Service';
                            $mail->Body = 'Dear ' . $name . ',<br><br>Thank you for signing up. Welcome to our service!<br><br>Best Regards,<br>Team';

                            $mail->send();
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }

                        header("Location: login.php");
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
                $emailErr = "Email id or Phone number already exists";
            }
        } catch (Exception $e) {
            mysqli_rollback($conn);
            echo $e->getMessage();
            header("Location: signup.php");
            exit();
        } finally {
            mysqli_close($conn);
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
