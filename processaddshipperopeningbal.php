<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$supplier=mysql_real_escape_string($_POST['supplier']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$bal_type=mysql_real_escape_string($_POST['bal_type']);
$transaction="Opening Balance";

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
//curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;


/*
$queryprof="select * from  supplier_transactions where transaction='$transaction' AND supplier_id='$supplier'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

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

header ("Location:add_supplier_opening_balance.php? recordexist=1");

}

else 

{*/


/*if ($bal_type=='1')
{

$sqltrans= "insert into shippers_transactions values('','$supplier','0','$transaction','$amount','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

}
elseif ($bal_type=='0')
{*/
$sqltrans= "insert into shippers_transactions values('','$supplier','0','$transaction','$amount','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','Shipper Opening Balance','$amount','','$amount','$currency','$curr_rate',NOW(),'$get_latest_order_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

/*$sqllpo= "insert into lpo values('','','','$amount','$amount','','$currency','$curr_rate','$supplier','','$user_id',NOW(),'')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());*/


/*}
else
{

$sqltrans= "insert into shippers_transactions values('','$supplier','0','$transaction','$amount','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


}

*/







header ("Location:add_shipper_opening_balance.php? addconfirm=1");

//}

//$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());
//echo $results;
//$count=mysql_num_rows($results);
//echo $count;
/*if (==1)
{
session_start();
$_SESSION['admin']= $adminusern;
/*
session_register("myusername");
session_register("mypassword");*/
/*header("Location:membersarea.php");
}
else
{*/
//header ("Location:adduser.php? createuserconfirm=1");
//echo "<p align='center'><font color='#FF0000' size='-1'>Wrong Username and Password.</font></p>";


mysql_close($cnn);


?>


