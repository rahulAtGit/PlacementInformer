<?php
error_reporting(0);

require('php/sendmail2people.php');

$mysqli = new mysqli("localhost", "root", "", "placementinformer"); // put "" for the password if you want to run them
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$error=''; // Variable To Store Error Message
$oldPass = $_GET['password'];

$result = $mysqli->query("SELECT * from login WHERE password='$oldPass';");
while($db_fileld = mysqli_fetch_assoc($result))
{
    $oldPass = $db_fileld['password'];
}



?>