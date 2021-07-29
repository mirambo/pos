<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);
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


}
</style>



<form name="new_supplier" action="processaddinstoffer.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addinstofferconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000">Project Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! record exist</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Main Project Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="project_name"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Main Project Code<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="project_code"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Description<font color="#FF0000">*</font></td>
    <td width="23%"><textarea name="desc" cols="35" rows="2"></textarea></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Start Date<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="start_date" id="start_date"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter End Date<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="end_date" id="end_date"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr>
    
    <td colspan="3" valign="top" align="center">

	<table align="right" width="60%" border="0" class="table1" >
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td></td>
	<td><strong>Area Of Implementation</strong></td>  
  </tr>
	<?php
								  
								  $queryst="select * FROM nrc_area";
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
									  
									  
									  
								
	    <td align="center"><input type="checkbox" name="module_id[]" value="<?php echo $rowsst->area_id;?>"></td>
						
	   <td><?php echo $rowsst->area_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! All National Staffs Are Currently Occupied</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
    <td></td>
   
    <td align="center" colspan="2"></td>
  
	
  </tr>
	
	
	</table>

	
 
	<td><div id='emp_errorloc' class='error_strings'></div></td>
  </tr>
  
  
   <tr>
    
    <td colspan="3" valign="top" align="center">

	<table align="right" width="60%" border="0" class="table1" >
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td></td>
	<td><strong>Location Of Implementation</strong></td>  
  </tr>
	<?php
								  
								  $queryst="select * FROM nrc_area";
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
									  
									  
									  
								
	    <td align="center"><input type="checkbox" name="module_id[]" value="<?php echo $rowsst->area_id;?>"></td>
						
	   <td><?php echo $rowsst->area_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! All National Staffs Are Currently Occupied</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
    <td></td>
   
    <td align="center" colspan="2"></td>
  
	
  </tr>
	
	
	</table>

	
 
	<td><div id='emp_errorloc' class='error_strings'></div></td>
  </tr>
  
   <tr>
    
    <td colspan="3" valign="top" align="center">

	<table align="right" width="60%" border="0" class="table1" >
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td></td>
	<td><strong>Settlement Of Implementation</strong></td>  
  </tr>
	<?php
								  
								  $queryst="select * FROM nrc_area";
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
									  
									  
									  
								
	    <td align="center"><input type="checkbox" name="module_id[]" value="<?php echo $rowsst->area_id;?>"></td>
						
	   <td><?php echo $rowsst->area_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! All National Staffs Are Currently Occupied</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
    <td></td>
   
    <td align="center" colspan="2"></td>
  
	
  </tr>
	
	
	</table>

	
 
	<td><div id='emp_errorloc' class='error_strings'></div></td>
  </tr>
  
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("job_cat_name","req",">>Please enter job category name");
 
 
 
  </SCRIPT>