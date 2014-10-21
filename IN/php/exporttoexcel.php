<html>
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
$password="admin"; // Mysql password
$db_name="placementinformer"; // Database name

$con = mysqli_connect("$host", "$username", "$password","$db_name");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$f1 = '/var/www/';
$fname = 'wp/IN/files/'.$_SESSION['username'].time().'.csv';
unlink($fname);
echo $fname;
echo $f1;
$tname='student'; // Table name
$f2 = $f1.$fname;
$res = mysqli_query($con," SELECT * INTO OUTFILE  '$f2' FIELDS TERMINATED BY  ',' OPTIONALLY ENCLOSED BY  '\"' LINES TERMINATED BY  '\n' FROM $tname  ;");
var_dump($res);
var_dump($con);
$f3 = 'http://localhost/'.$fname;
?>
<body>
    <?php echo "<a href= '$f3'>test</a>"?>
</body>
</html>