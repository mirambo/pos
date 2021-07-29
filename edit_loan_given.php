<?php
include('Connections/fundmaster.php');  
$loan_given_id=$_GET['loan_given_id'];	

$sql="SELECT * FROM loan_given WHERE loan_given_id='$loan_given_id'";
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

		<?php require_once('includes/loangivensubmenu.php');  ?>
		
		<h3>:: Update Loan Given</h3>				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_supplier" action="processeditloangiven.php?loan_given_id=<?php echo $loan_given_id; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Loan Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the customer is existing</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Lendee's Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="l_name" value="<?php echo $rows->lenders_name;?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Lendee's Postal Address</td>
    <td><input type="text" size="41" name="l_address" value="<?php echo $rows->lenders_address;?>"></td>
    </tr>
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Lendee's Phone Number<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="l_phone" value="<?php echo $rows->lenders_phone;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Lendee's Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="l_email" value="<?php echo $rows->lenders_email;?>"></td>
    </tr>

	<tr height="20">
    <td>&nbsp;</td>
    <td>Lendee's Town</td>
    <td><input type="text" size="41" name="l_town" value="<?php echo $rows->lenders_town;?>"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Loan Amount <font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="l_amount" value="<?php echo $rows->loan_amount;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Currency <font color="#FF0000">*</font></td>
    <td><input type="text" size="41"  value="<?php
$currency=$rows->currency_code;
$sqlcurr="SELECT * FROM currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
$rowscurr=mysql_fetch_object($resultscurr);
echo $rowscurr->curr_name;	
	?>" readonly="readonly"></td>
    </tr>
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Currency<font color="#FF0000">*</font></td>
    <td><select name="currency">
	                  <option>------------------Select--------------------</option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM currency order by curr_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->curr_id;?>"><?php echo $rowscurr->curr_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
    </tr>-->
	<tr height="20">
    <td>&nbsp;</td>
    <td>Repayment Period<font color="#FF0000">*</font></td>
    <td>Years<select name="period_years">
	
	
	<option value="<?php echo $rows->period_years;?>"><?php echo $rows->period_years;?></option>
	
	<option value="N/A">0</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	
	
	
	</select>Months
	
	<select name="period_months">
	<option value="<?php echo $rows->period_months;?>"><?php echo $rows->period_months;?></option>
	<option value="N/A">0</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>

	</select></td>
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
 frmvalidator.addValidation("l_name","req",">>Please enter lenders name");
 frmvalidator.addValidation("l_phone","req",">>Please enter phone number");
 frmvalidator.addValidation("l_email","req",">>Please enter email address");
 frmvalidator.addValidation("l_email","email",">>Please enter valid email address");
 frmvalidator.addValidation("l_amount","req",">>Please enter loan amount");
 frmvalidator.addValidation("currency","dontselect=0",">>Select the currency");
 frmvalidator.addValidation("period_years","dontselect=0",">>Select the years");
 frmvalidator.addValidation("period_months","dontselect=0",">>Select the months");

 
 
 
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