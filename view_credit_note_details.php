<?php


$sqlj="SELECT * from credit_note where credit_note_id='$get_credit_note_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);



if (isset($_POST['update_job_card']))
{

create_credit_note2($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id);
}
 ?>
 
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
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<h3 align="center">View credit_note Details<a style="float:right; margin-right:200px;" href="home.php?dropdowntitle=dropdowntitle=dropdowntitle=dropdowntitle">New Credit Note</a></h3>
	
<form name="search" method="post" action="">
 
<table width="95%" border="1" align="center">
<tr bgcolor="#FFFFCC" height="20" style="display:none;"><td colspan="10" align="center" ><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Created Successfully!!</font></strong></p></div>';

if ($_GET['addtaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More task added successfully!!</font></strong></p></div>';


if ($_GET['editaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Updated Successfully!!</font></strong></p></div>';

if ($_GET['deletetaskconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Deleted Successfully!!</font></strong></p></div>';


if ($_GET['editpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Items Updated Successfully!!</font></strong></p></div>';

if ($_GET['addpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Job Card Items Added Successfully!!</font></strong></p></div>';


if ($_GET['addbelongconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Customer Belonging Added Successfully!!</font></strong></p></div>';



if ($_GET['deletepartconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Part Deleted Successfully from the job card!!</font></strong></p></div>';

if ($_GET['deletebelongconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Customer belonging deleted successfully from the job card!!</font></strong></p></div>';


if ($_GET['editjobcardconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Details Updated Successfully!!</font></strong></p></div>';

if ($_GET['editbelongconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Customer Belongings Details Updated Successfully!!</font></strong></p></div>';


if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Updated Successfully!!</font></strong></p></div>';


?>
<?php

if ($_GET['delete']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>

 
<tr >
<td width="10%">&nbsp;</td>
<td width="10%"><?php 

$customer_id=$rowsj->customer_id;
$queryc="select * from customer where customer_id='$customer_id'";
$resultsc=mysql_query($queryc) or die ("Error: $queryc.".mysql_error());								  
$rowsc=mysql_fetch_object($resultsc);

?>
Select Customer : </br><select name="customer_id">
	<option value="<?php echo $rowsc->customer_id;?>"><?php echo $rowsc->customer_name; ?></option>
								  <?php
								  
								  $query1="select * from customer order by customer_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->customer_id;?>"><?php echo $rows1->customer_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select></td>
<td>

<?php 
/* $queryempno="select * from job_cards order by  job_card_id desc limit 1";
$resultsempno=mysql_query($queryempno) or die ("Error: $queryempno.".mysql_error());								  
$rowsempno=mysql_fetch_object($resultsempno);
$emp_no=$rowsempno->job_card_id;
$job_card_no=$emp_no+1; */
	
?>
Credit Note Date : <input type="text" name="date_from" size="20" id="date_from" value="<?php echo $rowsj->credit_note_date;?>" readonly="readonly" />
Credit Note No : <input type="textbox" size="20" value="<?php echo $get_credit_note_id;?>" name="job_card_id"></br>
<?php 
 
 $curr_id=$rowsj->currency;
$querytc="select * from currency where curr_id='$curr_id'";
$resultstc=mysql_query($querytc) or die ("Error: $querytc.".mysql_error());								  
$rowstc=mysql_fetch_object($resultstc);

?>

</br>
Select Currency
<select name="currency" style="width:150px;">

<option value="<?php echo $curr_id;?>"><?php echo $rowstc->curr_name; ?></option>
<?php 
$query1="select * from currency order by curr_name asc"; 
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); 
if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) 
{ ?>

 <option value="<?php echo $rows1->curr_id; ?>"><?php echo $rows1->curr_name; ?> </option> 

<?php 
 } 
 
 } ?></select>

</td>
<td width="20%" colspan="2">
<table border="1" class="table" width="100%">
<tr><td colspan="2" align="center" bgcolor="#FF9900"><strong>Payment History</strong></td></tr>
<tr>

<td align="center"><strong>Date Paid<strong></td>
<td align="center"><strong>Amount Paid</strong></td>

</tr>

<?php 
$query1pd="select * from credit_note_payments where sales_code_id='$get_credit_note_id' order by credit_note_payment_id asc"; 
$results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
if ($invnum_rows=mysql_num_rows($results1pd)>0) { while ($rows1pd=mysql_fetch_object($results1pd)) 
{ ?>

<tr>

<input style="display:none;" type="checkbox" checked name="credit_note_payment_id[]" value="<?php echo $invoice_payment_id=$rows1pd->credit_note_payment_id;?>">
<?php //echo $invoice_payment_id=$rows1pd->invoice_payment_id; ?>
<!--<td><input type="radio" checked name="receipt" value="<?php $invoice_payment_id=$rows1pd->invoice_payment_id;?>">

</td>-->
<td align="center"><?php //echo $rows1pd->date_paid;?>
<input type="text" name="date_paid2[]" value="<?php echo $rows1pd->date_paid;?>" size="10">

</td>
<td align="right"><?php  $amount_received=$rows1pd->amount_received;    $ttl_amnt_rec=$ttl_amnt_rec+$amount_received;?>

<input type="text" name="amount_paid2[]" value="<?php echo $rows1pd->amount_received;?>" size="10">



</td>

</tr>
<?php
}
?>
<tr><td align="right"><strong>Total Paid</strong></td><td align="right"><strong><?php echo $ttl_amnt_rec; ?><strong></td></tr>
<?php
}
else
{ ?>
<tr><td colspan="2">No Payment received!!</td></tr>

<?php
}

 ?>
</table>



</td>

</tr>


<tr>
<td>&nbsp;</td>
<td colspan="3">
 <table class="table">
<tr style="background:url(images/description.gif);" height="20" align="center">
<td width="20%"><strong>Service Item</strong></td>
<td width="10%"><strong>Description<strong></td>
<td width="10%"><strong>Quantity<strong></td>
<td width="15%"><strong>Unit Cost (SSP)<strong></td>
<td width="15%"><strong>Total Cost (SSP)<strong></td>


</td>



</tr>
<?php
$task_totals=0;
$sqlts="SELECT * from credit_note_task where credit_note_id='$get_credit_note_id' order by credit_note_task_id asc";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
?>





        <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%">
		<?php  $rowsts->credit_note_task_id;?>
		<input type="checkbox" checked name="credit_note_task_id[]" value="<?php echo $rowsts->credit_note_task_id;?>" style="display:none;">
		
		
		
		
		<?php 
 
 $service_id=$rowsts->service_item_id;
$querytcs="select * from service_item where service_item_id='$service_id'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);

?>
		
		
		<select name="service_item_id[]" style="width:150px;">
		<option value="<?php echo $service_id?>"><?php echo $rowstcs->service_item_name; ?></option>
		<option value="0">Remove.....................</option>
		
		
		<?php $query1="select * from service_item order by service_item_name asc"; 
		$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); 
		if (mysql_num_rows($results1)>0)
		{ while ($rows1=mysql_fetch_object($results1))
		{ ?> <option value="<?php echo $rows1->service_item_id; ?>">
		
		<?php echo $rows1->service_item_name; ?> </option>
		<?php 
		} 
		} 
		
		?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]" value="<?php echo $rowsts->description;?>"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" value="<?php echo $quantity=$rowsts->quantity;?>"/>
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" value="<?php echo $unit_cost=$rowsts->unit_cost;?>"/>
            </td>
            <td>
                   <strong> <span class="multTotal"><?php echo $amount=$quantity*$unit_cost; 
				   $task_totals=$task_totals+$amount;
				   
				   
				   ?></span><strong>
            </td>
        </tr>
<?php 
}}

?>		
		
		
		
		
		
		
		
		
		
		
       <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		    <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                   <strong> <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
         <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		    <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
        <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
      <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
		<tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
		<tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
	  
	  
	  
	  
	  
	  
	  
            <tr>
 <td><strong>Payments Terms And Condition:</strong><br/>
 <textarea rows="2" cols="50" name="gen_remarks"><?php echo $rowsj->terms; ?></textarea></td>
    <td  align="right" colspan="4">
       <strong><font  color="#000000"> Grand Total (SSP): </strong><span id="grandTotal"><?php echo $task_totals; ?></span></font>
	   <?php 
	   $query1pd="select SUM(amount_received) as ttl_amnt from credit_note_payments WHERE sales_code_id='$get_credit_note_id'"; 
	   $results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
	   $rowspd=mysql_fetch_object($results1pd);
	   
	   
	   ?>
	    
	   &nbsp;&nbsp;&nbsp;<strong><font  color="#339933"> Amount Paid (SSP): </strong><span id="grandTotal"><?php echo $ttl_amount_paid=$rowspd->ttl_amnt.'  '; ?></span></font>&nbsp;&nbsp;
	   &nbsp;&nbsp;<strong><font color="#ff0000"> Balance(SSP): </strong><span id="grandTotal"><?php echo $balance=$task_totals-$ttl_amount_paid; ?></span></font>

	   
	   
	   <br/> <br/>
	   
	   &nbsp;&nbsp;<strong><font color="#000000">  Amount Paid : </strong><input name="amount_paid" class="val4" size="20" />   
	   <strong>Date Paid  : </strong><input type="text" name="date_paid" size="20" id="date_paid" readonly="readonly" />
	   
	   
	   
	   
	   
	   
	   
	   
	   <?php
$currency=7;
$curr_rate=1;
$invoice_id=$get_credit_note_id;	
$grand_ttl=$task_totals;

/* $transaction_descinv='Credit Sales Inv No:'.$invoice_no;	
$transaction_desc='Credit Sales To '.$c_name.' Invoice: '.$invoice_no;	
$transaction_desclg='Amount Paid Upon Invoice Generation '.$invoice_no; */

$transaction_descinv='Sales Return Credit Note No:'.$get_credit_note_id;	
$transaction_desc='Sales Return Credit Note No:'.$get_credit_note_id.' To '.$c_name;

//update customer transactions
/*$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_descinv','$grand_ttl',NOW(),'inv$invoice_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());*/
$sqlprof="select * from customer_transactions where transaction_code='crt$get_credit_note_id'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{

}
else
{

$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_descinv','-$grand_ttl',NOW(),'crt$invoice_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into sales_return_ledger values('','$transaction_desc','$grand_ttl','$grand_ttl','','$currency','$curr_rate',NOW(),'crt$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$transaction_desc','-$grand_ttl','','$grand_ttl','$currency','$curr_rate',NOW(),'crt$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

/* $sqlaccpay= "insert into vat_ledger values('','$transaction_desc','$vat_value','$vat_value','','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into discount_allowed_ledger values('','$transaction_desc','$discount_val','$discount_val','','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */
}





	?>
	   
    </td>
	
	
	
	
	
	
	
	
	
	
	
	

</tr>	




 
</table>       
        
 




<td valign="top" width="200" align="center">

<input type="submit" name="submit" value="Save / Update" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;">
	<input type="hidden" name="update_job_card" id="update_job_card" value="1">&nbsp;&nbsp;<br/><br/>
	
	
	
	<a target="_blank" style="background:#2E3192; padding-left:25px; padding-right:15px; padding-top:5px; padding-bottom:5px; font-size:12px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;" href="print_credit_note.php?credit_note_id=<?php echo $get_credit_note_id;?>">Print credit_note</a>	</br></br>

</td>





</tr>

 
	
	
	
</table>
</form>



</td></tr>





