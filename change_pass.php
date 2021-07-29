
<?php include('Connections/fundmaster.php'); ?>

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

		<?php require_once('includes/profile_submenu.php');  ?>
		
		<h3>:: Change and Update My Password </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="change_pass" action="process_change_pass.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="23%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['adduserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >User Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['mismatchpass']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Current Password does not exist!!</font></strong></p></div>';
?>

<?php

if ($_GET['mismatchconfirmpass']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Password do not match</font></strong></p></div>';



?>

<?php

if ($_GET['disallow_current_pass']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! password already in use</font></strong></p></div>';



?>

<?php

if ($_GET['passupdatedconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Password Updated Successfully</font></strong></p></div>';



?>



</td>
    </tr>
 
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="19%">Enter Current Password <font color="#FF0000">*</font></td>
    <td width="57%"><input type="password" size="41" name="cur_password"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="19%">Enter New Password <font color="#FF0000">*</font></td>
    <td width="57%"><input type="password" size="41" name="password"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Confirm New Password <font color="#FF0000">*</font></td>
    <td><input type="password" size="41" name="con_password"></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update Password">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td width="1%">&nbsp;</td>
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
 var frmvalidator  = new Validator("change_pass");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("f_name","req","Please enter first name");
 frmvalidator.addValidation("l_name","req","Please enter Lastname");
 frmvalidator.addValidation("user_group","dontselect=0","Please assign User Group");
 frmvalidator.addValidation("email","req","Please enter  email address");
 frmvalidator.addValidation("email","email","Please enter valid email address");
 frmvalidator.addValidation("username","req","Please enter username");
 frmvalidator.addValidation("password","req","Please enter your password");
 frmvalidator.addValidation("cpassword","req","Please confirm your password");
 
 
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