<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    function sendResetEmail($email_id, $send_link) {
        // Load PHPMailer classes
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->SMTPDebug = false;

            
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'aniketkumar2018ak@gmail.com';               // SMTP username
            $mail->Password   = 'sdzz nbsf sldd dstw';                  // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('aniketkumar2018ak@gmail.com', 'SMS');
            $mail->addAddress($email_id, $send_link);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Reset Password';
            $msg="<html> <body> <h3> Your Password Reset Link Click Here :- </h3> </body></html>";
            // Load the welcome template
            $template = file_get_contents('welcome_template.html');
            // $message = str_replace('{{name}}', htmlspecialchars($tf_token), $template);
            $mail->Body    = $msg . $send_link;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            

            $mail->send();
            // echo 'Message has been sent';
            // return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // return false;
        }
    }
?>