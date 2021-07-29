<?php 

$original_bunch_id=$_GET['original_bunch_id']; 
$period_to=$_GET['period_to'];
$job_cat_id=$_GET['job_cat_id'];
 
$id=$_GET['module'];
?>
<SCRIPT language="javascript">
function reload(form)
{
var val=form.module.options[form.module.options.selectedIndex].value;
self.location='home.php?usergroupsm=usergroupsm&module=' + val ;

}

</script>

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />
<style type="text/css">

@import url(calender/calendar-win2k-1.css);
.table1
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

<form name="emp" id="emp" action="process_submodule_usergroup.php" method="post">			
<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="3" height="30" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Sub Module Assigned Successfuly To the Usergroup!!!</div>';
?>

<?

if ($_GET['assigned']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Submodule already assigned to the Usergroup</font></strong></p></div>';
?>
<?

if ($_GET['areamanagerassigned']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Area Manager is already assigned</font></strong></p></div>';
?>
 
<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	
<tr height="30">
    <td bgcolor="" width="2%">&nbsp;</td>
    <td width="20%"  align="right"><strong>Select Module</strong><font color="#FF0000">*</font></td><td width="10">
    <select name="module" id="module" onChange="reload(this.form)">
	<?php 
	
	$query1="select modules.module_name,modules.link,modules.module_id from modules,user_group_module where 
	modules.module_id=user_group_module.module_id AND user_group_module.module_id='$id'";
	$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
	$rowsinst1=mysql_fetch_object($results1);
	if ($id=='')
	{

	?>
	<option value="0">Select..................................................................</option>
	<?php
	}							  
    else 
	 
	 { ?>
	 <option value="<?php echo $rowsinst1->module_id;?>"><?php echo $rowsinst1->module_name; ?></option>
	 <?php 
	 
	 }	
	 
	 ?>

								  <?php
								  
								  $query1="select modules.module_name,modules.link,modules.module_id from modules,user_group_module where 
	modules.module_id=user_group_module.module_id and user_group_id='$user_group_id' order by modules.sort_order asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->module_id; ?>"><?php echo $rows1->module_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>
	
</td>

	<td width="20%" rowspan="3" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>

  </tr>	
	
	
<!--<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="20%" align="right"><strong>Select Date</strong><font color="#FF0000">*</font></td>
    <td width="15%"><input type="text" name="timesheet_date" size="45" id="timesheet_date" readonly="readonly" /></td>
    
	<td></td>
</tr>-->
 <tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="20%" align="right"><strong>Select User Group</strong><font color="#FF0000">*</font></td>
    <td width="15%"><select name="user">	

	<option value="0">Select..................................................................</option>

	 <?php 
	 
											
								  $queryinst1="SELECT * from user_group";
								  $resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst1)>0)
								  
								  {
									  while ($rowsinst1=mysql_fetch_object($resultsinst1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst1->user_group_id; ?>"><?php echo $rowsinst1->user_group_name; ?> </option>
                                    
                                
										  
										<?php  
										}
									  
									  
									  }
								  
								  
								  
								  
?>
								  
								  </select>	</td>
   
	<td></td>
  </tr>
  
<tr height="10">
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    </tr>
	
	
	
  
   <tr>
    
    <td colspan="4" valign="top" align="center">

	<table width="40%" border="0" class="table1" style="margin-left:150px;">
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="15%" align="center"><strong>Check<strong></td>
	<td width="250"><strong>Sub Module Name</strong></td>
   </tr>
  
   
   
   

	<?php
								  
								  $queryst="select sub_module.sub_module_name,sub_module.sublink,sub_module.sub_module_id from modules_submodules,sub_module,modules 
							 where modules_submodules.sub_module_id=sub_module.sub_module_id AND modules_submodules.module_id=modules.module_id and 
							 modules_submodules.module_id='$id' order by sub_module.sort_order asc";
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
									  
									  
									  
								
<td align="center"><input type="checkbox" name="outlet[]" value="<?php echo $rowsst->sub_module_id;?>"></td>
						
 <td><?php echo $rowsst->sub_module_name; ?></td>
</tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  
									  if ($id=='')
									  {
									  ?>
							  <tr bgcolor="#FFFFCC"><td colspan='2' align="center" height="40"><font color="#ff0000"><strong>Select a module to load its sub modules here!!</strong></td></tr> 
									  <?php 
									  }
									 else
									 {
									  
									  ?>
									  
									  
								<tr bgcolor="#FFFFCC"><td colspan='2' align="center" height="40"><font color="#ff0000"><strong>Sorry!! No sub modules under selected module</strong></td></tr> 	  
									  
								<?php 	  
								}
									}  
									  
									 ?>
									  
								
	
	
	</tr>

	<tr height="40">
    <td>&nbsp;</td>
    
    <td align="center">
	<?php 
	if ($id=='')
	{
	}
	else{
	?>
	<input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
  <?php 
  }
  ?>
	
  </tr>
	
	
	</table>
    <td>&nbsp;</td>
	
 
	<td>&nbsp;</td>
  </tr>
  
  
	
	
</table>

</form>
<!--<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "timesheet_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "timesheet_date"       // ID of the button
    }
  );
 
  </script> -->




<?php
/*
if($original_bunch_id!='')
{?>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("period_from","req",">>Please enter period from");
 frmvalidator.addValidation("period_to","req",">>Please enter period to");
</script>
<?php

}
else
{ 

*/?>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
  
 //frmvalidator.addValidation("area","dontselect=0",">>Please select an area");
frmvalidator.addValidation("user","dontselect=0",">>Please select usergroup");

</script>


 
  
 
 