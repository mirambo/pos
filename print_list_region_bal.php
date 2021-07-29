<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_from=$_GET['from'];
$date_to=$_GET['to'];
$client=$_GET['client'];

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
<H2>Region Sales Report</H2>
	
	</td>
	
    </tr>
<tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="100"><strong>Region No.</strong></td>    
    <td align="center" width="160"><strong>Region Name</strong></td>
	<td align="center" width="200"><strong>Sales (Kshs)</strong></td>


    </tr>
  
  <?php 




$queryop= "SELECT SUM(customer_transactions.amount) as cust_sales, customer_region.region_name,customer_region.region_id FROM 
customer_region,customer,customer_transactions";
    $conditions = array();
	
if($client!=0) 
 {
	
      $conditions[] = "customer.region_id='$client'";
} 

 if($date_from!='' && $date_to!='' ) 
 {
	
      $conditions[] = "customer_transactions.transaction_date>='$date_from' AND customer_transactions.transaction_date <='$date_to'";
}

 if($mop!=0) 
 {
	
      $conditions[] = "invoice_payments.mop='$mop'";
}


 	
if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." AND customer_transactions.customer_id=customer.customer_id
AND customer_region.region_id=customer.region_id and customer_transactions.amount>'0' GROUP BY customer.region_id order by cust_sales desc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$queryop="SELECT SUM(customer_transactions.amount) as cust_sales, customer_region.region_name,customer_region.region_id FROM 
customer_region,customer,customer_transactions WHERE customer_transactions.customer_id=customer.customer_id
AND customer_region.region_id=customer.region_id and customer_transactions.amount>'0' GROUP BY customer.region_id order by cust_sales desc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
 
 
 }
	
	

    $results = mysql_query($queryop) or die ("Error $queryop.".mysql_error());



  
  

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
    <td><?php 
	
	
	echo $region_id=$rows->region_id;
	
	
	
	
	
	
	?></td>
    <td>
	
	<?php echo $rows->region_name;?>
	<?php //echo $rows->region_name;?>
	
	
	</td>
    <td align="right"><strong>
	<?php 
	
  include ('invoice_value_region.php');
//echo number_format($cust_sales=$rows->cust_sales,2);

$job_card_ttl=$job_card_ttl+$cust_sales;

	
	?></strong></td>
	
</tr>
  <?php 
  
  }
  
  ?>
  <tr height="30" bgcolor="#FFFFCC">
  <td colspan="2" align="center"><strong>Total Sales</strong></td>

  <td align="right"><strong><?php echo number_format($job_card_ttl,2);?></strong></td>
  
  </tr>
  <?php 
  
  }
  
  
  ?>


</table>
</body>


