<?php $idu=$_GET['get_user_id']; ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="new_supplier" action="processchangeuserpass.php?get_user_id=<?php echo $idu ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['wrongoldpass']==1)
echo '<div align="center" style="background: #FFCC33; height:25px; width:600px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Sorry!! Old Password do not exist!!</font></strong></p></div>';
?>

<?php

if ($_GET['passmismatch']==1)
echo '<div align="center" style="background: #FFCC33; height:25px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry new password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['newpassconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Password has been changed successfully!!</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter New Password<font color="#FF0000">*</font></td>
    <td width="23%"><input type="password" size="41" name="newpass"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Confrim New Password<font color="#FF0000">*</font></td>
    <td width="23%"><input type="password" size="41" name="cnewpass"></td>
    <td width="40%" rowspan="6" valign="top"></td>
  </tr>
  
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 frmvalidator.addValidation("newpass","req",">>Please enter new password");
 frmvalidator.addValidation("cnewpass","req",">>Please confirm new password");
 
 
 
  </SCRIPT>