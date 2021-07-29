<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$core_comp=mysql_real_escape_string($_POST['core_comp']);
$indicator=mysql_real_escape_string($_POST['indicator']);
$desc=mysql_real_escape_string($_POST['desc']);
$target=mysql_real_escape_string($_POST['target']);





$sql= "insert into key_indicators values ('','$core_comp','$indicator','$desc','$target','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:home.php?payrollsettings=payrollsettings&addconfirm=1");




mysql_close($cnn);


?>


