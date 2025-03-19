<?php
require "Connection.php";
session_start();
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
}



if(isset($_POST['btndesigns']))
{         
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	$txtmeat	 	= 	$_POST['txtmeat'];
	$txtbrand		= 	"Meat";
	$txtdesc		= 	$_POST['txtdesc'];	
	$txtamt			= 	$_POST['txtamt'];	
		
	
	
		$sql = "insert into products set 
							id		=	Null,
						ProductName	=	'$txtmeat',
						BrandName	=	'$txtbrand',						
						Price		=	'$txtamt',												
						Description	=	'$txtdesc',
						image_type		=	'$file'";		
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
			if(mysqli_query($con,$sql))
			{
				echo "
					<div class='alert alert-success'>
					<p><br></p><p><br></p><p><br></p>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Products Added Successfully</b>
					</div>
				";
			}
			else
			{
				echo "
					<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>
						<b>Failed To Add Product</b>
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
<body style="background-color: #eeece0 ;">
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
	<p></b></p><p></b></p>

<div class="container-fluid">
<div class="row">

				<p></b></p><p></b></p>
				<div class="col-md-12">
				
				
				<div class="panel panel-info">
				<div class="panel-heading"style="text-align:center;background-color:#000;color:yellow;"><h2 >Pet Master</h2></div>
				<div class="panel-body">				
					
						<table class="table table-bordered">
							<form class="col-md-12" method="post" action="#" id="frmdesigns" enctype="multipart/form-data">
																					

							<table class="table table-bordered table-responsive">
					<tbody>
						<div class="form-group">
						<tr style="height="10px;">
							<td colspan="2">Product Name : <select name="txtmeat" id="txtmeat" class="form-control">
										<option value="">Select Pet Type</option>
										<option value="Cat">Cat</option>
										<option value="Dog">Dog</option>
										<option value="Parrot">Parrot</option>
										
									</select>
				
							</td>
							
							
						</tr>	
						<tr>
							
							<td>Price : <input type="text" name="txtamt" id="txtamt" class="form-control" required>
							<td colspan="2">Product Image : 	<input type="file" name="file" /></td>
						</tr>
						<tr>
								<td colspan="4">Details : <input type="text" name="txtdesc" multiline="true" id="txtdesc" class="form-control" required></td>						
						</tr>

						<tr>
							<td colspan="2"><button type="submit" id="btndesigns" name="btndesigns" class="btn btn-primary save center-block">Submit</button>		</td>
						</tr>
						</div>
					</tbody>	
				</table>		
							
							</form>
						</table>
					</div>
				</div>
				</div>
				</div>
				
</div>



<div class="row">
<div class="col-md-12">
<?php include_once("footer.php");?>

</div>
</div>

</body>
</html>