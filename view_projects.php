
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

if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center">
	<strong>Search Project - Cleint Client Name:<select name="client"><option value="0">Select..................................</option>
								  <?php
								  
								  $query1="select * from clients order by c_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->client_id; ?>"><?php echo $rows1->c_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> 
								  
								 Or Select Operation Type:
								  <select name="operation"><option value="0">Select..................................</option>
								  <?php
								  
								  $query1="select * from operations order by operation_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->operation_id; ?>"><?php echo $rows1->operation_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
    </strong>
	
    
    
  
	
	<input type="submit" name="generate" value="Search"></td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="180"><strong>Client Name</strong></td>
    <td align="center" width="150"><strong>Operation / Service Type</strong></td>
    <td align="center" width="100"><strong>Start Date</strong></td>
	<td align="center" width="150"><strong>End Date</strong></td>
	<td align="center" width="150"><strong>Status</strong></td>
	 <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 
if (!isset($_POST['generate']))
{ 
$sql="SELECT operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id ORDER BY clients.c_name asc,operations.operation_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$client=$_POST['client'];
$operation=$_POST['operation'];

if ($client!='0' && $operation=='0')
{
$sql="SELECT operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id and 
projects.client_id='$client' ORDER BY clients.c_name asc,operations.operation_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif ($client=='0' && $operation!='0')
{
$sql="SELECT operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id and 
projects.operation_id='$operation' ORDER BY clients.c_name asc,operations.operation_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($client!='0' && $operation!='0')
{
$sql="SELECT operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id and 
projects.operation_id='$operation' and projects.client_id='$client' ORDER BY clients.c_name asc,operations.operation_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id ORDER BY clients.c_name asc,operations.operation_name asc";
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
    <td ><?php echo $rows->c_name;?></td>
    <td><?php echo $rows->operation_name;?></td>
	
	<td align="center"><?php echo $rows->period_from;?></td>
	<td align="center"><?php echo $rows->period_to;?></td>
	<td align="center"><?php 
	$curr_date=date('Y-m-d');
	$period_to=$rows->period_to;
	
	if ($curr_date<$period_to)
	{
	echo "<strong><font color='#00CC33'><blink>Ongoing</blink></font></strong>";
	}
	elseif ($curr_date>$period_to)
	{
	echo "<strong><font color='#ff0000'><i>Completed..</i></font></strong>";
	}
	
	
	?></td>
	<td align="center">
	
	<?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	
	<a href="home.php?editproject=editproject&project_id=<?php echo $rows->project_id;?>"><img src="images/edit.png"></a>
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
	
	<a href="delete_project.php?project_id=<?php echo $rows->project_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a>
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


