<?php include('Connections/fundmaster.php'); 


$id=$_GET['client_id'];
?>

<SCRIPT language="javascript">
function reload(form)
{
var val=form.client_id.options[form.client_id.options.selectedIndex].value;
self.location='bepaid.php?client_id=' + val ;

}

</script>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);
.table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:1px solid black;
font-size:12px;


}


</style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/invoice_payment_submenu.php');  ?>
		
		<h3>:: Record Invoice Payments</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">



<form name="emp" id="emp" action="process_invoice_payment2.php" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="5" height="30"><?php

if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:23px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Module Diassociated successfuly from usergroup!!</div>';
?>

<?

if ($_GET['']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Current staff are on site. New Staff should report from'.$period_to.'</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Module already allocataded</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="30">
    <td bgcolor="" width="2%">&nbsp;</td>
    <td width="20%"  align="right">Select Client<font color="#FF0000">*</font></td><td width="10">
    <select name="client_id" id="client_id" onChange="reload(this.form)">
	<?php 
	
	$query1="select * from clients where client_id='$id'";
	$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
	$rowsinst1=mysql_fetch_object($results1);
	if ($id=='')
	{

	?>
	<option value="0">Select..................................................................</option>
	<?php
	}							  
    else 
	 
	 { ?>
	 <option value="<?php echo $rowsinst1->client_id; ?>"><?php echo $rowsinst1->c_name; ?></option>
	 <?php 
	 
	 }	
	 
	 ?>

								  <?php
								  
								  $query1="select * from clients order by c_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->client_id; ?>"><?php echo $rows1->c_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>
	<div id='emp_errorloc' class='error_strings' style="float:right; margin-right:200px;"></div>
</td>

	<td width="15%" rowspan="" align="left" valign="top"></td>

  </tr>
 <tr>
    
    <td colspan="3" valign="top" align="center">

	<table align="center" width="80%" border="1" class="table1" >
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td></td>
	<td colspan="5"><strong>Invoice Payment Details</strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td></td>
	<td><strong>Invoice Number</strong></td>  
	<td><strong>Invoice Amount(Kshs)</strong></td>  
	<td><strong>Amount Paid(Kshs)</strong></td>  
	<td><strong>Balance (Kshs)</strong></td>  
	<td><strong>Enter Amount Paid</strong></td>  
  </tr>
	<?php
	
	
								  
$queryst="select invoices.invoice_id,invoices.user_id,invoices.invoice_no,invoices.client_id,invoices.currency_code,invoices.curr_rate,invoices.date_generated,invoices.invoice_ttl,invoices.inv_bal,invoices.sales_code,invoices.sales_rep,
currency.curr_name,clients.c_name from invoices,clients,currency where invoices.client_id=clients.client_id AND invoices.currency_code=currency.curr_id and invoices.status='1' and invoices.client_id='$id' "; 
$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());

								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	    <td align="center"><input type="checkbox" name="invoice_id[]" value="<?php echo $rowsst->invoice_id;?>"></td>
						
	   <td><?php echo $invoice_no=$rowsst->invoice_no; 
	   if ($invoice_no=='')
	{
	echo "<font size='-2'>Opening Balance</font>";
	}
	   
	   ?></td>
	   <td align="right"><strong><?php echo number_format($invoice_ttl=$rowsst->invoice_ttl,2); ?></strong></td>
	   <td align="right"><strong><font color="#009900"><?php 
	   $sales_code_id=$rowsst->sales_code; 
	   $sales_rep=$rowsst->sales_rep;
	   if ($sales_code_id=='0')
	  {
	  /*$sqlrec="select SUM(client_opening_bal_payment.amount_received) as ttl_amnt_rec from 
	  client_opening_bal_payment where client_opening_bal_payment.client_id='$client_id'";*/
	  
	  $sqlrec="select SUM(invoice_payments.amount_received) as ttl_amnt_rec,invoice_payments.curr_rate from 
	  invoice_payments where invoice_payments.client_id='$id' and invoice_payments.sales_code='0'";
	  }
	  else
	  {
	  $sqlrec="select SUM(invoice_payments.amount_received) as ttl_amnt_rec,invoice_payments.curr_rate from 
	  invoice_payments where invoice_payments.sales_code='$sales_code_id' AND invoice_payments.client_id='$id'";
	  }
	  
      $resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());
	  
	  $rowsrec=mysql_fetch_object($resultsrec);
	  
	  $ttlrec=$rowsrec->ttl_amnt_rec;
	 $invpay_xrate=$rowsrec->curr_rate;
	  
	  //echo $curr_rate.'-';
	 $ttl_rec_kshs=$ttlrec*$invpay_xrate;
	  
	echo number_format($ttl_rec_kshs,2);
	   
	   ?></font></strong></td>
	   <td align="right"><strong><font color="#ff0000"><?php 
	   //echo $rowsst->invoice_no; 
	   $bal_kshs=$invoice_ttl-$ttl_rec_kshs;
	
	//echo $bal=$rows->inv_bal;
	
	//$bal_kshs=$curr_rate*$bal;
	
	echo number_format($bal_kshs,2);
	   
	   ?></font></td>
	   <td>
	   
	   <input type="text" size="30" name="amnt_paid[]" value="<?php echo $get_amnt_paid; ?>" >
	   <input type="hidden" size="30" name="sales_code[]" value="<?php echo $sales_code_id; ?>" >
	   <input type="hidden" size="30" name="sales_rep[]" value="<?php echo $sales_rep;?>" >
	   
	   
	   </td>
	
	   
   
    

  </tr>
									 
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! No Record found</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
    <td></td>
   
    <td align="center" colspan="5"><input type="submit" name="submit" value="Diassociate">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
  
	
  </tr>
	
	
	</table>

	
 
	<td></td>
  </tr>
  
  
	
	
</table>

</form>




<?php
/*
if($original_bunch_id!='')
{?>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("period_from","req",">>Please enter period from");
 frmvalidator.addValidation("period_to","req",">>Please enter period to");
</script>
<?php

}
else
{ 

*/?>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 //frmvalidator.addValidation("module_id","dontselect=0",">>Please select module");
 
</script>


			
			
			
					
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