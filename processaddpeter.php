<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$ded_name=mysql_real_escape_string($_POST['ded_name']);
$ded_amount=mysql_real_escape_string($_POST['ded_amount']);


$queryprof="select * from  deductions where deduction_name='$ded_name' and deduction_amount='$ded_amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  

$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:home.php?deduction=deduction&recordexist=1");

}

else 

{

$sql= "insert into deductions values ('','$ded_name','$ded_amount')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?deduction=deduction&addconfirm=1");

}

mysql_close($cnn);


?>


