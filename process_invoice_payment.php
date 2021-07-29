<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$sales_code_id=$_GET['sales_code_id'];
$bal_kshs=mysql_real_escape_string($_POST['bal_kshs']); 
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


$sqlrec="select sales_code.invoice_no,sales_code.sale_date,sales_code.sales_rep_id,sales_code.currency,sales_code.curr_rate,
sales_code.user_id,sales_code.sales_code_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,
sales_code.client_id,clients.c_name,currency.curr_name FROM currency,clients,sales_code,employees WHERE 
currency.curr_id=sales_code.currency and sales_code.sales_rep_id=employees.emp_id and sales_code.client_id=clients.client_id AND 
sales_code.sales_code_id='$sales_code_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$client_id=$rowsrec->client_id;
$invoice_no=$rowsrec->invoice_no;
$c_name=$rowsrec->c_name;

//to check vat for the invoice generated
$sqlrecvat="SELECT SUM(vat) as ttl_vat FROM sales where sales_code_id='$sales_code_id'";
$resultsrecvat= mysql_query($sqlrecvat) or die ("Error $sqlrecvat.".mysql_error());	
$rowsrecvat=mysql_fetch_object($resultsrecvat);

$ttl_vat=$rowsrecvat->ttl_vat;


if ($ttl_vat>0)
{

 $ded_vat=0.16*$amount;

 $amnt_comm=$amount-$ded_vat;

}
else
{

$amnt_comm=$amount;

}

//employee id not user id
$sales_rep_id=$rowsrec->sales_rep_id;

$sqltc="select employees.emp_firstname,employees.emp_lastname,user_group.user_group_name,users.user_id from users,user_group,
employees where users.user_group_id=user_group.user_group_id and users.emp_id=employees.emp_id and users.emp_id='$sales_rep_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc);
$salesrep_user_id=$rowstc->user_id;
$f_name=$rowstc->emp_firstname;
$l_name=$rowstc->emp_lastname;

$transaction_desc_comm='Commission Payable for Staff:'.$f_name.' '.$l_name;


/*


else 

{
*/
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$trans_src_bank=mysql_real_escape_string($_POST['trans_src_bank']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


if ($amount>$bal_kshs)
{

//$change=$amnt_paid-$bal_kshs;


header ("Location:receive_invoice_payment.php? abnormal=1&sales_code_id=$sales_code_id");

} 

else

{




if ($mop==1 || $mop==4)//cash or mpesa
{
$sql= "insert into invoice_payments values ('','$sales_code_id','$client_id','','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into invoice_payments values ('','$sales_code_id','$client_id','','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$date_drawn','$cheq_drawer','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into invoice_payments values ('','$sales_code_id','$client_id','','$amount','$desc','$currency','$curr_rate','$mop','$transaction_code',
'$date_trans','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
// Calcculations of commisions based on amount received from the client
   
// get %commision for the sales rep

$sqlcomm_perc="select * from commisions where user_id='$salesrep_user_id'";
$resultscomm_perc= mysql_query($sqlcomm_perc) or die ("Error $sqlcomm_perc.".mysql_error());
$rowscomm_perc=mysql_fetch_object($resultscomm_perc);

$comm_perc=$rowscomm_perc->comm_perc;
  
$comm_paid=$comm_perc/100*$amnt_comm;







//generate sales receipt number
$queryrec_p="select * from invoice_payments order by invoice_payment_id desc limit 1";
$resultsrec_p=mysql_query($queryrec_p) or die ("Error: $queryrec_p.".mysql_error());
$numrowsrec_p=mysql_fetch_object($resultsrec_p);
$latest_id=$numrowsrec_p->invoice_payment_id;

$year=date('Y');


	$tempnum=$latest_id;
	if($tempnum < 10)
            {
              $receipt_no = "BDSR000".$tempnum."/".$year;
			   

            } else if($tempnum < 100) 
			{
             $receipt_no = "BDSR00".$tempnum."/".$year;
			 			 
            } else 
			{ 
			 $receipt_no= "BDSR".$tempnum."/".$year; 
			 	  
			}
			

$sqluprec_no="UPDATE invoice_payments set receipt_no='$receipt_no' where invoice_payment_id='$latest_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());


$sqlreccom= "insert into commision_payments values ('','$sales_code_id','$latest_id','$salesrep_user_id','$comm_paid','$currency','$curr_rate',NOW(),'$current_month','','')";
$resultsreccom= mysql_query($sqlreccom) or die ("Error $sqlreccom.".mysql_error());


$queryred1="select * from  client_transactions where sales_code='crsp$latest_id'";
//$queryred1="select * from  client_transactions where transaction ='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{

$transaction_desclg='Invoice Payment Receipt No : ('.$receipt_no.') Received from '.$c_name;
$transaction_desc='Invoice Payment Receipt No:'.$receipt_no;

$amnt_kshs=$amount*$curr_rate;




$sqltrans= "insert into client_transactions values('','$client_id','crsp$latest_id','$transaction_desc','-$amnt_kshs',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into staff_transactions values('','$sales_rep_id','crsp$latest_id','$transaction_desc_comm','$comm_paid','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqltranslg= "insert into cash_ledger values('','$transaction_desclg','$amount','$amount','','$currency','$curr_rate',NOW(),'crsp$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','Accounts Receivables (Receipt No : $receipt_no)','-$amnt_paid','','$amnt_paid','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash ( Receipt No : $receipt_no)','$amnt_paid','$amnt_paid','','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desclg','-$amount','','$amount','$currency','$curr_rate',NOW(),'crsp$latest_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

/*$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_desc_comm','$comm_paid','','$comm_paid','$currency_code','$curr_rate',NOW(),'commpy$latest_idp')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());*/

$sqlaccpay= "insert into com_payables_ledger values('','$transaction_desc_comm','$comm_paid','','$comm_paid','$currency','$curr_rate',NOW(),'crsp$latest_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlss="INSERT INTO general_expenses_ledger VALUES('','$transaction_desc_comm','$comm_paid','$comm_paid', '', '$currency','$curr_rate',NOW(),'crsp$latest_id')";
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Received Invoice Payment with commission from $c_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());






}


header ("Location:sales_receipt.php?invoice_no=$invoice_no&receipt_no=$receipt_no&cheque_no=$cheque_no&amnt_rec=$amount&mop=$mop&client_id=$client_id&curr_id=$currency");

}






mysql_close($cnn);


?>


