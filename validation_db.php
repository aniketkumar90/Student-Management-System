
<?php
session_start();?>


<?php include 'config_db.php' ;?>
<?php

$email = $_POST['email'];
$pass_word = $_POST['password'];

    

$sql = "select * from `sms_lsc` . `login_details` where `email` = '$email' and `password` = '$pass_word' ";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  

if ($user && password_verify($pass_word, $user['password'])) {
    $_SESSION['user_id'] = $user['id']; // Storing user ID in session
    header("Location: dashboard.php");
    exit();
} else {
    echo "<h1>Login failed. Invalid username or password.</h1>";
    header("Refresh:2; url=login.php"); // Redirect to login page after 2 seconds
    exit();
}

// $sql->close();
$conn->close();



// if($count == 1){  
//     echo "<h1><center> Login successful </center></h1>";  
//     header("Location: dashboard.php");

// }  
// else{  
//     echo "<h1> Login failed. Invalid username or password.</h1>";  
//     header("Location:login.php");

// }     

?>