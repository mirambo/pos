<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$requisition_id=mysql_real_escape_string($_POST['requisition_id']);

$sqlproj= "SELECT * from requisition where requisition_id='$requisition_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$job_card_id=$rowsproj->job_card_id;
$booking_id=$rowsproj->booking_id;
$requisition_date=$rowsproj->requisition_date;

$booking_id=mysql_real_escape_string($_POST['booking_id']);
$requisition_item_id=mysql_real_escape_string($_POST['requisition_item_id']);
$part_id=mysql_real_escape_string($_POST['part_id']);
$item_quantity=mysql_real_escape_string($_POST['item_quantity']);
$item_value=mysql_real_escape_string($_POST['item_value']);
$currency=7;
$curr_rate=1;

$purchase_cost=$item_value*$item_quantity;


$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);

$item_name=$rowsproj->item_name; 
$item_code=$rowsproj->item_code; 
$item_value=$rowsproj->curr_bp;
$item_amount=$quantity*$item_value;

$transaction_descinvent='Cost Of Production for item '.$item_name.' - '.$item_code.'';

 
$sqlupdt= "UPDATE requisition_item SET item_id='$part_id',
item_quantity='$item_quantity',item_value='$item_value'

WHERE requisition_item_id='$requisition_item_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqltranslg= "UPDATE inventory_ledger SET 
transactions='$transaction_descinvent',
amount='-$purchase_cost',
credit='$purchase_cost',
currency_code='$currency',
curr_rate='$curr_rate',
date_recorded='$requisition_date'

WHERE order_code='cop$requisition_item_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqltranslg= "UPDATE cost_of_production_ledger SET 
transactions='$transaction_descinvent',
amount='$purchase_cost',
debit='$purchase_cost',
currency_code='$currency',
date_recorded='$requisition_date',
curr_rate='$curr_rate'

WHERE order_code='cop$requisition_item_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqltranslg= "UPDATE item_transactions SET
transaction='$transaction_descinvent',
item_id='$part_id', 
quantity='-$item_quantity'
WHERE transaction_code='cop$requisition_item_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());




$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update item $item_name recorded as cost of production')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?viewhrforms=viewhrforms&requisition_id=$requisition_id&editpartconfirm=1");




mysql_close($cnn);

?>


