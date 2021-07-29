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
	
	<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
	
    </tr>
	
  
  <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="180"><strong>Staff Name</strong></td>
    <td align="center" width="150"><strong>Category</strong></td>
    <td align="center" width="60"><strong>Block</strong></td>
	<td align="center" width="150"><strong>Client Name</strong></td>
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
 
$sql="SELECT bunch.project_manager_id, employees.emp_fname, employees.emp_mname,employees.emp_lname,
	employees.title,job_category.job_cat_name,omjob_titles.omjob_title_name,blocks.block_name,bunch.bunch_id,bunch.project_manager_id,bunch.period_from,bunch.period_to 
	FROM employees,bunch,omjob_titles,blocks,job_category where bunch.block_id=blocks.block_id AND employees.title=omjob_titles.omjob_title_id AND employees.emp_id=bunch.project_manager_id AND bunch.period_from<=CURDATE()";
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
    <td ><?php 
	
	echo $dept=$rows->department.' '.$job_cat_name=$rows->job_cat_name;
	
	?></td>
	<td>
	
	<?php echo $rows->block_name;

	
	?></td>
	<td>
	
	<?php echo $rows->c_name;

	
	?></td>
	<td>
	
	<?php 
	$bunch_id=$rows->bunch_id;
	$sql_pm="SELECT employees.emp_fname as fpm,employees.emp_mname as mpm,employees.emp_lname as lpm
	from employees,bunch where employees.emp_id=bunch.project_manager_id AND bunch.bunch_id='$bunch_id'";
	$results_pm= mysql_query($sql_pm) or die ("Error $sql_pm.".mysql_error());
	$rows_pm=mysql_fetch_object($results_pm);
	
	echo $rows_pm->fpm.' '.$rows_pm->mpm.' '.$rows_pm->lpm;

	
	?></td>
	<td align="center"><?php 
	
	
	
	echo $period_from=$rows->period_from;
	
	
	
	?></td>
	<td align="center"><?php 
 echo $period_to=$rows->period_to;
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

if ($seconds_spent<0)
{
echo 'Yet Started..';
}
else
{
echo $days_spent=$seconds_spent/86400;

}




	?></font></strong></td>
	
	<td align="center"><strong><font color="#ff0000"><?php 
	$curr_date=date('Y-m-d');
	$curr_date_string= strtotime ($curr_date);	
	
$seconds_spent=$curr_date_string-$period_from_string;

echo $days_remaining=$period_days-$days_spent;
	?></font></strong></td>
	<td align="center"><a href="home.php?admineditcpd=admineditcpd&cpd_id=<?php echo $rows->cdp_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_cpd.php?cpd_id=<?php echo $rows->cdp_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
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



