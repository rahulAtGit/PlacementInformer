<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 18/9/14
 * Time: 9:22 PM
 */
require_once("dbconnector.php");

// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['username']))||(!isset($_SESSION['password']) )){
    header('Location: ../..');
}

?>