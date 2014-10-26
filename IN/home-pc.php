<?php
error_reporting(0);

session_start();
if ((!isset($_SESSION['username']))||(!isset($_SESSION['password'])))
{
    header('Location: ../');
}


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
		<link rel="SHORTCUT ICON" href="images/rvce.ico">
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/simple-sidebar.css" rel="stylesheet">
    
		<!-- Custom CSS -->
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		 <!--[if IE]>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<![endif]-->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLE CSS -->
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
		<!-- CUSTOM STYLE CSS -->
		<link href="assets/css/style.css" rel="stylesheet" />    
		<!-- GOOGLE FONT--> 
		<style>
            @font-face {
                font-family: 'Open Sans';
                font-style: normal;
                font-weight: 400;
                src: local('Open Sans'), local('OpenSans'), url(fonts/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
            }

        </style>
		<link href="gener/genericons.css" rel="stylesheet">
		<link href="css/home-pc-css/main.css" rel="stylesheet" /> 
		<!--   <link href="./bootstrap1/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="./css1/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
		-->
		  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<!--		<link href="./bootstrap1/css/bootstrap.min.css" rel="stylesheet" media="screen">
-->		<link href="./css1/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

	</head>

	<body>

<!--<div id="wrapper" class="toggled">
	

        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    DETAILS
                </li>
                <li>
                    Name
                </li>
                <li>
                    Department -
                </li>
                <li>
                    <a href="#">Update?</a>
                </li>
                
            </ul>
        </div>
-->
        <!-- /#sidebar-wrapper 
		<div id="page-content-wrapper">-->
        
		<div class="navbar navbar-inverse" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
		<!--	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Profile</a>	-->
           <a class="navbar-brand" href="#"><img src="images/rvce.jpg" class="img-circle img-responsive" class="img-responsive" id="logo"></a>
		
            </div>
           <?php


            $uname = $_SESSION['usernameT'];
            $host="localhost"; // Host name or server name
            $username="root"; // Mysql username
            $password=""; // Mysql password
            $db_name="placementinformer"; // Database name
            $tbl_name="student"; // Table name
            $con = mysqli_connect("$host", "$username", "$password","$db_name");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            ?>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                    <?php
                    $host="localhost"; // Host name or server name
                    $username="root"; // Mysql username
                    $password=""; // Mysql password
                    $db_name="placementinformer"; // Database name
                    $tbl_name="student"; // Table name
                    $con = mysqli_connect("$host", "$username", "$password","$db_name");
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    session_start();
                    $uname =  $_SESSION['userNameT'];
                    $result = mysqli_query($con,"SELECT * FROM SPC where USN = '$uname';");
                    if(mysqli_num_rows($result)>0)
                    {
                        echo "<li><a href=\"studentHome.php\" >Student View</a></li>";
                    }
                    ?>
                    <li><a href="edit-profile.php" >Edit Profile</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#basicModal">Change Password?</a></li>
                    <li><a href="php/logout.php">Logout</a></li>
                    
                </ul>
            </div>
           
        </div>
        </div>
		
		
		
		
		<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    	<div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
        </div>
        
        <div class="modal-body">
        <form class="form-horizontal" method="post" name =  "changePass" action = "<?php echo htmlspecialchars('php/changePassword.php');?>" id = "changePass">
		<fieldset>

<!-- Password input-->
		<div class="form-group">
  		<label class="col-md-4 control-label" for="curpass">Current Password</label>
  		<div class="col-md-5">
    		<input id="curpass" name="curpass" type="password" placeholder="Current Password" class="form-control input-md">
    
  		</div>
		</div>

<!-- Password input-->
		<div class="form-group">
  		<label class="col-md-4 control-label" for="newpass">New Password</label>
  		<div class="col-md-5">
    		<input id="newpass" name="newpass" type="password" placeholder="New Password" class="form-control input-md">
    	</div>
		</div>

<!-- Password input-->
		<div class="form-group">
  		<label class="col-md-4 control-label" for="connewpass">Confirm New Password</label>
  		<div class="col-md-5">
    	<input id="connewpass" name="connewpass" type="password" placeholder="Confirm New Password" class="form-control input-md"> 
		</div>
		</div>

		</fieldset>
		


				
				
        </div>
        <div class="modal-footer">
        		<a href="#" style="position:relative; float:left">Forgot password?</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name = "submit" class="btn btn-success" action = "<?php echo htmlspecialchars('php/changePassword.php');?>" id = "submit">Save changes</button>
        </div>
            </form>
    	</div>
 		</div>
		</div>


		
		<div class="row">

			<div id="body-content">
			<div class="a col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-2 col-lg-offset-0 col-md-offset-0 col-md-6 col-lg-6 col-lg-push-6 col-md-push-6">

				<form class="form-horizontal" name = "detailsUpcomingCompany" enctype="multipart/form-data" method = "post" id = "detailsUpcomingCompany" action = "<?php echo htmlspecialchars('php/home-pc-insert.php');?>">
					<fieldset>

						<!-- Form Name -->
						<legend>Upcoming Company Details</legend>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="cname">Company Name</label>
						  <div class="col-md-5">
						  <input id="cname" name="cname" type="text" placeholder="Company Name" class="form-control input-md" required/>

						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="cdate">Date of Visit</label>
						  <div class="col-md-5">
						  <input id="cdate" name="cdate" type="date" placeholder="Date of Visit" class="form-control input-md" required/>

						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="cjob">Job Profiles</label>
						  <div class="col-md-5">
						  <input id="cjob" name="cjob" type="text" placeholder="Job Profiles" class="form-control input-md" required />

						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="cpackage">Package</label>
						  <div class="col-md-5">
						  <input id="cpackage" name="cpackage" type="text" placeholder="Package" class="form-control input-md" required />

						  </div>
						</div>

						<!-- Multiple Checkboxes -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="cbranches[]">Branches Allowed</label>
						  <div class="col-md-4">
						  <div class="checkbox">
							<label for="cbranches-0">
							  <input type="checkbox" name="cbranches[]" id="cbranches-0" value="ISE">
							  ISE
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-1">
							  <input type="checkbox" name="cbranches[]" id="cbranches-1" value="CSE">
							  CSE
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-2">
							  <input type="checkbox" name="cbranches[]" id="cbranches-2" value="ECE">
							  ECE
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-3">
							  <input type="checkbox" name="cbranches[]" id="cbranches-3" value="TC">
							  TC
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-4">
							  <input type="checkbox" name="cbranches[]" id="cbranches-4" value="IT">
							  IT
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-5">
							  <input type="checkbox" name="cbranches[]" id="cbranches-5" value="EEE">
							  EEE
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-6">
							  <input type="checkbox" name="cbranches[]" id="cbranches-6" value="ME">
							  ME
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-7">
							  <input type="checkbox" name="cbranches[]" id="cbranches-7" value="BT">
							  BT
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-8">
							  <input type="checkbox" name="cbranches[]" id="cbranches-8" value="CH">
							  CH
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-9">
							  <input type="checkbox" name="cbranches[]" id="cbranches-9" value="CE">
							  CE
							</label>
							</div>
						  <div class="checkbox">
							<label for="cbranches-10">
							  <input type="checkbox" name="cbranches[]" id="cbranches-10" value="IEM">
							  IEM
							</label>
							</div>
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="ccgpa">CGPA Cut Off</label>
						  <div class="col-md-5">
						  <input id="ccgpa" name="ccgpa" type="text" placeholder="CGPA Cut Off" class="form-control input-md"  />

						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="ctenth">10th Cut Off</label>
						  <div class="col-md-5">
						  <input id="ctenth" name="ctenth" type="text" placeholder="10th Cut Off" class="form-control input-md"  />

						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="ctwelth">12th Cut Off</label>
						  <div class="col-md-5">
						  <input id="ctwelth" name="ctwelth" type="text" placeholder="12th Cut Off" class="form-control input-md"  />

						  </div>
						</div>
						
						<div class="form-group">
						  <label class="col-md-4 control-label" for="cdiploma">Diploma Cut Off</label>
						  <div class="col-md-5">
						  <input id="cdiploma" name="cdiploma" type="text" placeholder="Diploma Cut Off" class="form-control input-md"  />

						  </div>
						</div>
						<div>

						<div class="form-group">
							<label for="dtp_input1" class="col-md-4 control-label" for="cdeadline">Deadline</label>
							<div class="input-group date form_datetime col-md-5"  data-date-format="yyyy-mm-dd HH:ii:ss " data-link-field="dtp_input1">
								<input name="cdeadline" id = "cdeadline" class="form-control input-md" size="16" type="text" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
							</div>

						</div>



								</div>
						<!-- File Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="userfile">Attachement1</label>
						  <div class="col-md-4">
							<input id="cattach1" name="userfile" class="input-file" type="file">
						  </div>
						</div>

						<!-- File Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="userfile2">Attachment2</label>
						  <div class="col-md-4">
							<input id="cattach1" name="userfile2" class="input-file" type="file">
						  </div>
						</div>

						<!-- File Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="userfile3">Attachment3</label>
						  <div class="col-md-4">
							<input id="cattach" name="userfile3" class="input-file" type="file">
						  </div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="submit"></label>
						  <div class="col-md-4">
							<button id="submit" type = "submit" name="submit"  action = "php/home-pc-insert.php">Submit</button>
						  </div>
						</div>


					</fieldset>
				</form>


		</div>
		</div>

		<div id="body-content1">
		<div class="b col-xs-12 col-sm-12 col-md-6 col-lg-6 col-lg-pull-6 col-md-pull-6">
		
			<legend>Download Registration Excel Sheet:</legend>
        <h4 class="panel-heading">Today</h4>
        		<?php


            $uname = $_SESSION['usernameT'];
			$host="localhost"; // Host name or server name
			$username="root"; // Mysql username
			$password=""; // Mysql password
			$db_name="placementinformer"; // Database name
			$tbl_name="student"; // Table name
			$con = mysqli_connect("$host", "$username", "$password","$db_name");
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		?>

          <?php

          $result = mysqli_query($con,"SELECT C.NAME, C.lastDateReg FROM COMPANY as C, DATEOFVISIT as D where C.NAME = D.NAME and D.DATE = curdate() ORDER BY D.DATE");
            if(mysqli_num_rows($result)==0)
            {
                echo "<div class=\"container-fluid col\" >";
                echo "No company today";
                echo "</div>";

            }
//          echo mysqli_num_rows($result);
          while ($db_field = mysqli_fetch_assoc($result)) {
              echo "<div class=\"container-fluid col\" >";
              echo "<div class=\"col-md-6 col-sm-12 col-lg-6 col-xs-12 each\">Company Name:";

              $companyName = $db_field['NAME'];
              echo "<span style='color:blue;margin-left:10px;'>" . $companyName . "</span>";
              echo "</div>";
              echo "<div class=\"col-md-6 col-sm-12 col-lg-6 col-xs-12 each\">To Be Sent Before:";
              echo "<span style='color:blue;margin-left:10px;'>" . $db_field['lastDateReg'] . "</span>";


              echo "</div>";
              echo "<div class=\"col-md-2 col-sm-12 col-lg-2 col-xs-12 col-md-push-10 col-lg-push-10 each1\"> <button type=\"button\" class=\"btn btn-success\">Download</button></div>";
              echo "</div>";
          }

          ?>
            <h4 class="panel-heading">Upcoming Companies:</h4>
            <?php
			$result = mysqli_query($con,"SELECT * FROM COMPANY as C, DATEOFVISIT as D where C.NAME = D.NAME and D.DATE > curdate() ORDER BY D.DATE");
			
			while($db_field=mysqli_fetch_assoc($result)) {
                echo "<div class=\"container-fluid col\" >";
                echo "<div class=\"col-md-6 col-sm-12 col-lg-6 col-xs-12 each\">Company Name:";

                $companyName = $db_field['NAME'];
                echo "<span style='color:blue;margin-left:10px;'>" . $companyName . "</span>";
                echo "</div>";
                echo "<div class=\"col-md-6 col-sm-12 col-lg-6 col-xs-12 each\">To Be Sent Before:";
                echo "<span style='color:blue;margin-left:10px;'>" . $db_field['lastDateReg'] . "</span>";

                echo "<form action='php/exporttoexcel.php' target='_blank'>";
                $s= "<input type='hidden' name='companyname' value='";
                $s.=$companyName."'";
                echo $s;
                echo "</div>";
                echo "<div class=\"col-md-2 col-sm-12 col-lg-2 col-xs-12 col-md-push-10 col-lg-push-10 each1\"> <input type=\"submit\" class=\"btn btn-success\" value=\"Download\"></div>";
                echo "</div>";
                echo "</form>";
            }?>

        <h4 class="panel-heading">Visited Companies:</h4>
            <?php
            $result = mysqli_query($con,"SELECT * FROM COMPANY as C, DATEOFVISIT as D where C.NAME = D.NAME and D.DATE < curdate() ORDER BY D.DATE");

            while($db_field=mysqli_fetch_assoc($result)) {
                echo "<div class=\"container-fluid col\" >";
                echo "<div class=\"col-md-6 col-sm-12 col-lg-6 col-xs-12 each\">Company Name:";

                $companyName = $db_field['NAME'];
                echo "<span style='color:blue;margin-left:10px;'>" . $companyName . "</span>";
                echo "</div>";
                echo "<div class=\"col-md-6 col-sm-12 col-lg-6 col-xs-12 each\">To Be Sent Before:";
                echo "<span style='color:blue;margin-left:10px;'>" . $db_field['lastDateReg'] . "</span>";


                echo "</div>";
                echo "<div class=\"col-md-2 col-sm-12 col-lg-2 col-xs-12 col-md-push-10 col-lg-push-10 each1\"> <button type=\"button\" class=\"btn btn-success\">Download</button></div>";
                echo "</div>";
            }


		?>
		</div>

		</div>
		</div>
		<!--</div>-->

<script type="text/javascript" src="./jquery1/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./bootstrap1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js1/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="./js1/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
		pickerPosition: 'bottom-left',
		startDate: '+0d'
    });
	
</script>
		 <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
