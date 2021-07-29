<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$per_dm_charge_id=$_GET['per_dm_charge_id'];

$currency=mysql_real_escape_string($_POST['currency']);

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate;
$per_dm_charge=mysql_real_escape_string($_POST['per_dm_charge']);


 
$sqlupdt= "UPDATE per_dm_charges SET curr_id ='$currency',curr_rate='$curr_rate',per_dm_charge_value='$per_dm_charge' WHERE per_dm_charge_id='$per_dm_charge_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?home.php&editperdm=editperdm&per_dm_charge_id=$per_dm_charge_id&editsuccess=1");


mysql_close($cnn);

?>


