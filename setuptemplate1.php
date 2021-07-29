<?php
if(isset($_GET['subDELETESubProject']))
  { 
$sub_project_id=$_GET['sub_project_id'];
delete_subproject($sub_project_id);
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

if ($_GET['deletesubprojectconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
  <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="12" align="center">
	<strong>Search Sub Project - Enter Sub Project Name: 
    </strong>
    
    
    <input type="text" name="project_name" size="40" />
	
	<input type="submit" name="generate" value="Search"></td>
	
    </tr>
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="250"><strong>Project Name</strong></td>
    <td align="center" width="100"><strong>Sub Project Code</strong></td>
    <td align="center" width="150"><strong>Sub Project Name</strong></td>
    <td align="center" width="150"><strong>Sub Project Description</strong></td>
    <td align="center" width="150"><strong>Set Up Template</strong></td>
    <!--<td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>-->

    
    </tr>
  
  <?php 
  if (!isset($_POST['generate']))
{ 
 
$sql="SELECT * FROM nrc_sub_project,nrc_project where nrc_sub_project.project_id=nrc_project.project_id order by project_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$project_name=$_POST['project_name'];
if ($project_name!='')
{
$sql="SELECT * FROM nrc_sub_project,nrc_project where nrc_sub_project.project_id=nrc_project.project_id 
AND nrc_sub_project.sub_project_name LIKE '%$project_name%'  order by project_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT * FROM nrc_sub_project,nrc_project where nrc_sub_project.project_id=nrc_project.project_id order by project_name asc";
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
  

    <td><?php echo $rows->project_name;?></td>
    <td><?php echo $rows->sub_project_code;?></td>
    <td><?php echo $rows->sub_project_name;?></td>
    <td><?php echo $rows->sub_project_desc;?></td>
    <td align="center"><a href="home.php?setuptemplate=setuptemplate&subproject_id=<?php echo $rows->sub_project_id;?>" style="font-size:12px; font-weight:bold;">Set Up Template</a></td>
	<!--<td align="center"><a href="home.php?editsubproject=editsubproject&sub_project_id=<?php echo $rows->sub_project_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	?>
	<a href="home.php?&viewsubproject=viewsubproject&subDELETESubProject&sub_project_id=<?php echo $rows->sub_project_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	<?php
		}
	else
	{ 
	echo $me;
	
	}?></td>
	
   
    </tr>-->
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


