<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=$_GET['order_code'];
$view=$_GET['view'];
$date_from=mysql_real_escape_string($_POST['date_from']); 
$source=mysql_real_escape_string($_POST['source']); 
$destination=mysql_real_escape_string($_POST['destination']); 
$receive=mysql_real_escape_string($_POST['receive']);
$release=mysql_real_escape_string($_POST['release']);


$comments=mysql_real_escape_string($_POST['comments']);



$query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;

$transaction_descinv="Freight Charges for Goods Supplied By:".$supp_name;



$sql= "update stock_transfer set 
 	transfer_date='$date_from', 
 	shop_from='$source', 
  	shop_to='$destination', 
 	releasing_person='$release', 
 	receiving_person='$receive', 
 	comments='$comments'

where stock_transfer_id='$order_code'";
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



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated an stock transfer transactions')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



if ($view==1)
{
header ("Location:view_lpo_trans.php?order_code=$order_code");
}
else
{
header ("Location:begin_stock_transfer.php?order_code=$order_code");
}



								  


mysql_close($cnn);


?>


