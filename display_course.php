<?php
require_once('pdo.php');
session_start();

if(isset($_SESSION['Error'])){
    ?>
    
    <h4 id="message" style="margin-left:500px;color:red"><?php echo $_SESSION['Error']; ?></h4>
   <?php 
    unset($_SESSION['Error']);

}


?>






<html>

<head>
    <title> Display students details </title>
</head>
<link rel="stylesheet" href="./css/display_student.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>

<body>
<?php
if(isset($_SESSION['account']))
{    
   
    include 'side_nav.html'; 
    
    ?>




        <table id="mytable" border="1">
            <tr>
                <th> Course ID </th>
                <th> Course Name </th>
                <th> Edit </th>
                <th> Delete </th> 
            </tr>
            
<?php


            try{
            $stmt = $pdo->query("SELECT course_id, course_name FROM batch");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>";
                echo ($row['course_id']);
                echo ("</td><td>");
                echo ($row['course_name']);
                echo ("</td><td>");
                
                
                echo('<form method="post" action="edit_course.php"><input type="hidden" ');
                echo('name="course_edit" value="'.$row['course_id'].'">'."\n");
                echo('<input type="submit" value="Edit" name="edit" style="border: none;background-color: Transparent; text-decoration: underline;" >');
                
                echo("\n</form>\n");
                echo("</td><td>");

                echo('<form method="post" action="delete_course.php"><input type="hidden" ');
                echo('name="course_delete" value="'.$row['course_id'].'">'."\n");
                echo('<input type="submit" value="Delete" name="delete" style="border: none;background-color: Transparent; text-decoration: underline;" >');
                echo("\n</form>\n");
              
              
                
                echo("</td></tr>\n");
            }}
            catch (Exception $ex) {
                date_default_timezone_set("America/Chicago");
                echo "Error while retrieving data check log file for more details";
                $message = $ex->getMessage();
                createLog($message);
            }
       
        function createLog($data)
{
    $file = "log.txt";
    $fh = fopen($file, 'a') or die("can't open file");
    $date = date("Y-m-d");
    $time = date("h:i:sa");
    $error = "[" . $date . ":  " . $time . "] from display_course.php " . $data . ".\n";
    fwrite($fh, $error);
    fclose($fh);
}

?>
            
        </table>

        <script src="./JS_files/tablesort.js"></script>  
        
       

        <?php } else { ?>
<a href = 'admin_login.php' > <h1> Please Login </h1> </a>

<?php } ?>
    
</body>
</html>
