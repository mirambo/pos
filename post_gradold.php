<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);



.table td, tr
{
border:1px solid black;
padding:3px;
}

.table td, tr a
{
color:#ff0000;
text-decoration:none;

}

.table td, tr a:hover
{
color:#ffffff;
text-decoration:none;

}

.table td, tr a:current
{
background:#ff0000;
text-decoration:none;

}

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<form name="emp" id="emp" action="processaddemployee.php" method="post">			
<table width="100%" border="0">
  <tr align="center" >
  
	<td colspan="6" height="30">
<?php
if ($_GET['addempconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Successfully!!</font></strong></p></div>';


if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
	<td rowspan="18" width="30%" valign="top">
	<table width="100%" border="0" class="table">
	<tr height="0%"><td><h4><a href="home.php?basicinfo=basicinfo">Basic Personal Information</a></h4></td></tr>
	<tr><td><h4><a href="home.php?passport=passport">Personal Certification (Passport)</a></h4></td></tr>
	<tr><td><h4><a href="home.php?visa=visa">Personal Certification (Visa)</a></h4></td></tr>
	<tr><td><h4><a href="home.php?workpermit=workpermit">Personal Certification (Work Permit)</a></h4></td></tr>
	<tr><td><h4><a href="home.php?idcard=idcard">Personal Certification (Ident. Card)</a></h4></h4></td></tr>
	<tr><td><h4 ><a href="home.php?specid=specid">Personal Certification(SPECS ID)</a></h4></td></tr>
	<tr><td><h4><a href="home.php?edubg=edubg">Education Background</a></h4></td></tr>
	<tr><td><h4><a href="home.php?othertraining=othertraining">Other Training</a></h4></td></tr>
	<tr ><td><h4><a href="home.php?workexperience=workexperience">Work Experience</a></h4></td></tr>
	<tr><td><h4><a href="home.php?empcontract=empcontract">Employment Contract</a></h4></td></tr>
	<tr><td><h4><a href="home.php?salarydet=salarydet">Salary Details</a></h4></td></tr>
	<tr><td><h4><a href="home.php?contdet=contdet">Contact Details</a></h4></td></tr>
	<tr><td><h4><a href="home.php?familystatus=familystatus">Family Status</a></h4></td></tr>
	<tr><td><h4><a href="home.php?skillprofile=skillprofile">Skill Profile</a></h4></td></tr>
	<tr><td><h4><a href="home.php?prize=prize">Prize and Honour</a></h4></td></tr>
	
	
	</table>
	
	
	
	</td>
	<td colspan="4" ><h3>Staff Personal Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="20%">First Name <font color="#FF0000">*</font></td>
    <td bgcolor=""><div id='emp_f_name_errorloc' class="error_strings"></div><input type="text" size="41" name="f_name"></td>
    <td width="30%">Middle Name</td>
    <td width="5%"><input type="text" size="41" name="m_name" value="<?php echo $m_name;?> "></td>
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
 
    <td>Last Name <font color="#FF0000">*</font></td>
    <td><div id='emp_l_name_errorloc' class="error_strings"></div><input type="text" size="41" name="l_name"></td>
    <td>Employee Number</td>
<?php 
$queryempno="select emp_id from employees order by emp_id desc limit 1";
$resultsempno=mysql_query($queryempno) or die ("Error: $queryempno.".mysql_error());								  
$rowsempno=mysql_fetch_object($resultsempno);
$emp_no=$rowsempno->emp_id;

$employee_no=$emp_no+1;
?>

    <td><div id='emp_emp_no_errorloc' class="error_strings"></div><input type="text" size="41" name="emp_no" value="<?php echo "SPT".$employee_no;?> " readonly="readonly"></td>
    </tr>
	<tr height="20">
    
    <td>Phone Number<font color="#FF0000">*</font></td>
    <td><div id='emp_phone_errorloc' class="error_strings"></div><input type="text" size="41" name="phone"></td>
    <td>National ID<font color="#FF0000">*</font></td>
    <td><div id='emp_nat_id_errorloc' class="error_strings"></div><input type="text" size="41" name="nat_id"></td>
    </tr>
	<tr height="20">

	  <td>PIN Number<font color="#FF0000">*</font></td>
    <td><div id='emp_pin_no_errorloc' class="error_strings"></div><input type="text" size="41" name="pin_no"></td>
    <td>Town/City<font color="#FF0000">*</font></td>
    <td><div id='emp_town_errorloc' class="error_strings"></div><input type="text" size="41" name="town"></td>
    </tr>
	<tr height="20">

	  <td>Nationality <font color="#FF0000">*</font></td>
    <td><div id='emp_nationality_errorloc' class="error_strings"></div><input type="text" size="41" name="nationality"></td>
    <td>Date of Birth</td>
    <td><div id='emp_dob_errorloc' class="error_strings"></div><input type="text" name="dob" size="41" id="dob" readonly="readonly" /></td>
    </tr>
	<tr height="20">

	  <td>Gender<font color="#FF0000">*</font></td>
    <td><div id='emp_gender_errorloc' class="error_strings"></div><input type="radio" name="gender" value="Male">Male &nbsp;&nbsp;<input type="radio" name="gender" value="Female">Female</td>
    <td>NHIF Number</td>
    <td><input type="text" size="41" name="nhif_no"></td>
    </tr>
	
	<tr height="20">
	
	  <td>NSSF Number</td>
    <td><input type="text" size="41" name="nssf_no"></td>
    <td>Marital Status<font color="#FF0000">*</font></td>
    <td><div id='emp_marital_status_errorloc' class="error_strings"></div><select name="marital_status">
	                  <option value="0">Marital Status...........</option>
								  
										  
                                    <option value="Single">Single</option>
									<option value="Married">Married</option>
									<option value="Divorced">Divorced</option>
									<option value="Separated">Separated</option>
									
                                    
                                
										
								  </select>	</td>
    </tr>
	
	<tr height="20">

	<td colspan="4" bgcolor="#000033"><h3>Staff Job Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="20">

	  <td>Job Title<font color="#FF0000">*</font></td>
    <td><div id='emp_job_title_errorloc' class="error_strings"></div>
	<select name="job_title">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $query1="select * from job_titles order by job_title_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->job_title_id; ?>"><?php echo $rows1->job_title_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>
	
	</td>
    <td>Employment Status<font color="#FF0000">*</font></td>
    <td><div id='emp_em_status_errorloc' class="error_strings"></div>
	<select name="em_status">
	                  <option value="0">Employment Status...........</option>
								  
										  
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
	  
	  <td>Department<font color="#FF0000">*</font></td>
    <td><div id='emp_dept_errorloc' class="error_strings"></div>
	<select name="dept">
	                  <option value="0">Department...........</option>
								  
										  
                                    <option value="Office">Office</option>
									<option value="Field">Field</option>
									
									
									
									
                                    
                                
										
								  </select>	</div>
	
	
	</td>
    <td>Date Joined<font color="#FF0000">*</font></td>
    <td><div id='emp_date_joined_errorloc' class="error_strings"></div><input type="text" name="date_joined" size="41" id="date_joined" readonly="readonly" /></td>
    </tr>
	
	<tr height="20">
	 
	  <td>Job Email Address<font color="#FF0000">*</font></td>
    <td><div id='emp_job_email_errorloc' class="error_strings"></div><input type="text" size="41" name="job_email"></td>
    <td>Personal Email Address<font color="#FF0000">*</font></td>
    <td><div id='emp_email_errorloc' class="error_strings"></div><input type="text" size="41" name="email"></td>
    </tr>
	<tr height="20">
	
	<td>Job Category<font color="#FF0000">*</font></td>
    <td><div id='emp_job_cat_errorloc' class="error_strings"></div>
	<select name="job_cat">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $query1="select * from job_category order by job_cat_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->job_cat_id; ?>"><?php echo $rows1->job_cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>

	</td>
    <td></td>
    <td></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="4" bgcolor="#000033"><h3>Salary</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Basic Salary<font color="#FF0000">*</font></td>
    <td><div id='emp_basic_sal_errorloc' class="error_strings"></div><input type="text" size="41" name="basic_sal"></td>
    <td></td>
    <td></td>
    </tr>
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
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
  </tr>
  <tr>
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
 frmvalidator.addValidation("dept","dontselect=0",">>Please enter department");
 frmvalidator.addValidation("date_joined","req",">>Please enter date joined");
 frmvalidator.addValidation("job_email","req",">>Please enter  job email address");
 frmvalidator.addValidation("job_email","email",">>Please enter valid job email address");
 frmvalidator.addValidation("email","req",">>Please enter personal email address");
  frmvalidator.addValidation("email","email",">>Enter valid personal email address");
  frmvalidator.addValidation("job_cat","req",">>Enter job category");
  frmvalidator.addValidation("basic_sal","req",">>Enter basic Salary");

  
//]]></script>