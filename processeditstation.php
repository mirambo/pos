<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$id=$_GET['station_id'];

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$account_cat_id=mysql_real_escape_string($_POST['parent_cat']);
$account_type_id=mysql_real_escape_string($_POST['sub_cat']);
$account_name=mysql_real_escape_string($_POST['account_name']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);
$account_desc=mysql_real_escape_string($_POST['account_desc']);

$sql= "update account set 
account_cat_id='$account_cat_id', 
account_type_id='$account_type_id', 
account_name='$account_name', 
sort_order='$sort_order', 
description='$account_desc'


where account_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




/* 
if ($account_type_id==2 || $account_cat_id==1)
{


$querycon="select * from shop where account_id='$id'";
$resultscon=mysql_query($querycon) or die ("Error: $querycon.".mysql_error());
$rowscon=mysql_num_rows($resultscon);

//$account_id=$rowscon->account_id;

if ($rowscon>0)
{

$sql2= "update shop set 
account_cat_id='$account_cat_id', 
account_type_id='$account_type_id', 
shop_name='$account_name', 

where account_id='$id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
}
else
{

$sql22= "insert into shop VALUES ('','$account_cat_id','$account_type_id','$id','','$account_name')";
$results22= mysql_query($sql22) or die ("Error $sql22.".mysql_error());

}

}
else
{

$sql2= "delete from shop 

where account_id='$id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

} */



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited chart of accounts details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_station.php?updateconfirm=1&account_id=$id");

mysql_close($cnn);


?>


