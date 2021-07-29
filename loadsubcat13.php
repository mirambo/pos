v

    <?php
     include('Connections/fundmaster.php');
     
   $sub_cat13 = $_GET['parent_cat13'];
     
   $query13 = mysql_query("select * from shareholder_transactions where shareholder_id = {$sub_cat13}");
	
    while($rows13 = mysql_fetch_array($query13)) {
	
    //echo $get_mop_id=$row3['mop_id'];
	$amount=$rows13['amount'];
	$curr_rate=$rows13['curr_rate'];
	
	$ttl_amount=$amount*$curr_rate;
	
	$grnd_amnt=$grnd_amnt+$ttl_amount;
	
    }
     echo'<strong><font color="#ff0000">Total Shares (SSP)</font> : '.number_format($grnd_amnt,2).'</strong>';
    ?>