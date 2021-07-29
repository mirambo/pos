<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$date_from=mysql_real_escape_string($_POST['date_from']); 
$credit_account_id=mysql_real_escape_string($_POST['credit_account_id']); 
$shop_id=mysql_real_escape_string($_POST['shop_id']); 
$receipt_no=mysql_real_escape_string($_POST['receipt_no']); 
//$department_id=mysql_real_escape_string($_POST['department_id']); 


$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$comments=mysql_real_escape_string($_POST['terms']);


$sqlxx = "INSERT INTO expenses_code SET 
account_to_credit='$credit_account_id',
currency='$currency',
curr_rate='$curr_rate',
expense_receipt_no='$receipt_no',
expense_date='$date_from',
expense_datetime='$todate',
expense_recorded_by='$user_id',
expense_description='$comments'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());
$expense_code_id=mysql_insert_id();


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

$expense_vat_account=69;
	
}
else
{

$vat_value=0;	
$expense_vat_account=0;
	
}



$sql="SELECT region_id FROM customer_region WHERE region_code='$department_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$department_id=$rows->region_id;


$sqlxx = "INSERT INTO expenses SET 
account_to_debit='$prod',
expenses_vat='$vat',
expenses_vat_value='$vat_value',
expenses_vat_account='$expense_vat_account',
department_code='$department_code',
department_id='$department_id',
expense_code_id='$expense_code_id',
amount_received='$vend_price'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());

}

?>
<script type="text/javascript">
alert('Record Saved Suvccessfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "add_expenses.php?sales_id=<?php echo $expense_code_id ?>";
</script>

<?php

mysql_close($cnn);


?>


