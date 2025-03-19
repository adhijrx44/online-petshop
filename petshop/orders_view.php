<?php 
session_start();
require "Connection.php";
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
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
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="MasterAdmin.php" class="navbar-brand">Online Pet Shop</a>
			</div>
			<ul class="nav navbar-nav">
				
				<li><a href="products.php">Pet Master</a></li>	
					
				<li><a href="orders_view.php">Order List</a></li>
				<li><a href="delivery_view.php">Delivery</a></li>
				<li><a href="delivery_list.php">Delivery List</a></li>
				<li><a href="feedback_view.php">Feedbacks</a></li>				
				<li><a href="logout.php">Log Out</a></li>			
			</ul>
			<ul class="nav navbar-nav navbar-right">

				</li>
			</ul>			
		</div>
	</div>
	
	
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>

			<div class="col-md-10">
				<h2 align="center" style="color:#;"></h2>
				<div class="panel panel-primary">
					<div class="panel-heading"><h4 align="center">Clients Orders</h4></div>
					<div class="panel-body" style="background-color:#fff;"> 
						<form method="post">
					
									
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>Invoice Id</th>
						<th>Date</th>
						<th>Client Id</th>
						<th>User Name</th>
						
						<th>Product Id</th>
						<th>Product Name</th>
						
						<th>Qty</th>
						<th>Price</th>
						<th>Total</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
						$results = mysqli_query($con,"select * from cart3");
						while ($row=mysqli_fetch_array($results))
						{
							?>
							<tr>
								<td><?php echo $row['CartId']; ?></td>
								<td><?php echo $row['cart_date']; ?></td>
								<td><?php echo $row['ClientId']; ?></td>
								<td><?php echo $row['Client_User_Name']; ?></td>
								
								
								<td><?php echo $row['Model_Id']; ?></td>
								<td><?php echo $row['Model_No']; ?></td>
								
								<td><?php echo $row['qty']; ?></td>								
								<td><?php echo $row['Total_Price']; ?></td>								
								<td><?php echo $row['NetPrice']; ?></td>								
																								
							</tr>							
					<?php 
						}
					?>

				</tbody>
			</table>						
					
											
																		
						<p></br></p>
																								
						</div>
					</form>
					<?php include_once("footer.php");?>
				</div>
				
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>

	
	
	