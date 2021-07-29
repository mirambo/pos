<?php 
    include('Connections/fundmaster.php');
//basic invoice details
//$invoice_id=90;
//$invoice_ttl=0;

    $invoice_id = $_GET['customer_id'];

 
 
 
	$query_parent33 = mysql_query("SELECT * FROM items_sub_category where cat_id='$invoice_id' 
	order by sub_cat_name desc") or die("Query failed: ".mysql_error());
	echo "<option value='0'>Select.............</option>";
	while($row33 = mysql_fetch_array($query_parent33)): 
	
	
	?>
	
    <option value="<?php echo $row33['sub_cat_id']; ?>"><?php echo $row33['sub_cat_name']; ?></option>
	
	
	
    <?php endwhile; ?>			  

