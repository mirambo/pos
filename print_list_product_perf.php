<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont); 

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

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
<body onLoad="window.print();">
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person; ?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>Product Perfomance Report</H2>
	
	</td>
	
    </tr>
<tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="100"><strong>Item Code.</strong></td>    
    <td align="center" width="160"><strong>Item Name</strong></td>
	<td align="center" width="200"><strong>Sales (Kshs)</strong></td>


    </tr>

<?php 
 if (!isset($_POST['generate']))
{
 
$queryop="SELECT items.item_name,items.item_code, SUM(sales_item.item_quantity * sales_item.item_cost) as ttl_sales,sales.sale_date FROM sales,items,sales_item WHERE
sales_item.sales_id=sales.sales_id and items.item_id=sales_item.item_id
GROUP BY sales_item.item_id order by ttl_sales desc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
} 


else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['item_name'];



$queryop= "SELECT items.item_name,items.item_code, SUM(sales_item.item_quantity * sales_item.item_cost) as ttl_sales,sales.sale_date FROM sales,items,sales_item";
    $conditions = array();
	
if($client!='') 
 {
	
      $conditions[] = "items.item_name LIKE '%$client%'";
} 

 if($date_from!='' && $date_to!='' ) 
 {
	
      $conditions[] = "sales.sale_date>='$date_from' AND sales.sale_date <='$date_to'";
}



 	
if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." AND sales_item.sales_id=sales.sales_id and items.item_id=sales_item.item_id
GROUP BY sales_item.item_id order by ttl_sales desc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$queryop="SELECT items.item_name,items.item_code, SUM(sales_item.item_quantity * sales_item.item_cost) as ttl_sales,sales.sale_date FROM sales,items,sales_item WHERE
sales_item.sales_id=sales.sales_id and items.item_id=sales_item.item_id
GROUP BY sales_item.item_id order by ttl_sales desc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
 
 
 }
	
	

    $results = mysql_query($queryop) or die ("Error $queryop.".mysql_error());


} 
  
  

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
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
    <td><?php echo $region_id=$rows->item_code;?></td>
    <td>
	
	<!--<a href="home.php?submission_period=submission_period&customer_id=<?php echo $supplier_id; ?>"><?php echo $rows->region_name;?></a>-->
	<?php echo $rows->item_name;?>
	
	
	</td>
    <td align="right"><strong>
	<?php 
	
  //include ('invoice_value_region.php');
/* $sqlts="SELECT SUM(amount) as ttl_sales FROM customer_transactions,customer where customer_transactions.customer_id=customer.customer_id 
AND customer.region_id='$region_id' AND customer_transactions.transaction LIKE '%Invoice Sales%'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
$rowsts=mysql_fetch_object($resultsts);
*/
echo number_format($rows->ttl_sales,2); 
	
	?></strong></td>
	
</tr>
  <?php 
  
  }
  
  ?>
 <!-- <tr height="30" bgcolor="#FFFFCC">
  <td colspan="2" align="center"><strong>Total Receivables</strong></td>

  <td align="right"><strong><?php echo number_format($job_card_ttl,2);?></strong></td>
  
  </tr>-->
  <?php 
  
  }
  
  
  ?>


</table>
</body>


