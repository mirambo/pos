<?php include ('includes/session.php'); ?>
<?php include ('Connections/fundmaster.php'); ?>
<link rel="stylesheet" href="stylepr.css" type="text/css" />
<?PHP 
$get_cc_id=$_GET['cc_id'];
$location_id=$_GET['location_id'];
$report_period_id=$_GET['report_period_id'];
$sub_proj_id=$_GET['sub_proj_id'];

 ?>

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
 <body onload="window.print();">
<table width="100%" border="0" class="table">
<tr  height="40" bgcolor="#FFFFff">
<td colspan="7" align="center"><img src="images/nrclogo.png"></td></tr>

<tr  height="20" bgcolor="#FFFFff">
<td colspan="7" align="center"><strong>NRC BI-WEEKLY REPORTS MANAGEMENT SYSTEM</strong></td></tr>
<tr  height="20" bgcolor="#FFFFCC">
<td colspan="7" align="center">
<?php
if ($country_id=='')
{?>

General Country Level Bi-Weekly Report
<?php

}
else
{




 ?>
<strong>Country : </strong><?php
if ($country_id==0)
{
echo "<font color='#ff0000'><i><strong>No Country Selected!!</strong></i></font>";
}
else
{
$sqlccn="SELECT * from nrc_country where country_id='$country_id';";
$resultsccn=mysql_query($sqlccn) or die ("Error $sqlccn.".mysql_error());
$rowsccn=mysql_fetch_array($resultsccn);


echo "<font color='#009900'><i><strong>".$country_name=$rowsccn['country_name'].'</strong></i></font>';
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




<strong>Project : </strong>
<?php
if ($project_id==0)
{
echo "<font color='#ff0000'><i><strong>No Project Selected!!</strong></i></font>";
}
else
{
$sqlccn="SELECT * from nrc_project where project_id='$project_id';";
$resultsccn=mysql_query($sqlccn) or die ("Error $sqlccn.".mysql_error());
$rowsccn=mysql_fetch_array($resultsccn);

echo "<font color='#009900'><i><strong>".$project_name=$rowsccn['project_name'].'</strong></i></font>';
}
 ?>
 
 
<strong>Period</strong>

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


<?php
}

 ?>

</td>

</tr>
</table>

<table width="100%" border="0" class="table">


<tr height="30" style="background:url(images/description.gif);">
<td align="center" width="10%"><strong>Sub Project</strong></td>

<td colspan="6" align="center"><strong>Activitites(Key Indicator)</strong></td>


</tr>

<?php
if ($location_id==0 && $report_period_id==0 && $sub_proj_id==0)
{ 
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
else
{

if ($location_id!=0 && $report_period_id==0 && $sub_proj_id==0)
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id  AND nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
}
elseif ($location_id==0 && $report_period_id!=0 && $sub_proj_id==0)
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

elseif ($location_id==0 && $report_period_id==0 && $sub_proj_id!=0)
{

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  and nrc_sub_project.sub_project_id='$sub_proj_id' GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id!=0 && $sub_proj_id==0)
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id==0 && $sub_proj_id!=0)
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  and nrc_sub_project.sub_project_id='$sub_proj_id' and nrc_set_template.location_id='$location_id' GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());


}

elseif ($location_id==0 && $report_period_id!=0 && $sub_proj_id!=0)
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  and nrc_sub_project.sub_project_id='$sub_proj_id' GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id!=0 && $sub_proj_id!=0)
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  and nrc_sub_project.sub_project_id='$sub_proj_id' and nrc_set_template.location_id='$location_id' GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
else

 {
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project on nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.area_id=$sess_area_id AND nrc_set_template.cc_id=$get_cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
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
<input type="hidden" name="sub_project_id" value="<?php echo $sub_proj_id2=$rowsp->sub_project_id;?>">
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
if ($location_id==0 && $report_period_id==0 && $sub_proj_id==0)
{ 

$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id2' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' order by activity asc";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
else
{

if ($location_id!=0 && $report_period_id==0 && $sub_proj_id==0)
{
$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id2' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' AND nrc_set_template.location_id='$location_id' order by activity asc";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
elseif ($location_id==0 && $report_period_id!=0 && $sub_proj_id==0)
{

$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id2' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' order by activity asc";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}

elseif ($location_id==0 && $report_period_id==0 && $sub_proj_id!=0)
{

$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' order by activity asc";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id!=0 && $sub_proj_id==0)
{
$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id2' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' AND nrc_set_template.location_id='$location_id' order by activity asc";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id==0 && $sub_proj_id!=0)
{

$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id2' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' AND nrc_set_template.location_id='$location_id' and nrc_set_template.sub_project_id='$sub_proj_id' order by activity asc";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}

elseif ($location_id==0 && $report_period_id!=0 && $sub_proj_id!=0)
{
$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' order by activity asc";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id!=0 && $sub_proj_id!=0)
{
$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$get_cc_id' 
AND nrc_set_template.area_id='$sess_area_id' AND nrc_set_template.location_id='$location_id' and nrc_set_template.sub_project_id='$sub_proj_id' order by activity asc";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
else
{
$sqlsact="SELECT * FROM nrc_set_template,nrc_location where nrc_set_template.location_id=nrc_location.location_id 
AND nrc_set_template.sub_project_id='$sub_proj_id2' AND nrc_set_template.cc_id='$get_cc_id' 
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
if ($location_id==0 && $report_period_id==0 && $sub_proj_id==0)
{ 

$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  
nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id 
AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());

}
else
{
$location_id=$_POST['location_id'];
$report_period_id=$_POST['report_period_id'];
$sub_proj_id=$_POST['sub_proj_id'];

if ($location_id!=0 && $report_period_id==0 && $sub_proj_id==0)
{
$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  
nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id 
AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id' AND nrc_biweekly.record_location_id='$location_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());

}
elseif ($location_id==0 && $report_period_id!=0 && $sub_proj_id==0)
{

$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  
nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id 
AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id' AND nrc_biweekly.period_id='$report_period_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
}

elseif ($location_id==0 && $report_period_id==0 && $sub_proj_id!=0)
{

$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  
nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id 
AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id' AND nrc_biweekly.sub_project_id='$sub_proj_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());


}

elseif ($location_id!=0 && $report_period_id!=0 && $sub_proj_id==0)
{
$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  
nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id 
AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id' AND nrc_biweekly.period_id='$report_period_id' AND nrc_biweekly.record_location_id='$location_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id==0 && $sub_proj_id!=0)
{
$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  
nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id 
AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id' AND nrc_biweekly.sub_project_id='$sub_proj_id' AND nrc_biweekly.record_location_id='$location_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());

}

elseif ($location_id==0 && $report_period_id!=0 && $sub_proj_id!=0)
{
$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  
nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id 
AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id' AND nrc_biweekly.period_id='$report_period_id' AND nrc_biweekly.sub_project_id='$sub_proj_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());

}

elseif ($location_id!=0 && $report_period_id!=0 && $sub_proj_id!=0)
{
$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  
nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id 
AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id' AND nrc_biweekly.record_location_id='$location_id' 
AND nrc_biweekly.period_id='$report_period_id' AND nrc_biweekly.sub_project_id='$sub_proj_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());

}
else
{
$sqlttl="SELECT * FROM nrc_biweekly,nrc_set_template,nrc_report_period  where  
nrc_report_period.period_id=nrc_biweekly.period_id AND nrc_set_template.set_template_id=nrc_biweekly.set_template_id 
AND nrc_biweekly.set_template_id='$set_template_id' AND nrc_biweekly.area_id='$sess_area_id'";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());

}



}



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

</table>
</td>


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
							  

?>
<!--<tr height="50"><td align="center"colspan="8">
<input type="submit" name="submit" value="Save">
<input type="hidden" name="add_biweekly" id="add_biweekly" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel">

</td></tr>-->

<?php 
}
else
{?>

<?php
}

?>

</table>
</form>









</table>
</body>