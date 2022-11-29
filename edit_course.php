<?php
require_once('pdo.php');
session_start();
?>
<?php
$course_edit = $_POST['course_edit'];
$course_name = "";

    try {  
        $sql =  "SELECT * from batch where course_id=:course_id";       
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':course_id' => $course_edit));
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
           

            
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
    <form method="post" action="edit_course.php">
    <h2 id="title"> Edit Course </h2>
            <label for="cid">Course ID:</label><br>
            <input type="text" name="cid" id="cid"  value="<?= htmlentities($course_id) ?>" readonly><br>
            
           
            <label for="cname">Couse Name:</label><br>
            <input type="text" name="cname" id="cname"  value="<?= htmlentities($course_name) ?>"><br>

            
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
    $cid =  $_POST['cid'];
    $cname =  $_POST['cname'];
    
    
    if ($cid!= "" &&  $cname != "")
    {
        update_data($pdo, $cid, $cname);
    } else echo "Course ID and Course Name fields should be entered!!";
}




function update_data($pdo, $cid, $cname)
{



    try {
    

       $update_query = "UPDATE batch set course_name = :course_name where course_id= :course_id";

        $dbstmt1 = $pdo->prepare($update_query);
        $dbstmt1->execute(array(
           ':course_name' => $cname,
          ':course_id' => $cid
       
        ));
        $_SESSION['success'] = 'Course Updated';
        header( 'Location: display_course.php' ) ;
                return;
    } catch (Exception $ex) {
        date_default_timezone_set("America/Chicago");
        echo "Error while updating student record check log file for more details";
        $message = $ex->getMessage();
        createLog($message);
        $_SESSION['Error'] = 'Error while Update course please check log file';
        
    }
}




?>