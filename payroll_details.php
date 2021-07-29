<?php 
include('Connections/fundmaster.php');
$id=$_GET['emp_id'];	
$current_month=$_GET['current_month'];
$payroll_id=$_GET['payroll_id'];

$sqluser="select * from employees where emp_id='$id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
$rowsuser=mysql_fetch_object($resultsuser);
$userid=$rowsuser->emp_id;


$sqlcomm="select * from commision_payments where sales_rep='$userid' AND month_paid='$current_month'";
$resultscomm= mysql_query($sqlcomm) or die ("Error $sqlcomm.".mysql_error());
if (mysql_num_rows($resultscomm) > 0)
						  {
						  while ($rowscomm=mysql_fetch_object($resultscomm))
							  { 
							  $amount_paid=$rowscomm->amount_paid;
							  $curr_rate=$rowscomm->curr_rate;
							  $amount_paid_kshs=$amount_paid*$curr_rate;
							  
							   $ttl_comm=$ttl_comm+$amount_paid_kshs;
							  }
							  
							  }
							  
							  
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
							  
						  
							  
							  
							  
// get unpaid salary balance

$sqlsnt="select * from payroll where emp_id='$id' order by payroll_id desc limit 1,2";
$resultsnt= mysql_query($sqlsnt) or die ("Error $sqlsnt.".mysql_error());
$rowsnt=mysql_fetch_object($resultsnt);
echo $net_sal=$rowsnt->net_pay;
echo $id2=$rowsnt->payroll_id;


	
				  
$sqlsb="select * from salary_payments where emp_id='$id' AND payroll_id='$id2'";
$resultssb= mysql_query($sqlsb) or die ("Error $sqlsb.".mysql_error());
$rowssb=mysql_fetch_object($resultssb);
$sal_paid=$rowssb->amount_received;
$curr_rate=$rowssb->curr_rate;
$sal_paid_kshs=$sal_paid*$curr_rate;




$ttl_staff_bal=$net_sal-$sal_paid_kshs;


?>
<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Kindly Confirm That Every Details Is Correct before processing the payroll. Are sure you want to proceed?");
}

function confirmDeleteBenefit()
{
    return confirm("Are you sure you want to delete the benefit?");
}

function confirmDeleteDeduction()
{
    return confirm("Are you sure you want to delete the deduction?");
}


</script>



<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
<div id="zone-bar" class="br-5">
		<?php require_once('includes/payslipsubmenu.php');  ?>
		</div>
		<h3>:: Add Pay Details for Employee : 
		
<?php $sqlemp_det="select * from employees where emp_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

echo $rowsemp_det->emp_firstname.' '.$rowsemp_det->emp_middle_name.' '.$rowsemp_det->emp_lastname;
?>

  : Employee No. <?php echo $rowsemp_det->employee_no; ?>
  
  : Employment Status : <?php echo $rowsemp_det->emp_status; ?>
		
		
		</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="emp" id="emp" action="processaddpaydet.php?employee_id=<?php echo $id;  ?>" method="post">

	<input type="hidden" size="41" name="emp_id" value="<?php echo $id?>">
	<input type="hidden" size="41" name="current_month" value="<?php echo $current_month?>">
	<input type="hidden" size="41" name="payroll_id" value="<?php echo $payroll_id?>">


			<table width="100%" border="0" align="left">
 <tr height="20" bgcolor="#FFFFCC">
    <td width="10%">&nbsp;</td>
	<td colspan="7" height="30" align="center"><?php

if ($_GET['empeditconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Employee Details Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Salary already processed</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="20" bgcolor="#FFFFCC">
	<td>&nbsp;</td>
	<td colspan="6" ><h3>Add Employee Payroll Information </h3></td>
    

    </tr>
	<tr height="20" bgcolor="#C0D7E5">
	<td>&nbsp;</td>
	<td colspan="6" ><h4>Payment Details </h4></td>
    

    </tr>
  <tr height="25" bgcolor="#FFFFCC">
    <td width="5%">&nbsp;</td>
    <td width="30%">Gross Salary<font color="#FF0000"></font></td>
	<td width="10%"><?php echo number_format($basic_sal=$rowsemp_det->basic_sal,2);?></td>	
	
	<td width="17%"><!--Commision Due This Month :--></td>	
    <td bgcolor colspan="5">
	
	
	<!---->
	
	 <?php //echo number_format($ttl_comm,2);?>
	 <input type="hidden" size="41" name="comm_due" value="<?php echo $ttl_comm ?>">
	
	<!--<input name="date_month" id="date_month" class="date-picker" size="40" />-->
	
	
	</td>

    <!--<td width="30%">Middle Name</td>
    <td width="5%"><input type="text" size="41" name="m_name" value="<?php echo $rowsemp_det->emp_middle_name;?> "></td>
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>-->
  </tr>
  
  

	<?php $gross_pay=$basic_sal+$ttl_comm+$unpaid_ball; ?>

	
	
	

	<tr height="20" bgcolor="#C0D7E5">
	
	<td>&nbsp;</td>
	<td colspan="6" ><h4>Benefits Or Allowances</i> <a rel="facebox" href="add_benefit.php?emp_id=<?php echo $id ?>&current_month=<?php echo $current_month; ?>&payroll_id=<?php echo $payroll_id ?>" style="margin-left:310px;">[Click here to add a benefit or allowance]</a></h4></td>
    
 
    </tr>
	<?php 
$sql="select * from benefits where emp_id='$id' AND benefit_month='$current_month' order by benefit_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

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
 
 
 ?>			  
							  
							
	<td width="5%"></td><td>
	<?php echo $rows->benefit_name;?></td>
	
	<td width="10%"><?php echo number_format($benefit_amount=$rows->benefit_amount,2);?></td>					  
							  
	<td colspan="5">[<a rel="facebox" href="edit_benefit.php?benefit_id=<?php echo $rows->benefit_id?>&emp_id=<?php echo $id ?>&current_month=<?php echo $current_month; ?>&payroll_id=<?php echo $payroll_id ?>">Edit</a>] 
	[<a onClick="return confirmDeleteBenefit();" href="delete_benefit.php?benefit_id=<?php echo $rows->benefit_id?>&emp_id=<?php echo $id ?>&current_month=<?php echo $current_month; ?>&payroll_id=<?php echo $payroll_id ?>">Delete</a>]</td>						  
							  
		</tr>	
							  
							  
<?php 
 $ttl_benefits=$ttl_benefits+$benefit_amount;
}	

}						  
	

	?>
	<tr height="30" bgcolor="#FFFFCC">
	<td></td>
	<td><strong>Total Benefits: </strong></td>
	<td colspan="5">
<strong>
	<?php echo number_format($ttl_benefits,2); ?>

	
	
	</strong>
	</td>
	
	</tr>
	
	<tr height="20" bgcolor="#C0D7E5">
	
	<td>&nbsp;</td>
	<td colspan="6" ><h4>Other Deductions eg. NHIF,NSSF, P.A.Y.E</i> <a rel="facebox" href="add_deduction.php?emp_id=<?php echo $id ?>&current_month=<?php echo $current_month; ?>&payroll_id=<?php echo $payroll_id ?>" style="margin-left:170px;">[Click here to add other deductions]</a></h4></td>
    
  
    </tr>
	<tr bgcolor="#FFFFCC" height="25">
	<td width="5%"></td><td>
	Advance Payments</td>
	<td ><?php 
	$ttl_adv; //total advance
	$ttl_install;//total istallments
	
$sqldedad="select SUM(amount_repaid) as adv_amount_paid from staff_advance_repayment where emp_id='$id'";
$resultsdedad= mysql_query($sqldedad) or die ("Error $sqldedad.".mysql_error());
$rowsdedad=mysql_fetch_object($resultsdedad);
   number_format($adv_amount_paid=$rowsdedad->adv_amount_paid,2);
	
 number_format($ttl_adv,2);
	
	 number_format($ball=$ttl_adv-$adv_amount_paid,2);
	
	
	if ($ttl_install>$ball)
	{
	$adv_amount=$ball;
	//echo "display balalnce";
	}
	
	if ($ball>$ttl_install)
	{
	$adv_amount=$ttl_install;
	//echo "display installment";
	
	}
	
	if ($ball==0)
	{
	$adv_amount=0;
	//echo "display null";
	
	}
	
	echo number_format($adv_amount,2);
	
	?>
	<input type="hidden" size="41" name="advance" value="<?php echo $adv_amount;?> ">
	
	
	
	
	</td>					  
							  
	<td colspan="5">
	<?php
if ($adv_amount!=0)
{
	?>
	
	Total Principle Advance : <?php echo number_format($ttl_adv,2)?>
	
	Paid So far
	
	<?php 
$sqldedad="select SUM(amount_repaid) as adv_amount_paid from staff_advance_repayment where emp_id='$id'";
$resultsdedad= mysql_query($sqldedad) or die ("Error $sqldedad.".mysql_error());
$rowsdedad=mysql_fetch_object($resultsdedad); 
echo number_format($adv_amount_paid=$rowsdedad->adv_amount_paid,2);
	?>
	<!--[Delete]-->
	Balance
	<?php
echo number_format($ball=$ttl_adv-$adv_amount_paid,2);
	}
	else
	{
	
	}
	
	
	?>
	
	</td>							  
							  
	</tr>	
	
	<?php 
$sqlded="select * from deductions where emp_id='$id' AND deduction_month='$current_month' order by deduction_id asc";
$resultsded= mysql_query($sqlded) or die ("Error $sqlded.".mysql_error());

if (mysql_num_rows($resultsded) > 0)
						  {
         $RowCounter=0;
         while ($rowsded=mysql_fetch_object($resultsded))

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
	<td width="5%"></td><td>
	<?php echo $rowsded->deduction_name;?></td>
	<td ><?php echo number_format($deduction_amount=$rowsded->deduction_amount,2);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>					  
							  
	<td colspan="5">[<a rel="facebox" href="edit_deduction.php?deduction_id=<?php echo $rowsded->deduction_id?>&emp_id=<?php echo $id ?>&current_month=<?php echo $current_month; ?>&payroll_id=<?php echo $payroll_id ?>">Edit</a>]
	
	[<a onClick="return confirmDeleteDeduction();" href="delete_deduction.php?deduction_id=<?php echo $rowsded->deduction_id?>&emp_id=<?php echo $id ?>&current_month=<?php echo $current_month; ?>&payroll_id=<?php echo $payroll_id ?>">Delete</a>]</td>							  
							  
	</tr>		
							  
							  
<?php 

$ttl_ded=$ttl_ded+$deduction_amount;
}	

}						  
	
	
	?>
	<tr height="30" bgcolor="#FFFFCC">
	<td></td>
	<td><strong>Total Deductions: </strong></td>
	<td colspan="5">
<strong>
	<?php echo number_format($grnd_ded=$ttl_ded+$adv_amount,2); ?>

	
	</strong>
	
	</td>
	
	</tr>
	
	<tr height="30" bgcolor="#FFFFCC">
	<td ></td>
	<td colspan="8">
	<strong><font size="+1">Net Pay: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></strong><font size="+1"color="#ff0000"><strong><?php echo number_format($net_pay=$gross_pay+$ttl_benefits-$grnd_ded,2); ?></strong></font>
	
	<input type="hidden" size="41" name="net_pay" value="<?php echo $net_pay;?> ">
	
	
	</td>
	
	</tr>
	
	
	
	<tr height="40"  bgcolor="#FFFFCC">
	<td>&nbsp;</td>
	<td colspan="5" align="left"><input type="submit" name="submit" value="Save Payroll Details" onClick="return confirmDelete();">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    

    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
<script type="text/javascript">
/*
  Calendar.setup(
    {
      inputField  : "date_joined",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_joined"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "dob",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "dob"       // ID of the button
    }
  );
  
*/  
  
  </script> 

<script language="JavaScript" type="text/javascript"
    xml:space="preserve">

	//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("emp");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
 frmvalidator.addValidation("f_name","req",">>Please enter first name");
 frmvalidator.addValidation("l_name","req",">>Please enter lastname");
 frmvalidator.addValidation("emp_no","req",">>Please enter employee number");
 frmvalidator.addValidation("phone","req",">>Please enter phone number");
 frmvalidator.addValidation("nat_id","req",">>Please enter national ID number");
 frmvalidator.addValidation("pin_no","req",">>Please enter PIN No.");
 frmvalidator.addValidation("town","req",">>Please enter town");
 frmvalidator.addValidation("nationality","req",">>Please enter nationality");
 frmvalidator.addValidation("dob","req",">>Please enter date of birth");
 frmvalidator.addValidation("gender","selone_radio",">>Please enter gender");
 frmvalidator.addValidation("marital_status","dontselect=0",">>Please select marital status");
 frmvalidator.addValidation("job_title","req",">>Please enter job title");
 frmvalidator.addValidation("em_status","dontselect=0",">>Select employment status");
 frmvalidator.addValidation("dept","req",">>Please enter department");
 frmvalidator.addValidation("date_joined","req",">>Please enter date joined");
 frmvalidator.addValidation("job_email","req",">>Please enter  job email address");
 frmvalidator.addValidation("job_email","email",">>Please enter valid job email address");
 frmvalidator.addValidation("email","req",">>Please enter personal email address");
  frmvalidator.addValidation("email","email",">>Enter valid personal email address");

  
//]]></script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("date_month","req",">>Please enter month");
 
 
 
 
  </SCRIPT>

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
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