<?php
$sqlj="SELECT * from job_cards where job_card_id='$get_job_card_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);

$sale_type=$rowsj->sale_type;

if (isset($_POST['update_job_card']))
{

assign_projectdonor2($job_card_id,$customer_id,$start_date,$end_date,
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
  
  <script type="text/javascript">
        

function confirmDelete()
{
    return confirm("Are you sure you want to save changes?");
}

</script>
  
  
  
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<h3 align="center">View Job Card Details<a style="float:right; margin-right:200px;" href="home.php?viewcountries=viewcountries">New Job Card</a></h3>
	
<form name="search" method="post" action="">
 
<table width="100%" border="1" >
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

 
<tr bgcolor="#cccccc">


<?php 
 $customer_id=$rowsj->customer_id;
$queryc="select * from customer where customer_id='$customer_id'";
$resultsc=mysql_query($queryc) or die ("Error: $queryc.".mysql_error());								  
$rowsc=mysql_fetch_object($resultsc);

?>




<td width="20%">
<?php 
 $sale_type=$rowsj->sale_type;
?>
<input type="radio" name="sale_type" <?php if ($sale_type=='cr'){ echo "checked"; } else {} ?> value="cr">Credit Sales
<input type="radio" name="sale_type" <?php if ($sale_type=='cs'){ echo "checked"; } else {} ?> value="cs">Cash Sales</br></br>

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
									  
									  
								  
								  
								  
								  
								  
								  ?></select><a href="#"></a><br/>
					<!--<p>Customer Name :  <?php echo $rowsc->customer_name ?></p>
					<p>Phone Number : <?php echo $rowsc->phone; ?></p>-->
								  
								  
								  
								  </td>
<td>

<?php 
/* $queryempno="select * from job_cards order by  job_card_id desc limit 1";
$resultsempno=mysql_query($queryempno) or die ("Error: $queryempno.".mysql_error());								  
$rowsempno=mysql_fetch_object($resultsempno);
$emp_no=$rowsempno->job_card_id;
$job_card_no=$emp_no+1; */
	
?>
Start Date : <input type="text" name="date_from" size="20" id="date_from" value="<?php echo $rowsj->start_date;?>" readonly="readonly" />
End Date : <input type="text" name="date_to" size="20" id="date_to" value="<?php echo $rowsj->end_date;?>" readonly="readonly" /><br/><br/>
Job Card No : <input type="textbox" size="20" value="<?php echo $get_job_card_id;?>" name="job_card_id">
Discount (%): <input type="textbox" size="15" name="discount" value="<?php echo $rowsj->discount;?>">

</td>


<?php 
 $technician_id=$rowsj->technician_id;
$queryt="select * from users where user_id='$user_id'";
$resultst=mysql_query($queryt) or die ("Error: $queryt.".mysql_error());								  
$rowst=mysql_fetch_object($resultst);

?>




<td>Assign Technician : 
<select name="technician_id">
<option value="<?php echo $technician_id;?>"><?php echo $rowst->f_name; ?></option>
<?php $query1="select * from users where user_group_id='30' order by f_name asc"; 
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); 
if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) 
{ ?> <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option> 
<?php  
} 
} ?></select><a href="#"></a><br/>






<?php 
 
 $curr_id=$rowsj->currency;
$querytc="select * from currency where curr_id='$curr_id'";
$resultstc=mysql_query($querytc) or die ("Error: $querytc.".mysql_error());								  
$rowstc=mysql_fetch_object($resultstc);

?>

</br>
Select Currency
<select name="currency" id="parent_cat">
	<option value="<?php echo $curr_id;?>"><?php echo $rowstc->curr_name; ?></option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM currency order by curr_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['curr_id']; ?>"><?php echo $row['curr_name']; ?></option>
    <?php endwhile; ?>
    </select>

</br></br>Exchange Rate (To SSP) : <input type="textbox" size="10" name="curr_rate" class="val3" value="<?php echo $rowsj->curr_rate;?>">
</td>
<td width="20%" colspan="2">
<table border="1" class="table" width="100%">
<tr><td colspan="2" align="center" bgcolor="#FF9900"><strong>Payment History</strong></td></tr>
<tr>

<td align="center"><strong>Date Paid<strong></td>
<td align="center"><strong>Amount Paid</strong></td>

</tr>

<?php 
$query1pd="select * from invoice_payments where sales_code_id='$get_job_card_id' order by invoice_payment_id asc"; 
$results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
if ($invnum_rows=mysql_num_rows($results1pd)>0) { while ($rows1pd=mysql_fetch_object($results1pd)) 
{ ?>

<tr>

<input style="display:none;" type="checkbox" checked name="invoice_payment_id[]" value="<?php echo $invoice_payment_id=$rows1pd->invoice_payment_id;?>">
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

<td colspan="4">
 <table class="table">
<tr style="background:url(images/description.gif);" height="20" align="center">
<td width="20%"><strong>Service Item</strong></td>
<td width="10%"><strong>Description<strong></td>
<td width="10%"><strong>Start From<strong></td>
<td width="10%"><strong>Quantity<strong></td>
<td width="15%"><strong>Unit Cost (<span id="sub_cat2"><?php echo $rowstc->curr_name; ?></span>)<strong></td>
<td width="15%"><strong>Total Cost (<span id="sub_cat3"><?php echo $rowstc->curr_name; ?></span>)<strong></td>


</td>



</tr>
<?php
$task_totals=0;
$sqlts="SELECT * from job_card_task where job_card_id='$get_job_card_id' order by job_card_task_id asc";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
?>





        <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%">
		<?php  $rowsts->job_card_task_id;?>
		<input type="checkbox" checked name="job_card_task_id[]" value="<?php echo $rowsts->job_card_task_id;?>" style="display:none;">
		
		
		
		
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
		
		?></select><!--<a href="#">New</a>--></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]" value="<?php echo $rowsts->description;?>"></td>  
        <td width="10%"><input type="textbox" size="20" name="start_from[]" value="<?php echo $rowsts->start_from;?>"></td>  
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
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><!--<a href="#">New</a>--></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>  
<td width="10%"><input type="textbox" size="20" name="start_from[]"></td> 			
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
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><!--<a href="#">New</a>--></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		<td width="10%"><input type="textbox" size="20" name="start_from[]"></td> 	
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
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><!--<a href="#">New</a>--></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		<td width="10%"><input type="textbox" size="20" name="start_from[]"></td> 	
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
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><!--<a href="#">New</a>--></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		<td width="10%"><input type="textbox" size="20" name="start_from[]"></td> 	
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
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><!--<a href="#">New</a>--></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		<td width="10%"><input type="textbox" size="20" name="start_from[]"></td> 	
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
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><!--<a href="#">New</a>--></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td> 
<td width="10%"><input type="textbox" size="20" name="start_from[]"></td> 			
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
	  
	  
	  
	  
	  
	  
	  
            <tr height="60" bgcolor="#CCCCCC">

    <td  colspan="5" height="40">
       <strong><font  color="#000000"> Grand Total (<span id="sub_cat23"><?php echo $rowstc->curr_name; ?></span>): </strong><span id="grandTotal"><?php echo $task_totals; ?></span></font>
	   
	   &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Discount Value : <?php  $disc=$rowsj->discount;
	   
	echo  number_format($disc_value=$disc/100*$task_totals,2);
	
	   	   
	   ?>
	   
	  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Discounted Amount : <?php echo number_format($discounted_amount=$task_totals-$disc_value,2) ;?> 
	   
	   
	   
	   
	   
	   
	   
	   
	   <?php 
	   $query1pd="select SUM(amount_received) as ttl_amnt from invoice_payments WHERE sales_code_id='$get_job_card_id'"; 
	   $results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
	   $rowspd=mysql_fetch_object($results1pd);
	   
	   
	   ?>
	    
	   &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<strong><font  color="#339933"> Amount Paid : </strong><span id="grandTotal"><?php echo number_format($ttl_amount_paid=$rowspd->ttl_amnt,2).'  '; ?></span></font>&nbsp;&nbsp;
	   &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<strong><font color="#ff0000"> Balance: </strong><span id="grandTotal"><?php echo number_format($balance=$discounted_amount-$ttl_amount_paid,2); ?></span></font>

	   
	   
	   <br/> <br/>
	   
	   &nbsp;&nbsp;<strong><font color="#000000">  Amount Paid : </strong><input name="amount_paid" class="val4" size="20" />
	  <strong>Date Paid  : </strong><input type="text" name="date_paid" size="20" id="date_paid" readonly="readonly" /> 
	 <strong> Balance Payment Date: </strong><input type="text" name="bal_date" size="10" id="bal_date"  value="<?php echo $rowsj->bal_date;?>"/> 
    </td>

</tr>	

<?php 
 $approved_status=$rowsj->approved_status;

if ($approved_status==1)
{

}
else
{

?>

<tr bgcolor="#cccccc"><td colspan="6" align="center"><input type="submit" name="submit" onClick="return confirmDelete();" value="Save / Update" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;">
	<input type="hidden" name="update_job_card" id="update_job_card" value="1">&nbsp;&nbsp;</td></tr>
<?php }?>
 
</table>       
        
 




<td valign="top" width="200" align="center">
<?php 
$query1pd="select * from invoice_payments where sales_code_id='$get_job_card_id' order by invoice_payment_id asc"; 
$results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
$invnum_rows=mysql_num_rows($results1pd); 
	 $invnum_rows;
	?>
<br/><br/>
	
	<!--<a target="_blank" style="background:#2E3192; padding-left:35px; padding-right:35px; padding-top:3px; padding-bottom:2px; font-size:12px; color:#ffffff; font-weight:bold; width:200px; height:20px; border-radius:5px;" href="print_job_card.php?job_card_id=<?php echo $get_job_card_id;?>">Print Job Card Only</a>	</br></br>-->
	
	<?php
	if ($sale_type=='cr')
	{
	
	$query1pd="select * from invoice_payments where sales_code_id='$get_job_card_id' order by invoice_payment_id asc"; 
$results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
$rowspd=mysql_fetch_object($results1pd);
$invoice_payment_id=$rowspd->invoice_payment_id;
	?>
	<a target="_blank" style="background:#2E3192; padding-left:35px; padding-right:35px; padding-top:3px; padding-bottom:2px; font-size:12px; color:#ffffff; font-weight:bold; width:200px; height:20px; border-radius:5px;" href="print_invoice.php?job_card_id=<?php echo $get_job_card_id;?>&invoice_payment_id=<?php echo $invoice_payment_id;?>&direct=1"">Print Invoice Only</a>	</br></br>
	<?php 
	}
	elseif ($sale_type=='cs')
    {
	
	if ($invnum_rows>1)
	{?>
	<a rel="facebox" target="_blank" style="background:#2E3192; padding-left:25px; padding-right:5px; padding-top:3px; padding-bottom:2px; font-size:12px; color:#ffffff; font-weight:bold; width:200px; height:20px; border-radius:5px;" href="pre_print_job_card.php?job_card_id=<?php echo $get_job_card_id;?>">Print Receipt Only</a></br></br>
	<?php 
	}
	else
	{
$query1pd="select * from invoice_payments where sales_code_id='$get_job_card_id' order by invoice_payment_id asc"; 
$results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
$rowspd=mysql_fetch_object($results1pd);
$invoice_payment_id=$rowspd->invoice_payment_id;	
	
	
	?>
	
	<a target="_blank" style="background:#2E3192; padding-left:35px; padding-right:35px; padding-top:3px; padding-bottom:2px; font-size:12px; color:#ffffff; font-weight:bold; width:200px; height:20px; border-radius:5px;" href="print_receipt.php?job_card_id=<?php echo $get_job_card_id;?>&invoice_payment_id=<?php echo $invoice_payment_id;?>&direct=1">Print Receipt Only</a>	</br></br>
	<?php 
	}
	}
	else
	{
	echo "<a href='#ff0000'>Please choose the sales type!!</font>";
	}
	
	?>
	
	<?php 
	if ($sale_type=='cr')
	{?>
	<a target="_blank" style="background:#2E3192; padding-left:25px; padding-right:5px; padding-top:3px; padding-bottom:2px; font-size:12px; color:#ffffff; font-weight:bold; width:200px; height:20px; border-radius:5px;" href="print_job_card.php?job_card_id=<?php echo $get_job_card_id;?>&invoice_payment_id=<?php echo $invoice_payment_id;?>&direct=1&sale_type=cr">Print Job Card and Invoice</a>	</br></br>
	<?php
	}
	if ($sale_type=='cs')
	{
	
	if ($invnum_rows>1)
	{?>
	<a rel="facebox" target="_blank" style="background:#2E3192; padding-left:25px; padding-right:5px; padding-top:3px; padding-bottom:2px; font-size:12px; color:#ffffff; font-weight:bold; width:200px; height:20px; border-radius:5px;" href="pre_print_job_card.php?job_card_id=<?php echo $get_job_card_id;?>">Print Job Card and Receipt</a>
	<?php 
	}
	else
	{
$query1pd="select * from invoice_payments where sales_code_id='$get_job_card_id' order by invoice_payment_id asc"; 
$results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
$rowspd=mysql_fetch_object($results1pd);
$invoice_payment_id=$rowspd->invoice_payment_id;	
	
	
	?>
	<a target="_blank" style="background:#2E3192; padding-left:25px; padding-right:5px; padding-top:3px; padding-bottom:2px; font-size:12px; color:#ffffff; font-weight:bold; width:200px; height:20px; border-radius:5px;" href="print_job_card.php?job_card_id=<?php echo $get_job_card_id;?>&invoice_payment_id=<?php echo $invoice_payment_id;?>&direct=1">Print Job Card and Receipt</a>	</br></br>
<?php
	}
}
	?>
	
</br>

<strong>Remarks: </strong><br/>
 <textarea rows="5" cols="30" name="gen_remarks"><?php echo $rowsj->general_remarks; ?></textarea>	
	
	
</td>





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
  

  
  
  
  </script>


</td></tr>





