<?php

include('Connections/fundmaster.php');

$income_from=mysql_real_escape_string($_POST['income_from']);
$income_to=mysql_real_escape_string($_POST['income_to']);
$paye_rate=mysql_real_escape_string($_POST['paye_rate']);

$id=$_GET['paye_block_id'];

$sql= "update paye_block set paye_min='$income_from',paye_max='$income_to',paye_rate='$paye_rate' where paye_block_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited paye details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_paye.php?updateconfirm=1&paye_block_id=$id");



mysql_close($cnn);


?>


