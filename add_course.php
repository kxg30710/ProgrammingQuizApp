<?php
require_once('pdo.php');
session_start();
?>



<?php

if (isset($_POST['submit'])) {
 
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
  

    if (isset($_POST['course_id']) && isset($_POST['course_name']))
    {
        insert_data($pdo,$course_id, $course_name);
        if(isset($_SESSION['error'])) {
            echo '<p style="color:red" id="alert">'.$_SESSION['error']."</p>\n";
            unset($_SESSION['error']);
        }
        
    } else echo "All fields should be entered!!";
}




function insert_data($pdo,$course_id, $course_name)
{
   


    try {
        
        
           
        $insert_query = "INSERT INTO batch(course_id ,course_name) VALUES (:course_id, :course_name)";
        $dbstmt1 = $pdo->prepare($insert_query);
        $dbstmt1->execute(array(
            ':course_id' => $course_id,
            ':course_name' => $course_name
        ));
        $_SESSION['success'] = 'Course Added';
    }
        
       
     catch (Exception $ex) {
        date_default_timezone_set("America/Chicago");
        
        $message = $ex->getMessage();
        createLog($message);
        $_SESSION['Error'] = 'Error in course Insertion please check log file';
        
        
    }
}


function createLog($data)
{
    $file = "log.txt";
    $fh = fopen($file, 'a') or die("can't open file");
    $date = date("Y-m-d");
    $time = date("h:i:sa");
    $error = "[" . $date . ":  " . $time . "]  " . $data . ".\n";
    fwrite($fh, $error);
    fclose($fh);
}



?>


<?php
if(isset($_SESSION['account']))
{   
    include 'side_nav.html';
    
    ?>
<html>

<head>
    <title> Add Student </title>
</head>
<link rel="stylesheet" href="./css/add_course.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>
<body>
    <div>
    <form method="post" action="add_course.php" id="target">
       
            <h2 id="title"> Add Course </h2>
            <input type="text" name="course_id" id="course_id" placeholder = "Course ID"><br>
            <p id="result" name="result" ></p>
            <input type="text" name="course_name" id="course_name" placeholder = "Course Name"><br>
            <p id="result1" name="result1" ></p>
            

            <input type="submit" name="submit" id="submit" value="Add">
            
            
            

    </form>
</div>
   
    
       <script src="./JS_files/courseidValidation.js"></script>  
  
       
       <?php } else { ?>
<a href = 'admin_login.php' > <h1> Please Login </h1> </a>

<?php } ?>       
</body>

</html>
