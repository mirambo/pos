<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$shop_id=mysql_real_escape_string($_POST['shop_id']);
$sales_code_id=mysql_real_escape_string($_POST['invoice_id']);
$record_date=mysql_real_escape_string($_POST['date_paid']);
$client_id=mysql_real_escape_string($_POST['customer_id']);
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
$dep_by=mysql_real_escape_string($_POST['dep_by']);




$sqlrec="SELECT * FROM customer WHERE customer_id='$client_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$invoice_no='N/A';
$c_name=mysql_real_escape_string($rowsrec->customer_name);


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

if ($mop==1 || $mop==4)//cash or mpesa
{
/* $sql= "insert into invoice_payments values ('','$sales_code_id','$client_id','$user_id','$shop_id','','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$record_date','','',NOW(),'1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */


$sql= "INSERT INTO invoice_payments SET
customer_id='$client_id',
sales_rep='$user_id',
sales_id='$sales_code_id',
shop_id='$shop_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
dep_by='$dep_by',
ref_no='$ref_no',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlaccpay= "insert into accounts_receivables_ledger values('','$memo2','-$amount','','-$amount','$currency','$curr_rate','$date_paid','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$memo2','$amount','$amount','','$currency','$curr_rate','$date_paid','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


}

if ($mop==2)//cheque
{
/* $sql= "insert into invoice_payments values ('','$sales_code_id','$client_id','$user_id','$shop_id','','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$record_date','$cheq_drawer','',NOW(),'1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */


$sql="INSERT INTO invoice_payments SET
customer_id='$client_id',
sales_rep='$user_id',
sales_id='$sales_code_id',
shop_id='$shop_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$cheque_no',
client_bank='$cheq_drawer',
date_paid='$date_paid'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlaccpay= "insert into accounts_receivables_ledger values('','$memo2','-$amount','','-$amount','$currency','$curr_rate','$date_paid','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into bank_ledger values('','$memo2','$amount','$amount','','$currency','$curr_rate','$date_paid','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());




}

if ($mop==3)//bank transfer
{
/*$sql= "insert into invoice_payments values ('','$sales_code_id','$client_id','$user_id','$shop_id','','$amount','$desc','$currency','$curr_rate',
'$mop','$transaction_code',
'$record_date','$client_bank','$our_bank',NOW(),'1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/


$sql= "INSERT INTO invoice_payments SET
customer_id='$client_id',
sales_rep='$user_id',
sales_id='$sales_code_id',
shop_id='$shop_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$transaction_code',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$memo2','-$amount','','-$amount','$currency','$curr_rate','$date_paid','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into bank_ledger values('','$memo2','$amount','$amount','','$currency','$curr_rate','$date_paid','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

} 



//generate sales receipt number
$queryrec_p="select * from invoice_payments order by invoice_payment_id desc limit 1";
$resultsrec_p=mysql_query($queryrec_p) or die ("Error: $queryrec_p.".mysql_error());
$numrowsrec_p=mysql_fetch_object($resultsrec_p);
$latest_id=$numrowsrec_p->invoice_payment_id;

$year=date('Y');


	$tempnum=$latest_id;
	if($tempnum < 10)
            {
              $receipt_no= "0000".$tempnum;
              //$lpo_no = $client_abrev.'/'.$month."/0000".$tempnum;
			   //echo $newnum;
			  
			  
            } 
			
			else if($tempnum < 100) 
			{
             $receipt_no= "000".$tempnum;
			 
			 //echo $newnum;
            } 
			
			else if($tempnum < 1000) 
			{
             $receipt_no= "00".$tempnum;
			 
			 //echo $newnum;
            }
			
						else if($tempnum < 10000) 
			{
             $receipt_no= "0".$tempnum;
			 
			 //echo $newnum;
            }
			
			
			else 
			{ 
			$receipt_no=$tempnum;
			
			//echo $newnum;
			}
			

$sqluprec_no="UPDATE invoice_payments set receipt_no='$receipt_no' where invoice_payment_id='$latest_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());


$date_dep=$record_date;
$latest_id2=$latest_id;
$customer_id=$client_id;
$grand_ttl=$amount;

$customer_amnt=$amount*$curr_rate;

//$memo='Sold '.$qnty.' '.$product_name.' '.($item_code).' through invoice <a href="generate_invoice.php?sales_id='.$sales_id.'">Inv No:'.$sales_id.'</a>';
$memo2='Customer Payment <a href="edit_invoice_payment.php?invoice_payment_id='.$latest_id2.'&receipt_no='.$receipt_no.'"> Receipt No : '.$receipt_no.'</a> Received from '.$c_name;


$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="crsp".$latest_id2;



$sqlprof="select * from customer_transactions where transaction_code='$transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{


$sqltrans="update customer_transactions SET 
customer_id='$customer_id',
transaction_date='$date_dep',
amount='$customer_amnt',
transaction='$memo2'
where transaction_code='$transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

//update account receivables ledger
$sqltrans="update ledger_transactions SET 
memo='$memo2',
shop_id='$shop_id',
amount='$grand_ttl',
credit='$grand_ttl',
transaction_date='$date_dep',
l_day='$day',
l_month='$month',
l_year='$year'

where transaction_code='$transaction_code' and account_id='$account_id_cr2'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


//shop
$sqltrans="update ledger_transactions SET 
memo='$memo2',
shop_id='$shop_id',
account_id='$shop_id',
amount='$grand_ttl',
debit='$grand_ttl',
transaction_date='$date_dep',
l_day='$day',
l_month='$month',
l_year='$year'

where transaction_code='$transaction_code' and account_id='$shop_id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

}




else
{



$sqltrans= "insert into customer_transactions values('','$customer_id','$memo2','-$amount','$currency','$curr_rate','$date_paid','$transaction_code','$shop_id','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


//debit shop r
/* $sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_dr2','$acc_type_id_dr2','$account_id_dr2','$shop_id','$memo2','$grand_ttl','$grand_ttl','','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */

//credit account receivables ledger
$sqlaccpay= "insert into accounts_receivables_ledger values('','$memo2','-$amount','','-$amount','$currency','$curr_rate','$date_paid','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into bank_ledger values('','$memo2','$amount','$amount','','$currency','$curr_rate','$date_paid','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());





}

//header ("Location:receive_client_payment.php?addconfirm=1&invoice_payment_id=$latest_id");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


mysql_close($cnn);


?>


