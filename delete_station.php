<?php
#include connection
include('Connections/fundmaster.php');

$id=$_GET['station_id'];





$sql= "delete from station where station_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:view_station.php? deleteconfirm=1");






mysql_close($cnn);


?>


