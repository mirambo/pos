<?php //echo $emp_id; ?>

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
<form name="emp" id="emp" action="processeditemployeepim.php?emp_id=<?php echo $emp_id;?>" method="post" enctype="multipart/form-data" >			
<table width="100%" border="0">
  <tr align="center" >
  
	<td colspan="6" height="30">
<?php
if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';


if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
<tr height="20">
<td rowspan="18" width="25%" valign="top">
<?php include ('includes/emp_submenu_view.php');
	
/*$sql="select employees.emp_id,employees.begining_date_of_first_job,employees.photo,employees.joining_date,employees.employment_type,
employees.marital_status,employees.department_id,employees.height,employees.weight,employees.title,employees.place_of_birth,employees.dob,employees.employee_no,
employees.gender,employees.emp_fname,employees.employment_type,employees.blood_group,employees.emp_mname,employees.emp_lname,employees.nationality,employees.work_place,staff_types.staff_type_name,
employees.religion,departments.department_name,omjob_titles.omjob_title_name from employees,staff_types,departments,omjob_titles 
WHERE employees.staff_type=staff_types.staff_type_id AND departments.department_id=employees.department_id AND 
omjob_titles.omjob_title_id=employees.title and employees.emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);*/

 $sql="select * from employees where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
	
	
	?>
	
	
	
	</td>
	<td colspan="4" ><h3>View /Update Staff Basical Personal Information</h3></td>
    
    <td rowspan="11" valign="top" width="20%"><?php
$photo=$rows->photo;
if ($photo=='')
{
 ?>
 <img src="images/holder.png" width="100" height="120" style="border:solid 2px #67C6FE; margin:2px;">
 
<?php 
}
else
{
?>
<img src="photos/<?php echo $rows->photo; ?>" width="100" height="120" style="border:solid 2px #67C6FE; margin:2px;">

<?php 

}?>
<br/>
<a href="home.php?editphoto=editphoto&emp_id=<?php echo $emp_id;?>" style="color:#000000;">Upload / Edit Staff Photo</a>
	</td>
    </tr>
  <tr height="20">
    
    <td width="10%">Employee No<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="text" size="41" name="emp_no" value="<?php echo $rows->employee_no;?>"></td>
    <td width="15%">First Name</td>
    <td width="5%"><input type="text" size="41" name="f_name" value="<?php echo $rows->emp_fname;?>"></td>
   
  </tr>
  <tr height="20">
 
    <td>Middle Name <font color="#FF0000">*</font></td>
    <td><div id='emp_l_name_errorloc' class="error_strings"></div><input type="text" size="41" name="m_name" value="<?php echo $rows->emp_mname;?>"></td>
    <td>Last Name</td>
     <td><div id='emp_l_name_errorloc' class="error_strings"></div><input type="text" size="41" name="l_name" value="<?php echo $rows->emp_lname;?>"></td>
    </tr>
	<tr height="20">
    
    <td>Department/Project<font color="#FF0000">*</font></td>
    <td>
	
	<select name="dept">
	<?php 
	$dept=$rows->department_id;
	
	$queryd1="select * from departments where department_id='$dept'";
	$resultsd1=mysql_query($queryd1) or die ("Error: $queryd1.".mysql_error());
	$rowsd1=mysql_fetch_object($resultsd1)
	
	
?>
	<option value="<?php echo $rowsd1->department_id;  ?>"><?php echo $rowsd1->department_name; ?></option>
	
	

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
    <td>
	
	<select name="job_title">

	
	<?php 
	$title=$rows->title;
	
	$queryt1="select * from omjob_titles where omjob_title_id='$title'";
	$resultst1=mysql_query($queryt1) or die ("Error: $queryt1.".mysql_error());
	$rowst1=mysql_fetch_object($resultst1);
	
?>
	<option value="<?php echo $rowst1->omjob_title_id;  ?>"><?php echo $rowst1->omjob_title_name; ?></option>
	
	
	
	
	
	
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
    <td>
	<?php 
	$gender=$rows->gender; 
	if ($gender=='Male')
	{
	?>
	<input type="radio" name="gender" value="Male" checked>Male &nbsp;&nbsp;<input type="radio" name="gender" value="Female">Female
	<?php
	}
	else
	{
	?>
	<input type="radio" name="gender" value="Male" >Male &nbsp;&nbsp;<input type="radio" name="gender" value="Female" checked>Female
	<?php
	
	
	}

	?>
	
	
	
	</td>
    <td>Date of Birth<font color="#FF0000">*</font></td>
    <td><div id='emp_dob_errorloc' class="error_strings"></div><input type="text" name="dob" size="41" id="dob" readonly="readonly" value="<?php echo $rows->dob;?>" /></td>
    </tr>
	<tr height="20">

	  <td>Nationality <font color="#FF0000">*</font></td>
    <td><div id='emp_nationality_errorloc' class="error_strings"></div><input type="text" size="41" name="nationality" value="<?php echo $rows->nationality;?>"></td>
    <td>Begining Date of First Job</td>
    <td><div id='emp_fjob_errorloc' class="error_strings"></div><input type="text" name="fjob" size="41" id="fjob" readonly="readonly" value="<?php echo $rows->begining_date_of_first_job;?>" /></td>
    </tr>
	<tr height="20">

	  <td>Joining Date<font color="#FF0000">*</font></td>
    <td><div id='emp_date_joined_errorloc' class="error_strings"></div><input type="text" name="date_joined" size="41" id="date_joined" readonly="readonly" value="<?php echo $rows->joining_date;?>" /></td>
    <td>Work Place</td>
    <td><select name="work_place">
	
	<?php 
	$work_place=$rows->work_place;
	
	$queryw1="select * from work_place where work_place_id='$work_place'";
	$resultsw1=mysql_query($queryw1) or die ("Error: $queryw1.".mysql_error());
	$rowsw1=mysql_fetch_object($resultsw1)
?>
	
	
	<option value="<?php echo $work_place;  ?>"><?php echo $rowsw1->work_place_name; ?></option>
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
	
	<td><!--Staff Category--></td>
    <td>
	<!--
	<select name="staff_type">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $queryst="select * from staff_types order by staff_type_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsst->staff_type_id; ?>"><?php echo $rowsst->staff_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>--></td>
    <td>Employment Type<font color="#FF0000">*</font></td>
    <td><div id='emp_emp_type_errorloc' class="error_strings"></div><select name="emp_type">
	
	
	                                <option value="<?php echo $rows->employment_type;?>"><?php echo $rows->employment_type;?></option>
								  
										  
                                    <option value="Contract">Contract</option>
									<option value="Dispatch">Dispatch</option>
									<option value="Transfer">Transfer</option>
									<option value="Temporary">Temporary</option>
									
                                    
                                
										
								  </select>	</td>
    </tr>
	
	
	
	<tr height="20">

	  <td>Religion<font color="#FF0000">*</font></td>
    <td><div id='emp_religion_errorloc' class="error_strings"></div><input type="text" size="41" name="religion" value="<?php echo $rows->religion;?>">
	
	</td>
    <td>Marital Status<font color="#FF0000">*</font></td>
    <td><select name="marital_status">
									 <option value="<?php echo $rows->marital_status;?>"><?php echo $rows->marital_status;?></option>
                                     <option value="Single">Single</option>
									<option value="Married">Married</option>
									<option value="Divorced">Divorced</option>
									<option value="Separated">Separated</option>
									
                                    
                                
										
								  </select>	</td>
    </tr>
	
	
	<tr height="20">
	 
	  <td>Height(m)<font color="#FF0000">*</font></td>
    <td><div id='emp_height_errorloc' class="error_strings"></div><input type="text" size="41" name="height" value="<?php echo $rows->height;?>"></td>
    <td>Weight(Kg)<font color="#FF0000">*</font></td>
    <td><div id='emp_weight_errorloc' class="error_strings"></div><input type="text" size="41" name="weight" value="<?php echo $rows->weight;?>"></td>
    </tr>
	<tr height="20">
	
	<td>Blood Group<font color="#FF0000">*</font></td>
    <td><select name="blood_group">
	                 <option value="<?php echo $rows->blood_group;?>"><?php echo $rows->blood_group;?></option>
								  
										  
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
    <td><div id='emp_pob_errorloc' class="error_strings"></div><input type="text" size="41" name="pob" value="<?php echo $rows->place_of_birth;?>"></td>
    </tr>
	
	
	
	
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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