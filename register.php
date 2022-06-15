<?php

include('connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])) {

  // Get form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $email = $_POST['email'];

  // Password hash
  $newPass = password_hash($password, PASSWORD_DEFAULT);

  // Generate activation string
  $activationString = bin2hex(random_bytes(32));

  // Sanitize form data
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password);
  $confirmPassword = $conn->real_escape_string($confirmPassword);
  $email = $conn->real_escape_string($email);

  // Insert to DB
  $insert = mysqli_query($conn, "INSERT INTO accounts(username, password, email_address, activation_string)
  VALUES('$username', '$newPass', '$email', '$activationString')");

  if($insert) {

   
      require ("PHPMailer/PHPMailer.php");
      require ("PHPMailer/Exception.php");
      require ("PHPMailer/SMTP.php");

      $mail = new PHPMailer(true);

      try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'samuelmainacct12@gmail.com';
        $mail->Password   = 'rrlxwckzeimvffwk';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('samuelmainacct12@gmail.com', 'Mailer');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Confirm Your Account';
        $msg = "
          <center><h1 style='font-weight: 500;'> Email Confirmation </h1></center>
          <center><p style='font-size: 18px;'> Hey! $username, Thanks for signing up! We just need you to verify your email address <br> 
          to complete setting up your account by clicking the below link</p></center>
          <center><a href='http://localhost/auth/verify.php?username=$username&code=$activationString'>
          http://localhost/auth/verify/code/$activationString
          </a></center>
        ";
        $mail->Body    = $msg;

        if($mail->send()) {
          header('location: confirm_email.php');
        }

      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    

  }

}

?>