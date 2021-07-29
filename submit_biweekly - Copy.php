<?php

//echo $sess_area_id;
//echo $sess_country_id;

if (isset($_POST['add_biweekly']))
{
add_biweekly($project_id,$sub_project_id,$set_template_id,$location_id,$trans_date,$report_period_id,$bi_achieved,$bi_male,$bi_female,$narration,$user_id,$sess_location_id,$sess_area_id,$sess_country_id);
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
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>
 <form  name="new_supplier" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="suggestSearch"> 
 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="13" height="50" align="center"> 
	<div id='new_supplier_errorloc' class='error_strings'></div>
	<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Submitted Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
	<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><!--<a href="printsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a>--></td></tr>
	
    </tr>
	
  
  <tr  style="background:url(images/description.gif);" height="60" >
  <?php
$sqlcc="SELECT nrc_cc.cc_id,nrc_cc.cc_name,nrc_set_template.cc_id FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id 
WHERE nrc_set_template.area_id=$sess_area_id GROUP BY nrc_cc.cc_id ORDER BY nrc_cc.cc_id";


$resultscc=mysql_query($sqlcc) or die ("Error $sqlcc.".mysql_error());
if ($numrows=mysql_num_rows($resultscc)>0)
{
while ($rowscc=mysql_fetch_object($resultscc))
{
$count=$numrows;

?>
<td  align="center" width="180" onClick="document.location.href='home.php?submit_biweekly=submit_biweekly&cc_id=<?php echo $cc_id2=$rowscc->cc_id;?>'"><strong><?php echo $rowscc->cc_name; ?>
[<?php
//$sqlc_num="SELECT * FROM nrc_set_template WHERE location_id='$sess_area_id' and cc_id='$cc_id2' GROUP BY cc_id";
$sqlc_num="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$cc_id2 and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id 
";
$results_num=mysql_query($sqlc_num) or die ("Error $sqlc_num.".mysql_error());
$num_rows=mysql_num_rows($results_num);
echo $num_rows;?>]</strong></td>
<?php

}
}

  ?>

    </tr>
</table>	


<table width="100%" border="0">
<?php 
if ($get_cc_id=$_GET['cc_id'])
{
?>


<tr  height="40" bgcolor="#FFFFCC">
<td colspan="2" align="center">
<span style="float:right;margin-right:100px;">
<strong>Select Location : </strong>
<select name="location_id">
	<option value="0">Select ..................................</option>
								  <?php		  
								  
								  
								  $query1="select * from nrc_location,nrc_set_template WHERE nrc_location.location_id=nrc_set_template.location_id AND  nrc_location.area_id='$sess_area_id' and nrc_set_template.cc_id='$get_cc_id'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->location_id;?>"><?php echo $rows1->location_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>

</td>
<td colspan="4" align="center">
<strong>Select Bi-Weekly Reporting Period </strong>

<select name="report_period_id">
	<option value="0">Select ..................................</option>
								  <?php		  
								  
								  
								  $query1="select * from nrc_report_period WHERE status='1'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->period_id;?>"><?php echo $rows1->description?> (<?php echo 'From <strong>'.$rows1->period_from.'</strong> To <strong>'.$rows1->period_to.'</strong>'; ?>)</option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select> </span>

<span style="float:right; margin-right:70px;"></span>

</td>





</tr>





<tr >
<td colspan="7"><h3>Core Competency Name : 
<?php 

$sqlccn="SELECT * from nrc_cc where cc_id='$get_cc_id';";
$resultsccn=mysql_query($sqlccn) or die ("Error $sqlccn.".mysql_error());
$rowsccn=mysql_fetch_array($resultsccn);
$cc_name=$rowsccn['cc_name'];
echo $cc_name; 

?></h3></td>
</tr>



<tr height="30" style="background:url(images/description.gif);">
<td align="center" width="30%"><strong>Sub Project</strong></td>

<td colspan="6" align="center"><strong>Activitites(Key Indicator)</strong></td>


</tr>

<?php 
/*$sqlsp="SELECT nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code,nrc_subprojectvslocation.sub_project_id 
FROM nrc_sub_project,nrc_subprojectvslocation WHERE nrc_subprojectvslocation.sub_project_id=nrc_sub_project.sub_project_id and nrc_subprojectvslocation.location_id=$sess_area_id 
GROUP BY nrc_sub_project.sub_project_id";*/
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
if (mysql_num_rows($resultssp) > 0)
{
$RowCounter=0;
while ($rowsp=mysql_fetch_object($resultssp))
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

<td><?php echo $rowsp->sub_project_code.' - '.$rowsp->sub_project_name;


echo $sub_proj_id=$rowsp->sub_project_id;?>
<input type="hidden" name="sub_project_id" value="<?php echo $sub_proj_id=$rowsp->sub_project_id;?>">
</td>

<td colspan="6" align="center">

<table width="100%"  border="1" class="table">
<tr align="center">
<td width="50%"><strong>Output Activity Description (as per Proposal Log Frame</strong></td>
<td><strong>Target Deliverable Output</strong></td>
<td><strong>Total Target Beneficiaries (Male)</strong></td>
<td><strong>Total Target Beneficiaries (Female)</strong></td>
<td><strong>Total Achieved</strong></td>
<td><strong>Male</strong></td>
<td><strong>Female</strong></td>
<td><strong>Naration/Remarks</strong></td>

</tr>

<?php
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$get_cc_id' AND nrc_set_template.area_id='$sess_area_id'";
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
	
<td ><?php echo $rowsact->activity; ?>
<input type="hidden" name="set_template_id[]" value="<?php echo $set_template_id=$rowsact->set_template_id;?>">
</td>
<td align="center"><?php echo $rowsact->target; ?></strong></td>
<td align="center"><?php echo $rowsact->target_male; ?></strong></td>
<td align="center"><?php echo $rowsact->target_female; ?></td>
<td><input type="text" name="bi_achieved[]" size="5"></td>
<td><input type="text" name="bi_male[]" size="5"></td>
<td><input type="text" name="bi_female[]" size="5"></td>
<td><strong><textarea name="narration[]" cols="20" rows="2"></textarea></strong></td>
<tr>
<?php
}


}

else
{
?>
<td colspan="7">No Allocation!!</td>
<?php

}

?>





</table>

</td>


</tr>
<?php	
							  
							  
							  
							  }
							  }

?>
<tr height="50"><td align="center"colspan="8">
<input type="submit" name="submit" value="Save">
<input type="hidden" name="add_biweekly" id="add_biweekly" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel">

</td></tr>

<?php 
}
else
{?>
<tr>
<td colspan="8" align="center">Click Above</td>
</tr>
<?php
}

?>

</table>

</form>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("location_id","dontselect=0",">>Please Select Location");
  frmvalidator.addValidation("report_period_id","dontselect=0",">>Please Select Bi-Weekly reporting period");
 

 
  </SCRIPT>



