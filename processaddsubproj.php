<?php

include ('includes/session.php');
include('Connections/fundmaster.php');

$project_name=mysql_real_escape_string($_POST['project']);
$subproject_name=mysql_real_escape_string($_POST['subproject_name']);
$subproject_code=mysql_real_escape_string($_POST['subproject_code']);
$desc=mysql_real_escape_string($_POST['desc']);
$start_date=mysql_real_escape_string($_POST['start_date']);
$end_date=mysql_real_escape_string($_POST['end_date']);


$sql= "insert into sub_projects values ('','$project_name','$subproject_code','$subproject_name','$desc','$start_date','$end_date','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:home.php?subspeciality=subspeciality&addinstofferconfirm=1");


mysql_close($cnn);


?>


