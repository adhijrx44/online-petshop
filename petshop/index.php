<?php
require_once "Connection.php";
$results = mysqli_query($con,"select * from products");

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
		<style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #da4812;
    }

    header {
      text-align: center;
      padding: 20px;
      background-color: #883a3a;
      color: white;
    }

    section {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 20px;
    }

    .menu-item {
      width: 300px;
      margin: 10px;
      background-color: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(183, 174, 174, 0.1);
      transition: transform 0.3s;
    }

    .menu-item:hover {
      transform: scale(1.05);
    }

    .menu-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .menu-item-info {
      padding: 15px;
    }

  </style>
	</head>
<body style="background-image:url(images/hero-bg6.jpg);">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Online Pet Shop</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="login1.php">Sign In</a></li>				
				<li><a href="clients.php">Register</a></li>				
			</ul>
			<ul class="nav navbar-nav navbar-right">
		
				

				
			</ul>			
		</div>
	</div>
	<p><br></p>
	
	<div class="container-fluid">
	<div class="row"><div class="col-md-12">
	
	</div></div>
		<div class="row">
			
			
			<section>
 <?php
 
 while($row = mysqli_fetch_array($results))
		{
			$prod_id=$row["id"];
			$prod_title=$row["ProductName"];
			$details=$row["Description"];
			
			$prod_image=$row["image_type"];
			echo "";
 
 ?>
          <div class="menu-item">
      <img src="uploads/<?php echo $prod_image; ?>" alt="Food Item 2"> 
      <div class="menu-item-info">
        <h3><?php echo $prod_title; ?></h3>
       <p><?php echo $details; ?></p>
       
        
      </div>
    </div>

 <?php
		}
	

?> 
    <br>

   
   

    
        </div>  
		
		</section>

			
		</div>
	</div>
</body>
</html>

<script>
$(document).ready(function(){
	
	product();
	function cat(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
			}
			
		})
	}
	
function product(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{getProduct_index:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
			
		})
	}		
	
$("body").delegate("#category","click",function(event){
	event.preventDefault();
	var cid = $(this).attr('cid');

		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
			}
			
		})
})	


$("body").delegate(".product","click",function(event){
event.preventDefault();
var p_id= $(this).attr('pid');
	
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{addToProduct:1,proId:p_id},
			success	:	function(data){
				alert(data);
			}
			
		})
		
})		

	
})

</script>