<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 18/9/14
 * Time: 9:33 PM
 */
// Initialize session
require_once('sendmail2people.php');
session_start();

// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['username']))||(!isset($_SESSION['password']) )){
    header('Location: ../..');
}

$mysqli = new mysqli("localhost", "root", "admin", "placementinformer"); // put "" for the password if you want to run them
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


//obtaining company name and usn
$nameofcomp = $_GET['cname'];
$usn = $_SESSION['username'];

//eligibility check of the student
$r1 = mysqli_query($mysqli,"SELECT * FROM student WHERE USN='$usn'");
$sa = mysqli_fetch_array($r1,MYSQL_BOTH);
$r2 = mysqli_query($mysqli,"SELECT * FROM company WHERE NAME='$nameofcomp'");
$ca = mysqli_fetch_array($r2,MYSQL_BOTH);

if($ca['GPACUTOFF'] <= $sa['CGPA'] && $sa['tenthPercent']>=$ca['TENTHCUTOFF'] &&( ($ca['PUCCUTOFF']<=$sa['twelthPercent']) || ($ca['DIPLOMACUTOFF']<=$sa['diplomaPercent']) ) && ())
{
//Inserting into the company
    $res = mysqli_query($mysqli,"INSERT INTO applied VALUES ('$usn','$nameofcomp')");
//send email
    $body = "<html>
    <style>
        p{
            color: #009900;
        }
    </style>
    <body>
        <p>You have registered for ".$ca['NAME']." The details are as follows. <br></p>
        <ul>
            <li> Package : ".$ca['PACKAGE']."</li><li> Profiles".
            "</li>
        </ul>
    </body>
</html>";

    sendmail($sa['EMAIL'],$sa['NAME'],'Registration complete',$body);
//send sms - 2nd phase

}
else
{
    echo '';
}




?>