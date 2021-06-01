<?php 
session_start();
require_once("common/dbconnect.php");
require_once("common/function.php");
if(!isset($_SESSION['db2']))
{
	getDB2($web_id);
}
$db2=$_SESSION['db2'];
if(!isset($_SESSION['USER_ID']))
{
	header("location:login.php");
	exit();
}
else
{
	$user_id=$_SESSION['USER_ID'];
}
if(isset($_GET['i']) && $_GET['i'])
{
	$product_id=$_GET['i'];
}
else
{
	header("location:product-list.php");
	exit();
}
$product=getProduct($product_id);
$list_offer_id=checkOffer($product_id);
//print_r($list_offer_id);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--#=========== IZI toast plugin =============-->

<link rel="stylesheet" href="izitoast/dist/css/iziToast.min.css">
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
			border: 0px solid black;
			display: flex;
			align-items: flex-start;
			justify-content: flex-start;
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
			align-items: flex-start;
			justify-content: flex-start;
			margin-top: 20px;
		}
		.offer
		{
			margin-top: 50px;
		}
	</style>
</head>

<body>
	<?php require_once("include/header.php")?>
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10" style="margin: 70px;">
				<input type="hidden" id="ui" name="ui" value="<?php echo $_SESSION['USER_ID']?>"/>
				<div class="product">
					<img src="product/default_profile.png" width="400"/>
					<div class="product_content">
						<p><?php echo $product['product_name'];?>&nbsp;<span class="badge badge-danger"><?php echo $product['brand_name'];?></span><p>
						<p><?php echo "Rs ".$product['product_price'];?></p>
						<select id="qty">
						<?php 
						for($i=1;$i<=$product['product_qty'];$i++)
						{
						?>
							<option value="<?php echo $i;?>"><?php echo $i;?></option>	
						<?php
						}	
						?>
						</select>
						<div class="adjust-details">
						<button class="btn btn-primary buynow" data-pi="<?php echo $product_id?>" data-ui="<?php echo $user_id;?>" data-pnm="<?php echo $product['product_name'];?>" data-prc="<?php echo $product['product_price'];?>"
						data-bi="<?php echo $product['brand_id'];?>">Buy Now</button>
						</div>
					</div>
					<?php
					foreach($list_offer_id as $offer_id)
					{
						$offer_dtls="";
						$offer_dtls=getOfferDtls($offer_id);
						$offer_product=offerproduct($offer_id);
					?>
					<div class="offer">
					<div><?php echo $offer_dtls['offer_name']?></div>
					<div><?php echo $offer_product;?></div>
					<div><?php echo "Rs ".$offer_dtls['offer_price']?></div>
					<div class="adjust-details">
	<button class="btn btn-primary buyofferproduct" data-oi="<?php echo $offer_id?>" data-ui="<?php echo $user_id;?>" data-prc="<?php echo $offer_dtls['offer_price'];?>">Buy Now</button>
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
	
<!--#========================== Font Awesome JS ===================================================== --> 
    
<script src="https://kit.fontawesome.com/fd58adc4dc.js" crossorigin="anonymous"></script>
	
<!--#=========== IZI toast plugin =============-->

	<script src="izitoast/dist/js/iziToast.min.js"></script>
<script src="js/buynow.js"></script>
</body>
</html>