<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$savings_name=mysql_real_escape_string($_POST['savings_name']);
$savings_amount=mysql_real_escape_string($_POST['savings_amount']);


$queryprof="select * from  savings where savings_name='$savings_name' and savings_amount='$savings_amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  

$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:home.php?savings=savings&recordexist=1");

}

else 

{

$sql= "insert into savings values ('','$savings_name','$savings_amount')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?savings=savings&addconfirm=1");

}

mysql_close($cnn);


?>


