<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 18/9/14
 * Time: 9:33 PM
 */
require('register-mail-sending.php');

error_reporting(E_ALL);

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

			 $code=md5(uniqid(rand())); 
            $usn = $_POST['usn'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $query = "insert into temp values('$usn','$name','$email','$code')";
 
          $retval1 =   mysqli_query($mysqli,$query);

if($retval1){

sendmail($usn,$name,$email,$code);

}

?>