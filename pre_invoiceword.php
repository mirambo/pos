<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$client_id=$_GET['client_id'];
$project_id=$_GET['project_id'];
$invoice_amount=$_GET['invoice_amount'];
$ttl_days=$_GET['ttl_days'];
$manhours_charges=$_GET['manhours_charges'];
$visa_charges=$_GET['visa_charges'];
$per_dm=$_GET['per_dm'];
$flight_charges=$_GET['flight_charges'];
$current_month=(Date("F Y"));
$contract_no=$_GET['contract_no'];
$currency=2;
$sqlcurr="select * from currency where curr_id='2'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
//$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

$queryprof="select * from invoices where client_id='$client_id' AND month_generated='$current_month' AND project_id='$project_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);
$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{
$profclient_id=$rowsprof->client_id;
$profinvoice_no=$rowsprof->invoice_no;
$profcontract_no=$rowsprof->contract_no;
$profdays_spent=$rowsprof->days_spent;
$profmanhours_amount=$rowsprof->manhours_amount;
$profvisa_charges=$rowsprof->visa_charges;
$profper_dem=$rowsprof->per_dem;
$profflight_charges=$rowsprof->flight_charges;
$profinvoice_ttl=$rowsprof->invoice_ttl;
$profuser_id=$rowsprof->user_id;



//$invoice_no=$rowsprof->invoice_no;

header ("Location:invoiceword.php?contract_no=$profcontract_no&client_id=$profclient_id&invoice_no=$profinvoice_no&invoice_amount=$profinvoice_ttl&ttl_days=$profdays_spent&manhours_charges=$profmanhours_amount&visa_charges=$profvisa_charges&per_dm=$profper_dem&flight_charges=$profflight_charges");

//header ("Location:home.php?invoice2=invoice2&client_id=$client_id");

}

else 
{

$sql= "insert invoices values ('','','$contract_no','$ttl_days','$manhours_charges','$visa_charges','$per_dm','$flight_charges','$invoice_amount',
'$client_id','$project_id','$user_id',NOW(),'$current_month','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

// generate billsheet number
$querylatelpo="select * from invoices order by invoice_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_id=$rowslatelpo->invoice_id;
$latest_date_generated=$rowslatelpo->date_generated;

$year=date('m-Y');


	$tempnum=$latest_invoice_id;
	if($tempnum < 10)
            {
              $invoice_no ="SIPET/MP/INV-00".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
			  
            } else if($tempnum < 100) 
			{
             $invoice_no ="SIPET/MP/INV-0".$tempnum."/".$year;
			  
			 
			 //echo $newnum;
            } else 
			{ 
			$invoice_no="SIPET/MP/INV-".$tempnum."/".$year; 
			  
			
			//echo $newnum;
			}
			
$sqllpono="UPDATE invoices set invoice_no='$invoice_no' where invoice_id='$latest_invoice_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$sqltrans= "insert into client_transactions values('','$client_id','Service invoice $invoice_no for month $month_generated','$invoice_amount',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Service invoice($invoice_no) for month $month_generated','-$invoice_amount','','$invoice_amount','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Receivables invoice $invoice_no','$invoice_amount','$invoice_amount','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','Service invoice $invoice_no for month $month_generated','$invoice_amount','$invoice_amount','','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','Service invoice($invoice_no) for month $month_generated','$invoice_amount','','$invoice_amount','$currency','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



header ("Location:invoiceword.php?contract_no=$contract_no&client_id=$client_id&invoice_no=$invoice_no&invoice_amount=$invoice_amount&ttl_days=$ttl_days&manhours_charges=$manhours_charges&visa_charges=$visa_charges&per_dm=$per_dm&flight_charges=$flight_charges");



}



mysql_close($cnn);


?>


