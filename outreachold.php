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
	<td colspan="4" height="30" align="center"><?php

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
	
	<td colspan="6" ><h3>Staff Personal Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
   
    <td colspan="2">Outreach Date From<font color="#FF0000">*</font></td>
    <td bgcolor=""><div id='emp_date_from_errorloc' class="error_strings"></div><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></td>
    <td width="30%">Outreach Date To</td>
    <td width="5%"><div id='emp_date_to_errorloc' class="error_strings"></div><input type="text" name="date_to" size="20" id="date_to" readonly="readonly" /></td>
	<td width="5%"><!--<input type="text" size="20" name="m_name" value="<?php echo $m_name;?> ">--></td>
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="20">
    <td colspan="2">Faculty Member Male<font color="#FF0000">*</font></td>
    <td><div id='emp_fuc_male_errorloc' class="error_strings"></div><input type="text" size="20" name="fuc_male"></td>
    <td>Faculty Member Female</td>

    <td><div id='emp_fuc_female_errorloc' class="error_strings"></div><input type="text" size="20" name="fuc_female"></td>
    </tr>
  <tr height="20">
   <td  colspan="2">Resident Male<font color="#FF0000">*</font></td>
    <td><div id='emp_res_male_errorloc' class="error_strings"></div><input type="text" size="20" name="res_male" value="<?php echo $l_name;?> "></td>
    <td>Resident Female</td>
	


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
	
	<tr height="20">
	
	<td colspan="6" ><h3>Diagnosis Records</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h4>Cataract</h4></td>
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	<td>Male</td>
	<td><div id='emp_diag_cat_male_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_cat_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td align="left"><div id='emp_diag_cat_female_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_cat_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_cat_child_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_cat_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h4>Glaucoma</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	<td>Male</td>
	<td><div id='emp_diag_glac_male_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_glac_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_glac_female_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_glac_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_glac_child_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_glac_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h4>Trauma</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	<td>Male</td>
	<td><div id='emp_diag_traum_male_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_traum_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_traum_female_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_traum_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_traum_child_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_traum_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Corneal Ulcers</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><div id='emp_diag_corn_male_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_corn_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_corn_female_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_corn_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_corn_child_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_corn_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Uveitis</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><div id='emp_diag_uve_male_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_uve_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_uve_female_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_uve_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_uve_child_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_uve_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Conjuctivis</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><div id='emp_diag_conj_male_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_conj_male" ></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_conj_female_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_conj_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_conj_child_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_conj_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Reflactive Error</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><div id='emp_diag_refl_male_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_refl_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_refl_female_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_refl_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_refl_child_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_refl_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Squint</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><div id='emp_diag_sq_male_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_sq_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_sq_female_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_sq_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_sq_child_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_sq_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Others</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><div id='emp_diag_other_male_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_other_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_other_female_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_other_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_diag_other_child_errorloc' class="error_strings"></div><input type="text" size="20" name="diag_other_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Surgeries/ Operations</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Cataract Sergery</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><div id='emp_serg_cat_male_errorloc' class="error_strings"></div><input type="text" size="20" name="serg_cat_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_serg_cat_female_errorloc' class="error_strings"></div><input type="text" size="20" name="serg_cat_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_serg_cat_child_errorloc' class="error_strings"></div><input type="text" size="20" name="serg_cat_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Trauma Repair</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><div id='emp_serg_traum_male_errorloc' class="error_strings"></div><input type="text" size="20" name="serg_traum_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_serg_traum_female_errorloc' class="error_strings"></div><input type="text" size="20" name="serg_traum_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_serg_traum_child_errorloc' class="error_strings"></div><input type="text" size="20" name="serg_traum_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Other Minor Sergery</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><div id='emp_minor_serg_male_errorloc' class="error_strings"></div><input type="text" size="20" name="minor_serg_male" value="<?php echo $l_name;?> "></td>
	<td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_minor_serg_female_errorloc' class="error_strings"></div><input type="text" size="20" name="minor_serg_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_minor_serg_child_errorloc' class="error_strings"></div><input type="text" size="20" name="minor_serg_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Blindness</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
	<td></td>
    <td>Unilateral<font color="#FF0000">*</font></td>
    <td><div id='emp_blind_unilat_errorloc' class="error_strings"></div><input type="text" size="20" name="blind_unilat" value="<?php echo $l_name;?> "></td>
    <td>Bilateral<font color="#FF0000">*</font></td>
    <td><div id='emp_blind_bilat_errorloc' class="error_strings"></div><input type="text" size="20" name="blind_bilat" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Refferals</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
    <td>Male</td>
	<td><div id='emp_ref_male_errorloc' class="error_strings"></div><input type="text" size="20" name="ref_male" value="<?php echo $l_name;?> "></td>
    <td>Female<font color="#FF0000">*</font></td>
    <td><div id='emp_ref_female_errorloc' class="error_strings"></div><input type="text" size="20" name="ref_female" value="<?php echo $l_name;?> "></td>
    <td>Children<font color="#FF0000">*</font></td>
    <td><div id='emp_ref_child_errorloc' class="error_strings"></div><input type="text" size="20" name="ref_child" value="<?php echo $l_name;?> "></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Remarks</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
    <td></td>
	<td></td>
    <td>Remarks<font color="#FF0000">*</font></td>
    <td><textarea name="remarks" rows="5" cols="30"></textarea></td>
    <td></td>
    <td></td>
    </tr>
	
	
	
	
	

	
	<tr height="40">
	<td>&nbsp;</td>
	<td colspan="4" align="center"><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    
    <td>&nbsp;</td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
 frmvalidator.addValidation("fuc_female","req",">>Required");
 
 frmvalidator.addValidation("res_male","req",">>Required");
 frmvalidator.addValidation("res_female","req",">>Required");
 
 frmvalidator.addValidation("pat_male","req",">>Required");
 frmvalidator.addValidation("pat_female","req",">>Required");
 frmvalidator.addValidation("pat_child","req",">>Required");
  frmvalidator.addValidation("outreach_loc","req",">>Required");
 
 frmvalidator.addValidation("diag_cat_male","req",">>Required");
 frmvalidator.addValidation("diag_cat_female","req",">>Required");
 frmvalidator.addValidation("diag_cat_child","req",">>Required");
 
 frmvalidator.addValidation("diag_glac_male","req",">>Required");
 frmvalidator.addValidation("diag_glac_female","req",">>Required");
 frmvalidator.addValidation("diag_glac_child","req",">>Required");
 
 frmvalidator.addValidation("diag_traum_male","req",">>Required");
 frmvalidator.addValidation("diag_traum_female","req",">>Required");
 frmvalidator.addValidation("diag_traum_child","req",">>Required");
  
 frmvalidator.addValidation("diag_corn_male","req",">>Required");
 frmvalidator.addValidation("diag_corn_female","req",">>Required");
 frmvalidator.addValidation("diag_corn_child","req",">>Required");
 
 frmvalidator.addValidation("diag_uve_male","req",">>Required");
 frmvalidator.addValidation("diag_uve_female","req",">>Required");
 frmvalidator.addValidation("diag_uve_child","req",">>Required");    
 
 frmvalidator.addValidation("diag_conj_male","req",">>Required");
 frmvalidator.addValidation("diag_conj_female","req",">>Required");
 frmvalidator.addValidation("diag_conj_child","req",">>Required");
 
 frmvalidator.addValidation("diag_refl_male","req",">>Required");
 frmvalidator.addValidation("diag_refl_female","req",">>Required");
 frmvalidator.addValidation("diag_refl_child","req",">>Required");
 
 frmvalidator.addValidation("diag_sq_male","req",">>Required");
 frmvalidator.addValidation("diag_sq_female","req",">>Required");
 frmvalidator.addValidation("diag_sq_child","req",">>Required");
 
 frmvalidator.addValidation("diag_sq_male","req",">>Required");
 frmvalidator.addValidation("diag_sq_female","req",">>Required");
 frmvalidator.addValidation("diag_sq_child","req",">>Required"); 
 
 frmvalidator.addValidation("diag_other_male","req",">>Required");
 frmvalidator.addValidation("diag_other_female","req",">>Required");
 frmvalidator.addValidation("diag_other_child","req",">>Required");
 
 frmvalidator.addValidation("serg_cat_male","req",">>Required");
 frmvalidator.addValidation("serg_cat_female","req",">>Required");
 frmvalidator.addValidation("serg_cat_child","req",">>Required");
 
 frmvalidator.addValidation("serg_traum_male","req",">>Required");
 frmvalidator.addValidation("serg_traum_female","req",">>Required");
 frmvalidator.addValidation("serg_traum_child","req",">>Required"); 
  
 frmvalidator.addValidation("minor_serg_male","req",">>Required");
 frmvalidator.addValidation("minor_serg_female","req",">>Required");
 frmvalidator.addValidation("minor_serg_child","req",">>Required");
 
 frmvalidator.addValidation("blind_unilat","req",">>Required");
 frmvalidator.addValidation("blind_bilat","req",">>Required");
 
 frmvalidator.addValidation("ref_male","req",">>Required");
 frmvalidator.addValidation("ref_female","req",">>Required");
 frmvalidator.addValidation("ref_child","req",">>Required");
 
 

  
//]]></script>