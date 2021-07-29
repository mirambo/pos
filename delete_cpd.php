<?php

include('Connections/fundmaster.php');

$per_hour_charge_id=$_GET['per_hour_charge_id'];

$sql= "delete from per_hour_charge where per_hour_charge_id='$per_hour_charge_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?viewcdp=viewcdp&delconfirm=1");



mysql_close($cnn);


?>


