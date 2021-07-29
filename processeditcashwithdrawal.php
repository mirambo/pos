<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['cash_withdrawal_id'];
$desc=mysql_real_escape_string($_POST['desc']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$slip_no=mysql_real_escape_string($_POST['slip_no']);
$person_dep=mysql_real_escape_string($_POST['person_dep']);
//$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$phone_no=mysql_real_escape_string($_POST['phone_no']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_dep=mysql_real_escape_string($_POST['date_deposited']);
$comments="Cash withdrawal of withdrawal slip number : $slip_no";
$commentsx="Cash withdrawal of withdrawal slip number : $slip_no";


$querycr="select * from banks where bank_id='$dep_bank'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
//$curr_rate=$rowscr->curr_rate; 
$bank_name=$rowscr->bank_name;
$account_name=$rowscr->account_name;

$querycrr="select * from currency where curr_id='$currency'";
$resultscrr=mysql_query($querycrr) or die ("Error: $querycrr.".mysql_error());							  
$rowscrr=mysql_fetch_object($resultscrr);
$curr_name=$rowscrr->curr_name; 


$transaction_desclg='Cash Wihdrawal from : '.$bank_name.' - '.$account_name;


$sql= "update cash_withdrawal set 
withdrawal_slip_no='$slip_no', 
amount='$amount',
curr_id='$currency', 
curr_rate='$curr_rate', 
bank_withdrawn='$dep_bank', 
person_withdrawn='$person_dep', 
phone_no='$phone_no', 
date_withdrawn='$date_dep', 
comments='$desc'
 

where cash_withdrawal_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_desclg',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_dep',
curr_rate='$curr_rate'

WHERE sales_code='cashwd$id'";
$results= mysql_query($sqltranslg) or die ("Error $sql.".mysql_error());

$sqltranslg= "UPDATE cash_ledger SET 
transactions='$transaction_desclg',
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_dep',
curr_rate='$curr_rate'

WHERE sales_code='cashwd$id'";
$results= mysql_query($sqltranslg) or die ("Error $sql.".mysql_error());


$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_desclg',
amount='-$amount',
credit='$amount',
bank_id='$dep_bank',
currency_code='$currency',
date_recorded='$date_dep',
curr_rate='$curr_rate'

WHERE sales_code='cashwd$id'";
$results= mysql_query($sqltranslg) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated a cash widthdrawal of worth $curr_name $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

//header ("Location:edit_cashwithdrawal.php?cash_withdrawal_id=$id&editconfirm=1");

?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php





mysql_close($cnn);


?>


