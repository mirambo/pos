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
   
    <td colspan="11" height="30" align="center"> 
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
	
	<select name="institution"><option>Select..........................................</option>
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
    
	<td align="left" width="100" colspan="5">
	
	<strong>Admission Year From:</strong>
	
	<select name="admin_year_from">
	                  <option>Select.....</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
								  
								  
								  <strong>To:</strong>
								  
	
	<select name="admin_year_to">
	                  <option>Select......</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
	
	
	
	
	<input type="submit" name="filter" value="Generate"></td>
	<!--<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>-->
    
    </tr>
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Student</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="100"><strong>Year of admission</strong></td>
	<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM post_grad_scholarship order by post_grad_scholarship_id desc";
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
    <td >
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	
	
	
	
	
	</td>
    <td><?php echo $rows->full_name;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td><?php echo $rows->admin_year;?></td>
	<td align="center"><?php echo $rows->comp_year;?></td>
	<td>
	<?php echo $rows->sponsor;?>
    </td>
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

<?php 
}

else {

$inst=$_POST['institution'];
$admin_year_from=$_POST['admin_year_from'];
$admin_year_to=$_POST['admin_year_to'];

if ($inst!=0 && $admin_year_from==0 && $admin_year_from==0 )

{

?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
	
	<select name="institution"><option>Select..........................................</option>
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
    
	<td align="left" width="100" colspan="5">
	
	<strong>Admission Year From:</strong>
	
	<select name="admin_year_from">
	                  <option>Select.....</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
								  
								  
								  <strong>To:</strong>
								  
	
	<select name="admin_year_to">
	                  <option>Select......</option>
								  
										  
                                    <option value="2020">2000</option>
									<option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
	
	
	<input type="submit" name="filter" value="Generate"></td>
	<!--<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>-->
    
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
    <td align="center" width="200"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Student</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="100"><strong>Year of admission</strong></td>
	<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
	
  
  <?php 
 
$sql="SELECT * FROM post_grad_scholarship where institution_id='$inst' order by post_grad_scholarship_id desc";
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
    <td >
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	
	
	
	
	
	</td>
    <td><?php echo $rows->full_name;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td><?php echo $rows->admin_year;?></td>
	<td align="center"><?php echo $rows->comp_year;?></td>
	<td>
	<?php echo $rows->sponsor;
	

	
	?>
    </td>
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

<?php 
}

elseif ($inst==0 && $admin_year_from!=0 && $admin_year_to==0 )
{

//echo "one year only";
?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
	
	<select name="institution"><option>Select..........................................</option>
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
    
	<td align="left" width="100" colspan="5">
	
	<strong>Admission Year From:</strong>
	
	<select name="admin_year_from">
	                  <option>Select.....</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
								  
								  
								  <strong>To:</strong>
								  
	
	<select name="admin_year_to">
	                  <option>Select......</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
	
	
	<input type="submit" name="filter" value="Generate"></td>
	<!--<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>-->
    
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	
	<strong>All Report for Admission Year : <font color="#ff0000">
	<?php
echo $admin_year_from;

   ?> </font></strong>
   </td>
	
    </tr>
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Student</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="100"><strong>Year of admission</strong></td>
	<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
	
  
  <?php 
 
$sql="SELECT * FROM post_grad_scholarship where admin_year='$admin_year_from' order by post_grad_scholarship_id desc";
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
    <td >
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	
	
	
	
	
	</td>
    <td><?php echo $rows->full_name;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td><?php echo $rows->admin_year;?></td>
	<td align="center"><?php echo $rows->comp_year;?></td>
	<td>
	<?php echo $rows->sponsor;
	

	
	?>
    </td>
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

<?php 



}

elseif ($inst==0 && $admin_year_from!=0 && $admin_year_to!=0 )
{

//echo "Range of years";

?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
	
	<select name="institution"><option>Select..........................................</option>
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
    
	<td align="left" width="100" colspan="5">
	
	<strong>Admission Year From:</strong>
	
	<select name="admin_year_from">
	                  <option>Select.....</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
								  
								  
								  <strong>To:</strong>
								  
	
	<select name="admin_year_to">
	                  <option>Select......</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
	
	
	<input type="submit" name="filter" value="Generate"></td>
	<!--<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>-->
    
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	
	<strong>All Report for Admissions From Year : <font color="#ff0000">
	<?php
echo $admin_year_from;

   ?> </font>To Year : <font color="#ff0000"><?php
echo $admin_year_to;

   ?> </font></strong>
   </td>
	
    </tr>
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Student</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="100"><strong>Year of admission</strong></td>
	<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
	
  
  <?php 
 
$sql="SELECT * FROM post_grad_scholarship where admin_year BETWEEN '$admin_year_from' AND '$admin_year_to' order by post_grad_scholarship_id desc";
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
    <td >
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	
	
	
	
	
	</td>
    <td><?php echo $rows->full_name;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td><?php echo $rows->admin_year;?></td>
	<td align="center"><?php echo $rows->comp_year;?></td>
	<td>
	<?php echo $rows->sponsor;
	

	
	?>
    </td>
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

<?php 





}

elseif ($inst!=0 && $admin_year_from!=0 && $admin_year_to==0 )
{

//echo "Inst and One year only";

?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
	
	<select name="institution"><option>Select..........................................</option>
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
    
	<td align="left" width="100" colspan="5">
	
	<strong>Admission Year From:</strong>
	
	<select name="admin_year_from">
	                  <option>Select.....</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
								  
								  
								  <strong>To:</strong>
								  
	
	<select name="admin_year_to">
	                  <option>Select......</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
	
	
	<input type="submit" name="filter" value="Generate"></td>
	<!--<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>-->
    
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	
	<strong>All Admissions Report for Institution : <font color="#ff0000"><?php 
	
$query3="select * from insitution where institution_id='$inst'";
$results3=mysql_query($query3) or die ("Error: $query3.".mysql_error());
$rows3=mysql_fetch_object($results3);

echo $rows3->institution_name;
	
	
	?></font>


	For Admission Year : <font color="#ff0000">
	<?php
echo $admin_year_from;

   ?> </font></strong>
   </td>
	
    </tr>
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Student</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="100"><strong>Year of admission</strong></td>
	<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
	
  
  <?php 
 
$sql="SELECT * FROM post_grad_scholarship where admin_year='$admin_year_from' and institution_id='$inst' order by post_grad_scholarship_id desc";
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
    <td >
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	
	
	
	
	
	</td>
    <td><?php echo $rows->full_name;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td><?php echo $rows->admin_year;?></td>
	<td align="center"><?php echo $rows->comp_year;?></td>
	<td>
	<?php echo $rows->sponsor;
	

	
	?>
    </td>
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

<?php 







}

elseif ($inst!=0 && $admin_year_from!=0 && $admin_year_to!=0 )
{

//echo "Inst and range of years";

?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
	
	<select name="institution"><option>Select..........................................</option>
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
    
	<td align="left" width="100" colspan="5">
	
	<strong>Admission Year From:</strong>
	
	<select name="admin_year_from">
	                  <option>Select.....</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
								  
								  
								  <strong>To:</strong>
								  
	
	<select name="admin_year_to">
	                  <option>Select......</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
	
	
	<input type="submit" name="filter" value="Generate"></td>
	<!--<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>-->
    
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	
	<strong>All Admissions Report for Institution : <font color="#ff0000"><?php 
	
$query3="select * from insitution where institution_id='$inst'";
$results3=mysql_query($query3) or die ("Error: $query3.".mysql_error());
$rows3=mysql_fetch_object($results3);

echo $rows3->institution_name;
	
	
	?></font>


	For Admission Year From : <font color="#ff0000">
	<?php
echo $admin_year_from;

   ?> </font> To: <font color="#ff0000">
   
   <?php 
   
   echo $admin_year_to;
   
   ?>
   </font></strong>
   </td>
	
    </tr>
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Student</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="100"><strong>Year of admission</strong></td>
	<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
	
  
  <?php 
 
$sql="SELECT * FROM post_grad_scholarship where admin_year BETWEEN '$admin_year_from' AND '$admin_year_to'  AND institution_id='$inst' order by post_grad_scholarship_id desc";
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
    <td >
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	
	
	
	
	
	</td>
    <td><?php echo $rows->full_name;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td><?php echo $rows->admin_year;?></td>
	<td align="center"><?php echo $rows->comp_year;?></td>
	<td>
	<?php echo $rows->sponsor;
	

	
	?>
    </td>
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

<?php 



}

else
{

//echo "back";

?>
<form name="filter" method="post" action="">
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
	
	<select name="institution"><option>Select..........................................</option>
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
    
	<td align="left" width="100" colspan="5">
	
	<strong>Admission Year From:</strong>
	
	<select name="admin_year_from">
	                  <option>Select.....</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
								  
								  
								  <strong>To:</strong>
								  
	
	<select name="admin_year_to">
	                  <option>Select......</option>
								  
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select>
	
	
	
	
	<input type="submit" name="filter" value="Generate"></td>
	<!--<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>-->
    
    </tr>
	
	<tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Institution</strong></td>
    <td align="center" width="150"><strong>Student</strong></td>
    <td align="center" width="100"><strong>Gender</strong></td>
    <td align="center" width="100"><strong>Nationality</strong></td>
	<td align="center" width="100"><strong>Year of admission</strong></td>
	<td align="center" width="150"><strong>Year of completion</strong></td>
    <td width="180" align="center"><strong>Sponsor</strong></td>
    
	<td width="180" align="center"><strong>Phone</strong></td>
	<td width="180" align="center"><strong>Email</strong></td>
	<td width="180" align="center"><strong>Remarks</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM post_grad_scholarship order by post_grad_scholarship_id desc";
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
    <td >
	<?php $institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
	
	echo $rowssponsor->institution_name;
	
	?>
	
	
	
	
	
	
	</td>
    <td><?php echo $rows->full_name;?></td>
    <td align="center"><?php echo $rows->gender;?></td>
	<td><?php echo $rows->nationality;?></td>
	<td><?php echo $rows->admin_year;?></td>
	<td align="center"><?php echo $rows->comp_year;?></td>
	<td>
	<?php echo $rows->sponsor;?>
    </td>
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

<?php 


}





}


?>



