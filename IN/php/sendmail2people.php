<!DOCTYPE html>
<html>


<head>

    <meta charset="UTF-8">

    <title>Placement Informer</title>
    <script type="text/javascript" src="IN/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="IN/css/bootstrap.min.css"></head>
    <?php
error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 28/9/14
 * Time: 8:24 AM
 */
//
//
require_once('PHPMailer_5.2.4/class.phpmailer.php');
//require_once('sendemail.php');
//require_once('dbconnector.php');
//$mysqli=$GLOBALS['conn'];

$mysqli = new mysqli("localhost", "root", "", "placementinformer"); // put "" for the password if you want to run them
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

function sendmail($toemailid,$name, $subject, $body)
{
    $mail = new PHPMailer();
//collecting to addresses

//end of collecting to addresses

//$body             = eregi_replace("[\]",'',$body);

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = "ssl://smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port = 465;                   // set the SMTP port for the GMAIL server
    $mail->Username = "placementinformer@gmail.com";  // GMAIL username
    $mail->Password = "RVCE1963";            // GMAIL password

    $mail->SetFrom('placementinformer@gmail.com', 'RVCE Placements');

    $mail->AddReplyTo('placementinformer@gmail.com', 'RVCE Placements');

    $mail->Subject = $subject;//Add a subject

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

    /*
    $result = mysqli_query($mysqli,"SELECT name,EMAIL FROM STUDENT WHERE 1;");
    echo mysqli_num_rows($result);

    for($i=0; $i<mysqli_num_rows($result);$i++)
    {
        $row= mysqli_fetch_row($result);
        $mail->AddAddress($row[1],$row[0]);
        mysqli_next_result($mysqli);
        echo $row[1].'\n';
    }
    */
    $mail->MsgHTML($body);
    $mail->AddAddress($toemailid, $name);


//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;

    } else {
        echo '<div class="alert alert-success text-center" role="alert"><strong>Success! </strong> Message Sent</div>';
    }
    ?>
<?php
}


?>