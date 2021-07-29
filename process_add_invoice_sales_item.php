<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$order_code=mysql_real_escape_string($_POST['order_code']);
$sales_id=$order_code;

$sqltemp="select * FROM sales WHERE sales_id='$sales_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);

$lpo_no1=$rowstemp->invoice_no;

$currency=$rowstemp->currency;
$curr_rate=$rowstemp->curr_rate;


foreach($_POST['countryname'] as $row=>$CountryName)
{
	
$prod=mysql_real_escape_string($_POST['country_no'][$row]);


$queryprofc="select * from items where item_id='$prod'";
$resultsprofc=mysql_query($queryprofc) or die ("Error: $queryprofc.".mysql_error());
$rowsprofc=mysql_fetch_object($resultsprofc);

$curr_bp=$rowsprofc->curr_bp;
$product_name=$rowsprofc->item_name;
$vat_status=$rowsprofc->vat_status;

$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$qnty1=number_format($qnty,0);



$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);

$price_cost=$vend_price*$qnty;
$purchase_cost=$curr_bp*$qnty;


//vat calculations
$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;

$vat_perc=$vat_set_perc/100;

if ($vat_status==0)
{
	
$vat_value=0;	
}
else
{

$vat_value=$qnty*$vend_price*$vat_perc;	
	
}

$memo2='Invoice Sales <a href="generate_invoice.php?sales_id='.$sales_id.'">Invoice No:'.$lpo_no1.'</a> whose cost is '.$curr_bp.' each';


/* $sql= "insert into sales_item values('','$sales_id','$shop_id','$prod','$qnty','$man_date','$exp_date','$batch_no','$vend_price','$user_id',NOW(),'','$curr_bp','$vat_value')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$latest_received_stock_id=mysql_insert_id(); */


$sqltrans2t="INSERT INTO sales_item SET 
sales_id='$sales_id',
shop_id='$discount',
item_id='$prod',
item_quantity='$qnty',
item_cost='$vend_price',
vat_value='$vat_value'";
$resultstrans2t=mysql_query($sqltrans2t) or die ("Error $sqltrans2t.".mysql_error());	




	
}




if ($resultstrans2t)
{
?>
 <script language="Javascript">

 function redirectToFB(){
            window.opener.location.href="generate_invoice.php?sales_id=<?php echo $order_code; ?>";
            setTimeout("self.close()", 100);
        }

    </script>
	</br></br></br></br></br></br></br></br>
<p align="center" style="height:150px;" ><input type="submit" name="submit" value="CLICK HERE TO CLOSE THIS WINDOW" OnClick="redirectToFB()" style="background:#2E3192; top:150px; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

<?php
}



mysql_close($cnn);

?>


