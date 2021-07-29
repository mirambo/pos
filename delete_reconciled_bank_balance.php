<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['reconciled_bank_balance'];
$bank=$_GET['bank_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
$out_bal=$_GET['out_bal'];




$sql= "delete from reconciled_bank_balance where reconciled_bank_balance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:view_reconciled_bank_balance.php?deleteconfirm=1&date_from=$date_from&date_to=$date_to&bank_id=$bank&out_bal=$out_bal");
 



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


