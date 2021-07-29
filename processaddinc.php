<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form


$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

/* $queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate; */

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

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$trans_src_bank=mysql_real_escape_string($_POST['trans_src_bank']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);




if ($mop==1 || $mop==4)//cash or mpesa
{
$sql= "insert into income values ('','','$amount','$desc','$currency','$curr_rate','$mop','$ref_no',
'$date_paid','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into income values ('','','$amount','$desc','$currency','$curr_rate','$mop','$cheque_no',
'$date_drawn','$cheq_drawer','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into income values ('','','$amount','$desc','$currency','$curr_rate','$mop','$transaction_code',
'$date_trans','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

//generate sales receipt number
$queryrec_p="select * from income order by income_id desc limit 1";
$resultsrec_p=mysql_query($queryrec_p) or die ("Error: $queryrec_p.".mysql_error());
$numrowsrec_p=mysql_fetch_object($resultsrec_p);
$latest_invoice_payment_id=$numrowsrec_p->income_id;

/*$year=date('Y');


	$tempnum=$latest_id;
	if($tempnum < 10)
            {
              $receipt_no = "BRINC000".$tempnum."/".$year;
			   

            } else if($tempnum < 100) 
			{
             $receipt_no = "BRINC00".$tempnum."/".$year;
			 			 
            } else 
			{ 
			 $receipt_no= "BRINC".$tempnum."/".$year; 
			 	  
			}
			

$sqluprec_no="UPDATE income set receipt_no='$receipt_no' where income_id='$latest_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());
*/


$transaction_descinv="General Income (".$desc.")";
$transaction_desclg='General Income ('.$desc.') through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='General Income ('.$desc.') through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='General Income ('.$desc.') through Cash. Ref No : '.$ref_no;

/* $sqlgenled= "insert into general_ledger values('','$transaction_descinv','$amount','','$amount','$currency','$curr_rate',NOW(),'inc$latest_invoice_payment_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_descinv','-$amount','$amount','','$currency','$curr_rate',NOW(),'inc$latest_invoice_payment_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error()); */

if ($mop==3)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','$amount','$amount','','$currency','$curr_rate','$date_paid','inc$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','$amount','$amount','','$mop','$our_bank','$currency','$curr_rate','$date_paid','inc$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}

if ($mop==2)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descch','$amount','$amount','','$currency','$curr_rate','$date_paid','inc$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','$amount','$amount','','$mop','$our_bank','$currency','$curr_rate','$date_paid','inc$latest_invoice_payment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}



if ($mop==1 || $mop==4)
{
$sqltranslg= "insert into cash_ledger values('','$transaction_desccas','$amount','$amount','','$currency','$curr_rate','$date_paid','inc$latest_invoice_payment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}


$sqlss="INSERT INTO income_ledger VALUES('','$transaction_descinv','$amount','', '$amount', '$currency','$curr_rate','$date_paid','inc$latest_invoice_payment_id','','','')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

//}




mysql_close($cnn);


?>


