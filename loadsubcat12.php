

    <?php
     include('Connections/fundmaster.php');
     
   $sub_cat12 = $_GET['parent_cat12'];
     
   $query12 = mysql_query("select * from supplier_transactions WHERE supplier_id = {$sub_cat12}");
	
    while($rows12 = mysql_fetch_array($query12)) {
	
    //echo $get_mop_id=$row3['mop_id'];
	$amount=$rows12['amount'];
	$curr_rate=$rows12['curr_rate'];
	
	$ttl_amount=$amount*$curr_rate;
	
	$grnd_amnt=$grnd_amnt+$ttl_amount;
	
    }
     echo'<strong><font color="#ff0000">Total Balance (Kshs)</font> : '.number_format($grnd_amnt,2).'</strong>';
    ?>