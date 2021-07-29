<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
  
  <script type="text/javascript">
function showDiv(prefix,chooser) 
{
        for(var i=0;i<chooser.options.length;i++) 
		{
        	var div = document.getElementById(prefix+chooser.options[i].value);
            div.style.display = 'none';
        }
 
		var selectedOption = (chooser.options[chooser.selectedIndex].value);

		if(selectedOption == "0")
		{
			displayDiv(prefix,"0");
		}
 
		if(selectedOption == "1")
		{
			displayDiv(prefix,"1");
		}
		if(selectedOption == "2")
		{
			displayDiv(prefix,"2");
		}
		if(selectedOption == "3")
		{
			displayDiv(prefix,"3");
		}
		if(selectedOption == "4")
		{
			displayDiv(prefix,"4");
		}
		if(selectedOption == "5")
		{
			displayDiv(prefix,"5");
		}
		if(selectedOption == "6")
		{
			displayDiv(prefix,"6");
		}
		
		
		
		
		
 
}
 
function displayDiv(prefix,suffix) 
{
        var div = document.getElementById(prefix+suffix);
        div.style.display = 'block';
}

</script>
<script type="text/javascript" src="tcal.js"></script> 

<form name="gen_order" action="process_journal_entry.php" method="post">			
			<table width="100%" border="0">
  <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="7" align="center">

<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Journal Entry Generated successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
 
	


  </tr>
  
  
  
  <tr height="20" bgcolor="#C0D7E5">

    <td width="10%" valign="top">Account To Be Debited<font color="#FF0000"></font></td>
    <td width="15%" valign="top"><div id='gen_order_acc_debit_errorloc' class="error_strings"></div>
	
	<select name="acc_debit">
	
<option value="0">Select..............................</option>
								  <?php
								  
								  $query1="select * from accounts_titles";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->accounts_title_id; ?>"><?php echo $rows1->accounts_title_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
								  <a rel="facebox" href="add_account_title.php?new=1">New Account</a>
	
	</td>
    <td width="10%" valign="top">Account To Be Credited<font color="#FF0000"></font></td>
    <td width="13%" valign="top">
	<div id='gen_order_acc_credit_errorloc' class="error_strings"></div>
	<select name="acc_credit">
	<option value="0">Select..............................</option>
								  <?php
								  
								  $query1="select * from accounts_titles";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->accounts_title_id; ?>"><?php echo $rows1->accounts_title_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select><a href="add_supplier.php?newsup=newsup">New Account</a></td>
								  <td valign="top" width="10%">
								  <div id='gen_order_amount_errorloc' class="error_strings"></div>
								  
								  Enter Amount
								  
								  
								  <font color="#FF0000"></font></td>
								  <td valign="top" width="15%">
								  
								 <div id='gen_order_currency_errorloc' class="error_strings"></div> 
								  
								  <input type="text" name="amount" size="10">
								  
								  <select name="currency">
	               <option value="0">Select........</option>
								  
										  
                                    <?php 
$sqlw="SELECT * FROM currency";
$resultsw= mysql_query($sqlw) or die ("Error $sqlw.".mysql_error()); 
if (mysql_num_rows($resultsw) > 0)
{
						while ($rowsw=mysql_fetch_object($resultsw))
							{						
								?>  
										  
                                    <option value="<?php echo $rowsw->curr_id;?>"><?php echo $rowsw->curr_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>
								  
								  </td>
								  
  </tr>

	
	
	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Description<font color="#FF0000"></font></td>
    <td valign="top"><textarea name="desc" cols="30" rows="3"></textarea></td>
	
	
							   <td valign="top">
							   					   
							   Date Of Transaction<font color="#FF0000"></font>
							
							   
							   
							   
							   </td>
							   
							   
							   <td valign="top">
							   
							   <div id='gen_order_date_recorded_errorloc' class="error_strings"></div> 
							   <input type="text" name="date_recorded" size="40" id="date_recorded" readonly="readonly"  /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
							   <td valign="top">Select Cost Center</td>
							    <td valign="top">
								<div id='gen_order_cost_center_errorloc' class="error_strings"></div> 
								<select name="cost_center">
	
	
		<option value="0">Select..............................</option>
		<option value="N/A">N/A</option>
								  <?php
								  
								  $query1="select * from cost_center";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cost_center_id; ?>"><?php echo $rows1->cost_center_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
							   
    </tr>
	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Mode Of Payment<font color="#FF0000"></font></td>
    <td valign="top">

<select name="mop" id="cboOptions" onchange="showDiv('div',this)">
<option value="0">Select..............................</option>


								  <?php
								  
								  $query1="select * from mop";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->mop_id; ?>"><?php echo $rows1->mop_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
</select>

</td>
							   <td valign="top" colspan="2">
							  <div id="div0" style="display:none; color:#000000">




</div>

<div id="div1" style="display:none; color:#000000">


Cheque No <input name="ref_no" type="text" class="tca" size="10" />&nbsp;&nbsp;&nbsp;
Bank Deposited To <select name="banks">
<option value="0">Select....................</option>
		
								  <?php
								  
								  $query1="select * from banks";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->bank_id; ?>"><?php echo $rows1->bank_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>

</div>

<div id="div2" style="display:none; color:#000000">

Reff. Numb <input name="ref_no" type="text" size="10" />

Bank Transfered To :
<select name="banks">
<option value="0">Select....................</option>
		
								  <?php
								  
								  $query1="select * from banks";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->bank_id; ?>"><?php echo $rows1->bank_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>&nbsp;&nbsp;&nbsp;

</div>

<div id="div3" style="display:none; color:#000000">
Receipt Number <input name="ref_no" type="text" class="tca" size="40" />&nbsp;&nbsp;&nbsp;

</div>

<div id="div4" style="display:none; color:#000000">

Reason Why? <input name="ref_no" type="text" class="tca" size="40" />&nbsp;&nbsp;&nbsp;
</div>

<div id="div5" style="display:none; color:#000000">
Describe <input name="ref_no" type="text" class="tca" size="40"/>&nbsp;&nbsp;&nbsp;

</div>

</td>
							   
							   <td valign="top"><!--Select Cost Center--></td>
							    <td valign="top">
								<div id='gen_order_cost_center_errorloc' class="error_strings"></div> 
								<!--<select name="cost_center">
	
	
		<option value="0">Select..............................</option>
		<option value="N/A">N/A</option>
								  <?php
								  
								  $query1="select * from cost_center";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cost_center_id; ?>"><?php echo $rows1->cost_center_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>--></td>
							   
    </tr>
	  
	 
 
  
  
  <tr height="15" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Save Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
 

  </tr>
  
  
  <tr height="90" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div id='gen_order_errorloc' class='error_strings'></div></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
 

  </tr>
  <?php 
  if ($order_id=='')
  {
  
  }
  else
  {
  
  ?>
  <tr height="50" bgcolor="#FFFFCC">
    <td colspan="6">
	<table width="100%" border="0">
	<tr>	
	<td colspan="12" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::
	Purchase Order Details</span><span style="float:right; margin-right:100px;"><a href="lpo.php?order_id=<?php echo $order_id;?>" ><img src="images/print_icon.gif" title="Print">
	</a>|<a href="lpo_word.php?order_id=<?php echo $order_id;?>" title="Export To Word"><img src="images/word.png"></a></span></td>
	
	
	</tr>
	<?php 
 $sqllpdet="select gas_order.order_id,gas_order.lpo_no,gas_order.curr_rate,gas_order.date_generated,gas_order.quantity,
 gas_order.buying_price,suppliers.supplier_name,weight.weight_name,weight.initials,products.product_name,products.pack_size,products.prod_code,
 currency.curr_name from weight,suppliers,gas_order,products,currency where gas_order.weight_id=weight.weight_id AND gas_order.supplier_id=suppliers.supplier_id AND 
 gas_order.product_id=products.product_id and gas_order.currency_code=currency.curr_id 
 and gas_order.order_id='$order_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
  ?>
	 <tr style="background:url(images/description.gif);" height="30" >	
	<td align="center"><strong>Supplier</strong></td>
	<td align="center"><strong>Product</strong></td>
	<td align="center"><strong>Quantity(<?php echo $rowslpdet->initials; ?>)</strong></td>
	<td align="center"><strong>Amount Per <?php echo $rowslpdet->initials; ?> (<?php echo $rowslpdet->curr_name; ?>)</strong></td>
	<!--<td><strong>Ex. Rate</strong></td>
	<td><strong>Amount(Kshs)</strong></td>-->
	<td align="center"><strong>Total Amount(<?php echo $rowslpdet->curr_name; ?>)</strong></td>
	<!--<td align="center"><strong>Shipping Agent</strong></td>
	<td align="center"><strong>Truck No</strong></td>
	<td align="center"><strong>Transport Charges <br/>Per Kg (<?php echo $rowslpdet->curr_name; ?>)</strong></td>
	<td align="center"><strong>Total Transport<br/> Charges (<?php echo $rowslpdet->curr_name; ?>)</strong></td>-->
	<td><strong>Edit</strong></td>
	<td><strong>Delete</strong></td>
	
	</tr>
	
	
	

	
	<tr >	
	<td><?php echo $rowslpdet->supplier_name; ?></td>
	<td><?php echo $rowslpdet->product_name; ?></td>
	<td align="center"><?php echo number_format($quantity=$rowslpdet->quantity,0); ?></td>
	<td align="center"><?php echo $rowslpdet->curr_name.' '.number_format($buying_price=$rowslpdet->buying_price,2); ?></td>
	<!--<td align="center"><?php echo $curr_rate=$rowslpdet->curr_rate; ?></td>
	<td align="center"><?php echo number_format($amount=$buying_price*$curr_rate,2); ?></td>-->
	<td align="center"><?php echo number_format($ttl_amount=$buying_price*$quantity,2); ?></td>
	<!--<td><?php echo $rowslpdet->shipper_name;  ?></td>
	<td align="center"><?php echo $rowslpdet->vehicle_no;  ?></td>
	<td align="center"><?php echo number_format($transport_charges=$rowslpdet->transport_charges,2);  ?></td>
	<td align="center"><?php echo number_format($transport_charges*$quantity,2);  ?></td>-->
	<td align="center"><img src="images/edit.png"></td>
	<td align="center"><img src="images/delete.png"></td>
	
	</tr>
	
	</table>
	
	
	</td>
    
   
 

  </tr>
  <?php 
  }
  ?>
 
  
</table>

</form>


<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_recorded",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_recorded"       // ID of the button
    }
  );
  
  
  </script>
  
  <script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("gen_order");
    frmvalidator.EnableOnPageErrorDisplay();
   frmvalidator.EnableMsgsTogether();	
 frmvalidator.addValidation("acc_debit","dontselect=0",">>Please select account to be debited");
 frmvalidator.addValidation("acc_credit","dontselect=0",">>Please select account to be credited");
 frmvalidator.addValidation("amount","req",">>Please enter amount");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("date_recorded","req",">>Please enter date recorded");
 frmvalidator.addValidation("cost_center","dontselect=0",">>Please select cost center");
 
 
 

  
//]]></script>





