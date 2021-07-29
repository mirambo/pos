<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');


$order_code=mysql_real_escape_string($_POST['order_code']);
$sales_id=$order_code;


$sqltemp="select * FROM sales WHERE sales_id='$sales_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);

$date_from=$rowstemp->sale_date;

$lpo_no1=$rowstemp->invoice_no;

$currency=7;
$curr_rate=1;


foreach($_POST['countryname'] as $row=>$CountryName)

{
	
$prod=mysql_real_escape_string($_POST['country_no'][$row]);

$queryprofc="select * from items where item_id='$prod'";
$resultsprofc=mysql_query($queryprofc) or die ("Error: $queryprofc.".mysql_error());
$rowsprofc=mysql_fetch_object($resultsprofc);
$curr_bp=$rowsprofc->curr_bp;
$product_name=$rowsprofc->item_name;

$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$qnty1=number_format($qnty,0);



$queryprofx2="select * from received_stock_batch where product_id='$prod' and sold='0' order by expiry_date desc limit $qnty1";
$resultsprofx2=mysql_query($queryprofx2) or die ("Error: $queryprofx2.".mysql_error());
$rowsprfx2=mysql_fetch_object($resultsprofx2);
$batch_number=$rowsprfx2->batch_number;

$batch_id2=$rowsprfx2->received_stock_id;
$exp_date=$rowsprfx2->expiry_date;
$man_date=$rowsprfx2->man_date;
$batch_no=$rowsprfx2->batch_number;


$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);


$price_cost=$vend_price*$qnty;
$purchase_cost=$curr_bp*$qnty;

$sql= "insert into sales_item values('','$sales_id','$shop_id','$prod','$qnty','$man_date','$exp_date','$batch_no','$vend_price','$user_id',NOW(),'','$curr_bp')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_received_stock_id=mysql_insert_id();


$memo2='Cash Sales <a href="generate_cash_sales.php?sales_id='.$sales_id.'">Receipt No:'.$lpo_no1.'</a> whose cost is '.$curr_bp.' each';



/* $sqlaccpay="insert into inventory_ledger values('','Sold $qnty $product_name though $memo2','-$purchase_cost','','$purchase_cost','$currency','$curr_rate','$date_from','sls$latest_received_stock_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into item_transactions values('','$latest_received_stock_id','Sold $qnty $product_name though $memo2','-$qnty','$date_from','$day','$month','$year','sls$latest_received_stock_id',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */


$queryprofx="select * from received_stock_batch where product_id='$prod' and sold='0' order by delivery_date asc limit $qnty1";
$resultsprofx=mysql_query($queryprofx) or die ("Error: $queryprofx.".mysql_error());
//$rowsprf=mysql_fetch_object($resultsprofx);
// $rowsprf->batch_number;

 while ($rowsprofx=mysql_fetch_object($resultsprofx))
{

$batch_id=$rowsprofx->received_stock_id;


$sqllpono="UPDATE received_stock_batch set sold='1' where received_stock_id='$batch_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());

	
//echo '</br>';
	
}

}


if ($results)
{
?>
 <script language="Javascript">

 function redirectToFB(){
            window.opener.location.href="generate_cash_sales.php?sales_id=<?php echo $order_code; ?>";
            setTimeout("self.close()", 100);
        }

    </script>
	</br></br></br></br></br></br></br></br>
<p align="center" style="height:150px;" ><input type="submit" name="submit" value="CLICK HERE TO CLOSE THIS WINDOW" OnClick="redirectToFB()" style="background:#2E3192; top:150px; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

<?php
}



mysql_close($cnn);

?>


