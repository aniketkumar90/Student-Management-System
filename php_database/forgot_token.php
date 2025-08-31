<?php include_once 'config_db.php'; ?>
<?php include_once 'mail/reset_mail.php'; ?>

<?php
$email_id = @$_POST['email'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "SELECT email,id FROM `sms_lsc`.`login_details` WHERE `email` = '$email_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $fetch_id = mysqli_fetch_assoc($res);
        $id = $fetch_id['id'];
        $token = time() . $id;
        if ($row = mysqli_num_rows($res) > 0) {
            $sql1 = "UPDATE `sms_lsc`.`login_details` SET token ='$token'  where email ='{$email_id}';";
            $res1 = mysqli_query($conn, $sql1);
            if($res1){
                $sql2 = "SELECT token FROM `sms_lsc`.`login_details` WHERE `email` = '$email_id'";
                $res2 = mysqli_query($conn,$sql2); 
                $fetch_token = mysqli_fetch_assoc($res2);
                $tf_token = $fetch_token['token'];
                $_SESSION['right_email'] = "Reset Message had been sent";
                $send_link ="http://localhost/sms_lsc/change_pw_reset.php?sdd=".$tf_token;
                sendResetEmail($email_id,$send_link);
            //    echo $email_id . $tf_token;
            }          
            // header('Location:../sms_lsc/forgot.php');
        } else {
            $_SESSION['wrong_email'] = "Email-id is not registered with us.";
        }
    }
}
?>
