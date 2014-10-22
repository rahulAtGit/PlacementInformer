<?php
error_reporting(0);



require_once('dbconnector.php');
require('uploadfiles.php');
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

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
$r = uploadfiles($cname);
echo $r;
if($r == 1) {


    $result1 = $mysqli->query("INSERT INTO `company` (`NAME`, `PACKAGE`, `GPACUTOFF`, `TENTHCUTOFF`, `PUCCUTOFF`, `DIPLOMACUTOFF`, `lastDateReg`) VALUES ('$cname', '$cpackage', '$ccgpa', '$ctenth', '$ctwelth', '$cdiploma','$cdeadline');");

    $result2 = $mysqli->query("INSERT INTO jobprofile (`NAME`, `PROFILE`) VALUES ('$cname', '$cjob');");

    $result3 = $mysqli->query("INSERT INTO `dateofvisit` (`NAME`, `DATE`) VALUES ('$cname', '$cdate');");

    foreach ($_POST['cbranches'] as $selected) {
        $result4 = $mysqli->query("INSERT INTO `brancheseligible` (`NAME`, `BRANCH`) VALUES ('$cname', '$selected');");
    }


    echo "Done";

}


?>