<?php include('Connections/fundmaster.php'); 

$lpo_no=$_GET['lpo_no'];
$supplier_id=$_GET['supplier_id'];
$order_code=$_GET['order_code'];
$qnty_ordered=$_GET['qnty_ordered']; //Amoutn Received so far dispalyed incase of arbnormal amount
$currency=$_GET['currency'];
$amnt=$_GET['amnt'];
$amnt_paid_sofar=$_GET['amnt_paid_sofar'];

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

$sqlsp="select 	* from stock_payments where order_code='$order_code' order by date_paid desc limit 1";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultssp);
echo $recent_amnt_paid=$rowssp->amnt_paid;
echo $recent_curr_rate=$rowssp->exchange_rate;
echo $stock_payments_id=$rowssp->stock_payments_id;


//after redudancy


?>

<html xmlns="http://www.w3.org/1999/xhtml">

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

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/stocksubmenu.php');  ?>
		
		<h3>:: Recording Payments for Stock Ordered</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="rec_inv_pay" action="processedit_stock_payment.php?stock_payments_id=<?php echo $stock_payments_id;?>&original_amnt_paid=<?php $amnt; ?>&order_code=<?php echo $order_code; ?>&recent_amount_paid=<?php echo $recent_amnt_paid;  ?>" method="post">	
<?php 
$sql="select * from suppliers where supplier_id='$supplier_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);


?>
		
<table width="100%" border="0">
  <tr bgcolor="#ffff99">
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Recorded successfully!!</font></strong></p></div>';


if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Amount Paid to supplier cant be higher than the cost of stock</font></strong></p></div>';

?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	<tr height="30" bgcolor="#C0D7E5">
    <td >&nbsp;</td>
    <td width="19%"><strong>LPO Number : </strong></td>
    <td width="23%"><?php echo $lpo_no; ?></td>
    <td width="40%" rowspan="10" valign="center">
		
	<div id='rec_inv_pay_errorloc' class='error_strings'></div>
	
	
	</td>
  </tr>
	
  
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Supplier Name : </strong></td>
    <td width="23%"><?php echo $rows->supplier_name;?><input type="hidden" size="41" name="supplier_id" value="<?php  echo $supplier_id; ?>">
	                                                  <input type="hidden" size="41" name="order_code" value="<?php   echo $order_code; ?>">
													  <input type="hidden" size="41" name="lpo_no" value="<?php   echo $lpo_no; ?>">
													   <input type="hidden" size="41" name="currency" value="<?php   echo $currency; ?>">
													   <input type="hidden" size="41" name="curr_rate" value="<?php   echo $curr_rate; ?>">
													   <input type="hidden" size="41" name="cost_of_stock" value="<?php echo $amnt; ?>">
													   <input type="hidden" size="41" name="amnt_paid_sofar" value="<?php echo $amnt_paid_sofar; ?>">
	
	</td>
    </tr>
  
  <!--<tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" ><strong>Cost of Stock Ordered : </strong></td>
    <td width="23%" align="right"><strong><?php echo $curr_name.' '.number_format($amnt,2);?></strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Amount Paid : </strong></td>
    <td width="23%" align="right"><strong><?php 
	
	
	
	echo $curr_name.' '.number_format($amnt_paid_sofar,2);
	
	

	?></strong>
	
	
	</td>
    
  </tr>
  
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Balance To Be Cleared : </strong></td>
    <td width="23%" align="right"><strong>
	<?php 
	
	$bal=$amnt-$amnt_paid_sofar;
	
	echo $curr_name.' '.number_format($bal,2);
	
	
	
	?>
	 <input type="hidden" size="41" name="balance" value="<?php echo $bal; ?>">
	</strong></td>
    
  </tr>-->
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Amount Recently Entered(<?php echo $curr_name; ?>)<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="amnt_paid_to_supplier" value="
	<?php

echo $rowssp->amnt_paid;
	?>
	
	"></td>
    </tr>
	
	
	<!--<tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Recent Exchange Rate From<strong>(<?php echo $curr_name; ?>)</strong> To <strong>(Kshs.)</strong><font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="curr_rate_now" value="<?php echo $recent_curr_rate; ?>"></td>
    </tr>
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Exchange Rate (<?php echo $curr_name; ?> To Kshs.)<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="exchange_rate"></td>
    </tr>
  <tr height="30" bgcolor="#C0D7E5">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Mode Of Payment<font color="#FF0000">*</font></td>
    <td width="23%"><select name="mop">
	
	<option>-------------------------Select--------------------</option>
	<option value="Cash">Cash</option>
	<option value="Cheque">Cheque</option>
	<option value="Electronic Transfer">Electronic Transfer</option>
	
	
	
	</select>
	
	
	</td>
   
  </tr>-->
  
   <!--<tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Expiry Date <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="exp_date" size="30" id="exp_date" readonly="readonly" /></td>
    </tr>
<tr height="30">
    <td>&nbsp;</td>
    <td>Batch Number</td>
    <td><textarea rows="5" cols="30" name="mach_cat_desc"></textarea></td>
    </tr>-->
  
  <tr bgcolor="#C0D7E5" height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
 
  </tr>
  <tr bgcolor="#ffff99" height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  
  </tr>
  
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("rec_inv_pay");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("amnt_paid_to_supplier","req",">>Please enter the amount paid to supplier");
 frmvalidator.addValidation("freight_charges","req",">>Please enter the freight charges");
 frmvalidator.addValidation("mop","dontselect=0",">>Please select mode of payment");
 
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