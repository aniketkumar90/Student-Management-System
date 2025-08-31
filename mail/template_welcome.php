<?php 

session_start();
$name = $_SESSION['name'];

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
        <table>
            <tr>
                <td style="text-align:left;">
                    <!-- <img src="https://s6.imgcdn.dev/WdY3v.png" alt="smslogo"  border="0"> -->
                    <a href='https://postimages.org/' target='_blank'><img src='https://i.postimg.cc/RZp4Jxx3/logo1.png' border='0' alt='sms_logo'/></a>
                </td>

                <td style="text-align: center;">
                    <h1 style="font-size:60px; color:#254287"> SMS </h1>
                </td>
            </tr>
        </table>


        <h1 style="text-align: center; color: #333;">Welcome to Students Management System <?php echo $name; ?> ,</h1>


        <p style="color: #666; font-size: 14px;">
            Dear <?php echo $name; ?> ,</p>

        <p style="text-align: center; color: #666; font-size: 16px;">
            Thank you for choosing to register with SMS. We are excited to have you join our community.
        </p>
        
        <!-- Please follow the instructions below to complete your registration. -->

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