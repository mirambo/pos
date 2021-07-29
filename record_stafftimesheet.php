<?php 
$original_bunch_id=$_GET['original_bunch_id']; 
$period_to=$_GET['period_to'];
$job_cat_id=$_GET['job_cat_id'];
 
$id=$_GET['project_id'];
?>
<SCRIPT language="javascript">
function reload(form)
{
var val=form.project_id.options[form.project_id.options.selectedIndex].value;
self.location='home.php?stafftimesheet=stafftimesheet&project_id=' + val ;

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
<SCRIPT language="JavaScript">
    function validation() 
{ 
        var chks = document.getElementsByName('rr[]');//here rr[] is the name of the textbox 
        var flag=0;                     
        for (var i = 0; i < chks.length; i++) 
        {         
            if (chks[i].value!="") 
                { 
                flag=1;
               } 
 
 
 
        } 
 
        if (flag==0)
            {
                alert("Please fillup atleast one textbox");
                return false;
            }
        else return true;
 
} 


</SCRIPT>



<form name="emp" id="emp" action="processstimesheet.php" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Timesheet Marked Successfuly</div>';
?>

<?

if ($_GET['recordexistdate']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Timesheet For This Day Has Been R</font></strong></p></div>';
?>
 
<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="20%" align="right">Select Project<font color="#FF0000">*</font></td>
    <td width="15%"><select name="project_id" id="project_id" onChange="reload(this.form)">
	<?php 
	
$queryinst1="SELECT operations.operation_id, operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id and projects.project_id='$id'";
$resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
$rowsinst1=mysql_fetch_object($resultsinst1);
	if ($id=='')
	{


	?>
	<option>-------------------Select-----------------------</option>
								  <?php
								  
     }
	
	else 
	 
	 { ?>
	 <option value="<?php echo $rowsinst1->project_id; ?>"><?php echo $rowsinst1->c_name.' '. $rowsinst1->operation_name; ?></option>
	 <?php 
	 
	 }												
 $queryinst1="SELECT operations.operation_id, operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
  FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id";
								  $resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst1)>0)
								  
								  {
									  while ($rowsinst1=mysql_fetch_object($resultsinst1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst1->project_id; ?>"><?php echo $rowsinst1->c_name.' '. $rowsinst1->operation_name; ?> </option>
                                    
                                
										  
										<?php  
										}
									  
									  
									  }
								  
								  
								  
								  
?>
								  
								  </select>	</td>
    <td width="20%" rowspan="3" align="left" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
	<td></td>
  </tr>
	
	<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="20%" align="right">Select Date<font color="#FF0000">*</font></td>
    <td width="15%"><input type="text" name="timesheet_date" size="45" id="timesheet_date" readonly="readonly" />	</td>
    <td width="20%" ></td>
	<td></td>
  </tr>
  
<tr height="10">
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    </tr>
	
	
	
  
   <tr>
    
    <td colspan="4" valign="top" align="center">

	<table width="100%" border="0" class="table1" style="margin-left:150px;">
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td></td>
	<td width="250"><strong>Staff Name</strong></td>
	<td width="250"><strong>Job Title</strong></td>
	 <td><strong>Timesheet</strong></td>
	   <!--<td><strong>Segment</strong></td>-->

    
   </td>
  <tr bgcolor="#FF9900"><td colspan='5'><strong><font size="+1">National Staff</font></strong></td></tr> 
   
   
   
  </tr>
	<?php
								  
								  $queryst="select employees.emp_id,employees.emp_fname,employees.emp_lname,employees.emp_mname,omjob_titles.omjob_title_name
								  from employees,omjob_titles,assigned_staffold
									where assigned_staffold.staff=employees.emp_id AND omjob_titles.omjob_title_id=employees.title 
									AND employees.work_place!='1'AND employees.staff_type='1' AND employees.status='1' and assigned_staffold.project_id='$id'";
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
									  
									  
									  
								
									  <td><input type="checkbox" name="staff[]" value="<?php echo $rowsst->emp_id;?>" checked></td>
						
	   <td><?php echo $rowsst->emp_fname.' '.$rowsst->emp_fname.''.$rowsst->emp_lname; ?></td>
	   <td><?php echo $rowsst->omjob_title_name; ?></td>
	   <td align="center">
	   <input type="checkbox" name="time_sheet[]" value="X"><font color="#009933"><strong>On Duty</strong></font> &nbsp;&nbsp;
	   <input type="checkbox" name="time_sheet[]" value="Y" ><font color="#ff0000"><strong>Off Duty</strong></font>
	  
	   
	   </td>
    <!--<td align="center"><input type="checkbox" name="segment[]" value="TL">Transmission Line &nbsp;&nbsp;<input type="checkbox" name="segment[]" value="PP">Power Plant</td>-->
    
   </td>
  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! No National Staff in the field yet</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	 <tr bgcolor="#FF9900"><td colspan='5'><strong><font size="+1">Expertriate Staff</font></strong></td></tr> 								  
									  <?php
								  
								  $queryst="select employees.emp_id,employees.emp_fname,employees.emp_lname,employees.emp_mname,omjob_titles.omjob_title_name
								  from employees,omjob_titles,assigned_staffold
									where assigned_staffold.staff=employees.emp_id AND omjob_titles.omjob_title_id=employees.title 
									AND employees.work_place!='1'AND employees.staff_type='2' AND employees.status='1' and assigned_staffold.project_id='$id'";
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
									  
									  
									  
								
									  <td><input type="checkbox" name="staff[]" value="<?php echo $rowsst->emp_id;?>" checked></td>
								
	   <td><?php echo $rowsst->emp_fname.' '.$rowsst->emp_fname.''.$rowsst->emp_lname; ?></td>	
	   <td><?php echo $rowsst->omjob_title_name; ?></td>
	   
	   <td align="center">
	   <input type="checkbox" name="time_sheet[]" value="X"><font color="#009933"><strong>On Duty</strong></font> &nbsp;&nbsp;
	   <input type="checkbox" name="time_sheet[]" value="Y" ><font color="#ff0000"><strong>Off Duty</strong></font>
	   
	   
	   </td>
    <!--<td align="center"><input type="checkbox" name="segment[]" value="TL">Transmission Line &nbsp;&nbsp;<input type="checkbox" name="segment[]" value="PP">Power Plant</td>-->
    
   </td>
  </tr>
									  
									  
									  <?php 

									  }
									  
									  	  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! No Expertriate Staff in the field yet</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
								
	
	
	

	<tr height="40">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
	
  </tr>
	
	
	</table>
    <td>&nbsp;</td>
	
 
	<td>&nbsp;</td>
  </tr>
  
  
	
	
</table>

</form>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "timesheet_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "timesheet_date"       // ID of the button
    }
  );
  
  
  
  
  </script> 



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
  
 frmvalidator.addValidation("timesheet_date","req",">>Please enter timesheet date");
 <!--frmvalidator.addValidation("project_id","dontselect=0",">>Please select projects");-->

</script>


 
  
 
 