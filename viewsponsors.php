<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>


<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sponsor Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesponsorconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Currency deleted successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
	<tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="4" align="center">   <strong>Select Sub Project<font color="#FF0000">* </font></strong>
	<select name="sub_project_id"><option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from nrc_sub_project,nrc_project  WHERE nrc_sub_project.project_id=nrc_project.project_id AND status='1' order by sub_project_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->sub_project_id;?>"><?php echo $rows1->sub_project_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  <strong>Select location<font color="#FF0000">* </font></strong>
	<select name="location_id"><option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from nrc_location order by location_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->location_id;?>"><?php echo $rows1->location_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  
<input type="submit" name="generate" value="Generate">								  
								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Area Name</strong></td>
	<td align="center" width="150"><strong>Area Code</strong></td>
	<!--<td align="center" width="150"><strong>Exchange Rate(From USD To SSP)</strong></td>
	<td align="center" width="150"><strong>Exchange Rate Date</strong></td>-->
	
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 
if (!isset($_POST['generate']))
{ 
$sql="SELECT * FROM area order by area_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($date_from!='' && $date_to!='')
{
$sql="SELECT * FROM currency where date_recorded BETWEEN '$date_from' AND '$date_to' order by date_recorded asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

else
{
$sql="SELECT * FROM currency order by date_recorded asc";
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
  
    <td><?php echo $rows->area_name;?></td>
	<td align="center"><?php echo $rows->area_code;?></td>
	<!--<td align="center"><?php echo $rows->curr_rate;?></td>
	<td align="center"><?php echo $rows->date_recorded;?></td>-->
	<td align="center"><a href="home.php?editsponsor=editsponsor&curr_id=<?php echo $rows->curr_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="deletesponsor.php?curr_id=<?php echo $rows->curr_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
	
   
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

<!--<script type="text/javascript">
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
  
  
  </script>-->
</form>
