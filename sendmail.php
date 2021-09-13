<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
include_once "PHPMailer/Exception.php";

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "fatemamerchant31@gmail.com";
$mail->Password = "Zxcvbnm@31";
$mail->Subject = "hii, just testing";
$mail->Body = "hii, just testing";
$mail->AddAddress("fatemamerchant31@gmail.com");
if(!$mail->Send()) {
    echo '<script type="text/JavaScript">  alert("Email Failed") . ;
  </script>'; 
  } else {
        echo '<script type="text/JavaScript">  alert("Email sent successfully") . ;
         </script>';   
     }
