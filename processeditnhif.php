<?php

include('Connections/fundmaster.php');

$income_from=mysql_real_escape_string($_POST['income_from']);
$income_to=mysql_real_escape_string($_POST['income_to']);
$contribution_amount=mysql_real_escape_string($_POST['contribution_amount']);

$id=$_GET['nhif_block_id'];

$sql= "update nhif_block set nhif_max='$income_to',	nhif_min='$income_from',nhif_amount='$contribution_amount' where nhif_block_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited nhif details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_nhif.php?updateconfirm=1&nhif_block_id=$id");



mysql_close($cnn);


?>


