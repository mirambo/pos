<?php
/*if (isset($_POST['add_biweekly']))
{
add_biweekly($project_id,$sub_project_id,$set_template_id,$settlement_id,$trans_date,$report_period_id,$bi_male,$bi_female,$narration,$user_id);
}*/
 ?>
 
 
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript" src="suggest.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}

.rotate {
  -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -o-transform: rotate(-90deg);
  transform: rotate(-90deg);

 
}
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
<td  align="center" width="180" onClick="document.location.href='home.php?view_biweekly=view_biweekly&cc_id=<?php echo $cc_id2=$rowscc->cc_id;?>'"><strong><?php echo $rowscc->cc_name; ?>
[<?php
//$sqlc_num="SELECT * FROM nrc_set_template WHERE location_id='$sess_location_id' and cc_id='$cc_id2' GROUP BY cc_id";
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
<form name="bi-weekly" action="" method="POST">

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
								  
								  
								  $query1="select * from nrc_location,nrc_set_template WHERE nrc_location.location_id=nrc_set_template.location_id AND  nrc_location.area_id='$sess_area_id' 
								  and nrc_set_template.cc_id='$get_cc_id' GROUP BY nrc_set_template.location_id ORDER BY nrc_location.location_name asc ";
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


<strong>Select Bi-Weekly Reporting Period </strong>

<select name="report_period_id">
	<option value="0">Select ..................................</option>
								  <?php		  
								  
								  
								  $query1="select * from nrc_report_period";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->period_id;?>"><?php echo $rows1->description?> (<?php echo 'From <strong>'.$rows1->period_from.'</strong> To <strong>'.$rows1->period_to.'</strong>'; ?>)</option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select> 

<strong>Select Sub Project</strong>

<select name="sub_proj_id">

<option value="0">................Select Sub-Projects.............</option>	
	
	
	
	
								  <?php
								  
								  $query1="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->sub_project_id;?>"><?php echo $rows1->sub_project_name.' ';?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?>
									  
								  
								  </select>

<input type="submit" name="generate" value="Filter"></span>

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
<td align="center" width="10%"><strong>Sub Project</strong></td>

<td colspan="6" align="center"><strong>Activitites(Key Indicator)</strong></td>


</tr>

<?php
if (!isset($_POST['generate']))
{ 
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
else
{
$location_id=$_POST['location_id'];
$report_period_id=$_POST['report_period_id'];
$sub_proj_id=$_POST['sub_proj_id'];

if ($location_id!=0 && $report_period_id==0 && $sub_proj_id==0)
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
}
elseif ($location_id==0 && $report_period_id!=0 && $sub_proj_id==0)
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

elseif ($location_id==0 && $report_period_id==0 && $sub_proj_id!=0)
{

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id!=0 && $sub_proj_id==0)
{


}

elseif ($location_id!=0 && $report_period_id==0 && $sub_proj_id!=0)
{


}

elseif ($location_id==0 && $report_period_id!=0 && $sub_proj_id!=0)
{


}

elseif ($location_id!=0 && $report_period_id!=0 && $sub_proj_id!=0)
{


}
else




 
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}


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

<td valign="top" width="10%"><?php echo '<strong>'.$rowsp->sub_project_id.'</strong> - '.$rowsp->sub_project_name;
//echo $sub_proj_id=$rowsp->sub_project_id;?>
<input type="hidden" name="sub_project_id" value="<?php echo $sub_proj_id=$rowsp->sub_project_id;?>">
</td>

<td colspan="6" align="center" width="90%">

<table width="100%"  border="1" class="table">
<tr align="center">
<td width="20%" ><strong>Output Activity Description (as per Proposal Log Frame</strong></td>

<td colspan="6"><strong>Reports Submitted</strong></td>

<!--<td><strong>Target Female</strong></td>
<td><strong>Male</strong></td>
<td><strong>Female</strong></td>
<td><strong>Naration/Remarks</strong></td>-->

</tr>

<?php
if (!isset($_POST['generate']))
{ 

$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' order by activity asc";

$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
else
{
$location_id=$_POST['location_id'];
$report_period_id=$_POST['report_period_id'];

if ($location_id!=0 && $report_period_id==0)
{
$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' AND nrc_set_template.location_id='$location_id' GROUP BY nrc_set_template.activity";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
elseif ($location_id==0 && $report_period_id!=0)
{
$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' GROUP BY nrc_set_template.activity";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id!=0)
{
$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' AND nrc_set_template.location_id='$location_id' GROUP BY nrc_set_template.activity";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
else
{
$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' order by activity asc";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}



}


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
	
<td valign="top"><?php echo $rowsact->activity.' - <font color="#ff0000">'.$rowsact->location_name.'</font>'; ?>
<input type="hidden" name="set_template_id[]" value="<?php echo $set_template_id=$rowsact->set_template_id;?>">  
<!--[<a rel="facebox" href="view_history.php?set_template_id=<?php echo $set_template_id; ?>">View History</a>]-->
</td>




<td colspan="10" align="center">


<table width="100%" style="margin-left:-5px; margin-right:-5px;" border="0">

<tr align="center">
<td><strong><span class="rotate">Bi-weekly Report Period</span></strong></td>
<td width="4%"><strong>Target Ben. (Male)</strong></td>
<td><strong><span class="rotate">Achieved Ben. (Male)</span></strong></td>
<td><strong>% Male Achieved Ben.</strong></td>
<td><strong>Target Ben (Female)</strong></td>
<td><strong>Achieved Ben. (Female)</strong></td>
<td><strong>% Female Achieved Ben.</strong></td>
<td><strong>Target Beneficiary</strong></td>
<td><strong>Cumulative Benefeciary</strong></td>
<td><strong>%  Achieved Beneficiary</strong></td>
<td width="2%"><strong>Narration</strong></td>

</tr>
<?php 
$ttl_bi_male=0;
$ttl_bi_female=0;
$ttl_bi_achieved=0;


$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());




if (mysql_num_rows($resultsttl) > 0)
{
while ($rowsttl=mysql_fetch_object($resultsttl))
							  {
?>

<tr>

<td width="4%" align="center"><?php echo $rowsttl->period_from.' to '.$rowsttl->period_to.'';?></td>
<td width="4%" align="center"><?php echo $target_male=$rowsttl->target_male;?></td>
<td width="4%" align="center"><?php echo $bi_male=$rowsttl->bi_male;?></td>
<td width="4%" align="center"><?php echo number_format($bi_male_pers=$bi_male/$target_male*100,1).'%';?></td>
<td width="4%" align="center"><?php echo $target_female=$rowsttl->target_female;?></td>
<td width="4%" align="center"><?php echo $bi_female=$rowsttl->bi_female;?></td>
<td width="4%" align="center"><?php echo number_format($bi_female_pers=$bi_female/$target_female*100,1).'%';?></td>
<td width="4%" align="center"><?php echo $target=$rowsttl->target;?></td>
<td width="6%" align="center"><?php echo $bi_achieved=$rowsttl->bi_achieved;?></td>
<td width="12%" align="center"><?php echo number_format($bi_achieved_pers=$bi_achieved/$target*100,1).'%';?></td>
<td width="20%" valign="top"><?php echo $narration=$rowsttl->narrative;?></td>
</tr>

<?php

$ttl_bi_male=$ttl_bi_male+$bi_male;
$ttl_bi_female=$ttl_bi_female+$bi_female;
$ttl_bi_achieved=$ttl_bi_achieved+$bi_achieved;
}

?>
<tr align="center">
<td><strong>Totals</strong></td>
<td><strong><?php echo $target_male; ?></strong></td>
<td ><strong><?php echo $ttl_bi_male; ?></strong></td>
<td><strong><?php echo number_format($ttl_perc_bimale=$ttl_bi_male/$target_male*100,2).'%'; ?></strong></td>
<td><strong><?php echo $target_female; ?></strong></td>

<td ><strong><?php echo $ttl_bi_female; ?></strong></td>
<td><strong><?php echo number_format($ttl_perc_bifemale=$ttl_bi_female/$target_female*100,2).'%'; ?></strong></td>
<td><strong><?php echo $target; ?></strong></td>
<td><strong><?php echo $ttl_bi_achieved; ?></strong></td>
<td><strong><?php echo number_format($ttl_perc_achieved=$ttl_bi_achieved/$target*100,2).'%'; ?></strong></td>

<td></td>

</tr>
<?php 

}
else
{
echo "<font color='#ff0000'><i>Report Not Submitted!!</i></font>";
}
?>

</table></td>

<!--
<td align="center"><?php echo $target_male=$rowsact->set_target_male; ?></td>

<td align="center"><STRONG><?php

if (!isset($_POST['generate']))
{

$sqlttl="SELECT SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female,SUM(bi_achieved) as ttl_achieved FROM nrc_biweekly where set_template_id='$set_template_id' AND area_id='$sess_area_id' 
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
else
{
$location_id=$_POST['location_id'];
$report_period_id=$_POST['report_period_id'];

if ($location_id!=0 && $report_period_id==0)
{
$sqlttl="SELECT SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female,SUM(bi_achieved) as ttl_achieved FROM nrc_biweekly where set_template_id='$set_template_id'  AND area_id='$sess_area_id'  and  record_location_id='$location_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}
elseif ($location_id==0 && $report_period_id!=0)
{
$sqlttl="SELECT SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female,SUM(bi_achieved) as ttl_achieved FROM nrc_biweekly where set_template_id='$set_template_id' AND area_id='$sess_area_id' and  period_id='$report_period_id' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}

elseif ($location_id!=0 && $report_period_id!=0)
{
$sqlttl="SELECT SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female,SUM(bi_achieved) as ttl_achieved FROM nrc_biweekly where set_template_id='$set_template_id' AND area_id='$sess_area_id' and  period_id='$report_period_id' AND record_location_id='$location_id' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}
else
{
$sqlttl="SELECT SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female,SUM(bi_achieved) as ttl_achieved FROM nrc_biweekly where set_template_id='$set_template_id' AND area_id='$sess_area_id' 
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}


}

echo number_format($ttl_male=$rowsttl->ttl_male,0);



 ?></strong></td>

<td align="center"><?php //percentage male
echo number_format($ttl_male/$target_male*100,2);


?></td>
<td align="center"><?php echo $target_female=$rowsact->set_target_female; ?></td>
<td align="center"><strong><?php echo number_format($ttl_female=$rowsttl->ttl_female,0);; ?></strong></td>
<td align="center"><?php echo number_format($ttl_female/$target_female*100,2); ?></td>
<td align="center"><?php echo $target=$rowsact->set_target; ?></strong></td>
<td align="center"><strong><?php echo number_format($ttl_achieved=$rowsttl->ttl_achieved,0);
//echo $rowsact->target_female; ?></td>

<td align="center"><?php
echo number_format($ttl_achieved/$target*100,2);

 //echo $rowsact->target_female; ?></strong></td>-->

<!--<td><input type="text" name="bi_male[]" size="5"></td>
<td><input type="text" name="bi_female[]" size="5"></td>
<td><strong><textarea name="narration[]" cols="20" rows="2"></textarea></strong></td>-->
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
<hr color="#ff0000"/>
</td>


</tr>
<?php	
							  
							  
							  
							  }
							  }

?>
<!--<tr height="50"><td align="center"colspan="8">
<input type="submit" name="submit" value="Save">
<input type="hidden" name="add_biweekly" id="add_biweekly" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel">

</td></tr>-->

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

<!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("settlement_id","dontselect=0",">>Please Select Settlement");

 
  </SCRIPT>-->



