<?php 
include('Connections/fundmaster.php');

$emp_id=mysql_real_escape_string($_POST['emp_id']);
$current_month=mysql_real_escape_string($_POST['current_month']);

$sqlredday="select * from payroll where payment_month='$current_month' AND emp_id=$emp_id";
$resultsredday= mysql_query($sqlredday) or die ("Error $sqlredday.".mysql_error());
$rowsredday=mysql_fetch_object($resultsredday);
$numrowsredday=mysql_num_rows($resultsredday);


if ($numrowsredday>0)
{

header ("Location:generate_payroll.php?recordexist=1");

}
else
{

$sql= "insert into payroll values ('','$emp_id','','','','','','','','$current_month','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryrec_no="select * from payroll order by payroll_id desc limit 1";
$resultsrec_no=mysql_query($queryrec_no) or die ("Error: $queryrec_no.".mysql_error());

$numrowsrec_no=mysql_fetch_object($resultsrec_no);

$payroll_id=$numrowsrec_no->payroll_id;



$querylatelpo="select * from salary_payments order by salary_payment_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_payment_id=$numrowsrec_no->payroll_id;

$year=date('Y');
$tempnum=$latest_invoice_payment_id;
	if($tempnum < 10)
            {
              $receipt_no = "PS000".$tempnum."/".$year;
		
			   
		 
			  
			  
            } else if($tempnum < 100) 
			{
             $receipt_no = "PS00".$tempnum."/".$year;
		  
			 
	
            } else 
			{ 
			$receipt_no="PS".$tempnum."/".$year; 	

			}
			
$sqllpono="UPDATE payroll set payroll_no='$receipt_no' where payroll_id='$latest_invoice_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


header ("Location:payroll_details.php?emp_id=$emp_id&current_month=$current_month&payroll_id=$payroll_id");

}








?>