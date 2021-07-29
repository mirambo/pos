<?php 
$sqlrec="SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$customer_id=$rowsrec->customer_id;
$curr_rate=$rowsrec->curr_rate;
$general_remarks=$rowsrec->general_remarks;
$sales_rep=$rowsrec->sales_rep; 
$delivery_address=$rowsrec->delivery_address;
$delivered_by=$rowsrec->delivered_by;
$canceled_status=$rowsrec->canceled_status;

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


?>

<Script Language="JavaScript">

function load() {
var load = window.open('add_cash_sales_item.php?sales_id=<?php echo $sales_id; ?>','','scrollbars=no,menubar=no,height=300,width=800,resizable=yes,toolbar=no,location=no,status=no');
}

</Script>

<!--<script src="jquery.min.js"></script>
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
<script src="js/application.js" type="text/javascript" charset="utf-8"></script> -->


	<h3 align="center">View Cash Sales Details
	
	<?php 
	/* if ($status==2)
	{ */
	
	?>
	<!--<a style="float:right; margin-right:200px;" target="_blank" href="print_invoice.php?sales_id=<?php echo $sales_id;?>&cash=1">-->
	<a style="float:right; margin-right:200px;" target="_blank" href="cash_sales_receipt.php?sales_id=<?php echo $sales_id;?>&cash=1">
	
	Print Receipt
	
	
	</a>
	
	<a style="float:right; margin-right:50px;" href="print_invoice_excel.php?sales_id=<?php echo $sales_id; ?>&cash=1">
	
	<!--Export To Excel-->
	
	
	</a>
	<?php
/* }
if ($status==0)
{ */?>
<span style="float:right; margin-right:200px; color:#ff0000; font-size:11px;"><!--Can Only be printed after approval--></span>
<?php


//}

	?>
	
	
	</h3>
	
	
	
<table width="90%" border="0" align="center">

<tr><td colspan="7" bgcolor="#FFFFCC" align="center">



<strong>

Receipt No : </strong><i><?php echo $lpo_no;  ?></i>
<strong>Customer Name : </strong><i><?php echo $customer_name;  ?></i>
	
	
	
	<strong>Sales Date :</strong><i><?php echo $sales_date; ?></i>
	
	<strong>Discount: </strong><i><?php echo $discount.'%';  ?></i>
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
	
	if ($canceled_status==1)
{
}
else
{

	?>
	
	<img src="images/edit.png">
	
<?php
} 
}
else
{}	

?>	
	</a>
	
		
		
	
	

</td></tr>
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:15px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Record Created Successfully!!</font></strong></p></div>';

if ($_GET['addtaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More task added successfully!!</font></strong></p></div>';


if ($_GET['editaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Updated Successfully!!</font></strong></p></div>';

if ($_GET['deletetaskconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Deleted Successfully!!</font></strong></p></div>';


if ($_GET['editpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Items Updated Successfully!!</font></strong></p></div>';

if ($_GET['addpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Items Added Successfully!!</font></strong></p></div>';


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
<?php
if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td></tr>



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
<a title="Creating New Items That doesnt exist" style="color:#fff;font-weight:bold; float:right;"  href="javascript:load();"> 

<?php 
	
	$sess_allow_delete;
if ($sess_allow_delete==1)
{
	
	if ($canceled_status==1)
{
}
else
{

	?>
[ Add More Items ]

<?php 
}
}
else
{
	
	
}

?>

</a>
</td></tr>
<tr><td>
<table width="100%">

<tr>
<td align="center"><strong>Items Code</strong></td>
<td align="center"><strong>Items Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Price</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>Discount</strong></td>
<td align="center"><strong>Total</strong></td>
<td align="center"><strong>Edit</strong></td>
<td align="center"><strong>Delete</strong></td></tr>
<?php 
$task_totals=0;
$sqllpdet="select * FROM sales_item,items WHERE sales_item.item_id=items.item_id AND 
sales_item.sales_id='$sales_id' order by sales_item_id asc";
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
 
 
 ?>
<td ><?php echo $item_code=$rowslpdet->item_code; ?></td>
<td ><?php 

$batch_no=$rowslpdet->batch_no;
$man_date=$rowslpdet->man_date;
$expiry_date=$rowslpdet->expiry_date;


echo $product_name=$rowslpdet->item_name;


if ($batch_no=='')
{
	
}
else
{
//echo ' <i>(Batch No :'.$batch_no.') ';
}

if ($man_date=='0000-00-00')
{
	
}
else
{
//echo 'Mfg.Date : '.$rowslpdet->man_date;
}

if ($expiry_date=='0000-00-00')
{
	
}
else
{

//echo 'Exp. Date : '.$rowslpdet->expiry_date.'</i>';
}
$prod=$rowslpdet->item_id;


?></td>
<td ><?php echo $rowslpdet->item_quantity; $qnty=$rowslpdet->item_quantity;?></td>
<td align="right"><?php 
	
		
	
	echo number_format($item_cost=$rowslpdet->item_cost,2);
	
	$item_bp2=$rowslpdet->item_bp;

if ($item_bp2=='')
{
	
$item_bp=$rowslpdet->curr_bp;
}
else
{

$item_bp=$item_bp2;	
	
}
	

	?></td>
	
	
	<td align="right">
	
	<?php 
	echo number_format($amnt=$item_cost*$qnty,2);
	
	$amnt_bp=$item_bp*$qnty;

$latest_received_stock_id=$rowslpdet->sales_item_id;


if ($canceled_status==1)
{
	
$tr_code='cnsls'.$latest_received_stock_id;



$memo2='Cancel Cash Sale <a href="generate_cash_sales.php?sales_id='.$sales_id.'">Receipt No:'.$lpo_no.'</a> whose cost/BP is '.$item_bp.' each';

$sqlprofy="select * from inventory_ledger where order_code='$tr_code'";
$resultsprofy=mysql_query($sqlprofy) or die ("Error $sqlprofy.".mysql_error());
$numrowsprofy=mysql_num_rows($resultsprofy);
if ($numrowsprofy>0)	
{
	
$sqlaccpay="update inventory_ledger SET 
transactions='Canceled Sold Item $qnty $product_name though $memo2',
date_recorded='$sales_date',
amount='$amnt_bp',
debit='$amnt_bp'
where order_code='$tr_code'";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
	
}
else
{
	
$sqlaccpay="insert into inventory_ledger values('','Canceled Sold $qnty $product_name though $memo2','$amnt_bp','$amnt_bp','','$currency','$curr_rate','$sales_date','$tr_code','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}	
	
	
	
}
else
{	

$tr_code='sls'.$latest_received_stock_id;
$sqlprofy="select * from inventory_ledger where order_code='$tr_code'";
$resultsprofy=mysql_query($sqlprofy) or die ("Error $sqlprofy.".mysql_error());
$numrowsprofy=mysql_num_rows($resultsprofy);


$memo2='Cash Sales <a href="generate_cash_sales.php?sales_id='.$sales_id.'">Receipt No:'.$lpo_no.'</a> whose cost/BP is '.$item_bp.' each';

if ($numrowsprofy>0)	
{
	
$sqlaccpay="update inventory_ledger SET 
transactions='Sold $qnty $product_name though $memo2',
date_recorded='$sales_date',
amount='-$amnt_bp',
credit='$amnt_bp'
where order_code='$tr_code'";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
	
}
else
{
	
$sqlaccpay="insert into inventory_ledger values('','Sold $qnty $product_name though $memo2','-$amnt_bp','','$amnt_bp','$currency','$curr_rate','$sales_date','$tr_code','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}
}
	
	
	
	
	
	
	
	
	?>
	
	
	</td>
	
	<td>
	<?php 
	echo number_format($item_disc=$rowslpdet->shop_id,0);
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
<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	
	if ($canceled_status==1)
{
}
else
{


	?>

	<a rel="facebox" href="edit_sales_item.php?sales_item_id=<?php echo $rowslpdet->sales_item_id; ?>&sales_id=<?php echo $sales_id; ?>&cash=1"><img src="images/edit.png"></a>
	<?php
	
}
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?></td>
<td align="center">
<?php 
	
	$sess_allow_delete;
if ($sess_allow_delete==1)
{
	
	if ($canceled_status==1)
{
}
else
{

	?>
	

<a href="delete_sales_item.php?sales_id=<?php echo $sales_id; ?>&sales_item_id=<?php echo $rowslpdet->sales_item_id;?>&cash=1"><img src="images/delete.png" onClick="return confirmDelete();"></a>

<?php
}

}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
</td>
</tr>

<?php
$task_totals=$task_totals+$amnt;

$bp_totals=$bp_totals+$amnt_bp;
}
?>
<tr><td ></td>
<td></td>
<td align="right"><strong>Sub Total</strong></td>
<td align="right"><strong><?php echo number_format($task_totals,2); ?></strong></td>
<td ></td>
<td ></td>
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
<td align="right"><strong><?php echo number_format($grnd_ttl=$sub_ttl1+$vat_value,2); 

$grand_ttl=$grnd_ttl;
$sqlst="SELECT * FROM  users,client_discount where client_discount.client_id=users.user_id and users.user_id='$sales_rep'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
$comm_perc=$rowst->comm_perc;

 $comm_amount=$comm_perc*$grnd_ttl/100;


$sqlprofcm="select * from commision_earned where sales_id='$sales_id'";
$resultsprofcm=mysql_query($sqlprofcm) or die ("Error $sqlprofcm.".mysql_error());
$numrowsprofcm=mysql_num_rows($resultsprofcm);

if ($numrowsprofcm>0)	
{
	
	$sqlcm= "UPDATE commision_earned set 
 	sales_rep='$sales_rep', 
 	amount_earned='$comm_amount', 
 	currency_code='$currency',  	
 	curr_rate='$curr_rate',  	
  	date_earned='$sales_date' WHERE sales_id='$sales_id'";
$resultscm= mysql_query($sqlcm) or die ("Error $sqlcm.".mysql_error());
	
}
else
{


$sqlcm= "INSERT INTO commision_earned set 
 	sales_rep='$sales_rep', 
 	amount_earned='$comm_amount', 
 	currency_code='$currency',  	
 	curr_rate='$curr_rate',  	
  	date_earned='$sales_date', 
  	sales_id='$sales_id'";
$resultscm= mysql_query($sqlcm) or die ("Error $sqlcm.".mysql_error());

}




?></strong></td>
<td ></td>
<td ></td>
</tr>

<?php 


}
else
{
?>
<tr><td align="center" colspan="10"><font color="#ff0000">No results found!!</font></td></tr>
<?php
}

?>




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
//canceled sales;
if ($canceled_status==1)	
{
	
	//$memo='Sold '.$qnty.' '.$product_name.' '.($item_code).' through invoice <a href="generate_invoice.php?sales_id='.$sales_id.'">Inv No:'.$sales_id.'</a>';
$memo2='Canceled Cash Sales <a href="generate_cash_sales.php?sales_id='.$invoice_id.'">Receipt No:'.$lpo_no.'</a>';
$memo2p='Canceled Cash Sales Payment <a href="generate_cash_sales.php?sales_id='.$invoice_id.'">Receipt No:'.$lpo_no.'</a>';
$date_dep=$sales_date;
$latest_id2=$sales_id;


$transaction_code="cncsh".$latest_id2;


///active invoice

$sqlprof="select * from customer_transactions where transaction_code='$transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{

$sqltrans1="update customer_transactions SET 
customer_id='$customer_id',
transaction_date='$sales_date',
amount='-$grand_ttl',
transaction='$memo2'
where transaction_code='$transaction_code' and amount>0";
$resultstrans1=mysql_query($sqltrans1) or die ("Error $sqltrans1.".mysql_error());


$sqltrans="update customer_transactions SET 
customer_id='$customer_id',
transaction_date='$sales_date',
amount='$$grand_ttl',
transaction='$memo2p'
where transaction_code='$transaction_code' and amount<0";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

// sales revenue
$sqltranslg= "UPDATE sales_ledger SET
transactions='$memo2',
date_recorded='$sales_date',
amount='-$grand_ttl',
debit='$grand_ttl',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

//update cos ledger
$sqltranslg= "UPDATE cost_of_production_ledger SET
transactions='$memo2',
date_recorded='$sales_date',
amount='-$bp_totals',
credit='$bp_totals',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqltranslg= "UPDATE cash_ledger SET
transactions='$memo2',
date_recorded='$sales_date',
amount='-$grand_ttl',
credit='$grand_ttl',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


}
else
{


$sqltrans= "insert into customer_transactions values('','$customer_id','$memo2','-$grand_ttl','$sales_date','$transaction_code','$shop_id','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error()); 


$sqltrans= "insert into customer_transactions values('','$customer_id','$memo2p','$grand_ttl','$sales_date','$transaction_code','$shop_id','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error()); 


$sqlaccpay= "insert into sales_ledger values('','$memo2','-$grnd_ttl','$grand_ttl','','$currency','$curr_rate','$sales_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cost_of_production_ledger values('','$memo2','-$bp_totals','','$bp_totals','$currency','$curr_rate','$sales_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$memo2','-$grand_ttl','','$grand_ttl','$currency','$curr_rate','$sales_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}
	
	
	
	
}
else
{
	
//$memo='Sold '.$qnty.' '.$product_name.' '.($item_code).' through invoice <a href="generate_invoice.php?sales_id='.$sales_id.'">Inv No:'.$sales_id.'</a>';
$memo2='Cash Sales <a href="generate_cash_sales.php?sales_id='.$invoice_id.'">Receipt No:'.$lpo_no.'</a>';
$memo2p='Cash Sales Payment <a href="generate_cash_sales.php?sales_id='.$invoice_id.'">Receipt No:'.$lpo_no.'</a>';
$date_dep=$sales_date;
$latest_id2=$sales_id;


$transaction_code="csh".$latest_id2;

///active invoice

$sqlprof="select * from customer_transactions where transaction_code='$transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{


$sqltrans1="update customer_transactions SET 
customer_id='$customer_id',
transaction_date='$sales_date',
amount='$grand_ttl',
transaction='$memo2'
where transaction_code='$transaction_code' and amount>0";
$resultstrans1=mysql_query($sqltrans1) or die ("Error $sqltrans1.".mysql_error());


$sqltrans="update customer_transactions SET 
customer_id='$customer_id',
transaction_date='$sales_date',
amount='-$grand_ttl',
transaction='$memo2p'
where transaction_code='$transaction_code' and amount<0";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

// sales revenue
$sqltranslg= "UPDATE sales_ledger SET
transactions='$memo2',
date_recorded='$sales_date',
amount='$grand_ttl',
credit='$grand_ttl',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

//update cos ledger
$sqltranslg= "UPDATE cost_of_production_ledger SET
transactions='$memo2',
date_recorded='$sales_date',
amount='$bp_totals',
debit='$bp_totals',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqltranslg= "UPDATE cash_ledger SET
transactions='$memo2',
date_recorded='$sales_date',
amount='$grand_ttl',
debit='$grand_ttl',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


}
else
{


$sqltrans= "insert into customer_transactions values('','$customer_id','$memo2','$grand_ttl','$sales_date','$transaction_code','$shop_id','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error()); 


$sqltrans= "insert into customer_transactions values('','$customer_id','$memo2p','-$grand_ttl','$sales_date','$transaction_code','$shop_id','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error()); 


$sqlaccpay= "insert into sales_ledger values('','$memo2','$grand_ttl','','$grand_ttl','$currency','$curr_rate','$start_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cost_of_production_ledger values('','$memo2','$bp_totals','$bp_totals','','$currency','$curr_rate','$sales_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$memo2','$grand_ttl','$grand_ttl','','$currency','$curr_rate','$sales_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}
}

 ?></font></strong></td>
<td ></td>
<td ></td>
</tr>







</td></tr>

</table>
</table>


<?php 

?>	

</table>