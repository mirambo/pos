<?php
$project_id=$_POST['project_id'];
if (isset($_POST['assign_project']) && !isset($_POST['assign_project_area']) && !isset($_POST['assign_project_location']) && !isset($_POST['assign_project_settlement']))
{
//$project_id=$_GET['project_id'];
/*$sqlaloc="INSERT INTO alloc VALUES('')" or die(mysql_error());
$resultsaloc=mysql_query($sqlaloc) or die ("Error $sqlaloc.".mysql_error());
$rowsalloc=mysql_fetch_object($resultsaloc);


$sqlprofd= "SELECT * from alloc order by alloc_id desc limit 1";
$resultsprofd= mysql_query($sqlprofd) or die ("Error $sqlpod.".mysql_error());
$rowsprofd=mysql_fetch_object($resultsprofd);
$latest_alloc_id=$rowsprofd->alloc_id;*/


assign_project($project_id);


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

  
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("project_id","dontselect=0",">>Please select project");
 //frmvalidator.addValidation("project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>
  
