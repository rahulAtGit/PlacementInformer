<?php


$mysqli = new mysqli("localhost", "root", "", "placementinformer"); // put "" for the password if you want to run them
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if(isset($passkey)) {

    $passkey = $_GET['passkey'];
    $tbl_name = "temp";

// Retrieve data from table where row that match this passkey 
    $sql = "SELECT * FROM $tbl_name WHERE code ='$passkey'";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {

// Count how many row has this passkey
        $count = mysqli_num_rows($result);

// if found this passkey in our database, retrieve data from table "temp_members_db"
        if ($count == 1) {

            $rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $name = $rows['name'];
            $email = $rows['email'];
            $usn = $rows['usn'];
//$tbl_name2="";

// Insert data that retrieves from "temp_members_db" into table "registered_members" 
//$sql2="INSERT INTO $tbl_name2(name, email, password, country)VALUES('$name', '$email', '$password', '$country')";
//$result2=mysql_query($sql2);
            /*
            // if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
            if($result2){

            echo "Your account has been activated";

            // Delete information of this user from table "temp_members_db" that has this passkey
            $sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
            $result3=mysql_query($sql3);

            }
            */
        }
    }
}
else {
    echo "Wrong Confirmation code";

}




?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Placement Informer</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="SHORTCUT ICON" href="images/rvce.ico">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="gener/genericons.css" rel="stylesheet">
    <link href="css/signup-css/main.css" rel="stylesheet" />


</head>

<body>

<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 vcentre">

    <br/>
    <div class="col-lg-offset-5 col-md-offset-5 logo">
        <img src="images/logo.png">
    </div>

    <form class="form-horizontal" name = "signup" method = "post" id = "signup" action = "<?php echo htmlspecialchars('php/signup-insert.php');?>">
        <fieldset>

            <!-- Form Name -->
            <legend>Sign up</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="usn">USN</label>
                <div class="col-md-5">
                    <input readonly id="usn" name="usn" type="text" placeholder="USN" class="form-control input-md" value='<?php echo "{$usn}"?>'>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Name</label>
                <div class="col-md-5">
                    <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" value='<?php echo "{$name}"?>'>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email id</label>
                <div class="col-md-5">
                    <input id="email" name="email" type="text" placeholder="Email id" class="form-control input-md" value='<?php echo "{$email}"?>'>

                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Password</label>
                <div class="col-md-5">
                    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md">

                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="confirmpass">Confirm Password</label>
                <div class="col-md-5">
                    <input id="confirmpass" name="confirmpass" type="password" placeholder="Confirm Password" class="form-control input-md">

                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="branch">Branch</label>
                    <!-- -->
                <div class="col-md-5">
                    <select id="branch" name="branch" class="form-control">
                        <?php
                        require_once('php/dbconnector.php');
                        $result = mysqli_query($con, "select * from branches;");
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value = "<?php echo $row['branch']; ?>"><?php echo $row['branch']; ?></option>
                        <?php } ?>
                    </select>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="phone">Phone No</label>
                <div class="col-md-5">
                    <input id="phone" name="phone" type="text" placeholder="Phone No" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tenth">10th %</label>
                <div class="col-md-2">
                    <input id="tenth" name="tenth" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="twelth">12th % (N/A)</label>
                <div class="col-md-2">
                    <input id="twelth" name="twelth" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="diploma">Diploma % (N/A)</label>
                <div class="col-md-2">
                    <input id="diploma" name="diploma" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cgpa">CGPA</label>
                <div class="col-md-2">
                    <input id="cgpa" name="cgpa" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit"  value="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </fieldset>
    </form>

</div>









<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


</body>

</html>
