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
    return confirm("Are you sure you want to delete?");
}

</script>

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateinstituteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Institute Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteinstofferingconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Project Name</strong></td>
    <td align="center" width="150"><strong>Project Code</strong></td>
    <td align="center" width="150"><strong>Project Description</strong></td>
    <td align="center" width="150"><strong>Donor</strong></td>
    <td align="center" width="150"><strong>Start Date</strong></td>
    <td align="center" width="150"><strong>End Date</strong></td>
	<td align="center" width="150"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 
 
$sql="SELECT projects.project_code,projects.project_name,projects.project_desc,projects.start_date,projects.end_date,donors.donor_name 
FROM donors,projects where projects.donor_id=donors.donor_id";
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
  
    <td><?php echo $rows->project_name;?></td>
    <td><?php echo $rows->project_code;?></td>
    <td><?php echo $rows->project_desc;?></td>
    <td><?php echo $rows->donor_name;?></td>
    <td><?php echo $rows->start_date;?></td>
    <td><?php echo $rows->end_date;?></td>
	<td align="center"><a href="home.php?editinstoffer=editinstoffer&job_cat_id=<?php echo $rows->job_cat_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="deleteinstoffering.php?job_cat_id=<?php echo $rows->job_cat_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
	
   
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



