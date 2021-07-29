<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['incurred_prepaid_expenses_id'];
$id2=$_GET['prepaid_expenses_id'];



$sql1= "DELETE FROM incurred_prepaid_expenses where incurred_prepaid_expenses_id='$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

$sql1= "DELETE FROM salary_expenses_ledger where order_code='incurprepexp$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

$sql1= "DELETE FROM prepaid_expenses_ledger where order_code='incurprepexp$id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a incurred prepaid expenses')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:view_incurred_prepaid_expenses.php?prepaid_expenses_id=$id2");





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


