<?php
session_start();
require_once("../../common/dbconnect.php");
require_once("../../common/function.php");
header( 'content-type: application/json' );
if(!isset($_SESSION['db2']))
{
	getDB2($web_id);
}
$db2=$_SESSION['db2'];
$isError=0;
$err=array();
$redirect="";
$err['p_name']=$err['price']=$err['qty']=$err['brand']=$err['e_p_name']=$err['e_price']=$err['e_qty']=$err['e_brand']="";
$err['p_name']=trim(addslashes($_POST['p_name']));
$err['price']=trim(addslashes($_POST['price']));
$err['qty']=trim(addslashes($_POST['qty']));
$err['brand']=trim(addslashes($_POST['brand']));
if($err['p_name']=="")
{
	$err['e_p_name']="Blank!";
	$isError=1;
}
if($err['price']=="")
{
	$err['e_price']="Blank!";
	$isError=1;
}
if($err['qty']=="")
{
	$err['e_qty']="Blank!";
	$isError=1;
}
if($err['brand']=="")
{
	$err['e_brand']="Blank!";
	$isError=1;
}
if(!$isError)
{
	$product_name=trim(addslashes($_POST['p_name']));
	$price=trim(addslashes($_POST['price']));
	$qty=trim(addslashes($_POST['qty']));
	$brand=trim(addslashes($_POST['brand']));
	
	$sql="insert into ".$db2.".product set 
	
	product_name='".$product_name."',
	
	product_price='".$price."',
	
	product_qty='".$qty."',
	
	brand_id='".$brand."'";
	
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if($res)
	{
		$err['s']="Product added successfully";
	}
}
echo json_encode(array('isError'=>$isError,'err'=>$err));