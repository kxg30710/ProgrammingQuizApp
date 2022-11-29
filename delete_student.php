<?php
require_once('pdo.php');
session_start();
?>

<?php


if(isset($_SESSION['account']))
{   
$stud_id = (int)$_POST['stud_delete'];

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
           
            $message = $ex->getMessage();
            createLog($message);
            $_SESSION['Error'] = 'Error while deleting student record check log file for more details';
            header( 'Location: display_student.php' ) ;
            return;
        }
    

        
        

}else { ?>

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

 