<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['fixed_asset_category_id'];





$sql= "delete from fixed_asset_category where fixed_asset_category_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a fixed asset category from the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:view_fixed_cat.php? deleteconfirm=1");






mysql_close($cnn);


?>


