<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//Check redudancy

$leo=date('Y-m-d H:i:s', time());

$supplier_id=mysql_real_escape_string($_POST['supplier_id']);

$query1="select * from suppliers where supplier_id='$supplier_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;


$order_code_id=$_GET['order_code_id'];


$queryod="select * from order_code_get where order_code_id='$order_code_id'";
$resultsod=mysql_query($queryod) or die ("Error: $queryod.".mysql_error());
$rowsod=mysql_fetch_object($resultsod);
$shop_id=$rowsod->shop_id;
$currency=$rowsod->currency;
$curr_rate=$rowsod->curr_rate;
$order_no_lpo=$rowsod->lpo_no;
$ref_no_order=$rowsod->ref_no;

$delivery_date=mysql_real_escape_string($_POST['delivery_date']);
//$batch_no=mysql_real_escape_string($_POST['batch_no']);
$freight_charges=mysql_real_escape_string($_POST['freight_charges']);
//$curr_rate1=mysql_real_escape_string($_POST['curr_rate']);

/* $sql3p="INSERT INTO received_stock_code VALUES('','$order_code_id', '','$currency','$curr_rate','$delivery_date','$shop_id','$user_id','','')";
$results3p=mysql_query($sql3p) or die ("Error $sql3p.".mysql_error());  */



$sql3p="INSERT INTO received_stock_code SET
order_code_id='$order_code_id',
currency='$currency',
curr_rate='$curr_rate',
delivery_date='$delivery_date',
user_id='$user_id'" or die(mysql_error());
$results3p= mysql_query($sql3p) or die ("Error $sql3p.".mysql_error());
$order_code=mysql_insert_id();



/* $queryprof="select * from received_stock_code order by stock_code_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof); */


//$order_code=$rowsprof->stock_code_id;
$tempnum=$order_code;
$year=date('Y');

if($tempnum < 10)
            {
              $lpo_no = "0000".$tempnum;
              //$lpo_no = $client_abrev.'/'.$month."/0000".$tempnum;
			   //echo $newnum;
			  
			  
            } 
			
			else if($tempnum < 100) 
			{
             $lpo_no = "000".$tempnum;
			 
			 //echo $newnum;
            } 
			
			else if($tempnum < 1000) 
			{
             $lpo_no = "00".$tempnum;
			 
			 //echo $newnum;
            }
			
						else if($tempnum < 10000) 
			{
             $lpo_no = "0".$tempnum;
			 
			 //echo $newnum;
            }
			
			
			else 
			{ 
			$lpo_no = $tempnum;
			
			//echo $newnum;
			}


$sqllpono="UPDATE received_stock_code set delivery_note_no='$lpo_no' where stock_code_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

$date_dep=$delivery_date;


$sqlvp="select * FROM purchase_order,items WHERE purchase_order.product_id=items.item_id AND 
purchase_order.order_code='$order_code_id' AND purchase_order.product_id='$prod'";
$resultsvp= mysql_query($sqlvp) or die ("Error $sqlvp.".mysql_error());
$rowsvp=mysql_fetch_object($resultsvp);
$vendor_prc=$rowsvp->vendor_prc;


foreach($_POST['prod'] as $row=>$Prod)
{
//$remarks=mysql_real_escape_string($_POST['remarks_id']);
$prod=mysql_real_escape_string($_POST['prod'][$row]);

$post_purchase_order_id=mysql_real_escape_string($_POST['post_purchase_order_id'][$row]);



//calculate item_avalability


//1. Quanity received
$sql="select SUM(quantity) as ttl_quant from item_transactions 
where item_id='$prod'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$avail_prod=$rows->ttl_quant;



$qnty_rec=mysql_real_escape_string($_POST['qnty_rec'][$row]);
$expiry_date=mysql_real_escape_string($_POST['expiry_date'][$row]);
$man_date=mysql_real_escape_string($_POST['man_date'][$row]);
$batch_no=mysql_real_escape_string($_POST['batch_no'][$row]);


/* $sqlvp="select * FROM purchase_order where purchase_order_id='$post_purchase_order_id'";
$resultsvp= mysql_query($sqlvp) or die ("Error $sqlvp.".mysql_error());
$rowsvp=mysql_fetch_object($resultsvp);
$vendor_prc=$rowsvp->vendor_prc; */



$query11="select * from items where item_id='$prod'";
$results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
$rows11=mysql_fetch_object($results11);

$product_name=$rows11->item_name;
$pack_size=$rows11->pack_size;
$curr_bp=$rows11->curr_bp;

//get vend price
$querylatelpo="select * from purchase_order where purchase_order_id='$post_purchase_order_id'";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
$vend_price=$rowslatelpo->vendor_prc;


$ttl1=$avail_prod*$curr_bp;
$ttl2=$qnty_rec*$vend_price;
$ttl3=$ttl1+$ttl2;
$quant_sum=$avail_prod+$qnty_rec;


$purchase_cost=$vendor_prc*$qnty_rec;


if ($qnty_rec==0 || $qnty_rec=='')
{
	
}
else
{

/* $sql3="INSERT INTO received_stock VALUES('','$order_code_id','$order_code','$prod','$qnty_rec','$currency','$curr_rate','$delivery_date',
'$man_date','$expiry_date','1',NOW(),'$user_id','$batch_no')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());
$latest_received_stock_id=$rowslatelpo->received_stock_id; */


$sql3="INSERT INTO received_stock SET
order_code_id='$order_code_id',
purchase_order_id='$post_purchase_order_id',
stock_code_id='$order_code',
product_id='$prod',
status='1',
quantity_rec='$qnty_rec',
currency_code='$currency',
curr_rate='$curr_rate',
delivery_date='$delivery_date',
man_date='$man_date',
date_received='$leo'" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
$latest_received_stock_id=mysql_insert_id();

$orderdate = explode('-', $delivery_date);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="recitem".$latest_received_stock_id;

$memo='Received <a href="begin_order.php?order_code='.$order_code_id.'">'.$qnty_rec.' '.$product_name.' of LPO No: '.$order_no_lpo.' Ref No : '.$ref_no_order.'</a> into the store';


$sqlaccpay= "insert into item_transactions values('','$prod','$memo','$qnty_rec','$delivery_date','$day','$month','$year','$transaction_code',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



$query11p="UPDATE items SET curr_bp='$vend_price' where item_id='$prod'";
$results11p=mysql_query($query11p) or die ("Error: $query11p.".mysql_error());
$rows11p=mysql_fetch_object($results11p);




$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Received $qnty_rec $product_name into the warehouse')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

}







}


?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "receive_stock.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);


?>


