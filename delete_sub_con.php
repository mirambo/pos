<?php

include('Connections/fundmaster.php');

$per_dm_charge_id=$_GET['per_dm_charge_id'];

$sql= "delete from per_dm_charges where per_dm_charge_id='$per_dm_charge_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?viewperdm=viewperdm&delconfirm=1");



mysql_close($cnn);


?>


