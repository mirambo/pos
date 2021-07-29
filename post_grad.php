<?php 
$emp_id=$_GET['emp_id'];
/*$emp_fname=$_GET['emp_fname'];
$emp_mname=$_GET['emp_mname'];
$emp_lname=$_GET['emp_lname'];
$employee_no=$_GET['employee_no'];*/

$queryempno="select * from employees where emp_id='$emp_id'";
$resultsempno=mysql_query($queryempno) or die ("Error: $queryempno.".mysql_error());								  
$rowsempno=mysql_fetch_object($resultsempno);
$employee_no=$rowsempno->employee_no;
$emp_fname=$rowsempno->emp_fname;
$emp_lname=$rowsempno->emp_lname;
$emp_mname=$rowsempno->emp_mname;




?>
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
<form name="emp" id="emp" action="processaddemployeepim.php?emp_id=<?php echo $emp_id; ?>" method="post" enctype="multipart/form-data" >			
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
	<td rowspan="18" width="25%" valign="top">
	<?php include ('includes/emp_submenu.php')?>
	
	
	
	</td>
	<td colspan="4" ><h3>Staff Basical Personal Information</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="10%">Employee No<font color="#FF0000">*</font></td>
	
    <td bgcolor="" width="20%"><div id='emp_emp_no_errorloc' class="error_strings"></div><input type="text" size="41" name="emp_no" value="<?php echo $employee_no?>"></td>
    <td width="15%">First Name</td>
    <td width="5%"><input type="text" size="41" name="f_name" value="<?php echo $emp_fname;?>"></td>
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
 
    <td>Middle Name <font color="#FF0000">*</font></td>
    <td><div id='emp_l_name_errorloc' class="error_strings"></div><input type="text" size="41" name="m_name" value="<?php echo $emp_mname;?>"></td>
    <td>Last Name</td>
     <td><div id='emp_l_name_errorloc' class="error_strings"></div><input type="text" size="41" name="l_name" value="<?php echo $emp_lname;?>"></td>
    </tr>
	<tr height="20">
    
    <td>Department<font color="#FF0000">*</font></td>
    <td><div id='emp_dept_errorloc' class="error_strings"></div>
	
	
	<select name="dept">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $queryd="select * from departments order by department_name asc";
								  $resultsd=mysql_query($queryd) or die ("Error: $queryd.".mysql_error());
								  
								  if (mysql_num_rows($resultsd)>0)
								  
								  {
									  while ($rowsd=mysql_fetch_object($resultsd))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsd->department_id; ?>"><?php echo $rowsd->department_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>
	
	
	
	
	
	
	</td>
    <td>Job Title/Position<font color="#FF0000">*</font></td>
    <td><div id='emp_job_title_errorloc' class="error_strings"></div>
	
	<select name="job_title">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $queryt="select * from omjob_titles order by omjob_title_name asc";
								  $resultst=mysql_query($queryt) or die ("Error: $queryt.".mysql_error());
								  
								  if (mysql_num_rows($resultst)>0)
								  
								  {
									  while ($rowst=mysql_fetch_object($resultst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowst->omjob_title_id; ?>"><?php echo $rowst->omjob_title_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>
	
	
	
	</td>
    </tr>
	<tr height="20">

	  <td>Gender / Sex<font color="#FF0000">*</font></td>
    <td><div id='emp_gender_errorloc' class="error_strings"></div><input type="radio" name="gender" value="Male">Male &nbsp;&nbsp;<input type="radio" name="gender" value="Female">Female</td>
    <td>Date of Birth<font color="#FF0000">*</font></td>
    <td><div id='emp_dob_errorloc' class="error_strings"></div><input type="text" name="dob" size="41" id="dob" readonly="readonly" /></td>
    </tr>
	<tr height="20">

	  <td>Nationality <font color="#FF0000">*</font></td>
    <td><div id='emp_nationality_errorloc' class="error_strings"></div><input type="text" size="41" name="nationality"></td>
    <td>Begining Date of First Job</td>
    <td><div id='emp_fjob_errorloc' class="error_strings"></div><input type="text" name="fjob" size="41" id="fjob" readonly="readonly" /></td>
    </tr>
	<tr height="20">

	  <td>Joining Date<font color="#FF0000">*</font></td>
    <td><div id='emp_date_joined_errorloc' class="error_strings"></div><input type="text" name="date_joined" size="41" id="date_joined" readonly="readonly" /></td>
    <td>Work Place</td>
    <td><select name="work_place">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $queryw="select * from work_place order by work_place_name asc";
								  $resultsw=mysql_query($queryw) or die ("Error: $queryw.".mysql_error());
								  
								  if (mysql_num_rows($resultsw)>0)
								  
								  {
									  while ($rowsw=mysql_fetch_object($resultsw))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsw->work_place_id; ?>"><?php echo $rowsw->work_place_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select></td>
    </tr>
	
	<tr height="20">
	
	<td><!--Staff Type--></td>
    <td><!--<select name="staff_type">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $queryst="select * from job_category order by job_cat_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsst->job_cat_id; ?>"><?php echo $rowsst->job_cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>--></td>
    <td>Employment Type<font color="#FF0000">*</font></td>
    <td><div id='emp_emp_type_errorloc' class="error_strings"></div><select name="emp_type">
	                  <option value="0">Employment Types...........</option>
								  
									<option value="Permanent">Permanent</option>  
                                    <option value="Contract">Contract</option>
									<option value="Dispatch">Dispatch</option>
									<option value="Transfer">Transfer</option>
									<option value="Temporary">Temporary</option>
									
                                    
                                
										
								  </select>	</td>
    </tr>
	
	
	
	<tr height="20">

	  <td>Religion<font color="#FF0000">*</font></td>
    <td><div id='emp_religion_errorloc' class="error_strings"></div><input type="text" size="41" name="religion">
	
	</td>
    <td>Marital Status<font color="#FF0000">*</font></td>
    <td>
	<div id='emp_marital_status_errorloc' class="error_strings"></div><select name="marital_status">
	                  <option value="0">Marital Status...........</option>
								  
										  
                                    <option value="Single">Single</option>
									<option value="Married">Married</option>
									<option value="Divorced">Divorced</option>
									<option value="Separated">Separated</option>
									
                                    
                                
										
								  </select>	</td>
    </tr>
	
	
	<tr height="20">
	 
	  <td>Height(m)<font color="#FF0000">*</font></td>
    <td><div id='emp_height_errorloc' class="error_strings"></div><input type="text" size="41" name="height"></td>
    <td>Weight(Kg)<font color="#FF0000">*</font></td>
    <td><div id='emp_weight_errorloc' class="error_strings"></div><input type="text" size="41" name="weight"></td>
    </tr>
	<tr height="20">
	
	<td>Blood Group<font color="#FF0000">*</font></td>
    <td><select name="blood_group">
	                  <option value="0">Blood Group...........</option>
								  
										  
                                    <option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>
									
                                    
                                
										
								  </select>
	

	</td>
    <td>Place Of Birth</td>
    <td><div id='emp_pob_errorloc' class="error_strings"></div><input type="text" size="41" name="pob"></td>
    </tr>
	<!--<tr height="20">
	
	<td>Upload Photo<font color="#FF0000">*</font></td>
    <td><input type="file" name="file"  size="28" >
	

	</td>
    <td></td>
    <td></td>
    </tr>-->
	
	
	
	
	
  
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
  Calendar.setup(
    {
      inputField  : "fjob",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "fjob"       // ID of the button
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