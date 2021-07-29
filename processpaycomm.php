<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_rep=$_GET['sales_rep'];
$currency=6;
$curr_rate=1;
$comm_due=mysql_real_escape_string($_POST['comm_due']);
$amount_paid=mysql_real_escape_string($_POST['amount_paid']);
$amount_already_paid=mysql_real_escape_string($_POST['amount_already_paid']);
$balance=mysql_real_escape_string($_POST['balance']);

$sqltc="select employees.emp_id,employees.emp_firstname,employees.emp_lastname,user_group.user_group_name from users,user_group,
employees where users.user_group_id=user_group.user_group_id and users.emp_id=employees.emp_id and users.user_id='$sales_rep'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc);
$f_name=$rowstc->emp_firstname;
$f_lname=$rowstc->emp_lastname;
$emp_id=$rowstc->emp_id;

$transaction_desc_comm='Commission Payment made to Staff:'.$f_name.''.$f_lname;


if ($balance<$amount_paid)
{
header ("Location:pay_staff_comm2.php?abnormal=1&comm_due=$comm_due&comm_paid=$amount_already_paid&comm_balance=$balance&sales_rep=$sales_rep");

}
else
{



$sqlrecpt= "insert into comm_payment_receipt values ('','','$amount_paid','$currency','$curr_rate','$mop','$sales_rep','$user_id',NOW(),'')";
$resultsrecpt= mysql_query($sqlrecpt) or die ("Error $sqlrecpt.".mysql_error());


//generate sales receipt number
$queryrec_no="select * from comm_payment_receipt order by comm_payment_receipt_id desc limit 1";
$resultsrec_no=mysql_query($queryrec_no) or die ("Error: $queryrec_no.".mysql_error());

$numrowsrec_no=mysql_fetch_object($resultsrec_no);

$latest_id=$numrowsrec_no->comm_payment_receipt_id;

$year=date('Y');


	$tempnum=$latest_id;
	if($tempnum < 10)
            {
              $receipt_no = "BDCP000".$tempnum."/".$year;
			   

            } else if($tempnum < 100) 
			{
             $receipt_no = "BDCP00".$tempnum."/".$year;
			 			 
            } else 
			{ 
			 $receipt_no= "BDCP".$tempnum."/".$year; 
			 	  
			}
			
$sqluprec_no="UPDATE comm_payment_receipt set receipt_no='$receipt_no' where comm_payment_receipt_id='$latest_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());




$sqlemp_det="select employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,employees.emp_lastname from employees,users where users.emp_id=employees.emp_id and users.user_id='$sales_rep'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
								  

$f_name=$rowsemp_det->emp_firstname;
$m_name=$rowsemp_det->emp_middle_name;
$l_name=$rowsemp_det->emp_lastname;


$sqlfp= "insert into commision_paid values ('','$sales_rep','$amount_paid','6','1',NOW(),'')";
$resultsfp= mysql_query($sqlfp) or die ("Error $sqlfp.".mysql_error());

$queryrec_noxx="select * from commision_paid order by commision_paid_id desc limit 1";
$resultsrec_noxx=mysql_query($queryrec_noxx) or die ("Error: $queryrec_noxx.".mysql_error());
$numrowsrec_noxx=mysql_fetch_object($resultsrec_noxx);
$latest_idxx=$numrowsrec_noxx->commision_paid_id;


$sqltrans= "insert into staff_transactions values('','$emp_id','compaid$latest_idxx','$transaction_desc_comm','-$amount_paid','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into cash_ledger values('','$transaction_desc_comm','-$amount_paid','','$amount_paid','6','1',NOW(),'compaid$latest_idxx')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqlaccpay= "insert into com_payables_ledger values('','$transaction_desc_comm','-$amount_paid','$amount_paid','','6','1',NOW(),'compaid$latest_idxx')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

/*$sqlss="INSERT INTO general_expenses_ledger VALUES('','Commission Payment to  $f_name $m_name $l_name','$amount_paid','$amount_paid', '', '6','1',NOW())";
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Expense Commission Payment to  $f_name $m_name $l_name','$amount_paid','$amount_paid','','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash Commission Payment to  $f_name $m_name $l_name ','-$amount_paid','','$amount_paid','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/





//header ("Location:pay_commission.php");
header ("Location:comm_payment_receipt.php?sales_rep=$sales_rep&amnt_rec=$amount_paid&curr_id=6&receipt_no=$receipt_no");

}


mysql_close($cnn);


?>


