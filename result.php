<?php
session_start();
require_once "pdo.php";
$score = 0;
for ($i = 1; $i <= 10; $i++) {
    $answer = "answer" . $i;
    $question = 'question' . $i;
    if ($_POST[$question] === $_SESSION[$answer]) {
        $score++;
    }
}
// echo $_SESSION['course_id'];
// echo $_SESSION['studentid'];
// echo $_SESSION['password'];
echo "<br>";
echo $score;
var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>