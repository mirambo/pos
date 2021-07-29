<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin

$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transfer_from=mysql_real_escape_string($_POST['transfer_from']);
$transfer_to=mysql_real_escape_string($_POST['transfer_to']);
//$sales_code_id=$_GET['sales_code_id'];
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['memo']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);


//account from
$sqlrec1="SELECT * FROM account WHERE account_id='$transfer_from'";
$resultsrec1= mysql_query($sqlrec1) or die ("Error $sqlrec1.".mysql_error());	
$rowsrec1=mysql_fetch_object($resultsrec1);
$acc_name_from=$rowsrec1->account_name;

//account to
$sqlrec2="SELECT * FROM account WHERE account_id='$transfer_to'";
$resultsrec2= mysql_query($sqlrec2) or die ("Error $sqlrec2.".mysql_error());	
$rowsrec2=mysql_fetch_object($resultsrec2);
$acc_name_to=$rowsrec2->account_name;


$sql= "insert into fund_transfer values ('','$transfer_from','$transfer_to','$amount','$currency','$curr_rate','$desc','$user_id','$date_paid','1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

//generate sales receipt number
$queryrec_p="select * from fund_transfer order by fund_transfer_id desc limit 1";
$resultsrec_p=mysql_query($queryrec_p) or die ("Error: $queryrec_p.".mysql_error());
$numrowsrec_p=mysql_fetch_object($resultsrec_p);
$latest_id=$numrowsrec_p->fund_transfer_id;

$year=date('Y');


	$tempnum=$latest_id;
	if($tempnum < 10)
            {
              $receipt_no = "MGSR000".$tempnum."/".$year;
			   

            } else if($tempnum < 100) 
			{
             $receipt_no = "MGSR00".$tempnum."/".$year;
			 			 
            } else 
			{ 
			 $receipt_no= "MGSR".$tempnum."/".$year; 
			 	  
			}
			

/* $sqluprec_no="UPDATE invoice_payments set receipt_no='$receipt_no' where invoice_payment_id='$latest_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error()); */


// debit the shop to
$account_id_dr2=$transfer_to;
$sqldr2= "SELECT * from account where account_id='$account_id_dr2'";
$resultsdr2= mysql_query($sqldr2) or die ("Error $sqldr2.".mysql_error());
$rowsdr2=mysql_fetch_object($resultsdr2);
$acc_type_id_dr2=$rowsdr2->account_type_id;
$acc_cat_id_dr2=$rowsdr2->account_cat_id;

// credit shop from
$account_id_cr2=$transfer_from;
$sqlcr2= "SELECT * from account where account_id='$account_id_cr2'";
$resultscr2= mysql_query($sqlcr2) or die ("Error $sqlcr2.".mysql_error());
$rowscr2=mysql_fetch_object($resultscr2);
$acc_type_id_cr2=$rowscr2->account_type_id;
$acc_cat_id_cr2=$rowscr2->account_cat_id;

	
	


$date_dep=$date_paid;
$latest_id2=$latest_id;
$customer_id=$client_id;
$grand_ttl=$amount;

//$customer_amnt=$amount*$curr_rate;

//$memo='Sold '.$qnty.' '.$product_name.' '.($item_code).' through invoice <a href="generate_invoice.php?sales_id='.$sales_id.'">Inv No:'.$sales_id.'</a>';
$memo2='Fund Transfer <a href="edit_fund_transfer.php?fund_transfer_id='.$latest_id2.'"> From '.$acc_name_from.' To '.$acc_name_to.' </a>';


$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="ftr".$latest_id2;



/* $sqltrans= "insert into customer_transactions values('','$customer_id','$memo2','-$customer_amnt','$date_dep','$transaction_code','$shop_id','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error()); */


//debit shop to
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_dr2','$acc_type_id_dr2','$account_id_dr2','$transfer_to','$memo2','$grand_ttl','$grand_ttl','','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

//credit shop to
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_cr2','$acc_type_id_cr2','$account_id_cr2','$transfer_from','$memo2','-$grand_ttl','','$grand_ttl','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());




header ("Location:add_fund_transfer.php?addconfirm=1&invoice_payment_id=$latest_id2");





mysql_close($cnn);


?>


