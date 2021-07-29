<?php 
//$order_id=$_GET['order_id'];	
include('Connections/fundmaster.php');
$id=$_GET['id'];


$queryop="select * FROM customer,sales_debit_journal,currency where sales_debit_journal.customer_id=customer.customer_id 
and sales_debit_journal.currency_code=currency.curr_id AND sales_debit_journal.sales_debit_journal_id='$id'";
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


<form name="gen_order" action="process_sales_debit_journal.php?id=<?php echo $id; ?>" method="post">			
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

  
    <td colspan="9" align="center">Enter Date:<input type="text" required name="date_paid" autocomplete="off" value="<?php echo $rows->date_paid; ?>" size="20" id="date_paid"/>

Accout To Debit
<select name="debit_account_id" id="account_to" required style="width:250px;">
	
<option value="<?php echo $account_to_debit; ?>"><?php echo $account_to_debit_name; ?></option>

								  <?php
								  
								  $query1="select * from account_type order by account_type_name asc";
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
	
	Accout To Credit
<select name="credit_account_id" id="account_from" required  style="width:250px;">
	
<option value="<?php echo $account_to_credit; ?>"><?php echo $account_to_credit_name; ?></option>

								  <?php
								  
								  $query1="select * from account_type order by account_type_name asc";
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
  
  <tr height="40" bgcolor="#C0D7E5">

    <td width="15%" align="right">
	Select Customer<font color="#FF0000"></font>

	
	
	
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
	

	
	

	
	
								 
	
	</td>
	<td valign="" width="25%" colspan="2" align="center">
	
	Amount : <font color="#FF0000"></font><input type="text" required name="amount" value="<?php echo $rows->amount_received;?>" size="20"></span>

	</td>
    <td valign="" width="10%">Select Currency<font color="#FF0000"></font></td>
    <td valign="" width="20%"><select name="currency" id="currency" required style="width:100px;">
	                  <option value="<?php echo $rows->currency_code; ?>"><?php echo $rows->curr_name; ?></option>
								  
										  
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
	
	Reference No : <input type="text"  required name="cheque_no" size="20" value="<?php echo $rows->cheque_no;?>">

	</td>
    <td valign="" width="10%">Comments</td>
    <td valign="" width="20%"><input type="text" required   name="comments" size="40" value="<?php echo $rows->description;?>"></td>
								  
								  
								<td valign="top" width="30%"> 
								  
								  </td>
								  <td width="100"></td>
								  
								  
  </tr>	 
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
      ifFormat    : "%Y-%m-%d",    // the date format
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

