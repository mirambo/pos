<?php
include('Connections/fundmaster.php'); 
$invoice_payment_id=$_GET['invoice_payment_id'];
$approve=$_GET['approve'];

$sql="select * FROM customer,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.customer_id=customer.customer_id  
AND  invoice_payments.currency_code=currency.curr_id  
 AND invoice_payments.invoice_payment_id='$invoice_payment_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);	

$bank_id=$rows->our_bank;
$sqlemp_det="select * from banks where bank_id='$bank_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
$bank_name=$rowsemp_det->bank_name;
$account_name=$rowsemp_det->account_name;

$shop_id=$rows->shop_id;

$sqlsrp="select * from account where account_id='$shop_id'";
$resultssrp= mysql_query($sqlsrp) or die ("Error $sqlsrp.".mysql_error());
$rowssrp=mysql_fetch_object($resultssrp);

$shop_name=$rowssrp->account_name;


 $sales_id=$rows->sales_id;

$sqlsrp="select * from sales where sales_id='$sales_id'";
$resultssrp= mysql_query($sqlsrp) or die ("Error $sqlsrp.".mysql_error());
$rowssrp=mysql_fetch_object($resultssrp);





?>



<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to save changes?");
}


</script>

<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="jquery-1.8.3.js"></script>-->

<script src="js/jquery-1.10.2.min.js"></script>	
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#customer_id").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_invoices.php?customer_id=' + $(this).val(), function(data) {
    $("#invoice_area").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	
	
	$("#invoice_area").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('client_inv_bal.php?invoice_id=' + $(this).val(), function(data) {
    $("#sub_cat2").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
    });
	
    </script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

<?php require_once('includes/invoice_payment_submenu.php');  ?>
		
		<h3>:: Update Payments Received From Client : <?php echo $rows->customer_name;?> Receipt No: <?php echo $rows->receipt_no;?></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="process_edit_invoice_payment.php?invoice_payment_id=<?php echo $invoice_payment_id;?>&approve=<?php echo $approve;?>" method="post">			
			<table width="100%" border="0">
  <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="9" align="center">

<?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Details Updated successfully!!</font></strong></p></div>';

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order Updated successfully!!</font></strong></p></div>';

?>

<?php

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order Deleted Successfully</font></strong></p></div>';
?>








</td>
 
	


  </tr>
   <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="9" >Payment Date:<input type="text" name="date_paid" value="<?php echo $rows->date_paid; ?>" size="40" id="date_paid" readonly="readonly" /></td>
	</tr>
  
  
  <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top">Select Client<font color="#FF0000"></font>
	
	<br/>
	<br/>
	Select Invoice<font color="#FF0000"></font>
	</td>
    <td width="15%" valign="top">

	<select name="customer_id" id="customer_id">
	<option value="<?php echo $rows->customer_id;?>"><?php echo $rows->customer_name; ?></option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM customer order by customer_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['customer_id']; ?>"><?php echo $row['customer_name']; ?></option>
    <?php endwhile; ?>
    </select>
	
	
	<br/>
	<br/>
	
	
	
	<select name="invoice_id" id="invoice_area">
<option value="<?php echo $sales_id;?>"><?php echo $rowssrp->invoice_no; ?></option>
	</select>
	
	</td>
	<td valign="top" width="15%">Amount Received<font color="#FF0000"></font>

	</td>
	<td valign="top" width="10%" align="left"><input type="text" name="amount" size="40" value="<?php echo $rows->amount_received; ?>">
		<strong>Invoice Balance (Kshs) : </strong><span id="sub_cat2"></span></span>
	</td>
    <td valign="top" width="10%">Select Currency<font color="#FF0000"></font></td>
    <td valign="top"><select name="currency">
	                  <option value="<?php echo $rows->currency_code;?>"><?php echo $rows->curr_name;?></option>
								  
										  
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
									
                               </select>
							  </br>
							   Exchange Rate : <input type="text" name="curr_rate" size="10" value="<?php echo $rows->curr_rate; ?>"> 
							   </td>
								  
								  
								<td valign="top" width="15%">  
								Mode Of Payment
								  
								  </td>
								  <td><select name="mop">
	                  <option value="<?php echo $mop=$rows->mop;?>"><?php echo $rows->mop_name;?></option>
								  
										  
                                    <?php 
$sqlmop="SELECT * FROM mop order by mop_name asc";
$resultsmop= mysql_query($sqlmop) or die ("Error $sqlmop.".mysql_error()); 
if (mysql_num_rows($resultsmop) > 0)
{
						while ($rowsmop=mysql_fetch_object($resultsmop))
							{						
								?>  
										  
                                    <option value="<?php echo $rowsmop->mop_id;?>"><?php echo $rowsmop->mop_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>
							   
							   </td>
								  
								  
  </tr>
 
  <tr><td colspan="8" height="20" bgcolor="#FFFFCC" align="center"><strong>Cheque Payment Details(If paid via cheque )</strong></td></tr>
	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Enter Cheque No:<font color="#FF0000"></font></td>
    <td valign="top"><input type="text" name="cheque_no" size="20" value="<?php 
	if ($mop==2)
	{
	echo $rows->ref_no;
	}
	else
	{
	
	}
	?>"/></td>
							   <td valign="top">Issuer Bank<font color="#FF0000"></font></td>
							   <td valign="top"><input type="text" name="cheq_drawer" size="40" value="<?php 
	if ($mop==2)
	{
	echo $rows->client_bank;
	}
	else
	{
	
	}
	?>"/></td>
							   <td valign="top">Date Drawn</td>
							    <td><input type="text" name="date_drawn" size="40" id="date_drawn" value="<?php 
	if ($mop==2)
	{
	echo $rows->date_paid;
	}
	else
	{
	
	}
	?>"readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								<td>Payment Description</td>
								 <td rowspan="4" valign="top"><textarea name="desc" rows="4" cols="23"><?php echo $rows->decription; ?></textarea></td>
							   
    </tr>
<tr><td colspan="8" height="20" bgcolor="#FFFFCC" align="center"><strong>Cash Payment Details(If paid via Cash Or Mpesa )</strong></td></tr>
	
	<tr height="20" bgcolor="#FFFFCC">

    <td>Enter Ref. No:<font color="#FF0000"></font></td>
    <td valign="top" colspan="6"><input type="text" name="ref_no" size="20" value="<?php 
	if ($mop==1 || $mop==4)
	{
	echo $rows->ref_no;
	}
	else
	{
	
	}
	?>"/>
	
	
	
	Deposited By : 
	<input type="text" name="dep_by" size="20" value="<?php echo $rows->dep_by; ?>">
	</td>
							   
							   <!--<td >Date Paid</td>
<td><input type="text" name="date_paid" size="40" id="date_paid" readonly="readonly" value="<?php 
	if ($mop==1 || $mop==4)
	{
	echo $rows->date_paid;
	}
	else
	{
	
	}
	?>"/><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								 <td valign="top"><font color="#FF0000"></font></td>
							   <td valign="top"></td> <td></td>
								  <td></td>-->
							   
    </tr>	  
<tr><td colspan="8" height="20" bgcolor="#FFFFCC" align="center"><strong>Bank Transfer Payment Details(If paid via bank transfer )</strong></td></tr>
	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Transaction Code:<font color="#FF0000"></font></td>
    <td valign="top"><input type="text" name="transaction_code" size="20" value="<?php 
	if ($mop==3)
	{
	echo $rows->ref_no;
	}
	else
	{
	
	}
	?>"/></td>
							   <td valign="top">Client Bank<font color="#FF0000"></font></td>
							   <td valign="top"><input type="text" name="client_bank" size="40" value="<?php 
	if ($mop==3)
	{
	echo $rows->client_bank;
	}
	else
	{
	
	}
	?>"/></td>
							   <td valign="top">Date Transfered</td>
							    <td><input type="text" name="date_trans" size="40" id="date_trans" readonly="readonly" value="<?php 
	if ($mop==3)
	{
	echo $rows->date_paid;
	}
	else
	{
	
	}
	?>"/><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
								  <td colspan="2">Our Bank<select name="our_bank">
								  <?php 
							if ($mop==3)
	{	  
							?>	  
								  
	                  <option value="<?php echo $bank_id;?>"><?php echo $bank_name.'('.$account_name.')'; ?></option>
					  <?php
}
else
{
?>
<option>-------------------------Select--------------------</option>
<?php
}
					  ?>
					
								  
										  
                                    <?php 
$sqlbnk="SELECT * FROM banks order by bank_name asc";
$resultsbnk= mysql_query($sqlbnk) or die ("Error $sqlbnk.".mysql_error()); 
if (mysql_num_rows($resultsbnk) > 0)
{
						while ($rowsbnk=mysql_fetch_object($resultsbnk))
							{						
								?>  
										  
                                    <option value="<?php echo $rowsbnk->bank_id;?>"><?php echo $rowsbnk->bank_name.' ('.$rowsbnk->account_name.')';?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
							   
    </tr>	 
 
  
   

  <tr height="15" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Save Transaction" onClick="return confirmDelete();">&nbsp;<input type="reset" value="Cancel"></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td></td>
								  <td></td>
 

  </tr>
  
  
  <tr height="90" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div id='gen_order_errorloc' class='error_strings'></div></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td></td>
								  <td></td>
 

  </tr>
  
 
  
</table>

</form>

<script type="text/javascript">
  
  Calendar.setup(
    {
      inputField  : "date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_paid"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "date_trans",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_trans"       // ID of the button
    }
  );
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("gen_order");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 //frmvalidator.addValidation("sales_rep","dontselect=0",">>Please select sales rep");


  
 
 
 
  </SCRIPT>

			
			
			
					
			  </div>
				
				<!--<div id="cont-right" class="br-5">
					
				</div>-->
			
			
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