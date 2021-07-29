<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['id'];

$date_from=mysql_real_escape_string($_POST['date_from']); 
$account_id=mysql_real_escape_string($_POST['account_id']); 
$budget_year=mysql_real_escape_string($_POST['budget_year']); 
//$receipt_no=mysql_real_escape_string($_POST['receipt_no']); 
//$department_id=mysql_real_escape_string($_POST['department_id']); 
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$comments=mysql_real_escape_string($_POST['terms']);

if ($id=='')
{
$sqlxx = "INSERT INTO budget_code SET 
budget_account='$account_id',
currency='$currency',
curr_rate='$curr_rate',
budget_date='$date_from',
budget_year='$budget_year',
budget_datetime='$todate',
budget_recorded_by='$user_id',
budget_description='$comments'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());
$budget_code_id=mysql_insert_id();


foreach($_POST['month'] as $row=>$Prod)
{

$month=mysql_real_escape_string($_POST['month'][$row]);
$amount=mysql_real_escape_string($_POST['amount'][$row]);

$sqlxx = "INSERT INTO budget SET 
budget_code_id='$budget_code_id',
budget_amount='$amount',
budget_month='$month'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());

}

?>
<script type="text/javascript">
alert('Record Saved Suvccessfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?view_budget=view_budget";
</script>

<?php
}
else
{
	


$sqlxx ="UPDATE budget_code SET 
budget_account='$account_id',
currency='$currency',
curr_rate='$curr_rate',
budget_date='$date_from',
budget_year='$budget_year',
budget_description='$comments' WHERE budget_code_id='$id'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());	
	
	
$sql32="DELETE from budget where budget_code_id='$id'";
$results32= mysql_query($sql32) or die ("Error $sql32.".mysql_error());	
	
	
	
foreach($_POST['month'] as $row=>$Prod)
{

$month=mysql_real_escape_string($_POST['month'][$row]);
$amount=mysql_real_escape_string($_POST['amount'][$row]);

$sqlxx = "INSERT INTO budget SET 
budget_code_id='$id',
budget_amount='$amount',
budget_month='$month'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());

}	


?>
<script type="text/javascript">
alert('Record Updated Suvccessfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?view_budget=view_budget";
</script>

<?php
	
	
	
}
mysql_close($cnn);


?>


