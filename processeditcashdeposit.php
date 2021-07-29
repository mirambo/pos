<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['cash_deposit_id'];
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
$comments="Cash deposit of deposit slip number : $slip_no";
$commentsx="Cash deposit of deposit slip number : $slip_no";

//$transaction_desclg='Cash Deposit. Slip No : '.$slip_no;

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


$transaction_desclg='Cheque Deposit Bank To: '.$bank_name.' - '.$account_name;


//$bank_name=$rowscrr->bank_name;

/*$sql= "insert into cheque_deposits values('','$user_id','$cheque_no','$amount','$currency','$curr_rate','$dep_bank',
'$cheque_drawer','$cheque_date','$date_dep','$desc',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

$sql= "update cash_deposits set 
deposit_slip_no='$slip_no', 
amount='$amount',
curr_id='$currency', 
curr_rate='$curr_rate', 
bank_deposited='$dep_bank', 
person_dep='$person_dep', 
phone_no='$phone_no', 
date_deposited='$date_dep', 
comments='$desc'
 

where cash_deposit_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_desclg',
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_dep',
curr_rate='$curr_rate'

WHERE sales_code='cashdep$id'";
$results= mysql_query($sqltranslg) or die ("Error $sql.".mysql_error());

$sqltranslg= "UPDATE cash_ledger SET 
transactions='$transaction_desclg',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_dep',
curr_rate='$curr_rate'

WHERE sales_code='cashdep$id'";
$results= mysql_query($sqltranslg) or die ("Error $sql.".mysql_error());


$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_desclg',
amount='$amount',
debit='$amount',
bank_id='$dep_bank',
currency_code='$currency',
date_recorded='$date_dep',
curr_rate='$curr_rate'

WHERE sales_code='cashdep$id'";
$results= mysql_query($sqltranslg) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated a cash deposit of worth $curr_name $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

//header ("Location:edit_cash_deposits.php?editconfirm=1&cash_deposit_id=$id");

?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php





mysql_close($cnn);


?>


