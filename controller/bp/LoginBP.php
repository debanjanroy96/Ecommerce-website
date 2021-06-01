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
$err['s']=$err['email']=$err['pwd']=$err['e_email']=$err['e_pwd']="";
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
if($err['email'] && $err['pwd'] && CheckUser($err['email'],$err['pwd'],"login")=="")
{
	$err['e_msg']="Invalid user and password!";
	$isError=1;
}
if(!$isError)
{
	$email=trim(addslashes($_POST['email']));
	$password=trim(addslashes($_POST['pwd']));
	$user_details=CheckUser($email,$password,"login");
	$err['id']=$_SESSION['ID']=$user_details['login_id'];
	$err['name']=$_SESSION['NAME']=$user_details['name'];
	$err['email']=$_SESSION['EMAIL']=$user_details['email'];
	$err['phone']=$_SESSION['PHONE']=$user_details['mobile'];
	if(isset($_SESSION['ID']) && isset($_SESSION['NAME']) && isset($_SESSION['EMAIL']) && isset($_SESSION['PHONE']))
	{
		$redirect="dashboard.php";
	}
}
echo json_encode(array('isError'=>$isError,'err'=>$err,'redirect'=>$redirect));
?>