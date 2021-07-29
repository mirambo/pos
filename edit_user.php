<?php $get_user_id=$_GET['get_user_id'];?>



<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
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

<form name="new_supplier" action="processedituser.php?get_user_id=<?php echo $get_user_id; ?>" method="post">
<?php 


//echo $user_id;
$sql="SELECT * FROM users,user_group where users.user_group_id=user_group.user_group_id AND users.user_id='$get_user_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);



?>
			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['edituserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >User Updated Successfully!!</font></strong></p></div>';
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
    <td width="23%"><input type="text" size="41" name="f_name" value="<?php echo $rows->f_name;?>"></td>
     <td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Enter Phone Number<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="phone" value="<?php echo $rows->phone;?>"></td>
    <td width="40%" valign="top"></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Enter Email Address<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="email" value="<?php echo $rows->email;?>"></td>
    <td width="40%" valign="top"></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">User Group Name<font color="#FF0000">*</font></td>
    <td width="23%">
	
	<select name="user_group_id">


	<option value="<?php echo $rows->user_group_id;?>"><?php echo $rows->user_group_name;  ?></option>
								  <?php
								  
								  $query1="select * from user_group order by user_group_name asc";
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
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
 
  
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="1%">Sales Rep Code : <font color="#FF0000">*</font></td>
    <td width="23%" colspan="4" valign="top">
	

<input type="text" name="sales_rep_code" id="sales_rep_code" value="<?php echo $rows->user_code; ?>"  size="15"> 

							  

	
	</td>
   
  </tr>
  
  
 
  
   
  
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Username<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="username" value="<?php echo $rows->username;?>"></td>
    <td width="40%" valign="top"></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="1%" valign="top">Allow Add<font color="#FF0000"></font></td>
    <td width="23%">
	<?php
$allow_add=$rows->allow_add;
if ($allow_add==1)
{
?>
<input type="radio" name="allow_add" value="1" checked>Yes<input type="radio" name="allow_add" value="0">No
<?php 
}
else 
{
?>
<input type="radio" name="allow_add" value="1">Yes<input type="radio" name="allow_add" value="0" checked>No
<?php 
}?>


	
	
	</td>
    <td width="40%" valign="top"></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="1%" valign="top">Allow View<font color="#FF0000"></font></td>
    <td width="23%">
	<?php
$allow_view=$rows->allow_view;
if ($allow_view==1)
{
?>
<input type="radio" name="allow_view" value="1" checked>Yes<input type="radio" name="allow_view" value="0">No
<?php 
}
else 
{
?>
<input type="radio" name="allow_view" value="1">Yes<input type="radio" name="allow_view" value="0" checked>No
<?php 
}?>


	
	
	</td>
    <td width="40%" valign="top"></td>
  </tr>
  <tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="1%" valign="top">Allow Edit<font color="#FF0000"></font></td>
    <td width="23%">
	
	<?php
	$allow_edit=$rows->allow_edit;
if ($allow_edit==1)
{
?>
<input type="radio" name="allow_edit" value="1" checked>Yes<input type="radio" name="allow_edit" value="0">No
<?php 
}?>
<?php
	
if ($allow_edit==0)
{
?>
<input type="radio" name="allow_edit" value="1" >Yes<input type="radio" name="allow_edit" value="0" checked>No
<?php 
}?>
	
	
	
	</td>
    <td width="40%" valign="top"></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="13%" valign="top">Allow Delete<font color="#FF0000"></font></td>
    <td width="23%">
	<?php
	$allow_delete=$rows->allow_delete;
if ($allow_delete==1)
{
?>
<input type="radio" name="allow_delete" value="1" checked>Yes<input type="radio" name="allow_delete" value="0">No
<?php 
}?>
<?php
	
if ($allow_delete==0)
{
?>
<input type="radio" name="allow_delete" value="1" >Yes<input type="radio" name="allow_delete" value="0" checked>No
<?php 
}?></td>
    <td width="40%" valign="top"></td>
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

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

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
				
				
            });
        });


</script>

<!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("user_group_id","dontselect=0",">>Please select user group");  
 frmvalidator.addValidation("institution","dontselect=0",">>Please select institution");
 frmvalidator.addValidation("f_name","req",">>Please enter first name");
 frmvalidator.addValidation("l_name","req",">>Please enter last name");
 frmvalidator.addValidation("phone","req",">>Please enter phone number");
 frmvalidator.addValidation("email","req",">>Please enter email address");
 frmvalidator.addValidation("email","email",">>Please enter valid email");
 frmvalidator.addValidation("password","req",">>Please enter password");
 frmvalidator.addValidation("password","password=cpassword",">>Password do not match");
 
 
 
  </SCRIPT>-->