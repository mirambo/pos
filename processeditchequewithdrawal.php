<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['cheque_withdrawal_id'];
$desc=mysql_real_escape_string($_POST['desc']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheque_drawer=mysql_real_escape_string($_POST['cheque_drawer']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$cheque_date=mysql_real_escape_string($_POST['cheque_date']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_dep=mysql_real_escape_string($_POST['date_deposited']);
$comments=mysql_real_escape_string($_POST['desc']);
$commentsx="Cheque Withdrawal of cheque number : $cheque_no";

$querycr="select * from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
//$curr_rate=$rowscr->curr_rate;
$curr_initials=$rowscr->curr_name;

$querycr="select * from banks where bank_id='$dep_bank'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
//$curr_rate=$rowscr->curr_rate; 
$bank_name=$rowscr->bank_name;
$account_name=$rowscr->account_name;

$transaction_desclg='Cheque Withdrawal From Bank : '.$bank_name.'-'.$account_name.' Cheque No:'.$cheque_no;

/*$sql= "insert into cheque_deposits values('','$user_id','$cheque_no','$amount','$currency','$curr_rate','$dep_bank',
'$cheque_drawer','$cheque_date','$date_dep','$desc',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

$sql= "update cheque_withdrawals set 
cheque_no='$cheque_no', 
amount='$amount',
curr_id='$currency', 
curr_rate='$curr_rate', 
bank_withdrawn='$dep_bank', 
date_drawn='$cheque_date', 
date_withdrawn='$date_dep', 
comments='$comments'
 

where cheque_withdrawal_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_desclg',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_dep',
curr_rate='$curr_rate'

WHERE sales_code='chqwd$id'";
$results= mysql_query($sqltranslg) or die ("Error $sql.".mysql_error());

$sqltranslg= "UPDATE cash_ledger SET 
transactions='$transaction_desclg',
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_dep',
curr_rate='$curr_rate'

WHERE sales_code='chqwd$id'";
$results= mysql_query($sqltranslg) or die ("Error $sql.".mysql_error());


$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_desclg',
amount='-$amount',
credit='$amount',
bank_id='$dep_bank',
currency_code='$currency',
date_recorded='$date_dep',
curr_rate='$curr_rate'

WHERE sales_code='chqwd$id'";
$results= mysql_query($sqltranslg) or die ("Error $sql.".mysql_error());

/*$sql="update petty_cash_income set amount='$amount',currency='$currency', curr_rate='$curr_rate' where description LIKE '%$commentsx%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql="update petty_cash_ledger set amount='$amount',currency='$currency', curr_rate='$curr_rate',money_out='$amount' where transactions LIKE '%$commentsx%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql="update cash_ledger set amount='$amount',debit='$amount',currency_code='$currency', curr_rate='$curr_rate' where transactions LIKE '%$commentsx%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql="update bank_ledger set amount='-$amount',credit='$amount',currency_code='$currency', curr_rate='$curr_rate' where transactions LIKE '%$commentsx%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated a cheque withdrawal details of cheque number:$cheque_no worth $curr_name $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

//header ("Location:edit_chequewithdrawal.php?editconfirm=1&cheque_withdrawal_id=$id");

?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php





mysql_close($cnn);


?>


