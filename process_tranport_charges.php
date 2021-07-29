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
$sql= "insert into transport_charges values ('','','$client_id','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into transport_charges values ('','','$client_id','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$date_drawn','$cheq_drawer','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into transport_charges values ('','','$client_id','$amount','$desc','$currency','$curr_rate','$mop','$transaction_code',
'$date_trans','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


$querylatelpo="select * from transport_charges order by transport_charges_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_payment_id=$rowslatelpo->transport_charges_id;

$year=date('Y');
$tempnum=$latest_invoice_payment_id;
	if($tempnum < 10)
            {
              $receipt_no = "LIBTR000".$tempnum."/".$year;
		
			   
		 
			  
			  
            } else if($tempnum < 100) 
			{
             $receipt_no = "LIBTR00".$tempnum."/".$year;
		  
			 
	
            } else 
			{ 
			$receipt_no="LIBTR".$tempnum."/".$year; 	

			}
			
$sqllpono="UPDATE transport_charges set receipt_no='$receipt_no' where transport_charges_id='$latest_invoice_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$transaction_descinv='Transport Payment: '.$receipt_no;
$transaction_desclg='Transport Charges through Bank Transfer. Ref No : '.$transaction_code;
$client_amnt=$amount*$curr_rate;

$sql4="INSERT INTO shippers_transactions VALUES('','$client_id','tcp$latest_invoice_payment_id','$transaction_descinv','-$amount','$currency',
'$curr_rate',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

if ($mop==2 || $mop==3)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descinv','-$amount','','$amount','$currency','$curr_rate',NOW(),'tcp$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
else
{
$sqltranslg= "insert into cash_ledger values('','$transaction_descinv','-$amount','','$amount','$currency','$curr_rate',NOW(),'tcp$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
$sqltranslg= "insert into accounts_payables_ledger values('','$transaction_descinv','-$amount','$amount','','$currency','$curr_rate',NOW(),'tcp$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

if ($mop==3)
{
$sqltranslg= "insert into bank_statement values('','$transaction_desclg','-$amount','','$amount','$mop','$our_bank','$currency','$curr_rate',NOW(),'tcp$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}





			


header ("Location:add_transport_expenses.php?addconfirm=1");





?>


