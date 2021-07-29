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
  <tr bgcolor="#FFFFCC">
   
    <td colspan="13" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
	<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><!--<a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a>--></td></tr>
	
    </tr>
	
  
  <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="180"><strong>Staff Name</strong></td>
	<td align="center" width="180"><strong>Job Title</strong></td>
    <td align="center" width="180"><strong>Project</strong></td>
	<td width="100" align="center"><strong>Work Place</strong></td>
	<td align="center" width="160"><strong>Project Manager</strong></td>
  	<td align="center" width="100"><strong>Period From</strong></td>
	<td align="center" width="100"><strong>Period To</strong></td>
	<td align="center" width="80"><strong>Project Days</strong></td>
	<td align="center" width="80"><strong>Days Spent</strong></td>
    <td width="100" align="center"><strong>Remaining Days</strong></td>
    <td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
	
	 
	<!--<td width="100" align="center"><strong>Flight Charges (USD)</strong></td>
	<td width="120" align="center"><strong>Grand Total(USD)</strong></td>-->
	
    
    </tr>
  
  <?php 
 //$curr_date='2013-03-30';

$sql="SELECT projects.project_id,assigned_staffold.project_manager,operations.operation_name,clients.c_name,employees.emp_id,employees.staff_type,employees.emp_fname,employees.emp_mname,
employees.emp_lname,omjob_titles.omjob_title_name,job_category.job_cat_name,assigned_staffold.assigned_staff_id,assigned_staffold.entry_date,assigned_staffold.exit_date,assigned_staffold.work_place,assigned_staffold.status,assigned_staffold.segment,assigned_staffold.staff FROM operations, projects,
assigned_staffold,employees,clients,omjob_titles,job_category WHERE job_category.job_cat_id=employees.staff_type AND omjob_titles.omjob_title_id=employees.title AND projects.client_id=clients.client_id AND assigned_staffold.project_id=projects.project_id AND  operations.operation_id=projects.operation_id AND assigned_staffold.project_id=projects.project_id 
and assigned_staffold.status!='3' and employees.emp_id=assigned_staffold.staff order by clients.c_name asc";
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
  
    <td><?php 	
	echo $rows->emp_fname.' '.$rows->emp_mname.' '.$rows->emp_lname;
	
	?></td>
    
	
	<td>
	
	<?php echo $rows->omjob_title_name; ?>

	
	</td>
	
	
	<td>
	
	<?php echo $rows->c_name.' - '.$rows->operation_name;?>

	
	</td>
	<td>
	
	<?php echo $rows->work_place;

	
	?></td>
	<td>
	
	<?php $pm=$rows->project_manager;
	
$sqlemp="SELECT * FROM employees where emp_id='$pm'";
$resultsemp= mysql_query($sqlemp) or die ("Error $sqlemp.".mysql_error());
$rowsemp=mysql_fetch_object($resultsemp);

echo $rowsemp->emp_fname.''.$rowsemp->emp_mname.' '.$rowsemp->emp_lname;

	
	?></td>
	<td align="center"><?php 
	
	
	
	echo $period_from=$rows->entry_date;
	
	
	
	?></td>
	<td align="center"><?php 
 echo $period_to=$rows->exit_date;
?></strong></td>
<td align="center"><strong><?php
	
	


$period_from_string= strtotime ($period_from);	
$period_to_string= strtotime ($period_to);

$period_sec=$period_to_string-$period_from_string;

$period_days=$period_sec/86400;
	
	echo $period_days;
?></font></strong></td>
	
	<td align="center"><strong><font color="#009900"><?php
	
	/**/

$curr_date=date('Y-m-d');
$curr_date_string= strtotime ($curr_date);	
	
$seconds_spent=$curr_date_string-$period_from_string;
$days_spent=$seconds_spent/86400;

if ($seconds_spent<0)
{
echo 'Yet Started..';
}
elseif ($days_spent>$period_days)
{
echo "Staff Offsite";
}

else
{
echo $days_spent;

}

	?></font></strong></td>
	
	<td align="center"><strong><font color="#ff0000"><?php 
	$curr_date=date('Y-m-d');
	$curr_date_string= strtotime ($curr_date);	
	
$seconds_spent=$curr_date_string-$period_from_string;

$days_remaining=$period_days-$days_spent;

if ($days_remaining>$period_days)
{
echo $period_days;
}
else
{
echo $days_remaining;
}
//when time for current staff in the field ends


?></font></strong></td>
	<td align="center"><a href="edit_expenses.php?expense_id=<?php echo $rows->expense_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_expense.php?expense_id=<?php echo $rows->expense_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
 </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="12" align="center"><font color="#ff0000" size="+1"><strong>Their are no staff in the field currenctly!!</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>



