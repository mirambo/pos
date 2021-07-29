<?php

include('Connections/fundmaster.php');

$omjobtitle_id=$_GET['omjobtitle_id'];

$sql= "delete from omper_day_rates where omjob_title_id='$omjobtitle_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?viewomrates=viewomrates&delconfirm=1");



mysql_close($cnn);


?>