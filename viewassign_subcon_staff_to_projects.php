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
  <td colspan="12" align="center">
  <?php 
  if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>

<?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
   
     <tr bgcolor="#FFFFCC"><td colspan="12" align="right"><!--<a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a>--></td></tr>

  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td width="70" align="center"><strong>Project No</strong></td>
	<td width="150" align="center"><strong>Date Subcontracted</strong></td>
	<td width="150" align="center"><strong>Subcontractor</strong></td>
	<td align="center" width="220"><strong>Staff Name</strong></td>
    <td align="center" width="180"><strong>Project Name</strong></td>
    <td align="center" width="220"><strong>Project Manager</strong></td>
	<td align="center" width="200"><strong>Job Title</strong></td>
    <td width="70" align="center"><strong>Staff Type</strong></td>
	<td width="70" align="center"><strong>Work Place</strong></td>
	<td width="50" align="center"><strong>Segment</strong></td>	
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT omconsultants.cons_name,projects.project_id,assigned_subcon_staff.assigned_subcon_project_manager,assigned_subcon_staff.date_subcontracted,operations.operation_name,clients.c_name,omstaff.omstaff_id,omstaff.job_cat_id,omstaff.f_name,omstaff.m_name,
omstaff.l_name,omjob_titles.omjob_title_name,job_category.job_cat_name,assigned_subcon_staff.assigned_subcon_id,assigned_subcon_staff.assigned_subcon_work_place,assigned_subcon_staff.assigned_subcon_segment,assigned_subcon_staff.assigned_subcon_staff FROM operations, projects,
assigned_subcon_staff,omstaff,clients,omjob_titles,job_category,omconsultants WHERE omconsultants.consultant_id=assigned_subcon_staff.subcontractor AND job_category.job_cat_id=omstaff.job_cat_id AND omjob_titles.omjob_title_id=omstaff.job_title_id AND projects.client_id=clients.client_id AND assigned_subcon_staff.assigned_subcon_project_id=projects.project_id AND  operations.operation_id=projects.operation_id 
and  omstaff.omstaff_id=assigned_subcon_staff.assigned_subcon_staff order by clients.c_name asc";
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
  
    <td align="center"><?php echo $rows->project_id;?></td>
	<td align="center"><?php echo $rows->date_subcontracted;?></td>
	<td ><?php echo $rows->cons_name;?></td>
    
	<td ><?php echo $rows->f_name.' '.$rows->m_name.' '.$rows->l_name;?></td>
	<td ><?php echo $rows->c_name.' - '.$rows->operation_name;?></td>
	<td><?php $pm=$rows->assigned_subcon_project_manager;
	
$sqlemp="SELECT * FROM omstaff where omstaff_id='$pm'";
$resultsemp= mysql_query($sqlemp) or die ("Error $sqlemp.".mysql_error());
$rowsemp=mysql_fetch_object($resultsemp);

echo $rowsemp->f_name.''.$rowsemp->m_name.' '.$rowsemp->l_name;

	
	
	
	?></td>
	
	<td><?php echo $rows->omjob_title_name; ?></td>
	
	<td ><?php 
	echo $rows->job_cat_name;
	
	?></td>
	<td><?php echo $rows->assigned_subcon_work_place;?></td>
	<td><?php echo $rows->assigned_subcon_segment;?></td>
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



