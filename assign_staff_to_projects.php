<?php 
$project_id=$_GET['project_id']; 
$period_to=$_GET['period_to'];
//$job_cat_id=$_GET['job_cat_id'];
$project_manager=$_GET['project_manager'];
?>

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />
<style type="text/css">

@import url(calender/calendar-win2k-1.css);
.table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:1px solid black;
font-size:12px;


}


</style>



<form name="emp" id="emp" onsubmit="return checkTheBox();" action="processstafftoproject.php?original_bunch_id=<?php echo $original_bunch_id;?>&period_to=<?php echo $period_to; ?>&job_cat_id=<?php echo $job_cat_id;?>" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Added Successfuly</div>';
?>

<?

if ($_GET['staffonsite']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Current staff are on site. New Staff should report from'.$period_to.'</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="20">
    <td bgcolor="" width="2%">&nbsp;</td>
    <td width="20%">Select Projects<font color="#FF0000">*</font></td>
    <td width="15%">
	<select name="project">
	<?php
if($project_id=='')
{?>
<option>Select..................................</option>

<?php 
							
								  
								
								  $queryinst1="SELECT operations.operation_id, operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
  FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id";
								  $resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst1)>0)
								  
								  {
									  while ($rowsinst1=mysql_fetch_object($resultsinst1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst1->project_id; ?>"><?php echo $rowsinst1->c_name.' & '. $rowsinst1->operation_name; ?> </option>
                                    
                                
										  
										<?php  
										}
									  
									  
									  }
								  
								  }
								  
								  else
								  {
							
$queryinstb="SELECT operations.operation_id, operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
  FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id AND projects.project_id='$project_id'";
$resultsinstb=mysql_query($queryinstb) or die ("Error: $queryinstb.".mysql_error());
$rowsinstb=mysql_fetch_object($resultsinstb);
?>
<option value="<?php echo $rowsinstb->project_id;?>"><?php echo $rowsinstb->c_name.' & '. $rowsinstb->operation_name; ?></option>
<?php	
$queryinst1="SELECT operations.operation_id, operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
  FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id";
								  $resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst1)>0)
								  
								  {
									  while ($rowsinst1=mysql_fetch_object($resultsinst1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst1->project_id; ?>"><?php echo $rowsinst1->c_name.' & '. $rowsinst1->operation_name; ?> </option>
                                    
                                
										  
										<?php  
										}
									  
									  
									  }

							  
}
?>
								  
								  </select>
	</td>
    <td width="20%" rowspan="4" align="left" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
	<td></td>
  </tr>
  
  
 
  
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td><?php
	if($project_manager=='')
{?>	
Assign Project Manager/ Supervisor<font color="#FF0000">*</font>
<?php 
}
else
{?>
Assigned Project Manager/ Supervisor<font color="#FF0000">*</font>
<?php
}

?>
	</td>
    <td><select name="project_manager">
	<?php
if($project_manager=='')
{?>	
	<option>Select..................................</option>
								  <?php
								  
								  $query1="select * from employees where work_place='7' and status='0'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_id; ?>"><?php echo $rows1->emp_fname.' '.$rows1->emp_fname.''.$rows1->emp_lname; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  }
									  
									  else
									  {
								  $querypm="select * from employees where emp_id='$project_manager'";
								  $resultspm=mysql_query($querypm) or die ("Error: $querypm.".mysql_error());
								  $rowspm=mysql_fetch_object($resultspm);
									  
									?>
<option value="<?php echo $rowspm->emp_id;?>"><?php echo $rowspm->emp_fname.' '.$rowspm->emp_mname.''.$rowspm->emp_lname; ?></option>
<?php  
	$query1="select * from employees where work_place='7' and status='0'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_id; ?>"><?php echo $rows1->emp_fname.' '.$rows1->emp_fname.''.$rows1->emp_lname; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }





}
									  
		
								  ?>
								  
								  </select>
	
	
	</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Project Start Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="start_date" size="41" id="start_date" readonly="readonly" /></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Project End Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="end_date" size="41" id="end_date" readonly="readonly" /></td>
    </tr>
	
	
	
  
   <tr>
    
    <td colspan="4" valign="top" align="center">

	<table width="100%" border="0" class="table1" style="margin-left:150px;">
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td></td>
	<td><strong>Staff Name</strong></td>
	<td><strong>Job Title</strong></td>
	<td><strong>Work Place</strong></td>
	<td><strong>Segment</strong></td>

    
   </td>
  <tr bgcolor="#FF9900"><td colspan='5'><strong><font size="+1">National Staff</font></strong></td></tr> 
   
   
   
  </tr>
	<?php
								  
								  $queryst="select employees.emp_id,employees.emp_fname,employees.emp_lname,employees.emp_mname,omjob_titles.omjob_title_name from employees,omjob_titles
									where omjob_titles.omjob_title_id=employees.title AND work_place!='1'AND staff_type='1' AND employees.status='0'";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	  <td><input type="checkbox" name="staff[]" value="<?php echo $rowsst->emp_id;?>"></td>
						
	   <td><?php echo $rowsst->emp_fname.' '.$rowsst->emp_fname.''.$rowsst->emp_lname; ?></td>
	   <td><?php echo $rowsst->omjob_title_name; ?></td>
	   <td align="center"><input type="checkbox" name="job_loc[]" value="Office">Office &nbsp;&nbsp;<input type="checkbox" name="job_loc[]" value="Field">Field</td>
    <td align="center"><input type="checkbox" name="segment[]" value="TL">Transmission Line &nbsp;&nbsp;<input type="checkbox" name="segment[]" value="PP">Power Plant</td>
    
   </td>
  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! All National Staffs Are Currently Occupied</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	 <tr bgcolor="#FF9900"><td colspan='5'><strong><font size="+1">Expertriate Staff</font></strong></td></tr> 								  
									  <?php
								  
								  $queryst="select employees.emp_id,employees.emp_fname,employees.emp_lname,employees.emp_mname,omjob_titles.omjob_title_name from employees,omjob_titles
									where omjob_titles.omjob_title_id=employees.title AND work_place!='1' AND staff_type='2' AND employees.status='0'";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  $numrows=mysql_num_rows($resultsst);
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	   <td><input type="checkbox" name="staff[]" value="<?php echo $rowsst->emp_id;?>"></td>								
	   <td><?php echo $rowsst->emp_fname.' '.$rowsst->emp_fname.''.$rowsst->emp_lname; ?></td>	
	   <td><?php echo $rowsst->omjob_title_name; ?></td>
	   
	   <td align="center"><input type="checkbox" name="job_loc[]" value="Office">Office&nbsp;&nbsp;<input type="checkbox" name="job_loc[]" value="Field">Field</td>
    <td align="center"><input type="checkbox" name="segment[]" value="TL">Transmission Line &nbsp;&nbsp;<input type="checkbox" name="segment[]" value="PP">Power Plant</td>
    
   </td>
  </tr>
									  
									  
									  <?php 

									  }
									  
									  	  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! All Expertriate Staffs Are Currently Occupied</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
								
	
	
	

	<tr height="40">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
	
  </tr>
	
	
	</table>
    <td>&nbsp;</td>
	
 
	<td>&nbsp;</td>
  </tr>
  
  
	
	
</table>

</form>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "start_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "start_date"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "end_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "end_date"       // ID of the button
    }
  );
  
  
</script> 
<script type = "text/javascript">
function checkTheBox() 
{
var flag = 0;
for (var i = 0; i<5; i++) {
if(document.emp["staff[]"][i].checked){
flag ++;
}
}
if (flag != 1) {
alert ("Select atleast one staff!");
return false;
}
return true;



var flag1 = 0;
for (var x = 0; x<5; x++) {
if(document.emp["job_loc[]"][x].checked){
flag1 ++;
}
}
if (flag1 != 1) {
alert ("Select atleast one job loc!");
return false;
}
return true;

}
</script>


<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("project","dontselect=0",">>Please select project");
 frmvalidator.addValidation("project_manager","dontselect=0",">>Please select project manager");
 frmvalidator.addValidation("start_date","req",">>Please enter project start date");
 frmvalidator.addValidation("end_date","req",">>Please enter project end date");
</script>


 
  
 
 