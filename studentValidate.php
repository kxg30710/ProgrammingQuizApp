<?php
require_once('pdo.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/studentLogin.css">
    <title>Student Login</title>
</head>

<body>
    <p class="studentLogin">Student Login</p>
    <form method="POST" class="studentForm">
        <label for="studentEmail">Email ID</label>
        <input type="text" id="studentEmail" name="studentEmail" class="loginInput"><br>
        <label for="password">Password</label>
        <input type="text" id="password" name="password" class="loginInput"><br>
        <a href="passwordReset.php" style="float:inline-start">forgot password ?</a>
    </form>
</body>

</html>