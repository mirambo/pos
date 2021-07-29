<?php
if (!isset($_POST['generate']))
{
$sqlsp="SELECT * FROM nrc_sub_project 
inner join nrc_project on nrc_project.project_id=nrc_sub_project.project_id
where nrc_project.status=1
GROUP BY sub_project_id ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}

else
{
$location_id=$_POST['country_id'];
$cc_id=$_POST['cc_id'];
$project_id=$_POST['project_id'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

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
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";

$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

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
ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
echo $num_rowsppg=mysql_num_rows($resultssp);

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
WHERE nrc_set_template.location_id=$location_id AND nrc_set_template.cc_id=$cc_id and nrc_project.status=1  GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc
";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
//filter subprojects when country and project is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.location_id=$location_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

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
ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);




}

//filter subprojects when only core competency  is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id==0 && $date_from=='' && $date_to=='')
{

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id  AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}

//filter subprojects when core competency and project is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
//filter subprojects when core competency and period is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{

$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id  AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());


echo $num_rowsppg=mysql_num_rows($resultssp);

}

//filter subprojects when project only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE   nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
//filter subprojects when project and period only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE   nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
//filter subprojects when period only is selected
elseif ( $location_id==0 && $cc_id==0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT * FROM nrc_sub_project 
inner join nrc_project on nrc_project.project_id=nrc_sub_project.project_id
where nrc_project.status=1
GROUP BY sub_project_id";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
//filter subprojects when country and project and competency is selected
elseif ( $location_id!=0 && $cc_id!=0 && $project_id!=0 && $date_from=='' && $date_to=='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.location_id=$location_id AND nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
//filter subprojects when country  and competency and period is selected
elseif ( $location_id!=0 && $cc_id!=0 && $project_id==0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.location_id=$location_id AND nrc_set_template.cc_id=$cc_id  AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
//filter subprojects when country  and project and period is selected
elseif ( $location_id!=0 && $cc_id==0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE nrc_set_template.location_id=$location_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
//filter subprojects when competency and project and period is selected
elseif ( $location_id==0 && $cc_id!=0 && $project_id!=0 && $date_from!='' && $date_to!='')
{
$sqlsp="SELECT nrc_set_template.set_template_id,nrc_sub_project.sub_project_id,nrc_cc.cc_name,nrc_project.status,nrc_sub_project.sub_project_name,nrc_sub_project.sub_project_code FROM nrc_set_template
INNER JOIN nrc_cc ON nrc_cc.cc_id=nrc_set_template.cc_id
INNER JOIN nrc_sub_project ON nrc_sub_project.sub_project_id=nrc_set_template.sub_project_id
INNER JOIN nrc_project ON nrc_project.project_id=nrc_set_template.project_id

WHERE  nrc_set_template.cc_id=$cc_id and nrc_project.project_id=$project_id AND nrc_project.status=1
GROUP BY nrc_sub_project.sub_project_id  ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
else
{
$sqlsp="SELECT * FROM nrc_sub_project 
inner join nrc_project on nrc_project.project_id=nrc_sub_project.project_id
where nrc_project.status=1
GROUP BY sub_project_id ORDER BY nrc_sub_project.sub_project_name asc";
$resultssp=mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());

echo $num_rowsppg=mysql_num_rows($resultssp);

}
}
?>