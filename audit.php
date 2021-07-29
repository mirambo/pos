<?php 

function sql_date_shift($date, $shift)
{
return date("y-m-d H:i:s" , strtotime($shift, strtotime($date)));
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

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr style="background:url(images/description.gif);" height="30">
   
   <td colspan="9" align="center"><strong>Select User&nbsp;&nbsp;</strong>
    <select name="users"><option value="0">Select..............................................</option>
								  <?php
								  
								  $query1="SELECT *
								  FROM users order by  	f_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; 
									
							
									
									
									?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
   <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp;
   Filter By Date</strong></div>
   <strong>From</strong>
    
   <input type="text" name="date_from" size="30" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong></div>
    <input type="text" name="date_to" size="30" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    
    <input type="submit" name="generate" value="Generate">
    </td>
    
    

   
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="100"><strong>User</strong></td>
	<td align="center" width="50"><strong>User Group</strong></td>
    <td align="center" width="200"><strong>Action</strong></td>
	<td align="center" width="100"><strong>Date Done</strong></td>

    
    </tr>
  
  <?php 
 
if (!isset($_POST['generate']))
{
 
$sql="SELECT users.f_name, users.user_id,audit_trails.action,audit_trails.date_of_event,
user_group.user_group_name FROM users,audit_trails,user_group 
where users.user_id=audit_trails.user_id and users.user_group_id=user_group.user_group_id order by audit_trails.audit_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$users=mysql_real_escape_string($_POST['users']);
$date_from=mysql_real_escape_string($_POST['date_from']);
$date_to=mysql_real_escape_string($_POST['date_to']);

if ($users!='0' && $date_from=='' && $date_to=='')
{
$sql="SELECT users.f_name, users.user_id,audit_trails.action,audit_trails.date_of_event,
user_group.user_group_name FROM users,audit_trails,user_group 
where users.user_id=audit_trails.user_id and users.user_group_id=user_group.user_group_id AND users.user_id='$users' order by audit_trails.audit_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($users=='0' && $date_from!='' && $date_to!='')
{
$sql="SELECT users.f_name, users.user_id,audit_trails.action,audit_trails.date_of_event,
user_group.user_group_name FROM users,audit_trails,user_group 
where users.user_id=audit_trails.user_id and users.user_group_id=user_group.user_group_id AND audit_trails.date_of_event >='$date_from' AND audit_trails.date_of_event <='$date_to' order by audit_trails.audit_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($users!='0' && $date_from!='' && $date_to!='')
{
$sql="SELECT users.f_name, users.user_id,audit_trails.action,audit_trails.date_of_event,
user_group.user_group_name FROM users,audit_trails,user_group 
where users.user_id=audit_trails.user_id and users.user_group_id=user_group.user_group_id AND users.user_id='$users' AND audit_trails.date_of_event >='$date_from' AND audit_trails.date_of_event <='$date_to' order by audit_trails.audit_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{

$sql="SELECT users.f_name, users.user_id,audit_trails.action,audit_trails.date_of_event,
user_group.user_group_name FROM users,audit_trails,user_group 
where users.user_id=audit_trails.user_id and users.user_group_id=user_group.user_group_id order by audit_trails.audit_id desc";
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
  
    <td><?php echo $rows->f_name;?></td>
	<td ><?php echo $rows->user_group_name;?></td>
	<td ><?php echo $rows->action;?></td>
    <td align="center"><?php 
	
	//echo 

	


// example usage
$date=$rows->date_of_event;
//$date = "2006-12-31 21:00";
$shift="+9 hour"; // could be days, weeks... see function strtotime() for usage

 sql_date_shift($date, $shift);

$date2=$rows->date_of_event;

echo $date2;

// will output: 2006-12-31 22:00


	
	
	//$datestamp=strtotime($act_date);
	//$datestamp=$datestamp+(60*60*3);
	
//echo $datestamp


	?></td>
	
   
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

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script> 

