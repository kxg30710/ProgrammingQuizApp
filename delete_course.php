<?php
require_once('pdo.php');
session_start();
?>

<?php


if(isset($_SESSION['account']))
{   
$course_id = $_POST['course_delete'];

        try{
            
            $delete_query = "DELETE from batch where course_id= :id";
            $stmt = $pdo->prepare($delete_query);
            $stmt->execute(array(':id' => $course_id));
           
            $_SESSION['success'] = 'Record deleted';
            header( 'Location: display_course.php' ) ;
            return;
        }
        catch (Exception $ex) {
            date_default_timezone_set("America/Chicago");
            echo "Error while deleting student record check log file for more details";
            $message = $ex->getMessage();
            createLog($message);
            $_SESSION['Error'] = 'Error in course Deletion Please check log file';
            header( 'Location: display_course.php' ) ;
            return;
        }
}
    
        
        

else { ?>

    <a href = 'admin_login.php' > <h1> Please Login </h1> </a>
    
    <?php }

function createLog($data)
{
$file = "log.txt";
$fh = fopen($file, 'a') or die("can't open file");
$date = date("Y-m-d");
$time = date("h:i:sa");
$error = "[" . $date . ":  " . $time . "] from delete_student.php " . $data . ".\n";
fwrite($fh, $error);
fclose($fh);
}
?>

 