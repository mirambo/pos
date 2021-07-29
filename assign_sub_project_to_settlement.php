<?php
 $sub_project_id=$_GET['subproject_id'];
 $latest_alloc_id=$_GET['latest_alloc_id'];
 $location_id=$_GET['location_id'];
if (isset($_POST['assign_sub_project_settlement']))
{

assign_sub_project_settlement($sub_project_id);


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

	<td colspan="3" height="30" align="center">
<a style="float:left; font-weight:bold;" href="home.php?viewsubprojectlocation=viewsubprojectlocation">Go Back</a>
	
	<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Some settlements have been allocated to this sub projects</font></strong></p></div>';
?></td>
    </tr>

<tr  align="center" bgcolor="#fff">	

<td colspan="3"><img src="images/step4.png" height="25">

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

<input type="text" name="PoNumber" size="40" value="<?php echo $sub_project_name;?>"/>

	
	
	
	
	
	
	
								  
								  
								  
						  
								  
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
In Locations (s) :  <?php 

if ($latest_alloc_id==0 || $latest_alloc_id=='')
{
$sqlcn="SELECT * FROM nrc_sub_project,nrc_location,nrc_subprojectvslocation where nrc_subprojectvslocation.location_id=nrc_location.location_id 
AND nrc_subprojectvslocation.sub_project_id=nrc_sub_project.sub_project_id AND nrc_subprojectvslocation.location_id='$location_id' group by nrc_location.location_id";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());

}
else
{

$sqlcn="SELECT * FROM nrc_sub_project,nrc_location,nrc_subprojectvslocation where nrc_subprojectvslocation.location_id=nrc_location.location_id 
AND nrc_subprojectvslocation.sub_project_id=nrc_sub_project.sub_project_id AND nrc_subprojectvslocation.alloc_id='$latest_alloc_id' group by nrc_location.location_id";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
//$rowscn=mysql_fetch_object($resultscn);
}
if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
									  {
									 echo $rowscn->location_name.',';
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
<h4>Implementation Settlements</h4>


</strong></td></td>   
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Settlement Code</strong></td>
	<td width="200"><strong>Settlement Name</strong></td>  
	 
  </tr>
  
  
<?php 

if ($sub_project_id=='')
{
$sqlcn="SELECT * FROM nrc_location,nrc_settlement WHERE nrc_location.settlement_id=nrc_settlement.settlement_id group by 
nrc_location.settlement_id order by nrc_settlement.settlement_name asc ";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
}
else
{
$sqlcn="SELECT * FROM nrc_sub_project,nrc_location,nrc_subprojectvslocation where nrc_subprojectvslocation.location_id=nrc_location.location_id 
AND nrc_subprojectvslocation.sub_project_id=nrc_sub_project.sub_project_id AND nrc_subprojectvslocation.location_id='$location_id' group by nrc_location.location_id";
$resultscn= mysql_query($sqlcn) or die ("Error $sqlcn.".mysql_error());
//$rowscn=mysql_fetch_object($resultscn);
}
if (mysql_num_rows($resultscn)>0)
								  
								  {
									  while ($rowscn=mysql_fetch_object($resultscn))
									  {
									 
									  
									  ?>
  <tr bgcolor="#FFE3BA"><td colspan="3"><strong>Location : </strong><i><?php echo  $rowscn->location_name;  $location_id=$rowscn->location_id; ?></i></td></tr>
  
	<?php
								  
/*$queryst="SELECT nrc_location.location_id,nrc_location.location_name FROM nrc_location
LEFT OUTER JOIN nrc_sub_projectvslocation ON nrc_sub_projectvslocation.location_id=nrc_location.location_id
WHERE nrc_sub_projectvslocation.sub_project_id='$sub_project_id'";*/
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
		//echo $sub_project_id=$rows->sub_project_id;
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
  
   
    <td align="center" colspan="3"><input type="submit" name="submit" value="Proceed To Set Up Template>>"><input type="hidden" name="assign_sub_project_settlement" id="assign_sub_project_settlement" value="1">&nbsp;&nbsp;</td>

	
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
  
