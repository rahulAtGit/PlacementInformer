<?php
error_reporting(E_ALL);
require('register-mail-sending.php');
$m = md5("test");
sendvmail('1RV11IS006','Akash S','aakaashh.s@gmail.com',$m);
sendvmail('1RV11IS042','Ram kumar','ramkumar.kr94@gmail.com',$m);
sendvmail('1RV11IS040','Sir Rahul','rahul.rvce.is@gmail.com',$m);
echo 'yes';
?>