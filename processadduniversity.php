<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$block_name=mysql_real_escape_string($_POST['block_name']);

$queryprof="select * from donors where donor_name='$block_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?newunivesity=newunivesity&recordexist=1");

}
else
{

$sql= "insert into donors values ('','$block_name')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?newunivesity=newunivesity&adduniversityconfirm=1");

}

mysql_close($cnn);


?>


