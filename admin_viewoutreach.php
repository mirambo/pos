<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>

<?php
if (!isset($_POST['submit']))
{
 ?>
<table width="100%" border="0">

<tr bgcolor="#FFFFCC" ><td colspan="18" align="center"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
  <form name="generate" method="post" action="">
  <tr  height="30" bgcolor="#FFFFCC">
	
    <td  width="70" colspan="5"><strong> Filter By: Institution of Origin : <select name="university">	
	<option value="0">Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
   
	
    
	<td align="right" colspan="2" ><strong>By Disease</strong></td>
	
	<td align="center" colspan="3"><strong><select name="disease">
	

	<option value="0">--------Select----------</option>
								  <?php
								  
								  $query1="select * from diseases order by disease_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->disease_id; ?>"><?php echo $rows1->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
	
    
    <td align="right" width="100"><strong>Date from</strong></td>
	<td align="center" colspan="2"><strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></strong></td>
	
	<td align="left" colspan="5"><strong>To : <input type="text" name="date_to" size="15" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td>
	
  
    
    </tr>
	
	</form>
	<script type="text/javascript">
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
  
  
  
  </script> 
	
	
  <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  
  
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="10"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="11"><strong>Diagnostics Records</strong></td>
	
  
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="120"><strong>Istitution of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
  
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.diagnosis_id,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id";
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
 
 
 ?> <td><?php echo $rows->institution_name; ?></td>
	<td align="center" ><?php echo $rows->date_from; ?></td>
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
	<td align="center"><a href="home.php?admineditoutreach=admineditoutreach&outreach_record_id=<?php echo $rows->outreach_record_id;?>&diagnosis_id=<?php echo $rows->diagnosis_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_outreach.php?outreach_record_id=<?php echo $rows->outreach_record_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
	

    
	
   
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
   
	 <td align="center" colspan="2"><strong></strong></td>
	
	
    
    </tr> 
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
$university=$_POST['university'];

$disease=$_POST['disease'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($university!='0' && $disease=='0' && $date_from=='' && $date_from=='' )
{
//echo "inst only";
//echo $university;
?>
<table width="100%" border="0">

<tr bgcolor="#FFFFCC" >
<td colspan="18" align="center"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
  <form name="generate" method="post" action="">
  <tr  height="30" bgcolor="#FFFFCC">
	
    <td  width="70" colspan="5"><strong> Filter By: Institution of Origin : <select name="university">	
	<option value="0">Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
   
	
    
	<td align="right" colspan="2" ><strong>By Disease</strong></td>
	
	<td align="center" colspan="3"><strong><select name="disease">
	

	<option value="0">--------Select----------</option>
								  <?php
								  
								  $query1="select * from diseases order by disease_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->disease_id; ?>"><?php echo $rows1->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
	
    
    <td align="right" width="100"><strong>Date from</strong></td>
	<td align="center" colspan="2"><strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></strong></td>
	
	<td align="left" colspan="5"><strong>To : <input type="text" name="date_to" size="15" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td>
	
  
    
    </tr>
	
	</form>
	<script type="text/javascript">
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
  
  
  
  </script> 
	
	
 <!-- <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php?institute_id=<?php echo $university; ?>" target="_blank">
  <img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php?institute_id=<?php echo $university; ?>">
  <img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php?institute_id=<?php echo $university; ?>">
  <img src="images/word.png" title="Export to Word"></a></td></tr>-->
  
  <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  
  <tr bgcolor="#FFFFCC"><td colspan="18" align="center" width="40"><strong>
  
  Institute Of Origin: <font color="#ff0000">
  <?php 
  $queryinstf="SELECT * FROM insitution where institution_id='$university'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->institution_name;
  
  
  ?>
  
  </font>
  </strong> </td></tr>
  
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="10"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="11"><strong>Diagnostics Records</strong></td>
	
  
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="120"><strong>Istitution of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
  
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.diagnosis_id,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND
 diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND outreach_record.institution_id='$university'";
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
 
 
 ?> <td align="center"><?php echo $rows->institution_name; ?></td>
	<td align="center" ><?php echo $rows->date_from; ?></td>
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
	<td align="center"><a href="home.php?admineditoutreach=admineditoutreach&outreach_record_id=<?php echo $rows->outreach_record_id;?>&diagnosis_id=<?php echo $rows->diagnosis_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_outreach.php?outreach_record_id=<?php echo $rows->outreach_record_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
	

    
	
   
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
   
	 <td align="center" colspan="2"><strong></strong></td>
	
	
    
    </tr> 
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
elseif ($university=='0' && $disease!='0' && $date_from=='' && $date_from=='' )

{
///echo "disease only";

?>
<table width="100%" border="0">

<tr bgcolor="#FFFFCC" >
<td colspan="18" align="center"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
  <form name="generate" method="post" action="">
  <tr  height="30" bgcolor="#FFFFCC">
	
    <td  width="70" colspan="5"><strong> Filter By: Institution of Origin : <select name="university">	
	<option value="0">Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
   
	
    
	<td align="right" colspan="2" ><strong>By Disease</strong></td>
	
	<td align="center" colspan="3"><strong><select name="disease">
	

	<option value="0">--------Select----------</option>
								  <?php
								  
								  $query1="select * from diseases order by disease_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->disease_id; ?>"><?php echo $rows1->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
	
    
    <td align="right" width="100"><strong>Date from</strong></td>
	<td align="center" colspan="2"><strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></strong></td>
	
	<td align="left" colspan="5"><strong>To : <input type="text" name="date_to" size="15" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td>
	
  
    
    </tr>
	
	</form>
	<script type="text/javascript">
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
  
  
  
  </script> 
	
	
  <!--<tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php?disease_id=<?php echo $disease; ?>" target="_blank">
  <img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php?disease_id=<?php echo $disease; ?>">
  <img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php?disease_id=<?php echo $disease; ?>">
  <img src="images/word.png" title="Export to Word"></a></td></tr>-->
  <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  <tr bgcolor="#FFFFCC"><td colspan="18" align="center" width="40"><strong>
  
  Disease: <font color="#ff0000">
  <?php 
  $queryinstf="SELECT * FROM diseases where disease_id='$disease'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->disease_name;
  
  
  ?>
  
  </font>
  </strong> </td></tr>
  
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="10"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="11"><strong>Diagnostics Records</strong></td>
	
  
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="120"><strong>Istitution of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
  
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.diagnosis_id,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND
 diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND diagnosis.disease_id='$disease'";
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
 
 
 ?> <td align="center"><?php echo $rows->institution_name; ?></td>
	<td align="center" ><?php echo $rows->date_from; ?></td>
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
	<td align="center"><a href="home.php?admineditoutreach=admineditoutreach&outreach_record_id=<?php echo $rows->outreach_record_id;?>&diagnosis_id=<?php echo $rows->diagnosis_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_outreach.php?outreach_record_id=<?php echo $rows->outreach_record_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
	

    
	
   
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
   
	 <td align="center" colspan="2"><strong></strong></td>
	
	
    
    </tr> 
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

elseif ($university=='0' && $disease=='0' && $date_from!='' && $date_from!='' )

{
//echo "date only";
?>
<table width="100%" border="0">

<tr bgcolor="#FFFFCC" >
<td colspan="18" align="center"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
  <form name="generate" method="post" action="">
  <tr  height="30" bgcolor="#FFFFCC">
	
    <td  width="70" colspan="5"><strong> Filter By: Institution of Origin : <select name="university">	
	<option value="0">Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
   
	
    
	<td align="right" colspan="2" ><strong>By Disease</strong></td>
	
	<td align="center" colspan="3"><strong><select name="disease">
	

	<option value="0">--------Select----------</option>
								  <?php
								  
								  $query1="select * from diseases order by disease_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->disease_id; ?>"><?php echo $rows1->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
	
    
    <td align="right" width="100"><strong>Date from</strong></td>
	<td align="center" colspan="2"><strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></strong></td>
	
	<td align="left" colspan="5"><strong>To : <input type="text" name="date_to" size="15" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td>
	
  
    
    </tr>
	
	</form>
	<script type="text/javascript">
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
  
  
  
  </script> 
	
	
  <!--<tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php?date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>" target="_blank">
  <img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php?date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>">
  <img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php?date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>">
  <img src="images/word.png" title="Export to Word"></a></td></tr>-->
  <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  <tr bgcolor="#FFFFCC"><td colspan="18" align="center" width="40"><strong>
  
  Period from:<font color="#ff0000"><?php echo $date_from;  ?></font> To :<font color="#ff0000"><?php echo $date_to; ?>
   
 </font> </strong> </td></tr>
  
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="10"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="11"><strong>Diagnostics Records</strong></td>
	
  
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="120"><strong>Istitution of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
  
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.diagnosis_id,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND
 diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND outreach_record.date_recorded BETWEEN '$date_from' AND '$date_to'";
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
 
 
 ?> <td align="center"><?php echo $rows->institution_name; ?></td>
	<td align="center" ><?php echo $rows->date_from; ?></td>
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
	<td align="center"><a href="home.php?admineditoutreach=admineditoutreach&outreach_record_id=<?php echo $rows->outreach_record_id;?>&diagnosis_id=<?php echo $rows->diagnosis_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_outreach.php?outreach_record_id=<?php echo $rows->outreach_record_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
	

    
	
   
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
   
	 <td align="center" colspan="2"><strong></strong></td>
	
	
    
    </tr> 
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

elseif ($university!='0' && $disease!='0' && $date_from=='' && $date_from=='' )

{
//echo "inst and disease";
?>
<table width="100%" border="0">

<tr bgcolor="#FFFFCC" >
<td colspan="18" align="center"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
  <form name="generate" method="post" action="">
  <tr  height="30" bgcolor="#FFFFCC">
	
    <td  width="70" colspan="5"><strong> Filter By: Institution of Origin : <select name="university">	
	<option value="0">Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
   
	
    
	<td align="right" colspan="2" ><strong>By Disease</strong></td>
	
	<td align="center" colspan="3"><strong><select name="disease">
	

	<option value="0">--------Select----------</option>
								  <?php
								  
								  $query1="select * from diseases order by disease_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->disease_id; ?>"><?php echo $rows1->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
	
    
    <td align="right" width="100"><strong>Date from</strong></td>
	<td align="center" colspan="2"><strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></strong></td>
	
	<td align="left" colspan="5"><strong>To : <input type="text" name="date_to" size="15" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td>
	
  
    
    </tr>
	
	</form>
	<script type="text/javascript">
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
  
  
  
  </script> 
	
	
  <!--<tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php?institute_idx=<?php echo $university; ?>&disease_idx=<?php echo $disease; ?>" target="_blank">
  <img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php?institute_idx=<?php echo $university; ?>&disease_idx=<?php echo $disease; ?>">
  <img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php?institute_idx=<?php echo $university; ?>&disease_idx=<?php echo $disease; ?>">
  <img src="images/word.png" title="Export to Word"></a></td></tr>-->
  <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  <tr bgcolor="#FFFFCC"><td colspan="18" align="center" width="40"><strong>
 Of Institution: <font color="#ff0000"><?php 
  $queryinstfn="SELECT * FROM insitution where institution_id='$university'";
  $resultsinstfn=mysql_query($queryinstfn) or die ("Error: $queryinstfn.".mysql_error());
  $rowsinstfn=mysql_fetch_object($resultsinstfn);
  
  echo $rowsinstfn->institution_name;?>
  </font>
 For Disease : <font color="#ff0000">
 <?php 
  $queryinstf="SELECT * FROM diseases where disease_id='$disease'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->disease_name;
  
  
  ?>
   
 </font> </strong> </td></tr>
  
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="10"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="11"><strong>Diagnostics Records</strong></td>
	
  
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="120"><strong>Istitution of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
  
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.diagnosis_id,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND
 diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND outreach_record.institution_id='$university' AND diagnosis.disease_id='$disease'";
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
 
 
 ?> <td align="center"><?php echo $rows->institution_name; ?></td>
	<td align="center" ><?php echo $rows->date_from; ?></td>
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
	<td align="center"><a href="home.php?admineditoutreach=admineditoutreach&outreach_record_id=<?php echo $rows->outreach_record_id;?>&diagnosis_id=<?php echo $rows->diagnosis_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_outreach.php?outreach_record_id=<?php echo $rows->outreach_record_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
	

    
	
   
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
   
	 <td align="center" colspan="2"><strong></strong></td>
	
	
    
    </tr> 
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
elseif ($university!='0' && $disease=='0' && $date_from!='' && $date_from!='' )

{
//echo "inst and date";
?>
<table width="100%" border="0">

<tr bgcolor="#FFFFCC" >
<td colspan="18" align="center"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
  <form name="generate" method="post" action="">
  <tr  height="30" bgcolor="#FFFFCC">
	
    <td  width="70" colspan="5"><strong> Filter By: Institution of Origin : <select name="university">	
	<option value="0">Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
   
	
    
	<td align="right" colspan="2" ><strong>By Disease</strong></td>
	
	<td align="center" colspan="3"><strong><select name="disease">
	

	<option value="0">--------Select----------</option>
								  <?php
								  
								  $query1="select * from diseases order by disease_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->disease_id; ?>"><?php echo $rows1->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
	
    
    <td align="right" width="100"><strong>Date from</strong></td>
	<td align="center" colspan="2"><strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></strong></td>
	
	<td align="left" colspan="5"><strong>To : <input type="text" name="date_to" size="15" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td>
	
  
    
    </tr>
	
	</form>
	<script type="text/javascript">
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
  
  
  
  </script> 
	
	
  <!--<tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php?institute_idy=<?php echo $university;?>&date_fromy=<?php echo $date_from;?>&date_toy=<?php echo $date_to;?>" target="_blank">
  <img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php?institute_idy=<?php echo $university; ?>&date_fromy=<?php echo $date_from; ?>&date_toy=<?php echo $date_to; ?>">
  <img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php?institute_idy=<?php echo $university; ?>&date_fromy=<?php echo $date_from; ?>&date_toy=<?php echo $date_to; ?>">
  <img src="images/word.png" title="Export to Word"></a></td></tr>-->
  <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  <tr bgcolor="#FFFFCC"><td colspan="18" align="center" width="40"><strong>
 Of Institution: <font color="#ff0000"><?php 
  $queryinstfn="SELECT * FROM insitution where institution_id='$university'";
  $resultsinstfn=mysql_query($queryinstfn) or die ("Error: $queryinstfn.".mysql_error());
  $rowsinstfn=mysql_fetch_object($resultsinstfn);
  
  echo $rowsinstfn->institution_name;?>
  </font>
 For Period From : <font color="#ff0000"><?php echo $date_from;  ?></font>To <font color="#ff0000"><?php echo $date_to; ?>

  </font></strong> </td></tr>

  
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="10"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="11"><strong>Diagnostics Records</strong></td>
	
  
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="120"><strong>Istitution of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
  
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.diagnosis_id,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND
 diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND outreach_record.institution_id='$university' AND outreach_record.date_recorded BETWEEN '$date_from' AND '$date_to'";
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
 
 
 ?> <td align="center"><?php echo $rows->institution_name; ?></td>
	<td align="center" ><?php echo $rows->date_from; ?></td>
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
	<td align="center"><a href="home.php?admineditoutreach=admineditoutreach&outreach_record_id=<?php echo $rows->outreach_record_id;?>&diagnosis_id=<?php echo $rows->diagnosis_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_outreach.php?outreach_record_id=<?php echo $rows->outreach_record_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
	

    
	
   
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
   
	 <td align="center" colspan="2"><strong></strong></td>
	
	
    
    </tr> 
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

elseif ($university=='0' && $disease!='0' && $date_from!='' && $date_from!='' )

{
//echo "disease and date";
?>
<table width="100%" border="0">

<tr bgcolor="#FFFFCC" >
<td colspan="18" align="center"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
  <form name="generate" method="post" action="">
  <tr  height="30" bgcolor="#FFFFCC">
	
    <td  width="70" colspan="5"><strong> Filter By: Institution of Origin : <select name="university">	
	<option value="0">Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
   
	
    
	<td align="right" colspan="2" ><strong>By Disease</strong></td>
	
	<td align="center" colspan="3"><strong><select name="disease">
	

	<option value="0">--------Select----------</option>
								  <?php
								  
								  $query1="select * from diseases order by disease_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->disease_id; ?>"><?php echo $rows1->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
	
    
    <td align="right" width="100"><strong>Date from</strong></td>
	<td align="center" colspan="2"><strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></strong></td>
	
	<td align="left" colspan="5"><strong>To : <input type="text" name="date_to" size="15" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td>
	
  
    
    </tr>
	
	</form>
	<script type="text/javascript">
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
  
  
  
  </script> 
	
	
  <!--<tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php?institute_idy=<?php echo $university;?>&date_fromy=<?php echo $date_from;?>&date_toy=<?php echo $date_to;?>" target="_blank">
  <img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php?institute_idy=<?php echo $university; ?>&date_fromy=<?php echo $date_from; ?>&date_toy=<?php echo $date_to; ?>">
  <img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php?institute_idy=<?php echo $university; ?>&date_fromy=<?php echo $date_from; ?>&date_toy=<?php echo $date_to; ?>">
  <img src="images/word.png" title="Export to Word"></a></td></tr>-->
  <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  <tr bgcolor="#FFFFCC"><td colspan="18" align="center" width="40"><strong>
 Of Disease: <font color="#ff0000"><?php 
  $queryinstf="SELECT * FROM diseases where disease_id='$disease'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->disease_name;
  
  
  ?>
  </font>
 For Period From : <font color="#ff0000"><?php echo $date_from;  ?></font>To <font color="#ff0000"><?php echo $date_to; ?>

  </font></strong> </td></tr>

  
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="10"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="11"><strong>Diagnostics Records</strong></td>
	
  
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="120"><strong>Istitution of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
  
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.diagnosis_id,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND
 diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND diagnosis.disease_id='$disease' AND outreach_record.date_recorded BETWEEN '$date_from' AND '$date_to'";
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
 
 
 ?> <td align="center"><?php echo $rows->institution_name; ?></td>
	<td align="center" ><?php echo $rows->date_from; ?></td>
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
	<td align="center"><a href="home.php?admineditoutreach=admineditoutreach&outreach_record_id=<?php echo $rows->outreach_record_id;?>&diagnosis_id=<?php echo $rows->diagnosis_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_outreach.php?outreach_record_id=<?php echo $rows->outreach_record_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
	

    
	
   
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
   
	 <td align="center" colspan="2"><strong></strong></td>
	
	
    
    </tr> 
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

elseif ($university!='0' && $disease!='0' && $date_from!='' && $date_from!='' )
{
//echo "all";
?>
<table width="100%" border="0">

<tr bgcolor="#FFFFCC" >
<td colspan="18" align="center"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
  <form name="generate" method="post" action="">
  <tr  height="30" bgcolor="#FFFFCC">
	
    <td  width="70" colspan="5"><strong> Filter By: Institution of Origin : <select name="university">	
	<option value="0">Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
   
	
    
	<td align="right" colspan="2" ><strong>By Disease</strong></td>
	
	<td align="center" colspan="3"><strong><select name="disease">
	

	<option value="0">--------Select----------</option>
								  <?php
								  
								  $query1="select * from diseases order by disease_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->disease_id; ?>"><?php echo $rows1->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
	
    
    <td align="right" width="100"><strong>Date from</strong></td>
	<td align="center" colspan="2"><strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></strong></td>
	
	<td align="left" colspan="5"><strong>To : <input type="text" name="date_to" size="15" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td>
	
  
    
    </tr>
	
	</form>
	<script type="text/javascript">
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
  
  
  
  </script> 
	
	
  <!--<tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php?institute_idy=<?php echo $university;?>&date_fromy=<?php echo $date_from;?>&date_toy=<?php echo $date_to;?>" target="_blank">
  <img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php?institute_idy=<?php echo $university; ?>&date_fromy=<?php echo $date_from; ?>&date_toy=<?php echo $date_to; ?>">
  <img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php?institute_idy=<?php echo $university; ?>&date_fromy=<?php echo $date_from; ?>&date_toy=<?php echo $date_to; ?>">
  <img src="images/word.png" title="Export to Word"></a></td></tr>-->
  <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  <tr bgcolor="#FFFFCC"><td colspan="18" align="center" width="40"><strong>
  For Institution:<font color="#ff0000">
  <?php 
  $queryinstfn="SELECT * FROM insitution where institution_id='$university'";
  $resultsinstfn=mysql_query($queryinstfn) or die ("Error: $queryinstfn.".mysql_error());
  $rowsinstfn=mysql_fetch_object($resultsinstfn);
  
  echo $rowsinstfn->institution_name;?>
  
 </font>Of Disease: <font color="#ff0000"><?php 
  $queryinstf="SELECT * FROM diseases where disease_id='$disease'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->disease_name;
  
  
  ?>
  </font>
 For Period From : <font color="#ff0000"><?php echo $date_from;  ?></font>To <font color="#ff0000"><?php echo $date_to; ?>

  </font></strong> </td></tr>

  
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="10"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="11"><strong>Diagnostics Records</strong></td>
	
  
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="120"><strong>Istitution of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
  
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.diagnosis_id,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND
 diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id AND diagnosis.disease_id='$disease' AND outreach_record.institution_id='$university'  AND outreach_record.date_recorded BETWEEN '$date_from' AND '$date_to'";
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
 
 
 ?> <td align="center"><?php echo $rows->institution_name; ?></td>
	<td align="center" ><?php echo $rows->date_from; ?></td>
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
	<td align="center"><a href="home.php?admineditoutreach=admineditoutreach&outreach_record_id=<?php echo $rows->outreach_record_id;?>&diagnosis_id=<?php echo $rows->diagnosis_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_outreach.php?outreach_record_id=<?php echo $rows->outreach_record_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
	

    
	
   
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
   
	 <td align="center" colspan="2"><strong></strong></td>
	
	
    
    </tr> 
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
//echo "none";

?>
<table width="100%" border="0">

<tr bgcolor="#FFFFCC" ><td colspan="18" align="center"> 
  <?php 
  if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?></td>
  </tr>
  <form name="generate" method="post" action="">
  <tr  height="30" bgcolor="#FFFFCC">
	
    <td  width="70" colspan="5"><strong> Filter By: Institution of Origin : <select name="university">	
	<option value="0">Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
   
	
    
	<td align="right" colspan="2" ><strong>By Disease</strong></td>
	
	<td align="center" colspan="3"><strong><select name="disease">
	

	<option value="0">--------Select----------</option>
								  <?php
								  
								  $query1="select * from diseases order by disease_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->disease_id; ?>"><?php echo $rows1->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></strong></td>
	
    
    <td align="right" width="100"><strong>Date from</strong></td>
	<td align="center" colspan="2"><strong><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></strong></td>
	
	<td align="left" colspan="5"><strong>To : <input type="text" name="date_to" size="15" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td>
	
  
    
    </tr>
	
	</form>
	<script type="text/javascript">
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
  
  
  
  </script> 
	
	
  <tr bgcolor="#FFFFCC"><td colspan="18" align="right"><a href="admin_printoutreach.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="admin_printoutreachcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="admin_printoutreachword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  
  
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150" colspan="10"><strong>Staff Personal Details</strong></td>
	
	
    
    
    <td width="50" align="center" colspan="11"><strong>Diagnostics Records</strong></td>
	
  
    
    
    </tr>
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
	<td align="center" width="120"><strong>Istitution of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
  
    
    </tr>
  
  <?php 
 
$sql="SELECT insitution.institution_name,outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.diagnosis_id,diagnosis.female_pat,
diagnosis.child_pat,diseases.disease_name FROM outreach_record,diagnosis,diseases,insitution WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND diseases.disease_id=diagnosis.disease_id AND outreach_record.institution_id=insitution.institution_id";
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
 
 
 ?> <td><?php echo $rows->institution_name; ?></td>
	<td align="center" ><?php echo $rows->date_from; ?></td>
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
	<td align="center"><a href="home.php?admineditoutreach=admineditoutreach&outreach_record_id=<?php echo $rows->outreach_record_id;?>&diagnosis_id=<?php echo $rows->diagnosis_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_outreach.php?outreach_record_id=<?php echo $rows->outreach_record_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
	

    
	
   
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
   
	 <td align="center" colspan="2"><strong></strong></td>
	
	
    
    </tr> 
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



}

 ?>



