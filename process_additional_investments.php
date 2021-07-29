<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$client_id=mysql_real_escape_string($_POST['client']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

/* $queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate; */


$queryprodsup="select * from shares where shares_id='$client_id'";
$resultsprodsup=mysql_query($queryprodsup) or die ("Error: $queryprodsup.".mysql_error());
$rowsprodsup=mysql_fetch_object($resultsprodsup);
$supplier=$rowsprodsup->share_holder_name;


$exp_cat_name=$supplier;

$mop=mysql_real_escape_string($_POST['mop']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


if ($mop==1 || $mop==4)//cash or mpesa
{
$sql= "insert into additional_investments values ('','','$client_id','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into additional_investments values ('','','$client_id','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$date_drawn','$cheq_drawer','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into additional_investments values ('','','$client_id','$amount','$desc','$currency','$curr_rate','$mop','$transaction_code',
'$date_trans','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


$querylatelpo="select * from additional_investments order by additional_investments_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_payment_id=$rowslatelpo->additional_investments_id;

$year=date('Y');
$tempnum=$latest_invoice_payment_id;
	if($tempnum < 10)
            {
              $receipt_no = "BRSP000".$tempnum."/".$year;
		
			   
		 
			  
			  
            } else if($tempnum < 100) 
			{
             $receipt_no = "BRSP00".$tempnum."/".$year;
		  
			 
	
            } else 
			{ 
			$receipt_no="BRSP".$tempnum."/".$year; 	

			}
			
$sqllpono="UPDATE additional_investments set receipt_no='$receipt_no' where additional_investments_id='$latest_invoice_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

//$transaction_descinv='Supplier Payments Receipt: '.$receipt_no;
$transaction_descinv='Additionaly Investments for : '.$exp_cat_name;
$transaction_desclg='Additionaly Investments for  '.($exp_cat_name).' through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Additionaly Investments for  '.($exp_cat_name).' through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Additionaly Investments for '.($exp_cat_name).' through Cash. Ref No : '.$ref_no;

$client_amnt=$amount*$curr_rate;


if ($mop==2) //cheque
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descch','$amount','$amount ',' ','$currency','$curr_rate','$date_paid','addinv$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into shares_ledger values('','$transaction_descch','$amount','','$amount','$currency','$curr_rate','$date_paid','addinv$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','$amount','$amount ','','$mop','$our_bank','$currency','$curr_rate','$date_paid','addinv$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sql4="INSERT INTO shareholder_transactions VALUES('','$client_id','addinv$latest_invoice_payment_id','$transaction_descch','$currency',
'$curr_rate','$amount','$date_paid')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());






}

if ($mop==3) //transfer
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','$amount','$amount ',' ','$currency','$curr_rate','$date_paid','addinv$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into shares_ledger values('','$transaction_desclg','$amount','','$amount','$currency','$curr_rate','$date_paid','addinv$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','$amount','$amount ','','$mop','$our_bank','$currency','$curr_rate','$date_paid','addinv$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sql4="INSERT INTO shareholder_transactions VALUES('','$client_id','addinv$latest_invoice_payment_id','$transaction_desclg','$currency',
'$curr_rate','$amount','$date_paid')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());
}

if ($mop==1 || $mop==4) //cash
{
$sqltranslg= "insert into cash_ledger values('','$transaction_desccas','$amount','$amount ',' ','$currency','$curr_rate','$date_paid','addinv$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into shares_ledger values('','$transaction_desccas','$amount','','$amount','$currency','$curr_rate','$date_paid','addinv$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sql4="INSERT INTO shareholder_transactions VALUES('','$client_id','addinv$latest_invoice_payment_id','$transaction_desccas','$currency',
'$curr_rate','$amount','$date_paid')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());
}

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded Additional Statement for shareholder $exp_cat_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
			


header ("Location:additional_investments.php?addconfirm=1");





?>


