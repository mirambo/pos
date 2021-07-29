<?php 
include('Connections/fundmaster.php');

//$emp_id=mysql_real_escape_string($_POST['emp_id']);
$current_month=mysql_real_escape_string($_POST['current_month']);

$sqlredday="select * from payroll where payment_month='$current_month'";
$resultsredday= mysql_query($sqlredday) or die ("Error $sqlredday.".mysql_error());
$rowsredday=mysql_fetch_object($resultsredday);
$numrowsredday=mysql_num_rows($resultsredday);


if ($numrowsredday>0)
{

header ("Location:generate_payroll.php?recordexist=1");

}
else
{
//gnerate paroll numbers
foreach($_POST['emp_id'] as $row=>$Emp_id)
{

$emp_id=mysql_real_escape_string($_POST['emp_id'][$row]);

$sql= "insert into payroll values ('','$emp_id','','','','','','','','$current_month','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryrec_no="select * from payroll order by payroll_id desc limit 1";
$resultsrec_no=mysql_query($queryrec_no) or die ("Error: $queryrec_no.".mysql_error());

$numrowsrec_no=mysql_fetch_object($resultsrec_no);

$payroll_id=$numrowsrec_no->payroll_id;

$year=date('Y');
$tempnum=$payroll_id;
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
			
$sqllpono="UPDATE payroll set payroll_no='$receipt_no' where payroll_id='$payroll_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

//calculation of advance
$sqladv="select * from staff_advance where emp_id='$emp_id'";
$resultsadv= mysql_query($sqladv) or die ("Error $sqladv.".mysql_error());
if ($numsadv=mysql_num_rows($resultsadv) > 0)
						  {
						  while ($rowsadv=mysql_fetch_object($resultsadv))
							  { 
							  $install=$rowsadv->install;
							  $adv_paid=$rowsadv->amount_received;
							  
$sqldedad="select SUM(amount_repaid) as adv_amount_paid from staff_advance_repayment where emp_id='$emp_id'";
$resultsdedad= mysql_query($sqldedad) or die ("Error $sqldedad.".mysql_error());
$rowsdedad=mysql_fetch_object($resultsdedad);
$adv_amount_paid=$rowsdedad->adv_amount_paid;	
$bal=$adv_paid-$adv_amount_paid;


if ( $adv_paid==$install && $adv_amount_paid=='')	
{
$amnt_repaid=$install;

}	



if ( $adv_paid > $install && $adv_amount_paid!='')	
{
$amnt_repaid=$install;

}

if ( $adv_paid > $install && $adv_amount_paid=='')	
{
$amnt_repaid=$install;

}	

if ( $bal>$install && $adv_amount_paid!='')	
{
$amnt_repaid=$install;

}	

if ( $install>$bal && $adv_amount_paid!='')	
{
$amnt_repaid=$bal;

}	  
													  
$sqlss="INSERT INTO staff_advance_repayment VALUES('','$emp_id','$payroll_id','$amnt_repaid','$current_month',NOW(),'0')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());							  
							  
							  
							  
							  
							  }
							  
							  }
							  
							  
//Insert default deductions							  
$sqlded="select * from deduction_logs order by deduction_log_name asc";
$resultsded= mysql_query($sqlded) or die ("Error $sqladv.".mysql_error());
if ($numsded=mysql_num_rows($resultsded) > 0)
						  {
						  while ($rowsded=mysql_fetch_object($resultsded))
							  { 
							  $deduction_amount=$rowsded->default_deduction_amount;
							  $deduction_name=$rowsded->deduction_log_name;							  
							  $deduction_log_id=$rowsded->deduction_log_id;	

$sql= "insert into deductions values ('','$emp_id','$payroll_id','$deduction_log_id','$deduction_name','$deduction_amount','$current_month')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());							  

}

}


$sqlben="select * from benefit_logs order by benefit_log_name asc";
$resultsben= mysql_query($sqlben) or die ("Error $sqlben.".mysql_error());
if ($numsbed=mysql_num_rows($resultsben) > 0)
						  {
						  while ($rowsben=mysql_fetch_object($resultsben))
							  { 
							  $benefit_amount=$rowsben->default_benefit_amount;
							  $benefit_name=$rowsben->benefit_log_name;							  
							  $benefit_log_id=$rowsben->benefit_log_id;	

$sql= "insert into benefits values ('','$emp_id','$payroll_id','$benefit_log_id','$benefit_name','$benefit_amount','$current_month')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());							  

}

}










}


//post the salary advance









}



header ("Location:generate_payroll.php?updateconfirm=1");




?>