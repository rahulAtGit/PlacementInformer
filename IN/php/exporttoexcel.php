<?php

$mysqli = new mysqli("localhost", "root", "", "placementinformer"); // put "" for the password if you want to run them
/* check connection */
if ($mysqli->connect_errno) {
printf("Connect failed: %s\n", $mysqli->connect_error);
exit();
}

// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['username']))||(!isset($_SESSION['password']) )){
    header('Location: ../');
}

$host="localhost"; // Host name or server name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="placementinformer"; // Database name

$con = mysqli_connect("$host", "$username", "$password","$db_name");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$fname = '/tmp/'.$_SESSION['username'].time().'.csv';

$cname=$_POST['companyname'];
//$cname='Comm';
$q="SELECT s.USN, s.NAME, s.BRANCH, s.EMAIL, s.PHONE,s.CGPA, s.tenthPercent, s.twelthpercent INTO OUTFILE  '$fname' FIELDS TERMINATED BY  ',' OPTIONALLY ENCLOSED BY  '\"' LINES TERMINATED BY  '\n' FROM student as s , applied as a WHERE a.USN=s.USN and a.name = '$cname'";

$res = mysqli_query($con,$q);

$download_file = $cname.time().'.csv';

// set the download rate limit (=> 20,5 kb/s)
$download_rate=20.5;
if(file_exists($fname) && is_file($fname))
{
    header('Cache-control: private');
    header('Content-Type: text/csv');
    header('Content-Length: '.filesize($fname));
    header('Content-Disposition: filename='.$download_file);
    flush();
    $file = fopen($fname, "r");
    while(!feof($file))
    {
        // send the current file part to the browser
        print fread($file, round($download_rate * 1024));
        // flush the content to the browser
        flush();
        // sleep one second
        sleep(1);
    }
    fclose($file);
}
else {
    die('Error: The file '.$fname.' does not exist!');
}


?>

