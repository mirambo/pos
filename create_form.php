<?php



 ?>
 
 <script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<form name="new_supplier" action="processaddform.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Block Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Income from cant be greater than income to!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter form Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="form_name"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select form type<font color="#FF0000">*</font></td>
    <td width="23%"><input type="radio"  name="form_type" value="TextBox">Text
	<input type="radio"  name="form_type" value="Select">Select
	<input type="radio"  name="form_type" value="calendar">Calender
	<input type="radio"  name="form_type" value="calendar">Radio Button
	<input type="radio"  name="form_type" value="textarea">Text Area
	
	</td>
    <td width="40%" valign="top"></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Sort Order<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="sort_order"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
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
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("ben_name","req",">>Please enter benefit name");
 frmvalidator.addValidation("ben_amount","req",">>Please enter default benefit amount");

 
 
 
  </SCRIPT>