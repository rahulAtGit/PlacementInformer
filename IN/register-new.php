<?php
error_reporting(0);

session_start();
if ((!isset($_SESSION['username']))||(!isset($_SESSION['password'])))
{
    header('Location: ../');
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

    <div class="row">

<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 vcentre">

    <br/>
    <div class="col-lg-offset-5 col-md-offset-5 logo">
        <img src="images/logo.png">
    </div>
        <div class="col-lg-offset-3 col-md-offset-3"><h3>New student registrations</h3></div>

</div>
</div>

<br/>
<br/>
        <div class="row">

            <div id="body-content">
            <div class="a col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-2 col-lg-offset-1 col-md-offset-1 col-md-4 col-lg-4 ">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Register through excel</legend>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file">Excel upload</label>
  <div class="col-md-4">
    <input id="file" name="file" class="input-file" type="file">
  </div>
</div>

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
</div>



            <div id="body-content">
            <div class="a col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-2 col-lg-offset-1 col-md-offset-1 col-md-4 col-lg-4 ">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Register through single entry</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-6">
  <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="usn">USN</label>  
  <div class="col-md-6">
  <input id="usn" name="usn" type="text" placeholder="USN" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email id</label>  
  <div class="col-md-6">
  <input id="email" name="email" type="text" placeholder="Email id" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit2"></label>
  <div class="col-md-4">
    <button id="submit2" name="submit2" class="btn btn-success">Submit</button>
  </div>
</div>

</fieldset>
</form>
</div>
</div>
</div>






<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


</body>

</html>
