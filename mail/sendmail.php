





    <?php

     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;

     require 'PHPMailer/src/Exception.php';
     require 'PHPMailer/src/PHPMailer.php';
     require 'PHPMailer/src/SMTP.php';


     $mail = new PHPMailer(true);


         //Server settings
         $mail->SMTPDebug = 0;// Enable verbose debug output
         $mail->isSMTP();// gửi mail SMTP
         $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
         $mail->SMTPAuth = true;// Enable SMTP authentication
         $mail->Username = 'phanhieu164nt@gmail.com';// SMTP username
         $mail->Password = 'htvikdwzhupndhkl'; // SMTP password
         $mail->SMTPSecure = 'TLS';// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
         $mail->Port = 587; // TCP port to connect to


