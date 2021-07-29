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
$mop=1;
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



$sql= "update purchase_returns set 
 	supplier_id='$sup', 
 	shipper_id='$ship_agency', 
  	date_generated='$date_from', 
 	currency='$currency', 
 	curr_rate='$curr_rate', 
 	freight_charge='$freight_charge', 
 	comments='$comments'

where purchase_returns_id='$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/*
if ($ship_agency=='5')
{

}
else
{

$sql= "update shippers_transactions set 
 	shipper_id='$ship_agency', 
	amount='$freight_charge',
  	currency='$currency', 
 	curr_rate='$curr_rate' 	

where order_code='shp$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update accounts_payables_ledger set 
 	amount='$freight_charge',
	credit='$freight_charge',
  	currency_code='$currency', 
 	curr_rate='$curr_rate' 	

where order_code='shp$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
*/



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated an Purchase Returns transaction trasaction')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:record_purchase_returns.php?order_code=$order_code");




								  


mysql_close($cnn);


?>


