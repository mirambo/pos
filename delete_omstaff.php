<?php

include('Connections/fundmaster.php');

$omstaff_id=$_GET['omstaff_id'];

$sql= "delete from omstaff where omstaff_id='$omstaff_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?viewomstaff=viewomstaff&delconfirm=1");



mysql_close($cnn);


?>


