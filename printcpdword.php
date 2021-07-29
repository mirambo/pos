<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
/*header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Continous_Professional_Development(CPD)_Record.xlsx");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");*/

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Continous_Professional_Development(CPD)_Record.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<title>EACO Online Data Collection Portal - Continous Medical Education (CME) / Continous Professional Development (CPD) Record</title>
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

<table width="100%" border="0">

<tr height="40"> <td colspan="10" align="center"><img src="images/logoeaco.jpg"></td></tr>
<tr height="40"> <td colspan="10" align="center"><H2>EACO DATA COLLECTION PORTAL</H2></td></tr>
<tr height="40"> <td colspan="10" align="center"><H2>Continous Medical Education (CME) / Continous Professional Development (CPD) Record</H2></td></tr>



</table>

<table width="100%" class="table">
  
  
   <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Country</strong></td>
    <td align="center" width="100"><strong>Date</strong></td>
    <td align="center" width="100"><strong>Venue</strong></td>
	<td align="center" width="150"><strong>Topic</strong></td>
	<td align="center" width="150"><strong>Total Participitants</strong></td>
	<td align="center" width="150"><strong>Male Participants</strong></td>
    <td width="180" align="center"><strong>Female Participants</strong></td>
    <td align="center" width="150"><strong>Facilitator(s)</strong></td>
    <td width="180" align="center"><strong>Sponsor(s)</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
	
    
    </tr>
	
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM cdp where institution_id='$institution_id' order by cdp_id desc";
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
 
 
 ?>
  
    <td><?php echo $rows->country;?></td>
    <td align="center"><?php echo $rows->date;?></td>
	<td><?php echo $rows->vanue;?></td>
	<td><?php echo $rows->topic;?></td>
	<td align="center"><?php echo $rows->total_part;?></td>
	<td align="center"><?php echo $rows->male_part;?></td>
	<td align="center">
	<?php echo $rows->female_part;?>
    </td>
	
	<td><?php echo $rows->facillitator;?></td>
	<td><?php echo $rows->sponsor1.', '.$rows->sponsor2.', '.$rows->sponsor3;?></td>
	<td><?php echo $rows->remarks;
	

	
	?></td>
	
	
   
    </tr>
  <?php 
  $ttl_part=$ttl_part+$rows->total_part;
  $ttl_male_part=$ttl_male_part+$rows->male_part;
  $ttl_female_part=$ttl_female_part+$rows->female_part;

  
  }
  
  ?>
  
   <tr  bgcolor="#FFFFCC" height="30" >
    <td align="center" width="150" colspan="4" ><strong>Totals</strong></td>
    
	<td align="center" width="150"><strong><?php echo $ttl_part; ?></strong></td>
	<td align="center" width="150"><strong><?php echo $ttl_male_part; ?></strong></td>
    <td width="180" align="center"><strong><?php echo $ttl_female_part; ?></strong></td>
    <td align="center" width="150" colspan="3" ><strong></strong></td>
   
    
    </tr>
  
  <?php
  
  
  
  ?>
  
	<tr height="60"><td colspan="10"align="right"> <i><strong>Printed by <?php  
$sqltc="select users.f_name,users.l_name,user_group.user_group_name,insitution.institution_name from users,user_group,insitution where users.user_group_id=user_group.user_group_id and users.institution_id=insitution.institution_id and users.user_id='$user_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc); 
echo $rowstc->f_name; ?>&nbsp;<?php echo $rowstc->l_name;
?> - <?php echo $rowstc->institution_name;  ?></strong></i></td></tr>

 <?php 
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="10" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>



