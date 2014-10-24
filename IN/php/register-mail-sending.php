<?php
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.
function sendmail($usn,$name,$email,$code)
{
	require_once('sendmail2people.php');

$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="Verification of your account at Placement Informer";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://localhost/PlacementInformer/IN/signup.php?passkey=$code";


    sendmail($email,'Placement Informer',$subject,$message);

// send email
//$sentmail = mail($to,$subject,$message,$header);
}

?>