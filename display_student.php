<?php
require_once('pdo.php');
session_start();
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


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

        <table id="mytable" border="1">
            <tr>
                <th> First name </th>
                <th> Last name </th>
                <th> 700# </th>
                <th> Email </th> 
                 
                <th> Assign Course </th> 
                <th> Edit </th>
                <th> Delete </th> 
            </tr>
            
<?php


            try{
            $stmt = $pdo->query("SELECT stud_id, first_name, last_name, email FROM students");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>";
                echo ($row['first_name']);
                echo ("</td><td>");
                echo ($row['last_name']);
                echo ("</td><td>");
                echo ($row['stud_id']);
                echo ("</td><td>");
                echo ($row['email']);
                echo("</td><td>");
                echo('<form method="post" action="assign_course.php"><input type="hidden" ');
                echo('name="assign_course" value="'.$row['stud_id'].'">'."\n");
                echo('<input type="submit" value="Assign" name="assign" style="border: none;background-color: Transparent; text-decoration: underline;" >');
                
                echo("\n</form>\n");
                echo("</td><td>");
                
                echo('<form method="post" action="edit_student.php"><input type="hidden" ');
                echo('name="stud_edit" value="'.$row['stud_id'].'">'."\n");
                echo('<input type="submit" value="Edit" name="edit" style="border: none;background-color: Transparent; text-decoration: underline;" >');
                
                echo("\n</form>\n");
                echo("</td><td>");

                echo('<form method="post" action="delete_student.php"><input type="hidden" ');
                echo('name="stud_delete" value="'.$row['stud_id'].'">'."\n");
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
    $error = "[" . $date . ":  " . $time . "] from display_student.php " . $data . ".\n";
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
