<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$desc=mysql_real_escape_string($_POST['desc']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheque_drawer=mysql_real_escape_string($_POST['cheque_drawer']);
//$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$cheque_date=mysql_real_escape_string($_POST['cheque_date']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_dep=mysql_real_escape_string($_POST['date_dep']);
$transaction_desclg='Cheque Deposit. Cheque No : '.$cheque_no;

$querycr="select * from banks where bank_id='$dep_bank'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
//$curr_rate=$rowscr->curr_rate; 
$bank_name=$rowscr->bank_name;
$account_name=$rowscr->account_name;

$transaction_desclg='Cheque deposit to : '.$bank_name.' - '.$account_name;

$querycrr="select * from currency where curr_id='$currency'";
$resultscrr=mysql_query($querycrr) or die ("Error: $querycrr.".mysql_error());							  
$rowscrr=mysql_fetch_object($resultscrr);
$curr_name=$rowscrr->curr_name; 

$sql= "insert into cheque_deposits values('','$user_id','$cheque_no','$amount','$currency','$curr_rate','$dep_bank',
'$cheque_drawer','$cheque_date','$date_dep','$desc',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

 $queryrec_p="select * from cheque_deposits order by cheque_deposit_id desc limit 1";
$resultsrec_p=mysql_query($queryrec_p) or die ("Error: $queryrec_p.".mysql_error());
$numrowsrec_p=mysql_fetch_object($resultsrec_p);
$latest_id=$numrowsrec_p->cheque_deposit_id;


/* $sqltranslg= "insert into bank_statement values('','$transaction_desclg','$amount','$amount','','$mop','$dep_bank','$currency','$curr_rate','$date_dep','chqdep$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error()); */

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded a cheque deposit of cheque number:$cheque_no worth $curr_name $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php




mysql_close($cnn);


?>


