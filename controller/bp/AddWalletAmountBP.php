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
$redirect="";
$isError=0;
$err=array();
$redirect="";
$err['ui']=$err['amount']=$err['e_ui']=$err['e_amount']="";
$err['ui']=trim(addslashes($_POST['ui']));
$err['amount']=trim(addslashes($_POST['amount']));
if($err['ui']=="")
{
	$err['e_ui']="Blank!";
	$isError=1;
}
if($err['amount']=="")
{
	$err['e_amount']="Blank!";
	$isError=1;
}
if(!$isError)
{
	$user_id=trim(addslashes($_POST['ui']));
	$amount=trim(addslashes($_POST['amount']));
	$wallet_details=getWalletAmount($user_id);
	if($wallet_details)
	{
		$current_wallet_amount=$wallet_details['wallet_amount'];
		$new_wallet_amount=$current_wallet_amount+$amount;
		$sql="update ".$db2.".wallet set wallet_amount='".$new_wallet_amount."' where user_id='".$user_id."'";
		$res=mysqli_query($con,$sql) or die(mysqli_error($con)."4867865095");
		if($res)
		{
			$err['s']="Wallet amount added successfully";
			$redirect="list-client.php";
		}
	}
	else
	{
		$new_wallet_amount=$amount;
		$sql="insert into ".$db2.".wallet set user_id='".$user_id."',wallet_amount='".$amount."'";
		$res=mysqli_query($con,$sql) or die(mysqli_error($con)."4867865095");
		if($res)
		{
			$err['s']="Wallet amount added successfully";
			$redirect="list-client.php";
		}	
	}
	if(strpos($new_wallet_amount,".")=="")
	{
		$new_wallet_amount=$new_wallet_amount.".00";
	}
}
echo json_encode(array('isError'=>$isError,'err'=>$err,'wallet_amount'=>$new_wallet_amount,'redirect'=>$redirect));