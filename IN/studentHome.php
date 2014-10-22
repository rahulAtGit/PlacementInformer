<?php
error_reporting(0);

// Initialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['username']))||(!isset($_SESSION['password']) )){
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
    <link rel="SHORTCUT ICON" href="images/rvce.ico">

    <title>Placement Informer</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Student Home</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link href="gener/genericons.css" rel="stylesheet">
	<link href="css/index-css/main.css" rel="stylesheet" />    
    
</head>

<body>

<!--    <div id="wrapper" class="toggled">
	

        
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    Profile
                </li>
                <li>
                    Name -
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
						$result = mysqli_query($con,"SELECT name FROM student where USN = '$uname';");
						while($db_field=mysqli_fetch_assoc($result))
						{
							echo $db_field['name'];
						}
					?>
                </li>
				<li>
                    Email -
					<?php
						$result = mysqli_query($con,"SELECT email FROM student where USN = '$uname';");
						while($db_field=mysqli_fetch_assoc($result))
						{
							echo $db_field['email'];
						}
					?>
                </li>
				<li>
                    USN -
					<?php
						$result = mysqli_query($con,"SELECT usn FROM student where USN = '$uname';");
						while($db_field=mysqli_fetch_assoc($result))
						{
							echo $db_field['usn'];
						}
					?>
                </li>
				<li>
                    Branch -
					<?php
						$result = mysqli_query($con,"SELECT branch FROM student where USN = '$uname';");
						while($db_field=mysqli_fetch_assoc($result))
						{
							echo $db_field['branch'];
						}
					?>
                </li>
				<li>
                    CGPA -
					<?php
						$result = mysqli_query($con,"SELECT cgpa FROM student where USN = '$uname';");
						while($db_field=mysqli_fetch_assoc($result))
						{
							echo $db_field['cgpa'];
						}
					?>
                </li>
                <li>
                    10th % -
					<?php
					
						$result = mysqli_query($con,"SELECT tenthPercent FROM student where USN = '$uname';");
						while($db_field=mysqli_fetch_assoc($result))
						{
							echo $db_field['tenthPercent'];
						}
					?>
                </li>
                <li>
                    12th % -
					<?php
						$result = mysqli_query($con,"SELECT twelthPercent FROM student where USN = '$uname';");
						while($db_field=mysqli_fetch_assoc($result))
						{
							echo $db_field['twelthPercent'];
						}
					?>
                </li>
				<li>
                    Contact -
					<?php
						$result = mysqli_query($con,"SELECT phone FROM student where USN = '$uname';");
						while($db_field=mysqli_fetch_assoc($result))
						{
							echo $db_field['phone'];
						}
					?>
                </li>
                <li>
                    <a href="#">Update?</a>
                </li>
                
            </ul>
        </div>-->
        <!-- /#sidebar-wrapper 
		<div id="page-content-wrapper">
-->        
		<div class="navbar navbar-inverse" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
			<!--	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Profile</a>
                    <span class="genericon genericon-menu"></span>
                </a>-->
			<!--	<div alt="f419" class="genericon genericon-menu"></div>
        -->
           <a class="navbar-brand" href="#"><img src="images/rvce.jpg" class="img-circle" class="img-responsive" id="logo"></a>
		
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="edit-profile.php" >Edit Profile</a></li>
                    <li><a href="" data-toggle="modal" data-target="#basicModal">Change Password?</a></li>
                    <li><a href="php/logout.php">Logout</a></li>
                    
                </ul>
            </div>
           
        </div>
        </div>
	<!--	</div>-->
        

		<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Change Password</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal">
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
			</form>
								
        </div>
        <div class="modal-footer">
        <a href="#" style="position:relative; float:left">Forgot password?</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
        </div>
    	</div>
  		</div>
		</div>









        <!-- Page Content 
		<div id="page-content-wrapper">-->
		<div id="body-content">
		<h4 class="panel-heading">
        <strong>Today's Company</strong>
        </h4>
		
		<?php
		$result = mysqli_query($con,"SELECT branch FROM student where USN = '$uname';");
		$date = date('Y-m-d');
		
		$db_field=mysqli_fetch_assoc($result);
		$branch = $db_field['branch'];
	//	$result = mysqli_query($con,"SELECT * FROM company where name in (select b.name from dateofvisit as d , brancheseligible as b where d.date = '$date' and b.branch = '$branch' )");
        $date = date('Y-m-d');
		$result = mysqli_query($con,"SELECT distinct c.* FROM company as c,dateofvisit as d, brancheseligible as b where c.NAME = d.name and c.name = b.name and d.date = '$date' and b.branch = '$branch';");
		
		if(mysqli_num_rows($result)==0)
		{
			echo "<div class=\"container-fluid col\" >";
			echo "No company today";
			echo "</div>";

		}
		else
		{
		
		while($db_field=mysqli_fetch_assoc($result))
		{
			//print_r($db_field);
			echo "<div class=\"container-fluid\" >";
			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Name:";
			$companyName = $db_field['NAME'];
			
			echo "<span style='color:blue;margin-left:10px;'>".$companyName."</span>";
			echo "</div>";
		
		
			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Date:"."</span>";
		
			$resultDates = mysqli_query($con,"SELECT * FROM dateofvisit where NAME = '".$companyName."'"); 
			while($db_field_dates=mysqli_fetch_assoc($resultDates))
			{
				echo "<span style='color:blue;margin-left:10px;'>".$db_field_dates['DATE'].", "."</span>";
			}
			echo "</div>";
		

			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Profile:";
			$resultProfile = mysqli_query($con,"SELECT * FROM jobprofile where NAME = '".$companyName."'"); 
			while($db_field_profile=mysqli_fetch_assoc($resultProfile))
			{
				echo "<span style='color:blue;margin-left:10px;'>".$db_field_profile['PROFILE'].", "."</span>";
			}
			echo "</div>";


			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">10th C/O:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['TENTHCUTOFF']."</span>";
			echo "</div>";

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">12th C/O:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['PUCCUTOFF']."</span>";
			echo "</div>";
		
			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">Diploma C/O:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['DIPLOMACUTOFF']."</span>";
			echo "</div>";
		
			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">CGPA:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['GPACUTOFF']."</span>";
			echo "</div>";
		
			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Package:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['PACKAGE']."LPA"."</span>";
			echo "</div>";



			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Register Before:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['lastDateReg']."</span>";
			echo "</div>";


			echo "<div class=\"col-md-6 col-sm-6 col-lg-6 col-xs-12 each\">Branches Eligible:";
			$resultBranches = mysqli_query($con,"SELECT * FROM brancheseligible where NAME = '".$companyName."'"); 
			while($db_field_branch=mysqli_fetch_assoc($resultBranches))
			{
				echo "<span style='color:blue;margin-left:10px;'>".$db_field_branch['BRANCH'].", "."</span>";
			}
			echo "</div>";



		
			
		/*echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\">Attachments:</div>
		<div class=\"col-md-3 col-sm-6 col-lg-3 col-xs-12 each1\"></div>
		<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each1\"></div>";*/
		
			//$resultEligibility = mysqli_query($con,"SELECT * FROM student where NAME = '".$uname."' and branch in (select branch	from brancheseligible where NAME = '".$companyName."'"); 
			$resultEligibility = mysqli_query($con,"SELECT * FROM student where (USN = '".$uname."' and CGPA > ".$db_field['GPACUTOFF']." and tenthPercent > ".$db_field['TENTHCUTOFF']." and	twelthPercent > ".$db_field['PUCCUTOFF']." and diplomapercent > ".$db_field['DIPLOMACUTOFF'].") ");
			$numRows = mysqli_num_rows($resultEligibility);
			if($numRows!=0)
			{
				echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\"> <button type=\"button\" class=\"btn btn-success\">Registered</button></div>";
			}
			else
			{
				echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\"> <button type=\"button\" class=\"btn btn-danger\"> Not Eligible</button></div>";
			}
		echo "</div>";


		// if($numRows!=0)
		// {
			// echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\"> <button type=\"button\" class=\"btn btn-success\">Register</button></div>";
		// }
		// else
		// {
			// echo "<div class=\"col-md-1 col-sm-6 col-lg-1 col-xs-12 each1\"> <button type=\"button\" class=\"btn btn-danger\">Not eligible</button></div>";
		// }



		}
		}
		?>
		
		
		<h4 class="panel-heading">
        <strong>    Upcoming Companies</strong>
        </h4>
		<?php
		
		$result = mysqli_query($con,"SELECT branch FROM student where USN = '$uname';");
		$db_field=mysqli_fetch_assoc($result);
		$branch = $db_field['branch'];
        $date = date('Y-m-d');
        $result = mysqli_query($con,"SELECT distinct c.* FROM company as c,dateofvisit as d, brancheseligible as b where c.NAME = d.name and c.name = b.name and d.date > '$date' and b.branch = '$branch';");

        //$result = mysqli_query($con,"SELECT * FROM company where name in (select b.name from dateofvisit as d , brancheseligible as b where d.date > curdate() and b.branch = '$branch' )");
		
		
		while($db_field=mysqli_fetch_assoc($result))
		{
			//print_r($db_field);
			echo "<div class=\"container-fluid\" >";
		

			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Name:";
			$companyName = $db_field['NAME'];
			echo "<span style='color:blue;margin-left:10px;'>".$companyName."</span>";
			echo "</div>";


			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Date:"."</span>";
			$resultDates = mysqli_query($con,"SELECT * FROM dateofvisit where NAME = '".$companyName."'"); 
			while($db_field_dates=mysqli_fetch_assoc($resultDates))
			{
				echo "<span style='color:blue;margin-left:10px;'>".$db_field_dates['DATE'].", "."</span>";
			}
			echo "</div>";
		

			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Profile:";
			$resultProfile = mysqli_query($con,"SELECT * FROM jobprofile where NAME = '".$companyName."'"); 
			while($db_field_profile=mysqli_fetch_assoc($resultProfile))
			{
				echo "<span style='color:blue;margin-left:10px;'>".$db_field_profile['PROFILE'].", "."</span>";
			}
			echo "</div>";
		

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">10th C/O:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['TENTHCUTOFF']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">12th C/O:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['PUCCUTOFF']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">Diploma C/O:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['DIPLOMACUTOFF']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">CGPA:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['GPACUTOFF']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Package:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['PACKAGE']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Register Before:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['lastDateReg']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-6 col-sm-6 col-lg-6 col-xs-12 each\">Branches Eligible:";
			$resultBranches = mysqli_query($con,"SELECT * FROM brancheseligible where NAME = '".$companyName."'"); 
			while($db_field_branch=mysqli_fetch_assoc($resultBranches))
			{
				echo "<span style='color:blue;margin-left:10px;'>".$db_field_branch['BRANCH'].", "."</span>";
			}
			echo "</div>";
		

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\">Attachments:</div>
			<div class=\"col-md-3 col-sm-6 col-lg-3 col-xs-12 each1\"></div>
			<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each1\"></div>";
		
			//$resultEligibility = mysqli_query($con,"SELECT * FROM student where NAME = '".$uname."' and branch in (select branch	from brancheseligible where NAME = '".$companyName."'"); 
			$resultEligibility = mysqli_query($con,"SELECT * FROM student where (USN = '".$uname."' and CGPA > ".$db_field['GPACUTOFF']." and tenthPercent > ".$db_field['TENTHCUTOFF']." and	twelthPercent > ".$db_field['PUCCUTOFF']." and diplomapercent > ".$db_field['DIPLOMACUTOFF'].") ");
			$numRows = mysqli_num_rows($resultEligibility);
			if($numRows!=0)
			{
				echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\"> <button type=\"button\" class=\"btn btn-success\">Register</button></div>";
			}
			else
			{
				echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\"> <button type=\"button\" class=\"btn btn-danger\">Not eligible</button></div>";
			}
			echo "</div>";
		}
		?>
		
		
		
		<h4 class="panel-heading">
        <strong>    Past Companies</strong>
        </h4>
		
		
		<?php

        $date = date('Y-m-d');
        $result = mysqli_query($con,"SELECT distinct c.* FROM company as c,dateofvisit as d where c.NAME = d.name and d.date < '$date' and c.name not IN (SELECT distinct c.name FROM company as c,dateofvisit as d where c.NAME = d.name and d.date > '$date');");

        //$result = mysqli_query($con,"SELECT * FROM company where name in (select name from dateofvisit where date < curdate())");
		
		
		while($db_field=mysqli_fetch_assoc($result))
		{
			//print_r($db_field);
			echo "<div class=\"container-fluid\" >";
		
			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Name:";
			$companyName = $db_field['NAME'];
			echo "<span style='color:blue;margin-left:10px;'>".$companyName."</span>";
			echo "</div>";
	

			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Date:"."</span>";
			$resultDates = mysqli_query($con,"SELECT * FROM dateofvisit where NAME = '".$companyName."'"); 
			while($db_field_dates=mysqli_fetch_assoc($resultDates))
			{
				echo "<span style='color:blue;margin-left:10px;'>".$db_field_dates['DATE'].", "."</span>";
			}
			echo "</div>";
		

			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Profile:";
			$resultProfile = mysqli_query($con,"SELECT * FROM jobprofile where NAME = '".$companyName."'"); 
			while($db_field_profile=mysqli_fetch_assoc($resultProfile))
			{
				echo "<span style='color:blue;margin-left:10px;'>".$db_field_profile['PROFILE'].", "."</span>";
			}
			echo "</div>";
	

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">10th C/O:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['TENTHCUTOFF']."</span>";		
			echo "</div>";	
	

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">12th C/O:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['PUCCUTOFF']."</span>";
			echo "</div>";
	

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">Diploma C/O:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['DIPLOMACUTOFF']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each\">CGPA:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['GPACUTOFF']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Package:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['PACKAGE']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each\">Register Before:";
			echo "<span style='color:blue;margin-left:10px;'>".$db_field['lastDateReg']."</span>";
			echo "</div>";
		

			echo "<div class=\"col-md-6 col-sm-6 col-lg-6 col-xs-12 each\">Branches Eligible:";
			$resultBranches = mysqli_query($con,"SELECT * FROM brancheseligible where NAME = '".$companyName."'"); 
			while($db_field_branch=mysqli_fetch_assoc($resultBranches))
			{
				echo "<span style='color:blue;margin-left:10px;'>".$db_field_branch['BRANCH'].", "."</span>";
			}
			echo "</div>";
		

			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\">Attachments:</div>
			<div class=\"col-md-3 col-sm-6 col-lg-3 col-xs-12 each1\"></div>
			<div class=\"col-md-4 col-sm-6 col-lg-4 col-xs-12 each1\"></div>";
			//$resultEligibility = mysqli_query($con,"SELECT * FROM student where NAME = '".$uname."' and branch in (select branch	from brancheseligible where NAME = '".$companyName."'"); 
			$resultEligibility = mysqli_query($con,"SELECT * FROM student where (USN = '".$uname."' and CGPA > ".$db_field['GPACUTOFF']." and tenthPercent > ".$db_field['TENTHCUTOFF']." and	twelthPercent > ".$db_field['PUCCUTOFF']." and diplomapercent > ".$db_field['DIPLOMACUTOFF'].") ");
			$numRows = mysqli_num_rows($resultEligibility);
			if($numRows!=0)
			{
			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\"> <button type=\"button\" class=\"btn btn-success\">Was Eligible</button></div>";
			}
			else
			{
			echo "<div class=\"col-md-2 col-sm-6 col-lg-2 col-xs-12 each1\"> <button type=\"button\" class=\"btn btn-danger\">Was not eligible</button></div>";
			}
			echo "</div>";
		}
		?>
		</div>
	</div>
        <!--</div>
         /#page-content-wrapper -->

   <!-- </div>-->
	
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
