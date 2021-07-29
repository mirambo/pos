<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['emp_id'];
session_start(); 
$year=date('Y');
$payrol_basic_log=$_GET['payrol_basic_log'];
$slip_no=$_GET['slip_no'];
$current_month=$_GET['current_month'];
/*
header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Payslips.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Brisk Diagnostics - Payslip <?php echo $slip_no; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css" />

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
 <td colspan="7" rowspan="7" align="right"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"><font color="#000033" size="+2"><strong>
      <a href="assoc_employees.php"></a>
    </strong></font></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    </div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><!--Website: www.briskdiagnostics.com--> </td>
  </tr>
  
  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">PAYSLIP</span></td>
  </tr>
  
  
 
  
  
  
 
  
  
  <?php 
  
$sqlemp_det="select * from employees where emp_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);



/*
$sqllpdet="select * from payrol_basic_log where emp_id='$id' AND payment_month='$current_month'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
 */
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
	<td ><?php echo $rowsemp_det->emp_firstname.' '.$rowsemp_det->emp_middle_name.' '.$rowsemp_det->emp_lastname; ?></td><td><strong>Month : </strong></td><td colspan="3"><?php echo $gen_month=$current_month; ?></td>

</tr>
<tr height="25">
<td><strong>Payroll Number :</strong></td>
    
    </td>
	<td ><?php echo $slip_no; ?></td><td><strong>Pay Cycle : </strong></td><td >Monthly</td>

</tr>

</table>
<table width="700" border="0" align="center" class="table1">

<tr height="25" align="center"> 
<td align="center"><strong>Earnings</strong></td></td>
	<td align="center"><strong>Amount (Kshs)</strong></td>
	<td><strong>Deductions</strong></td>
	<td><strong>Amount(Kshs)</strong></td>

</tr>
<tr height="25" align="center"> 
<td align="center" colspan="2" valign="top">
<table width="100%" style="border:0px;" class="table">
	<tr><td>Basic Salary</td><td align="right"><?php echo number_format($rowslpdet->basic_pay,2);
	$ttl_bas_pay=$rowslpdet->basic_pay;?></td></tr>
	<tr><td>Commision</td><td align="right"><?php echo number_format($rowslpdet->comm_pay,2);
	
	$ttl_com=$rowslpdet->comm_pay;
	
	?></td></tr>
	
	<tr><td colspan="2" align="center"><strong>Benefits</strong></td></tr>
	
	
	<?php 
  
$ttl_ben=0;
/*$sqlben="select benefit_log.banefit_name,benefit_log.benefit_amount from benefit_log,payrol_basic_log where 
benefit_log.payrol_basic_log_id=payrol_basic_log.payrol_basic_log_id AND payrol_basic_log.payment_month='$current_month' AND benefit_log.emp_id='$id'";
$resultsben= mysql_query($sqlben) or die ("Error $sqlben.".mysql_error());

if (mysql_num_rows($resultsben)>0)
{

while ($rowsben=mysql_fetch_object($resultsben))
{*/

?>
	
	<tr><td><?php //echo $rowsben->banefit_name;?></td><td align="right"><?php //echo number_format($ttl_ben=$rowsben->benefit_amount,2);?></td></tr>
	<?php
/*$grnd_ben=$grnd_ben+$ttl_ben;
}

}
*/
?>
	
	
	</table>

</td>
	<td colspan="2" valign="top">
	<table width="100%" style="border:0px;" valign="top" class="table">
	<tr><td>P.A.Y.E. Tax</td><td align="right"><?php echo number_format($ttl_tax=$rowslpdet->tax,2); ?></td></tr>
	<?php 
/*  
$ttl_ded=0;
$sqlded="select deduction_logs.deduction_name,deduction_logs.deduction_amount from deduction_logs,payrol_basic_log where 
deduction_logs.payrol_basic_log_id=payrol_basic_log.payrol_basic_log_id AND payrol_basic_log.payment_month='$current_month' AND deduction_logs.emp_id='$id'";
$resultsded= mysql_query($sqlded) or die ("Error $sqlded.".mysql_error());

if (mysql_num_rows($resultsded)>0)
{

while ($rowsded=mysql_fetch_object($resultsded))
{*/
?>
	
	<tr><td><?php //echo $rowsded->deduction_name;?></td><td align="right"><?php //echo number_format($ttl_ded=$rowsded->deduction_amount,2);?></td></tr>
	<?php
/*$grnd_ded=$grnd_ded+$ttl_ded;
}

}
*/
?>


	
	
	</table>
	
	
	
	
	</td>

</tr>


<tr height="25" align="center"> 
<td align="center"><strong>Gross Salary</strong></td></td>
	<td align="right"><strong><?php echo number_format($gross_salary=$grnd_ben+$ttl_bas_pay+$ttl_com,2);?></strong></td>
	<td><strong>Total Deductions</strong></td><td align="right"><strong><?php echo number_format($gross_ded=$grnd_ded+$ttl_tax,2);?></strong></td>

</tr>

<tr height="25" align="center"> 
<td align="right" colspan="3"><font size="+1"><strong>Net Salary Transfered (Kshs)</strong></font></td>
	
	<td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($net_sal=$gross_salary-$gross_ded,2);?></font></strong></td>

</tr>
</table>
  <br/>
 </body>
</html>
<?php 

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


$sqlpdcom= "UPDATE commision_payments SET paid_status='1' where sales_rep='$id'";
$resultspdcom= mysql_query($sqlpdcom) or die ("Error $sqlpdcom.".mysql_error());


}

$employee_no=$rowsemp_det->employee_no;
$current_month=(Date("F Y"));
$transaction_desc="Salary Payable for the month of $current_month for Staff ". $rowsemp_det->emp_firstname.' '.$rowsemp_det->emp_middle_name.' '.$rowsemp_det->emp_lastname;
$transaction_desc2="Cash Payment for Salary of Staff" .$rowsemp_det->emp_firstname.' '.$rowsemp_det->emp_middle_name.' '.$rowsemp_det->emp_lastname;;


 



$queryred1="select * from  salary_expenses_ledger where transactions='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{

/*$sqlupdt= "update salary_expenses_ledger set amount='$grnt_sal_paid', debit='$grnt_sal_paid' where transactions='$transaction_desc'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "update general_ledger set amount='$grnt_sal_paid',debit='$grnt_sal_paid' where transactions='$transaction_desc'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "update general_ledger set amount='-$grnt_sal_paid',credit='-$grnt_sal_paid' where transactions='$transaction_desc2'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

$sqlupdt= "update cash_ledger set amount='-$grnt_sal_paid',credit='-$grnt_sal_paid' where transactions='$transaction_desc'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());*/

}
else
{
$sqlsal="SELECT * FROM pay_slips order by payslip_id desc limit 1";
$resultssal= mysql_query($sqlsal) or die ("Error $sqlsal.".mysql_error());
$rowssal=mysql_fetch_object($resultssal);
$sal_paid=$rowssal->net_salary;
$payslip_id=$rowssal->payslip_id;

$sqlss="INSERT INTO general_expenses_ledger VALUES('','$transaction_desc','$sal_paid','$sal_paid', '', '6','1',NOW(),'sal$payslip_id')";
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqltrans= "insert into staff_transactions values('','$id','sal$payslip_id','Net $transaction_desc','$sal_paid','6','1',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','$transaction_desc','-$sal_paid','','$sal_paid','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc2','$sal_paid','$sal_paid','','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into cash_ledger values('','$transaction_desc','-$sal_paid','','$sal_paid','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/

/*$sqlaccpay= "insert into accounts_payables_ledger values('','Net $transaction_desc','$sal_paid','','$sal_paid','6','1',NOW(),'sal$payslip_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());*/

$sqlaccpay= "insert into com_payables_ledger values('','Net $transaction_desc','$sal_paid','','$sal_paid','6','1',NOW(),'sal$payslip_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


}






?>








