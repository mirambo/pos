<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$cpd_id=$_GET['cpd_id'];
$university=mysql_real_escape_string($_POST['university']);
$country=mysql_real_escape_string($_POST['country']);
$date=mysql_real_escape_string($_POST['date']);
$venue=mysql_real_escape_string($_POST['venue']);
$topic=mysql_real_escape_string($_POST['topic']);
$total_part=mysql_real_escape_string($_POST['total_part']);
$male_part=mysql_real_escape_string($_POST['male_part']);
$female_part=mysql_real_escape_string($_POST['female_part']);
$facillitator=mysql_real_escape_string($_POST['facillitator']);
$sponsor1=mysql_real_escape_string($_POST['sponsor1']);
$sponsor2=mysql_real_escape_string($_POST['sponsor2']);
$sponsor3=mysql_real_escape_string($_POST['sponsor3']);
$remarks=mysql_real_escape_string($_POST['remarks']);
 
 

$sqlupdt= "UPDATE cdp SET institution_id='$university', country='$country',date='$date',vanue='$venue',topic='$topic',total_part='$total_part',male_part='$male_part',female_part='$female_part',facillitator='$facillitator',sponsor1='$sponsor1',sponsor2='$sponsor2',sponsor3='$sponsor3' ,remarks='$remarks' where cdp_id='$cpd_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?home.php&admineditcpd=admineditcpd&cpd_id=$cpd_id&editsuccess=1");


mysql_close($cnn);

?>


