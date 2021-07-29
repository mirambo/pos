<?php
include('includes/session.php');
include('Connections/fundmaster.php');


$id=$_GET['id'];
$leo=date( 'Y-m-d H:i:s', time());
$emp_id=$_GET['employee_id'];

$date_from=mysql_real_escape_string($_POST['warrant_date']); 
$ref_no=mysql_real_escape_string($_POST['ref_no']); 
$trans_desc=mysql_real_escape_string($_POST['transaction_desc']);
$vat=mysql_real_escape_string($_POST['vat']); 
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$supplier_id=mysql_real_escape_string($_POST['supplier_id']);


$time  = strtotime($date_from);
$day   = date('d',$time);
$month = date('m',$time);
$year  = date('Y',$time);

$transaction_desc='Purchase Debit Journal Entry for '.$trans_desc;


$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;
$vat_perc=$vat_set_perc/100;






if ($id=='')
{

$sql34="INSERT INTO purchases_debit_journal_code SET 
	journal_date='$date_from',
	supplier_id='$supplier_id',
	ref_no='$ref_no',
	vat='$vat',
	journal_type='DRT',
	curr_rate='$curr_rate',
	currency='$currency',
	transaction_description='$trans_desc',
	journal_datetime='$leo',
	journal_recorded_by='$user_id'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());

   	
$journal_code_id=mysql_insert_id();
	
	
	
/////////////////debit transactions
// Loop $_FILES to exeicute all files
foreach($_POST['amount'] as $row=>$Amount)
{ 

$amount=mysql_real_escape_string($_POST['amount'][$row]);
$debit_account_id=mysql_real_escape_string($_POST['debit_account_id'][$row]);


if ($vat==1)
{
	$journal_debit_vat_value=$vat_perc*$amount;
	
}
else
{
	
	$journal_debit_vat_value=0;
	
}


    
	    
$sql34="INSERT INTO purchases_debit_journal_transaction SET 
        journal_code_id='$journal_code_id',
    	debit_account_id='$debit_account_id',
		journal_debit_vat_value='$journal_debit_vat_value',
	    journal_debit_amount='$amount'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
	
	$journal_transaction_id_dr=mysql_insert_id();
	
	
$sqlemp_det2d="select * from account_type where account_type_id='$debit_account_id'";
$resultsemp_det2d= mysql_query($sqlemp_det2d) or die ("Error $sqlemp_det2d.".mysql_error());
$rowsemp_det2d=mysql_fetch_object($resultsemp_det2d);

$bal_type2d=$rowsemp_det2d->balance_type;

if ($bal_type2d=='D')
{
	
	$acc_journal_amountd=$amount;
	
}
else
{
	
	$acc_journal_amountd='-'.$amount;
	
}
	
	
$dr_transaction_code='pd-dr-jnl-dr'.$journal_transaction_id_dr;

$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$debit_account_id',
transaction_section='PDRJNTR',
memo='$transaction_desc',
amount='$acc_journal_amountd',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error()); 
	
	        
}
		

		
			// Loop $_FILES to exeicute all files
foreach($_POST['amount2'] as $row=>$Amount2)
{ 

$amount2=mysql_real_escape_string($_POST['amount2'][$row]);
$credit_account_id=mysql_real_escape_string($_POST['credit_account_id'][$row]);

$ttl_amount2=$ttl_amount2+$amount2;

if ($vat==1)
{
	$journal_credit_vat_value=$vat_perc*$amount2;
	
}
else
{
	
	$journal_credit_vat_value=0;
	
}



    
	    
$sql34="INSERT INTO purchases_debit_journal_transaction SET 
        journal_code_id='$journal_code_id',
    	credit_account_id='$credit_account_id',
    	journal_credit_vat_value='$journal_credit_vat_value',
	    journal_credit_amount='$amount2'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());

$journal_transaction_id_cr=mysql_insert_id();
	
	
$sqlemp_det2c="select * from account_type where account_type_id='$credit_account_id'";
$resultsemp_det2c= mysql_query($sqlemp_det2c) or die ("Error $sqlemp_det2c.".mysql_error());
$rowsemp_det2c=mysql_fetch_object($resultsemp_det2c);

echo $bal_type2c=$rowsemp_det2c->balance_type;

if ($bal_type2c=='C')
{
	
	echo $acc_journal_amountc=$amount2;
	
}
else
{
	
	echo $acc_journal_amountc='-'.$amount2;
	
}
	
	
	
$cr_transaction_code='pd-dr-jnl-cr'.$journal_transaction_id_cr;

$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='PDRJNTR',
memo='$transaction_desc',
amount='$acc_journal_amountc',
credit='$amount2',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error()); 




	        
	    }
		

$transaction2=$transaction_desc;
$transaction_code2='sup-deb-jnr'.$journal_code_id;
//$memo2=$transaction2;
$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$supplier_id',
transaction='$transaction2',
amount='-$ttl_amount2',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_code='$transaction_code2'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());		
		


?>
<script type="text/javascript">
alert('Record Saved Suvccessfuly. Posting No : <?php echo $journal_code_id; ?>');
window.location = "home.php?view_purchases_debit_journal&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "add_expenses.php?sales_id=<?php echo $expense_code_id ?>";
</script>

<?php

}




/////////////////////update transactions


else
{
	//////////////update the code
	$sql34x="update purchases_debit_journal_code SET 
	journal_date='$date_from',
	supplier_id='$supplier_id',
	ref_no='$ref_no',
	vat='$vat',
	curr_rate='$curr_rate',
	currency='$currency',
	transaction_description='$trans_desc' WHERE journal_code_id='$id'" or die(mysql_error());
    $results34x= mysql_query($sql34x) or die ("Error $sql34x.".mysql_error());
	


/////////////////update the debit transactions side
foreach($_POST['debit_account_id'] as $row=>$Debit_account_id)
{ 

$amount=mysql_real_escape_string($_POST['amount'][$row]);
$debit_account_id=mysql_real_escape_string($_POST['debit_account_id'][$row]);
$debit_journal_transaction_id=mysql_real_escape_string($_POST['debit_journal_transaction_id'][$row]);

if ($vat==1)
{
	$journal_debit_vat_value=$vat_perc*$amount;
	
}
else
{
	
	$journal_debit_vat_value=0;
	
}

if ($debit_journal_transaction_id!='')
{
	
	$sql34y="UPDATE purchases_debit_journal_transaction SET 
	debit_account_id='$debit_account_id',
	journal_debit_vat_value='$journal_debit_vat_value',
	journal_debit_amount='$amount' where journal_transaction_id='$debit_journal_transaction_id'" or die(mysql_error());
    $results34y= mysql_query($sql34y) or die ("Error $sql34y.".mysql_error());
	
	
	$journal_transaction_id_dr=$debit_journal_transaction_id;
	
	
$sqlemp_det2d="select * from account_type where account_type_id='$debit_account_id'";
$resultsemp_det2d= mysql_query($sqlemp_det2d) or die ("Error $sqlemp_det2d.".mysql_error());
$rowsemp_det2d=mysql_fetch_object($resultsemp_det2d);

$bal_type2d=$rowsemp_det2d->balance_type;

if ($bal_type2d=='D')
{
	
	$acc_journal_amountd=$amount;
	
}
else
{
	
	$acc_journal_amountd='-'.$amount;
	
}


$dr_transaction_code='pd-dr-jnl-dr'.$journal_transaction_id_dr;

$sqltransd="UPDATE chart_transactions SET 
account_type_id='$debit_account_id',
memo='$transaction_desc',
amount='$acc_journal_amountd',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_code='$dr_transaction_code',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error()); 
	
}
////////////insert if an account is added
else
{
	
	

	
	$sql34y="INSERT INTO purchases_debit_journal_transaction SET 
        journal_code_id='$id',
    	debit_account_id='$debit_account_id',
		journal_debit_vat_value='$journal_debit_vat_value',
	    journal_debit_amount='$amount'" or die(mysql_error());
    $results34y= mysql_query($sql34y) or die ("Error $sql34y.".mysql_error());
	
	$journal_transaction_id_dr=mysql_insert_id();
	
	
$sqlemp_det2d="select * from account_type where account_type_id='$debit_account_id'";
$resultsemp_det2d= mysql_query($sqlemp_det2d) or die ("Error $sqlemp_det2d.".mysql_error());
$rowsemp_det2d=mysql_fetch_object($resultsemp_det2d);

$bal_type2d=$rowsemp_det2d->balance_type;

if ($bal_type2d=='D')
{
	
	$acc_journal_amountd=$amount;
	
}
else
{
	
	$acc_journal_amountd='-'.$amount;
	
}
	
	
$dr_transaction_code='pd-dr-jnl-dr'.$journal_transaction_id_dr;

$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$debit_account_id',
transaction_section='PDRJNTR',
memo='$transaction_desc',
amount='$acc_journal_amountd',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error()); 



/////////////////
	
	
	
}

    

	
	
	        
	    }
////////////////////////end of updating debit transations		
		
///////////////Updating the credit		
			// Loop $_FILES to exeicute all files
foreach($_POST['credit_account_id'] as $row=>$Credit_account_id)
{ 

$amount2=mysql_real_escape_string($_POST['amount2'][$row]);
$credit_account_id=mysql_real_escape_string($_POST['credit_account_id'][$row]);
$credit_journal_transaction_id=mysql_real_escape_string($_POST['credit_journal_transaction_id'][$row]);

if ($vat==1)
{
	$journal_credit_vat_value=$vat_perc*$amount2;
	
}
else
{
	
	$journal_credit_vat_value=0;
	
}




if ($credit_journal_transaction_id!='')
{
	
	
	$sql34y="UPDATE purchases_debit_journal_transaction SET 
	credit_account_id='$credit_account_id',
	journal_credit_vat_value='$journal_credit_vat_value',
	journal_credit_amount='$amount2' where journal_transaction_id='$credit_journal_transaction_id'" or die(mysql_error());
    $results34y= mysql_query($sql34y) or die ("Error $sql34y.".mysql_error());
	
	
	$journal_transaction_id_cr=$credit_journal_transaction_id;
	
	
$sqlemp_det2dv="select * from account_type where account_type_id='$credit_account_id'";
$resultsemp_det2dv= mysql_query($sqlemp_det2dv) or die ("Error $sqlemp_det2dv.".mysql_error());
$rowsemp_det2dv=mysql_fetch_object($resultsemp_det2dv);

$bal_type2dv=$rowsemp_det2dv->balance_type;

if ($bal_type2dv=='C')
{
	
	$acc_journal_amountd=$amount2;
	
}
else
{
	
	$acc_journal_amountd='-'.$amount2;
	
}


$cr_transaction_code='pd-dr-jnl-cr'.$journal_transaction_id_cr;

$sqltransd="UPDATE chart_transactions SET 
account_type_id='$credit_account_id',
memo='$transaction_desc',
amount='$acc_journal_amountd',
credit='$amount2',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error()); 
	
	
	
	
	
}

else
{
	
	
	$sql34="INSERT INTO purchases_debit_journal_transaction SET 
        journal_code_id='$id',
    	credit_account_id='$credit_account_id',
		journal_credit_vat_value='$journal_credit_vat_value',
	    journal_credit_amount='$amount2'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());

$journal_transaction_id_cr=mysql_insert_id();
	
	
$sqlemp_det2c="select * from account_type where account_type_id='$credit_account_id'";
$resultsemp_det2c= mysql_query($sqlemp_det2c) or die ("Error $sqlemp_det2c.".mysql_error());
$rowsemp_det2c=mysql_fetch_object($resultsemp_det2c);

echo $bal_type2c=$rowsemp_det2c->balance_type;

if ($bal_type2c=='C')
{
	
	echo $acc_journal_amountc=$amount2;
	
}
else
{
	
	echo $acc_journal_amountc='-'.$amount2;
	
}
	
	
	
$cr_transaction_code='pd-dr-jnl-cr'.$journal_transaction_id_cr;

$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='PDRJNTR',
memo='$transaction_desc',
amount='$acc_journal_amountc',
credit='$amount2',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error()); 
	
}




    


	        
	    }
	
	?>
<script type="text/javascript">
alert('Record Updated Suvccessfuly. Posting No : <?php echo $id; ?>');
window.location = "home.php?view_purchases_debit_journal&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "add_expenses.php?sales_id=<?php echo $expense_code_id ?>";
</script>

<?php
	
	
	
}





mysql_close($cnn);
?>


