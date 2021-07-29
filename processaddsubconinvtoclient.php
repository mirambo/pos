<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sub_contractor=mysql_real_escape_string($_POST['sub_contractor']);
$project=mysql_real_escape_string($_POST['project']);
//$invoice_no=mysql_real_escape_string($_POST['invoice_no']);
//$date_generated=mysql_real_escape_string($_POST['date_generated']);
//$date_month=mysql_real_escape_string($_POST['date_month']);
$days_spent=mysql_real_escape_string($_POST['days_spent']);
$tom=mysql_real_escape_string($_POST['tom']);
$manhour=mysql_real_escape_string($_POST['manhour']);
$perdiem=mysql_real_escape_string($_POST['perdiem']);
$visa_charge=mysql_real_escape_string($_POST['visa_charge']);
$flight_charges=mysql_real_escape_string($_POST['flight_charges']);
$other_charges=mysql_real_escape_string($_POST['other_charges']);
$remarks=mysql_real_escape_string($_POST['remarks']);
$month_generated=(Date("F Y"));

$currency=2;
$sqlcurr="select * from currency where curr_id='2'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
//$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

$invoice_amount=$manhour+$perdiem+$visa_charge+$flight_charges+$other_charges;

//$ttl_inv=mysql_real_escape_string($_POST['ttl_inv']);

//get client_id
$queryinst1="SELECT operations.operation_id, operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.client_id,projects.project_id
  FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id AND projects.project_id='$project'";
$resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
$rowsinst1=mysql_fetch_object($resultsinst1);
$client_id=$rowsinst1->client_id;
$contract_no=$rowsinst1->contract_no;


$queryprof="select * from subcon_invoices_to_client where month_generated='$month_generated'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$numrowscomp=mysql_num_rows($resultsprof);
if ($numrowscomp>0)
{
header ("Location:home.php?subconinvoicestoclient=subconinvoicestoclient&recordexist=1");
}

else 
{
$sql= "insert subcon_invoices_to_client values ('','$sub_contractor','$project','$invoice_no','$tom','$days_spent','$manhour','$visa_charge','$perdiem',
'$flight_charges','$invoice_amount','$other_charges','$user_id',NOW(),'$month_generated','$remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


//generate invoice number
$querylatelpo="select * from subcon_invoices_to_client order by invoice_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_id=$rowslatelpo->invoice_id;
$latest_date_generated=$rowslatelpo->date_generated;

$year=date('m-Y');


	$tempnum=$latest_invoice_id;
	if($tempnum < 10)
            {
              $invoice_no ="SIPET/SC/INV-00".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
			  
            } else if($tempnum < 100) 
			{
             $invoice_no ="SIPET/SC/INV-0".$tempnum."/".$year;
			  
			 
			 //echo $newnum;
            } else 
			{ 
			$invoice_no="SIPET/SC/INV-".$tempnum."/".$year; 
			  
			
			//echo $newnum;
			}
			
$sqllpono="UPDATE subcon_invoices_to_client set invoice_no='$invoice_no' where invoice_id='$latest_invoice_id'";
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



//header ("Location:print_subcon_invoice_to_client.php&invoice_no=$invoice_no&");

header ("Location:print_subcon_invoice_to_client.php?contract_no=$contract_no&client_id=$client_id&invoice_no=$invoice_no&invoice_amount=$ttl_inv&ttl_days=$days_spent&manhours_charges=$manhour&visa_charges=$visa_charge&per_dm=$perdiem&flight_charges=$flight_charges&other_charges=$other_charges&remarks=$remarks&sub_contractor=$sub_contractor");

}


mysql_close($cnn);


?>


