<?php
if (isset($_POST['delete_settlement_sub_project']))
{


delete_settlement_sub_project($settlement_id);


}



 ?><?php //echo $sub_project_id=$_GET['sub_project_id'];?>

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="suggestSubcountry.js"></script>

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




<?php 



?>	
 <form name="filter" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">		
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
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Some settlement have been allocated to this projects</font></strong></p></div>';
?>

<span ><div id='emp_errorloc' class='error_strings'></div></span>
</td>
    </tr>
	
	
	
	
 <tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="4" align="center">
	<strong>Select Settlement</strong> 
		<select name="settlement_id"><option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from nrc_settlement order by settlement_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->settlement_id;?>"><?php echo $rows1->settlement_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>	
	
	<strong>Enter Sub Project Name </strong><input type="text" name="PoNumber" size="30" id="PoNumber" onkeyup="searchSuggest();" autocomplete="off" />
					  
								  
								  
<input type="submit" name="generate" value="Generate">								  
								  <div id="layer1"></div>	
								  </td>
    
  </tr>
  
   </form>	

 <form name="emp" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">	
	
<tr>
    
    <td colspan="3" valign="top" align="center">
	
	
	
	
	
	
	<table  width="80%" border="0" class="table1" >
	<!--- <tr  align="center" bgcolor="#fff">	

<td colspan="3"><img src="images/step1.png" height="25"></td>  
  </tr>-->
<tr  align="center">	

<td colspan="4"><strong><h4>Sub Project And settlement Of Implementation 
<!--<a rel="facebox" href="assign_more_sub_settlement.php" style="float:right; color:#fff; margin-right:50px;margin-left:0px">Assign More settlements To Sub Projects</a>-->
<a href="home.php?assignsubprojectsettlement=assignsubprojectsettlement" style="float:right; color:#fff; margin-right:50px;margin-left:0px">Assign More settlements To Sub Projects</a>
</h4></strong></td>  
  </tr>
 
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="10"><strong>Select</strong></td>
	<td width="50"><strong>settlement Code</strong></td>
	<td width="350"><strong>settlement Name</strong></td>  
	<td width="200"><strong>Sub Project Name</strong></td>  
  </tr>
	<?php
								  
/*$queryst="SELECT nrc_settlement.settlement_id,nrc_settlement.settlement_name FROM nrc_settlement
LEFT OUTER JOIN nrc_sub_projectvssettlement ON nrc_sub_projectvssettlement.settlement_id=nrc_settlement.settlement_id
WHERE nrc_sub_projectvssettlement.sub_project_id='$sub_project_id'";*/

if (!isset($_POST['generate']))
{
$queryst="SELECT * FROM nrc_sub_project,nrc_settlement,nrc_location,nrc_area,nrc_country,nrc_subprojectvssettlement where 
nrc_country.country_id=nrc_location.country_id AND nrc_area.area_id=nrc_location.area_id AND nrc_settlement.location_id=nrc_location.location_id AND
nrc_subprojectvssettlement.settlement_id=nrc_settlement.settlement_id 
AND nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id group by 
nrc_settlement.settlement_id order by nrc_settlement.settlement_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
}
else
{
 $settlement_id=$_POST['settlement_id'];
 $PoNumber=$_POST['PoNumber'];
 
$queryspi="SELECT * FROM nrc_sub_project where sub_project_name LIKE '%$PoNumber%'";
$resultspi=mysql_query($queryspi) or die ("Error: $queryspi.".mysql_error());
$rowspi=mysql_fetch_object($resultspi);
 
$sub_project_id=$rowspi->sub_project_id;

if ($settlement_id!=0 && $PoNumber=='')
{
$queryst="SELECT * FROM nrc_sub_project,nrc_settlement,nrc_location,nrc_area,nrc_country,nrc_subprojectvssettlement where 
nrc_country.country_id=nrc_location.country_id AND nrc_area.area_id=nrc_location.area_id AND nrc_settlement.location_id=nrc_location.location_id AND
nrc_subprojectvssettlement.settlement_id=nrc_settlement.settlement_id 
AND nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id AND nrc_subprojectvssettlement.settlement_id='$settlement_id' group by 
nrc_settlement.settlement_id order by nrc_settlement.settlement_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());

}
elseif ($settlement_id==0 && $PoNumber!='')
{
$queryst="SELECT * FROM nrc_sub_project,nrc_settlement,nrc_location,nrc_area,nrc_country,nrc_subprojectvssettlement where 
nrc_country.country_id=nrc_location.country_id AND nrc_area.area_id=nrc_location.area_id AND nrc_settlement.location_id=nrc_location.location_id AND
nrc_subprojectvssettlement.settlement_id=nrc_settlement.settlement_id 
AND nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id and  nrc_subprojectvssettlement.sub_project_id='$sub_project_id' group by 
nrc_settlement.settlement_id order by nrc_settlement.settlement_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());

}

elseif ($settlement_id!=0 && $PoNumber!='')
{
$queryst="SELECT * FROM nrc_sub_project,nrc_settlement,nrc_location,nrc_area,nrc_country,nrc_subprojectvssettlement where 
nrc_country.country_id=nrc_location.country_id AND nrc_area.area_id=nrc_location.area_id AND nrc_settlement.location_id=nrc_location.location_id AND
nrc_subprojectvssettlement.settlement_id=nrc_settlement.settlement_id 
AND nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id AND nrc_subprojectvssettlement.settlement_id='$settlement_id' AND nrc_subprojectvssettlement.sub_project_id='$sub_project_id' group by 
nrc_settlement.settlement_id order by nrc_settlement.settlement_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());

}
else
{
$queryst="SELECT * FROM nrc_sub_project,nrc_settlement,nrc_location,nrc_area,nrc_country,nrc_subprojectvssettlement where 
nrc_country.country_id=nrc_location.country_id AND nrc_area.area_id=nrc_location.area_id AND nrc_settlement.location_id=nrc_location.location_id AND
nrc_subprojectvssettlement.settlement_id=nrc_settlement.settlement_id 
AND nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id group by 
nrc_settlement.settlement_id order by nrc_settlement.settlement_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
}
}
								  
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
		<input type="checkbox" name="settlement_id[]" value="<?php echo $settlement_id2=$rowsst->settlement_id;?>">
		
		
		</td>
						
	   <td><?php echo $rowsst->settlement_code; ?></td>
	   
	    <td><?php echo $rowsst->settlement_name.' - <font color="#003399" >'.$rowsst->location_name.' Location </font>- <font color="#ff0000" >'.$rowsst->area_name.' Area</font> - <font color="#009900" >'.$rowsst->country_name.'</font>'; 
		
		$querycnt="SELECT * FROM nrc_sub_project,nrc_subprojectvssettlement where nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id and 
		nrc_subprojectvssettlement.settlement_id='$settlement_id2' order by nrc_sub_project.sub_project_name asc";
$resultscnt=mysql_query($querycnt) or die ("Error: $querycnt.".mysql_error());
$numrowscnt=mysql_num_rows($resultscnt);
		
echo '  [ <i>'.$numrowscnt.' Sub Projects </i>]</style>';	
		
		
		?></td>
	    <td>
		
		<?php 
if (!isset($_POST['generate']))
{	
		
$querystmp="SELECT * FROM nrc_sub_project,nrc_subprojectvssettlement where nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id 
and nrc_subprojectvssettlement.settlement_id='$settlement_id2' order by nrc_sub_project.sub_project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());
}	

else
{
$settlement_id=$_POST['settlement_id'];
$PoNumber=$_POST['PoNumber'];
 
$queryspi2="SELECT * FROM nrc_sub_project where sub_project_name='$PoNumber'";
$resultspi2=mysql_query($queryspi2) or die ("Error: $queryspi2.".mysql_error());
$rowspi2=mysql_fetch_object($resultspi2);
 
$sub_project_idd2=$rowspi2->sub_project_id;


if ($settlement_id!=0 && $PoNumber=='')
{
$querystmp="SELECT * FROM nrc_sub_project,nrc_subprojectvssettlement where nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id 
and nrc_subprojectvssettlement.settlement_id='$settlement_id' order by nrc_sub_project.sub_project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());

}
elseif ($settlement_id==0 && $PoNumber!='')
{
$querystmp="SELECT * FROM nrc_sub_project,nrc_subprojectvssettlement where nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id 
and nrc_subprojectvssettlement.settlement_id='$settlement_id2' AND nrc_subprojectvssettlement.sub_project_id='$sub_project_idd2' order by nrc_sub_project.sub_project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());
}

elseif ($settlement_id!=0 && $PoNumber!='')
{

$querystmp="SELECT * FROM nrc_sub_project,nrc_subprojectvssettlement where nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id 
and nrc_subprojectvssettlement.settlement_id='$settlement_id' AND nrc_subprojectvssettlement.sub_project_id='$sub_project_idd2' order by nrc_sub_project.sub_project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());
}
else
{
	$querystmp="SELECT * FROM nrc_sub_project,nrc_subprojectvssettlement where nrc_subprojectvssettlement.sub_project_id=nrc_sub_project.sub_project_id 
and nrc_subprojectvssettlement.settlement_id='$settlement_id2' order by nrc_sub_project.sub_project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());	

}

}								  
								  if (mysql_num_rows($resultsstmp)>0)
								  
								  {
									  while ($rowsstmp=mysql_fetch_object($resultsstmp))
									  {
		
		$project_id=$rowsstmp->project_id;
		
$querystmpxx="SELECT * FROM nrc_project,nrc_donor,nrc_donorvsproject where 
nrc_donorvsproject.project_id=nrc_project.project_id and nrc_donorvsproject.donor_id=nrc_donor.donor_id 
AND nrc_donorvsproject.project_id='$project_id'";
$resultsstmpxx=mysql_query($querystmpxx) or die ("Error: $querystmpxx.".mysql_error());
$rowsxx=mysql_fetch_object($resultsstmpxx);
		
		echo '<input type="checkbox" name="sub_project_id[]" value="'.$rowsstmp->sub_project_id.'">'.$rowsstmp->sub_project_name.' - <font color="#ff0000;">'.$rowsxx->donor_name.'</font><br/>'; 
		
		}
		
		
		}
		
		
		
		
		?></td>
	
	   
   
    

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
  
   
    <td align="center" colspan="4"><input type="submit" name="submit" value="Remove settlement From Sub Project"><input type="hidden" name="delete_settlement_sub_project" id="delete_settlement_sub_project" value="1">&nbsp;&nbsp;</td>
  
	
  </tr>
	

	</table>
	
	
	

</form>

  
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("sub_project_id","dontselect=0",">>Please select project");
 //frmvalidator.addValidation("project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>
  
