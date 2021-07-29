<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">


<script src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="jquery-ui.css">
<link href="css/superTables.css" rel="stylesheet" type="text/css" />
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
		
		<h3>::List of All Generated Payslips / Print Individual Slip</h3>
         
				
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
   
   <td colspan="8" align="center"><strong>Select Employee&nbsp;&nbsp;</strong>
    <select name="emp"><option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from employees ORDER BY emp_firstname asc";
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
  
  </table>
<DIV class=fakeContainer>
<table width="100%" border="0" class=demoTable id=demoTable align="center">
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="12%"><div align="center"><strong>Employee Name</strong></td>
    <td width="5%"><div align="center"><strong>Employee No</strong></td>
	<!--<td width="17%"><div align="center"><strong>ID Number</strong></td>	
	<td width="17%"><div align="center"><strong>Account No</strong></td>	
	<td width="350"><div align="center"><strong>Branch</strong></td>-->
	<td width="200"><div align="centern"><strong>Payroll No</strong></td>
	<td width="200"><div align="centern"><strong>Payroll Month</strong></td>
	<td width="300"><div align="center"><strong>Basic Salary</strong></td>
	<?php 
	$sqlben="select * from benefit_logs order by benefit_log_name asc";
$resultsben= mysql_query($sqlben) or die ("Error $sqlben.".mysql_error());


if (mysql_num_rows($resultsben) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsben=mysql_fetch_object($resultsben))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="center"><strong><?php echo $rowsben->benefit_log_name;?></strong></td>
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
	
	
	 <td width="300" ><strong><?php echo $rowsd->deduction_log_name;?></strong></td>
	 <?php
}}

	 ?>
	 <td width="16%" ><div align="center"><strong>Other Deductions</strong></td>	
	 <td width="300" ><div align="center"><strong>Total Deductions</strong></td>	
	 <td width="300" ><div align="center"><strong>Net Salary</strong></td>	
	 <td width="300" ><div align="center"><strong>Print Payslip</strong></td>	
    </tr>
  
<?php
///
$sqlst="select * FROM station order by station_name asc";
$resultsst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());
if (mysql_num_rows($resultsst) >0)
						  {
							  $RowCounter=0;
							  while ($rowsst=mysql_fetch_object($resultsst))
							  { 
$station_name=$rowsst->station_name;
$station_id=$rowsst->station_id;

?>
<tr bgcolor="#6699CC"><td colspan="20"><strong><?php echo $station_name; ?></strong></td></tr>
<?php 



if (!isset($_POST['generate']))
{
$grnd_ttl_ded=0;
$grnd_net_pay=0;

$sql="select * FROM payroll,employees WHERE payroll.emp_id=employees.emp_id and employees.department='$station_id' 
 order by employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$emp=$_POST['emp'];
$current_month=$_POST['current_month'];


if ($emp!=0 && $current_month=='')
{
$sql="select * FROM payroll,employees WHERE payroll.emp_id=employees.emp_id  and payroll.emp_id='$emp' order by employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($emp==0 && $current_month!='')
{
$sql="select * FROM payroll,employees WHERE payroll.emp_id=employees.emp_id  and payroll.payment_month='$current_month' order by employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif ($emp!=0 && $current_month!='')
{
$sql="select * FROM payroll,employees WHERE payroll.emp_id=employees.emp_id  and payroll.payment_month='$current_month' and payroll.emp_id='$emp' order by employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="select * FROM payroll,employees WHERE payroll.emp_id=employees.emp_id  order by employees.emp_firstname asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}





}

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
  
 


 
<td >
<?php 

$emp_id=$rows->emp_id;
$payroll_id=$rows->payroll_id;

echo $rows->emp_firstname.' '.$rows->emp_middle_name.''.$rows->emp_lastname;
	
	?>
	</td>
	<td >
	<?php
echo $rows->employee_no;
	?>
	</td>
	<!--<td><?php echo $rows->national_id;?></td>
	<td><?php echo $rows->bank_account_number;?></td>
	<td ><?php echo $rows->bank_branch;?></td>-->

	
	<td align="right" ><?php 
	echo  $rows->payroll_no;
	
	?></td>
	<td align="center" ><?php 
	echo  $date_month=$rows->payment_month;
	$payroll_id;
	
	?></td>
	 <td align="right" ><strong><?php 
	 
	echo  number_format($basic_sal=$rows->basic_sal,2);
	 
	 ?></strong></td>
	<?php 
$sqlee="select * from benefit_logs order by benefit_log_name asc";
$resultsee= mysql_query($sqlee) or die ("Error $sqlee.".mysql_error());


if (mysql_num_rows($resultsee) > 0)
						  {
							  
							  while ($rowsee=mysql_fetch_object($resultsee))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="right"><?php 
	 
	  $benefit_log_id=$rowsee->benefit_log_id;
	 $payroll_id=$rows->payroll_id;
	 $ttl_benefits=0;
$sqlben2="select * from benefits where benefit_log_id='$benefit_log_id' and payroll_id='$payroll_id'";
$resultsben2= mysql_query($sqlben2) or die ("Error $sqlben2.".mysql_error());
$rowsben2=mysql_fetch_object($resultsben2);
	 
	echo  number_format($benefit_amount=$rowsben2->benefit_amount,2);
	
	$ttl_benefits=$ttl_benefits+$benefit_amount;
	 ?></td>
	 <?php
}}

	 ?>
<td align="right" ><?php 
$grnd_ttl_ben=0;
$sqldedtb="select SUM(benefit_amount) AS ben_amount from benefits where payroll_id='$payroll_id'";
$resultsdedtb= mysql_query($sqldedtb) or die ("Error $sqldedtb.".mysql_error());
$rowsdedtb=mysql_fetch_object($resultsdedtb);

echo number_format($ttl_benefits=$rowsdedtb->ben_amount,2); 

$grnd_ttl_ben=$grnd_ttl_ben+$ttl_benefits;
?></td>
	
	
	
	<td align="right" ><strong>
	<?php 
	echo number_format($gross_salary=$basic_sal+$ttl_benefits,2);

	?>
	
	</strong></td>
	
	
	
	<td align="right" >
<?php 	
$payroll_id;
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
	 	<td >
		<table class="table" width="100%">
<?php
$payroll_id;
$ttl_other_ded=0;
$sqlod="select * from deductions where payroll_id='$payroll_id' and deduction_log_id='0'";
$resultsod= mysql_query($sqlod) or die ("Error $sqlod.".mysql_error());


if (mysql_num_rows($resultsod) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsod=mysql_fetch_object($resultsod))
							  { 
							  
							  ?>
							  <tr>
							  <td width="50%" ><i><?php echo $rowsod->deduction_name; ?></i></td> 
							  <td width="20%" align="right" ><i><?php echo number_format($other_ded=$rowsod->deduction_amount,2); 
							  $ttl_other_ded=$ttl_other_ded+$other_ded;
							  
							  ?></i></td> 
							  
							  </tr>
							 <?php 
							 
						
							  }
							  ?>
							  <tr>
							  <td ></td>
							  <td align="right" ><strong><i><?php echo number_format($ttl_other_ded,2) ?></i></strong></td>
							  </tr>
							  <?php
							  
							  }

 ?>		
		
</table>		
		</td>
<td align="right" ><?php 
//sum deductions
$sqldedt="select SUM(deduction_amount) AS ded_amount from deductions where payroll_id='$payroll_id'";
$resultsdedt= mysql_query($sqldedt) or die ("Error $sqldedt.".mysql_error());
$rowsdedt=mysql_fetch_object($resultsdedt);

echo number_format($ttl_ded_amount=$rowsdedt->ded_amount+$amount_repaid,2); 

$grnd_ttl_ded=$grnd_ttl_ded+$ttl_ded_amount;

?></td>
	
	<td align="center" ><strong>
<?php
echo number_format($net_pay=$gross_salary-$ttl_ded_amount,2);

$grnd_net_pay2=$grnd_net_pay2+$net_pay;
$grnd_net_pay=$grnd_net_pay+$net_pay;

 ?>	
	
	</strong></td>
	<td><a  target="_blank" href="view_payslip.php?payroll_id=<?php echo $payroll_id; ?>&month_pay=<?php echo $month_paid; ?>&single=1">Print Payslip</a></td>
	
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
  
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
  <tr>
  <td width="200"><strong>Stations Total</strong></td>
	
	<td width="200" colspan="3"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	//echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	
	<?php 
	$sqlben="select * from benefit_logs order by benefit_log_name asc";
$resultsben= mysql_query($sqlben) or die ("Error $sqlben.".mysql_error());


if (mysql_num_rows($resultsben) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsben=mysql_fetch_object($resultsben))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="right"><strong><?php
	  $benefit_log_id=$rowsben->benefit_log_id;
$sqlben2="select SUM(benefit_amount) as all_ben from benefits,payroll,employees where benefits.payroll_id=payroll_id and payroll_id.emp_id=employees.emp_id and emp.department='$station_id' and benefits.benefit_log_id='$benefit_log_id' and benefits.benefit_month='$date_month'";
$resultsben2= mysql_query($sqlben2) or die ("Error $sqlben2.".mysql_error());
$rowsben2=mysql_fetch_object($resultsben2);
	 
	echo  number_format($benefit_amount=$rowsben2->all_ben,2);
	 
	 
?></strong></td>
	 <?php
}


}

	 ?>
	
	
	<td width="200"><div align="center"><strong></strong></td>
	<td width="200"><div align="center"><strong></strong></td>
     <td width="200" ><div align="right"><strong><?php //echo number_format($grnd_ttl_ben,2); ?></strong></td>
	 
	 
	 
	<?php 
$sqleeb="select * from deduction_logs order by deduction_log_name asc";
$resultseeb= mysql_query($sqleeb) or die ("Error $sqleeb.".mysql_error());


if (mysql_num_rows($resultseeb) > 0)
						  {
							  $RowCounter=0;
							  while ($rowseeb=mysql_fetch_object($resultseeb))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="right"><strong><?php 
	 //echo $rowseeb->deduction_log_name;
	  $deduction_log_id=$rowseeb->deduction_log_id;
	  $payroll_id=$rows->payroll_id;
$ttl_deduction=0;
$sqlded="select SUM(deduction_amount) as all_ded from deductions
,payroll,employees where deductions.payroll_id=payroll.payroll_id and payroll.emp_id=employees.emp_id and employees.department='$station_id'

and deductions.deduction_log_id='$deduction_log_id' and deductions.deduction_month='$date_month'";
$resultsded= mysql_query($sqlded) or die ("Error $sqlded.".mysql_error());
$rowsded=mysql_fetch_object($resultsded);
	 
	echo  number_format($deduction_amount=$rowsded->all_ded,2);
	
	
	 ?></strong></td>
	 	 
	 <?php
}

  
  }
  ?>
  <td width="20"></td>
	     <td width="200" ><div align="right"><strong><?php echo number_format($grnd_ttl_ded,2); ?></strong></td>
	     <td width="200" ><div align="right"><strong><font size="+1" color="#ff0000;"><?php echo number_format($grnd_net_pay,2); ?></strong></td>
  
  <?php 
  }
  
  ?>
 <tr height="30" bgcolor="#FFFFCC">
<td width="200"><strong>Grand Total</strong></td>
	
	<td width="200" colspan="3"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	//echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	
	<?php 
	$sqlben="select * from benefit_logs order by benefit_log_name asc";
$resultsben= mysql_query($sqlben) or die ("Error $sqlben.".mysql_error());


if (mysql_num_rows($resultsben) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsben=mysql_fetch_object($resultsben))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="right"><strong><?php
	  $benefit_log_id=$rowsben->benefit_log_id;
$sqlben2="select SUM(benefit_amount) as all_ben from benefits where benefit_log_id='$benefit_log_id' and benefit_month='$date_month'";
$resultsben2= mysql_query($sqlben2) or die ("Error $sqlben2.".mysql_error());
$rowsben2=mysql_fetch_object($resultsben2);
	 
	echo  number_format($benefit_amount=$rowsben2->all_ben,2);
	 
	 
?></strong></td>
	 <?php
}


}

	 ?>
	
	
	<td width="200"><div align="center"><strong></strong></td>
	<td width="200"><div align="center"><strong></strong></td>
     <td width="200" ><div align="right"><strong><?php //echo number_format($grnd_ttl_ben,2); ?></strong></td>
	 
	 
	 
	<?php 
$sqleeb="select * from deduction_logs order by deduction_log_name asc";
$resultseeb= mysql_query($sqleeb) or die ("Error $sqleeb.".mysql_error());


if (mysql_num_rows($resultseeb) > 0)
						  {
							  $RowCounter=0;
							  while ($rowseeb=mysql_fetch_object($resultseeb))
							  { 
	
	?>
	
	
	 <td width="300" ><div align="right"><strong><?php 
	 //echo $rowseeb->deduction_log_name;
	  $deduction_log_id=$rowseeb->deduction_log_id;
	  $payroll_id=$rows->payroll_id;
$ttl_deduction=0;
$sqlded="select SUM(deduction_amount) as all_ded from deductions where deduction_log_id='$deduction_log_id' and deduction_month='$date_month'";
$resultsded= mysql_query($sqlded) or die ("Error $sqlded.".mysql_error());
$rowsded=mysql_fetch_object($resultsded);
	 
	echo  number_format($deduction_amount=$rowsded->all_ded,2);
	
	
	 ?></strong></td>
	 <?php
}}

	 ?>
	 
	 
	 
	 
	 

	 <td width="20"></td>
	     <td width="200" ><div align="right"><strong><?php echo number_format($grnd_ttl_ded,2); ?></strong></td>
	     <td width="200" ><div align="right"><strong><font size="+1" color="#ff0000;"><?php echo number_format($grnd_net_pay2,2); ?></strong></td>
	

   <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>

<?php




}

	 ?>
	 
	 
	 
	 
	 

	
  
  
  
  
  
  
  </tr>
  <?php

  ?>
</table>
</form>

  
  <SCRIPT src="js/superTables.js" 
type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[

(function() {
	var mySt = new superTable("demoTable", {
		cssSkin : "sSky",
		fixedCols : 1,
		headerRows : 1,
		onStart : function () {
			this.start = new Date();
		},
		onFinish : function () {
			document.getElementById("testDiv").innerHTML += "Finished...<br>" + ((new Date()) - this.start) + "ms.<br>";
		}
	});
})();

//]]>
</SCRIPT>	
		
			

			
			
			
					
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