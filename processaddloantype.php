<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$loan_name=mysql_real_escape_string($_POST['loan_name']);
$loan_amount=mysql_real_escape_string($_POST['loan_amount']);


$queryprof="select * from  loans where loan_name='$loan_name' and default_amount='$loan_amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  

$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:home.php?loansav=loansav&recordexist=1");

}

else 

{

$sql= "insert into loans values ('','$loan_name','$loan_amount')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?loansav=loansav&addconfirm=1");

}

mysql_close($cnn);


?>


