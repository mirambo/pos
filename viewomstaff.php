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
  <tr bgcolor="#FFFFCC" colspan="11"> <td colspan="11" align="center">
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>

</td>
  </tr>
   
     <tr bgcolor="#FFFFCC"><td colspan="11" align="right"><!--<a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a>--></td></tr>

  
  <tr  style="background:url(images/description.gif);" height="30" >
    <!--<td width="70" align="center"><strong>Emp. No</strong></td>-->
    <td align="center" width="200"><strong>Employee Name</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="130"><strong>O&M Job Title</strong></td>
	<td align="center" width="150"><strong>Job Category</strong></td>
	<td width="180" align="center"><strong>Email Address</strong></td>
	<td width="180" align="center"><strong>Phone No</strong></td>	
	<td width="70" align="center"><strong>Edit</strong></td>
	<td width="70" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="select omstaff.omstaff_id,omstaff.f_name,omstaff.l_name,omstaff.m_name,omstaff.l_name,omstaff.telephone,omstaff.email,omstaff.nationality,
omstaff.gender,omstaff.consultant_id,omstaff.job_title_id,omstaff.job_cat_id,omstaff.work_place_id,omconsultants.cons_name,omjob_titles.omjob_title_name,
job_category.job_cat_name,work_place.work_place_name from work_place,omstaff,omconsultants,omjob_titles,job_category where omstaff.consultant_id=omconsultants.consultant_id AND 
omstaff.job_title_id=omjob_titles.omjob_title_id AND job_category.job_cat_id=omstaff.job_cat_id AND work_place.work_place_id=omstaff.work_place_id";
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
    <td ><?php echo $rows->f_name.' '.$rows->l_name.' '.$rows->m_name;?></td>
	<td><?php echo $rows->gender;?></td>
	<td ><?php echo $rows->nationality;?></td>
	<td><?php $title_id=$rows->omjob_title_id;
$sqlt="select * from omjob_titles where omjob_title_id='$title_id'";
$resultst= mysql_query($sqlt) or die ("Error $sqlt.".mysql_error());
$rowst=mysql_fetch_object($resultst);
echo $rowst->omjob_title_name;
	
	
	
	?></td>
	
	<td align="left"><?php 
	$cat_id=$rows->job_cat_id;
	$sqlc="select * from job_category where job_cat_id='$cat_id'";
$resultc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$rowsc=mysql_fetch_object($resultc);
echo $rowsc->job_cat_name;
	
	?></td>
	<td>
	<?php echo $rows->email;
	?>
    </td>
	<td align="center"><?php echo $rows->telephone;?></td>
	<?php 
	$date_recorded=$rows->date_recorded;
	
	$confirm_date=date("Y-m-d : H:i:s", strtotime("- 30 day"));
	
	if ($date_recorded==$confirm_date)
	{?>
	
	<?php 
	}
	else
	{ ?>
	<td align="center">
	
	<?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	
	<a href="home.php?editomstaff=editomstaff&omstaff_id=<?php echo $rows->omstaff_id;?>"><img src="images/edit.png"></a>
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
	
	
	<a href="delete_omstaff.php?omstaff_id=<?php echo $rows->omstaff_id;?>" onClick="return confirmDelete();"><img src="images/delete.png">
	<?php 
	}
	else
	{
	echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
	
	}
	
	
	?>	
	
	</td>
	<?php 
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



