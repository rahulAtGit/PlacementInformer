<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 18/9/14
 * Time: 9:38 PM
 */
require_once('dbconnector.php');
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
// Define $username and $password
$username = $_POST['username'];
$password = $_POST['password'];

$username = md5($username);
$password = md5($password);
$result = $mysqli->query("INSERT INTO LOGIN VALUES ('$username','$password');");