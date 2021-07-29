<?php 
//basic job_card details
$sqlqt="SELECT SUM() FROM order_code_get where order_code_id='$order_code'";
$resultsqt= mysql_query($sqlqt) or die ("Error $sqlqt.".mysql_error());
$rowsqt=mysql_fetch_object($resultsqt);
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$freight_charges=$rowsqt->freight_charge; 
//$vat=$rowsqt->vat; 






//$job_card_ttl=$job_card_ttl+$grand_ttl;
?>