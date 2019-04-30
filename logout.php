<?php
//start a session
session_start();
//desroy the session to logout
session_destroy();
echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
        exit();
?>