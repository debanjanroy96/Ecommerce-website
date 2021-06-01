<?php
function getDB2($web_id) 
{
	$con=$GLOBALS['con'];
	$sql="select * from website_setting where website_id='".$web_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res))
	{
		$row=mysqli_fetch_assoc($res);
		$_SESSION['db2']=$row['website_name'];
	}
}
function CheckUser($email,$pwd,$table="login")
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$row="";
	if($table=="login")
	{
		$sql="select * from login where email='".$email."' and password='".$pwd."'";
	}
	else
	{
		$sql="select * from ".$db2.".user where email='".$email."' and password='".$pwd."'";
	}
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_assoc($res);
	}
	return $row;
}
function listBrand()
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$arr=array();
	$sql="select * from ".$db2.".brand";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con)."9847580640");
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res)){
		$arr[$row['brand_id']]=$row;
		}
	}
	return $arr;
}
function listProduct()
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$arr=array();
	$sql="select p.*,b.brand_name from ".$db2.".product p inner join ".$db2.".brand b on b.brand_id=p.brand_id";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con)."9847580640");
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			$arr[$row['product_id']]=$row;
		}
	}
	return $arr;
	
}
function listClient() 
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$arr=array();
	$sql="select * from ".$db2.".user";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con)."9847580640");
	if(mysqli_num_rows($res)>0)
	{
		$index=0;
		while($row=mysqli_fetch_assoc($res))
		{
			$arr[$index]=$row;
			$index++;
		}
	}
	return $arr;
}
function getUserByUserId($user_id)
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$sql="select u.*,w.* from ".$db2.".user u left join ".$db2.".wallet w on u.user_id=w.user_id where u.user_id='".$user_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_assoc($res);
	}
	return $row;
}
function getWalletAmount($user_id)
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$row="";
	$sql="select * from ".$db2.".wallet where user_id='".$user_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_assoc($res);
	}
	return $row;
}
function getProduct($product_id)
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$row="";
	$sql="select p.*,b.brand_name from ".$db2.".product p inner join ".$db2.".brand b on b.brand_id=p.brand_id where p.product_id='".$product_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con)."9847580640");
	if(mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_assoc($res);
	}
	return $row;
}
function checkOffer($product_id)
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$sql="select * from ".$db2.".offer_details where product_id='".$product_id."' group by offer_id";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con)."283504954565");
	if(mysqli_num_rows($res)>0)
	{
		$index=0;
		while($row=mysqli_fetch_assoc($res))
		{
			$arr[$index]=$row['offer_id'];
			$index++;
		}
	}
	return $arr;
	
}
function getOfferDtls($offer_id)
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$row="";
	$sql="select * from ".$db2.".offer where offer_id='".$offer_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con)."9847580640");
	if(mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_assoc($res);
	}
	return $row;
}
function offerproduct($offer_id)
{
	$con=$GLOBALS['con'];
	$db2=$_SESSION['db2'];
	$str="";
	$sql="select p.* from ".$db2.".offer_details od inner join ".$db2.".product p on od.product_id=p.product_id where offer_id='".$offer_id."'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con)."9847580640");
	$count=mysqli_num_rows($res);
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			if($count>1)
			{
				$str.=$row['product_name']." + ";
				$count--;
			}
			else
			{
				$str.=$row['product_name'];
				$count--;
			}
		}
	}
	return $str;
}
?>