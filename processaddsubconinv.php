<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sub_contractor=mysql_real_escape_string($_POST['sub_contractor']);
$project=mysql_real_escape_string($_POST['project']);
$invoice_no=mysql_real_escape_string($_POST['invoice_no']);
$date_generated=mysql_real_escape_string($_POST['date_generated']);
$date_month=mysql_real_escape_string($_POST['date_month']);
$days_spent=mysql_real_escape_string($_POST['days_spent']);
$tom=mysql_real_escape_string($_POST['tom']);
$manhour=mysql_real_escape_string($_POST['manhour']);
$perdiem=mysql_real_escape_string($_POST['perdiem']);
$visa_charge=mysql_real_escape_string($_POST['visa_charge']);
$flight_charges=mysql_real_escape_string($_POST['flight_charges']);
$other_charges=mysql_real_escape_string($_POST['other_charges']);
$remarks=mysql_real_escape_string($_POST['remarks']);

$currency=2;
$sqlcurr="select * from currency where curr_id='2'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
//$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

$ttl_inv=mysql_real_escape_string($_POST['ttl_inv']);
$queryprof="select * from subcon_invoices where invoice_no='$invoice_no'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$numrowscomp=mysql_num_rows($resultsprof);
if ($numrowscomp>0)
{
header ("Location:home.php?subconinvoices=subconinvoices&recordexist=1");
}

else 
{
$sql= "insert subcon_invoices values ('','$sub_contractor','$project','$invoice_no','$tom','$days_spent','$manhour','$visa_charge','$perdiem',
'$flight_charges','$ttl_inv','$other_charges','$user_id','$date_generated','$date_month','$remarks',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqltrans= "insert into supplier_transactions values('','$sub_contractor','Subcontractor Invoice $invoice_no month $date_month ','$currency','$curr_rate','$ttl_inv',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('',' Subcontractor Invoice $invoice_no','$ttl_inv','$ttl_inv','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables (Subcontractor Invoice $invoice_no)','-$ttl_inv','','$ttl_inv','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','Subcontractor Invoice $invoice_no','$ttl_inv','','$ttl_inv','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into purchases_ledger values('','Subcontractor Invoice $invoice_no','$ttl_inv','$ttl_inv','','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



header ("Location:home.php?subconinvoices=subconinvoices&addconfirm=1");

}



mysql_close($cnn);


?>


