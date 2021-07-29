<?php

include('Connections/fundmaster.php');

$client_id=$_GET['client_id'];


$sql="delete from clients where client_id='$client_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?viewsubspeciality=viewsubspeciality&delconfirm=1");



mysql_close($cnn);


?>


