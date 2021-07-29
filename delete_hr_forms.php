<?php

include('Connections/fundmaster.php');

$id=$_GET['hr_form_id'];

$sql= "delete from upload where id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?viewhrforms=viewhrforms&delconfirm=1");



mysql_close($cnn);


?>


