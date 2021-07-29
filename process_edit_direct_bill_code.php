<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=$_GET['order_code'];
$view=$_GET['view'];
$cs=$_GET['cs'];
$date_from=mysql_real_escape_string($_POST['date_from']); 
$sup=mysql_real_escape_string($_POST['sup']);
$ship_agency=mysql_real_escape_string($_POST['ship_agency']);
$mop=2;
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */

$comments=mysql_real_escape_string($_POST['comments']);
$freight_charge=mysql_real_escape_string($_POST['freight_charge']);


$query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;

$transaction_descinv="Freight Charges for Goods Supplied By:".$supp_name;



$sql= "update order_code_get set 
 	supplier_id='$sup', 
 	date_generated='$date_from', 
 	currency='$currency', 
 	curr_rate='$curr_rate', 
 	 	comments='$comments'

where order_code_id='$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated an LPO transaction trasaction')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:begin_invoice.php?order_code=$order_code");



								  


mysql_close($cnn);


?>


