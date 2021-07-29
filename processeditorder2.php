<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['purchase_order_id'];
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$supplier_id=mysql_real_escape_string($_POST['supplier_id']);
$order_code=mysql_real_escape_string($_POST['order_code']);
$ship_agency=mysql_real_escape_string($_POST['ship_agency']);
$pay_term=mysql_real_escape_string($_POST['pay_term']);
$currency=mysql_real_escape_string($_POST['currency1']);
$prod_code=mysql_real_escape_string($_POST['prod_code']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);

$queryprof="select product_id from purchase_order where purchase_order_id='$id' and quantity='$qnty'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);
$product_id=$rowsprof->product_id;



//$sql= "update purchase_order set quantity='$qnty',vendor_prc='$vend_price',product_code='$prod_code' where purchase_order_id='$id'";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql1= "update purchase_order set quantity='$qnty',vendor_prc='$vend_price',product_code='$prod_code' where purchase_order_id='$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

$sqlpd="UPDATE products set curr_bp='$vend_price' where product_id='$product_id'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited saved P.O Transaction')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:view_lpos.php?purchase_order_id=$id");

//$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());
//echo $results;
//$count=mysql_num_rows($results);
//echo $count;
/*if (==1)
{
session_start();
$_SESSION['admin']= $adminusern;
/*
session_register("myusername");
session_register("mypassword");*/
/*header("Location:membersarea.php");
}
else
{*/
//header ("Location:adduser.php? createuserconfirm=1");
//echo "<p align='center'><font color='#FF0000' size='-1'>Wrong Username and Password.</font></p>";


mysql_close($cnn);


?>


