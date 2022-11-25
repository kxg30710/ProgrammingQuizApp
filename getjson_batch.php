<?php
require_once "pdo.php";
session_start();
header('Content-Type: application/json; charset=utf-8');

if(isset($_SESSION['account']))
{    
   // echo "inside if condition in getjsop";
$stmt = $pdo->query("SELECT course_id, course_name FROM batch");
//$stmt = $pdo->prepare("SELECT * FROM students where stud_id = :xyz");
//$stmt->execute(array(":xyz" => $_GET['id']));
$rows = array();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
  $rows[] = $row;
}
echo json_encode($rows, JSON_PRETTY_PRINT);
}
?>