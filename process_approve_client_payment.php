<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
$invoice_payment_id=$_GET['invoice_payment_id'];
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$client_id=mysql_real_escape_string($_POST['client']);
//$sales_code_id=$_GET['sales_code_id'];
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

/* $queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate; */

$mop=mysql_real_escape_string($_POST['mop']);
//$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
$sales_rep=$user_id;

/*$sqltc="select employees.emp_id,employees.emp_firstname,employees.emp_lastname,user_group.user_group_name from users,user_group,
employees where users.user_group_id=user_group.user_group_id and users.emp_id=employees.emp_id and users.user_id='$sales_rep'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc);
$f_name=$rowstc->emp_firstname;
$f_lname=$rowstc->emp_lastname;
$emp_id=$rowstc->emp_id;*/







$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


$sqlrec="SELECT * FROM clients WHERE client_id='$client_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$invoice_no='N/A';
$exp_cat_name=$rowsrec->c_name;


$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$trans_src_bank=mysql_real_escape_string($_POST['trans_src_bank']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

$current_month=(Date("F Y"));


//$transaction_desc_comm='Commission Payment Due to Staff:'.$f_name.' '.$f_lname.' For Payment received from'.$c_name;



/*$sqlcomm_perc="select * from commisions where user_id='$sales_rep'";
$resultscomm_perc= mysql_query($sqlcomm_perc) or die ("Error $sqlcomm_perc.".mysql_error());
$rowscomm_perc=mysql_fetch_object($resultscomm_perc);

$comm_perc=$rowscomm_perc->comm_perc;
  
$comm_amount=$comm_perc/100*$amount;*/





//generate sales receipt number
$queryrec_p="select * from invoice_payments where invoice_payment_id='$invoice_payment_id'";
$resultsrec_p=mysql_query($queryrec_p) or die ("Error: $queryrec_p.".mysql_error());
$numrowsrec_p=mysql_fetch_object($resultsrec_p);
//$latest_id=$numrowsrec_p->invoice_payment_id;


$receipt_no = $numrowsrec_p->receipt_no;
			   
$sqlw= "insert into approved_client_payment values('','$invoice_payment_id','$user_id',NOW(),'0')";
$resultsw= mysql_query($sqlw) or die ("Error $sqlw.".mysql_error());      
	
$sqluprec_no="UPDATE invoice_payments set status='1' where invoice_payment_id='$invoice_payment_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());
$latest_id=$invoice_payment_id;

$queryred1="select * from  customer_transactions where transaction_code='crsp$latest_id'";
//$queryred1="select * from  client_transactions where transaction ='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{

$transaction_descinv='Customer Payment: ('.$exp_cat_name.')';
$transaction_desclg='Customer Payment ('.$exp_cat_name.') through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Customer Payment ('.$exp_cat_name.') through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Customer Payment ('.$exp_cat_name.') through Cash. Ref No : '.$ref_no;

$amnt_kshs=$amount*$curr_rate;




$sqltrans= "insert into customer_transactions values('','$client_id','$transaction_descinv','-$amnt_kshs','$date_paid','crsp$latest_id','$incharge','0','0')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

if ($mop==2)// cheque
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descch','$amount','$amount','','$currency','$curr_rate','$date_paid','crsp$latest_id','','','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','$amount','$amount','','$mop','$our_bank','$currency','$curr_rate',NOW(),'crsp$latest_id','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());



}

if ($mop==3)// electronic
{

$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','$amount','$amount','','$currency','$curr_rate','$date_paid','crsp$latest_id','','','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','$amount','$amount','','$mop','$our_bank','$currency','$curr_rate','$date_paid','crsp$latest_id','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


}

if ($mop==1 || $mop==4)// electronic
{

$sqltranslg= "insert into cash_ledger values('','$transaction_desccas','$amount','$amount','','$currency','$curr_rate','$date_paid','crsp$latest_id','','','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}


$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_descinv','-$amount','','$amount','$currency','$curr_rate','$date_paid','crsp$latest_id','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Received Payment from $c_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
}





header ("Location:pre_approve_customer_payments.php");
//header ("Location:sales_receipt.php?invoice_payment_id=$latest_id");

//}




mysql_close($cnn);


?>


