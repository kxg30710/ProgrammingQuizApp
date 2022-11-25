<?php
    session_start();
    session_destroy();
    $_SESSION['logout'] = "Log out success!!";
    header("Location: admin_login.php");
    return;
    ?>