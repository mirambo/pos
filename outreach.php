<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<form name="emp" id="emp" action="processaddoutreach.php" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="30%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><?php

if ($_GET['addoutreachconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Saved Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="7" ><h3>Staff Personal Details</h3></td>
    
   
    </tr>
  <tr height="20">
   
    <td colspan="2">Outreach Date From<font color="#FF0000">*</font></td>
    <td bgcolor=""><div id='emp_date_from_errorloc' class="error_strings"></div><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></td>
    <td width="30%">Outreach Date To<font color="#FF0000">*</font></td>
    <td width="5%"><div id='emp_date_to_errorloc' class="error_strings"></div><input type="text" name="date_to" size="20" id="date_to" readonly="readonly" /></td>
	
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="20">
    <td colspan="2">Faculty Member Male<font color="#FF0000">*</font></td>
    <td><div id='emp_fuc_male_errorloc' class="error_strings"></div><input type="text" size="20" name="fuc_male"></td>
    <td>Faculty Member Female<font color="#FF0000">*</font></td>

    <td><div id='emp_fuc_female_errorloc' class="error_strings"></div><input type="text" size="20" name="fuc_female"></td>
    </tr>
  <tr height="20">
   <td  colspan="2">Resident Male<font color="#FF0000">*</font></td>
    <td><div id='emp_res_male_errorloc' class="error_strings"></div><input type="text" size="20" name="res_male" value="<?php echo $l_name;?> "></td>
    <td>Resident Female<font color="#FF0000">*</font></td>
	


    <td><div id='emp_res_female_errorloc' class="error_strings"></div><input type="text" size="20" name="res_female"></td>
    </tr>
	<tr height="20">
    <td  colspan="2">Patients Male<font color="#FF0000">*</font></td>
    <td><div id='emp_pat_male_errorloc' class="error_strings"></div><input type="text" size="20" name="pat_male" value="<?php echo $l_name;?> "></td>
    <td>Patients Female<font color="#FF0000">*</font></td>
    <td><div id='emp_pat_female_errorloc' class="error_strings"></div><input type="text" size="20" name="pat_female" value="<?php echo $l_name;?> "></td>
    </tr>
	<tr height="20">
    <td  colspan="2">Patient Children<font color="#FF0000">*</font></td>
    <td><div id='emp_pat_child_errorloc' class="error_strings"></div><input type="text" size="20" name="pat_child" value="<?php echo $l_name;?> "></td>
    <td>Outreach Location<font color="#FF0000">*</font></td>
    <td><div id='emp_outreach_loc_errorloc' class="error_strings"></div><input type="text" size="20" name="outreach_loc" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="40">
	<td>&nbsp;</td>
	<td colspan="4" align="center"><input type="submit" name="submit" value="Next>>>>>">&nbsp;&nbsp;<!--<input type="reset" value="Cancel">--></td>
    
    
    </tr>
	
	
</table>

</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  
  </script> 

<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("emp");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
 frmvalidator.addValidation("date_from","req",">>Required");
 frmvalidator.addValidation("date_to","req",">>Required");
 
 
 frmvalidator.addValidation("fuc_male","req",">>Required");
 frmvalidator.addValidation("fuc_male","numeric",">>Must be a number");
 frmvalidator.addValidation("fuc_female","req",">>Required");
 frmvalidator.addValidation("fuc_female","numeric",">>Must be a number");
 
 frmvalidator.addValidation("res_male","req",">>Required");
 frmvalidator.addValidation("res_male","numeric",">>Must be a number");
 frmvalidator.addValidation("res_female","req",">>Required");
 frmvalidator.addValidation("res_female","numeric",">>Must be a number");
 
 frmvalidator.addValidation("pat_male","req",">>Required");
 frmvalidator.addValidation("pat_male","numeric",">>Must be a number");
 frmvalidator.addValidation("pat_female","req",">>Required");
 frmvalidator.addValidation("pat_female","numeric",">>Must be a number");
 frmvalidator.addValidation("pat_child","req",">>Required");
 frmvalidator.addValidation("pat_child","numeric",">>Must be a number");
  frmvalidator.addValidation("outreach_loc","req",">>Required");
 
 
 
 

  
//]]></script>