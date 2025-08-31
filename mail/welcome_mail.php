

$mail = new PHPMailer(true);
require 'vendor/autoload.php';


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'aniketkumar2018ak@gmail.com';                     //SMTP username
    $mail->Username   = 'r8544044558@gmail.com';                     //SMTP username
    // $mail->Password   = 'sdzz nbsf sldd dstw';                               //SMTP password
    $mail->Password   = 'mdvg mmwk wdwo bjug';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    // $mail->setFrom('aniketkumar2018ak@gmail.com', 'Aniket');
    $mail->setFrom('r8544044558@gmail.com', 'Bahubali');
    $mail->addAddress($email, $name);     //Add a recipient

    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('logo1.png');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to SMS' . $name;

    $mail->Body    = include_once 'template_welcome.php';

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    <!-- echo "<h2>Signup successful and welcome email sent</h2>"; -->




} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


// if ($role) {
//     $_SESSION['email'] = $email;
//     header("location: ../login.php");
// } else {
//     header("Location: ../Signup.php");
// }
