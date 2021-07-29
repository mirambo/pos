<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
$new=$_GET['new'];
$customer_id=$_GET['customer_id'];
$customer_name=mysql_real_escape_string($_POST['customer_name']);
$customer_code=mysql_real_escape_string($_POST['customer_code']);
$value_at_hand=mysql_real_escape_string($_POST['value_at_hand']);
$date_dep=mysql_real_escape_string($_POST['date_dep']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$address=mysql_real_escape_string($_POST['address']);
$town=mysql_real_escape_string($_POST['town']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$pin=mysql_real_escape_string($_POST['pin']);
$credit_limit=mysql_real_escape_string($_POST['credit_limit']);
$credit_days=mysql_real_escape_string($_POST['credit_days']);
$region=mysql_real_escape_string($_POST['region']);


/* $customer_name=mysql_real_escape_string($_POST['customer_name']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$address=mysql_real_escape_string($_POST['address']);
$town=mysql_real_escape_string($_POST['town']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$pin=mysql_real_escape_string($_POST['pin']);
$credit_limit=mysql_real_escape_string($_POST['credit_limit']);
$credit_days=mysql_real_escape_string($_POST['credit_days']); */

 
$sqlupdt= "UPDATE customer SET 
customer_name ='$customer_name',
customer_code ='$customer_code',
contact_person='$contact_person',
address='$address',
town='$town',
email='$email',
phone='$phone',
credit_limit='$credit_limit',
credit_days='$credit_days',
region_id='$region',
opening_balance='$value_at_hand',
customer_curr_rate='$curr_rate',
customer_currency='$currency',
opening_balance_date='$date_dep',
pin='$pin' 
WHERE customer_id='$customer_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$memo="Opening Balance for customer ".$customer_name."as at ".$date_dep;
//$memo="Opening Balance";
$amount=$value_at_hand;
$transaction_code="custop".$customer_id;

$sqlprof="select * from customer_transactions where transaction_code='$transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{


$sqlupdt2= "UPDATE customer_transactions SET 
customer_id='$customer_id',
transaction='$memo',
amount='$amount',
curr_rate='$curr_rate',
currency='$currency',
transaction_date='$date_dep'
WHERE transaction_code='$transaction_code'";
$resultsupdt2= mysql_query($sqlupdt2) or die ("Error $sqlupdt2.".mysql_error());

}
else
{

$sqlupdt2= "INSERT INTO customer_transactions SET 
customer_id='$customer_id',
transaction='$memo',
curr_rate='$curr_rate',
amount='$amount',
currency='$currency',
transaction_code='$transaction_code',
transaction_date='$date_dep'";
$resultsupdt2= mysql_query($sqlupdt2) or die ("Error $sqlupdt2.".mysql_error());	
	
	
	
	
}

/* $sql= "update clients set c_name='$customer_name', c_address='$address',c_paddress='$address',c_phone='$phone',c_email='$email'
,contact_person='$contact_person',c_town='$town', pin='$pin', monthly_statement='$allow_add',statement_date='$date_sent' where client_id='$customer_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update customer $customer_name details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


//header ("Location:home.php?editproject=editproject&customer_id=$customer_id&editsuccess=1");

?>
<script type="text/javascript">
alert('Record Updated Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


mysql_close($cnn);




?>


