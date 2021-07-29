<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
 $consultant_id=$_GET['consultant_id'];

$cons_name=mysql_real_escape_string($_POST['cons_name']);
$cons_address=mysql_real_escape_string($_POST['cons_address']);
$cons_town=mysql_real_escape_string($_POST['cons_town']);
$cons_cp_address=mysql_real_escape_string($_POST['cons_cp_address']);
$cons_telephone=mysql_real_escape_string($_POST['cons_telephone']);
$cons_email=mysql_real_escape_string($_POST['cons_email']);
$cons_contact_person=mysql_real_escape_string($_POST['cons_contact_person']);
 
 

$sqlupdt= "UPDATE omconsultants SET 
cons_name='$cons_name',
cons_address='$cons_address',
cons_town='$cons_town',
cons_cp_address='$cons_cp_address',
cons_phone='$cons_telephone',
cons_contact_person='$cons_contact_person',
cons_email='$cons_email'

 where consultant_id='$consultant_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated subcontractor records')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?editsubcon=editsubcon&consultant_id=$consultant_id&editconfirm=1");


mysql_close($cnn);

?>


