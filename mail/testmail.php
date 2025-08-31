<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendWelcomeMail($email, $name)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);


    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    // $usertype = $_POST['usertype'];

    // $role = validate_login($email, $password);


    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;     
                         //Enable verbose debug output
        $mail->SMTPDebug = false;                      //Enable verbose debug output

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'aniketkumar2018ak@gmail.com';                     //SMTP username
        $mail->Password   = 'sdzz nbsf sldd dstw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('aniketkumar2018ak@gmail.com', 'Aniket');
        $mail->addAddress($email, $name);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('logo1.png');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);

        //Set email format to HTML
        $mail->Subject = 'Hello ' . $name;



        // ob_start();
        // include_once 'template_welcome.php';

        // $mail->Body    =  ob_get_clean();

        $template = file_get_contents('template_welcome.php');
        $message = str_replace('{{name}}', htmlspecialchars($name), $template);
        $mail->Body = $message;





        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

       return $mail->send();
        // echo 'Message has been sent';
        // header("Location:../login.php");

        // 
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
