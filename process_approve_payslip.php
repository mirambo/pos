<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$payroll_id_orid=mysql_real_escape_string($_POST['payroll_id']);


$payroll_id=$payroll_id_orid+1;
/*$emp_id=mysql_real_escape_string($_POST['emp_id']);


$sqlemp_det="select * from employees where emp_id='$emp_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
$station=$rowsemp_det->department;

$staff=$rowsemp_det->emp_firstname.' '.$rowsemp_det->emp_middle_name.' '.$rowsemp_det->emp_lastname;

$current_month=mysql_real_escape_string($_POST['current_month']);
$advance=mysql_real_escape_string($_POST['advance']);
$comm_due=mysql_real_escape_string($_POST['comm_due']);
$unpaid_bal=mysql_real_escape_string($_POST['unpaid_bal']);
$net_pay=mysql_real_escape_string($_POST['net_pay']);


//update payroll with net pay
$sql= "update payroll set net_pay='$net_pay',unpaid_balance='$unpaid_bal',comm_due='$comm_due',salary_advance='$advance' 
where payroll_id='$payroll_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql46="INSERT INTO approved_payroll VALUES('','$payroll_id',NOW(),'$user_id','')" or die(mysql_error());
$results46= mysql_query($sql46) or die ("Error $sql46.".mysql_error()); 

$sql22= "update payroll set status='1' where payroll_id='$payroll_id'";
$results22= mysql_query($sql22) or die ("Error $sql22.".mysql_error());

if ($station==3)
{

//$transaction_desc="Prepaid Salary Advance to Staff :".$staff;
/////////////////////////////////VALID
$transaction_desc2="Deduction of Salary Advance From Staff : ".$staff." for the month of ".$current_month;
$transaction_desc3="Counter Commission payable to : ".$staff." for the month of ".$current_month;
$transaction_desc4="Net Amount payable to :".$staff."for the month of ".$current_month;
$transaction_desc5="Counter Previous Balance for staff: ".$staff." before the month of ".$current_month;
/////////////////////////////////VALID
//cancel advance
 $sql4="INSERT INTO staff_transactions VALUES('','$emp_id','payrol$payroll_id','$transaction_desc2','-$advance','6',
'1',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error()); 

/*$sqlss="INSERT INTO general_expenses_ledger VALUES('','$transaction_desc2','$advance','$advance', '', '6','1',NOW(),'payrol$payroll_id')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());*/
/*
/////////////////////////////////VALID
$sqltranslg= "insert into prepaid_salary_ledger values('','$transaction_desc2','-$advance',' ','$advance','6','1',NOW(),'payrol$payroll_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into cash_ledger values('','$transaction_desc2','$advance','$advance','','6','1',NOW(),'payrol$payroll_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error()); 

/////////////////////////////////VALID
 //cancel commission payables with the balance and post with the net balance
$sql4="INSERT INTO staff_transactions VALUES('','$emp_id','payrol$payroll_id','$transaction_desc3','-$comm_due','6',
'1',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());



$sqlaccpay= "insert into com_payables_ledger values('','$transaction_desc3','-$comm_due','$comm_due','','6','1',NOW(),'payrol$payroll_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlss="INSERT INTO general_expenses_ledger VALUES('','$transaction_desc3','-$comm_due','', '$comm_due', '6','1',NOW(),'payrol$payroll_id')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());


//cancel unpaid balance
$sql4="INSERT INTO staff_transactions VALUES('','$emp_id','payrol$payroll_id','$transaction_desc5','-$unpaid_bal','6',
'1',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

$sqlaccpay= "insert into com_payables_ledger values('','$transaction_desc5','-$unpaid_bal','$unpaid_bal','','6','1',NOW(),'payrol$payroll_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlss="INSERT INTO general_expenses_ledger VALUES('','$transaction_desc5','-$unpaid_bal','', '$unpaid_bal', '6','1',NOW(),'payrol$payroll_id')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());


//insert the net pay to payables

$sql4="INSERT INTO staff_transactions VALUES('','$emp_id','payrol$payroll_id','$transaction_desc4','$net_pay','6','1',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());

$sqlaccpay= "insert into com_payables_ledger values('','$transaction_desc4','$net_pay','','$net_pay','6','1',NOW(),'net$payroll_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlss="INSERT INTO general_expenses_ledger VALUES('','$transaction_desc4','$net_pay','$net_pay','', '6','1',NOW(),'payrol$payroll_id')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error()); 

}
else
{


}*/

//header ("Location:pre_salary_payment.php?payroll_id=$payroll_id&net_pay=$net_pay");
header ("Location:adjust_payroll_details.php?payroll_id=$payroll_id");

mysql_close($cnn);


?>


