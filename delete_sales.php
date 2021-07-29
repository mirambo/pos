<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['sales_id'];
$sales_code_id=$_GET['sales_code_id'];
$view=$_GET['view'];
$sales_type=$_GET['sales_type'];




$sql= "delete from sales where sales_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from inventory_ledger where order_code='sales$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from vat_ledger where order_code='vats$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted sales transactions details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



if ($view==1)
{
header ("Location:view_sales_trans.php?sales_code_id=$sales_code_id");
}
if ($view==2)
{
header ("Location:view_received_stock.php");
}

if ($sales_type=='c') 
{
header ("Location:generate_cash_sales.php");
}
if ($sales_type=='i') 
{
header ("Location:generate_invoice.php");
}


mysql_close($cnn);


?>


