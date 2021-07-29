<?php 
include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		<div id="zone-bar2" class="br-5">
		<?php require_once('includes/trails_submenu.php');  ?>
		         </div>
		<h3>:: List of All Activities taking place into the System</h3>

				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 				
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    </tr>
	<tr  height="30" bgcolor="#FFFFCC">
   
   <td colspan="3" align="center"><strong>Select User&nbsp;&nbsp;</strong>
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
   <strong>&nbsp;&nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp;
   Filter By Date</strong></div>
   <strong>From</strong>
    
   <input type="text" name="from" size="30" id="from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong></div>
    <input type="text" name="to" size="30" id="to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    
    <input type="submit" name="generate" value="Generate">
    </td>
    
    

   
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td width="150"><div align="center"><strong>System User</strong></td>
    <td width="300"><div align="center"><strong>Activity Done</strong></td>
	<td width="200" ><div align="center"><strong>Date Done</strong></td>
    
    </tr>
  
  <?php
 
if (!isset($_POST['generate']))
{
 
$sql="SELECT users.f_name, users.user_id,audit_trail.action,audit_trail.date_of_event,
user_group.user_group_name FROM users,audit_trail,user_group 
where users.user_id=audit_trail.user_id and users.user_group_id=user_group.user_group_id order by audit_trail.audit_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$users=mysql_real_escape_string($_POST['users']);
$date_from=mysql_real_escape_string($_POST['date_from']);
$date_to=mysql_real_escape_string($_POST['date_to']);

if ($users!='0' && $date_from=='' && $date_to=='')
{
$sql="SELECT users.f_name, users.user_id,audit_trail.action,audit_trail.date_of_event,
user_group.user_group_name FROM users,audit_trail,user_group 
where users.user_id=audit_trail.user_id and users.user_group_id=user_group.user_group_id AND users.user_id='$users' order by audit_trail.audit_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($users=='0' && $date_from!='' && $date_to!='')
{
$sql="SELECT users.f_name, users.user_id,audit_trail.action,audit_trail.date_of_event,
user_group.user_group_name FROM users,audit_trail,user_group 
where users.user_id=audit_trail.user_id and users.user_group_id=user_group.user_group_id AND audit_trail.date_of_event >='$date_from' AND audit_trail.date_of_event <='$date_to' order by audit_trail.audit_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($users!='0' && $date_from!='' && $date_to!='')
{
$sql="SELECT users.f_name, users.user_id,audit_trail.action,audit_trail.date_of_event,
user_group.user_group_name FROM users,audit_trail,user_group 
where users.user_id=audit_trail.user_id and users.user_group_id=user_group.user_group_id AND users.user_id='$users' AND audit_trail.date_of_event >='$date_from' AND audit_trail.date_of_event <='$date_to' order by audit_trail.audit_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{

$sql="SELECT users.f_name, users.user_id,audit_trail.action,audit_trail.date_of_event,
user_group.user_group_name FROM users,audit_trail,user_group 
where users.user_id=audit_trail.user_id and users.user_group_id=user_group.user_group_id order by audit_trail.audit_id desc";
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
    <td><?php echo $rows->action;?></td>
	<td><?php echo $rows->date_of_event;?></td>
    
    </tr>
  <?php 
  
  }
  
  }
  
  
  ?>
</table>
</form>		
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "to"       // ID of the button
    }
  );
  
  
  
  </script>			

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
				</div>
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
</body>

</html>