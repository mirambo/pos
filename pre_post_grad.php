<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
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
<form name="emp" id="emp" action="processaddemployeepim1.php" method="post" enctype="multipart/form-data" >			
<table width="100%" border="0">
  <tr align="center" >
  
	<td colspan="6" height="30">
<?php
if ($_GET['addempconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Successfully!!</font></strong></p></div>';


if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the employee is existing</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
	<td rowspan="18" width="25%" valign="top">
	<?php //include ('includes/emp_submenu.php')?>
	
	
	
	</td>
	<td colspan="4" ><h3>Staff Basical Personal Information</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="10%">First Name<!--Employee No<font color="#FF0000">*</font>--></td>
	<?php 
$queryempno="select emp_id from employees order by emp_id desc limit 1";
$resultsempno=mysql_query($queryempno) or die ("Error: $queryempno.".mysql_error());								  
$rowsempno=mysql_fetch_object($resultsempno);
$emp_no=$rowsempno->emp_id;

//$employee_no=$emp_no+1;
?>
    <td bgcolor="" width="20%"><input type="text" size="41" name="f_name"></td>
    <td width="15%">Middle Name <font color="#FF0000">*</font></td>
    <td width="5%"><div id='emp_l_name_errorloc' class="error_strings"></div><input type="text" size="41" name="m_name"></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  <tr height="20">
 
    <td>Last Name</td>
    <td><div id='emp_l_name_errorloc' class="error_strings"></div><input type="text" size="41" name="l_name"></td>
    <td>Select Staff Type</td>
     <td><select name="staff_type">
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
								  
</select></td>
    </tr>
	
	<tr height="20">
	
	<td>Upload Photo<font color="#FF0000">*</font></td>
    <td><input type="file" name="file"  size="28" >
	

	</td>
    <td></td>
    <td rowspan="5"><div id='emp_errorloc' class='error_strings'></div></td>
    </tr>
	 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
	
	
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Next >>>">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("f_name","req",">>Please enter first name");
 frmvalidator.addValidation("m_name","req",">>Please enter middle name");
 frmvalidator.addValidation("l_name","req",">>Please enter last name");
  frmvalidator.addValidation("staff_type","dontselect=0",">>Please select staff type");
 
 
  </SCRIPT>
