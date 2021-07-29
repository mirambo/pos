<?php 
$id=$_GET['emp_id'];	
$l_name=$_GET['l_name'];	
$usergroup=$_GET['usergroup'];
$email=$_GET['email'];	
$username=$_GET['username'];

?>
<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>-->
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

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

		<?php require_once('includes/employeessubmenu.php');  ?>
		
		<h3>:: Create New Employee Into The System</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="emp" id="emp" action="processeditemployee.php?employee_id=<?php echo $id;  ?>" method="post">

<?php	

$sqlemp_det="select * from employees where emp_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
		?>
			<table width="100%" border="0">
 <tr height="20">
    <td width="30%">&nbsp;</td>
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
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" ><h3>Staff Personal Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    <td width="5%">&nbsp;</td>
    <td width="20%">First Name <font color="#FF0000">*</font></td>
    <td bgcolor=""><div id='emp_f_name_errorloc' class="error_strings"></div><input type="text" size="41" name="f_name" value="<?php echo $rowsemp_det->emp_firstname;?> "></td>
    <td width="30%">Middle Name</td>
    <td width="5%"><input type="text" size="41" name="m_name" value="<?php echo $rowsemp_det->emp_middle_name;?> "></td>
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Last Name <font color="#FF0000">*</font></td>
    <td><div id='emp_l_name_errorloc' class="error_strings"></div><input type="text" size="41" name="l_name" value="<?php echo $rowsemp_det->emp_lastname;?> "></td>
    <td>Employee Number</td>

    <td><div id='emp_emp_no_errorloc' class="error_strings"></div><input type="text" size="41" name="emp_no" value="<?php echo $rowsemp_det->employee_no;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Phone Number<font color="#FF0000">*</font></td>
    <td><div id='emp_phone_errorloc' class="error_strings"></div><input type="text" size="41" name="phone" value="<?php echo $rowsemp_det->emp_phone;?> "></td>
    <td>National ID<font color="#FF0000">*</font></td>
    <td><div id='emp_nat_id_errorloc' class="error_strings"></div><input type="text" size="41" name="nat_id" value="<?php echo $rowsemp_det->national_id;?> "></td>
    </tr>
	<tr height="20">
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
    <td>Date of Birth</td>
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
    <td>NHIF Number</td>
    <td><input type="text" size="41" name="nhif_no" value="<?php echo $rowsemp_det->nhif_no;?>"></td>
    </tr>
	
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>NSSF Number</td>
    <td><input type="text" size="41" name="nssf_no" value="<?php echo $rowsemp_det->nssf_no;?> "></td>
    <td>Marital Status<font color="#FF0000">*</font></td>
    <td><select name="marital_status">
	                  <option value="<?php echo $rowsemp_det->marital_status; ?>"><?php echo $rowsemp_det->marital_status; ?></option>
								  
										  
                                    <option value="Single">Single</option>
									<option value="Married">Married</option>
									<option value="Divorced">Divorced</option>
									<option value="Separated">Separated</option>
									
                                    
                                
										
								  </select>	</td>
    </tr>
	
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" bgcolor="#000033"><h3>Staff Job Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Job Title<font color="#FF0000">*</font></td>
    <td><div id='emp_job_title_errorloc' class="error_strings"></div><input type="text" size="41" name="job_title" value="<?php echo $rowsemp_det->job_title_id; ?> "></td>
    <td>Employment Status<font color="#FF0000">*</font></td>
    <td>
	<select name="em_status">
	                  <option value="<?php echo $rowsemp_det->emp_status; ?>"><?php echo $rowsemp_det->emp_status; ?></option>
								  
										  
                                    <option value="Terminated">Terminated</option>
									<option value="Full Time Contract">Full Time Contract</option>
									<option value="Parmanent">Parmanent</option>
									<option value="Casual">Casual</option>
									<option value="Locum Contract">Locum Contract</option>
									<option value="Internship Contract">Internship Contract</option>
									<option value="Seasonal Contract">Seasonal Contract</option>
									
									
									
                                    
                                
										
								  </select>	</td>
    </tr>
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Section<font color="#FF0000">*</font></td>
    <td>
	<?php 
	$station=$rowsemp_det->department;
$queryprodcat="select * from station where station_id='$station'";
$resultsprodcat=mysql_query($queryprodcat) or die ("Error: $queryprodcat.".mysql_error());
								  
$rowsprodcat=mysql_fetch_object($resultsprodcat);
	
	
	?>
	<select name="station"><option value="<?php echo $station ?>"><?php echo $rowsprodcat->station_name;?></option>
								  <?php
								  
								  $query1="select * from station order by station_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->station_id; ?>"><?php echo $rows1->station_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td>Date Joined<font color="#FF0000">*</font></td>
    <td><div id='emp_date_joined_errorloc' class="error_strings"></div><input type="text" name="date_joined" value="<?php echo $rowsemp_det->joined_date; ?>" size="41" id="date_joined" readonly="readonly" /></td>
    </tr>
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Job Email Address<font color="#FF0000">*</font></td>
    <td><div id='emp_job_email_errorloc' class="error_strings"></div><input type="text" size="41" name="job_email" value="<?php echo $rowsemp_det->job_email;?>"></td>
    <td>Personal Email Address<font color="#FF0000">*</font></td>
    <td><div id='emp_email_errorloc' class="error_strings"></div><input type="text" size="41" name="email" value="<?php echo $rowsemp_det->emp_email;?>"></td>
    </tr>
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" bgcolor="#000033"><h3>Staff Next Of Kin Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="20">
	<td>&nbsp;</td>
	<td>Next Of Kin Names<font color="#FF0000"></font></td>
    <td><input type="text" name="kin" size="40" value="<?php echo $rowsemp_det->kin;?>"></td>
    <td>Next Of Kin Phone No<font color="#FF0000"></font></td>
    <td><input type="text" name="kin_phone" size="40" value="<?php echo $rowsemp_det->kin_phone;?>"></td>
    </tr>
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" bgcolor="#000033"><h3>Staff Bank Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="20">
	<td>&nbsp;</td>
	<td>Bank Name<font color="#FF0000">*</font></td>
    <td><div id='emp_bank_name_errorloc' class="error_strings"></div><input type="text" size="41" name="bank_name" value="<?php echo $rowsemp_det->bank_name;?>"></td>
    <td>Branch Name<font color="#FF0000">*</font></td>
    <td><div id='emp_bank_branch_errorloc' class="error_strings"></div><input type="text" size="41" name="bank_branch" value="<?php echo $rowsemp_det->bank_branch;?>"></td>
    </tr>
	<tr height="20">
	<td>&nbsp;</td>
	<td>Account Name<font color="#FF0000">*</font></td>
    <td><div id='emp_bank_account_errorloc' class="error_strings"></div><input type="text" size="41" name="bank_account" value="<?php echo $rowsemp_det->bank_account_name;?>"></td>
    <td>Account Number<font color="#FF0000">*</font></td>
    <td><div id='emp_bank_account_no_errorloc' class="error_strings"></div><input type="text" name="bank_account_no" size="41" value="<?php echo $rowsemp_det->bank_account_number;?>"/></td>
    </tr>
	
	<tr height="20">
	<td>&nbsp;</td>
	<td colspan="4" bgcolor="#000033"><h3>Salary</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Basic Salary<font color="#FF0000">*</font></td>
    <td><div id='emp_basic_sal_errorloc' class="error_strings"></div><input type="text" size="41" name="basic_sal" value="<?php echo $rowsemp_det->basic_sal;?>"></td>
    <td></td>
    <td></td>
    </tr>
	
	<tr height="40">
	<td>&nbsp;</td>
	<td colspan="4" align="center"><input type="submit" name="submit" value="Update Employee Details">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    
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
  
  
  
  </script> 

<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
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
 /*var frmvalidator  = new Validator("new_user");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("f_name","req",">>Please enter first name");
 frmvalidator.addValidation("l_name","req",">>Please enter Lastname");
 frmvalidator.addValidation("emp_no","req",">>Please enter employee number");
 frmvalidator.addValidation("pin_no","req",">>Please enter PIN No.");
 frmvalidator.addValidation("town","req",">>Please enter town");
 frmvalidator.addValidation("nationality","req",">>Please enter Nationality");
 frmvalidator.addValidation("dob","req",">>Please enter date of birth");
 frmvalidator.addValidation("gender","selone_radio",">>Please enter gender");
 frmvalidator.addValidation("marital_status","dontselect=0",">>Please select marital status");
 frmvalidator.addValidation("job_title","req",">>Please enter job title");
 frmvalidator.addValidation("em_status","dontselect=0",">>Select Employment Status");
 frmvalidator.addValidation("dept","req",">>Please enter department");
 frmvalidator.addValidation("date_joined","req",">>Please enter date joined");
 frmvalidator.addValidation("job_email","req",">>Please enter  job email address");
 frmvalidator.addValidation("job_email","email",">>Please enter valid job email address");
 frmvalidator.addValidation("email","req",">>Please enter personal email address");
  frmvalidator.addValidation("email","email",">>Enter valid personal email address");*/
 
 
 
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