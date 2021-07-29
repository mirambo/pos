<?php
 $project_id=$_GET['project_id'];
 $latest_alloc_id=$_GET['latest_alloc_id'];
if (isset($_POST['assign_project_settlement']))
{

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

<table align="center" width="80%" border="0" class="table1" >

<tr  align="center" bgcolor="#fff">	

<td colspan="3"><img src="images/step4.png" height="25">

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
In Locations (s) :  <?php 
$sqlcn="SELECT * FROM nrc_project,nrc_location,nrc_projectvslocation where nrc_projectvslocation.location_id=nrc_location.location_id 
AND nrc_projectvslocation.project_id=nrc_project.project_id AND nrc_projectvslocation.alloc_id='$latest_alloc_id' group by nrc_location.location_id ";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
//$rowscn=mysql_fetch_object($resultscn);

if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
									  {
									 echo $rowscn->location_name.' ,';
									  }
									  
									  
									  }
									  ?>



</strong></td></td>   
  </tr>
  <tr  align="center">	
<td colspan="3"><strong>
<h4>Implementation Settlements</h4>


</strong></td></td>   
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Settlement Code</strong></td>
	<td width="200"><strong>Settlement Name</strong></td>  
	 
  </tr>
  
  
<?php 
$sqlcn="SELECT * FROM nrc_project,nrc_location,nrc_projectvslocation where nrc_projectvslocation.location_id=nrc_location.location_id 
AND nrc_projectvslocation.project_id=nrc_project.project_id AND nrc_projectvslocation.alloc_id='$latest_alloc_id' group by nrc_location.location_id";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
//$rowscn=mysql_fetch_object($resultscn);

if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
									  {
									 
									  
									  ?>
  <tr bgcolor="#FFE3BA"><td colspan="3"><strong>Location : </strong><i><?php echo  $rowscn->location_name;  $location_id=$rowscn->location_id; ?></i></td></tr>
  
	<?php
								  
/*$queryst="SELECT nrc_area.area_id,nrc_area.area_name FROM nrc_area
LEFT OUTER JOIN nrc_projectvsarea ON nrc_projectvsarea.area_id=nrc_area.area_id
WHERE nrc_projectvsarea.project_id='$project_id'";*/
$queryst="SELECT * FROM nrc_settlement where location_id='$location_id' order by settlement_name asc";
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
	

</form>

  
  
  
  </script>

<!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("project_id","dontselect=0",">>Please select project");
 //frmvalidator.addValidation("project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>-->
  
