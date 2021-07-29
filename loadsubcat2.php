

    <?php
     include('Connections/fundmaster.php');
     
    $sub_cat = $_GET['parent_cat1'];
     
   $query2 = mysql_query("select SUM(amount) as cust_ttl FROM customer_transactions WHERE customer_id = {$sub_cat}");
	
    while($row2 = mysql_fetch_array($query2)) {
	
    echo '<strong><font color="#ff0000">Total Balance (SSP)</font> : '.number_format($row2['cust_ttl'],2).'</strong>';
    }
     
    ?>