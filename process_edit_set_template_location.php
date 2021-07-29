<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
echo $location_id=mysql_real_escape_string($_POST['location_id']);
$cc_id=mysql_real_escape_string($_POST['cc_id']);
$sub_project_id=mysql_real_escape_string($_POST['sub_project_id']);
$set_template_id=mysql_real_escape_string($_POST['set_template_id']);

 
$sqlupdt= "UPDATE nrc_set_template SET location_id='$location_id' WHERE location_id='$location_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?viewsetuptemplate=viewsetuptemplate&location_id=$location_id&cc_id=$cc_id&sub_project_id=$sub_project_id&editsuccess=1");






mysql_close($cnn);

?>


