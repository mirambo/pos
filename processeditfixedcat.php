<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$fixed_cat_name=mysql_real_escape_string($_POST['fixed_cat_name']);
$dep_perc=mysql_real_escape_string($_POST['dep_perc']);



$id=$_GET['fixed_asset_category_id'];



$sql= "update fixed_asset_category set fixed_asset_category_name='$fixed_cat_name',fixed_asset_dep_perc='$dep_perc' 
where fixed_asset_category_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited fixed asset category details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_fixed_cat.php?fixed_asset_category_id=$id&updateconfirm=1");

mysql_close($cnn);


?>


