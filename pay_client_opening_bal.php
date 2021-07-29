<?php include('Connections/fundmaster.php'); 
$id=$_GET['client_id'];
$amount=$_GET['amount'];
//$balance=$_GET['balance'];

	$sqlsold="select SUM(amount_received) as ttl_sold_rec from client_opening_bal_payment where client_id='$id'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	$ttl_sold_rec=$rowsold->ttl_sold_rec;
$balance=$amount-$ttl_sold_rec;
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
		
		
		
		<?php require_once('includes/customersubmenu.php');  
		
	
		$sqlclient="select * from clients where client_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
	
		
		
		
		?>
		
		<h3>:: Receiving Opening Balance Payment for Customer <?php 	echo $rowsclient->c_name;?>
		  
		
		</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user_group" action="processpayopeningbal.php?client_id=<?php echo $id; ?>" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Asset Payment Created Successfully!!</font></strong></p></div>';

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <!--<tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Asset Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="asset_name"></td>
    <td width="40%" rowspan="4" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Enter Purchase Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="purchase_date" size="41" id="purchase_date" readonly="readonly" /></td>
    </tr>-->
	<tr height="20">
    <td>&nbsp;</td>
    <td width="200">Opening Balance Value<font color="#FF0000">*</font></td>
    <td><strong><?php echo number_format($amount,2);?></strong>
	<input type="hidden" size="41" name="currency" value="<?php echo $rows->currency;?>">
	<input type="hidden" size="41" name="xx" value="<?php echo $rows->value;?>">
	
	</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Amount Paid<font color="#FF0000">*</font></td>
    <td><strong><?php echo number_format($ttl_sold_rec,2);?></strong>
	<input type="hidden" size="41" name="curr_rate" value="<?php echo $rows->curr_rate;?>">
	<input type="hidden" size="41" name="amount_already_paid" value="<?php echo $amount_paid?>">
	
	</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Balance To be Paid<font color="#FF0000">*</font></td>
    <td><strong><?php echo number_format($balance,2);?></strong>
	<input type="hidden" size="41" name="balance" value="<?php echo $balance;?>">
	
	</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Amount Paid (Kshs)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount_paid"></td>
    </tr>
  
  <!--<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Value<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="value"></td>
    </tr>
  
  <tr>-->
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>

  </tr>
  
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_user_group");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("asset_name","req",">>Please enter asset name");
  frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("value","req",">>Please enter value for the asset");
 frmvalidator.addValidation("amount_paid","req",">>Please enter the amount paid");
 
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