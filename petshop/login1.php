<?php 
session_start();
	if(!$_POST)
	{
		$_SESSION['uid'] = "";
		$_SESSION['uname'] = "";
		$_SESSION['role'] = "";
	}	
require "Connection.php";

if(isset($_POST['login']))
{
			$result = mysqli_query($con,"select * from login where username='$_POST[txtUserName]' and  password='$_POST[txtPWD]'")
				or die('Invalid User : '.mysqli_error());
			$norow=mysqli_num_rows($result);
			$hlocation="";
			if($norow>0)
			{
				$row=mysqli_fetch_array($result);
				$_SESSION['uname']= $row[1];
                $_SESSION['role']= $row[3];
				$_SESSION['uid']= $row[0];
				if($row[3]=='Admin')					
				{				
					header("location:MasterAdmin.php");
				}
				else if($row[3]=='User')
				{
					header("location:Masteruser.php");
				}
				else
				{
					header("location:index.php");
				}
			}
			else
			{
				echo "
					<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>
						<b>Username Or Password Wrong</b>
					</div>
				";
			}
		
			mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online  Pet Shop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body style="background-color:  #f7ddf0 ;">


<div class="row">

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Online Pet Shop</a>
				<img src="" class="navbar-image"/>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav"> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

</div>

<div class="container-fluid">
<div class="row">
<div class="row"><div class="col-md-12">
	
	</div></div>

				<div class="col-md-2"><div class="row"></div></div>
				<div class="col-md-8">
					<div class="table-responsive" align="center">
						<table class="table table-bordered" style="color:yellow;background-color:#000;width:350px;"  align"center">
														
							<form class="col-md-12" action="#" method="post">
							<tr><td colspan="2"><h4 align="center">Online  Pet Shop - Login Portal</h4></td></tr>
					 		<tr><td>UserName</td>
									<td><input type="text" class="form-control input-md" id="txtUserName" name="txtUserName" placeholder="Username">
								</td></tr>								
							<tr><td>Password</td>		
									<td><input type="password" class="form-control input-md" id="txtPWD" name="txtPWD" placeholder="Password">
								</td></tr>
							<tr><td colspan="2">											
									<button id="login" name="login" class="btn btn-primary btn-md btn-block">Sign In</button>
								</td></tr>

							</form>
						</table>
					</div>
				</div>
				<div class="col-md-2"><div class="row"></div></div>


</div>


<?php include_once("footer.php");?>
</div>
</body>
</html>