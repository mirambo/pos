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

$part_id=mysql_real_escape_string($_POST['part_id']);

$quantity=mysql_real_escape_string($_POST['item_quantity']);


$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);

$item_name=$rowsproj->item_name; 
$item_code=$rowsproj->item_code; 
$item_value=$rowsproj->curr_bp;
$item_amount=$quantity*$item_value;

$transaction_descinvent='Cost Of Production for item '.$item_name.' - '.$item_code.'';

$sqllpo="insert into requisition_item VALUES('','$booking_id','$job_card_id','$requisition_id','$part_id','$quantity','$item_amount','0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

$sqlprojc= "SELECT * from requisition_item order by requisition_item_id desc limit 1";
$resultsprojc= mysql_query($sqlprojc) or die ("Error $sqlprojc.".mysql_error());
$rowsprojc=mysql_fetch_object($resultsprojc);

$lat_reg_id=$rowsprojc->requisition_item_id ;


$sqlaccpay= "insert into inventory_ledger values('','$transaction_descinvent','-$item_amount',' ','$item_amount','7','1','$requisition_date','cop$lat_reg_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltrans= "insert into item_transactions values('','$part_id','$transaction_descinvent','-$quantity',NOW(),'cop$lat_reg_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into cost_of_production_ledger values('','$transaction_descinvent','$item_amount','$item_amount','','7','1','$requisition_date','cop$lat_reg_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added $quantity more $item_name as a cost of production items into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?viewhrforms=viewhrforms&requisition_id=$requisition_id&addpartconfirm=1");




mysql_close($cnn);

?>


