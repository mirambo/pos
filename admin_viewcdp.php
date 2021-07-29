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
	
    </tr>
	<tr bgcolor="#FFFFCC"><td colspan="13" align="center"><strong> Filter By: Institution of Origin : <select name="university">	
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
	<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><a href="adminprintcpd.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="adminprintcpdcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="adminprintcpdword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Inst. Of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM cdp order by cdp_id desc";
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
	<td align="center"><a href="home.php?admineditcpd=admineditcpd&cpd_id=<?php echo $rows->cdp_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_cpd.php?cpd_id=<?php echo $rows->cdp_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
   
    </tr>
  <?php 
  
  $ttl_part=$ttl_part+$rows->total_part;
  $ttl_male_part=$ttl_male_part+$rows->male_part;
  $ttl_female_part=$ttl_female_part+$rows->female_part;
  }
  ?>
  
   <tr  bgcolor="#FFFFCC" height="30" >
    <td align="center" width="150" colspan="5" ><strong>Totals</strong></td>
    
	<td align="center" width="150"><strong><?php echo $ttl_part; ?></strong></td>
	<td align="center" width="150"><strong><?php echo $ttl_male_part; ?></strong></td>
    <td width="180" align="center"><strong><?php echo $ttl_female_part; ?></strong></td>
    <td align="center" width="150" colspan="7" ><strong></strong></td>
   
    
    </tr>
  
  <?php
  
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
}else
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
	
    </tr>
	<tr bgcolor="#FFFFCC"><td colspan="13" align="center"><strong> Filter By: Institution of Origin : <select name="university">	
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
	<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><a href="adminprintcpd.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="adminprintcpdcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="adminprintcpdword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
<tr bgcolor="#FFFFCC" height="30"><td colspan="13" align="center">
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
    <td align="center" width="200"><strong>Inst. Of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM cdp where institution_id='$university'  order by cdp_id desc";
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
	<td align="center"><a href="home.php?admineditcpd=admineditcpd&cpd_id=<?php echo $rows->cdp_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_cpd.php?cpd_id=<?php echo $rows->cdp_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
   
    </tr>
  <?php 
  
  $ttl_part=$ttl_part+$rows->total_part;
  $ttl_male_part=$ttl_male_part+$rows->male_part;
  $ttl_female_part=$ttl_female_part+$rows->female_part;
  }
  ?>
  
   <tr  bgcolor="#FFFFCC" height="30" >
    <td align="center" width="150" colspan="5" ><strong>Totals</strong></td>
    
	<td align="center" width="150"><strong><?php echo $ttl_part; ?></strong></td>
	<td align="center" width="150"><strong><?php echo $ttl_male_part; ?></strong></td>
    <td width="180" align="center"><strong><?php echo $ttl_female_part; ?></strong></td>
    <td align="center" width="150" colspan="7" ><strong></strong></td>
   
    
    </tr>
  
  <?php
  
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
	
    </tr>
	<tr bgcolor="#FFFFCC"><td colspan="13" align="center"><strong> Filter By: Institution of Origin : <select name="university">	
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
	<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><a href="adminprintcpd.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="adminprintcpdcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="adminprintcpdword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
 <tr bgcolor="#FFFFCC" height="30"><td colspan="13" align="center">
<strong>
  
  For Period From : <font color="#ff0000">
  <?php echo $date_from;  ?> </font>
  
  To : <font color="#ff0000">
  <?php echo $date_to;  ?> </font>
  
  
  
  </strong> 
  
  
  </td></tr> 
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Inst. Of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM cdp where date_recorded BETWEEN '$date_from' AND '$date_to'  order by cdp_id desc";
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
	<td align="center"><a href="home.php?admineditcpd=admineditcpd&cpd_id=<?php echo $rows->cdp_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_cpd.php?cpd_id=<?php echo $rows->cdp_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
   
    </tr>
  <?php 
  
  $ttl_part=$ttl_part+$rows->total_part;
  $ttl_male_part=$ttl_male_part+$rows->male_part;
  $ttl_female_part=$ttl_female_part+$rows->female_part;
  }
  ?>
  
   <tr  bgcolor="#FFFFCC" height="30" >
    <td align="center" width="150" colspan="5" ><strong>Totals</strong></td>
    
	<td align="center" width="150"><strong><?php echo $ttl_part; ?></strong></td>
	<td align="center" width="150"><strong><?php echo $ttl_male_part; ?></strong></td>
    <td width="180" align="center"><strong><?php echo $ttl_female_part; ?></strong></td>
    <td align="center" width="150" colspan="7" ><strong></strong></td>
   
    
    </tr>
  
  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="13" align="center"><font color="#ff0000"><strong>No Results found</strong></font></td></tr>
  
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
//echo "inst and date only";

?>
<form name="generate" method="post" action="">
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
	
    </tr>
	<tr bgcolor="#FFFFCC"><td colspan="13" align="center"><strong> Filter By: Institution of Origin : <select name="university">	
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
	<tr bgcolor="#FFFFCC"><td colspan="13" align="right"><a href="adminprintcpd.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="adminprintcpdcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="adminprintcpdword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>
 <tr bgcolor="#FFFFCC" height="30"><td colspan="13" align="center">
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
    <td align="center" width="200"><strong>Inst. Of Origin</strong></td>
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
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM cdp where date_recorded BETWEEN '$date_from' AND '$date_to' and institution_id='$university'  order by cdp_id desc";
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
	<td align="center"><a href="home.php?admineditcpd=admineditcpd&cpd_id=<?php echo $rows->cdp_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a href="admin_delete_cpd.php?cpd_id=<?php echo $rows->cdp_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></td>
	
   
    </tr>
  <?php 
  
  $ttl_part=$ttl_part+$rows->total_part;
  $ttl_male_part=$ttl_male_part+$rows->male_part;
  $ttl_female_part=$ttl_female_part+$rows->female_part;
  }
  ?>
  
   <tr  bgcolor="#FFFFCC" height="30" >
    <td align="center" width="150" colspan="5" ><strong>Totals</strong></td>
    
	<td align="center" width="150"><strong><?php echo $ttl_part; ?></strong></td>
	<td align="center" width="150"><strong><?php echo $ttl_male_part; ?></strong></td>
    <td width="180" align="center"><strong><?php echo $ttl_female_part; ?></strong></td>
    <td align="center" width="150" colspan="7" ><strong></strong></td>
   
    
    </tr>
  
  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="13" align="center"><font color="#ff0000"><strong>No Results found</strong></font></td></tr>
  
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
echo "none";
}
}



?>


