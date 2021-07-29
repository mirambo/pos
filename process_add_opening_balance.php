<?php
include('includes/session.php');
include('Connections/fundmaster.php');


$id=$_GET['id'];
$todate=date( 'Y-m-d H:i:s', time());


$date_from=mysql_real_escape_string($_POST['date_from']); 


$credit_account_id=mysql_real_escape_string($_POST['credit_account_id']); 

$sqlemp_det2d="select * from account_type where account_type_id='$credit_account_id'";
$resultsemp_det2d= mysql_query($sqlemp_det2d) or die ("Error $sqlemp_det2d.".mysql_error());
$rowsemp_det2d=mysql_fetch_object($resultsemp_det2d);

$bal_type2d=$rowsemp_det2d->balance_type;

$account_type_name=mysql_real_escape_string($rowsemp_det2d->account_type_name);



$trans_desc=mysql_real_escape_string($_POST['comments']);
$amount=mysql_real_escape_string($_POST['amount']); 



$time  = strtotime($date_from);
$day   = date('d',$time);
$month = date('m',$time);
$year  = date('Y',$time);

$currency=7;
$curr_rate=1;



if ($id=='')
{
	
$query_no="SELECT * FROM account_opening_balances where account_id='$credit_account_id'";
$results_no=mysql_query($query_no) or die ("Error: $query_no.".mysql_error());
$rows_no=mysql_num_rows($results_no);
	
	if ($rows_no>0)
	{ ?>
		
<script type="text/javascript">
alert('Sorry!!! Record exist');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
		
<?php		
	}
	else
	{

$sql34="INSERT INTO account_opening_balances SET 
	date_recorded='$date_from',
	amount='$amount',
	account_id='$credit_account_id',
	comments='$trans_desc',
	datetime_recorded='$todate',
	recorded_by='$user_id'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
	$lat_id=mysql_insert_id();
	///post to accounts
	
	
if ($bal_type2d=='D')
{

$dr_transaction_code='dr-opb'.$lat_id;
$transaction_desc='Opening Balance for Account '.$account_type_name.' as at '.$date_from;	
$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='AOBAL',
memo='$transaction_desc',
amount='$amount',
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
else
{
	
$cr_transaction_code='cr-opb'.$lat_id;
$transaction_desc='Opening Balance for Account '.$account_type_name.' as at '.$date_from;	
$sqltransd="INSERT INTO chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='AOBAL',
memo='$transaction_desc',
amount='$amount',
credit='$amount',
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
   	


?>
<script type="text/javascript">
alert('Record Saved Suvccessfuly');
window.location = "home.php?view_opening_balances&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "add_expenses.php?sales_id=<?php echo $expense_code_id ?>";
</script>

<?php
	}
}


/////////////////////update transactions


else
{
	
$sql34="UPDATE account_opening_balances SET 
	date_recorded='$date_from',
	amount='$amount',
	account_id='$credit_account_id',
	comments='$trans_desc' WHERE opening_balance_id='$id'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
	
	
	
	
	
if ($bal_type2d=='D')
{

$dr_transaction_code='dr-opb'.$id;
$transaction_desc='Opening Balance for Account '.$account_type_name.' as at '.$date_from;	
$sqltransd="UPDATE chart_transactions SET 
account_type_id='$credit_account_id',
memo='$transaction_desc',
amount='$amount',
debit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_code='$dr_transaction_code',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error());	
}
else
{
	
$cr_transaction_code='cr-opb'.$id;
$transaction_desc='Opening Balance for Account '.$account_type_name.' as at '.$date_from;	
$sqltransd="UPDATE chart_transactions SET 
account_type_id='$credit_account_id',
memo='$transaction_desc',
transaction_code='$cr_transaction_code',
amount='$amount',
credit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$cr_transaction_code'";
$resultstransd=mysql_query($sqltransd) or die ("Error $sqltransd.".mysql_error());
	
	
	
}
	
	
	
	
?>
<script type="text/javascript">
alert('Record Updated Suvccessfuly');
window.location = "home.php?view_opening_balances&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "add_expenses.php?sales_id=<?php echo $expense_code_id ?>";
</script>

<?php
	
}


mysql_close($cnn);
?>


