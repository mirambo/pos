<?php
$om_bunch_id=$_GET['om_bunch_id'];
$original_bunch_id=$_GET['original_bunch_id'];
$job_cat_id=$_GET['job_cat_id'];
 ?>

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<form name="diag" id="diag" action="processassignexpert2.php?om_bunch_id=<?php echo $om_bunch_id; ?>&original_om_bunch_id=<?php echo $original_om_bunch_id; ?>&job_cat_id=<?php echo $job_cat_id; ?>" method="post">			
			<table width="100%" border="0">
 
	<tr height="20">
	
	<td colspan="3" ><h3>Project Details</h3></td>
	
    <td rowspan="16">
	<table border="0" width="100%">
	<tr align="center" bgcolor="#FF9900">
	<td><strong>Location / Segment</strong></td>
	<td><strong>Job Title</strong></td>
	<td><strong>Expertiate</strong></td>
	<td><strong>Local Based</strong></td>
	</tr>
	 </tr>
  
  <?php 
 
$sql="SELECT omlocations.omlocation_name,omjob_titles.omjob_title_name,omjob_titles.omjob_title_id,omjobtitle_locations.omjobtitle_location_id FROM 
omlocations,omjob_titles,omjobtitle_locations WHERE omjobtitle_locations.omlocation_id=omlocations.omlocation_id AND 
omjobtitle_locations.omjob_title_id=omjob_titles.omjob_title_id order by omlocations.omlocation_name asc";
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
  
    <td><?php echo $rows->omlocation_name;?></td>
	<td><?php echo $rows->omjob_title_name;?></td>

	<td align="center">
	
	
	<?php
	
	$omjob_title_id=$rows->omjob_title_id;
	
	
	
	
	$queryinstjtexp="SELECT  om_assigned_staff.om_bunch_id FROM om_assigned_staff,om_bunch where 
	om_bunch.om_bunch_id=om_assigned_staff.om_bunch_id and omjob_title_id='$omjob_title_id' and om_bunch.job_cat_id='2'";
	$resultsinstjtexp=mysql_query($queryinstjtexp) or die ("Error: $queryinstjtexp.".mysql_error());
	
	$numrowsjtexp=mysql_num_rows($resultsinstjtexp);
	if ($numrowsjtexp!=0)
	{
	echo "<strong>".$numrowsjtexp."</strong>";
	}
	else
	{
	echo $numrowsjtexp;
	
	}
	
	
	?>
	
	</td>
    <td align="center">
	<?php
	

	
	
	
	
	$queryinstjtl="SELECT  om_assigned_staff.om_bunch_id FROM om_assigned_staff,om_bunch where 
	om_bunch.om_bunch_id=om_assigned_staff.om_bunch_id and omjob_title_id='$omjob_title_id' and om_bunch.job_cat_id='1'";
	$resultsinstjtl=mysql_query($queryinstjtl) or die ("Error: $queryinstjtl.".mysql_error());
	
 $numrowsjtl=mysql_num_rows($resultsinstjtl);
	
	if ($numrowsjtl!=0)
	{
	echo "<strong>".$numrowsjtl."</strong>";
	}
	else
	{
	echo $numrowsjtl;
	
	}
	
	
	
	?>
	
	
	
	</td>
	
   
    </tr>
  <?php 
  $ttl_exp_staff=$ttl_exp_staff+$numrowsjtexp;
  $ttl_loc_staff=$ttl_loc_staff+$numrowsjtl;
  }
  ?>
  <tr height="25" bgcolor="#FFFFCC" align="center"><td colspan="2"><strong><font color="#ff0000" size="+1">Total Staff</font></strong></td><td><strong><font color="#ff0000" size="+1"><?php echo $ttl_exp_staff; ?></font></strong></td><td><strong><font color="#ff0000" size="+1"><?php echo $ttl_loc_staff; ?></font></strong></td></tr>
  <?php 
  
  }
  
  else 

  {
  ?>
  
  <tr><td colspan="4" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
	
	
	
	</table>
	
	
	</td>
   
    </tr>
	<?php 
	
	$querydet="select omconsultants.cons_name,omclients.c_name,om_bunch.period_from,om_bunch.period_to from om_bunch,omconsultants,omclients
	where om_bunch.consultant_id=omconsultants.consultant_id AND om_bunch.client_id=omclients.client_id AND om_bunch.om_bunch_id='$om_bunch_id'";
	$resultsdet=mysql_query($querydet) or die ("Error: $querydet.".mysql_error());
	$rowsdet=mysql_fetch_object($resultsdet);
	
	?>
	<tr bgcolor="#C0D7E5" height="25"><td></td>
	<td width="20%"><strong>Consultant Name : <?php echo $rowsdet->cons_name; ?></strong></td>
	<td><strong>Period from: <?php echo $rowsdet->period_from; ?></strong></td>
	<td  ></td></tr>
	<tr bgcolor="#FFFFCC" height="25"><td></td>
	<td><strong>Client : <?php echo $rowsdet->c_name; ?></strong></td>
	<td><strong>Period to: <?php echo $rowsdet->period_to; ?></strong></td>
	<td  colspan="2">
	
	
	
	
	</td></tr>
	
	<tr height="20">
	
	<td colspan="3" ><h3>Assign Staff to the project</h3></td>
    
   
    </tr>
	<tr height="20">
 
	<td colspan="3" height="20" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Saved Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Same staff cannot be assigned both office and field duties</font></strong></p></div>';
?>

<?php

if ($_GET['exist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Record exists</font></strong></p></div>';
?></td>
    </tr>
	<tr height="25"><td></td><td colspan="2" bgcolor="#000033"><font color="#ffffff"><strong>Select Staff</strong></font>
	</tr>
	
	<tr height="20">
 <td width="200"></td><td>Select Staff Name</font></td>
 <td><div id='diag_disease_errorloc' class="error_strings"></div>
 <select name="omstaff_id">
	

	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query2="select * from omstaff where job_cat_id='$job_cat_id' and status='0' order by f_name asc";
								  $results2=mysql_query($query2) or die ("Error: $query2.".mysql_error());
								  
								  if (mysql_num_rows($results2)>0)
								  
								  {
									  while ($rows2=mysql_fetch_object($results2))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows2->omstaff_id; ?>"><?php echo $rows2->f_name.' '.$rows2->m_name.' '.$rows2->l_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								
								  
								  </select></td>
 
 </tr>  
	
 <tr height="20">
 <td width="200"></td><td>Select Staff Job Title*</font></td>
 <td><div id='diag_disease_errorloc' class="error_strings"></div>
 <select name="omjob_title_id">
	

	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from omjob_titles order by omjob_title_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->omjob_title_id; ?>"><?php echo $rows1->omjob_title_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								
								  </select></td>

 </tr> 
 
 
 
 <tr height="30">
 <td width="200"></td>
 <td></td>
 <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>

 </tr> 
 <tr height="30">
 <td width="200"></td>
 <td colspan="2" rowspan="2" valign="top"><div id='diag_errorloc' class='error_strings'></td>


 </tr> 
  <tr height="30">
 <td width="200"></td>


 </tr> 
  <tr height="30">
 <td width="200"></td>
 <td></td>
 <td></td>

 </tr> 
  <tr height="30">
 <td width="200"></td>
 <td></td>
 <td></td>

 </tr> 
	
	
	
</table>

</form>


<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("diag");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 //frmvalidator.addValidation("prod_cat","dontselect=0","Please select product category");
 frmvalidator.addValidation("omstaff_id","dontselect=0",">>Please select staff name");
 frmvalidator.addValidation("omjob_title_id","dontselect=0",">>Please select staff job title");

 

</SCRIPT>