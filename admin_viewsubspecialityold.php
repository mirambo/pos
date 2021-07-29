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

<?php 

if (!isset($_POST['filter']))

{
?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Filter By</strong></td>
    <td width="150" colspan="4"><strong>Institute :</strong>
	
	<select name="institution"><option>Select......................</option>
								  <?php
								  
								  $query1="select * from insitution";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->institution_id;?>"><?php echo $rows1->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
	
	
	
	
	
	
	</td>
    
	<td align="left" width="100" colspan="7">
	<strong>Start Date From:</strong>
	<input type="text" name="start_date" size="20" id="start_date" readonly="readonly" />
	
	<strong>To:</strong>
	<input type="text" name="end_date" size="20" id="end_date" readonly="readonly" />
	
	
	<input type="submit" name="filter" value="Generate"></td>
	<!--<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>-->
    
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
   <td align="center" width="150"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Benefiaciary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="150"><strong>University</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td align="center" width="170"><strong>Instit. Offering</strong></td>
    <td width="180" align="center"><strong>Spec. Area</strong></td>
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="100" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
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
  
    <td>
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	</td>
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
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	<td>
	
	<?php $rows->institution_offer_id;
	
$institution_offer_id=$rows->institution_offer_id;
$sqlspons="SELECT * FROM institution_offer where institution_offer_id='$institution_offer_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_offer_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->remarks;?></td>
	
   
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
      inputField  : "start_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "start_date"       // ID of the button
    }
  );
  
   Calendar.setup(
    {
      inputField  : "end_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "comp_date"       // ID of the button
    }
  );
  
 
  </script> 
<?php 

}

else 
{


$inst=$_POST['institution'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];

if ($inst!=0 && $start_date=='' && $end_date=='' )
{
?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Filter By</strong></td>
    <td width="150" colspan="4"><strong>Institute :</strong>
	
	<select name="institution"><option>Select......................</option>
								  <?php
								  
								  $query1="select * from insitution";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->institution_id;?>"><?php echo $rows1->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
	
	
	
	
	
	
	</td>
    
	<td align="left" width="100" colspan="7">
	<strong>Start Date From:</strong>
	<input type="text" name="start_date" size="20" id="start_date" readonly="readonly" />
	
	<strong>To:</strong>
	<input type="text" name="end_date" size="20" id="end_date" readonly="readonly" />
	
	
	<input type="submit" name="filter" value="Generate"></td>
   
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	
	<strong>Report for Institution : <font color="#ff0000">
	<?php
$query3="select * from insitution where institution_id='$inst'";
$results3=mysql_query($query3) or die ("Error: $query3.".mysql_error());
$rows3=mysql_fetch_object($results3);

echo $rows3->institution_name;

   ?> </font></strong>
   </td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
   <td align="center" width="150"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Benefiaciary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="150"><strong>University</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td align="center" width="170"><strong>Instit. Offering</strong></td>
    <td width="180" align="center"><strong>Spec. Area</strong></td>
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM sub_speciality where institution_id='$inst' order by sub_speciality_id desc";
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
  
    <td>
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	</td>
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
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	<td>
	
	<?php $rows->institution_offer_id;
	
$institution_offer_id=$rows->institution_offer_id;
$sqlspons="SELECT * FROM institution_offer where institution_offer_id='$institution_offer_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_offer_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->remarks;?></td>
	
   
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
      inputField  : "start_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "start_date"       // ID of the button
    }
  );
  
   Calendar.setup(
    {
      inputField  : "end_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "comp_date"       // ID of the button
    }
  );
  
 
  </script> 
<?php

}

elseif ($inst==0 && $start_date!='' && $end_date!='' )
{
//echo "date only";

?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Filter By</strong></td>
    <td width="150" colspan="4"><strong>Institute :</strong>
	
	<select name="institution"><option>Select......................</option>
								  <?php
								  
								  $query1="select * from insitution";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->institution_id;?>"><?php echo $rows1->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
	
	
	
	
	
	
	</td>
    
	<td align="left" width="100" colspan="7">
	<strong>Start Date From:</strong>
	<input type="text" name="start_date" size="20" id="start_date" readonly="readonly" />
	
	<strong>To:</strong>
	<input type="text" name="end_date" size="20" id="end_date" readonly="readonly" />
	
	
	<input type="submit" name="filter" value="Generate"></td>
   
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	
	<strong>Report for Start Date from : <font color="#ff0000">
	<?php echo $start_date; ?> </font> To: <font color="#ff0000"><?php echo $end_date; ?> </font>  </strong>
   </td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
   <td align="center" width="150"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Benefiaciary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="150"><strong>University</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td align="center" width="170"><strong>Instit. Offering</strong></td>
    <td width="180" align="center"><strong>Spec. Area</strong></td>
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM sub_speciality where start_date BETWEEN '$start_date' AND '$end_date' order by sub_speciality_id desc";
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
  
    <td>
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	</td>
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
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	<td>
	
	<?php $rows->institution_offer_id;
	
$institution_offer_id=$rows->institution_offer_id;
$sqlspons="SELECT * FROM institution_offer where institution_offer_id='$institution_offer_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_offer_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->remarks;?></td>
	
   
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
      inputField  : "start_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "start_date"       // ID of the button
    }
  );
  
   Calendar.setup(
    {
      inputField  : "end_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "comp_date"       // ID of the button
    }
  );
  
 
  </script> 
<?php

}

elseif ($inst!='' && $start_date!='' && $end_date!='' )
{
//echo "date and inst only";

?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Filter By</strong></td>
    <td width="150" colspan="4"><strong>Institute :</strong>
	
	<select name="institution"><option>Select......................</option>
								  <?php
								  
								  $query1="select * from insitution";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->institution_id;?>"><?php echo $rows1->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
	
	
	
	
	
	
	</td>
    
	<td align="left" width="100" colspan="7">
	<strong>Start Date From:</strong>
	<input type="text" name="start_date" size="20" id="start_date" readonly="readonly" />
	
	<strong>To:</strong>
	<input type="text" name="end_date" size="20" id="end_date" readonly="readonly" />
	
	
	<input type="submit" name="filter" value="Generate"></td>
   
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	
	<strong>Report for Istitution: 
	
	<font color="#ff0000"><?php 
	
	
$sql6="SELECT * FROM insitution where institution_id='$inst'";
$results6= mysql_query($sql6) or die ("Error $sql6.".mysql_error());
$rows6=mysql_fetch_object($results6);
	
	echo $rows6->institution_name;
	
	?></font>

	Start Date from : <font color="#ff0000">
	<?php echo $start_date; ?> </font> To: <font color="#ff0000"><?php echo $end_date; ?> </font>  </strong>
   </td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
   <td align="center" width="150"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Benefiaciary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="150"><strong>University</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td align="center" width="170"><strong>Instit. Offering</strong></td>
    <td width="180" align="center"><strong>Spec. Area</strong></td>
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM sub_speciality where start_date BETWEEN '$start_date' AND '$end_date' AND institution_id='$inst' order by sub_speciality_id desc";
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
  
    <td>
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	</td>
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
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	<td>
	
	<?php $rows->institution_offer_id;
	
$institution_offer_id=$rows->institution_offer_id;
$sqlspons="SELECT * FROM institution_offer where institution_offer_id='$institution_offer_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_offer_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->remarks;?></td>
	
   
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
      inputField  : "start_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "start_date"       // ID of the button
    }
  );
  
   Calendar.setup(
    {
      inputField  : "end_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "comp_date"       // ID of the button
    }
  );
  
 
  </script> 
<?php

}

elseif ($inst==0 && $start_date=='' && $end_date=='' )

{
?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Filter By</strong></td>
    <td width="150" colspan="4"><strong>Institute :</strong>
	
	<select name="institution"><option>Select......................</option>
								  <?php
								  
								  $query1="select * from insitution";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->institution_id;?>"><?php echo $rows1->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
	
	
	
	
	
	
	</td>
    
	<td align="left" width="100" colspan="7">
	<strong>Start Date From:</strong>
	<input type="text" name="start_date" size="20" id="start_date" readonly="readonly" />
	
	<strong>To:</strong>
	<input type="text" name="end_date" size="20" id="end_date" readonly="readonly" />
	
	
	<input type="submit" name="filter" value="Generate"></td>
	<!--<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>-->
    
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
   <td align="center" width="150"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Benefiaciary</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="150"><strong>University</strong></td>
	<td align="center" width="150"><strong>Start Date</strong></td>
    <td width="180" align="center"><strong>Completion Date</strong></td>
    <td align="center" width="170"><strong>Instit. Offering</strong></td>
    <td width="180" align="center"><strong>Spec. Area</strong></td>
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="100" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
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
  
    <td>
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	</td>
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
	<td align="center"><?php echo $rows->start_date;?></td>
	<td align="center">
	<?php echo $rows->comp_date;?>
    </td>
	<td>
	
	<?php $rows->institution_offer_id;
	
$institution_offer_id=$rows->institution_offer_id;
$sqlspons="SELECT * FROM institution_offer where institution_offer_id='$institution_offer_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_offer_name;
	
	?>
	
	</td>
	<td><?php echo $rows->subspecility_area;?></td>
	<td><?php echo $rows->phone;?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->remarks;?></td>
	
   
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
      inputField  : "start_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "start_date"       // ID of the button
    }
  );
  
   Calendar.setup(
    {
      inputField  : "end_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "comp_date"       // ID of the button
    }
  );
  
 
  </script> 
<?php 





}




}


?>





