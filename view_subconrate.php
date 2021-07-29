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
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" align="center" >
	  <td width="150"><strong>Job Title</strong></td>
<!--<td width="150"><strong>Subcontractor</strong></td>-->
	<td align="center" width="150"><strong>Expetriate Staff Rate (USD) </strong></td>
	<td align="center" width="150"><strong>National Staff Rate (USD)</strong></td>
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 
 
$sql="select subcon_rates.amount,omjob_titles.omjob_title_name,subcon_rates.omjob_title_id FROM subcon_rates,
omjob_titles WHERE omjob_titles.omjob_title_id=subcon_rates.omjob_title_id GROUP BY subcon_rates.omjob_title_id";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/*$sql="select subcon_rates.amount,omconsultants.cons_name,omjob_titles.omjob_title_name,subcon_rates.consultant_id,subcon_rates.omjob_title_id FROM subcon_rates,omconsultants,
omjob_titles WHERE subcon_rates.consultant_id=omconsultants.consultant_id AND omjob_titles.omjob_title_id=subcon_rates.omjob_title_id GROUP BY subcon_rates.omjob_title_id";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/


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
  
   
	<td><?php echo $rows->omjob_title_name;?></td>
	<!--<td><?php
	
	//echo $subcontrator=$rows->cons_name;	
	
	?>
	
   </td>-->
	<td align="right"><strong>
	
	<?php
	$omjob_title_id=$rows->omjob_title_id;
	$consultant_id=$rows->consultant_id;
	

	
    $querystexp="select subcon_rates.amount FROM subcon_rates WHERE omjob_title_id='$omjob_title_id' AND job_cat_id='2'";
	$resultsstexp=mysql_query($querystexp) or die ("Error: $querystexp.".mysql_error());
	$rowssstexp=mysql_fetch_object($resultsstexp);

	echo number_format($rowssstexp->amount,2);?>
	
	</strong></td>
	<td align="right"><strong>
	<?php
    $querystexp="select subcon_rates.amount FROM subcon_rates WHERE omjob_title_id='$omjob_title_id' AND job_cat_id='1'";
	$resultsstexp=mysql_query($querystexp) or die ("Error: $querystexp.".mysql_error());
	$rowssstexp=mysql_fetch_object($resultsstexp);

	echo number_format($rowssstexp->amount,2);?>
	</strong></td>
	<td align="center">
	
	<?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	
	<a href="home.php?editsubconrate=editsubconrate&omjobtitle_id=<?php echo $omjob_title_id; ?>"><img src="images/edit.png"></a>
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
	
	<a href="deletesubconrate.php?omjobtitle_id=<?php echo $omjob_title_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
<?php 
	}
	else
	{
	echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
	
	}
	
	
	?>		
   
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



