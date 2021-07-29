<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>



<form name="new_supplier" action="processaddomstaff.php" method="post">			
			<table width="80%" border="0" align="center">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Staff Recorded Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the staff exists</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Select SubContrator<font color="#FF0000">*</font></td>
    <td>
	<select name="sub_contractor">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $query1="select * from omconsultants order by cons_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->consultant_id; ?>"><?php echo $rows1->cons_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>
	
	
	</td>
	<td width="40%" rowspan="8" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">First Names<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="f_name" ></td>
	
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Middle Name</td>
    <td><input type="text" size="41" name="m_name" ></td>
    </tr>
		<tr height="20">
    <td>&nbsp;</td>
    <td>Last Name<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="l_name" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Nationality<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="nationality" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Gender<font color="#FF0000">*</font></td>
    <td><input type="radio" name="gender" value="Male">Male &nbsp;&nbsp;<input type="radio" name="gender" value="Female">Female</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Telephone Number<font color="#FF0000">*</font></td>
    <td><input type="text" name="telephone" size="41" /></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="email" ></td>
    </tr>

	<tr height="20">
    <td>&nbsp;</td>
    <td>Job Title<font color="#FF0000">*</font></td>
    <td><select name="job_title">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $query1="select * from omjob_titles order by omjob_title_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->omjob_title_id; ?>"><?php echo $rows1->omjob_title_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Employee Type<font color="#FF0000">*</font></td>
    <td><select name="job_cat">
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
								  
</select></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Work Place<font color="#FF0000">*</font></td>
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



<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("sub_contractor","dontselect=0",">>Please select the subcontractor");
 frmvalidator.addValidation("f_name","req",">>Please enter first name");
 frmvalidator.addValidation("l_name","req",">>Please enter last name");
 frmvalidator.addValidation("nationality","req",">>Please enter nationality");
 frmvalidator.addValidation("gender","selone_radio",">>Please select gender");
 frmvalidator.addValidation("telephone","req",">>Please enter telephone");  
 frmvalidator.addValidation("email","req",">>Please enter email address");
 frmvalidator.addValidation("email","email",">>Please enter valid email");
frmvalidator.addValidation("job_title","dontselect=0",">>Please select job title");
frmvalidator.addValidation("job_cat","dontselect=0",">>Please select job category");
 
 
 
 
  </SCRIPT>