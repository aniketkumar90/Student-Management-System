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

$email = $_POST['email'];





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
    $mail->addAddress($email);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('logo1.png');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'OTP to reset password';
    $mail->Body    = '
    
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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


        <h1 style="text-align: center; color: #333;">OTP Verification</h1>

    


        <p style="color: #666; font-size: 14px;">
        Your one-time password (OTP) for verification is: </p>

        <p style=" style="text-align: center; color: #666; font-weight: bold; font-size: 24px;">

          123456
          </p>


          <p style="color: #666; font-size: 14px;">

          This OTP is only valid for 120 Seconds.</p>




        <p style="color: #666; font-size: 14px;">

            If you have any questions, feel free to contact our support team.</p>



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


if ($_SESSION['email'] = $email) {
    header("Location: ../otp.php");
} else {
    $_SESSION['error_message'] = "Invalid Email or  Password.";
    header("Location:../login.php");
}