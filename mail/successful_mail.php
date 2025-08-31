<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];

$role = validate_login($email, $password);


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'aniketkumar2018ak@gmail.com';                     //SMTP username
    $mail->Password   = 'sdzz nbsf sldd dstw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('aniketkumar2018ak@gmail.com', 'Aniket');
    $mail->addAddress($email, $fname);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('logo1.png');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Hello ' . $fname;
    $mail->Body    =  '
    
<?php    
    error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="margin: 0; padding: 20px; font-family: Arial, sans-serif; background-color: #f5f5f5;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: white; border: 1px solid #ddd; border-radius: 10px;">
        <!-- <img src="https://imgcdn.dev/i/logo1.WdY3v" alt="Image"style="text-align: center;" width="100%"> -->
        <table>
            <tr>
                <th style="text-align:left;">
                    <img src="https://s6.imgcdn.dev/WdY3v.png" alt="smslogo"  border="0">
                </th>

                <th style="text-align: center;">
                    <h1 style="font-size:60px; color:#254287"> SMS </h1>
                </th>
            </tr>
        </table>



        <h1 style="text-align: center; color: #333;">Congratulations! </h1>
        <p style="color: #666; font-size: 14px;">
            Dear <?php echo $fname ?> ,</p>

            

        <p style="text-align: center; color: #666; font-size: 24px;">
            You have successfully registered with us. </p>
        <p style="text-align: center; color: #666; font-size: 16px;">
            Thank you for choosing to register with SMS. We are excited to have you join our community. Please follow the instructions below to complete your registration.
        </p>

        <p style="text-align: center; color: #666; font-size: 14px;">
            If you have any questions or need assistance, feel free to contact our support team at any time.
        </p>




        <p style="text-align: center; color: #666; font-size: 14px;">
            Best regards,</p>
        <p style="text-align: center; color: #666; font-size: 14px;">
            The SMS Team</p>
    </div>

</body>

</html>

    
    
    
    ';

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

if ($role) {
    $_SESSION['email'] = $email;
    header("location: ../login.php");
} else {
    header("Location: ../Signup.php");
}
