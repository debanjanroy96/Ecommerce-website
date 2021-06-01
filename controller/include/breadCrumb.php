<?php
$breachcrumb="";
$page_name= basename($_SERVER['PHP_SELF'], ".php");
if($page_name=="dashboard")
{
	$breachcrumb="Dashboard";
}
else if($page_name=="add-product")
{
	$breachcrumb="Add Product";
}
else if($page_name=="list-product")
{
	$breachcrumb="List Product";
}
else if($page_name=="list-client")
{
	$breachcrumb="List Client";
}
else if($page_name=="offer")
{
	$breachcrumb="Add Offer";
}
?>
<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2 ss-row">
				<div class="col-12">
					<ol class="breadcrumb float-left">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active"><?=$breachcrumb?></li>
					</ol>
				</div>
				<!-- /.col --> 
			</div>
			<!-- /.row --> 
		</div>
		<!-- /.container-fluid --> 
	</div>