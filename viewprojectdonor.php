<?php

if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
if(isset($_GET['subDELETEArea']))
  { 
$costing_item_id=$_GET['costing_item_id'];
delete_area($costing_item_id);
  }
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
<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delete']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
	<tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="6" align="center">   <strong>Search By Costing Item Name: <input type="text" name="project_name" size="40" /> 
	
	
		  
								  
<input type="submit" name="generate" value="Generate">								  
								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
   <td align="center" width="150"><strong>Costing Item Name</strong></td>
   <td align="center" width="150"><strong>Standard Units</strong></td>
    <td align="center" width="200"><strong>Description</strong></td>
  
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 
  if (!isset($_POST['generate']))
{ 
 
$sql="SELECT * FROM costing_item order by costing_item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$project_name=$_POST['project_name'];

if ($project_name!='')
{
$sql="SELECT * FROM costing_item where costing_item_name LIKE '%$project_name%' order by costing_item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT * FROM costing_item order by costing_item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


}

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
  

    <td><?php echo $rows->costing_item_name;?></td>
    <td><?php  $unit_id=$rows->costing_unit_id;
$querysupu="select * from units where unit_id ='$unit_id'";
$resultssupu=mysql_query($querysupu) or die ("Error: $querysupu.".mysql_error());
$rowsupu=mysql_fetch_object($resultssupu);	

echo $rowsupu->unit_name;
	
	?></td>
    <td><?php echo $rows->costing_item_desc;?></td>
	<td align="center">
	  	<?php if ($sess_allow_edit==1) 
	{
	?>	
	<a href="home.php?editarea=editarea&costing_item_id=<?php echo $rows->costing_item_id; ?>"><?php
	echo $redit;

	?></a>
	
	<?php
		}
	else
	{ 
	echo $med;
	
	}?></td>
    <td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	?>
	<a href="home.php?viewprojectdonor=viewprojectdonor&subDELETEArea&costing_item_id=<?php echo $rows->costing_item_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	<?php
		}
	else
	{ 
	echo $me;
	
	}?></td>
	
   
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

</form>

 <?php }?>

