<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$exp_cat_id=mysql_real_escape_string($_POST['client']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$sqlrec="SELECT * FROM suppliers WHERE supplier_id='$exp_cat_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$exp_cat_name=$rowsrec->supplier_name;

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
$sql= "insert into supplier_refund values ('','$exp_cat_id','','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into supplier_refund values ('','$exp_cat_id','','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$date_paid','$cheq_drawer','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into supplier_refund values ('','$exp_cat_id','','$amount','$desc','$currency','$curr_rate','$mop','$transaction_code',
'$date_paid','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


$querylatelpo="select * from supplier_refund order by supplier_refund_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_payment_id=$rowslatelpo->supplier_refund_id;

$year=date('Y');
$tempnum=$latest_invoice_payment_id;
	if($tempnum < 10)
            {
              $receipt_no = "JSPSF000".$tempnum."/".$year;
		
			   
		 
			  
			  
            } else if($tempnum < 100) 
			{
             $receipt_no = "JSPSF00".$tempnum."/".$year;
		  
			 
	
            } else 
			{ 
			$receipt_no="JSPSF".$tempnum."/".$year; 	

			}
			
$sqllpono="UPDATE supplier_refund SET receipt_no='$receipt_no' where supplier_refund_id='$latest_invoice_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$transaction_descinv='Supplier Refund: '.$exp_cat_name;
$transaction_desclg='Supplier Refund : '.($exp_cat_name).' through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Supplier Refund : '.($exp_cat_name).' through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Supplier Refund : '.($exp_cat_name).' through Cash. Ref No : '.$ref_no;


$amnt_kshs=$amount*$curr_rate;








if ($mop==3)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','$amount','$amount','','$currency','$curr_rate','$date_paid','srf$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','$amount','$amount','','$mop','$our_bank','$currency','$curr_rate','$date_paid','srf$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sql4="INSERT INTO supplier_transactions VALUES('','$exp_cat_id','srf$latest_invoice_payment_id','$transaction_desclg','$currency',
'$curr_rate','-$amount','$date_paid')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

$sqlss="INSERT INTO accounts_payables_ledger VALUES('','$transaction_desclg','$amount','$amount', '', 
'$currency','$curr_rate','$date_paid','srf$latest_invoice_payment_id','','','')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

}

if ($mop==2)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descch','$amount','$amount','','$currency','$curr_rate','$date_paid','srf$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','$amount','$amount','','$mop','$our_bank','$currency','$curr_rate','$date_paid',','srf$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sql4="INSERT INTO supplier_transactions VALUES('','$exp_cat_id','srf$latest_invoice_payment_id','$transaction_descch','$currency',
'$curr_rate','-$amount','$date_paid')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

$sqlss="INSERT INTO accounts_payables_ledger VALUES('','$transaction_descch','-$amount','$amount', '', '$currency','$curr_rate','$date_paid','srf$latest_invoice_payment_id','','','')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());


}



if ($mop==1 || $mop==4)
{
$sqltranslg= "insert into cash_ledger values('','$transaction_desccas','$amount','$amount','','$currency','$curr_rate','$date_paid','srf$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sql4="INSERT INTO supplier_transactions VALUES('','$exp_cat_id','srf$latest_invoice_payment_id','$transaction_desccas','$currency',
'$curr_rate','-$amount','$date_paid')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());


$sqlss="INSERT INTO accounts_payables_ledger VALUES('','$transaction_desccas','-$amount','$amount', '', '$currency','$curr_rate','$date_paid','srf$latest_invoice_payment_id','','','')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

}







		
header ("Location:supplier_refund.php?addconfirm=1");





?>


