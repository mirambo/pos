<?php
/*if (isset($_POST['add_usergroup']))
{
addusergroup ($user_group,$desc);
}*/
 ?>


<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="new_supplier" action="processaddusergroup.php" method="post">		
<!--<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">-->			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addgroupconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exists</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Enter User Group Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="user_group"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
   <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%" valign="top">Enter Description<font color="#FF0000"></font></td>
    <td width="23%"><textarea cols="36" rows="4" name="desc"></textarea></td>
   
  </tr>
  
  
  
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">
	<!--<input type="hidden" name="add_usergroup" id="add_usergroup" value="1">-->&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 frmvalidator.addValidation("user_group","req",">>Please enter user group");
 frmvalidator.addValidation("allow_add","selone_radio",">>Please grant priviledge for adding");
 frmvalidator.addValidation("allow_edit","selone_radio",">>Please grant priviledge for editing");
 frmvalidator.addValidation("allow_delete","selone_radio",">>Please grant priviledge for deleting");
 
 
 
  </SCRIPT>