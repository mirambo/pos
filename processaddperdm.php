<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$currency=mysql_real_escape_string($_POST['currency']);
$per_dm_charge=mysql_real_escape_string($_POST['per_dm_charge']);


$sql= "insert into sub_area values ('','$currency','$per_dm_charge')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?perdm=perdm&addcdpconfirm=1");



mysql_close($cnn);


?>


