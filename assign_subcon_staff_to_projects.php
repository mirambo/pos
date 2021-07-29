<?php 
$original_bunch_id=$_GET['original_bunch_id']; 
$period_to=$_GET['period_to'];
 $job_cat_id=$_GET['job_cat_id'];
?>

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



<form name="emp" id="emp" action="process_subcon_project.php?original_bunch_id=<?php echo $original_bunch_id;?>&period_to=<?php echo $period_to; ?>&job_cat_id=<?php echo $job_cat_id;  ?>" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Added Successfuly</div>';
?>

<?

if ($_GET['staffonsite']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Current staff are on site. New Staff should report from'.$period_to.'</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Subcontrator<font color="#FF0000">*</font></td>
    <td>
	<select name="sub_contractor">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $query1="select * from omconsultants order by cons_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->consultant_id; ?>"><?php echo $rows1->cons_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>
	
	
	</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Date Subcontracted<font color="#FF0000">*</font></td>
    <td><input type="text" name="subcon_date" size="41" id="subcon_date" readonly="readonly" /></td>
    </tr>
	
	<tr height="20">
    <td bgcolor="" width="2%">&nbsp;</td>
    <td width="20%">Select Projects<font color="#FF0000">*</font></td>
    <td width="15%">
	<select name="project">
	<?php
if($original_bunch_id=='')
{?>
<option>Select..................................</option>

<?php 
							
								  
								
								  $queryinst1="SELECT operations.operation_id, operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
  FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id";
								  $resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst1)>0)
								  
								  {
									  while ($rowsinst1=mysql_fetch_object($resultsinst1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst1->project_id; ?>"><?php echo $rowsinst1->c_name.' & '. $rowsinst1->operation_name; ?> </option>
                                    
                                
										  
										<?php  
										}
									  
									  
									  }
								  
								  }
								  
								  else
								  {
							
$queryinstb="SELECT operations.operation_name,clients.c_name,projects.period_from,projects.period_to,projects.contract_no,projects.project_id
  FROM operations,clients,projects where projects.operation_id=operations.operation_id AND projects.client_id=clients.client_id ORDER BY clients.c_name asc,operations.operation_name asc";
$resultsinstb=mysql_query($queryinstb) or die ("Error: $queryinstb.".mysql_error());
$rowsinstb=mysql_fetch_object($resultsinstb);
?>
<option value="<?php echo $rowsinstb->block_id;?>"><?php echo $rowsinstb->block_name; ?></option>
<?php	

$queryinst1="SELECT * FROM projects";
								  $resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst1)>0)
								  
								  {
									  while ($rowsinst1=mysql_fetch_object($resultsinst1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst1->project_id; ?>"><?php echo $rowsinst1->project_id; ?> </option>
                                    
                                
										  
										<?php  
										}
									  
									  
									  }

							  
}
?>
								  
								  </select>
	</td>
    <td width="20%" rowspan="3" align="left" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
	<td></td>
  </tr>
  
  
  
 
  
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Assign Project Manager/ Supervisor<font color="#FF0000">*</font></td>
    <td><select name="project_manager"><option>Select..................................</option>
								  <?php
								  
								  $query1="select * from omstaff";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->omstaff_id; ?>"><?php echo $rows1->f_name.' '.$rows1->m_name.' '.$rows1->l_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
	
	
	</td>
    </tr>
	
	
	
  
   <tr>
    
    <td colspan="4" valign="top" align="center">

	<table width="100%" border="0" class="table1" style="margin-left:150px;">
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td></td>
	<td><strong>Staff Name</strong></td>
	<td><strong>Job Title</strong></td>
	 <td><strong>Work Place</strong></td>
	   <td><strong>Segment</strong></td>

    
   </td>
  <tr bgcolor="#FF9900"><td colspan='5'><strong><font size="+1">National Staff</font></strong></td></tr> 
   
   
   
  </tr>
	<?php
								  
								  $queryst="select omstaff.omstaff_id,omstaff.f_name,omstaff.l_name,omstaff.m_name,omjob_titles.omjob_title_name from omstaff,omjob_titles
									where omjob_titles.omjob_title_id=omstaff.job_title_id AND omstaff.work_place_id!='1'AND omstaff.job_cat_id='1' AND omstaff.status='0'";
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
									  
									  
									  
								
									  <td><input type="checkbox" name="staff[]" value="<?php echo $rowsst->omstaff_id;?>" checked></td>
						
	   <td><?php echo $rowsst->f_name.' '.$rowsst->m_name.' '.$rowsst->l_name; ?></td>
	   <td><?php echo $rowsst->omjob_title_name; ?></td>
	   <td align="center"><input type="checkbox" name="job_loc[]" value="Office">Office &nbsp;&nbsp;<input type="checkbox" name="job_loc[]" value="Field" checked>Field</td>
    <td align="center"><input type="checkbox" name="segment[]" value="TL">Transmission Line & Substations&nbsp;&nbsp;<input type="checkbox" name="segment[]" value="PP">Power Plant</td>
    
   </td>
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
									  
	 <tr bgcolor="#FF9900"><td colspan='5'><strong><font size="+1">Expertriate Staff</font></strong></td></tr> 								  
									  <?php
								  
								  $queryst="select omstaff.omstaff_id,omstaff.f_name,omstaff.l_name,omstaff.m_name,omjob_titles.omjob_title_name from omstaff,omjob_titles
									where omjob_titles.omjob_title_id=omstaff.job_title_id AND omstaff.work_place_id!='1'AND omstaff.job_cat_id='2' AND omstaff.status='0'";
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
									  
									  
									  
								
									  <td><input type="checkbox" name="staff[]" value="<?php echo $rowsst->omstaff_id;?>" checked></td>
								
	   <td><?php echo $rowsst->f_name.' '.$rowsst->m_name.' '.$rowsst->l_name; ?></td>
	   <td><?php echo $rowsst->omjob_title_name; ?></td>
	   
	   <td align="center"><input type="checkbox" name="job_loc[]" value="Office">Office&nbsp;&nbsp;<input type="checkbox" name="job_loc[]" value="Field" checked>Field</td>
    <td align="center"><input type="checkbox" name="segment[]" value="TL">Transmission Line & Substations &nbsp;&nbsp;<input type="checkbox" name="segment[]" value="PP">Power Plant</td>
    
   </td>
  </tr>
									  
									  
									  <?php 

									  }
									  
									  	  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! All Expertriate Staffs Are Currently Occupied</strong></td></tr> 	  
									  
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
      inputField  : "subcon_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "subcon_date"       // ID of the button
    }
  );


 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("project","dontselect=0",">>Please select project");
 frmvalidator.addValidation("project_manager","dontselect=0",">>Please select project manager");

 frmvalidator.addValidation("period_from","req",">>Please enter period from");
 frmvalidator.addValidation("period_to","req",">>Please enter period to");
</script>


 
  
 
 