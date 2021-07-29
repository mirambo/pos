<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$fixed_asset_category_id=mysql_real_escape_string($_POST['fixed_asset_category_id']);

$sqldep="select * from fixed_asset_category where fixed_asset_category_id='$fixed_asset_category_id'";
$resultsdep= mysql_query($sqldep) or die ("Error $sqldep.".mysql_error());
$rowdep=mysql_fetch_object($resultsdep);
$dep_perc=$rowdep->fixed_asset_dep_perc;

$asset_name=mysql_real_escape_string($_POST['asset_name']);
$quantity=mysql_real_escape_string($_POST['quantity']);
$desc=mysql_real_escape_string($_POST['desc']);
$purchase_date=mysql_real_escape_string($_POST['purchase_date']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$value1=mysql_real_escape_string($_POST['value']);
//$useful_life=mysql_real_escape_string($_POST['useful_life']);
//$salvage_value=mysql_real_escape_string($_POST['salvage_value']);

$value=$value1*$quantity;
$dep_value=$dep_perc*$value/100;

$id=$_GET['fixed_asset_id'];

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
//$curr_rate=$rowcurr->curr_rate;

$transaction_desc="Purchase of fixed asset $asset_name";


$sql= "update fixed_assets set 
fixed_asset_name='$asset_name',
quantity='$quantity',
description='$desc',
date_purchased='$purchase_date',
currency='$currency',
curr_rate='$curr_rate',
value='$value1',
dep_value='$dep_value',
useful_life='$dep_perc',
fixed_asset_category_id ='$fixed_asset_category_id'


where fixed_asset_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "update fixed_assets_ledger set 
transactions='$transaction_desc', 
date_recorded='$purchase_date',
currency_code='$currency',
curr_rate='$curr_rate',
amount='$value', 
debit='$value' 
where order_code='fixeda$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update accounts_payables_ledger set 
amount='$value', 
date_recorded='$purchase_date',
currency_code='$currency',
curr_rate='$curr_rate',
transactions='$transaction_desc', 
credit='$value' 
where order_code='fixeda$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited fixed assets details for $asset_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:edit_fixed_assets.php?fixed_asset_id=$id&updateconfirm=1");


mysql_close($cnn);


?>