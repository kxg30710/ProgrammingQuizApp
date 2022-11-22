<?php
require_once('pdo.php');
session_start();
?>

<?php
$stud_id = (int)$_POST['stud_delete'];
delete_data($pdo,$stud_id);





    function delete_data($pdo,$stud_id)
    {
        try{
            
            $delete_query = "DELETE from students where stud_id= :id";
            $stmt = $pdo->prepare($delete_query);
            $stmt->execute(array(':id' => $stud_id));
           
            $_SESSION['success'] = 'Record deleted';
            header( 'Location: display_student.php' ) ;
            return;
        }
        catch (Exception $ex) {
            date_default_timezone_set("America/Chicago");
            echo "Error while deleting student record check log file for more details";
            $message = $ex->getMessage();
            createLog($message);
            $_SESSION['error'] = 'Error in Deletion';
            header( 'Location: display_student.php' ) ;
            return;
        }
    }
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
        
        
var_dump($stud_id);
?>

 