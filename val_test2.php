<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "sfshdJ98765*(&^%$#";

$dbname = "sms_lsc"; // Specify your database name here

// Establishing connection
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception('DB not connected: ' . $conn->connect_error);
    }
} catch (Exception $e) {
    die('Connection failed: ' . $e->getMessage());
}

// Check if POST variables are set
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Sanitizing input
    $email = $conn->real_escape_string($_POST['email']);
    $pass_word = $_POST['password'];

    // Prepared statement to prevent SQL injection
    $sql = $conn->prepare("SELECT * FROM login_details WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($pass_word, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Storing user ID in session
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<h1>Login failed. Invalid username or password.</h1>";
        header("Refresh:2; url=login.php"); // Redirect to login page after 2 seconds
        exit();
    }

    $sql->close();
} else {
    echo "<h1>Login failed. Email or password not set.</h1>";
    header("Refresh:2; url=login.php"); // Redirect to login page after 2 seconds
}

$conn->close();
?>
