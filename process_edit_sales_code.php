<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_code_id=$_GET['sales_code_id'];


$view=$_GET['view'];
$sales_type=$_GET['sales_type'];
$client=mysql_real_escape_string($_POST['client']); 
//$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
$mop=mysql_real_escape_string($_POST['mop']);
$currency=mysql_real_escape_string($_POST['currency']);
$sale_date=mysql_real_escape_string($_POST['sale_date']);
$terms=mysql_real_escape_string($_POST['terms']);

$querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;





$sql= "update sales_code set 
 	client_id='$client', 
 	sales_rep_id='$mop', 
	currency='$currency',
	curr_rate='$curr_rate',
 	sale_date='$sale_date',
 	terms='$terms'
	
where sales_code_id='$sales_code_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated sales code transactions details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



/*if ($view==1)
{
header ("Location:view_inv_trans.php?sales_id=$sales_id");
}
elseif ($cs==1)
{
header ("Location:generate_cash_sales.php?cash_sales_id=$sales_id");
}
elseif ($view==2)
{
header ("Location:view_cash_trans.php?sales_id=$sales_id");
}
else
{*/
if ($view==1)
{
header ("Location:view_sales_trans.php?sales_code_id=$sales_code_id");
}
if ($sales_type=='c')
{
//header ("Location:generate_cash_sales.php");
?>
<script type="text/javascript">
alert('Record Updated successfuly');
window.location = "generate_cash_sales.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php




}
if ($view==2)
{
//header ("Location:view_received_stock.php");
?>
<script type="text/javascript">
alert('Record Updated successfuly');
window.location = "view_received_stock.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

if($sales_type=='c' && $view==1)
{
header ("Location:view_cash_sales_trans.php?sales_code_id=$sales_code_id");
}
if ($sales_type=='i')
{
//header ("Location:generate_invoice.php");

?>
<script type="text/javascript">
alert('Record Saved successfuly');
window.location = "view_received_stock.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


}



								  


mysql_close($cnn);


?>


