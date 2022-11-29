<?php
require_once('pdo.php');
session_start();
?>
<?php

if(isset($_SESSION['login_error']))
{
    echo "<p class=\"message\"> $_SESSION[login_error]</p>";
    unset($_SESSION['login_error']);
}
if(isset($_SESSION['logout']))
{
    echo "<p class=\"message\">$_SESSION[logout]</p>";
    unset($_SESSION['logout']);
}

?>

<?php
   
   if (isset($_POST['submit'])) {
        unset($_SESSION["account"]);  // Logout current user

        $stmt = $pdo->query("SELECT username , pwd FROM admin_users");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         
          if(($row['username']== $_POST['username']) && ($row['pwd'] == $_POST['password'])){
          $_SESSION['account'] = $_POST['username'];
            $_SESSION['login_success'] = "Logged in.";
            header( 'Location: admin.php' ) ;
            return;
        } else {
            $_SESSION['login_error'] = "Incorrect user/password.";
            header( 'Location: admin_login.php' ) ;
            return;
        }

        }
        
    }
?>
<html>
<link rel="stylesheet" href="./css/admin_login.css">
    <body>
        <div>
            <h2 id="title"> Admin Login </h2>
        <form method="post" action="admin_login.php">
        <input type=text name="username" id="username" placeholder="Username"><br>
        <input type=password name="password" id="password" placeholder="Password"><br>
        <input type = submit name="submit" id="submit" value="Log in">

        </form> 
        </div>
    </body>
</html>