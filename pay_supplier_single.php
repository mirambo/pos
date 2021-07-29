<?php 
include('Connections/fundmaster.php');
$invoice_payment_id=$_GET['invoice_payment_id'];

$queryop="select * FROM suppliers,mop,supplier_payments,currency where supplier_payments.mop=mop.mop_id and supplier_payments.supplier_id=suppliers.supplier_id and supplier_payments.currency_code=currency.curr_id AND supplier_payment_id='$invoice_payment_id'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
$rows=mysql_fetch_object($results);


if ($invoice_payment_id=='')
{
	
$date_paid=date('Y-m-d');	
}
else
{
	
	$date_paid=$rows->date_paid;
	
}


$account_to_credit_id=$rows->account_to_credit;
$sql34c="select * FROM account_type where account_type_id='$account_to_credit_id'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);




if ($invoice_payment_id=='')
{
	
$account_to_credit_name="Select.......................";	
}
else
{
	
$account_to_credit_name=$rows34c->account_code.' - '.$rows34c->account_type_name;
	
}

if ($invoice_payment_id=='')
{
	
$account_to_credit="";	
}
else
{
	
$account_to_credit=$account_to_credit_id;
	
}


$account_to_debit_id=$rows->account_to_debit;
$sql34c2="select * FROM account_type where account_type_id='$account_to_debit_id'";
$results34c2= mysql_query($sql34c2) or die ("Error $sql34c2.".mysql_error());
$rows34c2=mysql_fetch_object($results34c2);




if ($invoice_payment_id=='')
{
	
$account_to_debit_name="Select.......................";	
}
else
{
	
$account_to_debit_name=$rows34c2->account_code.' - '.$rows34c2->account_type_name;
	
}

if ($invoice_payment_id=='')
{
	
$account_to_debit="";	
}
else
{
	
$account_to_debit=$account_to_debit_id;
	
}

if ($invoice_payment_id=='')
{
	
$customer_name="Select...................";	
}
else
{
	
$customer_name=$rows->supplier_name;
	
}

if ($invoice_payment_id=='')
{
	
$customer_id="";	
}
else
{
	
$customer_id=$rows->supplier_id;
	
}


////invoice ni

$invoice_id=$rows->order_code_id;
$sql34="select * FROM order_code_get where order_code_id='$invoice_id'";
$results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
$rows34=mysql_fetch_object($results34);

$invoice_number=$rows34->lpo_no;
if ($invoice_payment_id=='')
{
	
$invoice_no="Select...................";	
}
else
{
	
$invoice_no=$invoice_number;
	
}

if ($invoice_payment_id=='')
{
	
$sales_id="";	
}
else
{
	
$sales_id=$invoice_id;
	
}


if ($invoice_payment_id=='')
{
	
$curr_name="Select...................";	
}
else
{
	
$curr_name=$rows->curr_name;
	
}

if ($invoice_payment_id=='')
{
	
$currency="";	
}
else
{
	
$currency=$rows->currency_code;
	
}


if ($invoice_payment_id=='')
{
	
$mop_name="Select...................";	
}
else
{
	
$mop_name=$rows->mop_name;
	
}

if ($invoice_payment_id=='')
{
	
$mop="";	
}
else
{
	
$mop=$rows->mop;
	
}

?>

<?php include('Connections/fundmaster.php'); ?>

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
    return confirm("Are you sure you want to save changes");
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
     
    $("#parent_cat12").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_lpos.php?customer_id=' + $(this).val(), function(data) {
    $("#invoice_area").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	 $("#mop").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_mop_details.php?mop_id=' + $(this).val(), function(data) {
    $("#mop_area").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
	
	
	$("#invoice_area").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('lpo_balance.php?invoice_id=' + $(this).val(), function(data) {
    $("#sub_cat2").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
    });
	
	$(document).ready(function() {
     
    $("#currency").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_curr.php?parent_cat12=' + $(this).val(), function(data) {
    $("#sub_cat12").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    
    });
	
    </script>
	<?php
	include('select_search.php');
	
	?>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

<?php require_once('includes/supplier_payment_submenu.php');  ?>
		
		<h3>:: Record Suppliers Payments</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="process_supplier_payment.php?id=<?php echo $invoice_payment_id; ?>" method="post">			
			<table width="100%" border="0">
  <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="9" align="center">


<?php

if ($_GET['addconfirm']==1)
{
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully!!</font></strong></p></div></br>';
//echo '<div align="center" style="background: #3BB64C; height:20px; width:300px; border:#FF0000 solid 1px; font-size:16px;" class="br-5"> <p align="center"><font color="#FFffff"  ><a href="print_sales_receipt.php?invoice_payment_id">Print Receipt</a></font></strong></p></div>';
?>
<a target="_blank" href="sales_receipt.php?invoice_payment_id=<?php echo $invoice_payment_id;?>" style="background: #3BB64C; padding-right:50px; padding-left:50px; height:30px; width:300px; border:#FF0000 solid 1px; color:#ffffff; font-size:13px;" class="br-5">Print Receipt</a>
<?php

}
if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order Updated successfully!!</font></strong></p></div>';

?>

<?php

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order Deleted Successfully</font></strong></p></div>';



?>

	


  </tr>
  
  <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="9" >Select Payment Date:<input type="text" required name="date_paid" value="<?php echo date('Y-m-d'); ?>" size="40" id="date_paid" readonly="readonly" />
	
	
	Accout To Credit
<select name="credit_account_id"  id="account_from" required style="width:250px;">
	
<option value="<?php echo $account_to_credit; ?>"><?php echo $account_to_credit_name; ?></option>

								  <?php
								  
								  $query1="select * from account_type where account_cat_id!='6' order by account_type_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_type_id; ?>"><?php echo $rows1->account_code.' '.$rows1->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> 
								  
								  Accout To Debit
<select name="debit_account_id"  id="account_to" required style="width:250px;">
	
<option value="<?php echo $account_to_debit; ?>"><?php echo $account_to_debit_name; ?></option>

								  <?php
								  
								  $query1="select * from account_type where account_cat_id!='6' order by account_type_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_type_id; ?>"><?php echo $rows1->account_code.' '.$rows1->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
	
	</td>
	</tr>
  
  <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top">
	Select Supplier<font color="#FF0000"></font>
	<br/>
	<br/>
	Select Order<font color="#FF0000"></font>
	
	
	</td>
    <td width="15%" valign="top">
	
	<select name="supplier_id" required id="parent_cat12">
		<option value="<?php echo $rows->supplier_id; ?>"><?php echo $rows->supplier_name; ?></option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM suppliers order by supplier_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['supplier_id']; ?>"><?php echo $row['supplier_name']; ?></option>
    <?php endwhile; ?>
    </select>
	
	
	<br/>
	<br/>
	
	
	
<select name="order_code_id" required id="invoice_area" style="width:150px;">
		<option value="<?php echo $sales_id;?>"><?php echo $invoice_no; ?></option>
	</select>
	
	

								 
	
	</td>
	<td valign="top" width="25%" colspan="2">
	
	Amount Paid : <span id="sub_cat2"><input type="text" required name="amount" size="20" value="<?php echo $rows->amount_received;?>"></span>

	</td>
    <td valign="top" width="10%">Select Currency<font color="#FF0000"></font></td>
    <td valign="top" width="20%"><select name="currency" id="currency" required style="width:100px;">
	                  <option value="<?php echo $currency; ?>"><?php echo $curr_name;?></option>
								  
										  
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
						<span id="sub_cat12">Rate:<input type="text" required name="curr_rate" value="<?php echo $rows->curr_rate; ?>" size="10"></span>
							   </td>
								  
								  
								<td valign="top" width="30%">  
								Paid through <select required name="mop" id="moppp" style="width:100px;">
	                 <option value="<?php echo $rows->mop_id; ?>"><?php echo $rows->mop_name; ?></option>
								  
										  
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
								  <td width="100"></td>
								  
								  
  </tr>
 
 </table>
 
 
 
 
 
 
 
 <div id="mop_area">
 
	
</div>
<table width="100%">
 <tr height="50" bgcolor="#FFFFCC">


    <td align="center"><input type="submit" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;"name="submit" value="Save Details" onClick="return confirmDeletedd();">&nbsp;<input type="reset" value="Cancel"></td>


 

  </tr>	
  </table>
</form>

<script type="text/javascript">
   
  /* Calendar.setup(
    {
      inputField  : "date_drawn",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_drawn"       // ID of the button
    }
  ); */
  
  /* Calendar.setup(
    {
      inputField  : "date_trans",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_trans"       // ID of the button
    }
  ); */
  Calendar.setup(
    {
      inputField  : "date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_paid"       // ID of the button
    }
  );
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("gen_order");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("customer_id","dontselect=0",">>Please select customer");
 frmvalidator.addValidation("amount","req",">>Please enter amount received");
 //frmvalidator.addValidation("desc","req",">>Please enter payment description");
 //frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("curr_rate","req",">>Please enter exchange rate");
 frmvalidator.addValidation("mop","dontselect=0",">>Please select mode of payment");
 frmvalidator.addValidation("sales_rep","dontselect=0",">>Please select sales representative");


  
 
 
 
  </SCRIPT>
  
      <script>


$("#account_from").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	
	
	$("#account_to").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	
	
		$("#parent_cat12").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>

			
			
			
					
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