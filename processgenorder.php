<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=$_GET['order_code'];

$prod=mysql_real_escape_string($_POST['prod']);
$description=mysql_real_escape_string($_POST['description']);
$foc=mysql_real_escape_string($_POST['foc']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);

//$converted_fig=$vend_price*$rate;


if ($vend_price=='' or $foc=='1' )
{

$sql= "insert into purchase_order values('','$order_code','$prod','$description','$qnty','F.O.C',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{


$sql= "insert into purchase_order values('','$order_code','$prod','$description','$qnty','$vend_price',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}



header ("Location:generate_order.php");





mysql_close($cnn);


?>


