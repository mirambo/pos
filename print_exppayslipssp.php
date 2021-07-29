<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['emp_id'];
$year=date('Y');
$payrol_basic_log=$_GET['payrol_basic_log'];
$slip_no=$_GET['slip_no'];
$current_month=$_GET['month_gen'];
$date_generated=$_GET['date_gen'];
$working_days=$_GET['working_days'];
$date_generated=$_GET['date_gen'];
$curr_rate=$_GET['curr_rate'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SIPET Southern Sudan - Payslip <?php echo $slip_no; ?></title>
<link rel="stylesheet" type="text/css" href="csspr.css" />

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
.table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:0px solid black;

}
</style>

<!-- Table goes in the document BODY -->


</head>

<body ><!--onload="window.print();"-->
<table width="700" border="0" align="center" >
  <tr>
    <td colspan="3" rowspan="7"><img src="images/logoeaco.jpg" /></td>
    <td colspan="3" align="center"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" ><strong><p style="font-size:14px;">SIPET ENGINEERING AND CONSULTANCY SERVICES LTD.</p></strong></td>
  </tr>
  <tr>
    <td colspan="3" align="center">Tel : +254 (0) 538004579</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
        Email : info@specs-ssd.com
    </div></td>
  </tr>  
  <tr>
    <td colspan="3" align="center">Website: www.specs-ssd.com </td>
  </tr>
  
   <tr>
    <td colspan="3"><div align="center">
        
    </div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
        
    </div></td>
  </tr>
   <tr>
    <td colspan="3"><div align="center">
        
    </div></td>
  </tr>
  
  <tr height="30">
    <td colspan="6" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">PAYSLIP</span></td>
  </tr>
  
  
 
  
  
  
 
  
  
  <?php 
  
$sqlemp_det="select * from employees where emp_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);




$sqllpdet="select * from payrol_expbasic_log where emp_id='$id' AND payment_month='$current_month' order by payrol_basic_log_id desc limit 1";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
 




  ?>

  
  
</table>

<table width="700" border="0" align="center">
<tr height="25">
<td><strong>Employee No : </strong></td>
    
    </td>
	<td ><?php echo $rowsemp_det->employee_no; ?></td><td><strong>Date Generated : </strong></td><td><?php echo $gen_date=(Date("d-m-Y")); ?></td>

</tr>
<tr height="25">
<td><strong>Employee  Name: </strong></td>
    
    </td>
	<td ><?php echo $rowsemp_det->emp_fname.' '.$rowsemp_det->emp_mname.' '.$rowsemp_det->emp_lname; ?></td><td><strong>Month : </strong></td><td colspan="3"><?php echo $current_month; ?></td>

</tr>
<tr height="25">
<td><strong>Payroll Number :</strong></td>
    
    </td>
	<td ><?php echo $slip_no; ?></td><td><strong>Total Working Days: </strong></td><td ><?php echo $working_days;?> Days</td>

</tr>

</table>
<table width="700" border="0" align="center" class="table1">

<tr height="25" align="center"> 
<td align="center" width="20%"><strong>Earnings</strong></td>
	<td align="center" width="30%"><strong>Amount (SSP)</strong></td><td><strong>Deductions</strong></td><td><strong>Amount(SSP)</strong></td>

</tr>
<tr height="25" align="center"> 
<td align="center" colspan="2" valign="top">
<table width="100%" style="border:0px;" class="table">
	<tr><td>Standard Net Pay</td><td align="right"><?php echo number_format($rowslpdet->net_pay_stnd*$curr_rate,2);
	$ttl_bas_pay=$rowslpdet->basic_pay;?></td></tr>
	<tr><td>Basic Salary</td><td align="right"><?php echo number_format($gross_pay=$rowslpdet->basic_salary*$curr_rate,2);
	
	//$ttl_com=$rowslpdet->comm_pay;
	
	?></td></tr>
	
	
	<tr><td colspan="2" align="center"><strong>Allowances</strong></td></tr>
	
	<tr><td>Safety Allowances</td><td align="right"><?php 
	
	 echo number_format($safety_allowance=$rowslpdet->safety_allowance*$curr_rate,2);
	
	?></td></tr>
	<tr><td>Regional Allowances</td><td align="right"><?php 
	
	 echo number_format($regional_allowance=$rowslpdet->regional_allowance*$curr_rate,2);
	
	?></td></tr>
	<tr><td>Vacation Allowances(<?php echo $rowslpdet->vacation_days;?> Days)</td><td align="right"><?php 
	
	 echo number_format($vacation_amount=$rowslpdet->vacation_amount*$curr_rate,2);
	
	?></td></tr>
	
	<tr><td>Overtime Amount(<?php echo $rowslpdet->overtime1; ?> Hrs)</td><td align="right"><?php echo number_format($overtime_amnt1=$rowslpdet->overtime_amnt1*$curr_rate,2);
	
	//$ttl_com=$rowslpdet->comm_pay;
	
	?></td></tr>
	
	<tr><td>Other Payment</td><td align="right"><?php 
	
	 echo number_format($otherpayment=$rowslpdet->otherpayment*$curr_rate,2);
	
	?></td></tr>
</table>

</td>
	<td colspan="3" valign="top">
	<table width="100%" style="border:0px;" valign="top" class="table">
	<tr><td>Other Deductions</td><td align="right"><?php echo number_format($other_deduction=$rowslpdet->other_deductions*$curr_rate,2); ?></td></tr>
	
	
	
	
	</td></tr>
	
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<!--<tr><td colspan="2"><i>Cumulative Personal SIC Contr. upto  
	<?php
echo $current_month.' </i> <strong> -';
$ttl_dedall=0;
$sqldedall="select deduction_logs.deduction_amount,payrol_basic_log.payment_month from deduction_logs,payrol_basic_log 
where payrol_basic_log.payrol_basic_log_id=deduction_logs.payrol_basic_log_id AND deduction_logs.emp_id='$id' and payrol_basic_log.date_paid<='$date_generated'";
$resultsdedall= mysql_query($sqldedall) or die ("Error $sqldedall.".mysql_error());

if (mysql_num_rows($resultsdedall)>0)
{

while ($rowsdedall=mysql_fetch_object($resultsdedall))
{
?>
	
	<?php 
	
number_format($all_dedall=$rowsdedall->deduction_amount,2);

$ttl_dedall=$ttl_dedall+$all_dedall;


}
echo number_format($ttl_dedall,2);
}

?> </strong></td><td> 
</td></tr>
<tr><td colspan="2"><i>Cumulative Comp. SIC Contr upto 
	<?php
	echo $current_month.' </i><strong> -';
$ttl_dedallcomp=0;
$sqldedallcomp="select comp_sic_rate from payrol_basic_log 
where payrol_basic_log.emp_id='$id' and date_paid<='$date_generated'";
$resultsdedallcomp= mysql_query($sqldedallcomp) or die ("Error $sqldedallcomp.".mysql_error());

if (mysql_num_rows($resultsdedallcomp)>0)
{

while ($rowsdedallcomp=mysql_fetch_object($resultsdedallcomp))
{
?>
	
	<?php number_format($all_dedallcomp=$rowsdedallcomp->comp_sic_rate,2);?>
	<?php
	$ttl_dedallcomp=$ttl_dedallcomp+$all_dedallcomp;

}
echo number_format($ttl_dedallcomp,2);
}

?></strong></td><td> 
</td></tr>

<tr><td colspan="2"><i>Total SIC Contr. upto 
	<?php
	echo $current_month.' </i><strong> -'.number_format($ttl_sic=$ttl_dedall+$ttl_dedallcomp,2);

?></strong></td><td> 
</td></tr>-->
	


	
	
	</table>
	
	
	
	
	</td>

</tr>


<tr height="25" align="center"> 
<td align="center"><strong>Gross Salary</strong></td></td>
	<td align="right"><strong><?php echo number_format($gross_salary=$gross_pay+$safety_allowance+$regional_allowance+$vacation_amount+$overtime_amnt1+$otherpayment,2);?></strong></td>
	<td><strong>Total Deductions</strong></td><td align="right"><strong><?php echo number_format($other_deduction,2);?></strong></td>

</tr>

<tr height="25" align="center"> 
<td align="right" colspan="3"><font size="+1"><strong>Net Salary Transfered (SSP)</strong></font></td>
	
	<td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($net_sal=$gross_salary-$other_deduction,2);?></font></strong></td>

</tr>


</table>
<table border=0 align="center" width="700">
<tr height="25" align="center"> 
<td align="right" colspan="4"><i>Printed By :<?php echo $user_id; ?></i></td>
	
	

</tr>
</table>
  <br/>
 </body>
</html>
<?php 
/*
$sqlred="select * from pay_slips where payrol_basic_log_id='$payrol_basic_log'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$rowsred=mysql_fetch_object($resultsred);
$numrowsred=mysql_num_rows($resultsred);

if ($numrowsred>0)

{


}

else
{

$sqllpo= "insert into pay_slips VALUES('','$slip_no','$payrol_basic_log','$id','$gross_salary','$gross_ded','$net_sal',NOW(),'$gen_date','$gen_month')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

}


$current_month=(Date("F Y"));
$transaction_desc="Salaries and Commission expenses for the month of $current_month";
$transaction_desc2="Accounts Payables ($transaction_desc)";
$sqlsal="SELECT net_salary FROM pay_slips where month_printed='$current_month'";
$resultssal= mysql_query($sqlsal) or die ("Error $sqlsal.".mysql_error());

if (mysql_num_rows($resultssal) > 0)
{
 while ($rowssal=mysql_fetch_object($resultssal))
 {
 $sal_paid=$rowssal->net_salary;
 $grnt_sal_paid=$grnt_sal_paid+$sal_paid;
 }
//echo $grnt_basic_sal;
$grnt_sal_paid;
}

*/

/*$queryred1="select * from  salary_expenses_ledger where transactions='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{

$sqlupdt= "update salary_expenses_ledger set amount='$grnt_sal_paid', debit='$grnt_sal_paid' where transactions='$transaction_desc'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "update general_ledger set amount='$grnt_sal_paid',debit='$grnt_sal_paid' where transactions='$transaction_desc'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "update general_ledger set amount='-$grnt_sal_paid',credit='-$grnt_sal_paid' where transactions='$transaction_desc2'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "update cash_ledger set amount='-$grnt_sal_paid',credit='-$grnt_sal_paid' where transactions='$transaction_desc'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());





}
else
{

$sqlss="INSERT INTO salary_expenses_ledger VALUES('','$transaction_desc','$grnt_sal_paid','$grnt_sal_paid', '', '6','1',NOW())" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc','-$grnt_sal_paid','','$grnt_sal_paid','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc2','$grnt_sal_paid','$grnt_sal_paid','','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into cash_ledger values('','$transaction_desc','-$grnt_sal_paid','','$grnt_sal_paid','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into accounts_payables_ledger values('','$transaction_desc','-$grnt_sal_paid','$grnt_sal_paid','','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());


}

*/




?>








