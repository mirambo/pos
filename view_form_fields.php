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

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Form Section Name</strong></td>
    <td align="center" width="150"><strong>Form Field Name</strong></td>
    <td align="center" width="150"><strong>Form Type</strong></td>
	<td align="center" width="100"><strong>Sort Order</strong></td>
	<td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="100"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 
 
$sql="SELECT form_sections.form_section_name,form_fields.form_field_name,form_fields.form_field_id,form_fields.form_field_type,form_fields.form_field_type,
form_fields.sort_order FROM form_sections,form_fields WHERE form_fields.form_section_id=form_sections.form_section_id";
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
  
    <td ><?php echo $rows->form_section_name;?></td>
    <td ><?php echo $rows->form_field_name;?></td>
    <td ><?php echo $rows->form_field_type;?></td>
    <td align="center"><?php echo $rows->sort_order;?></td>
	<td align="center"><a href="home.php?editformfields=editformfields&form_field_id=<?php echo $rows->form_field_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_group.php?man_hours_id=<?php echo $rows->man_hours_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
	
   
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



