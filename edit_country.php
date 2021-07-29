<?php
$id=$_GET['country_id'];
if (isset($_POST['edit_country']))
{
editcountry ($country_code,$country_name);

}

$sql="SELECT * FROM nrc_country where country_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

 ?>

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
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
    <td width="19%">Country Code<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="country_code" value="<?php echo $rows->country_code;?>"></td>
    <td width="40%" valign="top"></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Country Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="country_name" value="<?php echo $rows->country_name;?>"> </td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  

  
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">
	<input type="hidden" name="edit_country" id="edit_country" value="1">
	
	&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
	
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
 /*frmvalidator.addValidation("country_code","req",">>Please enter country code");
 frmvalidator.addValidation("country_code","numeric",">>code must be a number");
 frmvalidator.addValidation("country_name","req",">>Please enter country name");*/

 
 
 
  </SCRIPT>