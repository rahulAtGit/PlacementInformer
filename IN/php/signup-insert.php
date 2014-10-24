<?php
//error_reporting(E_ALL);



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
echo '<pre>';


$result = $mysqli->query("SELECT * from student where usn = '$usn';");

if(mysqli_num_rows($result)>0)
{
    echo "<script> " ."alert('USN already exists');". "window.location.href='../signup.php'; ".";</script>";
}

$result2 = $mysqli->query("SELECT * from student where email = '$email';");
if(mysqli_num_rows($result2)>0)
{
    echo "<script> " ."alert('Email ID already exists');" . "window.location.href='../signup.php';"."</script>";
}


if($password == $confirmpass)
{
    $passMD5 = md5($password);

    $result1 = mysqli_query($mysqli,"INSERT INTO `student` (`USN`, `NAME`, `BRANCH`, `EMAIL`, `PHONE`, `CGPA`, `tenthPercent`, `twelthPercent`, `diplomapercent`) VALUES ('$usn', '$name', '$branch', '$email','$phone','$cgpa', '$tenth','$twelth', '$diploma');");
    //print_r($result1);
    $result3 = mysqli_query($mysqli,"INSERT into `login` VALUES ('$usn','$passMD5');");

    echo '</pre>';
    echo "Done";
}
else
{
    echo "<script> " ."alert('Passwords does not match');". "window.location.href='../signup.php'; ".";</script>";
}

//echo $cdeadline;

//echo "<script> alert('Passwords does not match');" . "location: header('..//studentHome.php');</script>";





?>