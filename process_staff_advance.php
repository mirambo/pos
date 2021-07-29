<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$client_id=mysql_real_escape_string($_POST['employee']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=6;
$install=mysql_real_escape_string($_POST['install']);

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;


$queryprodsup="select * from employees where emp_id='$client_id'";
$resultsprodsup=mysql_query($queryprodsup) or die ("Error: $queryprodsup.".mysql_error());
$rowsprodsup=mysql_fetch_object($resultsprodsup);
$supplier=$rowsprodsup->emp_firstname.' '.$rowsprodsup->emp_middle_name.' '.$rowsprodsup->emp_lastname;

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
$current_month=(Date("F Y"));


if ($mop==1 || $mop==4)//cash or mpesa
{
$sql= "insert into staff_advance values ('','','$client_id','$amount','$install','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','$current_month','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into staff_advance values ('','','$client_id','$amount','$install','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$date_drawn','$current_month','$cheq_drawer','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into staff_advance values ('','','$client_id','$amount','$install','$desc','$currency','$curr_rate','$mop','$transaction_code',
'$date_trans','$current_month','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


$querylatelpo="select * from staff_advance order by staff_advance_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_payment_id=$rowslatelpo->staff_advance_id;

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
			
$sqllpono="UPDATE staff_advance set receipt_no='$receipt_no' where staff_advance_id='$latest_invoice_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$transaction_descinv='Advance Payments made on'.$date_drawn.' '.$date_paid.' '.$date_trans;
$transaction_desc='Advance Payments To : '.$supplier;
//$client_amnt=$amount*$curr_rate;

$sql4="INSERT INTO staff_transactions VALUES('','$client_id','sadv$latest_invoice_payment_id','$transaction_descinv','$amount','$currency',
'$curr_rate',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());
/*
$sqltranslg="insert into cash_ledger values('','$transaction_desc','-$amount','','$amount','$currency','$curr_rate',NOW(),'sadv$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into prepaid_salary_ledger values('','$transaction_desc','$amount','$amount','','$currency','$curr_rate',NOW(),'sadv$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqlaccpay= "insert into purchases_ledger values('','$transaction_desc','$amount','$amount','','$currency','$curr_rate',NOW(),'sadv$latest_invoice_payment_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into pending_purchases_ledger values('','$transaction_desc','-$amount','','$amount','$currency','$curr_rate',NOW(),'sadv$latest_invoice_payment_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());	*/		


header ("Location:add_staff_advance.php?addconfirm=1");





?>


