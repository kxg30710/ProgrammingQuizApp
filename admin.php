<?php
require_once('pdo.php');
session_start();
?>

<html>

<head>
    <title> Admin </title>
</head>

<body>
<?php
if(isset($_SESSION['account']))

{

   include 'side_nav.html'; 
    

?>

<?php } else { ?>
<a href = 'admin_login.php' > <h1> Please Login </h1> </a>

<?php } ?>
</body>
