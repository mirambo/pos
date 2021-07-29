<?php include ('includes/session.php'); ?>
<?php include ('Connections/fundmaster.php'); 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=NRC_Bi-Weekly_Location_Level_Reports.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<link rel="stylesheet" href="<?php echo $base_url?>stylepr.css" type="text/css" />
<?PHP 
$location_id=$_GET['location_id'];
$cc_id=$_GET['cc_id'];
$project_id=$_GET['project_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
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


<tr  height="20" bgcolor="#FFFFff">
<td colspan="11" align="center"><strong>NRC BI-WEEKLY REPORTS MANAGEMENT SYSTEM</strong></td></tr>
<tr  height="20" bgcolor="#FFFFCC">
<td colspan="11" align="center">
<?php
if ($location_id=='')
{?>
General Location Level Bi-Weekly Report
<?php

}
else
{




 ?>
<strong>Location : </strong><?php
if ($location_id==0)
{
echo "<font color='#ff0000'><i><strong>No Location Selected!!</strong></i></font>";
}
else
{
$sqlccn="SELECT * from nrc_location where location_id='$location_id';";
$resultsccn=mysql_query($sqlccn) or die ("Error $sqlccn.".mysql_error());
$rowsccn=mysql_fetch_array($resultsccn);


echo "<font color='#009900'><i><strong>".$country_name=$rowsccn['location_name'].'</strong></i></font>';
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

echo "<font color='#009900'><i><strong>".$project_code=$rowsccn['project_code'].' - '.$project_name=$rowsccn['project_name'].'</strong></i></font>';
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
<td align="center" width="30%"><strong>Sub Project</strong></td>

<td colspan="6" align="center"><strong>Activitites(Key Indicator)</strong></td>
</tr>

<?php
if ($location_id=='')
{
$sqlsp="SELECT * FROM nrc_sub_project 
inner join nrc_project on nrc_project.project_id=nrc_sub_project.project_id
where nrc_project.status=1
GROUP BY sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

else
{


//filter subprojects when everything is selected
if ( $location_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{

/*$sqlsp="SELECT nrc_project.project_id, nrc_sub_project.sub_project_name, nrc_sub_project.sub_project_code, nrc_subprojectvslocation.sub_project_id, nrc_location.area_id, nrc_location.location_id
FROM nrc_set_template,nrc_cc,nrc_project, nrc_sub_project, nrc_subprojectvslocation, nrc_location
WHERE nrc_set_template.sub_project_id=nrc_sub_project.sub_project_id AND nrc_sub_project.project_id = nrc_project.project_id AND nrc_set_template.cc_id=nrc_cc.cc_id
AND nrc_subprojectvslocation.sub_project_id = nrc_sub_project.sub_project_id
AND nrc_subprojectvslocation.location_id = nrc_location.location_id
AND nrc_location.location_id=$location_id
AND nrc_project.project_id=$project_id
AND nrc_cc.cc_id =$cc_id
GROUP BY nrc_sub_project.sub_project_id";*/

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.location_id=$location_id AND nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";

$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when location only is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id, nrc_sub_project.sub_project_id,nrc_project.status, nrc_sub_project.sub_project_name, nrc_sub_project.sub_project_code
FROM nrc_set_template
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id = nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.location_id = $location_id and nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id
ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country and core competency is selected
elseif ( $location_id!=0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{

/*$sqlsp="SELECT nrc_project.project_id, nrc_sub_project.sub_project_name, nrc_sub_project.sub_project_code, nrc_subprojectvslocation.sub_project_id, nrc_location.area_id, nrc_location.location_id
FROM nrc_set_template,nrc_cc,nrc_project, nrc_sub_project, nrc_subprojectvslocation, nrc_location
WHERE nrc_set_template.sub_project_id=nrc_sub_project.sub_project_id AND nrc_sub_project.project_id = nrc_project.project_id AND nrc_set_template.cc_id=nrc_cc.cc_id
AND nrc_subprojectvslocation.sub_project_id = nrc_sub_project.sub_project_id
AND nrc_subprojectvslocation.location_id = nrc_location.location_id
AND nrc_location.location_id=$location_id
AND nrc_cc.cc_id =$cc_id
GROUP BY nrc_sub_project.sub_project_id
";*/
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.location_id=$location_id AND nrc_set_template.cc_id=$cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id
";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country and project is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.location_id=$location_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

//filter subprojects when country and period is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlsp="SELECT nrc_set_template.set_template_id, nrc_sub_project.sub_project_id,nrc_project.status, nrc_sub_project.sub_project_name, nrc_sub_project.sub_project_code
FROM nrc_set_template
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id = nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.location_id = $location_id and nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id
ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());




}

//filter subprojects when only core competency  is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id  AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

//filter subprojects when core competency and project is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when core competency and period is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id  AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());




}

//filter subprojects when project only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE   nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when project and period only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE   nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when period only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT * FROM nrc_sub_project 
inner join nrc_project on nrc_project.project_id=nrc_sub_project.project_id
where nrc_project.status=1
GROUP BY sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country and project and competency is selected
elseif ( $location_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.location_id=$location_id AND nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country  and competency and period is selected
elseif ( $location_id!=0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.location_id=$location_id AND nrc_set_template.cc_id=$cc_id  AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country  and project and period is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.location_id=$location_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when competency and project and period is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
else
{
$sqlsp="SELECT * FROM nrc_sub_project GROUP BY sub_project_id";
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

<td valign="top"><?php echo $rowsp->sub_project_code.' - '.$rowsp->sub_project_name;


$sub_proj_id=$rowsp->sub_project_id;?>
<input type="hidden" name="sub_project_id" value="<?php echo $sub_proj_id=$rowsp->sub_project_id;?>">
</td>

<td colspan="6" align="center">

<table width="100%"  border="1" class="table">
<tr align="center">
<td width="50%"><strong>Activity Name</strong></td>

<td><strong>Target Male</strong></td>
<td><strong>Male Achieved</strong></td>
<td><strong>% Achievement</strong></td>
<td><strong>Target Female</strong></td>
<td><strong>Female Achieved</strong></td>
<td><strong>% Achievement</strong></td>
<td><strong>Total Target</strong></td>
<td><strong>Total Achieved</strong></td>
<td><strong>% Achievement</strong></td>
<!--<td><strong>Target Female</strong></td>
<td><strong>Male</strong></td>
<td><strong>Female</strong></td>
<td><strong>Naration/Remarks</strong></td>-->

</tr>

<?php
if ($location_id=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
else
{


//filter activities when everything is selected
if ( $location_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{



$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id' and location_id='$location_id' and project_id='$project_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
//filter activities when country only is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' and location_id='$location_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}

//filter activities when country and core competency is selected
elseif ( $location_id!=0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id' AND location_id='$location_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
//filter activities when country and project is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'  AND location_id='$location_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}

//filter activities when country and period is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND location_id='$location_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when only core competency is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
//filter activities when core competency and project is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when core competency and period is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}

//filter activities when project only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when project and period only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when p period only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when country and core competency and project is selected
elseif ( $location_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id'  AND location_id='$location_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
//filter activities when country period and core competency only is selected
elseif ( $location_id!=0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id' AND location_id='$location_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when country period and project only is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND location_id='$location_id' ";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
// competency project and period only selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id' ";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}

//if nothing selected but button clicked
else
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'";
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
	
<td ><?php echo $rowsact->activity.' '; ?>
<input type="hidden" name="set_template_id[]" value="<?php echo $set_template_id=$rowsact->set_template_id;?>">  

</td>
<td align="center"><?php echo $target_male=$rowsact->target_male; ?></td>

<td align="center">

<?php 

if ($location_id=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
else
{


if ($location_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}
elseif ($location_id!=0 && $cc_id==0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}
elseif ( $location_id!=0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);


}
elseif ( $location_id!=0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
// when only core competency is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
// when only core competency and project is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//when core competency and period is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}

//bi- weekly when project only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);


}
//when core project and period is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//when period is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//option when county , core comptency andproject is selected
elseif ($location_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}
//when period country and core competency is selected
elseif ( $location_id!=0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//when period country and project is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//when period competency and project is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}

//if nothing is selected but button clicked
else
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}


}

 
 echo number_format($ttl_male=$rowsttl->ttl_male,0);
?>




 
 
 

 </strong></td>

<td align="center"><?php //percentage male
echo number_format($ttl_male/$target_male*100,2);


?></td>
<td align="center"><?php echo $target_female=$rowsact->target_female; ?></td>
<td align="center"><?php echo number_format($ttl_female=$rowsttl->ttl_female,0);; ?></td>
<td align="center"><?php echo number_format($ttl_female/$target_female*100,2); ?></td>
<td align="center"><?php echo $target=$rowsact->target; ?></strong></td>
<td align="center"><?php 
echo $ttl_achieved=$rowsttl->ttl_achieved;
//echo $rowsact->target_female; ?></td>

<td align="center"><?php
echo number_format($ttl_achieved/$target*100,2);

 //echo $rowsact->target_female; ?></td>

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

</td>


</tr>
<?php	

							  }
							  }

?>
<!--<tr height="50"><td align="center"colspan="8">
<input type="submit" name="submit" value="Save">
<input type="hidden" name="add_biweekly" id="add_biweekly" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel">

</td></tr>
<tr height="50"><td align="center"colspan="8">
<input type="submit" name="submit" value="Save">
<input type="hidden" name="add_biweekly" id="add_biweekly" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel">

</td></tr>-->

</table>

</body>