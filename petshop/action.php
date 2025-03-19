<?php
session_start();
include "Connection.php";

if(isset($_POST["getProduct_index"]))
{
	$product_query = "select * from products  order by RAND() limit 0,6";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		while($row = mysqli_fetch_array($run_query))
		{
			$prod_id=$row["id"];
			$prod_modelNo=$row["ProductName"];			
			$prod_title=$row["BrandName"];			
			$prod_price=$row["Price"];			
			$prod_image=$row["image_type"];
			$prod_desc=$row["Description"];
			echo "	
				<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_modelNo - $prod_title</div>
									<div class='panel-body'>
										<img src='uploads/$prod_image' style='width:140px; height:100px;'/>
									</div>
									<div class='panel-heading'>$prod_price
										<p>$prod_desc</p>
									</div>
								</div>
				</div>
			";
		}
	}
}

if(isset($_POST["getProduct_admin"]))
{
	$product_query = "select * from products  order by RAND() limit 0,6";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		while($row = mysqli_fetch_array($run_query))
		{
			$prod_id=$row["id"];
			$prod_modelNo=$row["ProductName"];			
			$prod_title=$row["BrandName"];			
			$prod_price=$row["Price"];			
			$prod_image=$row["image_type"];
			$prod_desc=$row["Description"];
			echo "	
				<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_modelNo - $prod_title</div>
									<div class='panel-body'>
										<img src='uploads/$prod_image' style='width:140px; height:100px;'/>
									</div>
									<div class='panel-heading'>Price - $prod_price
										<p>$prod_desc</p>
									</div>
								</div>
				</div>
			";
		}
	}
}


if(isset($_POST["getProduct"]))
{
	$product_query = "select * from products order by RAND() limit 0,6";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		while($row = mysqli_fetch_array($run_query))
		{
			$prod_id=$row['id'];
			$prod_name=$row["ProductName"];			
			$prod_brand=$row["BrandName"];			
			$prod_price=$row["Price"];			
			$prod_image=$row["image_type"];
			$prod_desc=$row["Description"];
			echo "	
				<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-heading' style='color:yellow;background-color:#000;'><h3 >Name : $prod_name</h3></div>
									<div class='panel-body'>
										<img src='uploads/$prod_image' style='width:140px; height:100px;'/>
										
									</div>
									<button pid='$prod_id' style='float:right;background-color:#000;color:yellow;' id='product' class='btn btn-danger btn-xs'>AddToPurchase</button>
									<div class='panel-heading'>Price - $prod_price
									<p>$prod_desc</p>
										
									</div>
								</div>
				</div>
			";
		}
	}
}


if(isset($_POST["getProduct_selected"]))
{
	$uid = $_SESSION["uid"];
	$product_query = "select * from cart where user_id='$uid'";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		while($row = mysqli_fetch_array($run_query))
		{			
			$prod_title=$row["product_title"];			
			$prod_image=$row["product_image"];
			$prod_price=$row["price"];
			echo "	
				<div class='col-md-4'>
								
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_title</div>
									<div class='panel-body'>
										<img src='product_images/$prod_image' style='width:160px; height:250px;'/>
									</div>
									<div class='panel-heading'>$prod_price
								
									</div>
								</div>
				</div>
			";
		}
	}
}




if(isset($_POST["addToProduct"])){
	$p_id = $_POST["proId"];
	$user_id = $_SESSION["uid"];
	$user_name = $_SESSION["uname"];
	
	$sql = "select  * from cart where Model_Id = '$p_id' and ClientId= '$user_id'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0 )
	{
		echo "This Order Is Already Added";
	}
	else
	{
		$sql = "select  * from products where id = '$p_id'";
		$run_query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($run_query);
			$book_id = $row["id"];
			$book_title = $row["ProductName"];			
			$book_image = $row["image_type"];
			$book_price = $row["Price"];
			
			
			$qty=1;
			$sql = "insert into cart (CartId,ClientId,Client_User_Name,Model_Id,Model_No,Model_Title,Model_Image,Model_Price,qty,Total_Price,NetPrice)values(Null,'$user_id','$user_name','$book_id','$book_title','$book_title','$book_image','$book_price','$qty','$book_price','$book_price')";
			
			$sql_1 = "insert into cart3 (CartId,ClientId,Client_User_Name,Model_Id,Model_No,Model_Title,Model_Image,Model_Price,qty,Total_Price,NetPrice)values(Null,'$user_id','$user_name','$book_id','$book_title','$book_title','$book_image','$book_price','$qty','$book_price','$book_price')";			
			
			if(mysqli_query($con,$sql))
			{
				if(mysqli_query($con,$sql_1))
			{
				echo "
					<div class='alert alert-success'>
					<p><br></p><p><br></p>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Order Is Added</b>
					</div>
					";
			}
			}
	}
}

if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){
	$user_id = $_SESSION["uid"];
	$sql = "select  * from cart where ClientId = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
	if($count > 0 )
	{
			$no = 1;
			$total_amt =0;
			while($row = mysqli_fetch_array($run_query))
			{
				$id = $row["CartId"];
				$book_id = $row["Model_Id"];			
				$book_title = $row["Model_No"];			
				$book_image = $row["Model_Image"];
				$qty = 1;
				$book_price = $row["Model_Price"];
				$total_amnt = $row["Model_Price"];
				$price_array = array($total_amnt);
				$total_sum = array_sum($price_array);
				$total_amt = $total_amt + $total_sum;
				if(isset($_POST["get_cart_product"]))
				{
				echo "
							<div class='row'>
								<div class='col-md-3'>$no</div>
								<div class='col-md-3'>$book_title</div>
								<div class='col-md-3'><img src='uploads/$book_image' widht='30px' height='20px' ></img></div>
								<div class='col-md-3'>Price : $book_price</div>
							</div>
				";
				$no = $no + 1;					
				}
				else
				{
					echo "
					
					<div class='row'>
								<div class='col-md-2'>
									<div class='btn-group'>
										<a href='#' remove_id='$book_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
										<a href='#' update_id='$book_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
									</div>
								</div>
								<div class='col-md-2'><img src='uploads/$book_image' width='90px' height='50px'></img></div>
								<div class='col-md-2'>$book_title</div>
								
								
								<div class='col-md-2'><input type='text' class='form-control qty' pid='$book_id'  id='qty-$book_id' value='$qty'></div>
								
								<div class='col-md-2'><input type='text' class='form-control price' pid='$book_id' id='price-$book_id' value='$book_price' disabled></div>								
								<div class='col-md-2'><input type='text' pid='$book_id' class='form-control total' id='total-$book_id' value='$total_amnt' disabled></div>
							</div>
					
					";
				}

			}
			if(isset($_POST["cart_checkout"]))
			{
				echo "
							<div class='row'>
								<div class='col-md-8'></div>
								<div class='col-md-2'>
								<b><a href='cart_checkout.php' class='btn btn-success btn-md'>Checkout</a></b>
								</div>
								<div class='col-md-2'>
									<b>Total $total_amt</b>
								</div>
							</div>
				";
			}

}

if(isset($_POST["removeFromCart"])){
	$p_id = $_POST["rid"];
	$t = 2;
	$uid = $_SESSION["uid"];
	echo "
					<div class='alert alert-success'>
					<p><br></p><p><br></p>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product Is Removed From Cart</b>
					</div>
					";
}

if(isset($_POST["updateProduct"])){
	$uid = $_SESSION["uid"];
	$pid = $_POST["updateId"];
	$qty = $_POST["qty"];
	$price = $_POST["price"];
	$total = $_POST["total"];
	
	$sql = "update cart set Model_Price='$total' where ClientId='$uid' and Model_Id='$pid'";
	
	$run_query = mysqli_query($con,$sql);
	if($run_query)
	{
		echo "
					<div class='alert alert-success'>
					<p><br></p><p><br></p>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product Updated In Cart</b>
					</div>
					";
	}
}
}
?>