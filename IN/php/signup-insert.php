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



$result = $mysqli->query("SELECT * from student where usn = '$usn';");

if(mysqli_num_rows($result)>0)
{
    $_SESSION['err']="USN already exists";
    header('Location:../signup.php');
}

$result2 = $mysqli->query("SELECT * from student where email = '$email';");
if(mysqli_num_rows($result2)>0)
{
    $_SESSION['err']="Email ID already exists";
    header('Location:../signup.php');
}


if($password == $confirmpass)
{
    $passMD5 = md5($password);

    $result1 = mysqli_query($mysqli,"INSERT INTO `student` (`USN`, `NAME`, `BRANCH`, `EMAIL`, `PHONE`, `CGPA`, `tenthPercent`, `twelthPercent`, `diplomapercent`) VALUES ('$usn', '$name', '$branch', '$email','$phone','$cgpa', '$tenth','$twelth', '$diploma');");
    //print_r($result1);
    $result3 = mysqli_query($mysqli,"INSERT into `login` VALUES ('$usn','$passMD5');");
    
    
    $passkey = $_GET['code'];

    $result4 = mysqli_query($mysqli,"DELETE from temp where code = '$passkey';");


    $_SESSION['err']="Done";
    header('Location:../..');
}
else
{
    $_SESSION['err']="Passwords don't match";
    header('Location:../signup.php');
}

//echo $cdeadline;

//echo "<script> alert('Passwords does not match');" . "location: header('..//studentHome.php');</script>";





?>