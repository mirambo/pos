<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['form_section_id'];
$section_name=mysql_real_escape_string($_POST['section_name']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);


 
$sqlupdt= "UPDATE form_sections SET form_section_name ='$section_name',	sort_order='$sort_order' WHERE form_section_id='$id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



header ("Location:home.php?editformsections=editformsections&form_section_id=$id&editsuccess=1");


mysql_close($cnn);

?>


