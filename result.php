<?php
session_start();
require_once "pdo.php";
$score = 0;
for ($i = 1; $i <= 2; $i++) {
    $answer = "answer" . $i;
    $question = 'question' . $i;
    if ($_POST[$question] === $_SESSION[$answer]) {
        $score++;
    }
}

$sql = "insert ignore into score(stud_id,course_id,score) values(:stud_id,:course_id,:score)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':stud_id' => $_SESSION['studentid'],
    ':course_id' => $_SESSION['course_id'],
    ':score' => $score
));
$exam_taken_var = 1;
$sql2 = "update student_assignment set exam_taken = 1 where stud_id  = :stud_id and course_id = :course_id";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute(array(
    ':stud_id' => $_SESSION['studentid'],
    ':course_id' => $_SESSION['course_id']
));
// echo $_SESSION['course_id'];
// echo $_SESSION['studentid'];
// echo $_SESSION['password'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>

<body>
    <h1>Your score in <?php echo $_SESSION['course_id']; ?> is <?php echo $score; ?></h1>
    <a href="studentValidate.php">Login Page</a>

</body>

</html>