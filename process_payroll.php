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
<tr height="20" bgcolor="#FFFFCC">
    <td width="10%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><strong><font size="+1">Current Rate!! Is 
<?php
$sqlcurr="SELECT * FROM currency where  curr_initials LIKE '%SSP%'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowscurr=mysql_fetch_object($resultscurr); 
echo $curr_rate=$rowscurr->curr_rate;
?></font><font color="#ff0000"><blink><a href="home.php?editsponsor=editsponsor&curr_id=4&p=1" style="color:#ff0000; font-size:14px; margin-left:5px; text-decoration:none; ">Update it!!</a></blink></strong></font>
</td> 
    </tr>
  <tr bgcolor="#FFFFCC" colspan="11"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>

<?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
  </tr>
   
     <tr bgcolor="#FFFFCC"><td colspan="11" align="right"><a href="printpostgraduate.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printpostgraduatecsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printpostgraduateword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>

  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td width="70" align="center"><strong>Emp. No</strong></td>
    <td align="center" width="150"><strong>Employee Name</strong></td>
   <!-- <td align="center" width="100"><strong>Gender</strong></td>-->
    <td align="center" width="120"><strong>Nationality</strong></td>
	<td align="center" width="220"><strong>Job Title</strong></td>
	<!--<td align="center" width="150"><strong>Job Category</strong></td>-->
    <td width="100" align="center"><strong>Department</strong></td>
	<td width="120" align="center"><strong>Process Pay Slip</strong></td>
		<!--<td width="100" align="center"><strong>Religion</strong></td>	
<td width="50" align="center"><strong>Edit</strong></td>-->
	<!--<td width="50" align="center"><strong>Delete</strong></td>-->
    
    </tr>
  

 
<?php //include ('includes/emp_submenu_view.php');
	
$sql="select employees.emp_id,employees.begining_date_of_first_job,employees.photo,employees.joining_date,employees.employment_type,employees.marital_status,employees.height,employees.weight,employees.place_of_birth,employees.dob,employees.employee_no,employees.employee_no,employees.emp_fname,employees.emp_mname,employees.emp_lname,employees.nationality,staff_types.staff_type_name,employees.religion,
departments.department_name,omjob_titles.omjob_title_name from employees,staff_types,departments,omjob_titles WHERE employees.staff_type=staff_types.staff_type_id
AND departments.department_id=employees.department_id AND omjob_titles.omjob_title_id=employees.title";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
	
	



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
  
     <td><?php echo $rows->employee_no;?></td>
    <td ><a href="home.php?staffdet=staffdet&emp_id=<?php echo $rows->emp_id;?>" style="font-size:12px; "><?php echo $rows->emp_fname.' '.$rows->emp_mname.' '.$rows->emp_lname;?></a></td>
	<td><?php echo $rows->nationality;?></td>
	<td ><?php echo $rows->omjob_title_name;?></td>
	<td><?php echo $rows->department_name;

	
	
	
	?></td>
	
	<td align="center"><a href="home.php?processpayroll2=processpayroll2&emp_id=<?php echo $rows->emp_id;?>&curr_rate=<?php echo $curr_rate; ?>" style="font-size:12px;">Process Payslip</a></td>
	

   
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
<br/>
<br/>
<br/>
<br/>
<a href="multipledata.php">Process payroll</a>


