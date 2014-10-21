<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['uname']))||(!isset($_SESSION['dept']) )){
    header('Location: login.php');
}

?><?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
unset($_SESSION['username']);
unset($_SESSION['password']);
header('Location: ../..');


?>

