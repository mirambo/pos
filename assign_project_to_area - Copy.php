<?php
$project_id=$_POST['project_id'];
if (isset($_POST['assign_project']) && !isset($_POST['assign_project_area']) && !isset($_POST['assign_project_location']) && !isset($_POST['assign_project_settlement']))
{//$project_id=$_GET['project_id'];
/*$sqlaloc="INSERT INTO alloc VALUES('')" or die(mysql_error());
$resultsaloc=mysql_query($sqlaloc) or die ("Error $sqlaloc.".mysql_error());
$rowsalloc=mysql_fetch_object($resultsaloc);


$sqlprofd= "SELECT * from alloc order by alloc_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$latest_alloc_id=$rowsprofd->alloc_id;*/


assign_project($project_id);

}

if (isset($_POST['assign_project']) && isset($_POST['assign_project_area']) && !isset($_POST['assign_project_location']) && !isset($_POST['assign_project_settlement']))
{//$project_id=$_GET['project_id'];

assign_project_area($project_id);
}

if (!isset($_POST['assign_project']) && !isset($_POST['assign_project_area']) && isset($_POST['assign_project_location']) && !isset($_POST['assign_project_settlement']))
{//$project_id=$_GET['project_id'];


assign_project_location($project_id);

}

if (!isset($_POST['assign_project']) && !isset($_POST['assign_project_area']) && !isset($_POST['assign_project_location']) && isset($_POST['assign_project_settlement']))
{//$project_id=$_GET['project_id'];


assign_project_settlement($project_id);
}




 ?><?php //echo $project_id=$_GET['project_id'];?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<!--<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>-->

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:1px solid black;
font-size:12px;
</Style>


<form name="emp" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">	

<?php 



?>		
<table width="100%" border="1">
  <tr bgcolor="#FFFFCC">

	<td colspan="3" height="30" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	
	<?php
if (!isset($_POST['assign_project']))
{
	?>
	
	
	
  <tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="4" align="center">  <strong>Select Project<font color="#FF0000">* </font></strong>
	<select name="project_id"><option>Select..........................................................</option>
								  <?php
								  
								  $query1="select * from nrc_project order by project_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->project_id;?>"><?php echo $rows1->project_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select></td>
    
  </tr>
  
  
<?php 
}
else
{

}


?>  
  

  
  <?php
if (!isset($_POST['assign_project']) && !isset($_POST['assign_project_area']) && !isset($_POST['assign_project_location']) && !isset($_POST['assign_project_settlement']))
{
 ?>
   <!--<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Project Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="project_name" value="<?php echo $rows->project_name;?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr> <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Start Date<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="start_date" id="start_date" readonly="" value="<?php echo $rows->start_date;?>" ></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr> <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">End Date<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="end_date" id="end_date" readonly="" value="<?php echo $rows->end_date;?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>  <tr height="20">
    <td>&nbsp;</td>
    <td>Description</td>
    <td><textarea name="project_desc" cols="30" rows="5"><?php echo $rows->project_desc;?></textarea></td>
    </tr> -->
	
<tr>
    
    <td colspan="3" valign="top" align="center">
	
	
	
	
	
	
	<table  width="80%" border="0" class="table1" >
	 <tr  align="center" bgcolor="#fff">	

<td colspan="3"><img src="images/step1.png" height="25"></td>  
  </tr>
<tr  align="center">	

<td colspan="3"><strong><h4>Implementation Country</h4></strong></td>  
  </tr>
 
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Country Code</strong></td>
	<td width="200"><strong>Country Name</strong></td>  
  </tr>
	<?php
								  
/*$queryst="SELECT nrc_area.area_id,nrc_area.area_name FROM nrc_area
LEFT OUTER JOIN nrc_projectvsarea ON nrc_projectvsarea.area_id=nrc_area.area_id
WHERE nrc_projectvsarea.project_id='$project_id'";*/
$queryst="SELECT * FROM nrc_country order by country_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	    <td align="center">
		<?php 
		//echo $project_id=$rows->project_id;
		?>
		<input type="checkbox" name="country_id[]" value="<?php echo $rowsst->country_id;?>">
		
		</td>
						
	   <td><?php echo $rowsst->country_code; ?></td>
	   
	    <td><?php echo $rowsst->country_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>No Matching Records Found</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
  
   
    <td align="center" colspan="3"><input type="submit" name="submit" value="Proceed To Assigning Project To Areas>>"><input type="hidden" name="assign_project" id="assign_project" value="1">&nbsp;&nbsp;</td>
  
	
  </tr>
	

	</table>
	

</form>
</td>
<?php
}
if (!isset($_POST['assign_project_area']) && isset($_POST['assign_project']))
{?>

<table align="center" width="80%" border="0" class="table1" >


<tr  align="center" bgcolor="#fff">	

<td colspan="3"><img src="images/step2.png" height="25">

<input type="hidden" name="project_id" value="<?php echo $project_id ?>">





</td>  
  </tr>
	
<tr  align="center" bgcolor="#FFFFCC">	
<td colspan="3"><strong>
Project : 
<?php
$sqlpr="SELECT * FROM nrc_project where project_id='$project_id'";
$resultspr= mysql_query($sqlpr) or die ("Error $sqlpr.".mysql_error());
$rowspr=mysql_fetch_object($resultspr);


echo "<font color='#ff0000'>".$rowspr->project_name."</font> ";
 ?>
In Countrie (s) :  <?php 
$sqlcn="SELECT * FROM nrc_project,nrc_country,nrc_projectvscountry where nrc_projectvscountry.country_id=nrc_country.country_id 
AND nrc_projectvscountry.project_id=nrc_project.project_id AND nrc_projectvscountry.project_id='$project_id' group by nrc_country.country_id ";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
//$rowscn=mysql_fetch_object($resultscn);

if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
									  {
									 echo $rowscn->country_name;
									  }
									  
									  
									  }
									  ?>



</strong></td></td>   
  </tr>
  <tr  align="center">	
<td colspan="3"><strong>
<h4>Implementation Area</h4>


</strong></td></td>   
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Area Code</strong></td>
	<td width="200"><strong>Area Name</strong></td>  
	 
  </tr>
  
  
<?php 
$sqlcn="SELECT * FROM nrc_project,nrc_country,nrc_projectvscountry where nrc_projectvscountry.country_id=nrc_country.country_id 
AND nrc_projectvscountry.project_id=nrc_project.project_id group by nrc_country.country_id";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
//$rowscn=mysql_fetch_object($resultscn);

if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
									  {
									 
									  
									  ?>
  <tr><td colspan="3">Country : <?php echo  $rowscn->country_name; echo $country_id=$rowscn->country_id; ?></td></tr>
  
	<?php
								  
/*$queryst="SELECT nrc_area.area_id,nrc_area.area_name FROM nrc_area
LEFT OUTER JOIN nrc_projectvsarea ON nrc_projectvsarea.area_id=nrc_area.area_id
WHERE nrc_projectvsarea.project_id='$project_id'";*/
$queryst="SELECT * FROM nrc_area where country_id='$country_id' order by area_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	    <td align="center">
		<?php 
		//echo $project_id=$rows->project_id;
		?>
		<input type="checkbox" name="area_id[]" value="<?php echo $rowsst->area_id;?>">
		
		</td>
						
	   <td><?php echo $rowsst->area_code; ?></td>
	   
	    <td><?php echo $rowsst->area_name; ?></td>
	
	   
   
    

  </tr>
  
									
									  
									  <?php 
									  }
									  
									  }
									  

	}
									  }




								  
									  
									  
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>No Matching Records Found</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
								  
								
	
	
	

	<tr height="40">
  
   
    <td align="center" colspan="3"><input type="submit" name="submit" value="Proceed To Assigning Project To Locations>>"><input type="hidden" name="assign_project_area" id="assign_project_area" value="1">&nbsp;&nbsp;</td>

	
  </tr>
	
	
	</table></td>
	

	
<?php


}

if (!isset($_POST['assign_project_location']) && isset($_POST['assign_project_area']) )
{?>
<table align="center" width="80%" border="0" class="table1" >
	<tr  align="center" bgcolor="#fff">	

<td colspan="3"><img src="images/step3.png" height="25">

<input type="hidden" name="project_id" value="<?php echo $project_id ?>">

</td>  
  </tr>
	<tr  align="center">	

	<td colspan="3"><strong><h4>Implementation Location</h4></strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Location Code</strong></td>
	<td width="200"><strong>Location Name</strong></td>  
  </tr>
	<?php
								  
/*$queryst="SELECT nrc_location.location_id,nrc_location.location_name FROM nrc_location
LEFT OUTER JOIN nrc_projectvslocation ON nrc_projectvslocation.location_id=nrc_location.location_id
WHERE nrc_projectvslocation.project_id='$project_id'";*/
$queryst="SELECT * FROM nrc_location order by location_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	    <td align="center">
		<?php 
		//echo $project_id=$rows->project_id;
		?>
		<input type="checkbox" name="location_id[]" value="<?php echo $rowsst->location_id;?>">
		
		</td>
						
	   <td><?php echo $rowsst->location_code; ?></td>
	   
	    <td><?php echo $rowsst->location_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>No Matching Records Found</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
  
   
    <td align="center" colspan="3"><input type="submit" name="submit" value="Proceed To Assigning Project To Settlements>>"><input type="hidden" name="assign_project_location" id="assign_project_location" value="1">&nbsp;&nbsp;</td>

	
  </tr>
	
	
	</table>

<?php
}

if (!isset($_POST['assign_project_settlement']) && isset($_POST['assign_project_location']) )
{?>

<table align="center" width="80%" border="0" class="table1" >
	<tr  align="center" bgcolor="#fff">	

<td colspan="3"><img src="images/step4.png" height="25">
<input type="hidden" name="project_id" value="<?php echo $project_id ?>">

</td>  
  </tr>
	<tr  align="center">	

	<td colspan="3"><strong><h4>Implementation Settlement</h4></strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Settlement Code</strong></td>
	<td width="200"><strong>Settlement Name</strong></td>  
  </tr>
	<?php
								  
								  /*$queryst="SELECT nrc_settlement.settlement_id,nrc_settlement.settlement_name FROM nrc_settlement
LEFT OUTER JOIN nrc_projectvssettlement ON nrc_projectvssettlement.settlement_id=nrc_settlement.settlement_id
WHERE nrc_projectvssettlement.project_id='$project_id'";*/
$queryst="SELECT * FROM nrc_settlement order by settlement_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	   <td align="center">
		<?php 
		//echo $project_id=$rows->project_id;
		?>
		<input type="checkbox" name="settlement_id[]" value="<?php echo $rowsst->settlement_id;?>">
		
		</td>
						
	   <td><?php echo $rowsst->settlement_code; ?></td>
	   
	    <td><?php echo $rowsst->settlement_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>No Matching Records Found</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
  
   
    <td align="center" colspan="3"><input type="submit" name="submit" value="Save Record"><input type="hidden" name="assign_project_settlement" id="assign_project_settlement" value="1">&nbsp;&nbsp;</td>

	
  </tr>
	
	
	</table>



<?php
}
 ?>

<!--
	
	
	
	
	<table align="right" width="80%" border="0" class="table1" >
	
	<tr  align="center">	

<td colspan="3"><strong><h4>Implementation Area</h4></strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Area Code</strong></td>
	<td width="200"><strong>Area Name</strong></td>  
  </tr>
	<?php
								  
/*$queryst="SELECT nrc_area.area_id,nrc_area.area_name FROM nrc_area
LEFT OUTER JOIN nrc_projectvsarea ON nrc_projectvsarea.area_id=nrc_area.area_id
WHERE nrc_projectvsarea.project_id='$project_id'";*/
$queryst="SELECT * FROM nrc_area order by area_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	    <td align="center">
		<?php 
		//echo $project_id=$rows->project_id;
		?>
		<input type="checkbox" name="area_id[]" value="<?php echo $rowsst->area_id;?>">
		
		</td>
						
	   <td><?php echo $rowsst->area_code; ?></td>
	   
	    <td><?php echo $rowsst->area_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>No Matching Records Found</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
    <td></td>
   
    <td align="center" colspan="2"></td>
  
	
  </tr>
	
	
	</table>
	

	<table align="right" width="80%" border="0" class="table1" >
	
	<tr  align="center">	

	<td colspan="3"><strong><h4>Implementation Location</h4></strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Location Code</strong></td>
	<td width="200"><strong>Location Name</strong></td>  
  </tr>
	<?php
								  
/*$queryst="SELECT nrc_location.location_id,nrc_location.location_name FROM nrc_location
LEFT OUTER JOIN nrc_projectvslocation ON nrc_projectvslocation.location_id=nrc_location.location_id
WHERE nrc_projectvslocation.project_id='$project_id'";*/
$queryst="SELECT * FROM nrc_location order by location_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	    <td align="center">
		<?php 
		//echo $project_id=$rows->project_id;
		?>
		<input type="checkbox" name="location_id[]" value="<?php echo $rowsst->location_id;?>">
		
		</td>
						
	   <td><?php echo $rowsst->location_code; ?></td>
	   
	    <td><?php echo $rowsst->location_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>No Matching Records Found</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
    <td></td>
   
    <td align="center" colspan="2"></td>
  
	
  </tr>
	
	
	</table>

	<table align="right" width="80%" border="0" class="table1" >
	
	<tr  align="center">	

	<td colspan="3"><strong><h4>Implementation settlement</h4></strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Settlement Code</strong></td>
	<td width="200"><strong>Settlement Name</strong></td>  
  </tr>
	<?php
								  
								  /*$queryst="SELECT nrc_settlement.settlement_id,nrc_settlement.settlement_name FROM nrc_settlement
LEFT OUTER JOIN nrc_projectvssettlement ON nrc_projectvssettlement.settlement_id=nrc_settlement.settlement_id
WHERE nrc_projectvssettlement.project_id='$project_id'";*/
$queryst="SELECT * FROM nrc_settlement order by settlement_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	    <td align="center">
		<?php 
		//echo $project_id=$rows->project_id;
		?>
		<input type="checkbox" name="settlement_id[]" value="<?php echo $rowsst->settlement_id;?>">
		
		</td>
						
	   <td><?php echo $rowsst->settlement_code; ?></td>
	   
	    <td><?php echo $rowsst->settlement_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>No Matching Records Found</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
    <td></td>
   
    <td align="center" colspan="2"></td>
  
	
  </tr>
	
	
	</table>

	
 
	<td width="20%" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
  </tr>	
	
	
  
  
  
  <tr height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="submit" value="Save"><input type="hidden" name="assign_project" id="assign_project" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
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
      button      : "end_date"       // ID of the button
    }
  );
  
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("project_id","dontselect=0",">>Please select project");
 //frmvalidator.addValidation("project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>
  
  -->