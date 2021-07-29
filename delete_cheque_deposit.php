<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['cheque_deposit_id'];
$expenses_desc=$_GET['expense_desc'];




$sql= "delete from cheque_deposits where cheque_deposit_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from bank_statement where sales_code='chqdep$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/*$sql= "delete from cash_ledger where transactions LIKE '%Cash Expenses Paid on $expenses_desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from expenses_ledger where transactions LIKE '%$expenses_desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted a cheque deposit record from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:view_cheque_deposits.php?deleteconfirm=1");



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


