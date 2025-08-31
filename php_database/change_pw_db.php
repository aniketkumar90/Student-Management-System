<?php
include_once 'config_db.php';
?>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $email = $_SESSION['email']; 

    }





    $sql = "UPDATE `sms_lsc`.`users` SET f_name = '{$father_name}', m_name = '{$mother_name}' , dob = '{$dob}', address = '{$address}', WHERE email = '{$email}'";


    $update_profile = mysqli_query($conn, $sql);



    if ($update_profile) {
        // echo "Profile updated successfully.";
        header("Location: ../profile.php");
        // exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

?>
