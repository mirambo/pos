<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$payroll_id=$_GET['payroll_id'];
$queryprodsup="SELECT payroll.payment_month,payroll.emp_id,payroll.net_pay,employees.emp_firstname,employees.emp_middle_name,
employees.emp_lastname FROM payroll,employees where payroll.emp_id=employees.emp_id and payroll.payroll_id='$payroll_id'";
$resultsprodsup=mysql_query($queryprodsup) or die ("Error: $queryprodsup.".mysql_error());
$rowsprodsup=mysql_fetch_object($resultsprodsup);
$staff_name=$rowsprodsup->emp_firstname.' '.$rowsprodsup->emp_middle_name.' '.$rowsprodsup->emp_lastname;

$emp_id=$rowsprodsup->emp_id;
$payment_month=$rowsprodsup->payment_month;
$net_pay=$rowsprodsup->net_pay;


$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;




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
$sql= "insert into salary_payments values ('','$emp_id','$payroll_id','','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','$payment_month','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into salary_payments values ('','$emp_id','$payroll_id','','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$date_drawn','$payment_month','$cheq_drawer','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into salary_payments values ('','$emp_id','$payroll_id','','$amount','$desc','$currency','$curr_rate','$mop','$transaction_code',
'$date_trans','$payment_month','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


$querylatelpo="select * from salary_payments order by salary_payment_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_payment_id=$rowslatelpo->salary_payment_id;

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
			
$sqllpono="UPDATE salary_payments set receipt_no='$receipt_no' where salary_payment_id='$latest_invoice_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$transaction_descinv='Salary Payment for the month of '.$payment_month;
$transaction_desc='Salary Payments To : '.$staff_name. ' For Month Of : '.$payment_month;
$client_amnt=$amount*$curr_rate;

$sql4="INSERT INTO staff_transactions VALUES('','$emp_id','payrol$payroll_id','$transaction_descinv','-$amount','$currency',
'$curr_rate',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

$sqltranslg= "insert into cash_ledger values('','$transaction_desc','-$amount','','$amount','$currency','$curr_rate',NOW(),'payrol$payroll_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into com_payables_ledger values('','$transaction_desc','-$amount','$amount','','$currency','$curr_rate',NOW(),'payrol$payroll_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
	


header ("Location:print_payslip.php?payroll_id=$payroll_id");





?>


