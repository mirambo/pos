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

		<?php require_once('includes/financials_submenu.php');  ?>
		
		<h3>:: Company's Statement of Owners Equity</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="start_invoice" action="equity2.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Shareholder Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exists</font></strong></p></div>';
?></td>
    </tr>
	<?php 
	//$shareholderid=mysql_real_escape_string($_POST['shareholderid']);

	


//$shareholder=$rowscap->share_holder_name;
?>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="24%">Initial Capital<font color="#FF0000"></font></td>
    <td width="23%" align="right"><?php 
$ttlcapt=0;
$sqlcapt="SELECT shares_amount FROM shares";
$resultscapt= mysql_query($sqlcapt) or die ("Error $sqlcapt.".mysql_error());

if (mysql_num_rows($resultscapt) > 0)
{

 while ($rowscapt=mysql_fetch_object($resultscapt))
							  {
							  
							  $capt=$rowscapt->shares_amount;
							  $ttlcapt=$ttlcapt+ $capt; 
							  }
							  
						echo number_format($ttlcapt,2);
						


}
//$rowsdiv=mysql_fetch_object($resultsdiv);
//echo $dividendcap=$rowsdiv->dividend_amount;

//echo number_format($ttshares=$rowscap->shares_amount,2);


	?>
	</td>
    <td width="19%"></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="24%">Retained Earnings<font color="#FF0000"></font></td>
    <td width="23%" align="right"><?php 
$ttlretearn=0;
$sqlretearn="SELECT dividend FROM ploughed_back_dividend";
$resultsretearn= mysql_query($sqlretearn) or die ("Error $sqlretearn.".mysql_error());

if (mysql_num_rows($resultsretearn) > 0)
{

 while ($rowsretearn=mysql_fetch_object($resultsretearn))
							  {
							  
							  $retearn=$rowsretearn->dividend;
							  $ttlretearn=$ttlretearn+ $retearn; 
							  }
							  
						echo number_format($ttlretearn,2);
						


}
	
	?>
	</td>
    <td width="19%"></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="24%">Additional Investments<font color="#FF0000"></font></td>
    <td width="23%" align="right"><?php echo number_format($ttl_inv,2) ?>
	</td>
    <td width="19%"></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="24%">Total Capital <font color="#FF0000"></font></td>
    <td width="23%" align="right"><strong><?php echo number_format($all_cap=$ttlcapt+$ttl_inv+$ttlretearn,2) ?></strong>
	</td>
    <td width="19%"></td>
  </tr>
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><?php echo $shareholder; ?>Less Dividends<font color="#FF0000"></font></td>
    <td width="23%" align="right"><?php 
$ttldiv=0;
$sqldiv="SELECT dividend_amount FROM dividends";
$resultsdiv= mysql_query($sqldiv) or die ("Error $sqldiv.".mysql_error());

if (mysql_num_rows($resultsdiv) > 0)
{

 while ($rowsdiv=mysql_fetch_object($resultsdiv))
							  {
							  
							  $div=$rowsdiv->dividend_amount;
							  $ttldiv=$ttldiv+ $div; 
							  }
							  
						echo number_format($ttldiv,2);
						


}
//$rowsdiv=mysql_fetch_object($resultsdiv);
//echo $dividendcap=$rowsdiv->dividend_amount;
	
	
	?>
	</td>
    <td width="40%" rowspan="6" valign="top"><div id='start_invoice_errorloc' class='error_strings'></div></td>
 
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Less <?php echo $shareholder; ?> Withdrawals<font color="#FF0000"></font></td>
    <td width="23%" align="right"><?php 
	$ttlwith=0;
$sqlwith="SELECT dividend FROM withdrawn_dividends";
$resultswith= mysql_query($sqlwith) or die ("Error $sqlwith.".mysql_error());

if (mysql_num_rows($resultswith) > 0)
{

 while ($rowswith=mysql_fetch_object($resultswith))
							  {
							  
							  $with=$rowswith->dividend;
							  $ttlwith=$ttlwith+ $with; 
							  }
							  
						echo number_format($ttlwith,2);
						


}
	?>
	
	
</td>
    <td width="40%" rowspan="6" valign="top"><div id='start_invoice_errorloc' class='error_strings'></div></td>
  </tr>
  
  
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Net Capital</strong><font color="#FF0000"></font></td>
    <td width="23%" align="right"><strong><font size="+1">
	<?php 
	echo number_format($capbal=$all_cap-$ttlwith-$ttldiv,2);
	
	?>
	</strong>
	</td>
    <td width="40%" rowspan="6" valign="top"><div id='start_invoice_errorloc' class='error_strings'></div></td>
  </tr>
  
	
	
  <tr height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><!--<input type="submit" name="submit" value="Next>>">&nbsp;&nbsp;--></td>
    <td></td>
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
 var frmvalidator  = new Validator("start_invoice");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("client","dontselect=0","Please select client");
 frmvalidator.addValidation("sales_rep","dontselect=0","Please select sales representative");
 /*frmvalidator.addValidation("pay_term","dontselect=0","Please select term of payment");*/
 frmvalidator.addValidation("currency","dontselect=0","Please select currency");
 
 
 
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