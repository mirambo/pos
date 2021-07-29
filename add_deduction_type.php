<?php 
$id=$_GET['id'];
$queryprodcat="select * from  deduction_logs where deduction_log_id='$id'";
$resultsprodcat=mysql_query($queryprodcat) or die ("Error: $queryprodcat.".mysql_error());
								  
$rowsprodcat=mysql_fetch_object($resultsprodcat);


?>
<form name="new_machine_category" action="processadd_ded_type.php?sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $id; ?>" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addnhifconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Record Created Successfully!!</font></strong></p></div>';

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Income from cant be greater than income to</font></strong></p></div>';

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Deduction Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="station_name" value="<?php echo $rowsprodcat->deduction_log_name;?>"></td>
    <td width="40%" rowspan="2" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  </tr>
    <tr height="30">
    <td>&nbsp;</td>
    <td>Sort Order<font color="#FF0000">*</font></td>
    <td width="23%"><input type="number" size="41" name="sort_order" value="<?php echo $rowsprodcat->sort_order;?>"></td>
  </tr>
  <!--<tr height="30">
    <td>&nbsp;</td>
    <td>Income to<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="income_to"></td>
  
  <tr>-->
  
  <tr height="30">
    <td>&nbsp;</td>
    <td>Default Deduction Amount<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="default_ded_amount" value="<?php echo $rowsprodcat->default_deduction_amount;?>"></td>
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
 frmvalidator.addValidation("station_name","req",">>Please enter deduction name");
 frmvalidator.addValidation("default_ded_amount","req",">>Please enter default amount");
  /*frmvalidator.addValidation("email_addr","req","Please enter  email address");
  frmvalidator.addValidation("email_addr","email","Please enter Valid email address");*/
 
 
  </SCRIPT>

			
			
			
					
			  