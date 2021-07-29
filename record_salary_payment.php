<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/payslipsubmenu.php');  ?>
		
		<h3>::List of All Payslips Generated</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr  height="30" bgcolor="#FFFFCC">
   
   <td colspan="9" align="center"><strong>Select Employee&nbsp;&nbsp;</strong>
    <select name="emp"><option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from employees";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_id; ?>"><?php echo $rows1->emp_firstname.' '.$rows1->emp_middle_name.''.$rows1->emp_lastname; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
   <strong>&nbsp;&nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp;
   Filter By Date</strong></div>
   <strong>From</strong>
    
   <input type="text" name="from" size="30" id="from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong></div>
    <input type="text" name="to" size="30" id="to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    
    <input type="submit" name="generate" value="Generate">
    </td>
    
    

   
  </tr>
   <tr style="background:url(images/description.gif);" height="30" >
    <!--<td width="200"><div align="center"><strong>Payslip No.</strong></td>
    <td width="300"><div align="center"><strong>Month</strong></td>-->
	<td width="100"><div align="center"><strong>Employees Name</strong></td>
<td width="300"><div align="center"><strong>Gross Salary(Kshs)</strong></td>
<td width="300"><div align="center"><strong>Total Deductions(Kshs)</strong></td>
<td width="300"><div align="center"><strong>Net Salary(Kshs)</strong></td>
<td width="300"><div align="center"><strong>Paid Salary(Kshs)</strong></td>
<td width="300"><div align="center"><strong>Unpaid Salary(Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Pay Salary</strong></td>
	<!--<td width="300"><div align="center"><strong>Qnty</strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	 <td width="200"><div align="center"><strong>Clear Balance</strong></td>
    <td width="300" ><div align="center"><strong>Record Sales Returns</strong></td>
   <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
 <?php 
if (!isset($_POST['generate']))
{   
$sql="SELECT pay_slips.payslip_no,pay_slips.payslip_no,SUM(pay_slips.gross_salary) as ttl_gross,SUM(pay_slips.ttl_deductions) as ttl_ded,SUM(pay_slips.net_salary) as ttl_sal,
pay_slips.date_printed,pay_slips.date_printed2,pay_slips.month_printed,employees.emp_id,employees.emp_firstname,employees.emp_middle_name,
employees.emp_lastname FROM pay_slips,employees where pay_slips.emp_id=employees.emp_id GROUP BY pay_slips.emp_id
order by pay_slips.date_printed desc,employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$emp=$_POST['emp'];
if ($emp!='0' && $date_from=='' && $date_to=='')
{
$sql="SELECT pay_slips.payslip_no,pay_slips.payslip_no,pay_slips.payslip_no,SUM(pay_slips.gross_salary) as ttl_gross,SUM(pay_slips.ttl_deductions) as ttl_ded,SUM(pay_slips.net_salary) as ttl_sal,
pay_slips.date_printed,pay_slips.date_printed2,pay_slips.month_printed,employees.emp_id,employees.emp_firstname,employees.emp_middle_name,
employees.emp_lastname FROM pay_slips,employees where pay_slips.emp_id=employees.emp_id AND pay_slips.emp_id='$emp' GROUP BY pay_slips.emp_id
order by pay_slips.date_printed desc,employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($emp=='0' && $date_from!='' && $date_to!='')
{
$sql="SELECT pay_slips.payslip_no,pay_slips.payslip_no,pay_slips.payslip_no,SUM(pay_slips.gross_salary) as ttl_gross,SUM(pay_slips.ttl_deductions) as ttl_ded,SUM(pay_slips.net_salary) as ttl_sal,
pay_slips.date_printed,pay_slips.date_printed2,pay_slips.month_printed,employees.emp_id,employees.emp_firstname,employees.emp_middle_name,
employees.emp_lastname FROM pay_slips,employees where pay_slips.emp_id=employees.emp_id AND pay_slips.date_printed BETWEEN '$date_from' AND '$date_to'
GROUP BY pay_slips.emp_id order by pay_slips.date_printed desc,employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($emp!='0' && $date_from!='' && $date_to!='')
{
$sql="SELECT pay_slips.payslip_no,pay_slips.payslip_no,pay_slips.payslip_no,SUM(pay_slips.gross_salary) as ttl_gross,SUM(pay_slips.ttl_deductions) as ttl_ded,SUM(pay_slips.net_salary) as ttl_sal,
pay_slips.date_printed,pay_slips.date_printed2,pay_slips.month_printed,employees.emp_id,employees.emp_firstname,employees.emp_middle_name,
employees.emp_lastname FROM pay_slips,employees where pay_slips.emp_id=employees.emp_id AND pay_slips.date_printed BETWEEN '$date_from' AND '$date_to'
AND pay_slips.emp_id='$emp' GROUP BY pay_slips.emp_id order by pay_slips.date_printed desc,employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT pay_slips.payslip_no,pay_slips.payslip_no,pay_slips.payslip_no,SUM(pay_slips.gross_salary) as ttl_gross,SUM(pay_slips.ttl_deductions) as ttl_ded,SUM(pay_slips.net_salary) as ttl_sal,
pay_slips.date_printed,pay_slips.date_printed2,pay_slips.month_printed,employees.emp_id,employees.emp_firstname,employees.emp_middle_name,
employees.emp_lastname FROM pay_slips,employees where pay_slips.emp_id=employees.emp_id GROUP BY pay_slips.emp_id 
order by pay_slips.date_printed desc,employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
}

if (mysql_num_rows($results) > 0)
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
 
 $emp_id=$rows->emp_id;
 ?>
  
    <!--<td><?php echo $slip_no=$rows->payslip_no;?></a></td>
    <td><?php echo $rows->month_printed;?></td>-->
	<td><?php echo $rows->emp_firstname.' '.$rows->emp_middle_name.''.$rows->emp_lastname;?></td>
	<td align="right"><?php echo number_format($ttl_gross=$rows->ttl_gross,2);?></td>
	<td align="right"><?php echo number_format($ttl_ded=$rows->ttl_ded,2);?></td>
	<td align="right"><?php echo number_format($ttl_sal=$rows->ttl_sal,2);?></td>
	<td align="right">
<a href="view_sal_payment_details.php?emp_id=<?php echo $emp_id; ?>" style="font-size:12px; color:#000">	
	<?php 

$sqlsp="SELECT SUM(amount_received) as ttl_sal_paid from salary_payments WHERE emp_id='$emp_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultsp);

echo number_format($ttl_sal_paid=$rowsp->ttl_sal_paid,2);

	?>
	</a>
	</td>
	<td align="right"><?php
echo number_format($bal_sal=$ttl_sal-$ttl_sal_paid,2);

	?></td>
	 <td width="200"><div align="center"><a href="pay_staff.php?emp_id=<?php echo $emp_id; ?>&net_sal=<?php echo $ttl_sal;?>">Pay Staff</a></td>
    </tr>
	
 <?php 
 $grnd_net_sal=$grnd_net_sal+$ttl_sal;
 $grnd_gross_sal=$grnd_gross_sal+$ttl_gross;
 $grnd_ded=$grnd_ded+$ttl_ded;
 $grnd_sal_paid=$grnd_sal_paid+$ttl_sal_paid;
 $grnd_bal_sal=$grnd_bal_sal+$bal_sal;
 }
 
 ?>
 
   <tr height="30" bgcolor="#FFFFCC">
   
    <td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="300"><div align="right"><strong><?php 
	echo number_format($grnd_gross_sal,2);
	
	
	?></strong></td>
	<td width="200"><div align="right">
	<?php 
	echo number_format($grnd_ded,2);
	
	
	?>
	</td>
	
	<td width="200"><div align="right"><strong><?php 
	echo number_format( $grnd_net_sal,2);
	
	
	
	
	
	
	?></td>
	<td width="200"><div align="right"><strong><?php 
	echo number_format($grnd_sal_paid,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><?php 
	echo number_format($grnd_bal_sal,2);
	
	
	?></font></strong></td>
   <td width="200" ><div align="center"><strong></strong></td>
     <!--<!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
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
</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "to"       // ID of the button
    }
  );
  
  
  
  </script>
		
			

			
			
			
					
			  </div>
				
				
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			
			
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
	

	
</body>

</html>