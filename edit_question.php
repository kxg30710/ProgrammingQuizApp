<?php
require_once('pdo.php');
session_start();
?>
<?php
$ques_edit = (int)$_POST['ques_edit'];
$option_1 = "";
$option_2 = "";
$option_3 = "";
$option_4 = "";
$answer = "";
$question = "";
    try {  
        $sql =  "SELECT question, option_1, option_2, option_3, option_4, answer FROM question_bank where question_id=:ques_id";       
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':ques_id' => $ques_edit));
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $question = $row['question'];
            $option_1 = $row['option_1'];
            $option_2 = $row['option_2'];
            $option_3 = $row['option_3'];
            $option_4 = $row['option_4'];
            $answer =  $row['answer'];

            
        }
       
        
    } catch (Exception $ex) {
        date_default_timezone_set("America/Chicago");
        echo "Error while deleting student record check log file for more details";
        $message = $ex->getMessage();
        createLog($message);
        
    }







function createLog($data)
{
    $file = "log.txt";
    $fh = fopen($file, 'a') or die("can't open file");
    $date = date("Y-m-d");
    $time = date("h:i:sa");
    $error = "[" . $date . ":  " . $time . "] from edit_student.php " . $data . ".\n";
    fwrite($fh, $error);
    fclose($fh);
}



?>
<html>
<?php
if(isset($_SESSION['account']))
{   include 'side_nav.html'; ?>
<head>
    <title> Edit Question </title>
</head>
<link rel="stylesheet" href="./css/edit_question.css">
<body>
    <div>
    <form method="post" action="edit_question.php">
    <h2 id="title"> Edit Question </h2>
            <label for="question">Question:</label>
            <input type="question" name="question" id="question"  value="<?= htmlentities($question) ?>"><br>
            
           
            <label for="option1">Option1:</label>
            <input type="text" name="option1" id="option1"  value="<?= htmlentities($option_1) ?>"><br>

            <label for="option2">Option2:</label>
            <input type="text" name="option2" id="option2"  value="<?= htmlentities($option_2) ?>"><br>

            <label for="option3">Option3:</label>
            <input type="text" name="option3" id="option3"  value="<?= htmlentities($option_3) ?>"><br>

            <label for="option4">Option4:</label>
            <input type="text" name="option4" id="option4"  value="<?= htmlentities($option_4) ?>"><br>

            <label for="answer">Answer:</label>
            <input type="text" name="answer" id="answer"  value="<?= htmlentities($answer) ?>"><br>

            <input type="hidden" name="question_id" value= "<?= htmlentities($ques_edit) ?>">
            <input type="submit" name="update" id="update" value="Update"><br>
       

    </form>
</div>

<?php } else { ?>
<a href = 'admin_login.php' > <h1> Please Login </h1> </a>

<?php } ?>
</body>

</html>

<?php

if (isset($_POST['update'])) {
    $question =  $_POST['question'];
    $option_1 =  $_POST['option1'];
    $option_2 =  $_POST['option2'];
    $option_3 =  $_POST['option3'];
    $option_4 =  $_POST['option4'];
    $answer =   $_POST['answer'];
    $question_id = (int)$_POST['question_id'];
  
    //echo "$option_3" . "$option_1" . " $option_2";
 
    if ($question != "" && $answer != "")
    {
        update_data($pdo, $question, $option_1, $option_2, $option_3, $option_4,$answer, $question_id );
    } else echo "Question and answer fields should be entered!!";
}




function update_data($pdo, $question, $option_1, $option_2, $option_3, $option_4,$answer, $question_id)
{



    try {
    

       $update_query = "UPDATE question_bank set question = :question, 
      option_1 = :option_1, option_2 = :option_2, option_3 = :option_3 , option_4 = :option_4 , answer = :answer 
       where question_id= :question_id";

        $dbstmt1 = $pdo->prepare($update_query);
        $dbstmt1->execute(array(
           ':question' => $question,
          ':option_1' => $option_1,
           ':option_2' => $option_2,
           ':option_3' => $option_3,
            ':option_4' => $option_4,
            ':answer' => $answer,
            ':question_id' =>  $question_id

        ));
        $_SESSION['success'] = 'Questions Updated';
        header( 'Location: display_question.php' ) ;
                return;
    } catch (Exception $ex) {
        date_default_timezone_set("America/Chicago");
        echo "Error while updating student record check log file for more details";
        $message = $ex->getMessage();
        createLog($message);
        $_SESSION['error'] = 'Error while Update Questions';
        
    }
}




?>