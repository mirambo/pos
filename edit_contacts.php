<?php include('Connections/fundmaster.php'); 
$id=$_GET['contacts_id'];

$sql="SELECT * FROM company_contacts where contacts_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/companysettings_submenu.php');  ?>
		
		<h3>:: Set Up Company Contact Details </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user_group" action="processeditcontacts.php?contacts_id=<?php echo $id; ?>" method="post">			
			<table width="100%" border="0" align="center">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Company Details Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	<tr>
    <td width="18%">&nbsp;</td>
	<td colspan="2" height="20" bgcolor="#FF9933"><strong>Contact Details</strong></td>
	<td width="18%">&nbsp;</td>
    </tr>
  <tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Contact Person<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="cont_person" value="<?php echo $rows->cont_person;?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Mobile Number<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="phone"  value="<?php echo $rows->phone;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Telephone Number</td>
    <td><input type="text" size="41" name="telephone"  value="<?php echo $rows->telephone;?>"></td>
    </tr>
		<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="email"  value="<?php echo $rows->email;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Fax</td>
    <td><input type="text" size="41" name="fax"  value="<?php echo $rows->fax;?>"></td>
    </tr>
	
	<tr>
    <td width="18%">&nbsp;</td>
	<td colspan="2" height="20" bgcolor="#FF9933"><strong>Delivery Address</strong></td>
	<td width="18%">&nbsp;</td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Street<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="street"  value="<?php echo $rows->street;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Building<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="building"  value="<?php echo $rows->building;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Postal Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="address"  value="<?php echo $rows->address;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>City / Town<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="town"  value="<?php echo $rows->town;?>"></td>
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
 var frmvalidator  = new Validator("new_user_group");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("cont_person","req",">>Please enter contact person");
 frmvalidator.addValidation("phone","req",">>Please enter mobile phone number");
 frmvalidator.addValidation("email","req",">>Please enter company email address");
 frmvalidator.addValidation("email","email",">>Please enter valid email address");
 frmvalidator.addValidation("street","req",">>Please enter street name");
 frmvalidator.addValidation("building","req",">>Please enter building name");
 frmvalidator.addValidation("address","req",">>Please enter postal address");
 frmvalidator.addValidation("town","req",">>Please enter city or town");
 
 
 
  </SCRIPT>

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
				</div>
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
</body>

</html>