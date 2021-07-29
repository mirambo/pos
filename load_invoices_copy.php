<?php 
    include('Connections/fundmaster.php');
//basic invoice details
//$invoice_id=90;
//$invoice_ttl=0;

 $invoice_id = $_GET['customer_id'];

 
 
 
	$query_parent33 = mysql_query("SELECT * FROM sales where customer_id='$invoice_id' AND sale_type='cr' 
	and canceled_status='0'order by sales_id desc") or die("Query failed: ".mysql_error());
	echo "<option value='0'>Select Invoice.............</option>";
	while($row33 = mysql_fetch_array($query_parent33))
	{
		
		
		echo $sales_id=$row33['sales_id'];
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$disc_value=0;		
$sqlts="SELECT * from sales_item where sales_id='$sales_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
				
						  
$sqlx="SELECT * from sales_item where sales_item_id='$sales_id'";
$resultsx=mysql_query($sqlx);
$rowsx=mysql_fetch_object($resultsx);
//echo "<i>".$rowsx->service_item_name .' - ';

						  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						 $task_ttl_kshs=$task_cost;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  
						  
$item_disc=$rowsts->shop_id;


$item_disc_value=$item_disc*$task_cost/100;


$disc_value=$disc_value+$item_disc_value;
						  
$vat_value=$rowsts->vat_value;	

$ttl_vat_value=$ttl_vat_value+$vat_value;					  
						  
						  }
						  //echo $task_totals;
			
						  }
						  




$task_totals=$task_totals2+$ttl_vat_value;
		
		
		
		
		
	
	
	?>
	
    <option value="<?php echo $row33['sales_id']; ?>"><?php echo $row33['invoice_no'].' - '.$task_totals; ?></option>
	
	
	
    <?php 
	
	} 
	
	
	?>			  

