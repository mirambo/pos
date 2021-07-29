<?php 
$payroll_id=$rowsprof->payroll_id;
$current_month=$p_month;
$sqlemp_det="select * FROM payroll,employees WHERE payroll.emp_id=employees.emp_id AND 
payroll.payroll_id='$payroll_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

$id=$rowsemp_det->emp_id;

$year=date('Y');

//$slip_no=$_GET['slip_no'];
$ttl_install=0;

$sqladv="select * from staff_advance where emp_id='$id'";
$resultsadv= mysql_query($sqladv) or die ("Error $sqladv.".mysql_error());
if ($numsadv=mysql_num_rows($resultsadv) > 0)
						  {
						  while ($rowsadv=mysql_fetch_object($resultsadv))
							  { 
							  $install=$rowsadv->install;
							  $adv_paid=$rowsadv->amount_received;
							  $curr_rate=$rowsadv->curr_rate;
							  $adv_paid_kshs=$adv_paid*1;
							  
							  $ttl_adv=$ttl_adv+$adv_paid_kshs;
							  
							  
							  $ttl_install=$ttl_install+$install;
							  }
							  
							  }



?>
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

<table width="300" border="0" align="center">
  <tr>
 <td colspan="7" rowspan="7" align="right" valign="top"><img src="<?php echo $base_url;?>images/payslip_logo.png" width="100" height="50" /></td>
  </tr>
  <tr>
    
  </tr>
  <tr>
    
  </tr>
  <tr>
   
  </tr>
  <tr>
   
  </tr>
  <tr>
    
  </tr>
  <tr>
   
  </tr>
  
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">PAYSLIP</span></td>
  </tr>
  
  
 
  
  
  
 
  
  
  <?php 
  




/*
$sqllpdet="select * from payrol_basic_log where emp_id='$id' AND payment_month='$current_month'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
 */
  ?>

  
  
</table>

<table width="300" border="0" align="center">
<tr height="15">
<td width="60">Emp No: </strong></td>
    
    </td>
	<td ><?php echo $rowsemp_det->employee_no; ?></td><td>Date : </strong></td><td><?php echo $gen_date=(Date("d-m-Y")); ?></td>

</tr>
<tr height="15">
<td>Name: </strong></td>
    
    </td>
	<td ><?php echo $rowsemp_det->emp_firstname.' '.$rowsemp_det->emp_middle_name.' '.$rowsemp_det->emp_lastname; ?></td><td>Month : </strong></td><td colspan="3"><?php echo $current_month=$rowsemp_det->payment_month; ?></td>

</tr>
<tr height="15">
<td>Payroll No:</strong></td>
    
    </td>
	<td ><?php echo $payroll_no=$rowsemp_det->payroll_no; ?></td><td width="50">Pay: </strong></td><td >Monthly</td>

</tr>

<!--<tr height="25">
<td>Bank Name :</strong></td>
    
    </td>
	<td ><?php echo $bank_name=$rowsemp_det->bank_name; ?></td><td>Bank Branch : </strong></td><td ><?php echo $bank_branch=$rowsemp_det->bank_branch; ?></td>

</tr>
<tr height="25">
<td>Account Name :</strong></td>
    
    </td>
	<td ><?php echo $bank_name=$rowsemp_det->bank_account_name; ?></td><td>Account Number : </strong></td><td ><?php echo $bank_branch=$rowsemp_det->bank_account_number; ?></td>

</tr>-->

</table>
<table width="300" border="0" align="center" class="table1">

<tr height="25"   bgcolor="#000033"> 
<td colspan="3"><span style="font-size:12px; font-weight:bold; color: #FFFFFF;">Gross Salary</strong></td>


</tr>
<!--<tr height="25" > 
<td >Basic Salary</td>
<td align="right"><?php echo number_format($basic_sal=$rowsemp_det->basic_sal,2);?></td>
<td ><?php //echo number_format($rowsemp_det->basic_sal,2);?></td>
<!--<tr height="25" > 
<td >Commission</td>
<td align="right"><?php 


echo number_format($comm_due=$rowsemp_det->comm_due,2);



?></td>
<td ><?php //echo number_format($rowsemp_det->basic_sal,2);?></td>


</tr>
<tr height="25" > 
<td >Unpaid Salary(Balance b/f)</td>
<td align="right"><?php 

echo number_format($ttl_staff_bal=$rowsemp_det->unpaid_balance,2);



?></td>
<td ><?php //echo number_format($rowsemp_det->basic_sal,2);?></td>


</tr>-->

<tr height="25" > 
<td >Gross Salary</strong></td>
<td align="right"><?php 





?></td>
<td align="right"><?php echo number_format($gross_pay=$basic_sal,2);?></strong></td>


</tr>
<tr height="25"   bgcolor="#000033"> 
<td colspan="3"><span style="font-size:12px; font-weight:bold; color: #FFFFFF;">Benefits</strong></td>


</tr>

<?php 
$ttl_benefit=0;
$sqlben="select * from benefits where emp_id='$id' AND benefit_month='$current_month' order by benefit_id asc";
$resultsben= mysql_query($sqlben) or die ("Error $sqlben.".mysql_error());

if (mysql_num_rows($resultsben) > 0)
						  {
						  
         while ($rowsben=mysql_fetch_object($resultsben))

							  { 

 ?>	
<tr height="25" > 
<td ><?php echo $rowsben->benefit_name ?></td>
<td align="right"><?php 

echo number_format($benefit_amount=$rowsben->benefit_amount,2);



?></td>
<td ><?php //echo number_format($rowsemp_det->basic_sal,2);?></td>


</tr>
<?php
$ttl_benefit=$ttl_benefit+$benefit_amount;

}

}


 ?>
<tr height="25" > 
<td >Total Benefits</strong></td>
<td align="right"><?php 





?></td>
<td align="right"><?php echo number_format($ttl_benefit,2);?></strong></td>


</tr>

<tr height="25"   bgcolor="#000033"> 
<td colspan="3"><span style="font-size:12px; font-weight:bold; color: #FFFFFF;">Deductions</strong></td>


</tr>
<tr bgcolor="#FFFFCC" height="25">
	<td>Advance Payments 
	<?php 
	$sqladv="select * from staff_advance where emp_id='$id'";
$resultsadv= mysql_query($sqladv) or die ("Error $sqladv.".mysql_error());
if ($numsadv=mysql_num_rows($resultsadv) > 0)
						  {
						  while ($rowsadv=mysql_fetch_object($resultsadv))
							  { 
							echo '('.$rowsadv->decription.') ';

							  }
							  
							  }
							  
							  ?>
	
	:</td>
	<td align="right">
	<?php
$amnt_repaid=0;
$ttl_adv=0;
$sqladv="select * from staff_advance where emp_id='$id'";
$resultsadv= mysql_query($sqladv) or die ("Error $sqladv.".mysql_error());
if ($numsadv=mysql_num_rows($resultsadv) > 0)
						  {
						  while ($rowsadv=mysql_fetch_object($resultsadv))
							  { 
							  $staff_advance_id=$rowsadv->staff_advance_id;
							  $install=$rowsadv->install;
							  $adv_paid=$rowsadv->amount_received;
							  $ttl_adv=$ttl_adv+$adv_paid;
							  
$sqldedad="select SUM(amount_repaid) as adv_amount_paid from staff_advance_repayment where emp_id='$id'";
$resultsdedad= mysql_query($sqldedad) or die ("Error $sqldedad.".mysql_error());
$rowsdedad=mysql_fetch_object($resultsdedad);
$adv_amount_paid=$rowsdedad->adv_amount_paid;	
$bal=$adv_paid-$adv_amount_paid;

if ( $ttl_adv==$install && $adv_amount_paid!='')	
{
$amnt_repaid=$install;

}

if ( $ttl_adv==$install && $adv_amount_paid=='')	
{
$amnt_repaid=$install;

}	
if ( $ttl_adv > $install && $adv_amount_paid!='')	
{
$amnt_repaid=$install;

}

if ( $ttl_adv > $install && $adv_amount_paid=='')	
{
$amnt_repaid=$install;

}	

if ( $bal>$install && $adv_amount_paid!='')	
{
$amnt_repaid=$install;

}	

	

if ( $install>$bal && $adv_amount_paid!='' && $staff_advance_id=='')	
{
$amnt_repaid=$bal;

}

if ( $install>$bal && $adv_amount_paid!='' && $staff_advance_id!='')	
{
$amnt_repaid=$install;

}  
													  
					  
							  
							  
							  
							  }
							  
							  echo number_format($amnt_repaid,2);
							  
							  }
							  
							  else
							  {
							  echo number_format(0,2);
							  
							  }?>
	<input type="hidden" size="41" name="advance" value="<?php echo $adv_amount_paid;?> ">
	
	
	
	
	</td>					  
							  
	<td colspan="5">
	<?php
if ($ttl_adv!=0)
{
	?>
	<table width="100%" class="table1">
	<tr height="5"><td>
	Total Advance : </td><td align="right"><?php echo number_format($ttl_adv,2)?></td></tr>
	
	<tr><td>Paid So far</td>
	
	<td align="right"><?php 

echo number_format($adv_amount_paid,2);
	?>
	</td>
	</tr>
	<tr><td>
	<!--[Delete]-->
	Balance</td>
	<td align="right">
	<?php
echo number_format($ball=$ttl_adv-$adv_amount_paid,2);
?>
	</td></tr>
	</table>
	<?php
	}
	
	
	
	else
	{
	//echo number_format(0,2);
	}
	
	
	?>
	
	</td>							  
							  
	</tr>

<?php 
$ttl_deduction=0;
$sqlded="select * from deductions where emp_id='$id' AND deduction_month='$current_month' order by deduction_id asc";
$resultsded= mysql_query($sqlded) or die ("Error $sqlded.".mysql_error());

if (mysql_num_rows($resultsded) > 0)
						  {
						  
         while ($rowsded=mysql_fetch_object($resultsded))

							  { 

 ?>	
<tr height="25" > 
<td ><?php echo $rowsded->deduction_name ?></td>
<td align="right"><?php 

echo number_format($deduction_amount=$rowsded->deduction_amount,2);



?></td>
<td ><?php //echo number_format($rowsemp_det->basic_sal,2);?></td>


</tr>
<?php
$ttl_deduction=$ttl_deduction+$deduction_amount;

}

}


 ?>
<tr height="25" > 
<td >Total Deductions</strong></td>
<td align="right"><?php 





?></td>
<td align="right"><?php echo number_format($ttl_deduction+$amnt_repaid,2);?></strong></td>


</tr>

<tr height="25" > 
<td ><font size="-1">Net Salary</font></strong></td>
<td align="right"><?php 





?></td>
<td align="right"><font size="-1"><strong><?php echo number_format($net_pay=$gross_pay+$ttl_benefit-$ttl_deduction-$amnt_repaid,2);?></strong></font></td>


</tr>
<!--<tr height="25" > 
<td ><font size="-1">Salary Paid</font></strong></td>
<td align="right"><?php 

$sqlsb="select * from salary_payments where emp_id='$id' AND payroll_id='$payroll_id'";
$resultssb= mysql_query($sqlsb) or die ("Error $sqlsb.".mysql_error());
$rowssb=mysql_fetch_object($resultssb);
$sal_paid=$rowssb->amount_received;
$curr_rate=$rowssb->curr_rate;
$sal_paid_kshs=$sal_paid*$curr_rate;



?></td>
<td align="right"><font size="-1" color="#00CC33"><?php echo number_format($sal_paid_kshs,2);?></font></strong></td>


</tr>

<tr height="25" > 
<td ><font size="-1">Balance c/f</font></strong></td>
<td align="right"><?php 





?></td>
<td align="right"><font size="-1" color="#ff0000"><?php echo number_format($net_pay-$sal_paid_kshs,2);?></font></strong></td>


</tr>-->

</table>