<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
//cho $name,$email,$subject,$message;
//$mailheader = "From:" .$name."<".$email.">\r\n";

//$recipient = "sammymaina3137@gmail.com";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sammymaina3137@gmail.com';             //SMTP username
    $mail->Password   = 'ukuilpphohgxwfie';                     //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Isam Developers');
    $mail->addAddress('isamdevelopers@gmail.com');              //Add a recipient
   

    //Attachments
    $mail->addAttachment('profile.jpg');                        //Add attachments
   //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');          //Optional name

    $message1="From:" .$name."\r\n";
	$message2="Subject:" .$subject."\r\n";
    $message='<h1>Thenks for Mailing Us, We shall get to you back soonest</h1>
				<p class="back">Go back to<a href="index.html">Homepage</a></p>
				';
    //Content
    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->Subject = $message2;
    $mail->Body    =$message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>