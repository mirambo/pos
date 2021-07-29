<?php

include('Connections/fundmaster.php');

$sub_speciality_id=$_GET['sub_speciality_id'];


$sql="delete from sub_speciality where sub_speciality_id='$sub_speciality_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?subspecialityreport=subspecialityreport&delconfirm=1");



mysql_close($cnn);


?>


