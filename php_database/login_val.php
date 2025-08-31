
<?php include_once 'config_db.php'; ?>


<?php
session_start();
// $email_id = $_POST['email'];

$email_id = mysqli_real_escape_string($conn, $_POST['email']);
$pass_word = $_POST['pass_word'];



$sql = "SELECT email, password FROM `sms_lsc` .`login_details` WHERE email = '$email_id'";
$result = mysqli_query($conn, $sql);


if ($result && mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $d_password = $row['password'];

    if (password_verify($pass_word, $d_password)) {
        $sql1 = "SELECT `email`, `name`, `user_type`, `phone` FROM `sms_lsc` . `users` WHERE `email` = '$email_id'";
        $result1 = mysqli_query($conn, $sql1);


        if ($result1 && mysqli_num_rows($result1) > 0) {
            $row1 = $result1->fetch_assoc();

            $_SESSION['name'] = $row1['name'];
            $_SESSION['email'] = $row1['email'];
            $_SESSION['user_type'] = $row1['user_type'];
            $_SESSION['phone'] = $row1['phone'];


            header("Location:../dashboard.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Failed to fetch user details.";
            header("Location: ../login.php");
            exit();
        }
    } else {

        $_SESSION['login_error'] = "Please enter the correct password.";
        header("Location:../login.php");
        exit();
    }
} else {
    $_SESSION['login_error'] = "Your email-id is not registered with us.";
    header("Location:../login.php");
    exit();
}

//navin code is commented 

// try{

//     $sql = "SELECT email, password FROM `sms_lsc` .`login_details` WHERE email = '$email_id';";
//     $check = mysqli_query($conn,$sql);
//     $resut = mysqli_fetch_assoc($check);
//     $d_email = $resut['email'];
//     $d_paa = $resut['password'];
//     if(mysqli_num_rows($check)>0){
//         if(password_verify($pass_word,$d_paa)){
//             // session_start();
//             // $_SESSION['eamil']=$d_email;
//             header("Location:../dashboard.php");
//         }else{
//             throw new Exception("Wrong Password");
//         }
//     }
// }catch(Exception $e){
//     echo $e->getMessage();
// }
// mysqli_close($conn);

$conn->close();


?>
