<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
//$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];

$sqlj= "SELECT * FROM job_cards WHERE job_card_id='$job_card_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);

$sale_type=$rowsj->sale_type;

if ($sale_type=='cr')
{
$action='print_job_card.php';
}
if ($sale_type=='cs')
{
$action='print_receipt.php';
}

?>
<form name="new_machine_category" action="<?php echo $action;?>?job_card_id=<?php echo $job_card_id;?>" method="post">			
<table border="1" class="table" width="100%">
<tr><td colspan="3" align="center" bgcolor="#FF9900"><strong>Select Which Payment Receipt To Print</strong></td></tr>
<tr>
<td align="center"><strong>Choose<strong></td>
<td align="center"><strong>Date Paid<strong></td>
<td align="center"><strong>Amount Paid</strong></td>

</tr>

<?php 
$query1pd="select * from invoice_payments where sales_code_id='$job_card_id' order by invoice_payment_id asc"; 
$results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
if ($invnum_rows=mysql_num_rows($results1pd)>0) { while ($rows1pd=mysql_fetch_object($results1pd)) 
{ ?>

<tr>

<input style="display:none;" type="checkbox" checked name="invoice_payment_id[]" value="<?php echo $invoice_payment_id=$rows1pd->invoice_payment_id;?>">
<?php  $invoice_payment_id=$rows1pd->invoice_payment_id; ?>
<td><input type="radio" checked name="invoice_payment" value="<?php echo $invoice_payment_id=$rows1pd->invoice_payment_id;?>">

</td>
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
<tr><td align="right"><strong>Total Paid</strong></td><td align="right" colspan="2"><strong><?php echo $ttl_amnt_rec; ?><strong></td></tr>


<tr height="40"><td align="center" colspan="3">
<input type="submit" value="Print Now"   style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;">

</td></tr>



<?php
}
else
{ ?>
<tr><td colspan="2">No Payment received!!</td></tr>

<?php
}

 ?>
 
 
 
</table>


</form>



			
			
			
			