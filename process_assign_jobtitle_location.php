<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$omjob_title_id=mysql_real_escape_string($_POST['omjob_title_id']);
$omlocation_id=mysql_real_escape_string($_POST['omlocation_id']);





$sql= "insert into omjobtitle_locations values ('','$omjob_title_id','$omlocation_id','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlupdtc= "UPDATE omjob_titles SET status='1' where omjob_title_id='$omjob_title_id'";
$resultsupdtc= mysql_query($sqlupdtc) or die ("Error $sqlupdtc.".mysql_error());









header ("Location:home.php?titlelocation=titlelocation&addconfirm=1");





mysql_close($cnn);


?>


