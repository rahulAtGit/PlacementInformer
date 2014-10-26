<html>
<head>
    <script src="js/jquery.min202.js" type="text/javascript"></script>
    <script src="js/jquery.growl.js" type="text/javascript"></script>
    <link href="css/jquery.growl.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
error_reporting(0);



$mysqli = new mysqli("localhost", "root", "", "placementinformer"); // put "" for the password if you want to run them
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
// Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password=md5($password);
		$_SESSION['userNameT'] = $username;
        echo $username.'\n';
        echo $password;
$result = $mysqli->query("SELECT * from login WHERE uname='$username' and password='$password';");
//echo $result->num_rows;
echo $result->num_rows;
if ($result->num_rows == 1) {
    $_SESSION['username']=$username; // Initializing Session
    $_SESSION['password']=$password;
    header("location: ../studentHome.php"); // Redirecting To Other Page
}
else {
    ?>
    <script>
    $.growl.error({ message: "Invalid Login" });
    </script>
    <?
    header('Location: ../..');
    echo $error;
    session_destroy();

}

?>
</body>
</html>