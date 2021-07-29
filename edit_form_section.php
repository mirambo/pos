<?php
$id=$_GET['form_section_id'];
$sqlsec="SELECT * FROM form_sections where form_section_id='$id'";
$resultssec= mysql_query($sqlsec) or die ("Error $sqlsec.".mysql_error());
$rowssec=mysql_fetch_object($resultssec);

 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<form name="new_supplier" action="processeditformsection.php?form_section_id=<?php echo $id;?>" method="post">			
			<table width="100%" border="0" class=demoTable id=demoTable>
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
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
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Form Section Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="section_name" value="<?php echo $rowssec->form_section_name;?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Sort Order<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="sort_order" value="<?php echo $rowssec->sort_order;?>"></td>
    <td width="40%"  valign="top"></td>
  </tr>
  
  <!--<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Exchange Rate<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="curr_rate"</td>
    <td width="40%" valign="top"></td>
  </tr>-->
  
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save" onClick="CallJS('submit()')">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 frmvalidator.addValidation("section_name","req",">>Please enter section name");
 frmvalidator.addValidation("sort_order","req",">>Please enter sort order");
 frmvalidator.addValidation("sort_order","numeric",">>Sort order must be a number");

 
 
  </SCRIPT>