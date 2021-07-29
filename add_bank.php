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
		
		
		
		<?php require_once('includes/banks_submenu.php');  ?>
		
		<h3>:: Adding New Bank</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_machine_category" action="processaddbank.php" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Bank Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Bank Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="bank_name"></td>
    <td width="40%" rowspan="4" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  </tr>
 
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Branch Name<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="branch_name"></td>
    <td width="40%"  valign="top"></td>
  </tr>
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Account Name<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="account_name"></td>
    <td width="40%"  valign="top"></td>
  </tr>
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Account Number<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="41" name="account_no"></td>
    <td width="40%"  valign="top"></td>
  </tr>
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
 var frmvalidator  = new Validator("new_machine_category");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("bank_name","req",">>Please enter bank name");
 /* frmvalidator.addValidation("branch_name","req",">>Please enter branch name");
 frmvalidator.addValidation("account_name","req",">>Please enter account name");
 frmvalidator.addValidation("account_no","req",">>Please enter account number"); */
 
 
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