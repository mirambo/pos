<?php
include('includes/session.php');
include('Connections/fundmaster.php');


$id=$_GET['id'];
$to=date( 'Y-m-d H:i:s', time());
$emp_id=$_GET['employee_id'];

$date_from=mysql_real_escape_string($_POST['warrant_date']); 
$supplier_id=mysql_real_escape_string($_POST['customer_id']); 
$trans_desc=mysql_real_escape_string($_POST['title']);
$ref_no=mysql_real_escape_string($_POST['ref_no']); 
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$vat=mysql_real_escape_string($_POST['vat']);


$time  = strtotime($date_from);
$day   = date('d',$time);
$month = date('m',$time);
$year  = date('Y',$time);

$transaction_desc='Purchase Credit Journal Entry Ref No '.$ref_no;


if ($id=='')
{

$sql34="INSERT INTO purchases_debit_journal_code SET 
	journal_date='$date_from',
	curr_rate='$curr_rate',
	currency='$currency',
	journal_type='CRT',
	transaction_description='$trans_desc',
	journal_datetime='$leo',
	journal_recorded_by='$user_id'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());

   	
$journal_code_id=mysql_insert_id();
	
	
	

// Loop $_FILES to exeicute all files
foreach($_POST['amount'] as $row=>$Amount)
{ 

$amount=mysql_real_escape_string($_POST['amount'][$row]);
$debit_account_id=mysql_real_escape_string($_POST['debit_account_id'][$row]);


    
	    
$sql34="INSERT INTO purchases_debit_journal_transaction SET 
        journal_code_id='$journal_code_id',
    	credit_account_id='$credit_account_id',
	    journal_credit_amount='$amount'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
	
	$journal_transaction_id_dr=mysql_insert_id();
	
	
$sqlemp_det2d="select * from account_type where account_type_id='$debit_account_id'";
$resultsemp_det2d= mysql_query($sqlemp_det2d) or die ("Error $sqlemp_det2d.".mysql_error());
$rowsemp_det2d=mysql_fetch_object($resultsemp_det2d);

echo $bal_type2d=$rowsemp_det2d->balance_type;

if ($bal_type2d=='D')
{
	
	echo $acc_journal_amountd=$amount;
	
}
else
{
	
	echo $acc_journal_amountd='-'.$amount;
	
}
	
	
$dr_transaction_code='pd-jnl-dr'.$journal_transaction_id_dr;

$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$debit_account_id',
transaction_section='PCJNTR',
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
		
	echo '</br>';	
		
			// Loop $_FILES to exeicute all files
foreach($_POST['amount2'] as $row=>$Amount2)
{ 

$amount2=mysql_real_escape_string($_POST['amount2'][$row]);
$credit_account_id=mysql_real_escape_string($_POST['credit_account_id'][$row]);

$ttl_amount2=$ttl_amount2+$amount2;

    
	    
$sql34="INSERT INTO purchases_debit_journal_transaction SET 
        journal_code_id='$journal_code_id',
    	credit_account_id='$credit_account_id',
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
	
	
	
$cr_transaction_code='pd-jnl-cr'.$journal_transaction_id_cr;

$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='PCJNTR',
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
$transaction_code2='sup-cred-jnr'.$journal_code_id;
//$memo2=$transaction2;
$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$supplier_id',
transaction='$transaction2',
amount='$ttl_amount2',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_code='$transaction_code2'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());


/* $sql2="INSERT INTO audit_trails SET 
user_id='$user_id',
date_of_event='$to',
sub_module_id='$sub_module_id',
action='Created a voucher form'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error()); */

//header ("Location:home.php?voucher_form&sub_module_id=$sub_module_id&success2");

?>
<script type="text/javascript">
alert('Record Saved Suvccessfuly');
window.location = "home.php?purchases_credit_journal&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "add_expenses.php?sales_id=<?php echo $expense_code_id ?>";
</script>

<?php

}
















/////////////////////update transactions


else
{
	
	$sql34x="update journal_code SET 
	journal_date='$date_from',
	journal_amount='$journal_amount',
	account_from='$account_from',
	curr_rate='$curr_rate',
	currency='$currency',
	transaction_description='$trans_desc' WHERE journal_code_id='$id'" or die(mysql_error());
    $results34x= mysql_query($sql34x) or die ("Error $sql34x.".mysql_error());
	
	
$from_dr_transaction_code='fmr-dr'.$id;	
	
$sqltransd="UPDATE chart_transactions SET 
account_type_id='$account_from',
transaction_section='JNTR',
memo='$transaction_desc',
amount='-$journal_amount',
credit='$journal_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$from_dr_transaction_code'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error());	
	
	
	
	

$sql3="DELETE from journal_transaction where journal_code_id='$id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());	



$dr_transaction_code='jnl-dr'.$id;
$sql32d="DELETE from chart_transactions where transaction_code='$dr_transaction_code'";
$results32d= mysql_query($sql32d) or die ("Error $sql32d.".mysql_error());

$cr_transaction_code='jnl-cr'.$id;
$sql32="DELETE from chart_transactions where transaction_code='$cr_transaction_code'";
$results32= mysql_query($sql32) or die ("Error $sql32.".mysql_error());




foreach($_POST['amount'] as $row=>$Amount)
{ 

$amount=mysql_real_escape_string($_POST['amount'][$row]);
$debit_account_id=mysql_real_escape_string($_POST['debit_account_id'][$row]);
//$sub_account=mysql_real_escape_string($_POST['sub_account'][$row]);
//$warrant_head=mysql_real_escape_string($_POST['warrant_head'][$row]);

    
	    
$sql34y="INSERT INTO journal_transaction SET 
        journal_code_id='$id',
    	debit_account_id='$debit_account_id',
	    journal_debit_amount='$amount'" or die(mysql_error());
    $results34y= mysql_query($sql34y) or die ("Error $sql34y.".mysql_error());
	

	
	
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
	
	
	
$dr_transaction_code='jnl-dr'.$id;

$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$debit_account_id',
transaction_section='JNTR',
memo='$transaction_desc',
amount='$acc_journal_amountd',
debit='$acc_journal_amountd',
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




    
	    
$sql34z="INSERT INTO journal_transaction SET 
        journal_code_id='$id',
    	credit_account_id='$credit_account_id',
	    journal_credit_amount='$amount2'" or die(mysql_error());
    $results34z= mysql_query($sql34z) or die ("Error $sql34z.".mysql_error());
	
	
	
	
$sqlemp_det2c="select * from account_type where account_type_id='$credit_account_id'";
$resultsemp_det2c= mysql_query($sqlemp_det2c) or die ("Error $sqlemp_det2c.".mysql_error());
$rowsemp_det2c=mysql_fetch_object($resultsemp_det2c);

$bal_type2c=$rowsemp_det2c->balance_type;

if ($bal_type2c=='C')
{
	
	$acc_journal_amountc=$amount2;
	
}
else
{
	
	$acc_journal_amountc='-'.$amount2;
	
}
	
	
	
$cr_transaction_code='jnl-cr'.$id;

$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='JNTR',
memo='$transaction_desc',
amount='$acc_journal_amountc',
credit='$acc_journal_amountc',
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
alert('Record Saved Suvccessfuly');
window.location = "home.php?view_general_journal=view_general_journal&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "add_expenses.php?sales_id=<?php echo $expense_code_id ?>";
</script>

<?php



mysql_close($cnn);
?>


