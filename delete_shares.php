<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['shares_id'];



$sqldel= "delete from shares where shares_id='$id'";
$resultsdel= mysql_query($sqldel) or die ("Error $sql.".mysql_error());


$querysh="select * from  shares where status='0'";
$resultssh=mysql_query($querysh) or die ("Error: $querysh.".mysql_error());
//$rowssh=mysql_fetch_object($resultssh);

if (mysql_num_rows($resultssh)>0)
{
while ($rowssh=mysql_fetch_object($resultssh))
{

$shares_amountdb=$rowssh->shares_amount;
$grnd_sharesdb=$grnd_sharesdb+$shares_amountdb;
}

}
$grnd_sharesdb;

//Percentage shares




$querylat="select * from  shares where status='0'";
$resultslat=mysql_query($querylat) or die ("Error: $querylat.".mysql_error());

if (mysql_num_rows($resultslat)>0)
{
while ($rowslat=mysql_fetch_object($resultslat))
{

$lat_shares_id=$rowslat->shares_id;
$indiv_shares_amount=$rowslat->shares_amount;
$perc=($indiv_shares_amount/$grnd_sharesdb*100).' ';

$sql= "update shares set perc_shares='$perc' where shares_id='$lat_shares_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

}






header ("Location:view_shares.php? deleteconfirm=1");



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


