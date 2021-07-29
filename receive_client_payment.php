<?php 
//$order_id=$_GET['order_id'];	
include('Connections/fundmaster.php');
$id=$_GET['id'];


$queryop="SELECT * FROM customer,mop,customer_payments_code,currency where customer_payments_code.mop=mop.mop_id 
and customer_payments_code.customer_id=customer.customer_id and customer_payments_code.currency_code=currency.curr_id
and customer_payments_code.customer_payment_code_id='$id'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
$rows=mysql_fetch_object($results);

$account_to_credit=$rows->account_to_credit;
$sql34c="select * FROM account_type where account_type_id='$account_to_credit'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
$account_to_credit_name=$rows34c->account_code.' - '.$rows34c->account_type_name;


	$account_to_debit=$rows->account_to_debit;


$sql34c="select * FROM account_type where account_type_id='$account_to_debit'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);

$account_to_debit_name=$rows34c->account_code.' - '.$rows34c->account_type_name;

$customer_id=$rows->customer_id;




?>

<?php  ?>

<html xmlns="http://www.w3.org/1999/xhtml">


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
     
    $("#customer_id").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_invoices.php?customer_id=' + $(this).val(), function(data) {
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
    $.get('client_inv_bal.php?invoice_id=' + $(this).val(), function(data) {
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


<form name="gen_order" action="process_client_payment_bulk.php?id=<?php echo $id; ?>" method="post">			
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

  
    <td colspan="9" >Select Payment Date:<input type="text" required name="date_paid" autocomplete="off" value="<?php echo $rows->date_paid; ?>" size="40" id="date_paid"/>
	
	
	Accout To Credit
<select name="credit_account_id" id="account_from" required  style="width:250px;">
	
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
<select name="debit_account_id" id="account_to" required style="width:250px;">
	
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

    <td width="15%" valign="">
	Select Client<font color="#FF0000"></font>
	<br/>
	<br/>
	
	
	
	</td>
    <td width="15%" valign="">
	
	<select name="customer_id" required id="customer_id" style="width:250px;">
	<option value="<?php echo $rows->customer_id; ?>"><?php echo $rows->customer_name; ?></option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM customer order by customer_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['customer_id']; ?>"><?php echo $row['customer_code'].' - '.$row['customer_name']; ?></option>
    <?php endwhile; ?>
    </select>
	
	
	<br/>
	<br/>
	
	

	
	
								 
	
	</td>
	<td valign="" width="25%" colspan="2">
	
	Amount Received : <font color="#FF0000"></font><input type="text" required name="amount" value="<?php echo $rows->amount_received;?>" size="20"></span>

	</td>
    <td valign="" width="10%">Select Currency<font color="#FF0000"></font></td>
    <td valign="" width="20%"><select name="currency" id="currency" required style="width:100px;">
	                  <option value="<?php echo $rows->curr_id; ?>"><?php echo $rows->curr_name; ?></option>
								  
										  
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
								  
								  
								<td valign="" width="30%">  
								Paid through <select  name="mop" id="mop" required style="width:100px;">
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
 
 <table width="100%" align="center">	
<tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top">
	

	
	
	</td>
    <td width="15%" valign="top">
	
	
	

	
	

								 
	
	</td>
	<td valign="" width="25%" colspan="2">
	
	Cheque No : <input type="text"  name="cheque_no" size="20" value="<?php echo $rows->cheque_no;?>">

	</td>
    <td valign="" width="10%">Comments</td>
    <td valign="" width="20%"><input type="text"  name="comments" size="40" value="<?php echo $rows->description;?>"></td>
								  
								  
								<td valign="top" width="30%"> 
								  
								  </td>
								  <td width="100"></td>
								  
								  
  </tr>	 
 </table>
 
<table width="100%" class="table1" border="0" align="center">
 <tr bgcolor="#FFFFCC"><td><span  id="invoice_area">
 
 <?php 
 
 if ($id!='')
 {
	 ?>
	 
<table width="60%"  class="table1" border="0" align="center">
 <tr bgcolor="#C0D7E5" height="30"><td colspan="7" align="center"><strong>Allocate payments to the following invoices</strong></td></tr>
 
 
   <tr style="background:url(images/description.gif);" height="30" >
 <td width="10%"><div align="center"><strong>Invoice No.</strong></td>
    <td width="15%"><div align="center"><strong>Ref No.</strong></td>
    <td width="15%"><div align="center"><strong>Date Paid</strong></td>
	<td width="15%"><div align="center"><strong>Invoice Amount</strong></td>
	<td width="10%"><div align="center"><strong>Rate</strong></td>
	<td width="20%"><div align="center"><strong>Invoice Amount (Tshs)</strong></td>
	<td width="20%"><div align="center"><strong>Select</strong></td>
	
	</tr>
<?php








$query_parent33 = mysql_query("SELECT * FROM customer_payments,sales where 
sales.sales_id=customer_payments.sales_id and customer_payments.customer_payment_code_id='$id'") or die("Query failed: ".mysql_error());


if ($num_rowsd=mysql_num_rows($query_parent33)>0)
{

while($row33 = mysql_fetch_array($query_parent33))
{
	
	$RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
	
$job_card_id=$row33['sales_id'];

$customer_payment_id=$row33['customer_payment_id'];


/* $sqlts="SELECT SUM(vendor_prc*quantity+order_vat_value) as task_totals from purchase_order where order_code='$order_code'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);
						 
$task_totals=$rowsts->task_totals;	

$sqlts2="SELECT SUM(order_amount_received) as ttl_payment from supplier_payments where order_code_id='$order_code'";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
$rowsts2=mysql_fetch_object($resultsts2);

$ttl_payment=$rowsts2->ttl_payment;

$inv_balance=$task_totals-$ttl_payment;	 */
	

	
	
	?>
	

	
	<td><?php echo $row33['invoice_no']; ?></td>
	<td><?php echo $row33['order_no']; ?></td>
	<td><?php echo $rows->date_paid;  ?></td>
<td align="right">
	<?php
	echo $row33['curr_name']; 
	include ('invoice_value.php');

	?>
	
	</td>
		<td align="right"><?php echo number_format($curr_rate=$row33['curr_rate'],2);?></td>
		<td align="right"><strong><?php 
	//echo number_format($lpo_ttl_kshs=$curr_rate*$lpo_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong>
	
	<input type="text" value="<?php echo $row33['invoice_amount_received']; ?>" required name="order_amount_received[<?php echo $job_card_id; ?>]">
	</td>
	
	<td align="center">
	
	<input type="hidden" name="customer_payment_id[<?php echo $job_card_id; ?>]" value="<?php echo $customer_payment_id;?>">
	<input type="checkbox" checked name="sales_id[<?php echo $job_card_id; ?>]" value="<?php echo $job_card_id;?>">
	
	
	</td>

	
	
	



</tr>

<?php 


} 
}
else
{
	?>
	<tr height="30"><td colspan="7" align="center"><font color="#ff0000">No orders found</font></td></tr>
	
	<?php
	
	
}

?>			  
</table>	 
	 
	 <?php
	 
 }
 else
 {
	 
	 
	 
 }
 
 ?>
 
 
 
 
 
 
 
 
 
 
 </span></td></tr>
 </table>

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
	
	
		$("#customer_id").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>

