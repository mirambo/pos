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
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<form name="emp" id="emp" action="processassignexpert.php?original_bunch_id=<?php echo $original_bunch_id;?>&period_to=<?php echo $period_to; ?>&job_cat_id=<?php echo $job_cat_id;  ?>" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><?php

if ($_GET['wrongdate']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Sorry!!Period from cannot be greater than period to</div>';
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
    <td bgcolor="">&nbsp;</td>
    <td width="10%">Select Client<font color="#FF0000">*</font></td>
    <td width="15%">
	<select name="client_id">
	<?php
if($original_bunch_id=='')
{?>
<option>Select..................................</option>

<?php 
							
								  
								
								  $queryinst1="SELECT * FROM clients order by c_name asc";
								  $resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst1)>0)
								  
								  {
									  while ($rowsinst1=mysql_fetch_object($resultsinst1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst1->client_id; ?>"><?php echo $rowsinst1->c_name; ?> </option>
                                    
                                
										  
										<?php  
										}
									  
									  
									  }
								  
								  }
								  
								  else
								  {
							
$queryinstb="SELECT blocks.block_id,blocks.block_name,clients.c_name,clients.client_id,employees.emp_id,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname FROM 
employees,clients,blocks,bunch where employees.emp_id=bunch.project_manager_id AND bunch.client_id=clients.client_id AND bunch.block_id=blocks.block_id AND bunch.bunch_id='$original_bunch_id'";
$resultsinstb=mysql_query($queryinstb) or die ("Error: $queryinstb.".mysql_error());
$rowsinstb=mysql_fetch_object($resultsinstb);
?>
<option value="<?php echo $rowsinstb->block_id;?>"><?php echo $rowsinstb->block_name; ?></option>
<?php	

$queryinst1="SELECT * FROM blocks order by block_name asc";
								  $resultsinst1=mysql_query($queryinst1) or die ("Error: $queryinst1.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst1)>0)
								  
								  {
									  while ($rowsinst1=mysql_fetch_object($resultsinst1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst1->block_id; ?>"><?php echo $rowsinst1->block_name; ?> </option>
                                    
                                
										  
										<?php  
										}
									  
									  
									  }

							  
}
?>
								  
								  </select>
	</td>
    <td width="20%" rowspan="8" align="left" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
  </tr
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Sub Contractor<font color="#FF0000">*</font></td>
    <td width="23%">
	<select name="consultant_id">	
	
	<?php
if($original_bunch_id!='')
{?>
<option value="<?php echo $rowsinstb->client_id; ?>"><?php echo $rowsinstb->c_name; ?></option>
<?php
$queryinstc="SELECT * FROM clients where status='0' order by c_name asc";
$resultsinstc=mysql_query($queryinstc) or die ("Error: $queryinstc.".mysql_error());
								  
if (mysql_num_rows($resultsinstc)>0)
								  
								  {
									  while ($rowsinstc=mysql_fetch_object($resultsinstc))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinstc->client_id; ?>"><?php echo $rowsinstc->c_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }

}

else
{
 ?>
	<option>Select..................................</option>
	
								  <?php
								
								  $queryinst2="SELECT * FROM omconsultants order by cons_name asc";
								  $resultsinst2=mysql_query($queryinst2) or die ("Error: $queryinst2.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst2)>0)
								  
								  {
									  while ($rowsinst2=mysql_fetch_object($resultsinst2))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst2->consultant_id; ?>"><?php echo $rowsinst2->cons_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  }
								  
								  
								  ?>
								  
								  </select>
	</td>
    <td width="40%"  valign="top"></td>
  </tr>
 
  
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Period From<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="period_from" id="period_from" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Period To<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="period_to" id="period_to" ></td>
    </tr>
	
	
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Next>>>">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
	
	
</table>

</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "period_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "period_from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "period_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "period_to"       // ID of the button
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
 frmvalidator.addValidation("client_id","dontselect=0",">>Please select client");
 frmvalidator.addValidation("consultant_id","dontselect=0",">>Please select consultant");
 frmvalidator.addValidation("period_from","req",">>Please enter period from");
 frmvalidator.addValidation("period_to","req",">>Please enter period to");
</script>


 
  
 
 