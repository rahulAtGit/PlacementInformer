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
$twelth = $_POST['twelfth'];
$diploma= $_POST['diploma'];

/*$result = $mysqli->query("SELECT * from student where email = '$email';");
if(mysqli_num_rows($result)>0)
{
    echo "<script> " ."alert('Email ID already exists');" . "window.location.href='..//signup.php';"."</script>";
}
*/
//$result1 = $mysqli->query("INSERT INTO `placementinformer`.`student` (`USN`, `NAME`, `BRANCH`, `EMAIL`, `PHONE`, `CGPA`, `tenthPercent`, `twelthPercent`, `diplomapercent`) VALUES ('$usn', '$name', '$branch', '$email','$phone','$cgpa', '$tenth','$twelth', '$diploma');");
$result1 = $mysqli->query("UPDATE `placementinformer`.`student` SET `NAME` = '$name', `BRANCH` = '$branch', `EMAIL` = '$email', `PHONE` = '$phone', `CGPA` = '$cgpa', `tenthPercent` = '$tenth', `twelthPercent` = '$twelth', `diplomapercent` = '$diploma', `BRANCH` = '$branch' WHERE `student`.`USN` = '1RV11IS042'");
$_SESSION['err']="Done profile";
echo '<script>alert("'.$_SESSION['err'].'");</script>';
header('Location: ../edit-profile.php');
?>