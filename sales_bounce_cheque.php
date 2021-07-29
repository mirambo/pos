<?php 
$shares_id=$_GET['shares_id'];	
$receipt_no=$_GET['receipt_no'];
$sales_receipt_id=$_GET['sales_receipt_id'];
$amount_bounced=$_GET['amount_bounced'];
$currency=$_GET['currency'];
$curr_rate=$_GET['curr_rate'];
$client_id=$_GET['client_id'];
$cheque_no=$_GET['cheque_no'];

?>
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

<?php require_once('includes/invoicessubmenu.php');  ?>
		
		<h3>:: Record Sales Payment Bounced Cheques</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="start_order" action="process_sales_bounce_cheque.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Bounced Cheque Recorded Successfully!!</font></strong></p></div>';
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
  

  <tr>
    <td>&nbsp;</td>
    <td valign="top" width="15%">Enter Bank Charges</td>
    <td><input type="text" size="41" name="bank_charges"></td>
    <td><div id='start_order_errorloc' class='error_strings'></div></td>
  </tr>

  
   <tr>
    <td>
	<input type="text" size="41" name="receipt_no" value="<?php echo  $receipt_no;?>">
	<input type="text" size="41" name="sales_receipt_id" value="<?php echo  $sales_receipt_id;?>">
	<input type="text" size="41" name="amount_bounced" value="<?php echo  $amount_bounced;?>">
	<input type="text" size="41" name="currency" value="<?php echo  $currency;?>">
	<input type="text" size="41" name="curr_rate" value="<?php echo  $curr_rate;?>">
	<input type="text" size="41" name="client_id" value="<?php echo  $client_id;?>">
	<input type="text" size="41" name="cheque_no" value="<?php echo  $cheque_no;?>">
	
	
	</td>
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
 var frmvalidator  = new Validator("start_order");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();


  frmvalidator.addValidation("bank_charges","req",">>Please enter bank charges");
 
 
 
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