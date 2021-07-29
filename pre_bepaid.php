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
		
		<h3>:: Choose Which Client Payment To Record</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="start_invoice" action="process_gen_sales_code.php?sale_type=<?php echo 'i';?>" method="post">			
<table width="100%" border="0" bgcolor="#FFFFCC">
  
 <tr height="50">
    <td width="1%">&nbsp;</td>
    <td align="center"></td>
    <td align="center"></td>
    
  </tr>

 
  <tr>
    
    <td align="center"><a href="bepaid.php"><img src="images/perinvoice.png"></a></td>
	<td width="5%">&nbsp;</td>
    <td align="center"><a href="receive_client_payment.php"><img src="images/perclient.png"></td>
    
  </tr>
  <tr height="50">

    <td width="35%" align="center"><font color="#ff0000">To record invoice payments which has commision value attached to it</font></td>
	<td width="5%">&nbsp;</td>
    <td width="40%"  align="center"><font color="#ff0000">To record invoice payments which don't have commision value attached to it</font></td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
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

 frmvalidator.addValidation("client","dontselect=0",">>Please select client");
 frmvalidator.addValidation("sales_rep","dontselect=0",">>Please select sales representative");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
  /*frmvalidator.addValidation("pay_term","dontselect=0","Please select term of payment");*/

 
 
 
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