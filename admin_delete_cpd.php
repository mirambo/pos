<?php

include('Connections/fundmaster.php');

$cpd_id=$_GET['cpd_id'];





$sql= "delete from cdp where cdp_id='$cpd_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?cpdreport=cpdreport&delconfirm=1");



mysql_close($cnn);


?>


