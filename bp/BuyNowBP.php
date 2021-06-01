<?php
session_start();
require_once("../common/dbconnect.php");
require_once("../common/function.php");
header( 'content-type: application/json' );
if(!isset($_SESSION['db2']))
{
	getDB2($web_id);
}
$db2=$_SESSION['db2'];
$isError=0;
$err=array();
$redirect="";
$err['s']=$err['qty']=$err['pi']=$err['pnm']=$err['ui']=$err['prc']=$err['bi']="";
$err['e_qty']=$err['e_pi']=$err['e_pnm']=$err['e_ui']=$err['e_prc']=$err['e_bi']=$err['e_w']="";
$err['qty']=trim(addslashes($_POST['qty']));
$err['pi']=trim(addslashes($_POST['pi']));
$err['pnm']=trim(addslashes($_POST['pnm']));
$err['ui']=trim(addslashes($_POST['ui']));
$err['prc']=trim(addslashes($_POST['prc']));
$err['prc']=$err['qty']*$err['prc'];
$err['bi']=trim(addslashes($_POST['bi']));
if($err['qty']=="")
{
	$err['e_qty']="Blank!";
	$isError=1;
}
if($err['pi']=="")
{
	$err['e_pi']="Blank!";
	$isError=1;
}
if($err['pnm']=="")
{
	$err['e_pnm']="Blank!";
	$isError=1;
}
if($err['ui']=="")
{
	$err['e_ui']="Blank!";
	$isError=1;
}
if($err['prc']=="")
{
	$err['e_prc']="Blank!";
	$isError=1;
}
if($err['bi']=="")
{
	$err['e_bi']="Blank!";
	$isError=1;
}
if($err['ui']!="" && !getWalletAmount($err['ui']))
{
	$err['e_w']="Insufficient Balance!";
	$isError=1;
}
if($err['ui']!="" && getWalletAmount($err['ui']))
{
	$wallet_details=getWalletAmount($err['ui']);
	$err['w']=$wallet_details['wallet_amount'];
	if($wallet_details['wallet_amount']<$err['prc'])
	{
		$err['e_w']="Insufficient Balance!";
		$isError=1;
	}
}
if(!$isError)
{
	$quantity=trim(addslashes($_POST['qty']));
	$product_id=trim(addslashes($_POST['pi']));
	$product_name=trim(addslashes($_POST['pnm']));
	$user_id=trim(addslashes($_POST['ui']));
	$product_price=trim(addslashes($_POST['prc']));
	$product_price=$quantity*$product_price;
	$brand_id=trim(addslashes($_POST['bi']));
	$wallet_details="";
	$wallet_details=getWalletAmount($user_id);
	$wallet_amount=$wallet_details['wallet_amount'];
	$new_wallet_amount=$wallet_amount-$product_price;
	$sql2="update ".$db2.".wallet set wallet_amount='".$new_wallet_amount."' where user_id='".$user_id."'";
	$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
	if($res2)
	{
		$sql="insert into ".$db2.".payment set user_id='".$user_id."',amount='".$product_price."',status='success',payment_mode='wallet',payment_time='".time()."'";
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
		if($res)
		{
			$payment_id=mysqli_error($con);

			$sql1="insert into ".$db2.".order_details set 

			payment_id='".$payment_id."',

			user_id='".$user_id."',

			product_id='".$product_id."',

			price='".$product_price."',

			brand_id='".$brand_id."',

			qty='".$quantity."'";
			$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));

			if($res1)
			{
				$err['s']="Payment Successfull";
			}
		}
	}
	
}
echo json_encode(array('isError'=>$isError,'err'=>$err));