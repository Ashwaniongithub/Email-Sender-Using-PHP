
<?php 

//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$email='';
$checkmail=false;

if(isset($_POST['send'])){
    $email=$_POST['email'];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'Smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'Sender Email Id';                     //SMTP username
    $mail->Password   = 'Sender Email Password';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ashwanihada00@gmail.com', 'Ashion Website');
    $mail->addAddress($email);     //Add a recipient
 

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Ashion Newsletter ';
    $mail->Body    = 'Hi , Thank You For Visiting Ashion . You Will Get Updates From Now';
    

    $mail->send();
    $checkmail=true;
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Using Php</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body >
<div class=" mt-5 d-flex justify-content-center" >
<?php 
    if($checkmail){
        echo'
        <div class="alert alert-success" role="alert">
        Congratulations .. ❤️ You Successfully Subscribed Our NewsLetter.
        </div>
        ';
    }
?>
</div>
<div  class="d-flex align-items-center justify-content-center mt-5">
<div class="card" style="width: 20%; padding:30px;">
    <span class="card__title">Subscribe</span>
    <p class="card__content">Get fresh notification  About our Website to your inbox every week.
    </p>
    <div class="card__form">
        <form action="index.php" method="post">
        <input name="email" placeholder="Your Email" type="text">
        <button class="sign-up mt-4" name="send" type="submit"> Sign up</button>
        </form>
    </div>
   
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
