

<?php include_once 'config_db.php'; ?>

<?php 
    $approved_id = $_GET['id'];
    $user_type = $_GET['user_type'];



    if($user_type == 1){
        $sql ="UPDATE `sms_lsc` . `users` SET status = 3  where id ='{$approved_id}';";
        $result = mysqli_query($conn, $sql) or die ("Querry Unsuccessful");
        if($result){
            header("Location:../dashboard.php#tcr_rejected.php");

        }else{
            die("No User Found");
        }
    }elseif($user_type == 2){
        $sql1 ="UPDATE `sms_lsc` . `users` SET status = 3  where id ='{$approved_id}';";
        $result1 = mysqli_query($conn, $sql1) or die ("Querry Unsuccessful");
        if($result1){
            header("Location:../dashboard.php#a_rejected_stu.php");
        }else{
            die("No User Found");
        }
    }
    mysqli_close($conn);
?>
 