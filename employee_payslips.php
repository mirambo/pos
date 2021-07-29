<?php
include('top_grid_includes.php');
	?>
<table width="100%">
<tr><td colspan="5"><h1>Payslips Details</h1></td></tr>
	<tr>
	<td width="50%">
 <table id="example" class="table table-bordered table-striped hover" width="100%">
                <thead>
 <tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="150"><strong>No</strong></td>   
    <td align="center" width="150"><strong>Payslip No</strong></td>
<td align="center" width="150"><strong>Month </strong></td> 
    <!--<td align="center" width="150"><strong>Days Worked</strong></td>-->
    <td align="center" width="150"><strong>Basic Pay</strong></td>
    <!--<td align="center" width="150"><strong>Bonus</strong></td>-->
    <td align="center" width="150"><strong>Allowances</strong></td>
    <td align="center" width="150"><strong>Deductions</strong></td>
    <td align="center" width="150"><strong>Net Pay</strong></td>
    <td align="center" width="150"><strong>View Details</strong></td>
  

    </tr>

</thead>
   
  <?php 
 $job_card_ttl=0;
 $inv_ttl=0;
 $gnd_bal=0;
 


 if (!isset($_POST['generate']))
{

$querydc="SELECT *,hs_hr_employee.employee_id as staff_no FROM payroll_code, hs_hr_employee 
where payroll_code.employee_id=hs_hr_employee.emp_number AND payroll_code.employee_id='$employee_id' ORDER BY payroll_code.payroll_code_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $sql.".mysql_error());

}
else
{



}

 
 


if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
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

  
   

<?php $payroll_code_id=$rows->payroll_code_id;?>
    <td><?php echo $count=$count+1; ?></td>
	
	<td><?php echo $rows->payroll_no; ?></td>

	<td><?php echo $rows->payroll_month.'-'.$rows->payroll_year; ?></td>
	<!--<td><?php echo $rows->days_worked; ?></td>-->


  
    <td align="right"><?php echo number_format($days_worked_amount=$rows->basic_pay,2);
	
	$ttl_days_worked_amount=$ttl_days_worked_amount+$days_worked_amount;
	
	?></td>
	
	    <!--<td align="right"><?php echo number_format($bonus=$rows->bonus,2);
	
	$ttl_bonus=$ttl_bonus+$bonus;
	
	?></td>-->
    <td align="right">
<?php 

include('allowances_value.php');

$grnd_ttl_all=$grnd_ttl_all+$ttl_employee_allowance;
?>
	
	
	</td>
    <td align="right"><?php 

	
	
	
	include ('deductions_value.php');
	
	
$grnd_ttl_ded=$grnd_ttl_ded+$ttl_emp_deductions;	
	
	?></td>
    <td align="right"><strong>
	
	<?php 
	
	echo number_format($net_pay=$days_worked_amount+$bonus+$ttl_employee_allowance-$ttl_emp_deductions,2);
	
	

	
	?>
	
	</strong>
	</td>
	
	<?php

$payroll_type=$rows->payroll_type;
?>

	
		<td align="center">
		<?php 
	if ($payroll_type=='S')
		
		{
	
	?>
		
		<a href="home.php?view_payroll_spec_details&payroll_code_id=<?php echo $payroll_code_id;?>">View Details</a>
				<?php 
		}
if ($payroll_type=='P')
		{
				?>
		
		<a href="home.php?view_payroll_perm_details&payroll_code_id=<?php echo $payroll_code_id;?>">View Details</a>
				<?php 
			
			
		}
	
	?>
		
		
		
		</td>
	
   

	

	
	
	
	

	


 <!--<td align="right"><a href="delete_payroll.php?payroll_code_id=<?php echo $rows->payroll_code_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>-->

 <!--<td></td>-->
	
   
    </tr>

  <?php 
  
  }
  
  ?>
  <tr bgcolor="#FFFFCC">

  <td>Total</td>
  <td></td>
    <td></td>


 
  <td align="right"><strong><font size="" color="#ff0000"><?php echo number_format($ttl_days_worked_amount,2); ?></font></strong></td>
 <!--<td align="right"><strong><font size="" color="#ff0000"><?php echo number_format($ttl_bonus,2); ?></font></strong></td>-->

  <td align="right"><strong><font size="" color="#ff0000"><?php echo number_format($grnd_ttl_all,2); ?></font></strong></td>
  <td align="right"><strong><font size="" color="#ff0000"><?php echo number_format($grnd_ttl_ded,2); ?></font></strong></td>
  <td align="right"><strong><font size="" color="#ff0000"><?php echo number_format($grnd_net_pay=$ttl_days_worked_amount+$ttl_bonus+$grnd_ttl_all-$grnd_ttl_ded,2); ?></font></strong></td>



   
  <td></td>
  <td></td>
  <td></td>


 
  
  </tr>
  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr bgcolor="#FFFFCC" height="30"><td colspan="11" align="center"><font color="#ff0000"><strong>No Results found!!</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
  
  </table>
   </td></tr>	 
  
  
  
  
  
  
</table>


