<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['id'];

$date_from=mysql_real_escape_string($_POST['warrant_date']); 
$credit_account_id=mysql_real_escape_string($_POST['credit_account_id']); 
$shop_id=mysql_real_escape_string($_POST['shop_id']); 
$trans_desc=mysql_real_escape_string($_POST['title']); 
$debit_account_id=mysql_real_escape_string($_POST['debit_account_id']);
$credit_account_id=mysql_real_escape_string($_POST['credit_account_id']);
$journal_amount=mysql_real_escape_string($_POST['amount']);
//$department_id=mysql_real_escape_string($_POST['department_id']);
$todate=date('Y-m-d H:i:s', time()); 

$time  = strtotime($date_from);
$day   = date('d',$time);
$month = date('m',$time);
$year  = date('Y',$time);

$currency=6;
$curr_rate=1;





$sqlemp_det2="select * from account_type where account_type_id='$debit_account_id'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
$rowsemp_det2=mysql_fetch_object($resultsemp_det2);

$bal_type2=$rowsemp_det2->balance_type;

if ($bal_type2=='D')
{
	
	$acc_journal_amount=$journal_amount;
	
}
else
{
	
	$acc_journal_amount='-'.$journal_amount;
	
}



$sqlemp_det23="select * from account_type where account_type_id='$credit_account_id'";
$resultsemp_det23= mysql_query($sqlemp_det23) or die ("Error $sqlemp_det23.".mysql_error());
$rowsemp_det23=mysql_fetch_object($resultsemp_det23);

$bal_type23=$rowsemp_det23->balance_type;

if ($bal_type23=='C')
{
	
	$acc_journal_amount2=$journal_amount;
	
}
else
{
	
	$acc_journal_amount2='-'.$journal_amount;
	
}


if ($id=='')
{

$sqltrans1="INSERT INTO journal_transaction SET 
credit_account_id='$credit_account_id',
debit_account_id='$debit_account_id',
journal_description='$trans_desc',
journal_amount='$journal_amount',
currency='$currency',
curr_rate='$curr_rate',
journal_date='$date_from',
journal_datetime='$todate',
journal_user_id='$user_id'";
$resultstrans1=mysql_query($sqltrans1) or die ("Error $sqltrans1.".mysql_error());	

$journal_id=mysql_insert_id();

//$transaction_code='jntr'.$journal_id;

$dr_transaction_code='dr-jntr'.$journal_id;
$cr_transaction_code='cr-jntr'.$journal_id;





$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$debit_account_id',
transaction_section='JNTR',
memo='$trans_desc',
amount='$acc_journal_amount',
debit='$journal_amount',
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



//////////credit entry

$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='JNTR',
memo='$trans_desc',
amount='$acc_journal_amount2',
credit='$journal_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	


?>
<script type="text/javascript">
alert('Record Saved Suvccessfuly');
window.location = "home.php?general_journal=general_journal&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "add_expenses.php?sales_id=<?php echo $expense_code_id ?>";
</script>

<?php
}
else
{
	
$dr_transaction_code='dr-jntr'.$id;
$cr_transaction_code='cr-jntr'.$id;

$sqltrans1="UPDATE journal_transaction SET 
credit_account_id='$credit_account_id',
debit_account_id='$debit_account_id',
journal_description='$trans_desc',
journal_amount='$journal_amount',
currency='$currency',
curr_rate='$curr_rate',
journal_date='$date_from' WHERE journal_transaction_id='$id'";
$resultstrans1=mysql_query($sqltrans1) or die ("Error $sqltrans1.".mysql_error());	




$sqltransd="UPDATE chart_transactions SET 
account_type_id='$debit_account_id',
transaction_section='JNTR',
memo='$trans_desc',
amount='$acc_journal_amount',
debit='$journal_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error());	



//////////credit entry

$sqltrans="UPDATE chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='JNTR',
memo='$trans_desc',
amount='$acc_journal_amount2',
credit='$journal_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	


?>
<script type="text/javascript">
alert('Record Update Suvccessfuly');
window.location = "home.php?general_journal=general_journal&sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $id;?>";
//window.location = "add_expenses.php?sales_id=<?php echo $expense_code_id ?>";
</script>

<?php	
	
	
	
	
	
	
	
	
	
	
	
}

mysql_close($cnn);


?>


