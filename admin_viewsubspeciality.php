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
<form name="generate" method="post" action="">

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="14" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
	<tr bgcolor="#FFFFCC"><td colspan="14" align="center"><strong> Filter By: Institution of Origin : <select name="university">	
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
								  
								  </select></strong><strong>Date from</strong><input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><strong>To : <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td></tr>
	<tr bgcolor="#FFFFCC"><td colspan="14" align="right"><a href="adminprintsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="adminprintsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="adminprintsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="180"><strong>Inst. Of Origin</strong></td>
    <td align="center" width="180"><strong>Beneficiary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="180"><strong>Host Institution</strong></td>
	<td align="center" width="150"><strong>Area of Subspeciality</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td width="180" align="center"><strong>Phone</strong></td>
	<td width="100" align="center"><strong>Email</strong></td>
	<td align="center" width="150"><strong>Sponsors</strong></td>
	<td align="center" width="170"><strong>Remarks</strong></td>
	<td width="10" align="center"><strong>Edit</strong></td>
	<td width="10" align="center"><strong>Del</strong></td>
	
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM sub_speciality order by sub_speciality_id desc";
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
  <td><?php 
	$institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?></td>
    <td><?php echo $rows->ben_fname;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td>
	<?php $rows->university_id;
	
$university_id=$rows->university_id;
$sqluni="SELECT * FROM university where university_id='$university_id'";
$resultsuni= mysql_query($sqluni) or die ("Error $sqlsuni.".mysql_error());
$rowsuni=mysql_fetch_object($resultsuni);
	
	echo $rowsuni->university_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	
	
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->sponsor1.','.$rows->sponsor2.','.$rows->sponsor3;?></td>
	<td><?php echo $rows->remarks;?></td>
	<td align="center"><a href="home.php?admineditsubspeciality=admineditsubspeciality&sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_subspeciality.php?sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>

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
<?php 
}
else
{
$university=$_POST['university'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($university!='0' && $date_from=='' && $date_to=='')
{

//echo "inst only";
?>
<form name="generate" method="post" action="">

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="14" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
	<tr bgcolor="#FFFFCC"><td colspan="14" align="center"><strong> Filter By: Institution of Origin : <select name="university">	
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
								  
								  </select></strong><strong>Date from</strong><input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><strong>To : <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td></tr>
	<tr bgcolor="#FFFFCC"><td colspan="14" align="right"><a href="adminprintsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="adminprintsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="adminprintsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
    </tr>
  <tr bgcolor="#FFFFCC"><td colspan="14" align="center" height="30">
  
<strong>
  
  For Institute Of Origin: <font color="#ff0000">
  <?php 
  $queryinstf="SELECT * FROM insitution where institution_id='$university'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->institution_name;
  
  
  ?>
  
  </font>
  </strong> 
  
  </td></tr>
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="180"><strong>Inst. Of Origin</strong></td>
    <td align="center" width="180"><strong>Beneficiary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="180"><strong>Host Institution</strong></td>
	<td align="center" width="150"><strong>Area of Subspeciality</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td width="180" align="center"><strong>Phone</strong></td>
	<td width="100" align="center"><strong>Email</strong></td>
	<td align="center" width="150"><strong>Sponsors</strong></td>
	<td align="center" width="170"><strong>Remarks</strong></td>
	<td width="10" align="center"><strong>Edit</strong></td>
	<td width="10" align="center"><strong>Del</strong></td>
	
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM sub_speciality WHERE institution_id='$university' order by sub_speciality_id desc";
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
  <td><?php 
	$institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?></td>
    <td><?php echo $rows->ben_fname;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td>
	<?php $rows->university_id;
	
$university_id=$rows->university_id;
$sqluni="SELECT * FROM university where university_id='$university_id'";
$resultsuni= mysql_query($sqluni) or die ("Error $sqlsuni.".mysql_error());
$rowsuni=mysql_fetch_object($resultsuni);
	
	echo $rowsuni->university_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	
	
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->sponsor1.','.$rows->sponsor2.','.$rows->sponsor3;?></td>
	<td><?php echo $rows->remarks;?></td>
	<td align="center"><a href="home.php?admineditsubspeciality=admineditsubspeciality&sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_subspeciality.php?sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>

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
<?php 
}
elseif ($university=='0' && $date_from!='' && $date_to!='')
{
//echo "date only";
?>
<form name="generate" method="post" action="">

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="14" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
	<tr bgcolor="#FFFFCC"><td colspan="14" align="center"><strong> Filter By: Institution of Origin : <select name="university">	
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
								  
								  </select></strong><strong>Date from</strong><input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><strong>To : <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td></tr>
	<tr bgcolor="#FFFFCC"><td colspan="14" align="right"><a href="adminprintsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="adminprintsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="adminprintsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
    </tr>
  <tr bgcolor="#FFFFCC"><td colspan="14" align="center" height="30">
  
<strong>
  
  For Period From : <font color="#ff0000">
  <?php echo $date_from;  ?> </font>
  
  To : <font color="#ff0000">
  <?php echo $date_to;  ?> </font>
  
  
  
  </strong>   
  </td></tr>
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="180"><strong>Inst. Of Origin</strong></td>
    <td align="center" width="180"><strong>Beneficiary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="180"><strong>Host Institution</strong></td>
	<td align="center" width="150"><strong>Area of Subspeciality</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td width="180" align="center"><strong>Phone</strong></td>
	<td width="100" align="center"><strong>Email</strong></td>
	<td align="center" width="150"><strong>Sponsors</strong></td>
	<td align="center" width="170"><strong>Remarks</strong></td>
	<td width="10" align="center"><strong>Edit</strong></td>
	<td width="10" align="center"><strong>Del</strong></td>
	
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM sub_speciality WHERE date_recorded BETWEEN '$date_from' AND '$date_to' order by sub_speciality_id desc";
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
  <td><?php 
	$institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?></td>
    <td><?php echo $rows->ben_fname;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td>
	<?php $rows->university_id;
	
$university_id=$rows->university_id;
$sqluni="SELECT * FROM university where university_id='$university_id'";
$resultsuni= mysql_query($sqluni) or die ("Error $sqlsuni.".mysql_error());
$rowsuni=mysql_fetch_object($resultsuni);
	
	echo $rowsuni->university_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	
	
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->sponsor1.','.$rows->sponsor2.','.$rows->sponsor3;?></td>
	<td><?php echo $rows->remarks;?></td>
	<td align="center"><a href="home.php?admineditsubspeciality=admineditsubspeciality&sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_subspeciality.php?sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>

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
<?php 

}
elseif ($university!='0' && $date_from!='' && $date_to!='')
{
//echo "date and inst";
?>
<form name="generate" method="post" action="">

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="14" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
	<tr bgcolor="#FFFFCC"><td colspan="14" align="center"><strong> Filter By: Institution of Origin : <select name="university">	
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
								  
								  </select></strong><strong>Date from</strong><input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><strong>To : <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td></tr>
	<tr bgcolor="#FFFFCC"><td colspan="14" align="right"><a href="adminprintsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="adminprintsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="adminprintsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
    </tr>
  <tr bgcolor="#FFFFCC"><td colspan="14" align="center" height="30">
  
<strong>
For Institute Of Origin: <font color="#ff0000">
  <?php 
  $queryinstf="SELECT * FROM insitution where institution_id='$university'";
  $resultsinstf=mysql_query($queryinstf) or die ("Error: $queryinstf.".mysql_error());
  $rowsinstf=mysql_fetch_object($resultsinstf);
  
  echo $rowsinstf->institution_name;
  
  
  ?>
  
  </font>
  
  For Period From : <font color="#ff0000">
  <?php echo $date_from;  ?> </font>
  
  To : <font color="#ff0000">
  <?php echo $date_to;  ?> </font>
  
  
  
  </strong>   
  </td></tr>
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="180"><strong>Inst. Of Origin</strong></td>
    <td align="center" width="180"><strong>Beneficiary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="180"><strong>Host Institution</strong></td>
	<td align="center" width="150"><strong>Area of Subspeciality</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td width="180" align="center"><strong>Phone</strong></td>
	<td width="100" align="center"><strong>Email</strong></td>
	<td align="center" width="150"><strong>Sponsors</strong></td>
	<td align="center" width="170"><strong>Remarks</strong></td>
	<td width="10" align="center"><strong>Edit</strong></td>
	<td width="10" align="center"><strong>Del</strong></td>
	
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM sub_speciality WHERE date_recorded BETWEEN '$date_from' AND '$date_to' AND institution_id='$university' order by sub_speciality_id desc";
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
  <td><?php 
	$institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?></td>
    <td><?php echo $rows->ben_fname;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td>
	<?php $rows->university_id;
	
$university_id=$rows->university_id;
$sqluni="SELECT * FROM university where university_id='$university_id'";
$resultsuni= mysql_query($sqluni) or die ("Error $sqlsuni.".mysql_error());
$rowsuni=mysql_fetch_object($resultsuni);
	
	echo $rowsuni->university_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	
	
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->sponsor1.','.$rows->sponsor2.','.$rows->sponsor3;?></td>
	<td><?php echo $rows->remarks;?></td>
	<td align="center"><a href="home.php?admineditsubspeciality=admineditsubspeciality&sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_subspeciality.php?sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>

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
<?php 

}
else
{
//echo "none";
?>
<form name="generate" method="post" action="">

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="14" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
	<tr bgcolor="#FFFFCC"><td colspan="14" align="center"><strong> Filter By: Institution of Origin : <select name="university">	
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
								  
								  </select></strong><strong>Date from</strong><input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><strong>To : <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /> <input type="submit" name="submit" value="Generate"></strong></td></tr>
	<tr bgcolor="#FFFFCC"><td colspan="14" align="right"><a href="adminprintsubspeciality.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="adminprintsubspecialitycsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="adminprintsubspecialityword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="180"><strong>Inst. Of Origin</strong></td>
    <td align="center" width="180"><strong>Beneficiary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="180"><strong>Host Institution</strong></td>
	<td align="center" width="150"><strong>Area of Subspeciality</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td width="180" align="center"><strong>Phone</strong></td>
	<td width="100" align="center"><strong>Email</strong></td>
	<td align="center" width="150"><strong>Sponsors</strong></td>
	<td align="center" width="170"><strong>Remarks</strong></td>
	<td width="10" align="center"><strong>Edit</strong></td>
	<td width="10" align="center"><strong>Del</strong></td>
	
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM sub_speciality order by sub_speciality_id desc";
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
  <td><?php 
	$institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?></td>
    <td><?php echo $rows->ben_fname;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td>
	<?php $rows->university_id;
	
$university_id=$rows->university_id;
$sqluni="SELECT * FROM university where university_id='$university_id'";
$resultsuni= mysql_query($sqluni) or die ("Error $sqlsuni.".mysql_error());
$rowsuni=mysql_fetch_object($resultsuni);
	
	echo $rowsuni->university_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	
	
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->sponsor1.','.$rows->sponsor2.','.$rows->sponsor3;?></td>
	<td><?php echo $rows->remarks;?></td>
	<td align="center"><a href="home.php?admineditsubspeciality=admineditsubspeciality&sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_subspeciality.php?sub_speciality_id=<?php echo $rows->sub_speciality_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>

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
<?php 

}




}




