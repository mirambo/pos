<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$amnt_paid=mysql_real_escape_string($_POST['amount']);
$account=mysql_real_escape_string($_POST['account']);
$desc=mysql_real_escape_string($_POST['desc']);
//$transaction="Opening Balance";


//$sql= "insert into accounts_payables_ledger values ('','$transaction','$amount','','$amount','6','1',NOW(),'')";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$transaction_desclg="Bank Balance Adjustment, Reason:".$desc;

if ($account==1)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','-$amnt_paid','','$amnt_paid','6','1',NOW(),'')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
elseif ($account==2)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','$amnt_paid','$amnt_paid','','6','1',NOW(),'')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}

else
{

}





header ("Location:adjust_bank_ledger.php? addconfirm=1");



mysql_close($cnn);


?>


