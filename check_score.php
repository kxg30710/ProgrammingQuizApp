<?php
require_once "pdo.php";
session_start();

$_SESSION['course_id'] = $_GET['id'];
$student_marks = 0;
$total_marks = 0;
$num_students = 0;
$student_query = "select score from score where stud_id = :student_id and course_id = :course_id";
$studentMarks = $pdo->prepare($student_query);
$studentMarks->bindParam(':student_id', $_SESSION['studentid']);
$studentMarks->bindParam(':course_id', $_SESSION['course_id']);
$studentMarks->execute();
while ($row = $studentMarks->fetch(PDO::FETCH_ASSOC)) {
    $student_marks = $row['score'];
}


$classMarksQuery = "select score from score where course_id = :course_id";
$classMarks = $pdo->prepare($classMarksQuery);
$classMarks->bindParam(':course_id', $_SESSION['course_id']);
$classMarks->execute();
while ($row = $classMarks->fetch(PDO::FETCH_ASSOC)) {
    $total_marks += $row['score'];
    $num_students++;
}

$average = $total_marks / $num_students;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/check_score.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://cdn.plot.ly/plotly-2.16.1.min.js'></script>
    <title>Score Check</title>
</head>

<body>
    <div class="navbar navbar-dark bg-primary">
        <p class="heading">Student Score</p>
    </div>
    <div id="plot_bar">
    </div>
    <div id="LoginButton">
        <button onclick="window.location.href='studentValidate.php'" class="btn btn-primary">back to Login Page</button>
    </div>

    <script>
        var data = [{
            x: ['Your Score', 'Class Average Score'],
            y: [<?php echo $student_marks;  ?>, <?php echo $average; ?>],
            type: 'bar'
        }];

        Plotly.newPlot('plot_bar', data);
    </script>
</body>

</html>