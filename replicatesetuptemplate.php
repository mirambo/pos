<?php
/*if (isset($_POST['add_biweekly']))
{ replicate_template($project_id,$sub_project_id,$cc_id,$location_id,$activity,$target,$target_male,$target_female)
add_biweekly($sub_proj_id,$sub_proj_id,$set_template_id,$settlement_id,$trans_date,$report_period_id,$bi_male,$bi_female,$narration,$user_id,$sess_location_id);
}*/

if (isset($_POST['set_template']))
{
replicate_template($project_id,$sub_proj_id,$cc_id,$location_id,$activity,$target,$target_male,$target_female);
}?>
<?php 
if (isset($_POST['generate']))
{
$location_id=$_POST['location_id'];
$cc_id=$_POST['cc_id'];
$sub_proj_id=$_POST['sub_proj_id'];
}
 ?>
 
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
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>
<form  name="new_form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="new_form"> 
 
<table width="100%" border="0" align="center">
  <!--<tr bgcolor="#FFFFCC">
   
    <td colspan="6" height="30" align="center"> 
	<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
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
	<td><select name="country_id">	<option value="0">................Select Locations.............</option>	
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
								  
								  $query1="SELECT * from nrc_sub_project order by sub_project_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->sub_project_id;?>"><?php echo $rows1->sub_project_name.' ';?> </option>
                                    
                                
										  
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
if (!isset($_POST['generate']))
{?>

Bi weekly Report
<?php

}
else
{

$location_id=$_POST['country_id'];
$cc_id=$_POST['cc_id'];
$sub_proj_id=$_POST['sub_proj_id'];



 ?>
 <?php 

	$queryinst="SELECT nrc_project.project_id,nrc_project.start_date,nrc_project.end_date,nrc_project.project_code,
	nrc_project.project_name,nrc_sub_project.sub_project_id,nrc_sub_project.project_id,nrc_sub_project.sub_project_code,nrc_sub_project.sub_project_name,
nrc_sub_project.start_date as sdate,nrc_sub_project.end_date as edate FROM nrc_project,nrc_sub_project 
	WHERE nrc_project.project_id=nrc_sub_project.project_id AND nrc_sub_project.sub_project_id='$sub_proj_id'";
	$resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
	$rowsinst=mysql_fetch_object($resultsinst);

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


echo "<font color='#009900'><i><strong>".$location_name=$rowsccn['location_name'].'</strong></i></font>';
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


echo "<font color='#009900'><i><strong>".$cc_name=$rowsccn['cc_name'].'</strong></i></font>';
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
$sqlccn="SELECT * from nrc_sub_project where sub_project_id='$sub_proj_id';";
$resultsccn=mysql_query($sqlccn) or die ("Error $sqlccn.".mysql_error());
$rowsccn=mysql_fetch_array($resultsccn);

echo "<font color='#009900'><i><strong>".$project_code=$rowsccn['sub_project_code'].' - '.$project_name=$rowsccn['sub_project_name'].'</strong></i></font>';
}
 ?>
 
 
<!--<strong>Period</strong>

<?php
if ($date_from=='')
{
echo "<font color='#ff0000'><i><strong>No Period Selected!!</strong></i></font>";
}

else
{
echo "Between <font color='#009900'><i><strong>".$date_from." </font>And <font color='#009900'>".$date_to.'</strong></i></font>';
}
 ?>
-->

<?php
}

 ?>

</td>

</tr>
</table>























</form>


<form  name="new_supplier" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="suggestSearch"> 


<table width="100%" border="0">
<tr height="50">
    <td bgcolor=""><input type="hidden" name="project_id" value="<?php echo $rowsinst->project_id;?>"><input type="hidden" name="txtsub_project_id" value="<?php echo $sub_proj_id?>">&nbsp;</td>
    <td width="19%" align="right">Select Implementation Location<font color="#FF0000">*</font></td>
    <?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Added Successfully!!</font></strong></p></div>';
?><td width="23%">
	
	<select name="location_id">

	<option value="0">Select Implementation Location-----------------------------------</option>
	
	
	
	
								  <?php
								  
								  $query1="SELECT * from nrc_location order by location_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->location_id;?>"><?php echo $rows1->location_name.' ';?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
	
	</td>
	<td width="24%" rowspan="2"><div id='new_supplier_errorloc' class='error_strings'></div></td>
   
  </tr>
  
  <tr height="50">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" align="right">Core Competency<font color="#FF0000">*</font></td>
    <td width="23%">
	
	<select name="cc_id">

	<option value="0">Select Core Competency---------------------------------------------</option>
	
	
	
	
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
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
	
	</td>

   
  </tr>
  
<tr >
<td colspan="7">
<h3>
Panel To View The Biweekly Submited Report

</h3></td>
</tr>
<table width="100%"  border="1" class="table">
<tr align="center">
<td width="50%"><strong>Output Activity Description (as per Proposal Log Frame) <a href="home.php?" style="float:right;"></a></strong></td>

<td><strong>Total Target Beneficiaries (Male)</strong></td>
<!--<td><strong>Male Achieved</strong></td>
<td><strong>% Achievement</strong></td>-->
<td><strong>Total Target Beneficiaries (Female)</strong></td>
<!--<td><strong>Female Achieved</strong></td>
<td><strong>% Achievement</strong></td>-->
<td><strong>Target Deliverable Output</strong></td>
<td><strong>Edit</strong></td>
<td><strong>Delete</strong></td>
<!--<td><strong>Target Female</strong></td>
<td><strong>Male</strong></td>
<td><strong>Female</strong></td>
<td><strong>Naration/Remarks</strong></td>-->

</tr>

<?php



$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND cc_id='$cc_id' AND location_id='$location_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());



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
	
<td ><input type="text" name="activity[]"  size="100" value="<?php echo $rowsact->activity.' '; ?>">
<input type="hidden" name="set_template_id[]" value="<?php echo $set_template_id=$rowsact->set_template_id;?>">  
<!--[<a rel="facebox" href="view_history.php?set_template_id=<?php echo $set_template_id; ?>">View History</a>]-->
</td>
<td align="center"><input type="text" name="target_male[]" value="<?php echo $target_male=$rowsact->target_male; ?>"></td>
<td align="center"><input type="text" name="target_female[]" value="<?php echo $target_female=$rowsact->target_female; ?>"></td>
<td align="center"><input type="text" name="target[]" value="<?php echo $target=$rowsact->target; ?>"></strong></td>
<td align="center"><a href="edit_set_template.php?set_template_id=<?php echo $set_template_id?>"><img src="images/edit.png"></a></td>
<td align="center"><a href=""><img src="images/delete.png"></a></td>


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



<tr><td></td><td><input type="submit" name="submit" value="Save as New Record">
	<input type="hidden" name="set_template" id="set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td></tr>

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
 frmvalidator.addValidation("location_id","dontselect=0",">>Please select location to proceed!!");
 frmvalidator.addValidation("cc_id","dontselect=0",">>Please select competency to proceed!!");
 frmvalidator.addValidation("sub_project_name","req",">>Please enter sponsor name");
 
 
 
 
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


