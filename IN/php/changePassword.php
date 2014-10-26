<?php
error_reporting(0);


require_once('dbconnector.php');
//require('sendmail2people.php');
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
$curpass = $_POST['curpass'];
$newpass = $_POST['newpass'];
$connewpass = $_POST['connewpass'];


if($newpass != $connewpass)
{
    echo  "new password doesn't match with confirm password";
}
$uname = $_SESSION['userNameT'];
$result = mysqli_query($con,"select password from login where uname = '$uname';");
if(mysqli_num_rows($result)!= 0)
{
    while($db_field = mysqli_fetch_assoc($result))
    {
        $pass = $db_field['password'];
        if($pass == md5($curpass))
        {
            $result1 = mysqli_query($con, "UPDATE  `placementinformer`.`login` SET  `password` = MD5('$newpass') WHERE  `login`.`uname` =  '$uname';");
            if($result1)
            {
                echo "Passsword Changed";
            }
        }
    }
}

?>