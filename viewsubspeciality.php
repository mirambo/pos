<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript" src="suggest.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>
 <form  method="post" action="" id="suggestSearch"> 
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
	
	<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><!--<a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a>--></td></tr>
	
    </tr>
	<!--<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10"><div style="margin-left:400px;">
	<strong>Search Client - Enter Name: 
    </strong>
    
    
    <input type="text" name="PoNumber" size="40" id="PoNumber" onkeyup="searchSuggest();" autocomplete="off" />
	<div id="layer1" style="float:left;"></div>
	<input type="submit" name="generate" value="Search"></div></td>
	
    </tr>-->
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="180"><strong>Main Project Name</strong></td>
    <td align="center" width="100"><strong>Sub Project Name</strong></td>
    <td align="center" width="100"><strong>Sub-Project Code</strong></td>
	<td align="center" width="150"><strong>Sub-Project Description</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>End Date</strong></td>
	<td width="50" align="center"><strong>Add Indicator</strong></td>
    <td width="50" align="center"><strong>Tabular Progress</strong></td>
    <td width="50" align="center"><strong>Graphical Progress</strong></td>
    <td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
	
    
    </tr>
  
  <?php
  
if(!isset($_POST['generate']))
{
  
$sql="SELECT projects.project_name,sub_projects.sub_project_code,sub_projects.sub_project_name,sub_projects.sub_project_desc,sub_projects.sub_project_id,
sub_projects.sub_project_start_date,sub_projects.sub_project_end_date FROM projects,sub_projects WHERE sub_projects.project_id=projects.project_id";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$client_name=$_POST['PoNumber'];
$sql="SELECT clients.c_name,clients.client_id,clients.block_id,clients.c_address,clients.c_town,clients.c_paddress,clients.c_phone,
clients.contact_person,clients.c_email,blocks.block_name FROM clients,blocks where clients.block_id=blocks.block_id and clients.c_name LIKE '%$client_name%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
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
  
    <td><?php echo $rows->sub_project_name;?></td>
    <td ><?php echo $rows->project_name;?></td>
	<td><?php echo $rows->sub_project_code;?></td>
	<td><?php 	echo $rows->sub_project_desc;	?></td>
	<td align="center"><?php echo $rows->sub_project_start_date;?></td>
	<td align="center"><?php echo $rows->sub_project_end_date;?></td>
	

	<td align="center" width="50">
	<?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
    <a href="#"onClick="MM_openBrWindow('my_multiple.php?&sub_project_id=<?php echo $rows->sub_project_id; ?>&amp;action=create','Report','scrollbars=yes,width=800,height=500')"><br>
    Add Indicators</a>
    
	
	<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
	</td>

	<td align="center" width="50">
	<?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a href="#"onClick="MM_openBrWindow('view_indicators.php?&sub_project_id=<?php echo $rows->sub_project_id; ?>&amp;action=create','Report','scrollbars=yes,width=800,height=500')"><br>
    View Indicators</a>
	<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
	</td>
    <td align="center" width="50">
	<?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a href="#"onClick="MM_openBrWindow('graph_indicators.php?&sub_project_id=<?php echo $rows->sub_project_id; ?>&amp;action=create','Report','scrollbars=yes,width=900,height=700')"><br>
	Graphical Representaion</a>
	<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
	</td>
    
    <td align="center" width="50">
	<?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a href="home.php?editsubspeciality=editsubspeciality&client_id=<?php echo $rows->client_id; ?>"><img src="images/edit.png"></a>
	<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
	</td>
	<td align="center" width="50">
	
	<?php
$sess_allow_delete;
if ($sess_allow_delete==1)
{
	?>
	
	<a href="delete_subspeciality.php?client_id=<?php echo $rows->client_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png">
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
</form>


