<?php

include('Connections/fundmaster.php');

$outreach_record_id=$_GET['outreach_record_id'];



$sql= "delete from outreach_record where outreach_record_id='$outreach_record_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqld= "delete from diagnosis where outreach_record_id='$outreach_record_id'";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());

header ("Location:home.php?reports=reports&delconfirm=1");



mysql_close($cnn);


?>


