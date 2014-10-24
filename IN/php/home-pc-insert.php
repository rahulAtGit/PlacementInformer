<?php
error_reporting(0);

echo "asda";

require_once('dbconnector.php');
echo "asda";
require('uploadfiles.php');
echo "asdaaas";
require('sendmail2people.php');
echo "asda";
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
echo "asd";
$cname = $_POST['cname'];
$cdate = $_POST['cdate'];
$cpackage = $_POST['cpackage'];
$cjob = $_POST['cjob'];
$ccgpa = $_POST['ccgpa'];
$ctenth = $_POST['ctenth'];
$ctwelth = $_POST['ctwelth'];
$cdiploma= $_POST['cdiploma'];
$cdeadline= $_POST['cdeadline'];
//echo $cdeadline;
echo "asd";
$r = uploadfiles($cname);
echo $r;
if($r == 1) {


    $result1 = $mysqli->query("INSERT INTO `company` (`NAME`, `PACKAGE`, `GPACUTOFF`, `TENTHCUTOFF`, `PUCCUTOFF`, `DIPLOMACUTOFF`, `lastDateReg`) VALUES ('$cname', '$cpackage', '$ccgpa', '$ctenth', '$ctwelth', '$cdiploma','$cdeadline');");
    echo "a";
    $result2 = $mysqli->query("INSERT INTO jobprofile (`NAME`, `PROFILE`) VALUES ('$cname', '$cjob');");
    echo "n";
    $result3 = $mysqli->query("INSERT INTO `dateofvisit` (`NAME`, `DATE`) VALUES ('$cname', '$cdate');");

    foreach ($_POST['cbranches'] as $selected) {
        $result4 = $mysqli->query("INSERT INTO `brancheseligible` (`NAME`, `BRANCH`) VALUES ('$cname', '$selected');");
    }

    $result5=$mysqli->query("select * from student where CGPA >= '$cgpa' and tenthPercent >='$ctenth' and (twelthPercent >='$ctwelth' or diplomaPercent >= '$cdiploma')");
    $body = "Incoming Company ".$cname."Package : ".$cpackage."Visit the site for more details";
    while($ar=mysqli_fetch_assoc($result5))
    {
        $em = $ar['EMAIL'];
        echo $em;
        sendmail($em,'Student', 'Incoming Company',$body);
    }
    echo "Done";

}


?>