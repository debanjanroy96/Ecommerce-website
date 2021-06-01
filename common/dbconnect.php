<?php
$dbuser='root';
$dbpass='';
$dbname='ecommerce_website_admin';
$con=mysqli_connect("localhost",$dbuser,$dbpass,$dbname) or die(mysqli_connect_error($con)."Could not connect to database13");
if($con)
{
	$GLOBALS['con']=$con;
	$web_id=1;
}
?>