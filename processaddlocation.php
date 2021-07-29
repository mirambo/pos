<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$location_name=mysql_real_escape_string($_POST['location_name']);

$queryprof="select * from omlocations where omlocation_name='$location_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?omlocations=omlocations&recordexist=1");

}
else
{

$sql= "insert into omlocations values ('','$location_name')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?omlocations=omlocations&addconfirm=1");

}

mysql_close($cnn);


?>


