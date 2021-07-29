<?php 
include('Connections/fundmaster.php'); 
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['region'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/customersubmenu.php');  ?>
		
		<h3>:: Region Sales Report</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">

<?php

?>
 <form name="search" method="post" action="">  			
				
			
<table width="70%" border="0" style="margin:auto;">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
		<a target="_blank" style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_list_region_bal.php?client=<?php echo $client;?>&from=<?php echo $date_from ?>&to=<?php echo $date_to; ?>">Print</a>						  
<!--	<a target="" style="float:right; margin-right:30px; font-weight:bold; font-size:13px; color:#000000" href="print_list_customer_balance_excel.php">Export To Excel</a>						  
-->
	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center">
	<strong>Search Region 
<select name="region"><option value="0">Select-----------------</option>
								  <?php
								  
								  $query1="select * from customer_region order by region_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->region_id; ?>"><?php echo $rows1->region_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select>	
    </strong>
    
    
<strong>Period From</strong>
						<strong>To : </strong><input type="text" name="from" size="20" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="20" id="to" readonly="readonly" />
	
	<input type="submit" name="generate" value="Search">
	
	
	</td>
	
    </tr>	
	
  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="100"><strong>Region No.</strong></td>    
    <td align="center" width="160"><strong>Region Name</strong></td>
	<td align="center" width="200"><strong>Sales (Kshs)</strong></td>


    </tr>
  
  <?php 
 if (!isset($_POST['generate']))
{
 
$queryop="SELECT SUM(customer_transactions.amount) as cust_sales, customer_region.region_name,customer_region.region_id FROM 
customer_region,customer,customer_transactions WHERE customer_transactions.customer_id=customer.customer_id
AND customer_region.region_id=customer.region_id and customer_transactions.amount>'0' 
GROUP BY customer.region_id order by cust_sales desc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
} 


else
{




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
    <td><?php 
	
	
	echo $region_id=$rows->region_id;
	
	
	
	
	
	
	?></td>
    <td>
	
	<a href="home.php?submission_period1=submission_period1&region_id=<?php echo $region_id; ?>"><?php echo $rows->region_name;?></a>
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
</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "to"       // ID of the button
    }
  );
  
  
  
  </script> 
			

			
			
			
					
			  </div>
				
				
			
			
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

</html>