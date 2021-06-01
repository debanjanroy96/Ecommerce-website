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
$err['s']=$err['o_name']=$err['price']=$err['product']="";
$err['e_o_name']=$err['e_price']=$err['e_product']="";
$err['o_name']=trim(addslashes($_POST['o_name']));
$err['price']=trim(addslashes($_POST['price']));
$err['product']=trim(addslashes($_POST['product']));
$err['ui']=trim(addslashes($_POST['ui']));
if($err['o_name']=="")
{
	$err['e_o_name']="Blank!";
	$isError=1;
}
if($err['price']=="")
{
	$err['e_price']="Blank!";
	$isError=1;
}
if($err['product']=="")
{
	$err['e_product']="Blank!";
	$isError=1;
}
if($err['ui']=="")
{
	$err['e_ui']="Blank!";
	$isError=1;
}
if(!$isError)
{
	$user_id=trim(addslashes($_POST['ui']));
	$o_name=trim(addslashes($_POST['o_name']));
	$price=trim(addslashes($_POST['price']));
	$product=trim(addslashes($_POST['product']));
	$list_product=explode(",",$product);
	$sql="insert into ".$db2.".offer set offer_name='".$o_name."',user_id='".$user_id."',offer_price='".$price."',status='active',added_on='".time()."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con)."75587435986");
	if($res)
	{
		$err['oi']=$offer_id=mysqli_insert_id($con);
		foreach($list_product as $prod => $prod_id)
		{
			$sql1="insert into ".$db2.".offer_details set offer_id='".$offer_id."',product_id='".$prod_id."'";
			$res1=mysqli_query($con,$sql1) or die(mysqli_error($con)."75587435986");
			if($res1)
			{
				$err['s']="Offer added successfully";
			}
		}
	}
}
echo json_encode(array('isError'=>$isError,'err'=>$err));