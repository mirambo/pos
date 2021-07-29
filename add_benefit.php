<?php 
include('Connections/fundmaster.php');
$approve=$_GET['approve'];
$emp_id=$_GET['emp_id'];
$current_month=$_GET['current_month'];
$payroll_id=$_GET['payroll_id'];
?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<form name="new_machine_category" action="processaddbenefit.php" method="post">			
<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addbenefitsconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Benefit Type Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
 <!-- <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Choose Benefit Type<font color="#FF0000">*</font></td>
    <td width="23%"><input type="radio" name="benefit_type" value="Cash">Cash  <input type="radio" name="benefit_type" value="Non-Cash">Non-Cash</td>
    <td width="40%" rowspan="2" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  </tr>-->
  <tr height="30">
    <td>&nbsp;</td>
    <td><!--Enter Benefit Name<font color="#FF0000">*</font>--></td>
    <td width="23%">
	<!--<input type="text" size="41" name="benefit_name">-->
	<input type="hidden" size="41" name="emp_id" value="<?php echo $emp_id?>">
	<input type="hidden" size="41" name="current_month" value="<?php echo $current_month?>">
	<input type="hidden" size="41" name="payroll_id" value="<?php echo $payroll_id?>">
	
	
	</td>
	 <td width="40%" rowspan="3" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  
  </tr>
<tr height="30">
    <td>&nbsp;</td>
    <td>Enter Benefit Name<font color="#FF0000">*</font>
	<input type="text" size="41" name="deduction_name">
	</td>
<tr height="30">
    <td>&nbsp;</td>
    <td width="23%">Enter Benefit Amount<input type="text" size="41" name="deduction_amount"></td>
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

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_machine_category");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("benefit_name","req",">>Please enter benefit name");
 frmvalidator.addValidation("benefit_amount","req",">>Please enter benefit amount");


 
 
  </SCRIPT>

			
			
			
			