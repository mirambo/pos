<?php
 $project_id=$_GET['project_id'];
 $latest_alloc_id=$_GET['latest_alloc_id'];
if (isset($_POST['assign_project_area']))
{

assign_project_area($project_id);


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

<table align="center" width="80%" border="0" class="table1" >
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
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Some Areas have been allocated to this projects</font></strong></p></div>';
?></td>
    </tr>

<tr  align="center" bgcolor="#fff">	

<td colspan="3"><img src="images/step2.png" height="25">

<input type="hidden" name="project_id" value="<?php echo $project_id ?>">
<input type="hidden" name="alloc_id" value="<?php echo $latest_alloc_id ?>">





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
AND nrc_projectvscountry.project_id=nrc_project.project_id AND nrc_projectvscountry.alloc_id='$latest_alloc_id' group by nrc_country.country_id ";
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
AND nrc_projectvscountry.project_id=nrc_project.project_id AND nrc_projectvscountry.alloc_id='$latest_alloc_id' group by nrc_country.country_id";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
//$rowscn=mysql_fetch_object($resultscn);

if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
									  {
									 
									  
									  ?>
  <tr bgcolor="#FFE3BA"><td colspan="3"><strong>Country : </strong><i><?php echo  $rowscn->country_name;  $country_id=$rowscn->country_id; ?></i></td></tr>
  
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
	
	
	</table>
	

</form>

  
  
  
  </script>

<!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("project_id","dontselect=0",">>Please select project");
 //frmvalidator.addValidation("project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>-->
  
