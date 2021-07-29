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
    return confirm("Are you sure you want to delete this user?");
}

function confirmSuspend()
{
    return confirm("Are you sure you want to suspend this user?");
}

function confirmReactivate()
{
    return confirm("Are you sure you want to reactivate the user?");
}


</script>
 <form name="search" method="post" action="">  
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="13" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User deleted successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="13" align="center">
	<strong>Search Users - Enter User Full Name: 
    </strong>
    
    
    <input type="text" name="sub_module" size="40" />
	
	<input type="submit" name="generate" value="Search"></td>
	
    </tr>	
	
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="50"><strong>Code</strong></td>
    <td align="center" width="150"><strong>User Full Name</strong></td>
    <td align="center" width="150"><strong>Phone No.</strong></td>
    <td align="center" width="150"><strong>Email Addr.</strong></td>

	<td align="center" width="150"><strong>User Group</strong></td>

    <td align="center" width="100"><strong>Username</strong></td>
	<td align="center" width="50"><strong>Allow Add</strong></td>
	<td align="center" width="70"><strong>Allow View</strong></td>
	<td align="center" width="50"><strong>Allow Edit</strong></td>
	<td align="center" width="70"><strong>Allow Delete</strong></td>	
    <td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
	<td align="center" width="50"><strong>Suspend/Reactivate</strong></td>
    
    </tr>
  
  <?php 
  if (!isset($_POST['generate']))
{ 
 
$sql="SELECT * FROM users,user_group where users.user_group_id=user_group.user_group_id order by users.f_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{

$sub_module=$_POST['sub_module'];
if ($sub_module!='')
{
$sql="SELECT * FROM users,user_group where users.user_group_id=user_group.user_group_id and users.f_name LIKE '%$sub_module%' order by users.f_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{

$sql="SELECT * FROM users,user_group where users.user_group_id=user_group.user_group_id order by users.f_name asc";
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
  
    <td><?php echo $rows->user_code;?></td>
    <td><?php echo $rows->f_name;?></td>
    <td><?php echo $rows->phone;?></td>
    <td><?php echo $rows->email;?></td>
  <!--  <td><?php echo $rows->area_name;?></td>-->
  


	<td><?php echo $rows->user_group_name;?></td>
	
	<td><?php echo $rows->username;?></td>
	<td align="center"><strong><?php $allow_add=$rows->allow_add;
	if ($allow_add==1)
	{
	echo "<font color='#00CC00'>Yes</font>";
	}
	else
	{
	echo "<font color='#ff0000'>No</font>";
	}
	
	?></strong></td>
	<td align="center"><strong><?php $allow_view=$rows->allow_view;
	if ($allow_view==1)
	{
	echo "<font color='#00CC00'>Yes</font>";
	}
	else
	{
	echo "<font color='#ff0000'>No</font>";
	}
	
	?></strong></td>
	<td align="center"><strong><?php $allow_edit=$rows->allow_edit;
	if ($allow_edit==1)
	{
	echo "<font color='#00CC00'>Yes</font>";
	}
	else
	{
	echo "<font color='#ff0000'>No</font>";
	}
	
	?></strong></td>
	<td align="center"><strong><?php $allow_delete=$rows->allow_delete;
	if ($allow_delete==1)
	{
	echo "<font color='#00CC00'>Yes</font>";
	}
	else
	{
	echo "<font color='#ff0000'>No</font>";
	}
	
	?></strong></td>
	<td align="center"><a href="home.php?edituser=edituser&get_user_id=<?php echo $rows->user_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="deleteuser.php?get_user_id=<?php echo $rows->user_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    <td align="center">
	<?php 
 $suspend=$rows->suspend;
 
 if ($suspend==0)
 {
?>
<a href="suspend.php?user_id=<?php echo $rows->user_id; ?>"  onClick="return confirmSuspend();" style="color:#ff0000; font-weight:bold;"  >Suspend</a>
<?php 
}
elseif ($suspend==1)
{
?>
<a href="suspend.php?user_id=<?php echo $rows->user_id; ?>"  onClick="confirmReactivate();" style="color:#00CC33; font-weight:bold;">Reactivate</a>
<?php


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


