<?php
$consultant_id=$_GET['consultant_id'];
$sqlx="select * from omconsultants where consultant_id='$consultant_id'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);

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



<form name="new_supplier" action="processeditsubcon.php?consultant_id=<?php echo $consultant_id; ?>" method="post">			
			<table width="80%" border="0" align="center">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Consultant Name<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="cons_name" value="<?php echo $rowsx->cons_name;?>"></td>
	<td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Postal Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="cons_address" value="<?php echo $rowsx->cons_address;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Town<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="cons_town" value="<?php echo $rowsx->cons_town;?>"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Physical Address</td>
    <td><input type="text" size="41" name="cons_cp_address" value="<?php echo $rowsx->cons_cp_address;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Telephone Number<font color="#FF0000">*</font></td>
    <td><input type="text" name="cons_telephone" size="41" value="<?php echo $rowsx->cons_phone;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="cons_email" value="<?php echo $rowsx->cons_email;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Contact Person<font color="#FF0000">*</font></td>
    <td><input type="text" name="cons_contact_person" size="41"  value="<?php echo $rowsx->cons_contact_person;?>"></td>
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
 frmvalidator.addValidation("cons_name","req",">>Please enter consultant name");
 frmvalidator.addValidation("cons_address","req",">>Please enter postal address");
 frmvalidator.addValidation("cons_town","req",">>Please enter town");
 frmvalidator.addValidation("cons_cp_address","req",">>Please enter physical address");
 frmvalidator.addValidation("cons_telephone","req",">>Please enter telephone number");  
 frmvalidator.addValidation("cons_email","req",">>Please enter email address");
 frmvalidator.addValidation("cons_email","email",">>Please enter valid email");

 
 
 
 
  </SCRIPT>