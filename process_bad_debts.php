<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_code=mysql_real_escape_string($_POST['sales_code']);
$client_id=mysql_real_escape_string($_POST['client_id']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency_code=mysql_real_escape_string($_POST['currency_code']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$reason=mysql_real_escape_string($_POST['reason']);
$invoice_no=mysql_real_escape_string($_POST['invoice_no']);

//$invoice_no=mysql_real_escape_string($_POST['invoice_no']);
//$bal=mysql_real_escape_string($_POST['bal']);
//$amnt_rec_sofar=mysql_real_escape_string($_POST['amnt_rec_sofar']);
//$invoice_id=$_GET['invoice_id'];

$current_month=(Date("F Y"));
//$exp_date=mysql_real_escape_string($_POST['exp_date']);
//$purchase_order_id=mysql_real_escape_string($_POST['purchase_order_id']);

$queryprof="select * from  bad_debts where sales_code='$sales_code' and  client_id ='$client_id' and amount='$amount' and reason='$reason'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
if ($numrowscomp>0)

{

header ("Location:receive_invoice_payment.php? recordexist=1");

}

else 

{



$sql= "insert into bad_debts values ('','$sales_code','$client_id','$amount','$reason','$currency_code','$curr_rate',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlpdt="update doubtful_debts set status='1' where sales_code='$sales_code'";
$resultspdt= mysql_query($sqlpdt) or die ("Error $sqlpdt.".mysql_error());


// Calcculations of commisions based on amount received from the client
   
// get %commision for the sales rep



//prevent redudancy in storing receipt



$transaction_desc='Doubtful Debts for Inv:'.$invoice_no;
$date = date('Y-m-d h:i:s');
$currentDate = strtotime($date);
$futureDate = $currentDate+(60*5);
$formatDate = date('Y-m-d h:i:s', $futureDate);



$queryred1="select * from  client_transactions where transaction ='$transaction_desc' AND date_recorded BETWEEN '$date' AND '$formatDate'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{
//echo "kweli";

}
else
{

$transaction_desclg='Sales receipt against Receipt No:'.$receipt_no;

$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','Bad Debt for Inv: $invoice_no','-$amount',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Writting Off Bad Debts Of Invoice $invoice_no','$amount','$amount','','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','A/R Writting Off Bad Debts Of Invoice $invoice_no','-$amount','','$amount','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error: $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','Writting Off Bad Debts Of Invoice $invoice_no','-$amount','','$amount','$currency_code','$curr_rate',NOW(),'$sales_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into doubtful_debts_ledger values('','Writting Off Bad Debts Of Invoice $invoice_no','-$amount','$amount','','$currency_code','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error: $sqlaccpay.".mysql_error());



}


}

header ("Location:bad_debts2.php?success=1");






mysql_close($cnn);


?>


