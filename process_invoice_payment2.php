<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$client_id=mysql_real_escape_string($_POST['client_id']);
$invoice_id=mysql_real_escape_string($_POST['invoice_id']);

foreach($_POST['invoice_id'] as $row=>$invoice_id)
{   
	$sales_code=mysql_real_escape_string($_POST['sales_code'][$row]);
    $amnt_paid=mysql_real_escape_string($_POST['amnt_paid'][$row]);
	$client_id=mysql_real_escape_string($_POST['client_id']);
	
    
//  Check Redudancy

/*$queryprof="select * from modules_submodules where module_id='$module_id' AND sub_module_id='$sub_module_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:assign_module_submodule.php?recordexist=1");

}
else
{*/
$sql= "insert into invoice_payments values ('','$sales_code','$client_id','$amnt_paid','$currency_code','$curr_rate','$mop',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:bepaid.php?client_id=$client_id&addconfirm=1&client_id=$client_id");

//}
}


mysql_close($cnn);


?>


