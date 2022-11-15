<?php
require_once('pdo.php');
?>

<?php
$stud_id = (int)$_POST['stud_delete'];
delete_data($pdo,$stud_id);
    function delete_data($pdo,$stud_id)
    {
        try{
            
            $delete_query = $pdo->query("DELETE from students where stud_id= '$stud_id'");
            $dbstmt1 = $pdo->prepare($delete_query);
           
           // $dbstmt1->execute(array(':stud_id' => $stud_id));
        }
        catch (Exception $ex) {
            date_default_timezone_set("America/Chicago");
            echo "Error while deleting student record check log file for more details";
            $message = $ex->getMessage();
            createLog($message);
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

 