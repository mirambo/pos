<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['custom_clearance_id'];
$custom_clearance_desc=$_GET['custom_clearance_desc'];




$sql= "delete from custom_clearance where custom_clearance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from cash_ledger where transactions LIKE '%Cash Custom clearance Paid on $custom_clearance_desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from custom_clearance_ledger where transactions LIKE '%$custom_clearance_desc%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:view_custom.php? deleteconfirm=1");



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


