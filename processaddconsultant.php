<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$comp_name=mysql_real_escape_string($_POST['comp_name']);
$desc=mysql_real_escape_string($_POST['desc']);




$sql= "insert core_competence values ('','$comp_name','$desc','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?omconsultants=omconsultants&addconfirm=1");





mysql_close($cnn);


?>


