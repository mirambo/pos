<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$block_name=mysql_real_escape_string($_POST['block_name']); 


$id=$_GET['block_id'];

$sql= "update blocks set block_name='$block_name' where block_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated $block_name details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?edituniversity=edituniversity&block_id=$id&edituniversityconfirm=1");




mysql_close($cnn);


?>


