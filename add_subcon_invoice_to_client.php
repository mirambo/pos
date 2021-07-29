<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
 <script src="jquery.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="jquery-ui.css">
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-m',
        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
</script>
<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>



<form name="new_supplier" action="processaddsubconinvtoclient.php" method="post">			
			<table width="80%" border="0" align="center">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Invoice Recorded Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Invoice for this month already generated</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td width="20%"><strong>Select SubContrator</strong><font color="#FF0000">*</font></td>
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
	<td width="30%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%"><strong>Select Project/Client</strong><font color="#FF0000">*</font></td>
    <td>
	<select name="project">
	<?php
if($project_id=='')
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
								  
								  }?>
	
	
	</td>
	
    </tr>
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td width="15%"><strong>Enter Invoice No.</strong><font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="invoice_no" ></td>
	
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td><strong>Enter Date Generated<strong></td>
    <td><input type="text" name="date_generated" size="45" id="date_generated" readonly="readonly" /></td>
    </tr>
		<tr height="20">
    <td>&nbsp;</td>
    <td><strong>Invoice Month<strong><font color="#FF0000">*</font></td>
    <td><input name="date_month" id="date_month" class="date-picker" size="40" /></td>
    </tr>-->
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Days Spent By Staff<font color="#FF0000">*</font></td>
    <td><input type="text" name="days_spent" size="41" /><font color="#FF0000">*</font></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Terms Of Payment</td>
    <td><input type="text" size="41" name="tom" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Manhours Amount (USD)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="manhour" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Per Diem Charges (USD)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="perdiem" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Visa Charges (USD)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="visa_charge" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Flight Charges (USD)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="flight_charges" ></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Other Charges (USD)</td>
    <td><input type="text" size="41" name="other_charges" ></td>
    </tr>
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td><strong>Total Invoice Amount (USD)</strong><font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="ttl_inv" ></td>
    </tr>-->
	<tr height="20">
    <td>&nbsp;</td>
    <td valign="top">Remarks<font color="#FF0000">*</font></td>
    <td><textarea name="remarks" cols="36" rows="4"></textarea></td>
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

<!--<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_generated",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_generated"       // ID of the button
    }
  );
  
  
  
  
  </script> -->



<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("sub_contractor","dontselect=0",">>Please select subcontractor");
 frmvalidator.addValidation("project","dontselect=0",">>Please select project");
 frmvalidator.addValidation("invoice_no","req",">>Please enter Invoice number");
 frmvalidator.addValidation("date_generated","req",">>Please enter date generated");
 frmvalidator.addValidation("date_month","req",">>Please enter invoiced month");
 frmvalidator.addValidation("ttl_inv","req",">>Please enter total invoiced amount");  
 frmvalidator.addValidation("email","req",">>Please enter email address");
 frmvalidator.addValidation("email","email",">>Please enter valid email");
frmvalidator.addValidation("job_title","dontselect=0",">>Please select job title");
frmvalidator.addValidation("job_cat","dontselect=0",">>Please select job category");
 
 
 
 
  </SCRIPT>