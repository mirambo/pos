<?php
$get_job_card_id=$_GET['job_card_id'];

$sqlj="SELECT * from job_cards where job_card_id='$get_job_card_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);
$currency=$rowsj->currency;
$curr_rate=$rowsj->curr_rate;
$discount=$rowsj->discount;
$sale_type=$rowsj->sale_type;

if (isset($_POST['update_job_card']))
{

approve_invoice ($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id);
}





include ('includes/facebox.php');
 ?>
 <script type="text/javascript"> 

function confirmApprove()
{
    return confirm("Are you sure you want to approve?");
}
</script>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="jquery-1.8.3.js"></script>-->

<script src="js/jquery-1.10.2.min.js"></script>	
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
		
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#parent_cat").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('loadsubcat.php?parent_cat=' + $(this).val(), function(data) {
    $("#sub_cat").html(data);
    $("#sub_cat2").html(data);
    $("#sub_cat3").html(data);
    $("#sub_cat23").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    
    });
		



    </script>		
			
		

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);
table1
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

</style>

<script type="text/javascript"> 
  $(document).ready(function () {
       $(".txtMult input").keyup(multInputs);

       function multInputs() {
           var mult = 0;
           // for each row:
           $("tr.txtMult").each(function () {
               // get the values from this row:
               var $val1 = $('.val1', this).val();
               var $val2 = $('.val2', this).val();
               var $val4 = $('.val4', this).val();
               var $total = ($val1 * 1) * ($val2 * 1)
               $('.multTotal',this).text($total);
               mult += $total;
               //multdiff += $total - ($val4 * 1);
           }); 
           $("#grandTotal").text(mult);
          // $("#grandDiff").text(multdiff);
       }
  });

  
  
  
 


</script>

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

$c_name=$rowsc->customer_name;

?>




<td width="20%">
<?php 
 $sale_type=$rowsj->sale_type;
?>
<input type="radio" disabled name="sale_type" <?php if ($sale_type=='cr'){ echo "checked"; } else {} ?> value="cr">Credit Sales
<input type="radio" disabled name="sale_type" <?php if ($sale_type=='cs'){ echo "checked"; } else {} ?> value="cs">Cash Sales</br></br>

Select Customer : </br><select name="customer_id" disabled>
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
Start Date : <input disabled type="text" name="date_from" size="20" id="date_from" value="<?php echo $start_date=$rowsj->start_date;?>" readonly="readonly" />
End Date : <input disabled type="text" name="date_to" size="20" id="date_to" value="<?php echo $rowsj->end_date;?>" readonly="readonly" /><br/><br/>
Job Card No : <input disabled type="textbox" size="20" value="<?php echo $get_job_card_id;?>" name="job_card_id">
Discount (%): <input disabled type="textbox" size="15" name="discount" value="<?php echo $rowsj->discount;?>">


</td>


<?php 
 $technician_id=$rowsj->technician_id;
$queryt="select * from users where user_id='$technician_id'";
$resultst=mysql_query($queryt) or die ("Error: $queryt.".mysql_error());								  
$rowst=mysql_fetch_object($resultst);

?>




<td>
<a rel="facebox" style="font-weight:bold; color:#ff0000" href="edit_job_card.php?job_card_id=<?php echo $get_job_card_id;?>"><!--Click Here To Edit Job Card Details!!!--></a></br>
Assign Technician : 
<select disabled name="technician_id">
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
<select disabled name="currency" id="parent_cat">
	<option value="<?php echo $curr_id;?>"><?php echo $curr_name=$rowstc->curr_name; ?></option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM currency order by curr_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['curr_id']; ?>"><?php echo $row['curr_name']; ?></option>
    <?php endwhile; ?>
    </select>

</br></br>Exchange Rate (To SSP) : <input disabled type="textbox" size="10" name="curr_rate" class="val3" value="<?php echo $rowsj->curr_rate;?>">
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
<td width="15%"><strong>Unit Cost (<span id="sub_cat2"><?php echo $curr_name;?></span>)<strong></td>
<td width="15%"><strong>Total Cost (<span id="sub_cat3"><?php echo $curr_name;?></span>)<strong></td>
<td width="15%"><strong>Edit<strong></td>
<td width="15%"><strong>Delete<strong></td>


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
		<?php $job_card_task_id=$rowsts->job_card_task_id;?>
		<input type="checkbox" checked name="job_card_task_id[]" value="<?php echo $rowsts->job_card_task_id;?>" style="display:none;">
		
		
		
		
		<?php 
 
$service_id=$rowsts->service_item_id;
$querytcs="select * from service_item where service_item_id='$service_id'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);

?>
		
		
		<select disabled name="service_item_id[]" style="width:150px;">
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
		
		?></select><a href="#"></a></td>
        <td width="10%"><input disabled type="textbox" size="30" name="remarks[]" value="<?php echo $rowsts->description;?>"></td>   
		<td width="10%"><input disabled type="textbox" size="20" name="start_from[]" value="<?php echo $rowsts->start_from;?>"></td> 
		   <td>
                <input disabled name="quantity[]" class="val1" size="10" value="<?php echo $quantity=$rowsts->quantity;?>"/>
            </td>
            <td>
                <input disabled name="unit_cost[]" class="val2" size="20" value="<?php echo $unit_cost=$rowsts->unit_cost;?>"/>
            </td>
            <td>
                   <strong> <span class="multTotal"><?php echo $amount=$quantity*$unit_cost; 
				   $task_totals=$task_totals+$amount;
				   
				   
				   ?></span><strong>
            </td>
			<td><!--<a rel="facebox" href="edit_job_card_item.php?job_card_task_id=<?php echo $job_card_task_id;?>&job_card_id=<?php echo $get_job_card_id;?>"><img src="images/edit.png"></a>--></td></td>
			<td><!--<img src="images/delete.png">--></td>
        </tr>
<?php 
}}

?>		
		
		
<tr height="30"><td colspan="8"></td></tr>		
		
		
		
	  
	  
	  
	  
	  
	  
            <tr height="60" bgcolor="#CCCCCC">

    <td  colspan="8" height="40" align="center">
       <strong><font  color="#000000"> Grand Total (<span id="sub_cat23"><?php echo $rowstc->curr_name; ?></span>): </strong><span id="grandTotal"><?php echo $task_totals; ?></span></font>
	  
	    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Discount Value : <?php  $disc=$rowsj->discount;
	   
	echo  number_format($disc_value=$disc/100*$task_totals,2);
	
	   	   
	   ?>
	   
	  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Discounted Amount : <?php echo number_format($grand_ttl=$discounted_amount=$task_totals-$disc_value,2) ;?> 
	   
	   
	   <?php 
	   $query1pd="select SUM(amount_received) as ttl_amnt from invoice_payments WHERE sales_code_id='$get_job_card_id'"; 
	   $results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
	   $rowspd=mysql_fetch_object($results1pd);
	   
	   
	   ?>
	    
	   &nbsp;&nbsp;&nbsp;<strong><font  color="#339933"> Amount Paid : </strong><span id="grandTotal"><?php echo $ttl_amount_paid=$rowspd->ttl_amnt.'  '; ?></span></font>&nbsp;&nbsp;
	   &nbsp;&nbsp;<strong><font color="#ff0000"> Balance: </strong><span id="grandTotal"><?php echo $balance=$grand_ttl-$ttl_amount_paid; ?></span></font>

	   
	   
	   <br/> <br/>
	   
	  <!-- &nbsp;&nbsp;<strong><font color="#000000">  Amount Paid : </strong><input name="amount_paid" class="val4" size="20" />
	  <strong>Date Paid  : </strong><input type="text" name="date_paid" size="20" id="date_paid" readonly="readonly" /> 
	 <strong> Balance Payment Date: </strong><input type="text" name="bal_date" size="10" id="bal_date"  value="<?php echo $rowsj->bal_date;?>"/> 
    -->
	<?php

$invoice_id=$get_job_card_id;	

$customer_amnt1=$grand_ttl*$curr_rate;
$customer_amnt2=$ttl_amount_paid*$curr_rate;
$grnd_ttl_kshs=$grnd_ttl*$curr_rate;


/* $transaction_descinv='Credit Sales Inv No:'.$invoice_no;	
$transaction_desc='Credit Sales To '.$c_name.' Invoice: '.$invoice_no;	
$transaction_desclg='Amount Paid Upon Invoice Generation '.$invoice_no; */

$transaction_descinv='Sales Inv No:'.$get_job_card_id;	
$transaction_desc='Sales Inv No:'.$get_job_card_id.' To '.$c_name;
$transaction_desc_paid='Advance Payment for Job card/Invoice:'.$get_job_card_id.' To '.$c_name;

$customer_ttl=$grand_ttl*$curr_rate;

//update customer transactions
/*$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_descinv','$grand_ttl',NOW(),'inv$invoice_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());*/
$sqlprof="select * from customer_transactions where transaction_code='inv$get_job_card_id'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{
$sqltrans="update customer_transactions SET 
customer_id='$customer_id',
transaction_date='$start_date',
amount='$customer_amnt1',
transaction='$transaction_descinv'
where transaction_code='inv$invoice_id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltranslg= "UPDATE accounts_receivables_ledger SET
transactions='$transaction_descinv',
date_recorded='$start_date',
amount='$grand_ttl',
debit='$grand_ttl',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='inv$invoice_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


if ($customer_amnt2==0)
{
}
else
{
$sqltrans="update customer_transactions SET 
customer_id='$customer_id',
transaction_date='$start_date',
amount='-$customer_amnt2',
transaction='$transaction_desc_paid'
where transaction_code='adv$invoice_id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltranslg= "UPDATE accounts_receivables_ledger SET
transactions='$transaction_descinv',
amount='-$ttl_amount_paid',
credit='$ttl_amount_paid',
currency_code='$currency',
date_recorded='$start_date',
curr_rate='$curr_rate'

WHERE sales_code='adv$invoice_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE accounts_receivables_ledger SET
transactions='$transaction_desc_paid',
amount='-$ttl_amount_paid',
credit='$ttl_amount_paid',
currency_code='$currency',
date_recorded='$start_date',
curr_rate='$curr_rate'
WHERE sales_code='adv$invoice_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE cash_ledger SET
transactions='$transaction_desc_paid',
amount='$ttl_amount_paid',
debit='$ttl_amount_paid',
currency_code='$currency',
date_recorded='$start_date',
curr_rate='$curr_rate'
WHERE sales_code='adv$invoice_id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}

}
else
{

$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_descinv','$customer_amnt1','$start_date','inv$invoice_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc','$grand_ttl','$grand_ttl','','$currency','$curr_rate','$start_date','inv$invoice_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','$transaction_desc','$grand_ttl','','$grand_ttl','$currency','$curr_rate','$start_date','inv$invoice_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

if ($customer_amnt2==0)
{
}
else
{
$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_desc_paid','-$customer_amnt2',NOW(),'adv$invoice_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc_paid','-$ttl_amount_paid','','$ttl_amount_paid','$currency','$curr_rate','$start_date','avd$invoice_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$transaction_desc_paid','$ttl_amount_paid','$ttl_amount_paid','','$currency','$curr_rate','$start_date','avd$invoice_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
}

}





	?>
	
	
	
	
	
	
	</td>

</tr>	

<tr bgcolor="#cccccc" height="50"><td colspan="8" align="center">


<!--<input type="submit" name="submit" value="Approve And Go To Next Invoice>>" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:400px; height:30px; border-radius:5px;">
	<input type="hidden" name="update_job_card" id="update_job_card" value="1">&nbsp;&nbsp;-->
<p align="center" style="background:#2E3192; font-size:14px; margin:auto; color:#ffffff; font-weight:bold; width:200px; height:20px; border-radius:5px;">
<a  style="color:#ffffff; font-weight:bold;"  href="process_approve_invoice.php?job_card_id=<?php echo $get_job_card_id; ?>" onClick="return confirmApprove();">Approve This Job Card Sales</a>
</p>	
	
	</td></tr>

 
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
	
	
</br></br>
<strong>Remarks: </strong><br/>
 <textarea rows="5" cols="30" name="gen_remarks"><?php echo $rowsj->general_remarks; ?></textarea>	
	
</td>





</tr>

 
	
	
	
</table>
</form>
<script type="text/javascript">
  /* Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_paid"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "bal_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "bal_date"       // ID of the button
    }
  );
  
   */
  
  
  </script>


</td></tr>





