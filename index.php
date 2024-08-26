<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"SELECT ID from admin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Login Failed !!";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vehicle Parking System for VIT College </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<style>
  h2 {
    color: #333; /* set the text color to a darker shade */
    background-color: white ; /* set the background color to a highlightable shade */
    padding: 30px; /* add some padding to the heading to increase its visibility */
  }
</style>

<center><h2><b>Vehicle Parking System For VIT College</b></h2></center>

		
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Please Log In To Continue</div>
				<div class="panel-body">
					<form method="POST">
					<?php if($msg)
						echo "<div class='alert bg-danger' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 
                        

						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								
								<a href="forgot-password.php" style="text-decoration:none;">Forgot Password?</a>
							</div>
							<button class="btn btn-success" type="submit" name="login">Login</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
	<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<style>
		body {
			background-image: url("https://th.bing.com/th/id/R.87ed87623aa4a74611d3f9777a712077?rik=uQfw%2fXKnAcWacQ&riu=http%3a%2f%2fwww.collegesmba.in%2fwp-content%2fuploads%2f2020%2f10%2fVishwakarma-University-Pune-Admission-2021.jpg&ehk=pWps%2bbhH4%2fcwXUvQHVotQv8tbmHadEEAcCSrRWHJw4w%3d&risl=&pid=ImgRaw&r=0");
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body>
	<!-- Your website content here -->
</body>
</html>



<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>