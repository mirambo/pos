<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script src="jquery.min.js"></script>
<script type="text/javascript"> 
$(document).ready(function () {
            $('#incharge').change(function () {			
			
                if (this.value == "1") {
                    $('#country').show();
                } else {
                    $('#country').hide();
                }				
				
				if (this.value == "2") {
                    $('#area').show();
                } else {
                    $('#area').hide();
                }
				
				if (this.value == "3") {
                    $('#Transfer').show();
                } else {
                    $('#Transfer').hide();
                }
				
				if (this.value == "4") {
                    $('#mpesa').show();
                } else {
                    $('#mpesa').hide();
                }

            });
        });


</script>

<script type='text/javascript'>
if (typeof window.onload == 'function') {motorCheckbox_OL = window.onload;}
window.onload = function()
{
  if (window.motorCheckbox_OL) motorCheckbox_OL();
  var i, ca;
  ca = document.getElementsByName('motorCheckbox');
  for (i = 0; i < ca.length; ++i) {
    ca[i].onclick = motorCheckbox_click;
  }
}
function motorCheckbox_click()
{
  // find parent TR
  var td = this.parentNode;
  while (td && td.nodeName.toLowerCase() != 'td') {
    td = td.parentNode;
  }
  if (td) {
    // get all inputs contained by td
    var i, ia = td.getElementsByTagName('input');
    for (i = 0; i < ia.length; ++i) {
      if (ia[i].type.toLowerCase() == 'text') { // filter out 'text' inputs
        ia[i].disabled = !this.checked;
      }
    }
  }
}
</script>


<form name="new_supplier" action="processadduser.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['adduserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >User Created Successfully!!</font></strong></p></div>';
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
    <td width="1%">Enter Full Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="f_name"></td>
     <td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Enter Phone Number<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="phone"></td>
    <td width="40%" valign="top"></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Enter Email Address<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="email"></td>
    <td width="40%" valign="top"></td>
  </tr>
	
	
	
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">User Group<font color="#FF0000">*</font></td>
    <td width="23%">
	
	<select name="user_group_id"><option>Select..........................................................</option>
								  <?php
								  
								  $query1="select * from user_group";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_group_id; ?>"><?php echo $rows1->user_group_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
	
	</td>
   
  </tr>
  
   <!--<tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="1%" valign="top">Select Level Incharge<font color="#FF0000"></font></td>
    <td width="23%">
	<select name="incharge" id="incharge">
	<option value="0">Select..........................................................</option>
								  
										  
<option value="1">Head Quarter Level</option>
<option value="2">Shop Level</option>
</select>
	</td>
    <td width="40%" valign="top"></td>
  </tr> -->
  
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Sales Rep Code : <font color="#FF0000">*</font></td>
    <td width="23%" colspan="4" valign="top">
<input type="text" name="sales_rep_code" id="sales_rep_code" disabled="true" size="15"> 

<input type="checkbox"  name="motorCheckbox" value="<%=motor.getId()%>"><font size="-2" color="#ff0000">Tick if required.</font>							  
</td>
   
  </tr>
  
  
 
 
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Username<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="username"></td>
    <td width="40%" valign="top"></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Password<font color="#FF0000">*</font></td>
    <td width="23%"><input type="password" size="41" name="password"></td>
    <td width="40%" valign="top"></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Confirm Password<font color="#FF0000">*</font></td>
    <td width="23%"><input type="password" size="41" name="cpassword"></td>
    <td width="40%" valign="top"></td>
  </tr>
   <tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="1%" valign="top">Allow Add<font color="#FF0000"></font></td>
    <td width="23%"><input type="radio" name="allow_add" value="1">Yes<input type="radio" name="allow_add" value="0">No</td>
    <td width="40%" valign="top"></td>
  </tr>
   <tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="1%" valign="top">Allow View<font color="#FF0000"></font></td>
    <td width="23%"><input type="radio" name="allow_view" value="1">Yes<input type="radio" name="allow_view" value="0">No</td>
    <td width="40%" valign="top"></td>
  </tr>
  <tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="1%" valign="top">Allow Edit<font color="#FF0000"></font></td>
    <td width="23%"><input type="radio" name="allow_edit" value="1">Yes<input type="radio" name="allow_edit" value="0">No</td>
    <td width="40%" valign="top"></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="13%" valign="top">Allow Delete<font color="#FF0000"></font></td>
    <td width="23%"><input type="radio" name="allow_delete" value="1">Yes<input type="radio" name="allow_delete" value="0">No</td>
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

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("f_name","req",">>Please enter full name");
 frmvalidator.addValidation("email","mail",">>Please enter valid email");
 frmvalidator.addValidation("user_group_id","dontselect=0",">>Please select user group");  
 frmvalidator.addValidation("password","req",">>Please enter password");
 frmvalidator.addValidation("cpassword","req",">>Please confirm the password");
 frmvalidator.addValidation("allow_add","selone_radio",">>Please grant priviledge for adding");
 frmvalidator.addValidation("allow_view","selone_radio",">>Please grant priviledge for viewing");
 frmvalidator.addValidation("allow_edit","selone_radio",">>Please grant priviledge for editing");
 frmvalidator.addValidation("allow_delete","selone_radio",">>Please grant priviledge for deleting");
 
 
 
  </SCRIPT>