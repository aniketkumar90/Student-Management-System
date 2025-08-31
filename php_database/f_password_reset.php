<?php include_once 'config_db.php'; ?>
<?php
 $password = $_POST['password'];
$c_password = $_POST['cpassword'];
$mail_token = $_POST['token_id_get'];



$sql ="SELECT `token` FROM `login_details` WHERE token ='$mail_token';";
$result = mysqli_query($conn,$sql);
if($row = mysqli_num_rows($result)>0){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($password == $c_password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
         $sql1="UPDATE `login_details` SET `password`='$hashed_password' WHERE `token` = '$mail_token'";
         $result1 = mysqli_query($conn,$sql1);
         if($result1){
            $sql2="UPDATE `login_details` SET `token` ='' WHERE `token` = '$mail_token'";
            $result2 = mysqli_query($conn,$sql2);
            header('Location:../login.php');
         }
        }else{
            echo "Password Not Match";
        }
    }
}else{
    echo "Not Data Found";
}
?>