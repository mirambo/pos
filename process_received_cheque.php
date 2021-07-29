<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['id'];

$date_from=mysql_real_escape_string($_POST['date_from']); 
$debit_account_id=mysql_real_escape_string($_POST['debit_account_id']); 
$shop_id=mysql_real_escape_string($_POST['shop_id']); 
$receipt_no=mysql_real_escape_string($_POST['receipt_no']); 
$mop_id=mysql_real_escape_string($_POST['mop']); 
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$comments=mysql_real_escape_string($_POST['terms']);
$debit_amount=mysql_real_escape_string($_POST['debit_amount']);


if ($id!='')
{
	


$sqlxx = "UPDATE cheque_received_code SET 
account_to_debit='$debit_account_id',
trans_type='RECEIVED',
debit_amount='$debit_amount',
currency='$currency',
curr_rate='$curr_rate',
ref_no='$receipt_no',
mop='$mop_id',
date_recorded='$date_from',
datetime_recorded='$todate',
comments='$comments' WHERE cheque_received_code_id='$id'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());	


////////////////////debit the chart of transaction

$cheque_received_code=$id;


$transaction_code='ccrec'.$cheque_received_code;


$orderdate = explode('-', $date_from);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

//$cr_transaction_code="crccrec".$cheque_received_code;
$dr_transaction_code="drccrec".$cheque_received_code;




$memo2='Cash or Cheque Received, reference no '.$cheque_no.' ('.$comments.')';


$sql34c="select * FROM account_type where account_type_id='$debit_account_id'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
$bal_type=$rows34c->balance_type;


if ($bal_type=='D')
{
	
	$amountx=$debit_amount;
}
else
{
	
	$amountx=-$debit_amount;
	
}


$sqltrans="UPDATE chart_transactions SET 
account_type_id='$debit_account_id',
transaction_section='CCREC',
memo='$memo2',
amount='$amountx',
debit='$debit_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_code='$dr_transaction_code',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$dr_transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
	
	
$sqld= "delete from cheque_received where cheque_received_code_id='$id'";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());


foreach($_POST['country_no'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['country_no'][$row]);
$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);
$department_code=mysql_real_escape_string($_POST['department_code'][$row]);
$vat=mysql_real_escape_string($_POST['vat'][$row]);


$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;
$vat_perc=$vat_set_perc/100;



if ($vat==1)
{
	
$vat_value=$vend_price*$vat_perc;	

$vat_account=69;
	
}
else
{

$vat_value=0;	
$vat_account=0;
	
}

$sqlxx = "INSERT INTO cheque_received SET 
account_to_credit='$prod',
vat='$vat',
vat_value='$vat_value',
vat_account='$vat_account',
cheque_received_code_id='$id',
credit_amount='$vend_price'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());

$cheque_received_id=mysql_insert_id();


/////////////credit other account
//Credit other account
$sql34c2="select * FROM account_type where account_type_id='$prod'";
$results34c2= mysql_query($sql34c2) or die ("Error $sql34c2.".mysql_error());
$rows34c2=mysql_fetch_object($results34c2);
$bal_type2=$rows34c2->balance_type;


if ($bal_type2=='C')
{
	
	$amountx2=$vend_price;
}
else
{
	
	$amountx2=-$vend_price;
	
}


$sqld2= "delete from chart_transactions where transaction_code LIKE '%crccrec%'";
$resultsd2= mysql_query($sqld2) or die ("Error $sqld2.".mysql_error());

$cr_transaction_code="crccrec".$cheque_received_id;

$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$prod',
transaction_section='CCREC',
memo='$memo2',
amount='$amountx2',
credit='$vend_price',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());
}

?>
<script type="text/javascript">
alert('Record Updated Suvccessfuly. Posting No : <?php echo $id; ?>');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?view_received_cheque_payment";
</script>

<?php
			
}
else
{


$sqlxx = "INSERT INTO cheque_received_code SET 
account_to_debit='$debit_account_id',
trans_type='RECEIVED',
debit_amount='$debit_amount',
currency='$currency',
curr_rate='$curr_rate',
ref_no='$receipt_no',
mop='$mop_id',
date_recorded='$date_from',
datetime_recorded='$todate',
recorded_by='$user_id',
comments='$comments'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());
$cheque_received_code=mysql_insert_id();

////////////////////debit the chart of transaction

$transaction_code='ccrec'.$cheque_received_code;


$orderdate = explode('-', $date_from);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

//$cr_transaction_code="crccrec".$cheque_received_code;
$dr_transaction_code="drccrec".$cheque_received_code;




$memo2='Cash or Cheque Received, reference no '.$cheque_no.' ('.$comments.')';


$sql34c="select * FROM account_type where account_type_id='$debit_account_id'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
$bal_type=$rows34c->balance_type;


if ($bal_type=='D')
{
	
	$amountx=$debit_amount;
}
else
{
	
	$amountx=-$debit_amount;
	
}

$sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$debit_account_id',
transaction_section='CCREC',
memo='$memo2',
amount='$amountx',
debit='$debit_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());






foreach($_POST['country_no'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['country_no'][$row]);
$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);
$department_code=mysql_real_escape_string($_POST['department_code'][$row]);
$vat=mysql_real_escape_string($_POST['vat'][$row]);


$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;
$vat_perc=$vat_set_perc/100;



if ($vat==1)
{
	
$vat_value=$vend_price*$vat_perc;	

$vat_account=69;
	
}
else
{

$vat_value=0;	
$vat_account=0;
	
}

$sqlxx = "INSERT INTO cheque_received SET 
account_to_credit='$prod',
vat='$vat',
vat_value='$vat_value',
vat_account='$vat_account',
cheque_received_code_id='$cheque_received_code',
credit_amount='$vend_price'";
$resultxx=mysql_query($sqlxx) or die ( mysql_error());

$cheque_received_id=mysql_insert_id();


/////////////credit other account
//Credit other account
$sql34c2="select * FROM account_type where account_type_id='$prod'";
$results34c2= mysql_query($sql34c2) or die ("Error $sql34c2.".mysql_error());
$rows34c2=mysql_fetch_object($results34c2);
$bal_type2=$rows34c2->balance_type;


if ($bal_type2=='C')
{
	
	$amountx2=$vend_price;
}
else
{
	
	$amountx2=-$vend_price;
	
}

$cr_transaction_code="crccrec".$cheque_received_id;

$sqltrans2="INSERT INTO chart_transactions SET 
account_type_id='$prod',
transaction_section='CCREC',
memo='$memo2',
amount='$amountx2',
credit='$vend_price',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_from',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans2=mysql_query($sqltrans2) or die ("Error $sqltrans2.".mysql_error());

}

?>
<script type="text/javascript">
alert('Record Saved Suvccessfuly. Posting No : <?php echo $cheque_received_code; ?>');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?view_received_cheque_payment";
</script>

<?php
}
mysql_close($cnn);


?>


