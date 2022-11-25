<?php
require_once('pdo.php');
session_start();
?>
<?php
$stud_id = (int)$_POST['stud_edit'];
$password = "";
$f_name = "";
$l_name = "";
$email = "";


    try {  
        $sql =  "SELECT first_name, last_name, email, password FROM students where stud_id=:stud_id";       
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':stud_id' => $stud_id));
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $f_name = $row['first_name'];
            
            $l_name = $row['last_name'];
            $email = $row['email'];
            $password = $row['password'];
        }
       
        
    } catch (Exception $ex) {
        date_default_timezone_set("America/Chicago");
        echo "Error while deleting student record check log file for more details";
        $message = $ex->getMessage();
        createLog($message);
        
    }







function createLog($data)
{
    $file = "log.txt";
    $fh = fopen($file, 'a') or die("can't open file");
    $date = date("Y-m-d");
    $time = date("h:i:sa");
    $error = "[" . $date . ":  " . $time . "] from edit_student.php " . $data . ".\n";
    fwrite($fh, $error);
    fclose($fh);
}



?>
<html>
<?php
if(isset($_SESSION['account']))
{   include 'side_nav.html'; ?>
<head>
    <title> Edit Student </title>
</head>
<link rel="stylesheet" href="./css/edit_student.css">
<body>
    <div>
    <form method="post" action="edit_student.php">
    <h2 id="title"> Edit Student </h2>
            <label for="700#"> 700#:</label>
            <input type="text" name="700#"  value="<?= htmlentities($stud_id) ?>" readonly><br>

            <label for="pwd"> Password:</label>
            <input type="password" name="pwd" id="pwd"  value="<?= htmlentities($password) ?>"><br>

            <label for="f_name"> First Name:</label>
            <input type="text" name="f_name" id="f_name"  value="<?= htmlentities($f_name) ?>"><br>

            <label for="l_name"> Last Name:</label>
            <input type="text" name="l_name" id="l_name"  value="<?= htmlentities($l_name) ?>"><br>

            <label for="email"> Email:</label>
            <input type="text" name="email" id="email" value="<?= htmlentities($email) ?>"><br>
            <input type="submit" name="update" id="update" value="Update"><br>
       

    </form>
</div>

<?php } else { ?>
<a href = 'admin_login.php' > <h1> Please Login </h1> </a>

<?php } ?>
</body>

</html>

<?php

if (isset($_POST['update'])) {
    if ($_POST['700#'] != "")
        if (is_numeric($_POST['700#'])) $id = $_POST['700#'];
        else echo "700# has numbers only";
    $f_name = $_POST['f_name'];
    $pwd = $_POST['pwd'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];

    //echo $id . $f_name . $pwd . $l_name . $email;

    //echo "add button clicked";
    if (($_POST['f_name'] != "") && ($_POST['pwd'] != "")
        && ($_POST['l_name'] != "") && ($_POST['email'] != "") && ($_POST['700#'] != "")
    ) {
        update_data($pdo, $id, $f_name, $pwd, $l_name, $email);
    } else echo "All fields should be entered!!";
}




function update_data($pdo, $id, $f_name, $pwd, $l_name, $email)
{



    try {
        $update_query = "UPDATE students set  first_name = :first_name, last_name=:last_name, 
        email = :email, password=:password where stud_id='$id'";

        $dbstmt1 = $pdo->prepare($update_query);
        $dbstmt1->execute(array(
            ':first_name' => $f_name,
            ':last_name' => $l_name,
            ':email' => $email,
            ':password' => $pwd
        ));
        $_SESSION['success'] = 'Updated';
        header( 'Location: display_student.php' ) ;
                return;
    } catch (Exception $ex) {
        date_default_timezone_set("America/Chicago");
        echo "Error while updating student record check log file for more details";
        $message = $ex->getMessage();
        createLog($message);
        $_SESSION['error'] = 'Error while Update';
        
    }
}




?>