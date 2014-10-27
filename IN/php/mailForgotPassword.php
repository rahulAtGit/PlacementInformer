<?php
error_reporting(0);

require('sendmail2people.php');

$mysqli = new mysqli("localhost", "root", "", "placementinformer"); // put "" for the password if you want to run them
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
$uname =  $_SESSION['userNameT'];
$result = $mysqli->query("SELECT * from login WHERE uname='$uname';");
while($db_fileld = mysqli_fetch_assoc($result))
{
    $oldPass = $db_fileld['password'];
}
$url = "http://localhost/PlacementInformer%200.0.1/IN/forgotPassword.php?password=".$oldPass;

$result1 = $mysqli->query("SELECT * FROM `student` where USN = '$uname';");
while($db_fileld = mysqli_fetch_assoc($result1))
{
    $email = $db_fileld['EMAIL'];
}
sendmail($email,$uname, 'Incoming Company',$url);
echo "Password is sent to your mail";

?>