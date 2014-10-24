<?php
error_reporting(0);



require_once('dbconnector.php');
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

/*
 * USN Check
 * unique email ID
 * Password match
 * Branch Drop Down
 *
 */

$name = $_POST['name'];
$usn = $_POST['usn'];
$branch = $_POST['branch'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cgpa = $_POST['cgpa'];
$tenth = $_POST['tenth'];
$twelth = $_POST['twelth'];
$diploma= $_POST['diploma'];
$password= $_POST['password'];
$confirmpass= $_POST['confirmpass'];

$result = $mysqli->query("SELECT * from student where usn = '$usn';");
if(mysqli_num_rows($result)>0)
{
    echo "<script> " ."alert('USN already exists');". "window.location.href='..//signup.php'; ".";</script>";
}

$result = $mysqli->query("SELECT * from student where email = '$email';");
if(mysqli_num_rows($result)>0)
{
    echo "<script> " ."alert('Email ID already exists');" . "window.location.href='..//signup.php';"."</script>";
}


if($password == $confirmpass)
{

}
else
{
    echo "<script> " ."alert('Passwords does not match');". "window.location.href='..//signup.php'; ".";</script>";
}
$passMD5 = md5($password);

//echo $cdeadline;

$result1 = $mysqli->query("INSERT INTO `placementinformer`.`student` (`USN`, `NAME`, `BRANCH`, `EMAIL`, `PHONE`, `CGPA`, `tenthPercent`, `twelthPercent`, `diplomapercent`) VALUES ('$usn', '$name', '$branch', '$email','$phone','$cgpa', '$tenth','$twelth', '$diploma');");

$result2 = $mysqli->query("insert into `placementinformer`.`login` VALUES ('$usn','$passMD5');");

echo "Done";
//echo "<script> alert('Passwords does not match');" . "location: header('..//studentHome.php');</script>";





?>