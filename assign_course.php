<?php
require_once('pdo.php');
session_start();
?>

<?php
if(isset($_SESSION['account']))
{  
    include 'side_nav.html'; 
    $stud_id = (int)$_POST['assign_course'];
    ?>
<head>
    <title> Assign course </title>
</head>
<link rel="stylesheet" href="./css/assign_course.css">
<body>
    <div>
    <form method="post" action="assign_course.php">
    <?php
            $sql = "select * from batch";
            $stmt = $pdo->query($sql);
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $value = $row['course_id'];

                echo "<input type=\"radio\" id=$row[course_id] name=\"course\" value=$row[course_id]>";
           
                echo "<label for=\"course\">  $row[course_id] - $row[course_name]";
                
                echo "</label><br>";

            }

        ?>
        <input type="hidden" name="assign_course" value= "<?= htmlentities($stud_id) ?>">

        <input type=submit id="assign_course_button" name="assign_course_button" value="Assign">

    </form>
</div>

<?php } else { ?>
<a href = 'admin_login.php' > <h1> Please Login </h1> </a>

<?php } ?>
</body>

</html>


<?php

if (isset($_POST['assign_course_button'])) {
       
    $stud_id = (int)$_POST['assign_course'];
    $course_id = $_POST['course'];
   
    $exam_taken = 0;
   
            $sql = "select * from student_assignment where stud_id = :stud_id and course_id = :course_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':stud_id' => $stud_id,
                                 ':course_id' => $course_id));
            $rowcount = $stmt->rowCount();
            if ($rowcount == 0) {          
            
    try {
        $insert_query = "INSERT INTO student_assignment(stud_id, course_id, exam_taken) VALUES
         (:stud_id, :course_id, :exam_taken)";
        $dbstmt1 = $pdo->prepare($insert_query);
        $dbstmt1->execute(array(
            ':stud_id' => $stud_id,
            ':course_id' => $course_id,
            ':exam_taken' => $exam_taken                
        ));
        $_SESSION['success'] = 'Course Assigned';
        header( 'Location: display_student.php' ) ;
            return;
    }
        
       
     catch (Exception $ex) {
        date_default_timezone_set("America/Chicago");
        
        $message = $ex->getMessage();
        createLog($message);
        $_SESSION['error'] = 'Error in Insertion';
        
        
    }
}
else
echo "This course is already assigned for this student";
}
function createLog($data)
{
    $file = "log.txt";
    $fh = fopen($file, 'a') or die("can't open file");
    $date = date("Y-m-d");
    $time = date("h:i:sa");
    $error = "[" . $date . ":  " . $time . "]  " ."assign_course.php". $data . ".\n";
    fwrite($fh, $error);
    fclose($fh);
}
?>
