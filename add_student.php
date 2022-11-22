<?php
require_once('pdo.php');
session_start();
?>

<html>

<head>
    <title> Add Student </title>
</head>
<link rel="stylesheet" href="./css/add_student.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>

<?php

if (isset($_POST['submit'])) {
    if ($_POST['700#'] != "")
        if (is_numeric($_POST['700#'])) $id = $_POST['700#'];
        else echo "700# has numbers only";
    $f_name = $_POST['f_name'];
    $pwd = password_generate(7)  ;
    $l_name = $_POST['l_name'];
    $email = $_POST['email'].'@ucmo.edu';

    //echo $id . $f_name . $pwd . $l_name . $email;

    //echo "add button clicked";
    if (($_POST['f_name'] != "") 
        && ($_POST['l_name'] != "") && ($_POST['email'] != "") && ($_POST['700#'] != "")
    ) {
        insert_data($pdo, $id, $f_name, $pwd, $l_name, $email);
        if(isset($_SESSION['error'])) {
            echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])) {
             echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
             unset($_SESSION['success']);
        }
    } else echo "All fields should be entered!!";
}




function insert_data($pdo, $id, $f_name, $pwd, $l_name, $email)
{
    //echo "inserting new row";


    try {
        
        
           
        $insert_query = "INSERT INTO students(stud_id, first_name, last_name, email, password) VALUES (:stud_id, :first_name, :last_name, :email, :password)";
        $dbstmt1 = $pdo->prepare($insert_query);
        $dbstmt1->execute(array(
            ':stud_id' => $id,
            ':first_name' => $f_name,
            ':last_name' => $l_name,
            ':email' => $email,
            ':password' => $pwd
        ));
        $_SESSION['success'] = 'Student Added';
    }
        
       
     catch (Exception $ex) {
        date_default_timezone_set("America/Chicago");
        
        $message = $ex->getMessage();
        createLog($message);
        $_SESSION['error'] = 'Error in Insertion';
        
        
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
//credit w3resource.com
function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz@!_*&$';
  return substr(str_shuffle($data), 0, $chars);
}
  //echo password_generate(7)."\n";
?>

<body>
    <div>
    <form method="post" action="add_student.php" id="target">
       
            <h2 id="title"> Add Student </h2>
            <input type="text" name="700#" id="num" placeholder = "700#"><br>
            <p id="result" name="result" ></p>
            <input type="text" name="f_name" id="f_name" placeholder = "First Name" ><br>
            <input type="text" name="l_name" id="l_name" placeholder = "Last Name"  ><br>
            <input type="text" name="email" id="email" placeholder = "Email"><label>@ucmo.edu<br>
            <p id="result1" name="result1" ></p>
            <label for="pwd" id = "pwd"> Password:   </label>
            <label for="pwd" ><strong> Auto Generated </strong></label><br>
           <!--- <input type="password" name="pwd" id="pwd" size="15" maxlength="20" value="Auto Generate" readonly><br> --->

            <input type="submit" name="submit" id="submit" value="Add">
            <input type="button" name="back" id="back" value="Back" onclick = "location.href = 'display_student.php';"><br>
            
            

    </form>
</div>
   
    
       <script src="./JS_files/studid_emailValidation.js"></script>  
   
</body>

</html>
