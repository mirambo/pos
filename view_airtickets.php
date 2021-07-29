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
    return confirm("Are you sure want to delete?");
}

</script>

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
	
  
  <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="180"><strong>Staff Name</strong></td>
	<td align="center" width="180"><strong>Job Title</strong></td>
    <td align="center" width="180"><strong>Depart. Place</strong></td>
	<td width="100" align="center"><strong>Depart. Date</strong></td>
	<!--<td align="center" width="160"><strong>Destination Place</strong></td>-->
  	<td align="center" width="100"><strong>Arrival Date</strong></td>
	<td align="center" width="100"><strong>Return Date</strong></td>
	<td align="center" width="80"><strong>Flight Comp</strong></td>
	<td align="center" width="80"><strong>Cost (USD)</strong></td>
   <!-- <td width="100" align="center"><strong>Remaining Days</strong></td>-->
    <td width="70" align="center"><strong>Edit</strong></td>
	<td width="70" align="center"><strong>Delete</strong></td>
	
	 
	<!--<td width="100" align="center"><strong>Flight Charges (USD)</strong></td>
	<td width="120" align="center"><strong>Grand Total(USD)</strong></td>-->
	
    
    </tr>
  
  <?php 
 //$curr_date='2013-03-30';

$sql="SELECT airtickets.country,airtickets.airticket_id,airtickets.dep_town,airtickets.dep_date,airtickets.dest_town,airtickets.arrive_date ,airtickets.ret_date,
airtickets.flight_comp,airtickets.flight_cost,airtickets.remarks,employees.emp_id,employees.emp_fname,employees.emp_mname,employees.emp_lname,omjob_titles.omjob_title_name
 FROM employees,omjob_titles,airtickets WHERE airtickets.emp_id=employees.emp_id and omjob_titles.omjob_title_id=employees.title";
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
  
    <td><?php 	
	echo $rows->emp_fname.' '.$rows->emp_mname.' '.$rows->emp_lname;
	
	?></td>
    
	
	<td>
	
	<?php echo $rows->omjob_title_name; ?>

	
	</td>	
	<td>
	
	<?php 
echo $rows->dep_town.' - '.$rows->country;
	
	?></td>
	<td align="center"><?php 
	
	
	
	echo $rows->dep_date;
	
	
	
	?></td>
	<td align="center"><?php 
 echo $rows->arrive_date;
?></td>
<td align="center"><?php
	
	echo $rows->ret_date;


?></td>
	
	<td align="center"><?php echo $rows->flight_comp; ?></td>
	
	<td align="center"><?php 
	
echo $rows->flight_cost;

?></td>
	<td align="center">
	<?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a href="home.php?editprocessinterflight=editprocessinterflight&airticket_id=<?php echo $rows->airticket_id; ?>"><img src="images/edit.png"></a>
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
	
	<a href="delete_expense.php?expense_id=<?php echo $rows->expense_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a>
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
  
  <tr><td colspan="12" align="center"><font color="#ff0000" size="+1"><strong>Their are no staff in the field currenctly!!</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>



