<?php
 
    $servername = "localhost";
    $username = "root";

    $password = "";
    //  $password = "";
    // $password = "sfddsf^%sdfsdf745";


    $database ="sms_lsc";
    // $conn = '';

    try {
        // $conn = '';
        $conn = mysqli_connect($servername, $username,"", $database);
        

    }

    catch(Exception $e) {
    echo mysqli_connect_error();
    print_r($e);
    }


    // print_r($conn);
    

    if (!$conn){
        die('DB not connected');
    }

?>