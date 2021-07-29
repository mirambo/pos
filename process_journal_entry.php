<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$acc_debit=mysql_real_escape_string($_POST['acc_debit']);
$acc_credit=mysql_real_escape_string($_POST['acc_credit']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$desc=mysql_real_escape_string($_POST['desc']);
$date_recorded=mysql_real_escape_string($_POST['date_recorded']);
$cost_center=mysql_real_escape_string($_POST['cost_center']);
$mop=mysql_real_escape_string($_POST['mop']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$banks=mysql_real_escape_string($_POST['banks']);

$querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;

$sql= "insert into general_journal values('','$acc_debit','$acc_credit','$amount','$currency','$curr_rate','$desc','$user_id','0','0','0',
'$date_recorded','$cost_center','$mop','$ref_no','$banks','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/*
$queryprof="select * from expenses where description='$desc'and mop='$mop' and curr_id='$currency' and amount='$amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;

if ($numrowscomp>0)

{

 header ("Location:home.php?expenses=expenses&recordexist=1");

}

else 

{*/



/*$sqlss="INSERT INTO expenses_ledger VALUES('','$desc','$amount','$amount', '', '$currency','$curr_rate',NOW())" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$desc','$amount','$amount','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash Expenses Paid on $desc','-$amount','','$amount','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into cash_ledger values('','Cash Expenses Paid on $desc','-$amount','','$amount','$currency','$curr_rate',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Recorded an expense $desc worth $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());*/


header ("Location:home.php?journalentry=journalentry&addconfirm=1");



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


