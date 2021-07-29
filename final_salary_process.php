<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$payroll_id=$_GET['payroll_id'];
$queryprodsup="select * FROM payroll,employees,approved_payroll WHERE approved_payroll.payroll_id=payroll.payroll_id and 
payroll.emp_id=employees.emp_id and payroll.status='1' and approved_payroll.status='0' order by payroll.payroll_id desc";
$resultsprodsup=mysql_query($queryprodsup) or die ("Error: $queryprodsup.".mysql_error());
//$rowsprodsup=mysql_fetch_object($resultsprodsup);

if (mysql_num_rows($resultsprodsup) > 0)
						  {
							  
							  while ($rowsprodsup=mysql_fetch_object($resultsprodsup))
							  {
							  
$staff_name=$rowsprodsup->emp_firstname.' '.$rowsprodsup->emp_middle_name.' '.$rowsprodsup->emp_lastname;
$emp_id=$rowsprodsup->emp_id;
$payroll_id=$rowsprodsup->payroll_id;
$payment_month=$rowsprodsup->payment_month;
$amount=$rowsprodsup->net_pay;
$client_bank=$rowsprodsup->bank_name.' - '.$rowsprodsup->bank_branch_name.' - '.$rowsprodsup->bank_account_name.' - '.$rowsprodsup->bank_account_name;

$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=4;
$desc="Salary Payment for ".$staff_name." for the month of ".$payment_month;
//$date_trans=;


$sql= "insert into salary_payments values ('','$emp_id','$payroll_id','','$amount','$desc','6','1','3','$transaction_code',
NOW(),'$payment_month','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querylatelpo="select * from salary_payments order by salary_payment_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_payment_id=$rowslatelpo->salary_payment_id;

$year=date('Y');
$tempnum=$latest_invoice_payment_id;
	if($tempnum < 10)
            {
              $receipt_no = "PS000".$tempnum."/".$year;
		
			   
		 
			  
			  
            } else if($tempnum < 100) 
			{
             $receipt_no = "PS00".$tempnum."/".$year;
		  
			 
	
            } else 
			{ 
			$receipt_no="PS".$tempnum."/".$year; 	

			}
			
$sqllpono="UPDATE salary_payments set receipt_no='$receipt_no' where salary_payment_id='$latest_invoice_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$transaction_descinv='Salary Payment for the month of '.$payment_month;
$transaction_desc='Salary Payments To : '.$staff_name. ' For Month Of : '.$payment_month;
$client_amnt=$amount*$curr_rate;

$sql4="INSERT INTO staff_transactions VALUES('','$emp_id','payrol$payroll_id','$transaction_descinv','-$amount','$currency',
'$curr_rate',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

$sqltranslg= "insert into bank_ledger values('','$transaction_desc','-$amount','','$amount','$currency','$curr_rate',NOW(),'payrol$payroll_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into com_payables_ledger values('','$transaction_desc','-$amount','$amount','','$currency','$curr_rate',NOW(),'payrol$payroll_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqllpono1="UPDATE approved_payroll set status='1' where payroll_id='$payroll_id'";
$resultslpono1= mysql_query($sqllpono1) or die ("Error $sqllpono1.".mysql_error());
							  
							  
							  
							  }
							  
							  
							  } 




header ("Location:process_salary_payment.php?finished=1");





?>


