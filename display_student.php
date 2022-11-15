<?php
require_once('pdo.php');
?>

<html>

<head>
    <title> Display students details </title>
</head>

<body>
<ul class="nav navbar-nav">
			<li class="active"><a href="add_student.php">Add new Students</a></li>
			
		</ul>
        <table border="1">
            <tr>
                <th> First name </th>
                <th> Last name </th>
                <th> 700# </th>
                <th> Email </th> 
                <th> Action </th> 

            </tr>
            
<?php
require_once('pdo.php');
retrieve_data($pdo);
            function retrieve_data($pdo)
        {
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
                echo('<form method="post" action="edit_student.php"><input type="hidden" ');
                echo('name="stud_edit" value="'.$row['stud_id'].'">'."\n");
                echo('<input type="submit" value="Edit" name="edit">');
                echo("\n</form>\n");

                echo('<form method="post" action="delete_student.php"><input type="hidden" ');
                echo('name="stud_delete" value="'.$row['stud_id'].'">'."\n");
                echo('<input type="submit" value="Delete" name="delete">');
                echo("\n</form>\n");
                echo("</td></tr>\n");
            }}
            catch (Exception $ex) {
                date_default_timezone_set("America/Chicago");
                echo "Error while retrieving data check log file for more details";
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
    $error = "[" . $date . ":  " . $time . "] from display_student.php " . $data . ".\n";
    fwrite($fh, $error);
    fclose($fh);
}

?>
            
        </table>

  
</body>

</html>
