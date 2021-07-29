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
   
     <tr bgcolor="#FFFFCC"><td colspan="11" align="right"><!--<a href="printpostgraduate.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printpostgraduatecsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printpostgraduateword.php"><img src="images/word.png" title="Export to Word"></a>--></td></tr>

  
  <tr  style="background:url(images/description.gif);" height="30" >
    <!--<td width="70" align="center"><strong>Emp. No</strong></td>-->
    <td align="center" width="200"><strong>Employee Name</strong></td>
    <td align="center" width="100"><strong>Employee No.</strong></td>
	 <td align="center" width="100"><strong>Nationality</strong></td>
    <td align="center" width="100"><strong>Work Permit No.</strong></td>
	<td align="center" width="130"><strong>New Issue Date</strong></td>
	<td align="center" width="150"><strong>New Exp. Date</strong></td>
	<td width="100" align="center"><strong>Charges <br/>(Mixed Currency)</strong></td>
	<td width="100" align="center"><strong>Exchange Rate</strong></td>	
	<td width="100" align="center"><strong>Charges <br/>(SSP)</strong></td>	
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="select employees.emp_fname,employees.emp_lname,employees.emp_mname, employees.employee_no,renewed_staff_work_permit.work_permit_no,employees.title,employees.nationality,
 renewed_staff_work_permit.issue_date,renewed_staff_work_permit.charges,renewed_staff_work_permit.curr_rate,renewed_staff_work_permit.work_permit_id,
 renewed_staff_work_permit.exp_date,renewed_staff_work_permit.emp_id,currency.curr_initials from currency,employees,renewed_staff_work_permit 
 WHERE renewed_staff_work_permit.currency=currency.curr_id AND employees.emp_id=renewed_staff_work_permit.emp_id order by employees.emp_fname asc";
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
  
    <!--<td><?php echo $rows->employee_no;?></td>-->
    <td ><?php echo $rows->emp_fname.' '.$rows->emp_lname.' '.$rows->emp_mname;?></td>
	<td><?php echo $rows->employee_no;?></td>
	<!--<td ><?php 

	
	?></td>-->
	<td ><?php 
echo $rows->nationality;
	
	?></td>
	<td><?php echo $rows->work_permit_no;?></td>
	
	<td align="center"><?php echo $rows->issue_date;
	?></td>
	<td align="center">
	<?php echo $rows->exp_date;
	?>
    </td>
	<td align="right"><?php echo $rows->curr_initials.' '.number_format($charges=$rows->charges,2);?></td>
	<td align="right"><?php echo $curr_rate=$rows->curr_rate;?></td>
	<td align="right"><?php echo number_format($ttl_charges=$charges*$curr_rate,2);?></td>
	<td align="center">
	<?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a href="#"><img src="images/edit.png"></a>
	<?php 
	}
	else
	{
	echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
	
	}
	
	?>
	</td>
	<td align="center">
	<?php
$sess_allow_delete;
if ($sess_allow_delete==1)
{
	?>
	<a href="#"><img src="images/delete.png"></a>
	<?php 
	}
	else
	{
	echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
	
	}
	
	?>
	</td>
	
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



