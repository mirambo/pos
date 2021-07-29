<?php
 $sub_project_id=$_GET['sub_project_id'];
 $latest_alloc_id=$_GET['latest_alloc_id'];
if (isset($_POST['assign_sub_project_location']) && !isset($_POST['assign_sub_project_settlement']))
{

assign_sub_project_location($PoNumber);


}

if (isset($_POST['assign_sub_project_settlement']) && !isset($_POST['assign_sub_project_location']))
{

assign_sub_project_settlement($PoNumber);


}



 ?><?php //echo $sub_project_id=$_GET['sub_project_id'];?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="suggestStaff.js"></script>

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

<td colspan="3"><img src="images/step3.png" height="25">

<input type="hidden" name="sub_project_id" value="<?php echo $sub_project_id ?>">
<input type="hidden" name="alloc_id" value="<?php echo $latest_alloc_id ?>">





</td>  
  </tr>
  
  <?php

if ($sub_project_id=='')
{
?>

  
 <tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="4" align="center"> <strong>Type Sub Project<font color="#FF0000">* </font></strong>

	<input type="text" name="PoNumber" size="40" id="PoNumber" onkeyup="searchSuggest();" autocomplete="off" />
	<div id="layer1"></div>

	
	
	
	
								  
								  
								  
						  
								  
								  </td>
    
  </tr>
  
  <?php

}
else
{
?>
	
<tr  align="center" bgcolor="#FFFFCC">	
<td colspan="3"><strong>
Sub Project : 
<?php
$sqlpr="SELECT * FROM nrc_sub_project where sub_project_id='$sub_project_id'";
$resultspr= mysql_query($sqlpr) or die ("Error $sqlpr.".mysql_error());
$rowspr=mysql_fetch_object($resultspr);


echo "<font color='#ff0000'>".$rowspr->sub_project_name."</font> ";
 ?>
  <input type="hidden" name="PoNumber" size="40" value="<?php echo $rowspr->sub_project_name;?>"/>
In Areas (s) :  <?php 
$sqlcn="SELECT * FROM nrc_sub_project,nrc_area,nrc_subprojectvsarea where nrc_subprojectvsarea.area_id=nrc_area.area_id 
AND nrc_subprojectvsarea.sub_project_id=nrc_sub_project.sub_project_id AND nrc_subprojectvsarea.alloc_id='$latest_alloc_id' group by nrc_area.area_id";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
//$rowscn=mysql_fetch_object($resultscn);

if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
									  {
									 echo $rowscn->area_name.',';
									  }
									  
									  
									  }
									  ?>



</strong></td></td>   
  </tr>
 <?php
}
 ?> 
  
  
  
  
  <tr  align="center">	
<td colspan="3"><strong>
<h4>Implementation Locations</h4>


</strong></td></td>   
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Location Code</strong></td>
	<td width="200"><strong>Location Name</strong></td>  
	 
  </tr>
  
  
<?php 
if ($sub_project_id=='')
{

$sqlcn="SELECT * FROM nrc_location,nrc_area WHERE nrc_location.area_id=nrc_area.area_id group by nrc_location.area_id order by nrc_area.area_name asc ";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());


}
else
{
$sqlcn="SELECT * FROM nrc_sub_project,nrc_area,nrc_subprojectvsarea where nrc_subprojectvsarea.area_id=nrc_area.area_id 
AND nrc_subprojectvsarea.sub_project_id=nrc_sub_project.sub_project_id AND nrc_subprojectvsarea.alloc_id='$latest_alloc_id' group by nrc_area.area_id";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
//$rowscn=mysql_fetch_object($resultscn);
}

if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
									  {
									 
									  
									  ?>
  <tr bgcolor="#FFE3BA"><td colspan="3"><strong>Area : </strong><i><?php echo  $rowscn->area_name;  $area_id=$rowscn->area_id; ?></i></td></tr>
  
	<?php
								  
/*$queryst="SELECT nrc_area.area_id,nrc_area.area_name FROM nrc_area
LEFT OUTER JOIN nrc_sub_projectvsarea ON nrc_sub_projectvsarea.area_id=nrc_area.area_id
WHERE nrc_sub_projectvsarea.sub_project_id='$sub_project_id'";*/
$queryst="SELECT * FROM nrc_location where area_id='$area_id' order by location_name asc";
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
		//echo $sub_project_id=$rows->sub_project_id;
		?>
		<input type="checkbox" name="location_id[]" value="<?php echo $rowsst->location_id;?>">
		
		</td>
						
	   <td><?php echo $rowsst->location_code; ?></td>
	   
	    <td><?php echo $rowsst->location_name; ?></td>
	
	   
   
    

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
  
   
    <td align="center" colspan="3">
	<input style="float:left; margin-left:300px;" type="submit" name="assign_sub_project_location" id="assign_sub_project_location" value="Proceed To Setting Up Template>>">
	<!--<input style="float:right; margin-right:300px;" type="submit" name="assign_sub_project_settlement" id="assign_sub_project_settlement" value="Proceed To Settlement>>">-->
	
	
	<input  type="hidden" name="assign_sub_project_location" id="assign_sub_project_location" value="1">&nbsp;&nbsp;
	
	<!--<input type="hidden" name="assign_sub_project_settlement" id="assign_sub_project_settlement" value="2">&nbsp;&nbsp;-->
	
	
	</td>

	
  </tr>
	
	
	</table>
	

</form>

  
  
  
  </script>

<!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("sub_project_id","dontselect=0",">>Please select project");
 //frmvalidator.addValidation("project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>-->
  
