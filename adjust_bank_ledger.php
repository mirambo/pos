<?php include('Connections/fundmaster.php'); 
$id=$_GET['currency'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<SCRIPT language="javascript">
function reload(form)
{
var val=form.currency.options[form.currency.options.selectedIndex].value;
self.location='add_cash_opening_balance.php?currency=' + val ;

}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/bankledgersubmenu.php');  ?>
		
		<h3>:: Adjust Bank Ledger Balance </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user" action="processadjustbankledger.php" method="post">			
<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Opening Balance Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the opening balance already exist!!</font></strong></p></div>';
?></td>
    </tr>
 
    </tr>  
	<tr height="20" >
    <td>&nbsp;</td>
    <td width="15%">Enter Amount <font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount"></td>
	
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Debit / Credit Account<font color="#FF0000">*</font></td>
    <td><select name="account">				  
										  
                                    
	<option value="0">-------------------Select-----------------------</option>
	<option value="2">Debit Account</option>
	<option value="1">Credit Account</option>
								  
									
                               </select></td>
							    <td width="40%" rowspan="6" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Reason for adjustment<font color="#FF0000">*</font></td>
    <td><textarea name="desc" rows="3" cols="36"></textarea></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
   
  </tr>
  
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_user");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("amount","req",">>Please enter the amount");

 
 
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