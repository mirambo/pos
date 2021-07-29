<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['temp_sales_id'];
$sales_code=$_GET['sales_code'];
$client_id=$_GET['client_id'];
$currency=$_GET['currency'];




$sql= "DELETE  FROM temp_sales where temp_sales_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql1= "DELETE FROM sales where temp_sales_id='$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a sales transactions')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:generate_invoice.php?client_id=$client_id&sales_code=$sales_code&currency=$currency");





//$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());
//echo $results;
//$count=mysql_num_rows($results);
//echo $count;
/*if (==1)
{
session_start();
$_SESSION['admin']= $adminusern;
/*
session_register("myusername");
session_register("mypassword");*/
/*header("Location:membersarea.php");
}
else
{*/
//header ("Location:adduser.php? createuserconfirm=1");
//echo "<p align='center'><font color='#FF0000' size='-1'>Wrong Username and Password.</font></p>";


mysql_close($cnn);


?>


