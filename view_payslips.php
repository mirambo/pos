<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">


<script src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="jquery-ui.css">
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
</script>
<style>
.ui-datepicker-calendar {
    display: none;
    }

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
   
    <td colspan="8" height="30" align="center"> 
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
   
   <td colspan="7" align="center"><strong>Select Employee&nbsp;&nbsp;</strong>
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
   Filter By Month From</strong></div>
 <input name="current_month" id="current_month" class="date-picker" size="40" />
 <strong>
  <!-- Month To</strong>
  <input name="current_month2" id="current_month2" class="date-picker" size="40" />-->
    
    <input type="submit" name="generate" value="Generate">
    </td>
    
    

   
  </tr>
   <tr style="background:url(images/description.gif);" height="30" >
<td width="100"><div align="center"><strong>Payslip No.</strong></td>
<td width="100"><div align="center"><strong>Month</strong></td>
<td width="300"><div align="center"><strong>Employees Name</strong></td>
<td width="100"><div align="center"><strong>Net Salary</strong></td>
<td width="100"><div align="center"><strong>Amount Paid(Kshs)</strong></td>
<td width="100"><div align="center"><strong>Balance(Kshs)</strong></td>
<td width="100"><div align="center"><strong>View Payslip</strong></td>
		<!--<td width="300"><div align="center"><strong>Qnty</strong></td>
	<td width="300"><div align="center"><strong></strong></td>
	 <td width="200"><div align="center"><strong>Clear Balance</strong></td>
    <td width="300" ><div align="center"><strong>Record Sales Returns</strong></td>
   <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
 <?php 
if (!isset($_POST['generate']))
{   
$sql="select payroll.payroll_id,payroll.payment_month,payroll.salary_advance,payroll.payroll_no,payroll.unpaid_balance,payroll.comm_due,
payroll.emp_id,payroll.net_pay,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,
employees.employee_no,employees.basic_sal FROM payroll,employees WHERE payroll.emp_id=employees.emp_id order by payroll.payroll_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$current_month=$_POST['current_month'];
$emp=$_POST['emp'];
if ($emp!='0' && $current_month=='')
{
$sql="select payroll.payroll_id,payroll.payment_month,payroll.salary_advance,payroll.payroll_no,payroll.unpaid_balance,payroll.comm_due,
payroll.emp_id,payroll.net_pay,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,
employees.employee_no,employees.basic_sal FROM payroll,employees WHERE payroll.emp_id=employees.emp_id AND payroll.emp_id='$emp' order by payroll.payroll_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($emp=='0' && $current_month!='')
{
$sql="select payroll.payroll_id,payroll.payment_month,payroll.salary_advance,payroll.payroll_no,payroll.unpaid_balance,payroll.comm_due,
payroll.emp_id,payroll.net_pay,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,
employees.employee_no,employees.basic_sal FROM payroll,employees WHERE payroll.emp_id=employees.emp_id AND payroll.payment_month='$current_month' order by payroll.payroll_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($emp!='0' && $current_month!='')
{
$sql="select payroll.payroll_id,payroll.payment_month,payroll.salary_advance,payroll.payroll_no,payroll.unpaid_balance,payroll.comm_due,
payroll.emp_id,payroll.net_pay,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,
employees.employee_no,employees.basic_sal FROM payroll,employees WHERE payroll.emp_id=employees.emp_id AND payroll.emp_id='$emp' AND payroll.payment_month='$current_month' order by payroll.payroll_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select payroll.payroll_id,payroll.payment_month,payroll.salary_advance,payroll.payroll_no,payroll.unpaid_balance,payroll.comm_due,
payroll.emp_id,payroll.net_pay,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,
employees.employee_no,employees.basic_sal FROM payroll,employees WHERE payroll.emp_id=employees.emp_id order by payroll.payroll_id desc";
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
 $payroll_id=$rows->payroll_id
 ?>
  
    <td><?php echo $slip_no=$rows->payroll_no;?></a></td>
    <td><?php echo $rows->payment_month;?></td>
	<td><?php echo $rows->emp_firstname.''.$rows->emp_middle_name.''.$rows->emp_lastname;?></td>
	<td align="right"><?php echo number_format($net_pay=$rows->net_pay,2);?></td>
	<td align="right"><?php 
$sqlsb="select * from salary_payments where emp_id='$emp_id' AND payroll_id='$payroll_id'";
$resultssb= mysql_query($sqlsb) or die ("Error $sqlsb.".mysql_error());
$rowssb=mysql_fetch_object($resultssb);
$sal_paid=$rowssb->amount_received;
$curr_rate=$rowssb->curr_rate;
echo number_format($paid_sal=$sal_paid*$curr_rate,2);
	
	//echo number_format($paid_sal=$net_pay-$unpaid_balance,2);?></td>
	<td align="right"><?php 
	

	echo number_format($unpaid_balance=$net_pay-$paid_sal,2);
	
	
	?></td>
	 <td width="200"><div align="center"><a href="print_payslip.php?payroll_id=<?php echo $payroll_id; ?>" target="_blank">Print Payslip</a></td>
    </tr>
	
 <?php 
 $grnd_net_sal=$grnd_net_sal+$net_pay;
 $grnd_paid_sal=$grnd_paid_sal+$paid_sal;
 $grnd_bal=$grnd_bal+$unpaid_balance;
 }
 
 ?>
 
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><?php 
	echo number_format($grnd_net_sal,2);
	
	
	?></td>
	
	<td width="200"><div align="right"><strong><?php 
	echo number_format( $grnd_paid_sal,2);
	
	
	
	
	
	
	?></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000"><?php 
	echo number_format($grnd_bal,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong></strong></td>
    <!--<td width="200" ><div align="center"><strong>Record Sales Returns</strong></td>
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