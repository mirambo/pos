<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$amount=mysql_real_escape_string($_POST['amount']);
$transaction="Opening Balance";

$queryprof="select * from  purchases_ledger where transactions='$transaction'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:add_purchases_opening_balance.php? recordexist=1");

}

else 

{



$sql= "insert into purchases_ledger values ('','$transaction','$amount','$amount','','6','1',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());





header ("Location:add_purchases_opening_balance.php? addconfirm=1");

}

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


