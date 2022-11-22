<?php
session_start();
require_once "pdo.php";
$questionNumber = 1;
$answerCount = 1;
// echo $_GET['id'];
// echo $_SESSION['course_id'];
// echo $_SESSION['studentid'];
// echo $_SESSION['password'];
$_SESSION['course_id'] = $_GET['id'];
echo "<h1 style='color:red;text-align:center'>Exam</h1>";
echo '<p style="text-align:center">This exam consist of 10 questions and there is no negative marking for any wrong answers.</p>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ</title>
</head>

<body>
    <form action="result.php" method="POST">
        <?php
        $querry = "select DISTINCT * from question_bank where course_id = :id order by rand() limit 10";
        $questions = $pdo->prepare($querry);
        $questions->bindParam(':id', $_SESSION['course_id']);
        $questions->execute();

        // echo "<br>";
        while ($question = $questions->fetch(PDO::FETCH_ASSOC)) { ?>
            <label for="<?php echo $questionNumber;  ?>"> <?php echo $questionNumber . ". " . $question['question'] ?></label>
            <select name="<?php echo 'question' . $questionNumber; ?>" id="<?php echo $questionNumber;  ?>">
                <option value="" selected>Please Select an answer</option>
                <option value="<?php echo $question['option_1']  ?>"><?php echo $question['option_1']  ?></option>
                <option value="<?php echo $question['option_2']  ?>"><?php echo $question['option_2']  ?></option>
                <option value="<?php echo $question['option_3']  ?>"><?php echo $question['option_3']  ?></option>
                <option value="<?php echo $question['option_4']  ?>"><?php echo $question['option_4']  ?></option>
            </select>
        <?php
            $questionNumber++;
            $answerNumber = "answer" . $answerCount;
            $_SESSION[$answerNumber] = $question['answer'];
            $answerCount++;
            echo "<br><br>";
        }

        ?>
        <input type="submit" value="Submit Exam">
    </form>
</body>

</html>