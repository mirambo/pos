<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

//Check redudancy
$requisition_id=mysql_real_escape_string($_POST['requisition_id']);
$prod=mysql_real_escape_string($_POST['prod']);
$qnty_rec=mysql_real_escape_string($_POST['qnty_rec']);
$delivery_date=mysql_real_escape_string($_POST['delivery_date']);
$rec_person=mysql_real_escape_string($_POST['rec_person']);

$sqlredx="SELECT * from requisition_item,items where requisition_item.item_id=items.item_id AND requisition_item.requisition_id='$requisition_id' and requisition_item.item_id='$prod'";
$resultsredx= mysql_query($sqlredx) or die ("Error $sqlredx.".mysql_error());
$rowsredx=mysql_fetch_object($resultsredx);
$job_card_id=$rowsredx->job_card_id;
$booking_id=$rowsredx->booking_id;
$qnty_ordered=$rowsredx->item_quantity;

$sqlord1="select SUM(released_quantity) as ttl_quant_rec from released_item where item_id='$prod' and requisition_id='$requisition_id'";
$resultsord1= mysql_query($sqlord1) or die ("Error $sqlord1.".mysql_error());
$rowsord1=mysql_fetch_object($resultsord1);
$qnty_rel=$rowsord1->ttl_quant_rec;

$qnty_ordered=$qnty_ordered-$qnty_rel;
//get total of quantity received
$sqlprodrec="select SUM(received_stock.quantity_rec) as ttl_quant_rec from received_stock where received_stock.product_id='$prod'";
$resultsprodrec= mysql_query($sqlprodrec) or die ("Error: $sqlprodrec.".mysql_error());
$rowsprodrec=mysql_fetch_object($resultsprodrec);

$prod_rec=$rowsprodrec->ttl_quant_rec;


//total items releases
$sqlord12="select SUM(released_quantity) as all_quant_rec from released_item where item_id='$prod'";
$resultsord12= mysql_query($sqlord12) or die ("Error $sqlord12.".mysql_error());
$rowsord12=mysql_fetch_object($resultsord12);
$qnty_rel=$rowsord12->all_quant_rec;

 $avail_quant=$prod_rec-$qnty_rel;





$sqlprof= "SELECT * from items where item_id='$prod'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);
 $product_name=$rowsprof->item_name;
$pack_size=$rowsprof->pack_size;
$vendor_prc=$rowsprof->vendor_prc;

$purchase_cost=$vendor_prc*$qnty_rec;




if($qnty_ordered<$qnty_rec)
{
header ("Location:release_items_from_store.php?abnormal=1&requisition_id=$requisition_id&qnty_ordered=$qnty_ordered");
}

elseif ($qnty_rec>$avail_quant)
{
header ("Location:release_items_from_store.php?missing=1&requisition_id=$requisition_id&avail_quant=$avail_quant&get_prod=$prod");
}

else
{
$sql3="INSERT INTO released_item VALUES('','$booking_id','$job_card_id','$requisition_id','$prod','$qnty_rec','$delivery_date',
'$rec_person','0','0',NOW())";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());



$querylatelpo="select * from released_item order by released_item_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_received_stock_id=$rowslatelpo->released_item_id;


$sqltrans= "insert into item_transactions values('','$prod','Released $qnty_rec $product_name ($pack_size) of Requisition No: $requisition_id from the warehouse','-$qnty_rec',NOW(),'rels$latest_received_stock_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Released $qnty_rec $product_name ($pack_size) into the warehous')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:release_items_from_store.php?success=1&requisition_id=$requisition_id&qnty_ordered=$qnty_ordered");

}

mysql_close($cnn);


?>


