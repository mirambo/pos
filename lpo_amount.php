<?php 
$order_id;
$lpo_ttl=0;
$lpo_amnt=0;
$sqllval="select * from purchase_order where order_code='$order_id'";
$resultslval= mysql_query($sqllval) or die ("Error $sqllval.".mysql_error());

if (mysql_num_rows($resultslval) > 0)
						  {
							 
							  while ($rowsval=mysql_fetch_object($resultslval))
							  {
							  $qnty=$rowsval->quantity;
							  $price=$rowsval->vendor_prc;
							  
							 $amount=$price*$qnty;
							  
							 $lpo_amntxx=$lpo_amnt+$amount;
							  
							  }
							  
							  
							  
							 $freight_charge=$rows->freight_charge;
							
							$lpo_amnt=$lpo_amntxx+$freight_charge;
							 
							echo number_format($lpo_ttl=$lpo_ttl+$lpo_amnt,2);
							  
							  }


?>