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
$err['s']=$err['email']=$err['pwd']="";
$err['e_email']=$err['e_pwd']=$err['e_msg']="";

$err['email']=trim(addslashes($_POST['email']));
$err['pwd']=trim(addslashes($_POST['pwd']));
if($err['email']=="")
{
	$err['e_email']="Blank!";
	$isError=1;
}
if($err['pwd']=="")
{
	$err['e_pwd']="Blank!";
	$isError=1;
}
if($err['email']!="" && $err['pwd']!="" && CheckUser($err['email'],$err['pwd'],"user")=="")
{
	$err['e_msg']="invalid email as password!";
	$isError=1;
}
if(!$isError)
{
	$email=trim(addslashes($_POST['email']));
	$pwd=trim(addslashes($_POST['pwd']));
	$user_details=CheckUser($email,$pwd,"user");
	$_SESSION['USER_ID']=$user_details['user_id'];
	$_SESSION['USER_NAME']=$user_details['name'];
	$_SESSION['USER_EMAIL']=$user_details['email'];
	$_SESSION['USER_PHONE']=$user_details['phone'];
	
	if(isset($_SESSION['USER_ID']) && isset($_SESSION['USER_NAME']) && isset($_SESSION['USER_EMAIL']) && isset($_SESSION['USER_PHONE']))
	{
		$redirect="product-list.php";
	}
}
echo json_encode(array('isError'=>$isError,'err'=>$err,'redirect'=>$redirect));