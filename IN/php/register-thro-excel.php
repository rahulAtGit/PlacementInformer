<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 18/9/14
 * Time: 9:33 PM
 */
error_reporting(E_ALL);

// Initialize session
require_once('excel_reader2.php');
require('register-mail-sending.php');

session_start();

// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['username']))||(!isset($_SESSION['password']) )){
    header('Location: ../..');
}

$filename=$_FILES['file']['name'];
    $uploaddir = '../uploads/';
//upload files for the first upload button
    if (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])) {
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        //echo $uploadfile;

        echo '<pre>';
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
            //$newname = $cname . '_' . $_FILES['file']['name'];
            //rename($uploadfile, $uploaddir . $newname);
        } else {
            echo "Sorry! Your first file cannot be uploaded. Try again or contact administrator\n";
            return 0;
        }
    }


$mysqli = new mysqli("localhost", "root", "", "placementinformer"); // put "" for the password if you want to run them
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


$data = new Spreadsheet_Excel_Reader("../uploads/{$filename}");
 
echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";
 
$html="<table border='1'>";
for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{    
    if(count($data->sheets[$i][cells])>0) // checking sheet not empty
    {
        echo "Sheet $i:<br /><br />Total rows in sheet $i  ".count($data->sheets[$i][cells])."<br />";
        for($j=1;$j<=count($data->sheets[$i][cells]);$j++) // loop used to get each row of the sheet
        { 
            $html.="<tr>";
            for($k=1;$k<=count($data->sheets[$i][cells][$j]);$k++) // This loop is created to get data in a table format.
            {
                $html.="<td>";
                $html.=$data->sheets[$i][cells][$j][$k];
                $html.="</td>";
            }

            $usn = mysqli_real_escape_string($mysqli,$data->sheets[$i][cells][$j][1]);
            $name = mysqli_real_escape_string($mysqli,$data->sheets[$i][cells][$j][2]);
            $email = mysqli_real_escape_string($mysqli,$data->sheets[$i][cells][$j][3]);
            $query = "insert into temp1(usn,name,email) values('".$usn."','".$name."','".$email."')";
 
            mysqli_query($mysqli,$query);
            $html.="</tr>";
        }
    }
 
}
 
$html.="</table>";
echo $html;
echo "<br />Data Inserted in dababase";


//$sql = 'SELECT * FROM temp1';

$retval = mysqli_query( $mysqli, 'SELECT * FROM temp1');

if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

if(mysqli_num_rows($retval)!=0 ){


while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
    $code=md5(uniqid(rand())); 
    echo "Tutorial ID :{$row['usn']}  <br> ".
         "Title: {$row['name']} <br> ".
         "Author: {$row['email']} <br> ".
         "Author: {$code} <br> ".
         "--------------------------------<br>";
         $usn=$row['usn'];
         $name=$row['name'];
         $email=$row['email'];
         //$q='$row['usn']","$row['name']","$row['email']","$code"';
//$sql = 'insert into temp values("$q")';
$sql = "insert into temp values('$usn','$name','$email','$code')";

$retval1 = mysqli_query( $mysqli, $sql);

if($retval1){
$sql2="delete from temp1 where usn='$usn'";
$retval2 = mysqli_query( $mysqli, $sql);

sendmail($usn,$name,$email,$code);

}
//$result1 = $mysqli->query('insert into temp values("$row['usn']","$row['name']","$row['email']","$code")');
//$retval = mysqli_query( $mysqli, $sql);
//$retval = mysqli_query( $mysqli, $sql);

} 

}
?>

