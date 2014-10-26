<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 18/9/14
 * Time: 9:33 PM
 */
error_reporting(E_ALL);

// Initialize session
require_once('sendmail2people.php');
session_start();

// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['username']))||(!isset($_SESSION['password']) )){
    header('Location: ../..');
}

$mysqli = new mysqli("localhost", "root", "", "placementinformer"); // put "" for the password if you want to run them
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


//obtaining company name and usn
$nameofcomp = $_GET['cname'];
$usn = $_SESSION['username'];


//checking duplicate entries
$r0 = mysqli_query($mysqli,"SELECT * FROM applied WHERE USN='$usn' and NAME = '$nameofcomp'");
//print_r($r0);
$c0 = mysqli_fetch_array($r0, MYSQLI_ASSOC);
//print_r($c0);

if(mysqli_num_rows($r0)==0 ){

//eligibility check of the student
    $r1 = mysqli_query($mysqli, "SELECT * FROM student WHERE USN='$usn'");
    $sa = mysqli_fetch_array($r1, MYSQLI_ASSOC);
    $r2 = mysqli_query($mysqli, "SELECT * FROM company WHERE NAME='$nameofcomp'");
    $ca = mysqli_fetch_array($r2, MYSQLI_ASSOC);

    $date = date('Y-m-d H:i:s');
  //  echo $date;
    echo $ca['lastDateReg'];
    if ($ca['lastDateReg'] > $date) {
        if ($ca['GPACUTOFF'] <= $sa['CGPA'] && $sa['tenthPercent'] >= $ca['TENTHCUTOFF'] && (($ca['PUCCUTOFF'] <= $sa['twelthPercent']) || ($ca['DIPLOMACUTOFF'] <= $sa['diplomaPercent']))) {
//Inserting into the company
            $t = time();
            $deadline = $ca['lastDateReg'];
            $res = mysqli_query($mysqli, "INSERT INTO applied VALUES ('$usn','$nameofcomp','$deadline')");

//send email
            $body = "<html><style>p{color: #009900;}</style><body><p>You have registered for " . $ca['NAME'] . " The details are as follows. <br></p><ul><li> Package : " . $ca['PACKAGE'] . "</li><li> Profiles" . "</li></ul></body></html>";
            echo '<pre>';
            sendmail($sa['EMAIL'], $sa['NAME'], 'Registration complete', $body);
            echo '</pre>';
//send sms - 2nd phase

        } else {
            echo 'Sorry! Could not register. Please Try again or contact administrator';
        }

    } else {
        echo 'Error : You have crossed the deadline. Please contact your placement coordinator.';
    }
}
else
{
    echo 'You have already registered. Why do it again?';
}


?>