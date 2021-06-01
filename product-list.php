<?php 
session_start();
require_once("common/dbconnect.php");
require_once("common/function.php");
if(!isset($_SESSION['db2']))
{
	getDB2($web_id);
}
$db2=$_SESSION['db2'];
$list_product=listProduct();
//print_r($list_product);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.headline
		{
			text-transform: uppercase;
			font-weight: 700;
			font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif";
			text-align: center;
			margin-top: 90px;
			font-size: 20px;
			width: 100%;
		}
		.adjust_button
		{
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.error
		{
			color:red;
			font-weight: 700;
			display: none;
		}
		.product
		{
			border: 1px solid black;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding-top: 20px;
		}
		.product_content
		{
			margin-top: 10px;
		}
		.adjust-details
		{
			min-height: 70px;
			display: flex;
			align-items: center;
			justify-content: center;
		}
	</style>
</head>

<body>
	<?php require_once("include/header.php")?>
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10" style="margin: 70px;">
				<div class="row">
					<?php
					foreach($list_product as $product){
					?>
					<div class="col-md-4" style="padding: 10px;">
						<div class="product">
							<img src="product/default_profile.png" width="200"/>
							<div class="product_content">
								<p><?php echo $product['product_name'];?>&nbsp;<span class="badge badge-danger"><?php echo $product['brand_name'];?></span><p>
								<p><?php echo "Rs ".$product['product_price'];?></p>
								<div class="adjust-details">
								<button class="btn btn-primary" onClick="window.location.href='product-details.php?i=<?php echo $product['product_id']?>'">Details</button>
								</div>
							</div>
						</div>
					</div>
					<?php 
					}
					?>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	<!--#========================== JQuery 3.5.1 ================================================= --> 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
	
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="js/login.js"></script>
</body>
</html>