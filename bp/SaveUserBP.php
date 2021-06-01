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
$err['s']=$err['name']=$err['email']=$err['phone']=$err['pwd']="";
$err['e_name']=$err['e_email']=$err['e_phone']=$err['e_pwd']="";
$err['name']=trim(addslashes($_POST['name']));
$err['email']=trim(addslashes($_POST['email']));
$err['phone']=trim(addslashes($_POST['phone']));
$err['pwd']=trim(addslashes($_POST['pwd']));
if($err['name']=="")
{
	$err['e_name']="Blank!";
	$isError=1;
}
if($err['email']=="")
{
	$err['e_email']="Blank!";
	$isError=1;
}
if($err['phone']=="")
{
	$err['e_phone']="Blank!";
	$isError=1;
}
if($err['pwd']=="")
{
	$err['e_pwd']="Blank!";
	$isError=1;
}
if(!$isError)
{
	$name=trim(addslashes($_POST['name']));
	$email=trim(addslashes($_POST['email']));
	$phone=trim(addslashes($_POST['phone']));
	$pwd=trim(addslashes($_POST['pwd']));
	$sql="insert into ".$db2.".user set name='".$name."',email='".$email."',password='".$pwd."',phone='".$phone."',regdate='".time()."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con)."98375980495");
	if($res)
	{
		$err['s']="Registration Successfull";
		$redirect="login.php";
	}
}
echo json_encode(array('isError'=>$isError,'err'=>$err,'redirect'=>$redirect));