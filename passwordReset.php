<?php
require_once "pdo.php";
session_start();

$studentPassword = "";
if (isset($_POST['email'])) {
    $student_query = "select password from students where email = :email_id";
    $studentPasswordQuery = $pdo->prepare($student_query);
    $studentPasswordQuery->bindParam(':email_id', $_POST['email']);
    $studentPasswordQuery->execute();
    while ($row = $studentPasswordQuery->fetch(PDO::FETCH_ASSOC)) {
        $studentPassword = $row['password'];
    }
}






use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['email'])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'fnu.abbas.raza@gmail.com';
    $mail->Password = 'exrscjnjxgghyqxi';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('fnu.abbas.raza@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = 'Login Password';
    $mail->Body = 'Your password is ' . $studentPassword;
    $mail->send();
    echo "
        <script>
        alert('Send Successfully');
        document.location.href = 'studentValidate.php';
        </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/studentLogin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>forgot password</title>
</head>

<body>
    <form id="forgot_password_form" method="POST">
        <label for="email">Enter your email address : </label>
        <input type="text" name="email" id="email" class="loginInput">
        <br>
        <input type="submit" value="Send Email">
    </form>
    <!-- <script src="./JS_files/forgotPassword.js"></script> -->
</body>

</html>