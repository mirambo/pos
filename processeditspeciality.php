<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$client_id=$_GET['client_id'];

$c_name=mysql_real_escape_string($_POST['c_name']);
$block=mysql_real_escape_string($_POST['block']);
$c_address=mysql_real_escape_string($_POST['c_address']);
$c_town=mysql_real_escape_string($_POST['c_town']);
$cp_address=mysql_real_escape_string($_POST['cp_address']);
$telephone=mysql_real_escape_string($_POST['telephone']);
$email=mysql_real_escape_string($_POST['email']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
 
 

$sqlupdt= "UPDATE clients SET c_name='$c_name', block_id='$block',c_address='$c_address',c_town='$c_town',c_paddress='$cp_address',
c_phone='$telephone',contact_person='$contact_person',c_email='$email' where client_id='$client_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?home.php&editsubspeciality=editsubspeciality&client_id=$client_id&editsuccess=1");


mysql_close($cnn);

?>


