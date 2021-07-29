<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$exp_cat_id=mysql_real_escape_string($_POST['exp_cat_id']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$queryprod="select * from expenses_categories where exp_cat_id='$exp_cat_id'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod); 
$exp_cat_name=$rowsprod->expense_category_name;

$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank1=mysql_real_escape_string($_POST['client_bank1']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank1=mysql_real_escape_string($_POST['our_bank1']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


if ($mop==1 || $mop==4)//cash or mpesa
{
$sql= "insert into expenses values ('','$exp_cat_id','','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{


$sql= "insert into expenses values ('','$exp_cat_id','','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$date_drawn','$client_bank1','$our_bank1',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

if ($mop==3)//bank transfer
{
$sql= "insert into expenses values ('','$exp_cat_id','','$amount','$desc','$currency','$curr_rate','$mop','$transaction_code',
'$date_trans','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


$querylatelpo="select * from expenses order by expenses_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_payment_id=$rowslatelpo->expenses_id;

$year=date('Y');
$tempnum=$latest_invoice_payment_id;
	if($tempnum < 10)
            {
              $receipt_no = "JSPX000".$tempnum."/".$year;
		
			   
		 
			  
			  
            } else if($tempnum < 100) 
			{
             $receipt_no = "JSPX00".$tempnum."/".$year;
		  
			 
	
            } else 
			{ 
			$receipt_no="JSPX".$tempnum."/".$year; 	

			}
			
$sqllpono="UPDATE expenses set receipt_no='$receipt_no' where expenses_id='$latest_invoice_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$transaction_descinv='Expenses Payment: '.$exp_cat_name;
$transaction_desclg='Expenses Payment '.($exp_cat_name).' through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Expenses Payment '.($exp_cat_name).' through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Expenses Payment '.($exp_cat_name).' through Cash. Ref No : '.$ref_no;

/* $sqlgenled= "insert into general_ledger values('','$transaction_descinv','$amount','','$amount','$currency','$curr_rate',NOW(),'exp$latest_invoice_payment_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_descinv','-$amount','$amount','','$currency','$curr_rate',NOW(),'exp$latest_invoice_payment_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error()); */

if ($mop==3)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','-$amount','','$amount','$currency','$curr_rate','$date_paid','exp$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

/* $sqltranslg= "insert into bank_statement values('','$transaction_desclg','-$amount','','$amount','$mop','$our_bank','$currency','$curr_rate','$date_paid','exp$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error()); */

}

if ($mop==2)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descch','-$amount','','$amount','$currency','$curr_rate','$date_paid','exp$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

/* $sqltranslg= "insert into bank_statement values('','$transaction_descch','-$amount','','$amount','$mop','$our_bank','$currency','$curr_rate','$date_paid','exp$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error()); */
}



if ($mop==1 || $mop==4)
{
$sqltranslg= "insert into cash_ledger values('','$transaction_desccas','-$amount','','$amount','$currency','$curr_rate','$date_paid','exp$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}


$sqlss="INSERT INTO salary_expenses_ledger VALUES('','$transaction_descinv','$amount','$amount', '', '$currency','$curr_rate','$date_paid','exp$latest_invoice_payment_id','','','')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());




		
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php





?>


