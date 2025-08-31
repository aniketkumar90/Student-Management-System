<?php include_once 'config_db.php'; ?>


<?php 

$name = $_POST['task_name'];
$task_type = $_POST['task_type'];

$task_description = $_POST['task_description'];

$sql_task = "INSERT INTO `sms_lsc` . `task` (`name`, `task_type`,`task_description`) VALUES ('{$name}','{$task_type}','{$task_description}');";

$sql_task_type = "INSERT INTO `sms_lsc` . `task_type` (`name`, `task_type`) VALUES ('{$name}' , '{$task_type}');";

$upload_task = mysqli_query($conn, $sql_task);
$upload_task_type = mysqli_query($conn, $sql_task_type);

if ($upload_task and $upload_task_type) {
    header("Location:../dashboard.php");
} else {
    die("Task not Uploaded");
}
mysqli_close($conn);
?>
