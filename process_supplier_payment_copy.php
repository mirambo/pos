<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$record_date=mysql_real_escape_string($_POST['date_paid']);
$client_id=mysql_real_escape_string($_POST['client']);
$order_code_id=mysql_real_escape_string($_POST['order_code_id']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

/* $queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate; */


$queryprodsup="select * from suppliers where supplier_id='$client_id'";
$resultsprodsup=mysql_query($queryprodsup) or die ("Error: $queryprodsup.".mysql_error());
$rowsprodsup=mysql_fetch_object($resultsprodsup);
$exp_cat_name=$rowsprodsup->supplier_name;

$mop=mysql_real_escape_string($_POST['mop']);

$queryprod="select * from mop where mop_id='$mop'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$mop_name=$rowsprod->mop_name;

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
$sql= "insert into supplier_payments values ('','$order_code_id','','$client_id','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','','',NOW(),'','$user_id','$incharge')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into supplier_payments values ('','$order_code_id','','$client_id','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$date_paid','$cheq_drawer','',NOW(),'','$user_id','$incharge')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into supplier_payments values ('','$order_code_id','','$client_id','$amount','$desc','$currency','$curr_rate','$mop','$transaction_code',
'$date_paid','$client_bank','$our_bank',NOW(),'','$user_id','$incharge')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}


$querylatelpo="select * from supplier_payments order by supplier_payments_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_payment_id=$rowslatelpo->supplier_payments_id;

$year=date('Y');
$tempnum=$latest_invoice_payment_id;
	
	if($tempnum < 10)
            {
              $receipt_no  = "SP0000".$tempnum;
              //$lpo_no = $client_abrev.'/'.$month."/0000".$tempnum;
			   //echo $newnum;
			  
			  
            } 
			
			else if($tempnum < 100) 
			{
             $receipt_no= "SP000".$tempnum;
			 
			 //echo $newnum;
            } 
			
			else if($tempnum < 1000) 
			{
             $receipt_no= "SP00".$tempnum;
			 
			 //echo $newnum;
            }
			
						else if($tempnum < 10000) 
			{
             $receipt_no= "SP0".$tempnum;
			 
			 //echo $newnum;
            }
			
			
			else 
			{ 
			$receipt_no = 'SP'.$tempnum;
			
			//echo $newnum;
			}
			
$sqllpono="UPDATE supplier_payments set receipt_no='$receipt_no' where supplier_payments_id='$latest_invoice_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

/* $transaction_descinv='Supplier Payment: ('.$exp_cat_name.')'; */
$transaction_desclg='Supplier Payment through '.$mop_name.' <a href="edit_supplier_payments.php?supplier_payments_id='.$latest_invoice_payment_id.'">Receipt No : '.$receipt_no.'</a>';
/* $transaction_descch='Supplier Payment ('.$exp_cat_name.') through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Supplier Payment ('.$exp_cat_name.') through Cash. Ref No : '.$cheque_no; */

$client_amnt=$amount*$curr_rate;

/* $sql4="INSERT INTO supplier_transactions VALUES('','$client_id','supm$latest_invoice_payment_id','$transaction_descinv','$currency',
'$curr_rate','-$amount','$date_paid','$incharge','','')" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error()); */


$sqltrans="INSERT INTO supplier_transactions SET 
supplier_id='$client_id',
order_code='supm$latest_invoice_payment_id',
date_recorded='$date_paid',
amount='-$amount',
credit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction='$transaction_desclg'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	



/* if ($mop==2)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descch','-$amount','','$amount','$currency','$curr_rate','$date_paid','supm$latest_invoice_payment_id','','','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','-$amount','','$amount','$mop','$our_bank','$currency','$curr_rate','$date_paid','supm$latest_invoice_payment_id','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}

if ($mop==3)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','-$amount','','$amount','$currency','$curr_rate','$date_paid','supm$latest_invoice_payment_id','','','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','-$amount','','$amount','$mop','$our_bank','$currency','$curr_rate',NOW(),'supm$latest_invoice_payment_id','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}

if ($mop==1 || $mop==4)
{

$sqltranslg= "insert into cash_ledger values('','$transaction_desccas','-$amount','','$amount','$currency','$curr_rate','$date_paid','supm$latest_invoice_payment_id','','','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}


$sqltranslg= "insert into accounts_payables_ledger values('','$transaction_descinv','-$amount','$amount','','$currency','$curr_rate','$date_paid','supm$latest_invoice_payment_id','','','$incharge')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error()); */



?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "home.php?balancesheet=balancesheet&sub_module_id=<?php echo $sub_module_id;?>";
window.location = "pay_supplier.php";
</script> 

<?php





?>


