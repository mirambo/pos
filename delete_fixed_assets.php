<?php
#include connection
include('Connections/fundmaster.php');

$id=$_GET['fixed_asset_id'];
//$fa_name=$_GET['fa_name'];

$sql= "delete from fixed_assets where fixed_asset_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from accounts_payables_ledger where order_code='fixeda$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from fixed_assets_ledger where order_code='fixeda$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a fixed asset from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:view_fixed_assets.php? deleteconfirm=1");




mysql_close($cnn);


?>


