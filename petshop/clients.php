<?php
include "Connection.php";
if(isset($_POST['btncst']))
{
	
$txttitle	= 	"-";
$txtname	= 	$_POST['txtname'];
$txtmobile	= 	$_POST['txtmobile'];
$txtaadhar	= 	$_POST['txtaadhar'];
$txtusername	= 	$_POST['txtusername'];
$txtpassword	= 	$_POST['txtpassword'];
$role = "User";

		$sql = "insert into clients set 						
						ClientId		=	NULL,
						Title		=	'$txttitle',
						Name		=	'$txtname',
						AadharNo	=	'$txtaadhar',
						Mobile		=	'$txtmobile',						
						Username	=	'$txtusername',
						Password	=	'$txtpassword'";
						
		$sql1 = "insert into login set 						
						username		=	'$txtusername',
						password		=	'$txtpassword',
						role	=	'$role'";

	
		if(mysqli_query($con,$sql)) 
		{
			if(mysqli_query($con,$sql1))
			{
				echo "
					<div class='alert alert-success'>
					<p><br></p><p><br></p><p><br></p>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Signup Success</b>
					</div>
				";
			}
			else
			{
				echo "
					<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>
						<b>Signup Failed</b>
					</div>
				";
			}
		}

}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online Pet Shop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body style="background-image:url(images/1.jpg);">
	<div class="navbar navbar-inverse navbar-fixed-top">
		
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Online Pet Shop</a>
			</div>
			<ul class="nav navbar-nav">

				<li><a href="index.php">Back</a></li>				
			</ul>
		
	</div>
	
	<div class="container-fluid">
	<p><br></p><p><br></p>
	<div class="row">
		
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">Clients Registrations Area</div>

					<div class="panel-body"> 
					
						<form method="post">
						<div class="row">
						
							
							
							<div class="col-md-12">
								<label for="Name">Name</label>
								<input type="text" id="txtname" name="txtname" class="form-control" required>
							</div>
							<div class="col-md-6">
								<label for="Name">Address</label>
								<input type="text" id="txtaadhar" name="txtaadhar" class="form-control" required>
							</div>
							
							<div class="col-md-6">
								<label for="Name">Mobile No</label>
								<input type="text" id="txtmobile" name="txtmobile" class="form-control" required>
							</div>
							<div class="col-md-6">
								<label for="Name">Username</label>
								<input type="text" class="form-control" id="txtusername" name="txtusername" required>
							</div>
							<div class="col-md-6">
								<label for="Name">Password</label>
								<input type="password" class="form-control" id="txtpassword" name="txtpassword" required>
							</div>
							
						</div>
												
																	
						<p></br></p>
						<div class="row">
							<div class="col-md-5"></div>
							<div class="col-md-6">
							<button id="btncst"  name="btncst" class="btn btn-success btn-sm">Signup</button>
							</div>
						</div>																		
						</div>
					</form>
					
				</div>
			</div>
			
			<div class="row">
							
			<div class="col-md-12">
				<?php include_once("footer.php");?>
			
			</div>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>		