<?php
/*if (isset($_POST['add_biweekly']))
{
add_biweekly($sub_proj_id,$sub_proj_id,$set_template_id,$settlement_id,$trans_date,$report_period_id,$bi_male,$bi_female,$narration,$user_id,$sess_location_id);
}*/
if (isset($_POST['generate'])) 
{
$location_id=$_POST['location_id'];
$cc_id=$_POST['cc_id'];
$sub_proj_id=$_POST['sub_proj_id'];
}

if ($_GET['editsuccess']==1)
{

$set_template_id=$_GET['set_template_id'];
$location_id=$_GET['location_id'];
$cc_id=$_GET['cc_id'];
$sub_proj_id=$_GET['sub_project_id'];

}

//get project id




 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
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
<form  name="new_supplier" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="suggestSearch"> 
 
<table width="100%" border="0" align="center">
  <!--<tr bgcolor="#FFFFCC">
   
    <td colspan="6" height="30" align="center"> 
	<?php
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND cc_id='$cc_id' AND location_id='$location_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td></tr>-->
	
	<tr bgcolor="#FFFFCC"><td colspan="9" align="right"></td></tr>
	
    </tr>
	<tr height="30"> 
	<td><strong>Select Location </strong></td>
	<td><select name="location_id">	<option value="0">................Select Locations.............</option>	
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
									  
									  
								  
								  
								  
								  
								  
								  ?>
								  
						  
								  </select></td>
	<td><strong>Select Core Competency</strong></td>
	<td><select name="cc_id">

	<option value="0">................Select Core Competencies.............</option>	
	
	
	
	
								  <?php
								  
								  $query1="SELECT * from nrc_cc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cc_id;?>"><?php echo $rows1->cc_code.' - '.$rows1->cc_name.' ';?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?>
									  
								  
								  </select></td>
	<td><strong>Select Sub-Project</strong></td>
	<td><select name="sub_proj_id">

<option value="0">................Select Sub-Projects.............</option>	
	
	
	
	
								  <?php
								  
								  $query1="SELECT * from nrc_sub_project";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->sub_project_id;?>"><?php echo $rows1->sub_project_code.' - '.$rows1->sub_project_name.' ';?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?>
									  
								  
								  </select></td>

	</tr>
 <!--<tr bgcolor="#FFFFCC" height="30">
	<td colspan="2" align="right"><strong>Choose Period</strong></td>
	
	<td colspan="3" align="center"><strong>Date From :</strong>
<input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><strong>Date To:</strong>
		<input type="text" name="date_to" size="40" id="date_to" readonly="readonly" />


	<strong></strong></td>
	

	<td></td>
	</tr>-->
	
	<tr height="30">
	<td></td>
		
	<td></td>
	<td></td>
	<td align="center"><input type="submit" name="generate" value="View"></td>
	
	</tr>
 </table>
 
 

<table width="100%" border="0">
<tr  height="40" bgcolor="#FFFFCC">
<td colspan="7" align="center">
<?php
if (!isset($_POST['generate']) && $_GET['editsuccess']!=1)
{?>

Bi weekly Report
<?php

}
else
{
if (isset($_POST['generate']))
{

$location_id=$_POST['location_id'];
$cc_id=$_POST['cc_id'];
$sub_proj_id=$_POST['sub_proj_id'];
}
if ($_GET['editsuccess']==1)
{


$location_id=$_GET['location_id'];
$cc_id=$_GET['cc_id'];
$sub_proj_id=$_GET['sub_project_id'];

}
 ?>
<strong>Location : </strong><?php
if ($location_id==0)
{
echo "<font color='#ff0000'><i><strong>No Country Selected!!</strong></i></font>";
}
else
{
$sqlccn="SELECT * from nrc_location where location_id='$location_id';";
$resultsccn=mysql_query($sqlccn) or die ("Error $sqlccn.".mysql_error());
$rowsccn=mysql_fetch_array($resultsccn);


echo "<font color='#009900'><i><strong>".$location_name=$rowsccn['location_name'].'</strong></i></font>
<a rel="facebox" href="edit_set_template_location.php?location_id='.$location_id.'&cc_id='.$cc_id.'&sub_project_id='.$sub_proj_id.'"><img src="images/edit.png"></a>';
}
 
 
 
 ?>

<strong>Core Competency : </strong>
<?php
if ($cc_id==0)
{
echo "<font color='#ff0000'><i><strong>No Competency Selected!!</strong></i></font>";
}
else
{
$sqlccn="SELECT * from nrc_cc where cc_id='$cc_id';";
$resultsccn=mysql_query($sqlccn) or die ("Error $sqlccn.".mysql_error());
$rowsccn=mysql_fetch_array($resultsccn);


echo "<font color='#009900'><i><strong>".$cc_name=$rowsccn['cc_code'].' - '.$cc_name=$rowsccn['cc_name'].'</strong></i></font>
<a rel="facebox" href="edit_set_template_cc.php?location_id='.$location_id.'&cc_id='.$cc_id.'&sub_project_id='.$sub_proj_id.'"><img src="images/edit.png"></a>';
}
 ?>




<strong>Sub-Project : </strong>
<?php
if ($sub_proj_id==0)
{
echo "<font color='#ff0000'><i><strong>No Project Selected!!</strong></i></font>";
}
else
{
$sqlccn="SELECT * from nrc_sub_project,nrc_project where nrc_sub_project.project_id=nrc_project.project_id AND sub_project_id='$sub_proj_id';";
$resultsccn=mysql_query($sqlccn) or die ("Error $sqlccn.".mysql_error());
$rowsccn=mysql_fetch_array($resultsccn);

echo "<font color='#009900'><i><strong>".$project_code=$rowsccn['sub_project_code'].' - '.$project_name=$rowsccn['sub_project_name'].'</strong></i></font>
<a rel="facebox" href="edit_set_template_sub_project.php?location_id='.$location_id.'&cc_id='.$cc_id.'&sub_project_id='.$sub_proj_id.'"><img src="images/edit.png"></a>';
}
 ?>
 
 
<strong>Main Project :</strong>

<?php








$project_id=$rowsccn['project_id'];
echo "<font color='#009900'><i><strong>".$rowsccn['project_code'].' - '.$rowsccn['project_name']."<font>";
 ?>


<?php
}

 ?>

</td>

</tr>
</table>





























<table width="100%" border="0">
<tr >
<td colspan="7">
<h3>
Panel To View Templates For Data Entry
<a rel="facebox" href="add_more_set_template.php?set_template_id=<?php echo $set_template_id?>&location_id=<?php echo $location_id;?>&cc_id=<?php echo $cc_id ?>&sub_project_id=<?php echo $sub_proj_id; ?>&project_id=<?php echo $project_id; ?>" style="float:right; margin-right:100px;">Add More Output</a></strong>
</h3></td>
</tr>
<table width="100%"  border="1" class="table">
<tr align="center">
<td width="50%"><strong>Activity Name </td>

<td><strong>Target Male</strong></td>
<!--<td><strong>Male Achieved</strong></td>
<td><strong>% Achievement</strong></td>-->
<td><strong>Target Female</strong></td>
<!--<td><strong>Female Achieved</strong></td>
<td><strong>% Achievement</strong></td>-->
<td><strong>Total Target</strong></td>
<td><strong>Edit</strong></td>
<td><strong>Delete</strong></td>
<!--<td><strong>Target Female</strong></td>
<td><strong>Male</strong></td>
<td><strong>Female</strong></td>
<td><strong>Naration/Remarks</strong></td>-->

</tr>

<?php






if (mysql_num_rows($resultsact) > 0)
{
$RowCounter=0;
while ($rowsact=mysql_fetch_object($resultsact))
							  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
							  {
echo '<tr bgcolor="#C0D7E5" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" 
              >';
}
	?>
	
<td ><?php echo $rowsact->activity.' '; ?>
<input type="hidden" name="set_template_id[]" value="<?php echo $set_template_id=$rowsact->set_template_id;?>">  
<!--[<a rel="facebox" href="view_history.php?set_template_id=<?php echo $set_template_id; ?>">View History</a>]-->
</td>
<td align="center"><?php echo $target_male=$rowsact->target_male; ?></td>
<td align="center"><?php echo $target_female=$rowsact->target_female; ?></td>
<td align="center"><?php echo $target=$rowsact->target; ?></strong></td>
<td align="center"><a rel="facebox" href="edit_set_template.php?set_template_id=<?php echo $set_template_id?>&location_id=<?php echo $location_id;?>&cc_id=<?php echo $cc_id ?>&sub_project_id=<?php echo $sub_proj_id; ?>"><img src="images/edit.png"></a></td>
<td align="center"><a onClick="return confirmDelete();" href="delete_set_template.php?set_template_id=<?php echo $set_template_id?>&location_id=<?php echo $location_id;?>&cc_id=<?php echo $cc_id ?>&sub_project_id=<?php echo $sub_proj_id; ?>"><img src="images/delete.png"></a></td>


<tr>
<?php
}


}

else
{
?>
<td colspan="7">No Records Found Matching Record  found!!</td>
<?php

}

?>





</table>
<hr color="#ff0000"/>
</td>


</tr>


</table>

</form>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("settlement_id","dontselect=0",">>Please Select Settlement");

 
  </SCRIPT>
 <!-- <script type="text/javascript">
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
  
  
  
  </script> -->
  
<?php 

//echo $location_id; echo"<br/>";



?>


