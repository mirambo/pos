<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$paye_block_id=$_GET['paye_block_id'];

$income_from=mysql_real_escape_string($_POST['income_from']);
$income_to=mysql_real_escape_string($_POST['income_to']);
$rate=mysql_real_escape_string($_POST['rate']);
 
$sqlupdt= "UPDATE paye_block SET paye_max ='$income_to',paye_min='$income_from',paye_rate='$rate' WHERE paye_block_id='$paye_block_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?edittaxblock=edittaxblock&paye_block_id=$paye_block_id&editsuccess=1");


mysql_close($cnn);

?>


