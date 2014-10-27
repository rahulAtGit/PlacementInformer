<?php
            error_reporting(0);


            session_start();
 
            if ((!isset($_SESSION['username']))||(!isset($_SESSION['password'])))
            {
              header('Location: ../');
            }


            $host="localhost"; // Host name or server name
            $username="root"; // Mysql username
            $password=""; // Mysql password
            $db_name="placementinformer"; // Database name
            $tbl_name="student"; // Table name
            $con = mysqli_connect("$host", "$username", "$password","$db_name");
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            //session_start();
            $uname =  $_SESSION['userNameT'];
            $result = mysqli_query($con,"SELECT name FROM student where USN = '$uname';");
            
?>

<!DOCTYPE html>
<html lang="en">

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


    <link href="css/edit-profile-css/main.css" rel="stylesheet" />

    <?php
    require_once('php/dbconnector.php');
    session_start();
    $uname =  $_SESSION['userNameT'];

    ?>


    <?php

    if(isset($_SESSION['err']))
    {
        echo '<div class="alert alert-success text-center" role="alert"><strong>Success!</strong>Profile Updated</div>';
    }
                               unset($_SESSION['err']);

    ?>

</head>

<body>


    <div class="navbar navbar-inverse" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
      <!--  <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Profile</a>
                    <span class="genericon genericon-menu"></span>
                </a>-->
      <!--  <div alt="f419" class="genericon genericon-menu"></div>
        -->
           <a class="navbar-brand" href="#"><img src="images/rvce.jpg" class="img-circle" class="img-responsive" id="logo"></a>

            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    $result = mysqli_query($con,"SELECT * FROM SPC where USN = '$uname';");
                    if(mysqli_num_rows($result)>0)
                    {
                        echo "<li><a href=\"home-pc.php\" >PC View</a></li>";
                    }
                    ?>
                    <?php
                    $result = mysqli_query($con,"SELECT * FROM SPC where USN = '$uname';");
                    if(mysqli_num_rows($result)>0)
                    {
                        echo "<li><a href=\"studentHome.php\" >Student View</a></li>";
                        echo "<li><a href=\"register-new.php\" >Add students</a></li>";
                    }
                    else
                    {
                        echo "<li><a href=\"studentHome.php\" >Home</a></li>";
                    }
                    ?>
                    <li><a href="edit-profile.php" >Edit Profile</a></li>
                    <li><a href="" data-toggle="modal" data-target="#basicModal">Change Password?</a></li>
                    <li><a href="php/logout.php">Logout</a></li>

                </ul>
            </div>

        </div>
        </div>
<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 vcentre">



<form class="form-horizontal" name = "edit-profile" method = "post" id = "edit-profile" action = "<?php echo htmlspecialchars('php/edit-profile-insert.php');?>">
<fieldset>
<!-- Form Name -->
<legend>Profile</legend>

<!-- Text input-->

    <div class="form-group">
        <label class="col-md-4 control-label" for="usn">USN</label>
        <div class="col-md-5">
            <?php
            $result = mysqli_query($con,"SELECT usn FROM student where USN = '$uname';");
            while($db_field=mysqli_fetch_assoc($result))
            {
                echo "<input id=\"usn\" name=\"usn\" type=\"text\"  value = " . $db_field['usn']  . "  class=\"form-control input-md\" readonly>";
            }

            ?>
        </div>
    </div>

<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-5">
      <?php
      $result = mysqli_query($con,"SELECT name FROM student where USN = '$uname';");
      while($db_field=mysqli_fetch_assoc($result)) {
          echo "<input id=\"name\" name=\"name\" type=\"text\" value = " . $db_field['name'] . " class=\"form-control input-md\">";
      }
    ?>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email id</label>  
  <div class="col-md-5">
      <?php
      $result = mysqli_query($con,"SELECT email FROM student where USN = '$uname';");
      while($db_field=mysqli_fetch_assoc($result))
      {
          echo "<input id=\"email\" name=\"email\" type=\"text\" value = " . $db_field['email'] . " class=\"form-control input-md\">";
      }
      ?>
  </div>
</div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="branch">Branch</label>
        <div class="col-md-5">
            <?php
            $result = mysqli_query($con,"SELECT branch FROM student where USN = '$uname';");
            while($db_field=mysqli_fetch_assoc($result))
            {
                echo "<input id=\"branch\" name=\"branch\" type=\"text\" value = ". $db_field['branch'] . " class=\"form-control input-md\">";
            }
            ?>
        </div>
    </div>


<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone No</label>  
  <div class="col-md-5">
      <?php
      $result = mysqli_query($con,"SELECT phone FROM student where USN = '$uname';");
      while($db_field=mysqli_fetch_assoc($result))
      {
          echo "<input id=\"phone\" name=\"phone\" type=\"text\" value = " . $db_field['phone'] . " class=\"form-control input-md\">";
      }
      ?>

    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tenth">10th %</label>  
  <div class="col-md-2">
      <?php
      $result = mysqli_query($con,"SELECT tenthPercent FROM student where USN = '$uname';");
      while($db_field=mysqli_fetch_assoc($result))
      {
          echo "<input id=\"tenth\" name=\"tenth\" type=\"text\" value = ". $db_field['tenthPercent'] . " class=\"form-control input-md\">";
      }
      ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="twelfth">12th % (N/A)</label>  
  <div class="col-md-2">
      <?php
      $result = mysqli_query($con,"SELECT twelthPercent FROM student where USN = '$uname';");
      while($db_field=mysqli_fetch_assoc($result))
      {
          echo "<input id=\"twelfth\" name=\"twelfth\" type=\"text\" value = ". $db_field['twelthPercent'] . " class=\"form-control input-md\">";
      }
      ?>

    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="diploma">Diploma % (N/A)</label>  
  <div class="col-md-2">
      <?php
      $result = mysqli_query($con,"SELECT diplomapercent FROM student where USN = '$uname';");
      while($db_field=mysqli_fetch_assoc($result))
      {
          echo "<input id=\"diploma\" name=\"diploma\" type=\"text\" value = ". $db_field['diplomapercent'] . " class=\"form-control input-md\">";
      }
      ?>

    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cgpa">CGPA</label>  
  <div class="col-md-2">
      <?php
      $result = mysqli_query($con,"SELECT cgpa FROM student where USN = '$uname';");
      while($db_field=mysqli_fetch_assoc($result))
      {
          echo "<input id=\"cgpa\" name=\"cgpa\" type=\"text\" value = ". $db_field['cgpa'] . " class=\"form-control input-md\">";
      }
      ?>

    
  </div>
</div>

<!-- Password input-->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-success">Submit</button>
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
