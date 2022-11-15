<?php
require_once('pdo.php');
?>

<html>

<head>
    <title> Add Student </title>
</head>
<?php
if(!isset($_POST["name"])) $id = ""; else $id = "";
if(!isset($_POST["pwd"])) $pwd = ""; else $pwd = "";
if(!isset($_POST["f_name"])) $f_name = ""; else $f_name = "";
if(!isset($_POST["l_name"])) $l_name = ""; else $l_name = "";
if(!isset($_POST["email"])) $email = ""; else $email = "";

?>

<?php

if (isset($_POST['submit'])) {
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
        insert_data($pdo, $id, $f_name, $pwd, $l_name, $email);
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
    } catch (Exception $ex) {
        date_default_timezone_set("America/Chicago");
        echo "Error while insertion check log file for more details";
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
    $error = "[" . $date . ":  " . $time . "]  " . $data . ".\n";
    fwrite($fh, $error);
    fclose($fh);
}



?>

<body>
    <form method="post" action="add_student.php">
        <div class="panel">
            <label for="700#"> 700#:</label>
            <input type="text" name="700#" size="15" maxlength="20" value="<?= htmlentities($id) ?>"><br>

            <label for="pwd"> Password:</label>
            <input type="password" name="pwd" id="pwd" size="15" maxlength="20" value="<?= htmlentities($pwd) ?>"><br>

            <label for="f_name"> First Name:</label>
            <input type="text" name="f_name" id="f_name" size="15" maxlength="20" value="<?= htmlentities($f_name) ?>"><br>

            <label for="l_name"> Last Name:</label>
            <input type="text" name="l_name" id="l_name" size="15" maxlength="20" value="<?= htmlentities($l_name) ?>"><br>

            <label for="email"> Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlentities($email) ?>"><br>


            <input type="submit" name="submit" id="submit" value="Add"><br>


        </div>

    </form>
</body>

</html>
