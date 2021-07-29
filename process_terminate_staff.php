<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
$emp_id=mysql_real_escape_string($_POST['emp_id']);

$querylatelpo="select * from employees WHERE emp_id='$emp_id'";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
$terminating_staff=$rowslatelpo->emp_firstname.' '.$rowslatelpo->emp_middle_name.' '.$rowslatelpo->emp_lastname;


$exit_date=mysql_real_escape_string($_POST['exit_date']);



$staff_balance=mysql_real_escape_string($_POST['staff_balance']);
$comments=mysql_real_escape_string($_POST['comments']);



$sql= "insert into terminated_staff values('','$emp_id','$exit_date','$staff_balance',NOW(),'$comments','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqllpono="UPDATE employees set status='1' where emp_id='$emp_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$queryprof="select * from terminated_staff order by terminated_staff_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());								  
$rowsprof=mysql_fetch_object($resultsprof);

$latest_id=$rowsprof->terminated_staff_id;

$transaction_desc="Termination Of Staff ".$terminating_staff.' ('.$comments.')';
$transaction_desc2="Balance Payment Due to Termination Of Staff ".$terminating_staff.' ('.$comments.')';


$currency=6;
$querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;



$sql4="INSERT INTO staff_transactions VALUES('','$emp_id','term$latest_id','$transaction_desc','-$staff_balance','$currency',
'$curr_rate',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

$sqltranslg= "insert into salary_expenses_ledger values('','$transaction_desc2','-$staff_balance','$staff_balance','','$currency','$curr_rate',NOW(),'term$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqlgenled= "insert into cash_ledger values('','$transaction_desc2','-$staff_balance','','$staff_balance','$currency','$curr_rate',NOW(),'term$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());




header ("Location:terminate_staff.php?addconfirm=1");

mysql_close($cnn);


?>


