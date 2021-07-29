<?php 
/* $qr_confirm23v="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `view`='V' and user_group_id='$user_group_id'";
$qr_res23v=mysql_query($qr_confirm23v) or die ('Error : $qr_confirm23v.' .mysql_error());
$num_rows23v=mysql_num_rows($qr_res23v);  */
if ($num_rows23v==789990) 
{ 
include ('includes/restricted.php');
 }
else
{
include('top_grid_includes.php');
 ?>
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
  <table width="98%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>
  <tr  style="background:url(images/description.gif);" height="30" >
    
    <td align="center" width="10"><strong>No</strong></td>
    <td align="center" width="100"><strong>Leave Type Name</strong></td>
    <td align="center" width="100"><strong>Number of days</strong></td>
	 <td align="center" width="100"><strong>Nature of days</strong></td>
	 <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="50"><strong>Edit</strong></td>
	<td align="center" width="50"><strong>Delete</strong></td>

	<!--<td align="center" width="50"><strong>Enable Client Access</strong></td>-->

    
    </tr>
	 </thead>
  
   <tbody>
  
  <?php 
 
$sql="SELECT * FROM hs_hr_leavetype order by leave_type_id asc";
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
 
 $form_id=$rows->form_id;
 ?>
  
    <td align=""><?php echo $count=$count+1;?></td>
    <td align=""><?php echo $rows->leave_type_name;?></td>
    <td ><?php echo $rows->no_of_days;?></td>
	<td ><?php echo $rows->nature_of_days;?></td>
	    <td ><?php echo $rows->app_gender;?></td>
    <td align="center"><a href="home.php?define_leave=define_leave&leave_id=<?php echo $rows->leave_type_id; ?>&sub_module_id=<?php echo $sub_module_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="delete_leave_type.php?leave_id=<?php echo $rows->leave_type_id; ?>&sub_module_id=<?php echo $sub_module_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>

	
   
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

  
   </tbody>
</table>

<?php 
}

?>

