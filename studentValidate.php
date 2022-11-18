<?php
require_once "pdo.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/studentLogin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Student Login</title>
</head>

<body>
    <p class="studentLogin">Student Login</p>
    <form method="POST" id="studentForm" action="quiz.php">
        <label for="studentEmail">Email ID</label>
        <input type="text" id="studentEmail" name="studentEmail" class="loginInput"><br>
        <label for="password">Password</label>
        <input type="text" id="password" name="password" class="loginInput"><br>
        <a href="passwordReset.php" style="float:inline-start">forgot password ?</a> <br><br>
        <input type="submit" value="submit" id="submitButton" style="width: 130px;background-color:cadetblue;border-radius:10px">
    </form>
    <script src="./JS_files/studentValidate.js"></script>
</body>

</html>