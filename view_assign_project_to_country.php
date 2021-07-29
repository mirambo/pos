<?php
if (isset($_POST['delete_country_project']))
{


delete_country_project($country_id);


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
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Some country have been allocated to this projects</font></strong></p></div>';
?>

<span ><div id='emp_errorloc' class='error_strings'></div></span>
</td>
    </tr>
	
	
	
	
  <tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="4" align="center">  
	<strong>Select Country<font color="#FF0000">* </font></strong>
	<select name="country_id"><option>Select..........................................................</option>
								  <?php
								  
								  $query1="select * from nrc_country order by country_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->country_id;?>"><?php echo $rows1->country_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
	
	
	<strong>Select Project<font color="#FF0000">* </font></strong>
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
								  
								  
								  
								  
								  
								  
<input type="submit" name="generate" value="Generate">								  
								  
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

<td colspan="4"><strong><h4>Project And Countries Of Implementation <a rel="facebox" href="assign_more_country.php" style="float:right; color:#fff; margin-right:50px;margin-left:0px">Assign More Countries</a></h4></strong></td>  
  </tr>
 
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Select</strong></td>
	<td width="100"><strong>Country Code</strong></td>
	<td width="200"><strong>Country Name</strong></td>  
	<td width="200"><strong>Project Name</strong></td>  
  </tr>
	<?php
								  
/*$queryst="SELECT nrc_area.area_id,nrc_area.area_name FROM nrc_area
LEFT OUTER JOIN nrc_projectvsarea ON nrc_projectvsarea.area_id=nrc_area.area_id
WHERE nrc_projectvsarea.project_id='$project_id'";*/
if (!isset($_POST['generate']))
{

$queryst="SELECT * FROM nrc_project,nrc_country,nrc_projectvscountry where nrc_projectvscountry.country_id=nrc_country.country_id 
AND nrc_projectvscountry.project_id=nrc_project.project_id group by nrc_country.country_id order by nrc_country.country_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());

}

else
{
 $project_id=$_POST['project_id'];
 $country_id=$_POST['country_id'];
 
if ($country_id!=0 && $project_id==0)
{
$queryst="SELECT * FROM nrc_project,nrc_country,nrc_projectvscountry where nrc_projectvscountry.country_id=nrc_country.country_id 
AND nrc_projectvscountry.project_id=nrc_project.project_id AND nrc_projectvscountry.country_id='$country_id'  group by nrc_country.country_id order by nrc_country.country_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
}
elseif ($country_id==0 && $project_id!=0)
{
$queryst="SELECT * FROM nrc_project,nrc_country,nrc_projectvscountry where nrc_projectvscountry.country_id=nrc_country.country_id 
AND nrc_projectvscountry.project_id=nrc_project.project_id AND nrc_projectvscountry.project_id='$project_id'  group by nrc_country.country_id order by nrc_country.country_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
}

elseif ($country_id!=0 && $project_id!=0)
{
$queryst="SELECT * FROM nrc_project,nrc_country,nrc_projectvscountry where nrc_projectvscountry.country_id=nrc_country.country_id 
AND nrc_projectvscountry.project_id=nrc_project.project_id AND nrc_projectvscountry.project_id='$project_id' AND nrc_projectvscountry.country_id='$country_id'  group by nrc_country.country_id order by nrc_country.country_name asc";
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
}

else
{
$queryst="SELECT * FROM nrc_project,nrc_country,nrc_projectvscountry where nrc_projectvscountry.country_id=nrc_country.country_id 
AND nrc_projectvscountry.project_id=nrc_project.project_id group by nrc_country.country_id order by nrc_country.country_name asc";
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
		//echo $project_id=$rows->project_id;
		?>
		<input type="checkbox" name="country_id[]" value="<?php echo $country_id2=$rowsst->country_id;?>">
		
		
		</td>
						
	   <td><?php echo $rowsst->country_code; ?></td>
	   
	    <td><?php echo $rowsst->country_name; ?></td>
	    <td>
		
		<?php 
if (!isset($_POST['generate']))
{		
$querystmp="SELECT * FROM nrc_project,nrc_projectvscountry where nrc_projectvscountry.project_id=nrc_project.project_id and nrc_projectvscountry.country_id='$country_id2' order by nrc_project.project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());
}
else
{
$project_id=$_POST['project_id'];
$country_id=$_POST['country_id'];
 
if ($country_id!=0 && $project_id==0)
{
$querystmp="SELECT * FROM nrc_project,nrc_projectvscountry where nrc_projectvscountry.project_id=nrc_project.project_id 
and nrc_projectvscountry.country_id='$country_id'  order by nrc_project.project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());
}
elseif ($country_id==0 && $project_id!=0)
{

$querystmp="SELECT * FROM nrc_project,nrc_projectvscountry where nrc_projectvscountry.project_id=nrc_project.project_id 
and nrc_projectvscountry.country_id='$country_id2' AND nrc_projectvscountry.project_id='$project_id' order by nrc_project.project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());

}

elseif ($country_id!=0 && $project_id!=0)
{
$querystmp="SELECT * FROM nrc_project,nrc_projectvscountry where nrc_projectvscountry.project_id=nrc_project.project_id 
and nrc_projectvscountry.country_id='$country_id2' AND nrc_projectvscountry.project_id='$project_id' order by nrc_project.project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());
}

else
{
$querystmp="SELECT * FROM nrc_project,nrc_projectvscountry where nrc_projectvscountry.project_id=nrc_project.project_id 
and nrc_projectvscountry.country_id='$country_id2' order by nrc_project.project_name asc";
$resultsstmp=mysql_query($querystmp) or die ("Error: $querystmp.".mysql_error());
}
 
 
 }
								  
								  if (mysql_num_rows($resultsstmp)>0)
								  
								  {
									  while ($rowsstmp=mysql_fetch_object($resultsstmp))
									  {
		
		
		
		echo '<input type="checkbox" name="project_id[]" value="'.$rowsstmp->project_id.'">'.' '.$rowsstmp->project_name.'<br/>'; 
		
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
  
   
    <td align="center" colspan="4"><input type="submit" name="submit" value="Remove Country From Project"><input type="hidden" name="delete_country_project" id="delete_country_project" value="1">&nbsp;&nbsp;</td>
  
	
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
  
