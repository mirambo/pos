<?php include ('includes/session.php'); ?>
<?php include ('Connections/fundmaster.php'); ?>
<link rel="stylesheet" href="stylepr.css" type="text/css" />


		
<?PHP $country_id=$_GET['country_id'];
$cc_id=$_GET['cc_id'];
$project_id=$_GET['project_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
 ?>
 

 <body >
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

<span style="float:left;margin:auto;"><strong>General Country Level Bi-Weekly Graphical Report </strong></span>
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
<!--<a  style="float:right; margin-right:200px; margin-left:0px;"><img src="images/print_icon.gif" onClick="window.print()"></a>-->
<div style="background:url(images/print_icon.gif) no-repeat; width:50px; height:30px; float:right"   onClick="window.print()"></div>
</td>

</tr>
</table>





























<table width="100%" border="0" class="table">



<tr height="30" style="background:url(images/description.gif);">
<td align="center" width="20%"><strong>Sub Project</strong></td>

<td colspan="3" align="center" width="30%"><strong>Progress Bar [<img src="images/green.jpg" width="15" height="15"/>Achieved <img src="images/blue.jpg" width="15" height="15"/> Target]</strong></td>
</tr>

<!--<tr height="30"bgcolor="#cccccc">
<td align="center" width="30%"><strong></strong></td>

<!--<td  align="center" width="35%"><strong>Activitites Name</strong></td>
<td  align="center" width="60%"><strong>Progress Bar [<img src="images/green.jpg" width="15" height="15"/>Achieved <img src="images/blue.jpg" width="15" height="15"/> Target]</strong></td>
</tr>-->

<?php
if ( $country_id==0 && $cc_id==0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT * FROM nrc_sub_project 
inner join nrc_project on nrc_project.project_id=nrc_sub_project.project_id
where nrc_project.status=1
GROUP BY sub_project_id ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

else
{


//filter subprojects when everything is selected
if ( $country_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{

/*$sqlsp="SELECT nrc_project.project_id, nrc_sub_project.sub_project_name, nrc_sub_project.sub_project_code, nrc_subprojectvslocation.sub_project_id, nrc_location.area_id, nrc_location.country_id
FROM nrc_set_template,nrc_cc,nrc_project, nrc_sub_project, nrc_subprojectvslocation, nrc_location
WHERE nrc_set_template.sub_project_id=nrc_sub_project.sub_project_id AND nrc_sub_project.project_id = nrc_project.project_id AND nrc_set_template.cc_id=nrc_cc.cc_id
AND nrc_subprojectvslocation.sub_project_id = nrc_sub_project.sub_project_id
AND nrc_subprojectvslocation.country_id = nrc_location.country_id
AND nrc_location.country_id=$country_id
AND nrc_project.project_id=$project_id
AND nrc_cc.cc_id =$cc_id
GROUP BY nrc_sub_project.sub_project_id";*/

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.country_id=$country_id AND nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";

$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when location only is selected
elseif ( $country_id!=0 && $cc_id==0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id, nrc_sub_project.sub_project_id,nrc_project.status, nrc_sub_project.sub_project_name, nrc_sub_project.sub_project_code
FROM nrc_set_template
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id = nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.country_id =$country_id and nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id
ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country and core competency is selected
elseif ( $country_id!=0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{

/*$sqlsp="SELECT nrc_project.project_id, nrc_sub_project.sub_project_name, nrc_sub_project.sub_project_code, nrc_subprojectvslocation.sub_project_id, nrc_location.area_id, nrc_location.country_id
FROM nrc_set_template,nrc_cc,nrc_project, nrc_sub_project, nrc_subprojectvslocation, nrc_location
WHERE nrc_set_template.sub_project_id=nrc_sub_project.sub_project_id AND nrc_sub_project.project_id = nrc_project.project_id AND nrc_set_template.cc_id=nrc_cc.cc_id
AND nrc_subprojectvslocation.sub_project_id = nrc_sub_project.sub_project_id
AND nrc_subprojectvslocation.country_id = nrc_location.country_id
AND nrc_location.country_id=$country_id
AND nrc_cc.cc_id =$cc_id
GROUP BY nrc_sub_project.sub_project_id
";*/
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.country_id=$country_id AND nrc_set_template.cc_id=$cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc
";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country and project is selected
elseif ( $country_id!=0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.country_id=$country_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

//filter subprojects when country and period is selected
elseif ( $country_id!=0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlsp="SELECT nrc_set_template.set_template_id, nrc_sub_project.sub_project_id,nrc_project.status, nrc_sub_project.sub_project_name, nrc_sub_project.sub_project_code
FROM nrc_set_template
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id = nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id
WHERE nrc_set_template.country_id = $country_id and nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id
ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());




}

//filter subprojects when only core competency  is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id  AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}

//filter subprojects when core competency and project is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when core competency and period is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id  AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());




}

//filter subprojects when project only is selected
elseif ( $country_id==0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE   nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when project and period only is selected
elseif ( $country_id==0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE   nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when period only is selected
elseif ( $country_id==0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT * FROM nrc_sub_project 
inner join nrc_project on nrc_project.project_id=nrc_sub_project.project_id
where nrc_project.status=1
GROUP BY sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country and project and competency is selected
elseif ( $country_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.country_id=$country_id AND nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country  and competency and period is selected
elseif ( $country_id!=0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.country_id=$country_id AND nrc_set_template.cc_id=$cc_id  AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when country  and project and period is selected
elseif ( $country_id!=0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.country_id=$country_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
//filter subprojects when competency and project and period is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

}
else
{
$sqlsp="SELECT * FROM nrc_sub_project 
inner join nrc_project on nrc_project.project_id=nrc_sub_project.project_id
where nrc_project.status=1
GROUP BY sub_project_id ORDER BY nrc_sub_project.sub_project_name asc";
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
echo '<tr  bgcolor="#C0D7E5" height="15"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr  bgcolor="#FFFFCC" height="15"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" 
              >';
}
	?>

<td valign="top" style="padding-top:0px;"><?php echo $rowsp->sub_project_name;


$sub_proj_id=$rowsp->sub_project_id;?>
<input type="hidden" name="sub_project_id" value="<?php echo $sub_proj_id=$rowsp->sub_project_id;?>">
</td>

<td colspan="6" align="center">

<table width="100%"  border="0" >
<!--<tr align="center">
<td width="50%"><strong>Activity Name</strong></td>

<!--<td><strong>Target Male</strong></td>
<td><strong>Male Achieved</strong></td>
<td><strong>% Achievement</strong></td>
<td><strong>Target Female</strong></td>
<td><strong>Female Achieved</strong></td>
<td><strong>% Achievement</strong></td>-->


<!--<td><strong>Male</strong></td>
<td><strong>Female</strong></td>
<td><strong>Naration/Remarks</strong></td>

</tr>-->

<?php
if ($country_id=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
else
{


//filter activities when everything is selected
if ( $country_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{



$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id' and country_id='$country_id' and project_id='$project_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
//filter activities when country only is selected
elseif ( $country_id!=0 && $cc_id==0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' and country_id='$country_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}

//filter activities when country and core competency is selected
elseif ( $country_id!=0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id' AND country_id='$country_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
//filter activities when country and project is selected
elseif ( $country_id!=0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'  AND country_id='$country_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}

//filter activities when country and period is selected
elseif ( $country_id!=0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND country_id='$country_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when only core competency is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
//filter activities when core competency and project is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when core competency and period is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}

//filter activities when project only is selected
elseif ( $country_id==0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when project and period only is selected
elseif ( $country_id==0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when p period only is selected
elseif ( $country_id==0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when country and core competency and project is selected
elseif ( $country_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id'  AND country_id='$country_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());

}
//filter activities when country period and core competency only is selected
elseif ( $country_id!=0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND nrc_set_template.cc_id='$cc_id' AND country_id='$country_id'";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
//filter activities when country period and project only is selected
elseif ( $country_id!=0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsact="SELECT * FROM nrc_set_template where sub_project_id='$sub_proj_id' AND country_id='$country_id' ";
$resultsact=mysql_query($sqlsact) or die ("Error $sqlsact.".mysql_error());
}
// competency project and period only selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
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
$grnd_ttl_target=0;
$grnd_ttl_achieved=0;
$real_grnd_ttl_target=0;
if (mysql_num_rows($resultsact) > 0)
{
$RowCounter=0;
while ($rowsact=mysql_fetch_object($resultsact))
							  {
							  
	?>
	
<?php 
$mylocation=$rowsact->location_id;   
$query1="SELECT * from nrc_location where location_id=$mylocation ";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

//echo $location=$rows1->location_name; 
//echo $rowsact->activity.' - - - <font color="#ff0000">'.$location=$rows1->location_name.'</font>';  



?>
<input type="hidden" name="set_template_id[]" value="<?php $set_template_id=$rowsact->set_template_id;?>">  
<!--[<a rel="facebox" href="view_history.php?set_template_id=<?php echo $set_template_id; ?>">View History</a>]-->





<!--<td align="center"><?php //percentage male
echo number_format($ttl_male/$target_male*100,2);


?></td>
<td align="center"><?php echo $target_female=$rowsact->target_female; ?></td>
<td align="center"><?php echo number_format($ttl_female=$rowsttl->ttl_female,0);; ?></td>
<td align="center"><?php echo number_format($ttl_female/$target_female*100,2); ?></td>-->

<?php 

if ($country_id=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
else
{
$country_id=$_GET['country_id'];
$cc_id=$_GET['cc_id'];
$project_id=$_GET['project_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

if ($country_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}
elseif ($country_id!=0 && $cc_id==0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}
elseif ( $country_id!=0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);


}
elseif ( $country_id!=0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
// when only core competency is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
// when only core competency and project is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//when core competency and period is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}

//bi- weekly when project only is selected
elseif ( $country_id==0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);


}
//when core project and period is selected
elseif ( $country_id==0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//when period is selected
elseif ( $country_id==0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//option when county , core comptency andproject is selected
elseif ($country_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id'  
GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);

}
//when period country and core competency is selected
elseif ( $country_id!=0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//when period country and project is selected
elseif ( $country_id!=0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{

$sqlttl="SELECT SUM(bi_achieved) as ttl_achieved,SUM(bi_male) as ttl_male,SUM(bi_female) as ttl_female FROM nrc_biweekly where set_template_id='$set_template_id' AND trans_date >='$date_from' AND trans_date <='$date_to' GROUP BY set_template_id";
$resultsttl=mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
}
//when period competency and project is selected
elseif ( $country_id==0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
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

 

 $target=$rowsact->target;
 $real_target=$rowsact->target;

?>


 </strong>
<?php 


 $ttl_achieved=$rowsttl->ttl_achieved;

if ($ttl_achieved=='')
{
$ttl_achieved=0;
}
else
{

$ttl_achieved;
}
//echo $ttl_achieved
//echo $rowsact->target_female; ?>


<?php
//echo number_format($achieved_perc=$ttl_achieved/$target*100,0);

 //echo $rowsact->target_female; ?>



<!--<div style="width:<?php echo $achieved_perc ?>px; background:#ff0000; height:20px;"></div>-->

<?php 



$target_dif=$target-$ttl_achieved;
?>





<!--<td><input type="text" name="bi_female[]" size="5"></td>
<td><strong><textarea name="narration[]" cols="20" rows="2"></textarea></strong></td>-->
<tr>
<?php

$grnd_ttl_target=$grnd_ttl_target+$target;
$grnd_ttl_target=$grnd_ttl_target+$target;
$real_grnd_ttl_target=$real_grnd_ttl_target+$target;
$grnd_ttl_achieved=$grnd_ttl_achieved+$ttl_achieved;
$grnd_target_dif=$grnd_ttl_target-$grnd_ttl_achieved;



if ($grnd_ttl_target>500)
{
$grnd_ttl_target=500;

}
else
{
$grnd_ttl_target;
}


if ($grnd_ttl_achieved>500)
{
$grnd_ttl_achieved=500;

}
else
{
$grnd_ttl_achieved;
}



}
?>

<tr><td valign="top"><?php //echo $grnd_ttl_achieved; 


?><img src="images/green.jpg" style="width:<?php echo  $grnd_ttl_achieved; ?>px; height:40px; position:relative; margin-top:0px; margin-right:0px;" /><img src="images/blue.jpg" style="width:<?php echo  $grnd_target_dif; ?>px; height:40px; position:relative; margin-top:0px; margin-left:0px;" />

<span style="float:right; margin-right:100px;">(<?php echo $grnd_ttl_achieved; ?> of <?php echo $real_grnd_ttl_target;?>)</span></td></tr>
<?php
}

else
{
?>
<td colspan="7">No Allocation!!</td>
<?php

}

?>





</table>
<!--<hr color="#ff0000"/>-->
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