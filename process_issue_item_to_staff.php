<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//Check redudancy
$order_code=$_GET['order_code'];

$queryod="SELECT * FROM requisition WHERE requisition_id='$order_code'";
$resultsod=mysql_query($queryod) or die ("Error: $queryod.".mysql_error());
$rowsod=mysql_fetch_object($resultsod);

$currency=7;
$curr_rate=1;

$requisition_no=$rowsod->requisition_no;

$ref_no=$rowsod->ref_no;


$supplier_id=$rowsod->requested_by;

$query1="select * from users where user_id='$supplier_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->f_name;


$delivery_date=mysql_real_escape_string($_POST['delivery_date']);
$account_to_debit=mysql_real_escape_string($_POST['debit_account_id']);
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id']);


//$batch_no=mysql_real_escape_string($_POST['batch_no']);
$freight_charges=mysql_real_escape_string($_POST['freight_charges']);
//$curr_rate1=mysql_real_escape_string($_POST['curr_rate']);

$todate=date('Y-m-d H:m:i', time());

//////////////////////////////////////manage batches

foreach($_POST['prod'] as $row3=>$Prod)
{
//$remarks=mysql_real_escape_string($_POST['remarks_id']);
$prod=mysql_real_escape_string($_POST['prod'][$row3]);


$query1p="select * from items where item_id='$prod'";
$results1p=mysql_query($query1p) or die ("Error: $query1p.".mysql_error());
$rows1p=mysql_fetch_object($results1p);
$item_name=$rows1p->item_name;

$requsition_item_id=mysql_real_escape_string($_POST['requsition_item_id'][$row3]);
$account_to_credit=mysql_real_escape_string($_POST['credit_account_id'][$row3]);

$qnty_rec=mysql_real_escape_string($_POST['qnty_rec'][$row3]);
$item_value=mysql_real_escape_string($_POST['item_value'][$row3]);

$bp_totals=$item_value*$qnty_rec;


if ($qnty_rec=='')
{
	
	
}
else
{

$sqlxx = "INSERT INTO issued_items SET 
requisition_id='$order_code',
requisition_item_id='$requsition_item_id',
account_to_debit='$account_to_debit',
account_to_credit='$account_to_credit',
item_id='$prod',
quantity_issued='$qnty_rec',
issued_item_value='$item_value',
date_issued='$delivery_date',
datetime_issued='$todate',
issued_by='$user_id'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());
$latest_id2=mysql_insert_id();






///post info accounts
//credit account
$orderdate = explode('-', $delivery_date);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$dr_transaction_code="dritiss".$latest_id2;
$cr_transaction_code="critiss".$latest_id2;
$memo2='Issue Items To Staff';

$transaction_code="issuitem".$latest_id2;

$memo='Issued '.$qnty_rec.' '.$item_name.' through <a href="create_requisition.php?order_code='.$order_code.'"> requisition no : '.$requisition_no.' ref no '.$ref_no.' </a> from the store';


$sqlaccpay= "insert into item_transactions values('','$prod','$memo','-$qnty_rec','$delivery_date','$day','$month','$year','$transaction_code',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());









//acount to credit
/* $sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$account_to_credit',
transaction_section='STOCKISS',
memo='$memo2',
amount='-$bp_totals',
credit='$bp_totals',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$delivery_date',
transaction_datetime_recorded='$todate',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error());	

/////////////////debit account
$sqltransx2="INSERT INTO chart_transactions SET 
account_type_id='$account_to_debit',
transaction_section='STOCKISS',
memo='$memo2',
amount='$bp_totals',
debit='$bp_totals',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$delivery_date',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransx2=mysql_query($sqltransx2) or die ("Error $sqltransx2.".mysql_error()); */	







///////////insert in cost of production


/* $transaction_code="cop".$latest_id2;

$query1p="select * from items where item_id='$prod'";
$results1p=mysql_query($query1p) or die ("Error: $query1p.".mysql_error());
$rows1p=mysql_fetch_object($results1p);
$item_name=$rows1p->item_name;


$memo2='Issue of items name '.$item_name.' , quantity : '.$qnty_rec.' from the store';


$sqlaccpay= "insert into cost_of_production_ledger values('','$memo2','$bp_totals','$bp_totals','','$currency','$curr_rate','$delivery_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());	


$sqlaccpay= "insert into inventory_ledger values('','$memo2','-$bp_totals','','$bp_totals','$currency','$curr_rate','$delivery_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());	 */

}



}


/* $sql33="INSERT INTO received_stock_expense VALUES('','$order_code_id','$order_code','$account_id','$amount','$currency','$curr_rate','$delivery_date','','$user_id')";
$results33=mysql_query($sql33) or die ("Error $sql33.".mysql_error()); */



//header ("Location:receive_stock_to_warehouse.php?success=1&order_code_id=$order_code_id&qnty_ordered=$qnty_ordered&order_code=$order_code");

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "home.php?issue_stock=issue_stock&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);


?>


