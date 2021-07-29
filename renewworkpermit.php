<?php
$work_permit_id=$_GET['work_permit_id'];
$emp_id=$_GET['emp_id'];

$sqlemp_det="select * from employees where emp_id='$emp_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
$emp_fname=$rowsemp_det->emp_fname;
$emp_mname=$rowsemp_det->emp_mname;
$emp_lname=$rowsemp_det->emp_lname;


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



<form name="new_supplier" action="processrenewworkpermit.php?work_permit_id=<?php echo $work_permit_id;?>&emp_id=<?php echo $emp_id; ?>" method="post">			
			<table width="100%" border="0">
			  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="2" height="30" align="center"><strong><h4>Renew Work Permit for<?php
echo $emp_fname.''.$emp_mname.''.$emp_lname;


?>

</h4></strong></td><td></td>
    </tr>
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addcdpconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Record Exist</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>New Work Permit Number<font color="#FF0000"></font></td>
    <td><input type="text" size="41" name="new_workpermit_no" ></td>
	<td width="40%" rowspan="4" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>New Date of Issue<font color="#FF0000">*</font></td>
    <td><input type="text" name="new_issue_date" size="41" id="new_issue_date" readonly="readonly" /></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>New Expiry Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="new_exp_date" size="41" id="new_exp_date" readonly="readonly" /></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Place Of Issue<font color="#FF0000"></font></td>
    <td><input type="text" size="41" name="issue_place"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Renewal Charges<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount"></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Currency<font color="#FF0000">*</font></td>
    <td width="23%">
	<select name="currency">	
	<option>Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM currency order by curr_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->curr_id; ?>"><?php echo $rowsinst->curr_initials; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
	</td>
   
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
      inputField  : "new_exp_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "new_exp_date"       // ID of the button
    }
	
	
	
	
  );
  
  Calendar.setup(
    {
      inputField  : "new_issue_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "new_issue_date"       // ID of the button
    }
	
	
	
	
  );
  
  
  
  
  </script> 



<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("new_issue_date","req",">>Please enter new date of issue");
 frmvalidator.addValidation("issue_place","req",">>Please enter new place of issue");
 frmvalidator.addValidation("new_exp_date","req",">>Please enter new expiry date");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("amount","req",">>Please enter renewal charges");
 

 
  
 
 
  </SCRIPT>