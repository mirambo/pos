<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$account_cat_id=mysql_real_escape_string($_POST['parent_cat']);
$account_type_id=mysql_real_escape_string($_POST['sub_cat']);
$account_name=mysql_real_escape_string($_POST['account_name']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);
$account_desc=mysql_real_escape_string($_POST['account_desc']);


$sql= "insert into account values ('','$account_cat_id','$account_type_id','$account_name','$sort_order','$account_desc',NOW(),'$user_id','0','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if ($account_type_id==2 || $account_cat_id==1)
{

$querycon="select * from account order by account_id desc limit 1";
$resultscon=mysql_query($querycon) or die ("Error: $querycon.".mysql_error());
$rowscon=mysql_fetch_object($resultscon);

$account_id=$rowscon->account_id;

$sql22= "insert into shop VALUES ('','$account_cat_id','$account_type_id','$account_id','','$account_name')";
$results22= mysql_query($sql22) or die ("Error $sql22.".mysql_error());

}




header ("Location:add_station.php? addnhifconfirm=1");





mysql_close($cnn);


?>


