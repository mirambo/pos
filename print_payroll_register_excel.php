<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$payment_month=$_GET['payment_month'];
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Payroll_Register.xlsx");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>

<link rel="stylesheet" href="<?php echo $base_url?>csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>
<body >
<table width="100%" border="1" class="table">

<!--<tr height="40"> <td colspan="16" align="center"><img src="images/payslip_logo.png" width="200" height="80"></td></tr>-->
<tr height="40"> <td colspan="9" align="center"><H2>LONG TERM VIEW CAPITAL LTD</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>Payroll Register For The Month Of : <?php echo $payment_month;?></H2>
	
	</td>
	
    </tr>

	<tr ><td colspan="9">
	<table width="100%" border="1">
	<tr style="background:url(images/description.gif);" height="30" >
    <td width="12%"><div align="center"><strong>Employee Name</strong></td>
    <td width="12%"><div align="center"><strong>Employee No</strong></td>
	<td width="17%"><div align="center"><strong>ID Number</strong></td>	
	<td width="17%"><div align="center"><strong>Account No</strong></td>	
	<td width="350"><div align="center"><strong>Branch</strong></td>
	<td width="200"><div align="centern"><strong>Payroll No</strong></td>
	<td width="200"><div align="centern"><strong>Payroll Month</strong></td>
	<td width="300"><div align="center"><strong>Basic Salary</strong></td>
	<?php 
	$sql="select * from benefit_logs order by benefit_log_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="center"><strong><?php echo $rows->benefit_log_name;?></strong></td>
	 <?php
}}

	 ?>
	 
 
<td width="300" ><div align="center"><strong>Total Benefits</strong></td>	 
<td width="300" ><div align="center"><strong>Gross Salary</strong></td>	 

<td width="300" ><div align="center"><strong>Advance Or Loan</strong></td>	
	 <?php 
	$sqld="select * from deduction_logs order by deduction_log_name asc";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());


if (mysql_num_rows($resultsd) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsd=mysql_fetch_object($resultsd))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="center"><strong><?php echo $rowsd->deduction_log_name;?></strong></td>
	 <?php
}}

	 ?>
	 <td width="300" ><div align="center"><strong>Total Deductions</strong></td>	
	 <td width="300" ><div align="center"><strong>Net Salary</strong></td>	
    </tr>
  
<?php

$sql="select * FROM payroll,employees WHERE payroll.emp_id=employees.emp_id AND payroll.payment_month='$payment_month' order by payroll.payroll_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) >0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 
 
 ?>
  
    
	<td>
<?php 

echo $rows->emp_firstname.' '.$rows->emp_middle_name.''.$rows->emp_lastname;
	
	?>
	</td>
	<td>
	<?php
echo $rows->employee_no;
	?>
	</td>
	<td><?php echo $rows->national_id;?></td>
	<td><?php echo $rows->bank_account_number;?></td>
	<td ><?php echo $rows->bank_branch;?></td>

	
	<td align="right"><?php 
	echo  $rows->payroll_no;
	
	?></td>
	<td align="center"><?php 
	echo  $rows->payment_month;
	
	?></td>
	 <td align="right"><strong><?php 
	 
	echo  number_format($basic_sal=$rows->basic_sal,2);
	 
	 ?></strong></td>
	<?php 
$sqlee="select * from benefit_logs order by benefit_log_name asc";
$resultsee= mysql_query($sqlee) or die ("Error $sqlee.".mysql_error());


if (mysql_num_rows($resultsee) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsee=mysql_fetch_object($resultsee))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="right"><?php 
	 
	  $benefit_log_id=$rowsee->benefit_log_id;
	  $payroll_id=$rows->payroll_id;
	 $ttl_benefits=0;
	 $sqlben="select * from benefits where benefit_log_id='$benefit_log_id' and payroll_id='$payroll_id'";
$resultsben= mysql_query($sqlben) or die ("Error $sqlben.".mysql_error());
$rowsben=mysql_fetch_object($resultsben);
	 
	echo  number_format($benefit_amount=$rowsben->benefit_amount,2);
	
	//$ttl_benefits=$ttl_benefits+$benefit_amount;
	 ?></td>
	 <?php
}}

	 ?>
<td align="right"><?php 

$sqldedtb="select SUM(benefit_amount) AS ben_amount from benefits where payroll_id='$payroll_id'";
$resultsdedtb= mysql_query($sqldedtb) or die ("Error $sqldedtb.".mysql_error());
$rowsdedtb=mysql_fetch_object($resultsdedtb);

echo number_format($ttl_benefits=$rowsdedtb->ben_amount,2); 

$grnd_ttl_ben=$grnd_ttl_ben+$ttl_benefits;
?></td>
	
	
	
	<td align="right"><strong>
	<?php 
	echo number_format($gross_salary=$basic_sal+$ttl_benefits,2);

	?>
	
	</strong></td>
	
	
	
	<td align="right">
	
	
<?php 	
$sqladv="select * from staff_advance_repayment where payroll_id='$payroll_id'";
$resultsadv= mysql_query($sqladv) or die ("Error $sqladv.".mysql_error());
$rowsadv=mysql_fetch_object($resultsadv);
	 
	echo  number_format($amount_repaid=$rowsadv->amount_repaid,2);
	
	
	?>
	
	</td>
	
	<?php 
$sqleeb="select * from deduction_logs order by deduction_log_name asc";
$resultseeb= mysql_query($sqleeb) or die ("Error $sqleeb.".mysql_error());


if (mysql_num_rows($resultseeb) > 0)
						  {
							  $RowCounter=0;
							  while ($rowseeb=mysql_fetch_object($resultseeb))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="right"><?php 
	 
	  $deduction_log_id=$rowseeb->deduction_log_id;
	  $payroll_id=$rows->payroll_id;
$ttl_deduction=0;
$sqlded="select * from deductions where deduction_log_id='$deduction_log_id' and payroll_id='$payroll_id'";
$resultsded= mysql_query($sqlded) or die ("Error $sqlded.".mysql_error());
$rowsded=mysql_fetch_object($resultsded);
	 
	echo  number_format($deduction_amount=$rowsded->deduction_amount,2);
	
	
	 ?></td>
	 <?php
}}

	 ?>
<td align="right"><?php 
//sum deductions
$sqldedt="select SUM(deduction_amount) AS ded_amount from deductions where payroll_id='$payroll_id'";
$resultsdedt= mysql_query($sqldedt) or die ("Error $sqldedt.".mysql_error());
$rowsdedt=mysql_fetch_object($resultsdedt);

echo number_format($ttl_ded_amount=$rowsdedt->ded_amount+$amount_repaid,2); 

$grnd_ttl_ded=$grnd_ttl_ded+$ttl_ded_amount;

?></td>
	
	<td align="center"><strong>
<?php
echo number_format($net_pay=$gross_salary-$ttl_ded_amount,2);

$grnd_net_pay=$grnd_net_pay+$net_pay;

 ?>	
	
	</strong></td>
	
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
<td width="200"><strong>Grand Total</strong></td>
	
	<td width="200" colspan="6"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	//echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td width="200"></td>
	<td width="200"><div align="center"><strong></strong></td>
     <td width="200" ><div align="right"><strong><?php echo number_format($grnd_ttl_ben,2); ?></strong></td>
	 <td width="20"></td>
	 <td width="20"></td>
	 <td width="20"></td>
	 <td width="20"></td>
	     <td width="200" ><div align="right"><strong><?php echo number_format($grnd_ttl_ded,2); ?></strong></td>
	     <td width="200" ><div align="right"><strong><font size="+1" color="#ff0000;"><?php echo number_format($grnd_net_pay,2); ?></strong></td>
	

   <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  <?php
  
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
	
	</td>

</body>


