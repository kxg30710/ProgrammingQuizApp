<?php
require_once('pdo.php');
session_start();
?>
<?php

if(isset($_SESSION['login_error']))
{
    echo "<p> $_SESSION[login_error]</p>";
    unset($_SESSION['login_error']);
}
if(isset($_SESSION['logout']))
{
    echo "<p>$_SESSION[logout]</p>";
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
    <body>
        <form method="post" action="admin_login.php">
        <input type=text name="username" id="username" placeholder="Username">
        <input type=password name="password" id="password" placeholder="Password">
        <input type = submit name="submit" id="submit" value="Log in">

        </form> 
    </body>
</html>