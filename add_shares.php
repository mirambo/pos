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


<form name="new_supplier" action="processaddshares.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Share Holder Created Successfully!!</font></strong></p></div>';
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
    <td width="19%">Share Holders Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="share_holder"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>	

  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Contact Person</td>
    <td width="23%"><input type="text" size="41" name="cont_person"></td>
    <td width="40%" valign="top"></td>
  </tr>
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Date Joined</td>
    <td width="23%"><input type="text" size="41" name="date_joined" id="date_joined" ></td>
    <td width="40%" valign="top"></td>
  </tr>
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Shares Amount (USD)<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="share_amount"></td>
    <td width="40%" valign="top"></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Remarks</td>
    <td width="23%"><textarea name="remarks" cols="36" rows="3"></textarea></td>
    <td width="40%" valign="top"></td>
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
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_joined",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_joined"       // ID of the button
    }
  );
  
  
  
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("shareholder","req",">>Please enter shareholders name");
 frmvalidator.addValidation("share_amount","req",">>Share capital amount");

 
 
 
  </SCRIPT>