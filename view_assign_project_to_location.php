<?php
if (isset($_POST['delete_location_project']))
{


delete_location_project($location_id);


}



 ?><?php //echo $project_id=$_GET['project_id'];?>

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
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Some Location have been allocated to this projects</font></strong></p></div>';
?>

<span ><div id='emp_errorloc' class='error_strings'></div></span>
</td>
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
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  <strong>Select Location<font color="#FF0000">* </font></strong>
	<select name="location_id"><option>Select..........................................................</option>
								  <?php
								  
								  $query1="select * from nrc_location order by location_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->location_id;?>"><?php echo $rows1->location_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  
<input type="submit" name="submit" value="Generate">								  
								  
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

<td colspan="4"><strong><h4>Project And Locations Of Implementation <a rel="facebox" href="assign_more_location.php" style="float:right; color:#fff; margin-right:50px;margin-left:0px">Assign More Locations</a></h4></strong></td>  
  </tr>
 
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Location Code</strong></td>
	<td width="200"><strong>Location Name</strong></td>  
	<td width="200"><strong>Project Name</strong></td>  
  </tr>
	<?php
								  
/*$queryst="SELECT nrc_location.location_id,nrc_location.location_name FROM nrc_location
LEFT OUTER JOIN nrc_projectvslocation ON nrc_projectvslocation.location_id=nrc_location.location_id
WHERE nrc_projectvslocation.project_id='$project_id'";*/
$queryst="SELECT * FROM nrc_project,nrc_location,nrc_projectvslocation where nrc_projectvslocation.location_id=nrc_location.location_id 
AND nrc_projectvslocation.project_id=nrc_project.project_id group by nrc_location.location_id order by nrc_location.location_name asc";
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
		<input type="checkbox" name="location_id[]" value="<?php echo $location_id=$rowsst->location_id;?>">
		
		
		</td>
						
	   <td><?php echo $rowsst->location_code; ?></td>
	   
	    <td><?php echo $rowsst->location_name; ?></td>
	    <td>
		
		<?php 
		
$querystmp="SELECT * FROM nrc_project,nrc_projectvslocation where nrc_projectvslocation.project_id=nrc_project.project_id and nrc_projectvslocation.location_id='$location_id' order by nrc_project.project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());
								  
								  if (mysql_num_rows($resultsstmp)>0)
								  
								  {
									  while ($rowsstmp=mysql_fetch_object($resultsstmp))
									  {
		
		
		
		echo '<input type="checkbox" name="project_id[]" value="'.$rowsstmp->project_id.'">'.' '. '('.$rowsstmp->project_code.') '.$rowsstmp->project_name.'<br/>'; 
		
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
  
   
    <td align="center" colspan="4"><input type="submit" name="submit" value="Remove Location From Project"><input type="hidden" name="delete_location_project" id="delete_location_project" value="1">&nbsp;&nbsp;</td>
  
	
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
  
