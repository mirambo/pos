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

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC" > 
  <td colspan="11" align="center">
  <?php 
  if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>

<?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
   
     <tr bgcolor="#FFFFCC"><td colspan="11" align="right"><a href="printpostgraduate.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printpostgraduatecsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printpostgraduateword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>

  
  <tr  style="background:url(images/description.gif);" height="30" >
   <td align="center" width="150"><strong>Staff Name</strong></td>
   <td align="center" width="150"><strong>Job Title</strong></td>
    <td align="center" width="170"><strong>Project Name</strong></td>
    <td width="70" align="center"><strong>Staff Type</strong></td>
	<!--<td width="70" align="center"><strong>Work Place</strong></td>-->
	 <td align="center" width="100"><strong>Timesheet Date</strong></td>
	<td width="120" align="center"><strong>Timesheet</strong></td>	
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT projects.project_id,operations.operation_name,clients.c_name,employees.emp_id,employees.staff_type,employees.emp_fname,employees.emp_mname,
employees.emp_lname,omjob_titles.omjob_title_name,job_category.job_cat_name,staff_timesheet.staff_timesheet_id,staff_timesheet.timesheet_date,staff_timesheet.timesheet_mark,staff_timesheet.staff FROM operations, projects,
staff_timesheet,employees,clients,omjob_titles,job_category WHERE job_category.job_cat_id=employees.staff_type AND omjob_titles.omjob_title_id=employees.title AND projects.client_id=clients.client_id AND staff_timesheet.project_id=projects.project_id AND  operations.operation_id=projects.operation_id AND staff_timesheet.project_id=projects.project_id 
and  employees.emp_id=staff_timesheet.staff";
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
  
<td ><?php echo $rows->emp_fname.''.$rows->emp_mname.' '.$rows->emp_lname;?></td>
    
	<td><?php echo $rows->omjob_title_name;

	
	
	
	?></td>
	
	<td ><?php echo $rows->c_name.' - '.$rows->operation_name;?></td>
	
	
	
	<td ><?php 
	echo $rows->job_cat_name;
	
	?></td>
	<!--<td><?php echo $rows->work_place;?></td>-->
	<td align="center"><?php echo $rows->timesheet_date;?></td>
	<td align="center"><?php echo $rows->timesheet_mark;?></td>
	<td align="center"><a href="home.php?editstafftoprojects=editstafftoprojects&assigned_staff_id=<?php echo $rows->assigned_staff_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="deleteassignedstaff.php?assigned_staff_id=<?php echo $rows->assigned_staff_id;?>&staff=<?php echo $rows->staff; ?>" onClick="return confirmDelete()"><img src="images/delete.png"></a></td>

   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>



