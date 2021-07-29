<?php

include('Connections/fundmaster.php');

$paye_block_id=$_GET['paye_block_id'];

$sql= "delete from paye_block where paye_block_id='$paye_block_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?viewpayrollsettings=viewpayrollsettings&delconfirm=1");



mysql_close($cnn);


?>


