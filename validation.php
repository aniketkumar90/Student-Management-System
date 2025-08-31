
<?php
session_start();
function validate_login($email, $password)
{



$servername = "localhost";
$username = "root";
$password = "sfshdJ98765*(&^%$#";
// $password = "";

try {
    $conn = '';
    $conn = mysqli_connect($servername, $username, $password);

}

catch(Exception $e) {
echo mysqli_connect_error();
print_r($e);
}

if (!$conn){
    die('DB not connected');
}

echo 'DB connected';

    $users = array(
        "dev_Rohan@sms.com" => array("password" =>  "Rohan@33", "role" => "admin"), //Admin Password
        "nav_dev@sms.com" => array("password" =>  "Navin@13", "role" => "teacher"),  //Teacher Password
        "dev_mus@sms.com" => array("password" =>  "Muskan@77", "role" => "student")  //Student Password
    );


    

    // if (isset($users[$email]) && $users[$email] == $password) {
    // if ($_POST['email'] == $email && $_POST['password'] == $password) {

    // return true;

    if (isset($users[$email]) && $users[$email]['password'] == $password) {
        return $users[$email]['role'];
    } else {
        return false;
    }
}


$email = $_POST['email'];
$password = $_POST['password'];

$role = validate_login($email, $password);


if ($role) {
    $_SESSION['email'] = $email;
    header("Location: dashboard.php");
} else {
    $_SESSION['error_message'] = "Invalid Email or  Password.";
    // echo $error_message;
    // echo "<p> Email or Password is incorrect </p>";
    header("Location:login.php");
}
