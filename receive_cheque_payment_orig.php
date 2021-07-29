<?php 
include('Connections/fundmaster.php');

$id=$_GET['id'];

$queryop="select * FROM mop,cheque_received,currency where cheque_received.mop=mop.mop_id and 
cheque_received.currency=currency.curr_id AND cheque_received.cheque_received_id='$id'";
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
$supplier_id=$rows->supplier_id;

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






<!--<script language="JavaScript">
	function selectAll(source) {
		checkboxes = document.getElementsByName('order_code_id[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	}
</script>

<script type="text/javascript" src="jquery.js"></script>
<script>
$(document).ready(function()
{
    $("form").submit(function(){
		if ($('input:checkbox').filter(':checked').length < 1){
        alert("Kindly select atleast one order to be allocated the amount");
		return false;
		}
    });
});
</script>-->


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


<form name="gen_order" action="process_received_cheque.php?id=<?php echo $id; ?>" method="post">			
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
  
  <tr height="40" bgcolor="#FFFFCC">

  
    <td colspan="9" align="center">Enter Date:<input type="text" required name="date_paid" autocomplete="off" value="<?php echo $rows->date_recorded; ?>" size="20" id="date_paid" />
	
	
	
								  
								  Accout To Debit
<select name="debit_account_id"  id="account_to" required style="width:250px;">
	
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
<select name="credit_account_id"  id="account_from" required style="width:250px;">
	
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

    <td width="15%" valign="top">
	

	
	
	</td>
    <td width="15%" valign="" align="right">
	


	

	
	
	Amount: 
								 
	
	</td>
	<td valign="" width="15%" colspan="2">
	
<input type="text" required name="amount" size="20" value="<?php echo $rows->amount;?>">

	</td>
    <td align="right" width="10%">Select Currency<font color="#FF0000"></font></td>
    <td valign="" width="20%"><select name="currency" id="currency" required style="width:100px;">
	                  <option value="<?php echo $rows->currency; ?>"><?php echo $rows->curr_name;?></option>
								  
										  
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
								Mode Of Payment <select required name="mop" id="moppp" style="width:100px;">
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
  
   <tr height="40" bgcolor="#C0D7E5">

    <td width="15%" valign="top">
	

	
	
	</td>
    <td width="15%" align="right" valign="">
	
	
	

	
	Cheque No/Ref No : 

								 
	
	</td>
	<td valign="" width="15%" colspan="2">
	
	<input type="text"  name="cheque_no" required  size="20" value="<?php echo $rows->ref_no;?>">

	</td>
    <td align="right" width="10%">Comments</td>
    <td valign="" width="20%"><input type="text"  name="comments" size="40" value="<?php echo $rows->comments;?>"></td>
								  
								  
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

			
	