<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$order_code=$_GET['order_code'];

$sql2prf="SELECT * FROM approved_lpo where order_code='$order_code'";
$resultsprf= mysql_query($sql2prf) or die ("Error $sql2prf.".mysql_error());
$rows_num=mysql_num_rows($resultsprf);

if ($rows_num>0)
{


}
else
{
	
//$lpo_no=$rowsprf->lpo_no;

$sql2="SELECT * FROM order_code_get where order_code_id='$order_code'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);
$lpo_no=$rows2->lpo_no;

$sql= "insert into approved_lpo values('','$order_code','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql3= "UPDATE order_code_get SET status='2' WHERE order_code_id='$order_code'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Approved LPO: No $lpo_no')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

}

header ("Location:pre_approve_lpo.php");

mysql_close($cnn);


?>


