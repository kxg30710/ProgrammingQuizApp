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
    <title> Display students score </title>
</head>
<link rel="stylesheet" href="./css/display_student.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>

<body>
<?php
if(isset($_SESSION['account']))
{    
   
    include 'side_nav.html'; 
    
    ?>
    <form action="display_score.php" method="post">
<select name="course_id" style="margin-left: 300px;">
        <?php
            $sql = "Select course_id from batch";
            $stmt = $pdo->query($sql);
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           
                echo "<option value=$row[course_id]>$row[course_id]</option>"; 

            }

        ?>


        </select>
        <input type="submit" style="margin-left: 30px;" name="submit" Value="submit"><br>



        <table id="mytable" border="1">
            <tr>
                <th> Stud_ID </th>
                <th>First name </th>
                <th> Last name </th>
                <th> Score </th> 
                <th> Course_id </th>
             
            </tr>
            
<?php
if (isset($_POST['submit'])){
    $course_id = $_POST['course_id'];
    echo $course_id;
            try{
                
            $stmt = $pdo->query("
            SELECT a.stud_id,a.first_name,a.last_name,b.score, b.course_id FROM students as a,score as b WHERE b.course_id = '$course_id' and a.stud_id = b.stud_id");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>";
                echo ($row['stud_id']);
                echo ("</td><td>");
                echo ($row['first_name']);
                echo ("</td><td>");
                echo ($row['last_name']);
                echo ("</td><td>");
                echo ($row['score']);
                echo ("</td><td>");
                echo ($row['course_id']);
                
              
                
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
      
</form>

        <script src="./JS_files/tablesort.js"></script>  
        
       

        <?php } else { ?>
<a href = 'admin_login.php' > <h1> Please Login </h1> </a>

<?php } ?>
    
</body>
</html>
