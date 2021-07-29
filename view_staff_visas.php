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
   
     <tr bgcolor="#FFFFCC"><td colspan="11" align="right"><a href="printpostgraduate.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printpostgraduatecsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printpostgraduateword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>

  
  <tr  style="background:url(images/description.gif);" height="30" >
    <!--<td width="70" align="center"><strong>Emp. No</strong></td>-->
    <td align="center" width="200"><strong>Employee Name</strong></td>
    <td align="center" width="80"><strong>Emp No.</strong></td>
    <td align="center" width="130"><strong>Job Title</strong></td>
	 <td align="center" width="130"><strong>Nationality</strong></td>
    <td align="center" width="70"><strong>Visa Type</strong></td>
	<td align="center" width="100"><strong>Issue Date</strong></td>
	<td align="center" width="100"><strong>Expiry Date</strong></td>
	<td align="center" width="80"><strong>Days To Expiry</strong></td>
	<td width="100" align="center"><strong>Expiry Alert</strong></td>
	<td width="100" align="center"><strong>Renew</strong></td>	
	<!--<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>-->
    
    </tr>
  
  <?php 
  

  
  
  
  
  
 
$sql="select employees.emp_fname,employees.emp_lname,employees.emp_mname, employees.employee_no,staff_visas.visa_type,employees.title,employees.nationality,
 staff_visas.issue_date, staff_visas.status,staff_visas.visa_details_id,staff_visas.exp_date,staff_visas.emp_id from employees,staff_visas WHERE employees.emp_id=staff_visas.emp_id order by employees.emp_fname asc";
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
	<td ><?php 
$title=$rows->title;
$sqlc="select * from omjob_titles where omjob_title_id='$title'";
$resultc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$rowsc=mysql_fetch_object($resultc);
echo $rowsc->omjob_title_name;
	
	?></td>
	<td ><?php 
echo $rows->nationality;


$emp_id=$rows->emp_id;

$sqlrn="select *  from renewed_visas where emp_id='$emp_id' order by date_recorded desc limit 1";
$resultrn= mysql_query($sqlrn) or die ("Error $sqlrn.".mysql_error());
$rowsrn=mysql_fetch_object($resultrn);
	
	?></td>
	<td><?php echo $rows->visa_type;?></td>
	
	<td align="center">
	
	
	<?php 
$status=$rows->status;
	
	if ($status==0)
	{
	echo $rows->issue_date;
	}
	
	else
	{
	

echo $rowsrn->issue_date;
	
	}
	
	
	?></td>
	<td align="center">
	<?php 
	if ($status==0)
	{
	echo $exp_date=$rows->exp_date;
	}
	
	else
	{
	

echo $exp_date=$rowsrn->exp_date;
	
	}
	
	
	?>
    </td>
	<td align="center">
	<?php $exp_date_string= strtotime ($exp_date);	
$curr_date=date('Y-m-d');
$curr_date_string= strtotime ($curr_date);	
	
$period=$exp_date_string-$curr_date_string;
echo $exp_period_alert=$period/86400;
	?>
    </td>
	<td align="center">
	<?php 
	

	
if 	($exp_period_alert<=30)
{
	
	echo "<font color='#ff0000'><blink><i>Renew!!</i></blink></font>";
	

	}
	else
	{
	echo "--";
	}
	
	?>
	
	</td>
	<td align="center">
	<?php 
	if 	($exp_period_alert<=30)
{
	?>
	<a href="home.php?renewvisa2=renewvisa2&visa_details_id=<?php echo $rows->visa_details_id; ?>&emp_id=<?php echo $rows->emp_id;?>"><img src="images/renew.png"></a></td>
	<?php
	}
	else
{
	echo "--";
}

	?>
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



