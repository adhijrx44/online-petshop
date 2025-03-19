<?php 
session_start();

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
<body style="background-image:url(images/45.jpg);">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="Masteruser.php" class="navbar-brand">Online Pet Shop</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="Masteruser.php">Home</a></li>				
				<li><a href="cart_details.php">Order Details</a></li>	
				<li><a href="feedback.php">Feedbacks</a></li>				
				<li><a href="logout.php">Log out</a></li>	
			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li><a href="#"><?php echo "Hi ".$_SESSION["uname"]; ?></a></li>			
			</ul>			
		</div>
	</div>
	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
			

			<div class="col-md-12">
				
				
				


				
				<div class="panel panel-info">
					<div class="panel-heading"></div>
						<div class="panel-body">
						<form method="post">
							<div class="row">
								<div class="col-md-12">
									
							<h2 align="center" style="color:#cc9966;">Thank You - <?php echo $_SESSION['uname']; ?> - Your Products Will Be Delivered Within an Hour</h2>
							




							
							<p><br></p>
							
								
								
							
							
</div>

						</div>
						</form>
				</div>
			</div>
			
		</div>
		
	</div>
	<?php include_once("footer.php");?>
</body>
</html>

