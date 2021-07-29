<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$supplier_id=mysql_real_escape_string($_POST['supplier_id']);
$order_code=mysql_real_escape_string($_POST['order_code']);
$lpo_no=mysql_real_escape_string($_POST['lpo_no']);
$currency=mysql_real_escape_string($_POST['currency']);
$order_code=mysql_real_escape_string($_POST['order_code']);
$cost_of_stock=mysql_real_escape_string($_POST['cost_of_stock']);
//$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$amnt_paid_to_supplier=mysql_real_escape_string($_POST['amnt_paid_to_supplier']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$balance=mysql_real_escape_string($_POST['balance']);
$amnt_paid_sofar=mysql_real_escape_string($_POST['amnt_paid_sofar']);

$ttl_amnt_paid=$amnt_paid_sofar+$amnt_paid_to_supplier;
$date_paid=date('Y-m-d');
$curr_rate_now=mysql_real_escape_string($_POST['curr_rate_now']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$trans_src_bank=mysql_real_escape_string($_POST['trans_src_bank']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


//Update Currency Exchange rate for prvious transactions
$sqluc="UPDATE currency set curr_rate='$curr_rate_now' where curr_id='$currency'";
$resultsuc= mysql_query($sqluc) or die ("Error $sqluc.".mysql_error());




/*$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;*/




$queryprof="select * from  stock_payments where lpo_no='$lpo_no' and supplier_id='$supplier_id' and order_code='$order_code' and currency='$currency' and cost_of_stock='$cost_of_stock' and amnt_paid='$amnt_paid_to_supplier' and currency='$currency' and mop='$mop'
 and exchange_rate='$exchange_rate'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
  
if ($numrowscomp>0)

{


header ("Location:pay_stock.php?recordexist=1&lpo_no=$lpo_no&supplier_id=$supplier_id&order_code=$order_code&currency=$currency&amnt=$cost_of_stock");

}

elseif($amnt_paid_to_supplier > $cost_of_stock || $balance < $amnt_paid_to_supplier )
{
header ("Location:pay_stock.php?abnormal=1&lpo_no=$lpo_no&supplier_id=$supplier_id&order_code=$order_code&currency=$currency&amnt=$cost_of_stock");
}


else 

{

$queryprofrec="select * from  supplier_receipt where order_code='$order_code' and  supplier_id ='$supplier_id' and amnt_rec='$amnt_paid_to_supplier' and mop='$mop'";
$resultsprofrec=mysql_query($queryprofrec) or die ("Error: $queryprofrec.".mysql_error());
$numrowsrec=mysql_num_rows($resultsprofrec);
 
if ($numrowsrec>0)

{



}

else 
{

$sqlrecpt= "insert into supplier_receipt values ('','','$amnt_paid_to_supplier','$currency','$curr_rate','$mop','$cheque_no','$supplier_id','$order_code','$user_id',NOW(),'')";
$resultsrecpt= mysql_query($sqlrecpt) or die ("Error $sqlrecpt.".mysql_error());


//generate supplier receipt number
$queryrec_no="select * from supplier_receipt order by supplier_receipt_id desc limit 1";
$resultsrec_no=mysql_query($queryrec_no) or die ("Error: $queryrec_no.".mysql_error());

$numrowsrec_no=mysql_fetch_object($resultsrec_no);

$latest_id=$numrowsrec_no->supplier_receipt_id;

$year=date('Y');


	$tempnum=$latest_id;
	if($tempnum < 10)
            {
              $receipt_no = "BDPOR000".$tempnum."/".$year;
			   

            } else if($tempnum < 100) 
			{
             $receipt_no = "BDPOR00".$tempnum."/".$year;
			 			 
            } else 
			{ 
			 $receipt_no= "BDPOR".$tempnum."/".$year; 
			 	  
			}
			
$sqluprec_no="UPDATE supplier_receipt set receipt_no='$receipt_no' where supplier_receipt_id='$latest_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());


if ($mop=='Electronic Transfer')
{
$sql= "insert into stock_payments values ('','$lpo_no','$receipt_no','$cost_of_stock','$amnt_paid_to_supplier',
'$currency','$curr_rate_now','$mop','','$ref_no','$dep_bank','$trans_src_bank','$date_trans','$supplier_id','$order_code','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
if ($mop=='Cheque')
{
$sql= "insert into stock_payments values ('','$lpo_no','$receipt_no','$cost_of_stock','$amnt_paid_to_supplier',
'$currency','$curr_rate_now','$mop','$cheque_no','','','$cheq_drawer','$date_drawn','$supplier_id','$order_code','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
if ($mop=='Cash')
{
$sql= "insert into stock_payments values ('','$lpo_no','$receipt_no','$cost_of_stock','$amnt_paid_to_supplier',
'$currency','$curr_rate_now','$mop','','','','','','$supplier_id','$order_code','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}



//record supplier statement

//$transaction_desc="Receipt No:".$receipt_no;
$transaction_desc="PO payment Receipt No:".$receipt_no;


$queryred1="select * from  supplier_transactions where transaction='$transaction_desc' AND amount='$amnt_paid_to_supplier'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{

$sqltrans= "insert into supplier_transactions values('','$supplier_id','supay$latest_id','$transaction_desc','$currency','$curr_rate_now','-$amnt_paid_to_supplier',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltransw= "insert into cash_ledger values('','$transaction_desc','-$amnt_paid_to_supplier','','$amnt_paid_to_supplier','$currency','$curr_rate_now',NOW())";
$resultstransw=mysql_query($sqltransw) or die ("Error $sqltransw.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc','$amnt_paid_to_supplier','$amnt_paid_to_supplier','','$currency','$curr_rate_now',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc','-$amnt_paid_to_supplier','','$amnt_paid_to_supplier','$currency','$curr_rate_now',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_desc','-$amnt_paid_to_supplier','$amnt_paid_to_supplier','','$currency','$curr_rate_now',NOW(),'supay$latest_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());






}

header ("Location:supplier_receipt.php?lpo_no=$lpo_no&receipt_no=$receipt_no&amnt_rec=$amnt_paid_to_supplier&mop=$mop&supplier_id=$supplier_id&curr_id=$currency");

}

}



mysql_close($cnn);


?>


