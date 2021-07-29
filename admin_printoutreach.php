<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$university=$_GET['institute_id'];
$universityx=$_GET['institute_idx'];
$universityy=$_GET['institute_idy'];
$diseasex=$_GET['disease_idx'];
$diseasex=$_GET['disease_idx'];
$date_from=$_GET['date_from'];
$date_fromy=$_GET['date_fromy'];
$date_to=$_GET['date_to'];
$date_toy=$_GET['date_toy'];
?>
<title>EACO Online Data Collection Portal - Outreach Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

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



<?php 
//Institute Only selected
if ($university)
{
?>
<table width="100%" border="0">

<tr height="30"> <td colspan="10" align="center"><img src="images/logoeaco.jpg"></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>EACO DATA COLLECTION PORTAL</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>Outreach Record Report</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2><?php 
  $queryinstf="SELECT * FROM insitution where institution_id='$university'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->institution_name;
  
  
  ?></H2></td></tr>



</table>


<table width="100%" border="0" class="table">
 
  
  <!--<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="7"><strong>Basic Details</strong></td>
    
    
    <td width="50" align="center" colspan="3"><strong>Diagnosis Records</strong></td>
	
    <td colspan="3" align="center"><strong>Sergery / Operations</strong></td>
   
	<td width="50" align="center" colspan="5"><strong></strong></td>
	
   
    
    
    </tr>
	-->
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="11"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="10"><strong>Diagnostics Records</strong></td>
	
    <!--<td colspan="3" align="center"><strong>Cataract Sergery</strong></td>
   
	<td width="50" align="center" colspan="2"><strong>Blindness</strong></td>
	
    <td align="center" colspan="3"><strong>Refferals</strong></td>-->
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="70"><strong>Istitution of Origin</strong></td>
    <td align="center" width="70"><strong>From</strong></td>
    <td align="center" width="70"><strong>To</strong></td>
	<td align="center" width="100"><strong>Location</strong></td>
    <td align="center" ><strong>Faculty Male</strong></td>
	<td align="center" ><strong>Faculty Female</strong></td>
	<td align="center" ><strong>Resident Male</strong></td>
	<td align="center" ><strong>Resident Female</strong></td>
	<td align="center" ><strong>Patient Male</strong></td>
	<td align="center" ><strong>Patient Female</strong></td>
	<td align="center" ><strong>Patient Child</strong></td>
    
    <td align="center" width="100"><strong>Disease Name</strong></td>
	<td align="center"><strong>Total Patients </strong></td>
	<td align="center"><strong>Male Patients</strong></td>
	<td align="center"><strong>Female Patients</strong></td>
	<td align="center"><strong>Children Patients</strong></td>
 
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE
 outreach_record.outreach_record_id=diagnosis.outreach_record_id AND diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id and outreach_record.institution_id='$university' ";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
 
 
 ?> <td ><?php echo $rows->institution_name; ?></td>
	<td align="center"><?php echo $rows->date_from; ?></td>
	<td align="center" ><?php echo $rows->date_to; ?></td>
	<td ><?php echo $rows->location; ?></td>
	<td align="center" ><?php echo $fac_male=$rows->fac_male; ?></td>
	<td align="center" ><?php echo $fac_female=$rows->fac_female; ?></td>
	<td align="center" ><?php echo $res_male=$rows->res_male; ?></td>
	<td align="center" ><?php echo $res_female=$rows->res_female; ?></td>
	<td align="center" ><?php echo $pat_male=$rows->pat_male; ?></td>
	<td align="center" ><?php echo $pat_female=$rows->pat_female; ?></td>
	<td align="center" ><?php echo $pat_child=$rows->pat_child; ?></td>
	<td ><?php echo $disease_name=$rows->disease_name; ?></td>
	<td align="center" ><strong><?php echo $total_pat=$rows->total_pat; ?></strong></td>
	<td align="center" ><?php echo $male_pat=$rows->male_pat; ?></td>
	<td align="center" ><?php echo $female_pat=$rows->female_pat; ?></td>
	<td align="center" ><?php echo $child_pat=$rows->child_pat; ?></td>
	
    </tr>
  <?php 
  $ttl_fac_male=$ttl_fac_male+$fac_male;
  $ttl_fac_female=$ttl_fac_female+$fac_female;
  $ttl_res_male=$ttl_res_male+$res_male;
  $ttl_res_female=$ttl_res_female+$res_female;
  $ttl_total_pat=$ttl_total_pat+$total_pat;
  $ttl_pat_male=$ttl_pat_male+$pat_male;
  $ttl_pat_female=$ttl_pat_female+$pat_female;
  $ttl_pat_child=$ttl_pat_child+$pat_child;
  $ttl_male_pat=$ttl_male_pat+$male_pat;
  $ttl_female_pat=$ttl_female_pat+$female_pat;
  $ttl_child_pat=$ttl_child_pat+$child_pat;
 
  }
  ?>
 <tr height="40" bgcolor="#FFFFCC">
	<td align="center" width="70" colspan="4"><strong>Totals</strong></td>
   
    <td align="center" ><strong><?php echo $ttl_fac_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_fac_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_child;  ?></strong></td>
    
    <td align="center" width="100"><strong></strong></td>
	<td align="center"><strong><?php echo  $ttl_total_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_male_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_female_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_child_pat;  ?></strong></td>
   
	 <!--<td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>
	<td align="center"><strong>Unilateral</strong></td>
	<td align="center"><strong>Billateral</strong></td>
    <td align="center"><strong>Male</strong></td>
    <td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>-->
    
    </tr> 
	<table width="100%">
	<tr height="60"><td colspan="16"align="right"> <i><strong>Printed by <?php  
$sqltc="select users.f_name,users.l_name,user_group.user_group_name,insitution.institution_name from users,user_group,insitution where users.user_group_id=user_group.user_group_id and users.institution_id=insitution.institution_id and users.user_id='$user_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc); 
echo $rowstc->f_name; ?>&nbsp;<?php echo $rowstc->l_name;
?> - <?php echo $rowstc->institution_name;  ?></strong></i></td></tr>
	</table>
  <?php 
  
  }
  
  else 
  
  {
  ?>
  
  <tr height="30"><td colspan="18" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
<?php 

}


if ($disease)
{
?>
<table width="100%" border="0">

<tr height="30"> <td colspan="10" align="center"><img src="images/logoeaco.jpg"></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>EACO DATA COLLECTION PORTAL</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>Outreach Record Report</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>Disease : <?php 
  $queryinstf="SELECT * FROM diseases where disease_id='$disease'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->disease_name;
  
  
  ?></H2></td></tr>



</table>


<table width="100%" border="0" class="table">
 
  
  <!--<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="7"><strong>Basic Details</strong></td>
    
    
    <td width="50" align="center" colspan="3"><strong>Diagnosis Records</strong></td>
	
    <td colspan="3" align="center"><strong>Sergery / Operations</strong></td>
   
	<td width="50" align="center" colspan="5"><strong></strong></td>
	
   
    
    
    </tr>
	-->
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="11"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="10"><strong>Diagnostics Records</strong></td>
	
    <!--<td colspan="3" align="center"><strong>Cataract Sergery</strong></td>
   
	<td width="50" align="center" colspan="2"><strong>Blindness</strong></td>
	
    <td align="center" colspan="3"><strong>Refferals</strong></td>-->
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="70"><strong>Istitution of Origin</strong></td>
    <td align="center" width="70"><strong>From</strong></td>
    <td align="center" width="70"><strong>To</strong></td>
	<td align="center" width="100"><strong>Location</strong></td>
    <td align="center" ><strong>Faculty Male</strong></td>
	<td align="center" ><strong>Faculty Female</strong></td>
	<td align="center" ><strong>Resident Male</strong></td>
	<td align="center" ><strong>Resident Female</strong></td>
	<td align="center" ><strong>Patient Male</strong></td>
	<td align="center" ><strong>Patient Female</strong></td>
	<td align="center" ><strong>Patient Child</strong></td>
    
    <td align="center" width="100"><strong>Disease Name</strong></td>
	<td align="center"><strong>Total Patients </strong></td>
	<td align="center"><strong>Male Patients</strong></td>
	<td align="center"><strong>Female Patients</strong></td>
	<td align="center"><strong>Children Patients</strong></td>
 
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE
 outreach_record.outreach_record_id=diagnosis.outreach_record_id AND diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id and diagnosis.disease_id='$disease'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
 
 
 ?> <td ><?php echo $rows->institution_name; ?></td>
	<td align="center"><?php echo $rows->date_from; ?></td>
	<td align="center" ><?php echo $rows->date_to; ?></td>
	<td ><?php echo $rows->location; ?></td>
	<td align="center" ><?php echo $fac_male=$rows->fac_male; ?></td>
	<td align="center" ><?php echo $fac_female=$rows->fac_female; ?></td>
	<td align="center" ><?php echo $res_male=$rows->res_male; ?></td>
	<td align="center" ><?php echo $res_female=$rows->res_female; ?></td>
	<td align="center" ><?php echo $pat_male=$rows->pat_male; ?></td>
	<td align="center" ><?php echo $pat_female=$rows->pat_female; ?></td>
	<td align="center" ><?php echo $pat_child=$rows->pat_child; ?></td>
	<td ><?php echo $disease_name=$rows->disease_name; ?></td>
	<td align="center" ><strong><?php echo $total_pat=$rows->total_pat; ?></strong></td>
	<td align="center" ><?php echo $male_pat=$rows->male_pat; ?></td>
	<td align="center" ><?php echo $female_pat=$rows->female_pat; ?></td>
	<td align="center" ><?php echo $child_pat=$rows->child_pat; ?></td>
	
    </tr>
  <?php 
  $ttl_fac_male=$ttl_fac_male+$fac_male;
  $ttl_fac_female=$ttl_fac_female+$fac_female;
  $ttl_res_male=$ttl_res_male+$res_male;
  $ttl_res_female=$ttl_res_female+$res_female;
  $ttl_total_pat=$ttl_total_pat+$total_pat;
  $ttl_pat_male=$ttl_pat_male+$pat_male;
  $ttl_pat_female=$ttl_pat_female+$pat_female;
  $ttl_pat_child=$ttl_pat_child+$pat_child;
  $ttl_male_pat=$ttl_male_pat+$male_pat;
  $ttl_female_pat=$ttl_female_pat+$female_pat;
  $ttl_child_pat=$ttl_child_pat+$child_pat;
 
  }
  ?>
 <tr height="40" bgcolor="#FFFFCC">
	<td align="center" width="70" colspan="4"><strong>Totals</strong></td>
   
    <td align="center" ><strong><?php echo $ttl_fac_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_fac_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_child;  ?></strong></td>
    
    <td align="center" width="100"><strong></strong></td>
	<td align="center"><strong><?php echo  $ttl_total_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_male_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_female_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_child_pat;  ?></strong></td>
   
	 <!--<td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>
	<td align="center"><strong>Unilateral</strong></td>
	<td align="center"><strong>Billateral</strong></td>
    <td align="center"><strong>Male</strong></td>
    <td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>-->
    
    </tr> 
	<table width="100%">
	<tr height="60"><td colspan="16"align="right"> <i><strong>Printed by <?php  
$sqltc="select users.f_name,users.l_name,user_group.user_group_name,insitution.institution_name from users,user_group,insitution where users.user_group_id=user_group.user_group_id and users.institution_id=insitution.institution_id and users.user_id='$user_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc); 
echo $rowstc->f_name; ?>&nbsp;<?php echo $rowstc->l_name;
?> - <?php echo $rowstc->institution_name;  ?></strong></i></td></tr>
	</table>
  <?php 
  
  }
  
  else 
  
  {
  ?>
  
  <tr height="30"><td colspan="18" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
<?php 

}
if ($date_from && $date_to)
{
?>
<table width="100%" border="0">

<tr height="30"> <td colspan="10" align="center"><img src="images/logoeaco.jpg"></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>EACO DATA COLLECTION PORTAL</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>Outreach Record Report</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>Period from:<font color="#ff0000">
<?php echo $date_from;  ?></font> To :<font color="#ff0000"><?php echo $date_to; ?></H2></td></tr>

</table>


<table width="100%" border="0" class="table">
 
  
  <!--<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="7"><strong>Basic Details</strong></td>
    
    
    <td width="50" align="center" colspan="3"><strong>Diagnosis Records</strong></td>
	
    <td colspan="3" align="center"><strong>Sergery / Operations</strong></td>
   
	<td width="50" align="center" colspan="5"><strong></strong></td>
	
   
    
    
    </tr>
	-->
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="11"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="10"><strong>Diagnostics Records</strong></td>
	
    <!--<td colspan="3" align="center"><strong>Cataract Sergery</strong></td>
   
	<td width="50" align="center" colspan="2"><strong>Blindness</strong></td>
	
    <td align="center" colspan="3"><strong>Refferals</strong></td>-->
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="70"><strong>Istitution of Origin</strong></td>
    <td align="center" width="70"><strong>From</strong></td>
    <td align="center" width="70"><strong>To</strong></td>
	<td align="center" width="100"><strong>Location</strong></td>
    <td align="center" ><strong>Faculty Male</strong></td>
	<td align="center" ><strong>Faculty Female</strong></td>
	<td align="center" ><strong>Resident Male</strong></td>
	<td align="center" ><strong>Resident Female</strong></td>
	<td align="center" ><strong>Patient Male</strong></td>
	<td align="center" ><strong>Patient Female</strong></td>
	<td align="center" ><strong>Patient Child</strong></td>
    
    <td align="center" width="100"><strong>Disease Name</strong></td>
	<td align="center"><strong>Total Patients </strong></td>
	<td align="center"><strong>Male Patients</strong></td>
	<td align="center"><strong>Female Patients</strong></td>
	<td align="center"><strong>Children Patients</strong></td>
 
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE
 outreach_record.outreach_record_id=diagnosis.outreach_record_id AND diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND outreach_record.date_recorded BETWEEN '$date_from' AND '$date_to'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
 
 
 ?> <td ><?php echo $rows->institution_name; ?></td>
	<td align="center"><?php echo $rows->date_from; ?></td>
	<td align="center" ><?php echo $rows->date_to; ?></td>
	<td ><?php echo $rows->location; ?></td>
	<td align="center" ><?php echo $fac_male=$rows->fac_male; ?></td>
	<td align="center" ><?php echo $fac_female=$rows->fac_female; ?></td>
	<td align="center" ><?php echo $res_male=$rows->res_male; ?></td>
	<td align="center" ><?php echo $res_female=$rows->res_female; ?></td>
	<td align="center" ><?php echo $pat_male=$rows->pat_male; ?></td>
	<td align="center" ><?php echo $pat_female=$rows->pat_female; ?></td>
	<td align="center" ><?php echo $pat_child=$rows->pat_child; ?></td>
	<td ><?php echo $disease_name=$rows->disease_name; ?></td>
	<td align="center" ><strong><?php echo $total_pat=$rows->total_pat; ?></strong></td>
	<td align="center" ><?php echo $male_pat=$rows->male_pat; ?></td>
	<td align="center" ><?php echo $female_pat=$rows->female_pat; ?></td>
	<td align="center" ><?php echo $child_pat=$rows->child_pat; ?></td>
	
    </tr>
  <?php 
  $ttl_fac_male=$ttl_fac_male+$fac_male;
  $ttl_fac_female=$ttl_fac_female+$fac_female;
  $ttl_res_male=$ttl_res_male+$res_male;
  $ttl_res_female=$ttl_res_female+$res_female;
  $ttl_total_pat=$ttl_total_pat+$total_pat;
  $ttl_pat_male=$ttl_pat_male+$pat_male;
  $ttl_pat_female=$ttl_pat_female+$pat_female;
  $ttl_pat_child=$ttl_pat_child+$pat_child;
  $ttl_male_pat=$ttl_male_pat+$male_pat;
  $ttl_female_pat=$ttl_female_pat+$female_pat;
  $ttl_child_pat=$ttl_child_pat+$child_pat;
 
  }
  ?>
 <tr height="40" bgcolor="#FFFFCC">
	<td align="center" width="70" colspan="4"><strong>Totals</strong></td>
   
    <td align="center" ><strong><?php echo $ttl_fac_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_fac_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_child;  ?></strong></td>
    
    <td align="center" width="100"><strong></strong></td>
	<td align="center"><strong><?php echo  $ttl_total_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_male_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_female_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_child_pat;  ?></strong></td>
   
	 <!--<td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>
	<td align="center"><strong>Unilateral</strong></td>
	<td align="center"><strong>Billateral</strong></td>
    <td align="center"><strong>Male</strong></td>
    <td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>-->
    
    </tr> 
	<table width="100%">
	<tr height="60"><td colspan="16"align="right"> <i><strong>Printed by <?php  
$sqltc="select users.f_name,users.l_name,user_group.user_group_name,insitution.institution_name from users,user_group,insitution where users.user_group_id=user_group.user_group_id and users.institution_id=insitution.institution_id and users.user_id='$user_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc); 
echo $rowstc->f_name; ?>&nbsp;<?php echo $rowstc->l_name;
?> - <?php echo $rowstc->institution_name;  ?></strong></i></td></tr>
	</table>
  <?php 
  
  }
  
  else 
  
  {
  ?>
  
  <tr height="30"><td colspan="18" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
<?php 

}

if ($universityx && $diseasex)
{

?>
<table width="100%" border="0">

<tr height="30"> <td colspan="10" align="center"><img src="images/logoeaco.jpg"></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>EACO DATA COLLECTION PORTAL</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>Outreach Record Report</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>

Of Institution: <font color="#ff0000"><?php 
  $queryinstfn="SELECT * FROM insitution where institution_id='$universityx'";
  $resultsinstfn=mysql_query($queryinstfn) or die ("Error: $queryinstfn.".mysql_error());
  $rowsinstfn=mysql_fetch_object($resultsinstfn);
  
  echo $rowsinstfn->institution_name;?></font>

 For Disease : <font color="#ff0000">
 <?php 
  $queryinstf="SELECT * FROM diseases where disease_id='$diseasex'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->disease_name;
  
  
  ?></font>
</H2></td></tr>

</table>


<table width="100%" border="0" class="table">
 
  
  <!--<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="7"><strong>Basic Details</strong></td>
    
    
    <td width="50" align="center" colspan="3"><strong>Diagnosis Records</strong></td>
	
    <td colspan="3" align="center"><strong>Sergery / Operations</strong></td>
   
	<td width="50" align="center" colspan="5"><strong></strong></td>
	
   
    
    
    </tr>
	-->
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="11"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="10"><strong>Diagnostics Records</strong></td>
	
    <!--<td colspan="3" align="center"><strong>Cataract Sergery</strong></td>
   
	<td width="50" align="center" colspan="2"><strong>Blindness</strong></td>
	
    <td align="center" colspan="3"><strong>Refferals</strong></td>-->
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="70"><strong>Istitution of Origin</strong></td>
    <td align="center" width="70"><strong>From</strong></td>
    <td align="center" width="70"><strong>To</strong></td>
	<td align="center" width="100"><strong>Location</strong></td>
    <td align="center" ><strong>Faculty Male</strong></td>
	<td align="center" ><strong>Faculty Female</strong></td>
	<td align="center" ><strong>Resident Male</strong></td>
	<td align="center" ><strong>Resident Female</strong></td>
	<td align="center" ><strong>Patient Male</strong></td>
	<td align="center" ><strong>Patient Female</strong></td>
	<td align="center" ><strong>Patient Child</strong></td>
    
    <td align="center" width="100"><strong>Disease Name</strong></td>
	<td align="center"><strong>Total Patients </strong></td>
	<td align="center"><strong>Male Patients</strong></td>
	<td align="center"><strong>Female Patients</strong></td>
	<td align="center"><strong>Children Patients</strong></td>
 
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE
 outreach_record.outreach_record_id=diagnosis.outreach_record_id AND diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND outreach_record.institution_id='$universityx' AND diagnosis.disease_id='$diseasex'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
 
 
 ?> <td ><?php echo $rows->institution_name; ?></td>
	<td align="center"><?php echo $rows->date_from; ?></td>
	<td align="center" ><?php echo $rows->date_to; ?></td>
	<td ><?php echo $rows->location; ?></td>
	<td align="center" ><?php echo $fac_male=$rows->fac_male; ?></td>
	<td align="center" ><?php echo $fac_female=$rows->fac_female; ?></td>
	<td align="center" ><?php echo $res_male=$rows->res_male; ?></td>
	<td align="center" ><?php echo $res_female=$rows->res_female; ?></td>
	<td align="center" ><?php echo $pat_male=$rows->pat_male; ?></td>
	<td align="center" ><?php echo $pat_female=$rows->pat_female; ?></td>
	<td align="center" ><?php echo $pat_child=$rows->pat_child; ?></td>
	<td ><?php echo $disease_name=$rows->disease_name; ?></td>
	<td align="center" ><strong><?php echo $total_pat=$rows->total_pat; ?></strong></td>
	<td align="center" ><?php echo $male_pat=$rows->male_pat; ?></td>
	<td align="center" ><?php echo $female_pat=$rows->female_pat; ?></td>
	<td align="center" ><?php echo $child_pat=$rows->child_pat; ?></td>
	
    </tr>
  <?php 
  $ttl_fac_male=$ttl_fac_male+$fac_male;
  $ttl_fac_female=$ttl_fac_female+$fac_female;
  $ttl_res_male=$ttl_res_male+$res_male;
  $ttl_res_female=$ttl_res_female+$res_female;
  $ttl_total_pat=$ttl_total_pat+$total_pat;
  $ttl_pat_male=$ttl_pat_male+$pat_male;
  $ttl_pat_female=$ttl_pat_female+$pat_female;
  $ttl_pat_child=$ttl_pat_child+$pat_child;
  $ttl_male_pat=$ttl_male_pat+$male_pat;
  $ttl_female_pat=$ttl_female_pat+$female_pat;
  $ttl_child_pat=$ttl_child_pat+$child_pat;
 
  }
  ?>
 <tr height="40" bgcolor="#FFFFCC">
	<td align="center" width="70" colspan="4"><strong>Totals</strong></td>
   
    <td align="center" ><strong><?php echo $ttl_fac_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_fac_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_child;  ?></strong></td>
    
    <td align="center" width="100"><strong></strong></td>
	<td align="center"><strong><?php echo  $ttl_total_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_male_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_female_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_child_pat;  ?></strong></td>
   
	 <!--<td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>
	<td align="center"><strong>Unilateral</strong></td>
	<td align="center"><strong>Billateral</strong></td>
    <td align="center"><strong>Male</strong></td>
    <td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>-->
    
    </tr> 
	<table width="100%">
	<tr height="60"><td colspan="16"align="right"> <i><strong>Printed by <?php  
$sqltc="select users.f_name,users.l_name,user_group.user_group_name,insitution.institution_name from users,user_group,insitution where users.user_group_id=user_group.user_group_id and users.institution_id=insitution.institution_id and users.user_id='$user_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc); 
echo $rowstc->f_name; ?>&nbsp;<?php echo $rowstc->l_name;
?> - <?php echo $rowstc->institution_name;  ?></strong></i></td></tr>
	</table>
  <?php 
  
  }
  
  else 
  
  {
  ?>
  
  <tr height="30"><td colspan="18" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
<?php 
}
if ($universityy && $date_fromy && $date_toy)
{

?>
<table width="100%" border="0">

<tr height="30"> <td colspan="10" align="center"><img src="images/logoeaco.jpg"></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>EACO DATA COLLECTION PORTAL</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>Outreach Record Report</H2></td></tr>
<tr height="20"> <td colspan="10" align="center"><H2>

Of Institution: <font color="#ff0000"><?php 
  $queryinstfn="SELECT * FROM insitution where institution_id='$universityy'";
  $resultsinstfn=mysql_query($queryinstfn) or die ("Error: $queryinstfn.".mysql_error());
  $rowsinstfn=mysql_fetch_object($resultsinstfn);
  
  echo $rowsinstfn->institution_name;?></font>

 For Period From : <font color="#ff0000">
 <?php echo $date_fromy; ?></font> To : <font color="#ff0000"><?php echo $date_toy;   ?></font></H2></td></tr>

</table>


<table width="100%" border="0" class="table">
 
  
  <!--<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="7"><strong>Basic Details</strong></td>
    
    
    <td width="50" align="center" colspan="3"><strong>Diagnosis Records</strong></td>
	
    <td colspan="3" align="center"><strong>Sergery / Operations</strong></td>
   
	<td width="50" align="center" colspan="5"><strong></strong></td>
	
   
    
    
    </tr>
	-->
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="11"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="10"><strong>Diagnostics Records</strong></td>
	
    <!--<td colspan="3" align="center"><strong>Cataract Sergery</strong></td>
   
	<td width="50" align="center" colspan="2"><strong>Blindness</strong></td>
	
    <td align="center" colspan="3"><strong>Refferals</strong></td>-->
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="70"><strong>Istitution of Origin</strong></td>
    <td align="center" width="70"><strong>From</strong></td>
    <td align="center" width="70"><strong>To</strong></td>
	<td align="center" width="100"><strong>Location</strong></td>
    <td align="center" ><strong>Faculty Male</strong></td>
	<td align="center" ><strong>Faculty Female</strong></td>
	<td align="center" ><strong>Resident Male</strong></td>
	<td align="center" ><strong>Resident Female</strong></td>
	<td align="center" ><strong>Patient Male</strong></td>
	<td align="center" ><strong>Patient Female</strong></td>
	<td align="center" ><strong>Patient Child</strong></td>
    
    <td align="center" width="100"><strong>Disease Name</strong></td>
	<td align="center"><strong>Total Patients </strong></td>
	<td align="center"><strong>Male Patients</strong></td>
	<td align="center"><strong>Female Patients</strong></td>
	<td align="center"><strong>Children Patients</strong></td>
 
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE
outreach_record.outreach_record_id=diagnosis.outreach_record_id AND diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND outreach_record.institution_id='$universityy'
AND outreach_record.date_recorded BETWEEN '$date_fromy' AND '$date_toy'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
 
 
 ?> <td ><?php echo $rows->institution_name; ?></td>
	<td align="center"><?php echo $rows->date_from; ?></td>
	<td align="center" ><?php echo $rows->date_to; ?></td>
	<td ><?php echo $rows->location; ?></td>
	<td align="center" ><?php echo $fac_male=$rows->fac_male; ?></td>
	<td align="center" ><?php echo $fac_female=$rows->fac_female; ?></td>
	<td align="center" ><?php echo $res_male=$rows->res_male; ?></td>
	<td align="center" ><?php echo $res_female=$rows->res_female; ?></td>
	<td align="center" ><?php echo $pat_male=$rows->pat_male; ?></td>
	<td align="center" ><?php echo $pat_female=$rows->pat_female; ?></td>
	<td align="center" ><?php echo $pat_child=$rows->pat_child; ?></td>
	<td ><?php echo $disease_name=$rows->disease_name; ?></td>
	<td align="center" ><strong><?php echo $total_pat=$rows->total_pat; ?></strong></td>
	<td align="center" ><?php echo $male_pat=$rows->male_pat; ?></td>
	<td align="center" ><?php echo $female_pat=$rows->female_pat; ?></td>
	<td align="center" ><?php echo $child_pat=$rows->child_pat; ?></td>
	
    </tr>
  <?php 
  $ttl_fac_male=$ttl_fac_male+$fac_male;
  $ttl_fac_female=$ttl_fac_female+$fac_female;
  $ttl_res_male=$ttl_res_male+$res_male;
  $ttl_res_female=$ttl_res_female+$res_female;
  $ttl_total_pat=$ttl_total_pat+$total_pat;
  $ttl_pat_male=$ttl_pat_male+$pat_male;
  $ttl_pat_female=$ttl_pat_female+$pat_female;
  $ttl_pat_child=$ttl_pat_child+$pat_child;
  $ttl_male_pat=$ttl_male_pat+$male_pat;
  $ttl_female_pat=$ttl_female_pat+$female_pat;
  $ttl_child_pat=$ttl_child_pat+$child_pat;
 
  }
  ?>
 <tr height="40" bgcolor="#FFFFCC">
	<td align="center" width="70" colspan="4"><strong>Totals</strong></td>
   
    <td align="center" ><strong><?php echo $ttl_fac_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_fac_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_child;  ?></strong></td>
    
    <td align="center" width="100"><strong></strong></td>
	<td align="center"><strong><?php echo  $ttl_total_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_male_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_female_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_child_pat;  ?></strong></td>
   
	 <!--<td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>
	<td align="center"><strong>Unilateral</strong></td>
	<td align="center"><strong>Billateral</strong></td>
    <td align="center"><strong>Male</strong></td>
    <td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>-->
    
    </tr> 
	<table width="100%">
	<tr height="60"><td colspan="16"align="right"> <i><strong>Printed by <?php  
$sqltc="select users.f_name,users.l_name,user_group.user_group_name,insitution.institution_name from users,user_group,insitution where users.user_group_id=user_group.user_group_id and users.institution_id=insitution.institution_id and users.user_id='$user_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc); 
echo $rowstc->f_name; ?>&nbsp;<?php echo $rowstc->l_name;
?> - <?php echo $rowstc->institution_name;  ?></strong></i></td></tr>
	</table>
  <?php 
  
  }
  
  else 
  
  {
  ?>
  
  <tr height="30"><td colspan="18" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
<?php 


}


else
{
?>
<table width="100%" border="0">

<tr height="40"> <td colspan="10" align="center"><img src="images/logoeaco.jpg"></td></tr>
<tr height="40"> <td colspan="10" align="center"><H2>EACO DATA COLLECTION PORTAL</H2></td></tr>
<tr height="40"> <td colspan="10" align="center"><H2>Outreach Record Report</H2></td></tr>



</table>


<table width="100%" border="0" class="table">
 
  
  <!--<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="7"><strong>Basic Details</strong></td>
    
    
    <td width="50" align="center" colspan="3"><strong>Diagnosis Records</strong></td>
	
    <td colspan="3" align="center"><strong>Sergery / Operations</strong></td>
   
	<td width="50" align="center" colspan="5"><strong></strong></td>
	
   
    
    
    </tr>
	-->
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="11"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="10"><strong>Diagnostics Records</strong></td>
	
    <!--<td colspan="3" align="center"><strong>Cataract Sergery</strong></td>
   
	<td width="50" align="center" colspan="2"><strong>Blindness</strong></td>
	
    <td align="center" colspan="3"><strong>Refferals</strong></td>-->
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="70"><strong>Istitution of Origin</strong></td>
    <td align="center" width="70"><strong>From</strong></td>
    <td align="center" width="70"><strong>To</strong></td>
	<td align="center" width="100"><strong>Location</strong></td>
    <td align="center" ><strong>Faculty Male</strong></td>
	<td align="center" ><strong>Faculty Female</strong></td>
	<td align="center" ><strong>Resident Male</strong></td>
	<td align="center" ><strong>Resident Female</strong></td>
	<td align="center" ><strong>Patient Male</strong></td>
	<td align="center" ><strong>Patient Female</strong></td>
	<td align="center" ><strong>Patient Child</strong></td>
    
    <td align="center" width="100"><strong>Disease Name</strong></td>
	<td align="center"><strong>Total Patients </strong></td>
	<td align="center"><strong>Male Patients</strong></td>
	<td align="center"><strong>Female Patients</strong></td>
	<td align="center"><strong>Children Patients</strong></td>
 
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE
 outreach_record.outreach_record_id=diagnosis.outreach_record_id AND diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
 
 
 ?> <td ><?php echo $rows->institution_name; ?></td>
	<td align="center"><?php echo $rows->date_from; ?></td>
	<td align="center" ><?php echo $rows->date_to; ?></td>
	<td ><?php echo $rows->location; ?></td>
	<td align="center" ><?php echo $fac_male=$rows->fac_male; ?></td>
	<td align="center" ><?php echo $fac_female=$rows->fac_female; ?></td>
	<td align="center" ><?php echo $res_male=$rows->res_male; ?></td>
	<td align="center" ><?php echo $res_female=$rows->res_female; ?></td>
	<td align="center" ><?php echo $pat_male=$rows->pat_male; ?></td>
	<td align="center" ><?php echo $pat_female=$rows->pat_female; ?></td>
	<td align="center" ><?php echo $pat_child=$rows->pat_child; ?></td>
	<td ><?php echo $disease_name=$rows->disease_name; ?></td>
	<td align="center" ><strong><?php echo $total_pat=$rows->total_pat; ?></strong></td>
	<td align="center" ><?php echo $male_pat=$rows->male_pat; ?></td>
	<td align="center" ><?php echo $female_pat=$rows->female_pat; ?></td>
	<td align="center" ><?php echo $child_pat=$rows->child_pat; ?></td>
	
    </tr>
  <?php 
  $ttl_fac_male=$ttl_fac_male+$fac_male;
  $ttl_fac_female=$ttl_fac_female+$fac_female;
  $ttl_res_male=$ttl_res_male+$res_male;
  $ttl_res_female=$ttl_res_female+$res_female;
  $ttl_total_pat=$ttl_total_pat+$total_pat;
  $ttl_pat_male=$ttl_pat_male+$pat_male;
  $ttl_pat_female=$ttl_pat_female+$pat_female;
  $ttl_pat_child=$ttl_pat_child+$pat_child;
  $ttl_male_pat=$ttl_male_pat+$male_pat;
  $ttl_female_pat=$ttl_female_pat+$female_pat;
  $ttl_child_pat=$ttl_child_pat+$child_pat;
 
  }
  ?>
 <tr height="40" bgcolor="#FFFFCC">
	<td align="center" width="70" colspan="4"><strong>Totals</strong></td>
   
    <td align="center" ><strong><?php echo $ttl_fac_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_fac_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_res_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_male;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_female;  ?></strong></td>
	<td align="center" ><strong><?php echo $ttl_pat_child;  ?></strong></td>
    
    <td align="center" width="100"><strong></strong></td>
	<td align="center"><strong><?php echo  $ttl_total_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_male_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_female_pat;  ?></strong></td>
	<td align="center"><strong><?php echo  $ttl_child_pat;  ?></strong></td>
   
	 <!--<td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>
	<td align="center"><strong>Unilateral</strong></td>
	<td align="center"><strong>Billateral</strong></td>
    <td align="center"><strong>Male</strong></td>
    <td align="center"><strong>Female</strong></td>
	<td align="center"><strong>Child.</strong></td>-->
    
    </tr> 
	<table width="100%">
	<tr height="60"><td colspan="16"align="right"> <i><strong>Printed by <?php  
$sqltc="select users.f_name,users.l_name,user_group.user_group_name,insitution.institution_name from users,user_group,insitution where users.user_group_id=user_group.user_group_id and users.institution_id=insitution.institution_id and users.user_id='$user_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc); 
echo $rowstc->f_name; ?>&nbsp;<?php echo $rowstc->l_name;
?> - <?php echo $rowstc->institution_name;  ?></strong></i></td></tr>
	</table>
  <?php 
  
  }
  
  else 
  
  {
  ?>
  
  <tr height="30"><td colspan="18" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>


<?php

}
 ?>

















