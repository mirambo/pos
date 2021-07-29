<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$share_holder=mysql_real_escape_string($_POST['share_holder']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$next_of_kin=mysql_real_escape_string($_POST['next_of_kin']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$share_amount=mysql_real_escape_string($_POST['share_amount']);
$id=$_GET['shares_id'];



$sqlpd= "update shares set share_holder_name='$share_holder', contact_person='$contact_person',next_of_kin='$next_of_kin' where shares_id='$id'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated shares details for $share_holder')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_shares.php?shares_id=$id&updateconfirm=1");

mysql_close($cnn);


?>