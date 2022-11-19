<?php
require_once "pdo.php";
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
    <button onclick="history.back()">Back to Login Page</button>
    <form id="forgot_password_form" method="GET">
        <label for="email">Enter your email address : </label>
        <input type="text" name="email" id="email" class="loginInput">
        <p id="error" style="display:inline-block;color:red">The email address is not present in the database !!</p>
        <br>
        <input type="submit" value="Submit">
    </form>
    <script src="./JS_files/forgotPassword.js"></script>
</body>

</html>