<?php 
include('includes/session.php'); 
include('Connections/fundmaster.php'); 
 $sales_id=$_GET['sales_id'];
 $order_code=$_GET['order_code'];
 
 $sqlrec="SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$customer_id=$rowsrec->customer_id;
$curr_rate=$rowsrec->curr_rate;
$general_remarks=$rowsrec->general_remarks;
$salesrep_id=$rowsrec->sales_rep; 
$delivery_address=$rowsrec->delivery_address;
$delivered_by=$rowsrec->delivered_by;


$shop_id=$rowsrec->shop_id;
$orig_shop_id=$_GET['orig_shop_id'];

$queryshp="select * from account where account_id='$shop_id'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$shop_name=$rowshp->account_name;


$querytcsp="select * from customer where customer_id='$customer_id'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);
$customer_name=$rowstcsp->customer_name;
$region_id=$rowstcsp->region_id;


$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->invoice_no;
$currency=$rowsrec->currency;
$discount=$rowsrec->discount;
$vat=$rowsrec->vat;
$sales_date=$rowsrec->sale_date;
$order_no=$rowsrec->order_no;

$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$curr_name=$rowstcs->curr_name;
/* $curr_rate=$rowsrec->curr_rate;
$status=$rowsrec->status; */


$sqlrec="SELECT * FROM invoice_payments WHERE sales_id='$sales_id' and receipt_no=''";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
 $mop=$rowsrec->mop;

/* $querymop="select * from mop where mop_id='$mop'";
$resultsmop=mysql_query($querymop) or die ("Error: $querymop.".mysql_error());								  
$rowsmop=mysql_fetch_object($resultsmop);
$mop_name=$rowsmop->mop_name; */


$invoice_id=$sales_id;





$queryshp="select * from users where user_id='$sales_rep'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$sales_rep_name=$rowshp->f_name;

$queryprof1="select * from client_discount where client_id='$sales_rep'";
$resultsprof1=mysql_query($queryprof1) or die ("Error: $queryprof1.".mysql_error());
$rowsprof1=mysql_fetch_object($resultsprof1);
$com_perc=$rowsprof1->comm_perc;

 $sess_allow_view;
if ($sess_allow_add==0 && $sales_id=='')
{

?>

<script type="text/javascript">
alert('Not Allowed');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
	
<?php
} 
else
{

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>


<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete this item from the lpo?");
}

function confirmDeleteItem()
{
    return confirm("Are you sure want to delete a part from the job card?");
}

function confirmDeleteBelong()
{
    return confirm("Are you sure want to delete a customer belonging from this job card?");
}

</script>
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

<script type="text/javascript" src="jquery.js"></script>	
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#customer_id").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_delivery.php?parent_cat=' + $(this).val(), function(data) {
    $("#sub_cat").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    
    });
	
    </script>	



<script src="jquery.min.js"></script>




    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />    
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	

	
	
	
	
 
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>



<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/sales_return_submenu.php');  ?>
		
		<h3>::  Generate CRedit Note (Sales Returns)</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">			
	
<form name="start_order" action="process_sales_returns.php" method="post">	
<?php 
if ($order_code!=0)
{
include('view_sales_returns_details.php');
?>

<?php
}
else
{
?>

<h3 align="center">Credit Note Details</h3>
	
	
	
<div style="width:99%; height:160px; margin:auto;background:#FFFFCC;">
	
	<table width="90%" border="0" align="center">

<tr><td colspan="7" bgcolor="#FFFFCC" align="center">



<strong>

Invoice No : </strong><i><?php echo $lpo_no;  ?></i>
<strong>Customer Name : </strong><i><?php echo $customer_name;  ?></i>
	
	
	
	<strong>Sales Date :</strong><i><?php echo $sales_date; ?></i>
	
	<!--<strong>Discount: </strong><i><?php echo $discount;  ?></i>-->
	<strong>VAT (16%): </strong><i><?php  $vat;  
	

 
 if ($vat==1)
 {
 echo "Yes";
 }
 else
 {
 echo "No";
 }
 


	
	
	?></i>
	</br>

	
	<strong>Order No : </strong><i><?php echo $order_no; ?></i> 
	<strong>Terms : </strong><i><?php echo $general_remarks;  ?></i> 
	
	
	
	<strong>Sales Reps : </strong><i><?php echo $sales_rep_name.' (Commission '.$com_perc.'%)'; ?>
	
	
	<strong>Delivery Address : </strong><i><?php echo $delivery_address;  ?></i> 
	
	<strong>Delivery Done By : </strong><i><?php echo $delivered_by;  ?></i> 
	
<a rel="facebox" href="edit_sales.php?sales_id=<?php echo $sales_id;?>">
	
	<?php 
	
	$sess_allow_delete;
if ($sess_allow_delete==1)
{

	?>

	
<?php
} 
else
{}	

?>	
	</a>
		
		
	
	

</td></tr>

<tr height="30"><td colspan="10" align="center">

Sales Returns Date<input type="text" name="date_from" size="20" value="<?php echo date('Y-m-d'); ?>" id="date_from" readonly="readonly" />
<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
<input type="text" name="orig_sales_id" value="<?php echo $sales_id; ?>">
</td></tr>


<!--<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><a style="font-weight:bold; color:#ff0000;" href="home.php?areareport=areareport&booking_id=<?php echo $booking_id; ?>">!!!!!Click Here To Add More Parts!!!!</a></td></tr>-->



<tr height="50" bgcolor="#FFFFCC">
<td valign="top" height="200" width="50%">
<table width="100%" border="1" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Items Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_lpo_item.php?order_code=<?php echo $order_code; ?>">


<?php 
	
	?>
<!--Add More Item..-->
<?php 

?>

</a>



</td></tr>
<tr><td>
<table width="100%">

<tr>
<td align="center"><strong>#</strong></td>
<td align="center"><strong>Items Code</strong></td>
<td align="center"><strong>Items Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Price</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>Discount</strong></td>
<td align="center"><strong>Total</strong></td>
<td align="center"><strong>Discounted Price</strong></td>

<?php 
$task_totals=0;
$sqllpdet="select * FROM sales_item,items WHERE sales_item.item_id=items.item_id AND 
sales_item.sales_id='$sales_id' order by sales_item_id desc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
if (mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
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
 
$item_id=$rowslpdet->item_id;
 
 ?>
<td ><input type="checkbox" checked name="prod[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>"></td>
<td ><?php echo $item_code=$rowslpdet->item_code; ?></td>
<td >
<?php 

$batch_no=$rowslpdet->batch_no;
$man_date=$rowslpdet->man_date;
$expiry_date=$rowslpdet->expiry_date;

echo $product_name=$rowslpdet->item_name;

if ($batch_no=='')
{
	
}
else
{
echo ' <i>(Batch No :'.$batch_no.') ';
}

if ($man_date='0000-00-00')
{
	
}
else
{
echo 'Mfg.Date : '.$rowslpdet->man_date;
}

if ($expiry_date='0000-00-00')
{
	
}
else
{

echo 'Exp. Date : '.$rowslpdet->expiry_date.'</i>';
}
$prod=$rowslpdet->item_id;


?>



</td>
<td ><?php $rowslpdet->item_quantity; $qnty=$rowslpdet->item_quantity;?>



<input type="text" name="qnty[<?php echo $item_id; ?>]" size="10" value="<?php echo $rowslpdet->item_quantity;  ?>">

</td>
<td align="right"><?php 
	
		
	
	echo number_format($item_cost=$rowslpdet->item_cost,2);
	

	?>
	
	
	</td>
	
	
	<td align="right">
	
	<?php 
	echo number_format($amnt=$item_cost*$qnty,2);
	
		
	
	
	
	
	
	
	?>
	
	
	</td>
	<td>
	<?php 
	echo number_format($item_disc=$rowslpdet->shop_id,2);
	echo '%';
	

	?>
	<span style="float:right;"> <?php 
	
	echo number_format($item_disc_value=$item_disc*$amnt/100,2);
	
	
$disc_value=$disc_value+$item_disc_value;
	
	?></span>
	
	</td>
	<td>
	<?php 
	
	echo number_format($amntx=$amnt-$item_disc_value,2);
	
	?>
	
	</td>
	<td>
	<?php

$new_desc=100-$item_disc;

$dsc_price2=$new_desc*$item_cost/100;

if ($vat==1)
{
$dsc_price=1.16*$dsc_price2;
}
else
{
$dsc_price=$dsc_price2;
	
}


$item_bp2=$rowslpdet->item_bp;

if ($item_bp2=='')
{
	
$item_bp=$rowslpdet->curr_bp;
}
else
{

$item_bp=$item_bp2;	
	
}

	?>
	
<input type="text" name="vend_price[<?php echo $item_id; ?>]" readonly size="10" value="<?php echo $dsc_price; ?>">
<input type="text" name="curr_bp[<?php echo $item_id; ?>]" readonly size="10" value="<?php echo $rowslpdet->item_bp; ?>">
	</td>

</tr>

<?php
$task_totals=$task_totals+$amnt;
}
?>
<tr><td ></td>
<td></td>
<td align="right"><strong>Sub Total</strong></td>
<td align="right"><strong><?php echo number_format($task_totals,2); ?></strong></td>
<td ></td>
<td ></td>
<td colspan="3" rowspan="6" align="center">

<input type="submit" name="submit" onClick="return confirmSave();" value="Save Sales Returns Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;">
	

</td>

</tr>

<tr><td ></td>
<td></td>
<td align="right"><strong>Discount</strong></td>
<td align="right"><strong><?php 



echo number_format($disc_value,2); ?></strong></td>
<td ></td>
<td ></td>
</tr>

<tr><td ></td>
<td></td>
<td align="right"><strong>Sub Total 1</strong></td>
<td align="right"><strong><?php  number_format($sub_ttl1=$task_totals-$disc_value,2); 

if ($vat==1)
{
//$sub_ttl_vat=$sub_ttl1*0.862;

$vat_value=0.16*$sub_ttl1;

}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 


echo number_format($sub_ttl1,2)

?></strong></td>
<td ></td>
<td ></td>
</tr>

<tr><td ></td>
<td></td>
<td align="right"><strong>VAT (16%)</strong></td>
<td align="right"><strong><?php echo number_format($vat_value,2); ?></strong></td>
<td ></td>
<td ></td>
</tr>


<tr><td ></td>
<td></td>
<td align="right"><strong>Grand Total</strong></td>
<td align="right"><strong><?php echo number_format($grnd_ttl=$sub_ttl1+$vat_value,2); ?></strong></td>
<td ></td>
<td ></td>
</tr>




<tr><td ></td>
<td></td>
<td align="right"><strong>Balance</strong></td>
<td align="right"><strong><font color="#ff0000" size="+1"><?php

$bal=$grnd_ttl-$amount_received;

 //echo number_format($grnd_ttl=$sub_ttl_vat+$vat_value,2); 
 
/* $sqlrec="SELECT * FROM invoice_payments WHERE sales_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);*/

echo number_format($bal,2); 




 ?></font></strong></td>
<td ></td>
<td ></td>
</tr>




<?php 


}
else
{
?>
<tr><td align="center" colspan="4"><font color="#ff0000">No task created!!</font></td></tr>
<?php
}

?>


</td></tr>

</table>
</table>


<?php 

?>	

</table>		
			
			
			
			
			
	<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
  
  
  </script>		
			
				
			  </div>
				
	<?php 
}	
	?>			<!--<div id="cont-right" class="br-5">
					
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
<?php 
}
?>
</html>