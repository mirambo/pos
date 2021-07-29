<?php 
$id=$_GET['emp_id'];	
$l_name=$_GET['l_name'];	
$usergroup=$_GET['usergroup'];
$email=$_GET['email'];	
$username=$_GET['username'];
$current_month=(Date("F Y"));

?>
<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->
<script language="javaScript" src="gen_validatorv31.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

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
</style>

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

<?php	


		?>
			<table width="100%" border="0" align="left">
 <tr height="20">
    <td width="10%">&nbsp;</td>
	<td colspan="4" height="30" align="center"><?php

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
	
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" ><h3>Add Employee Payroll Information </h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" ><h4>Payment Details </h4></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    <td width="5%">&nbsp;</td>
    <td width="20%">Select Month<font color="#FF0000">*</font></td>
    <td bgcolor>
	<input name="date_month" id="date_month" class="date-picker" size="40" />
	
	
	</td>
	<td width="500" rowspan="3" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
    <!--<td width="30%">Middle Name</td>
    <td width="5%"><input type="text" size="41" name="m_name" value="<?php echo $rowsemp_det->emp_middle_name;?> "></td>
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>-->
  </tr>
  <tr height="20">
    <td width="5%">&nbsp;</td>
    <td width="20%">Basic Salary<font color="#FF0000">*</font></td>
    <td bgcolor=""><input type="text" size="41" name="basic_pay" value="<?php echo $rowsemp_det->basic_sal;?>"></td>
    <!--<td width="30%">Middle Name</td>
    <td width="5%"><input type="text" size="41" name="m_name" value="<?php echo $rowsemp_det->emp_middle_name;?> "></td>
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>-->
  </tr>
<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Sales Commisison<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="comm_pay" value="<?php 
	
$sqlcomm="select user_id from users where emp_id='$id'";
$resultscomm= mysql_query($sqlcomm) or die ("Error $sqlcomm.".mysql_error());
$rowscomm=mysql_fetch_object($resultscomm);

$comm_user_id=$rowscomm->user_id;

$date = date("Y-m-d");

$month_start=date("Y-m-d", strtotime("- 30 day"));

//echo $comm_user_id;

$ttl_com=0;
$sqlrec="select amount_paid from commision_payments where sales_rep='$comm_user_id' and month_paid='$current_month'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());

if (mysql_num_rows($resultsrec)>0)
{

while ($rowsrec=mysql_fetch_object($resultsrec))

		{
		
		   $ttl_com=$ttl_com+$rowsrec->amount_paid;
		   

		}
echo $ttl_com;

}
?> "></td>
   </tr>-->
	<tr height="20">
	
	<td>&nbsp;</td>
	<td colspan="4" ><h4>P.A.Y.E Tax <i>(Tick if applicable)</i></h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	
	<td>&nbsp;</td>
	<td >Apply PAYE Tax?</td>
    
    <td><input type="radio" name="paye" value="1">Yes &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="paye" value="0" checked>No</td>
	<td></td>
	<td></td>
    </tr>
	
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" ><h4>Benefits <i>(Tick if applicable)</i></h4></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<?php 
$sql="select * from benefits order by benefit_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
         while ($rows=mysql_fetch_object($results))
							  { ?>
	<tr height="20"><td width="5%"></td><td>
	<input type="text" size="40" name="benefit_name[]" value="<?php echo $rows->benefit_name;?>" readonly="readonly" style="border:0px; background:none; font-family:verdana; font-size:12px;"></td>
	<td><input type="text" name="benefit_amount[]" value="<?php echo number_format($rows->benefit_amount,2);?>">&nbsp;&nbsp;&nbsp;</td></tr>						  
							  
							  
							  
		
							  
							  
<?php 
}	

}						  
	
	
	?>
	
	
	
	
	
	
	
	
	
	
	<!--<tr height="20">
	  <td>&nbsp;</td>
	  <td>PIN Number<font color="#FF0000">*</font></td>
    <td><div id='emp_pin_no_errorloc' class="error_strings"></div><input type="text" size="41" name="pin_no" value="<?php echo $rowsemp_det->pin_no;?> "></td>
    <td>Town/City<font color="#FF0000">*</font></td>
    <td><div id='emp_town_errorloc' class="error_strings"></div><input type="text" size="41" name="town" value="<?php echo $rowsemp_det->town;?> "></td>
    </tr>
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Nationality <font color="#FF0000">*</font></td>
    <td><div id='emp_nationality_errorloc' class="error_strings"></div><input type="text" size="41" name="nationality" value="<?php echo $rowsemp_det->nationality;?> "></td>
    <!--<td>Date of Birth</td>
    <td><div id='emp_dob_errorloc' class="error_strings"></div><input type="text" name="dob" size="41" value="<?php echo $rowsemp_det->dob;?>" id="dob" readonly="readonly" /></td>
    </tr>
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Gender<font color="#FF0000">*</font></td>
    <td><div id='emp_gender_errorloc' class="error_strings"></div>
	
	<?php 
	
	$sel_gender=$rowsemp_det->gender;
	
	if ($sel_gender=='Male')
	
	{ ?>
	
	<input type="radio" name="gender" value="Male" CHECKED >Male &nbsp;&nbsp;<input type="radio" name="gender" value="Female" readonly="readonly" >Female
	<?php
	}
	
	else 
	
	{ ?>
	
	<input type="radio" name="gender" value="Male">Male &nbsp;&nbsp;<input type="radio" name="gender" value="Female" CHECKED>Female
	<?php 
	}
	?>

	</td>
    <!--<td>NHIF Number</td>
    <td><input type="text" size="41" name="nhif_no" value="<?php echo $rowsemp_det->nhif_no;?>"></td>
   </tr>
	
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>NSSF Number</td>
    <td><input type="text" size="41" name="nssf_no" value="<?php echo $rowsemp_det->nssf_no;?> "></td>
    <!--<td>Marital Status<font color="#FF0000">*</font></td>
    <td><select name="marital_status">
	                  <option value="<?php echo $rowsemp_det->marital_status; ?>"><?php echo $rowsemp_det->marital_status; ?></option>
								  
										  
                                    <option value="Single">Single</option>
									<option value="Married">Married</option>
									<option value="Divorced">Divorced</option>
									<option value="Separated">Separated</option>
									
                                    
                                
										
								  </select>	</td>
    </tr>-->
	
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" bgcolor="#000033"><h4>Deductions <i>(Tick if applicable)</i></h4></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<?php 
$sqlded="select * from deductions order by deduction_name asc";
$resultsded= mysql_query($sqlded) or die ("Error $sqlded.".mysql_error());

if (mysql_num_rows($resultsded) > 0)
						  {
         while ($rowsded=mysql_fetch_object($resultsded))
							  { ?>
	<tr height="20"><td width="5%"></td><td>
	<input type="text" size="40" name="deduction_name[]" value="<?php echo $rowsded->deduction_name;?>" readonly="readonly" style="border:0px; background:none; font-family:verdana; font-size:12px;"></td>
	<td><input type="text" name="deduction_amount[]" value="<?php echo number_format($rowsded->deduction_amount,2);?>">&nbsp;&nbsp;&nbsp;</td></tr>						  
							  
							  
							  
		
							  
							  
<?php 
}	

}						  
	
	
	?>

<!--<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" bgcolor="#000033"><h4>Savings / Co-operatives <i>(Tick if applicable)</i></h4></td>
    
    <td>&nbsp;</td>
    </tr>-->
	
	<?php 
$sqlded="select * from savings order by savings_name asc";
$resultsded= mysql_query($sqlded) or die ("Error $sqlded.".mysql_error());

if (mysql_num_rows($resultsded) > 0)
						  {
         while ($rowsded=mysql_fetch_object($resultsded))
							  { ?>
	<tr height="20">
	
	<td width="5%"></td><td>
	<input type="text" size="40" name="savings_name[]" value="<?php echo $rowsded->savings_name;?>" readonly="readonly" style="border:0px; background:none; font-family:verdana; font-size:12px;"></td>
	<td><input type="textbox" name="savings_amount[]" value="<?php echo number_format($rowsded->savings_amount,2);?>">&nbsp;&nbsp;&nbsp;</td></tr>						  
							  
							  
							  
		
							  
							  
<?php 
}	

}						  
	
	
	?>	
	
	<!--<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" bgcolor="#000033"><h4>Loans <i>(Tick if applicable)</i></h4></td>
    
    <td>&nbsp;</td>
    </tr>-->
	
	<?php 
$sqlloan="select * from loans order by loan_name asc";
$resultsloan= mysql_query($sqlloan) or die ("Error $sqlloan.".mysql_error());

if (mysql_num_rows($resultsloan) > 0)
						  {
         while ($rowsloan=mysql_fetch_object($resultsloan))
							  { ?>
	<tr height="20"><td width="5%"></td><td>
	<input type="text" size="40" name="loan_name[]" value="<?php echo $rowsloan->loan_name;?>" readonly="readonly" style="border:0px; background:none; font-family:verdana; font-size:12px;"></td>
	<td><input type="text" name="loan_amount[]" value="<?php echo number_format($rowsloan->default_amount,2);?>">&nbsp;&nbsp;&nbsp;</td></tr>						  
							  
							  
							  
		
							  
							  
<?php 
}	

}						  
	
	
	?>	
	
	
	<tr height="40">
	<td>&nbsp;</td>
	<td colspan="4" align="left"><input type="submit" name="submit" value="Save Payroll Details">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    
    <td>&nbsp;</td>
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