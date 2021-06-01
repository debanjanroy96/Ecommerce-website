<?php 
session_start();
require_once("common/dbconnect.php");
require_once("common/function.php");
if(!isset($_SESSION['db2']))
{
	getDB2($web_id);
}
$db2=$_SESSION['db2'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
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
	</style>
</head>

<body>
	<?php require_once("include/header.php")?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<label class="headline">Login</label>
				<form id="login">
					<div class="form-group">
						<label>email</label>
						<input type="text" class="form-control" id="email" name="email" autocomplete="off"/>
						<div class="error" id="e_email"></div>
					</div>
					<div class="form-group">
						<label>password</label>
						<input type="text" class="form-control" id="pwd" name="pwd" autocomplete="off"/>
						<div class="error" id="e_pwd"></div>
					</div>
					<div class="adjust_button">
						<button class="btn btn-primary login_btn">Login</button>
					</div>
				</form>
				<div class="error" id="e_msg"></div>
				<div class="adjust_button" style="margin-top: 20px;">
						<a href="registration.php">Create account</a>
				</div>
			</div>
			<div class="col-md-3"></div>
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