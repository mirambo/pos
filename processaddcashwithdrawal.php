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
$slip_no=mysql_real_escape_string($_POST['slip_no']);
$person_dep=mysql_real_escape_string($_POST['person_dep']);
//$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$phone_no=mysql_real_escape_string($_POST['phone_no']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_dep=mysql_real_escape_string($_POST['date_deposited']);
$comments="Cash withdrawal of withdrawal slip number : $slip_no";


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


$transaction_desclg='Cash Wihdrawal from : '.$bank_name.' - '.$account_name;


$sql="insert into cash_withdrawal values('','$user_id','$slip_no','$amount','$currency','$curr_rate','$dep_bank',
'$person_dep','$phone_no','$date_dep','$desc',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryrec_p="select * from cash_withdrawal order by cash_withdrawal_id desc limit 1";
$resultsrec_p=mysql_query($queryrec_p) or die ("Error: $queryrec_p.".mysql_error());
$numrowsrec_p=mysql_fetch_object($resultsrec_p);
$latest_id=$numrowsrec_p->cash_withdrawal_id;

$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','-$amount','','$amount','$currency','$curr_rate','$date_dep','cashwd$latest_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into cash_ledger values('','$transaction_desclg','$amount','$amount','','$currency','$curr_rate','$date_dep','cashwd$latest_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

/* $sqltranslg= "insert into bank_statement values('','$transaction_desclg','-$amount','','$amount','$mop','$dep_bank','$currency','$curr_rate','$date_dep','cashwd$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error()); */


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded a cash withdrawal of worth $curr_name $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


/*$queryprof="select * from expenses where description='$desc'and mop='$mop' and curr_id='$currency' and amount='$amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());								  
$rowsprof=mysql_fetch_object($resultsprof);
$numrowscomp=mysql_num_rows($resultsprof);


$queryprof2="select * from income where D_id='$D_id'and Project_ID='$Project_ID'";
$resultsprof2=mysql_query($queryprof2) or die ("Error: $queryprof2.".mysql_error());
$numrowsprof2=mysql_num_rows($resultsprof2);
 
//$emailcomp=$rowsprof->email;


if ($numrowscomp>0)

{
 header ("Location:home.php?expenses=expenses&recordexist=1");
}

else

{


if ($mop=='Cash')
{

$sql= "insert into expenses values('','$user_id','$D_id','$Project_ID','$desc','$currency','$curr_rate','$amount',
'$mop','$ref_no','$voucher_no','$cheque_no','$dep_bank','$trans_src_bank','$date_dep',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "insert into petty_cash_expense values('','$desc','$currency','$curr_rate','$amount',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "insert into petty_cash_ledger values('','$desc','$currency','$curr_rate','-$amount','$amount','',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlss="INSERT INTO expenses_ledger VALUES('','$desc','$Project_ID','$Project_ID','$amount','$amount', '', '$currency','$curr_rate',NOW())" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$desc','$D_id','$Project_ID','$amount','$amount','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

//save into income vs expense
$sqlgenled= "insert into incomevsexpense values('','$desc','$D_id','$Project_ID','-$amount','$amount','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash Expenses Paid on $desc','$D_id','$Project_ID','-$amount','','$amount','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into cash_ledger values('','Cash Expenses Paid on $desc','$D_id','$Project_ID','-$amount','','$amount','$currency','$curr_rate',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Recorded an expense $desc worth $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

}
else
{
$sql= "insert into expenses values('','$user_id','$D_id','$Project_ID','$desc','$currency','$curr_rate','$amount',
'$mop','$ref_no','$voucher_no','$cheque_no','$dep_bank','$trans_src_bank','$date_dep',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlss="INSERT INTO expenses_ledger VALUES('','$desc','$Project_ID','$Project_ID','$amount','$amount', '', '$currency','$curr_rate',NOW())" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$desc','$D_id','$Project_ID','$amount','$amount','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

//save into income vs expense
$sqlgenled= "insert into incomevsexpense values('','$desc','$D_id','$Project_ID','-$amount','$amount','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash Expenses Paid on $desc','$D_id','$Project_ID','-$amount','','$amount','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into cash_ledger values('','Cash Expenses Paid on $desc','$D_id','$Project_ID','-$amount','','$amount','$currency','$curr_rate',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Recorded an expense $desc worth $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

}*/


//header ("Location:home.php?expenses=expenses&addexpconfirm=1");



//}





/*$queryprof="select * from  user_groups where group_name='$group_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);*/
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
/*if ($numrowscomp>0)

{

header ("Location:add_user_groups.php? recordexist=1");

}

else 

{



$sql= "insert into user_groups values ('','$group_name','$group_desc','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:add_user_groups.php? addgroupconfirm=1");

}
*/


mysql_close($cnn);


?>


