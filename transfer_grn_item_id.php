<?php
#include connection
include('Connections/fundmaster.php');



$sqlsp="select * FROM farmers_grn where farmer_id='0'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
while ($rowsp=mysql_fetch_object($resultssp))
{
	

$farmer_name=mysql_real_escape_string($rowsp->farmer_name);	



$sql34="INSERT INTO farmers SET 
	farmer_name='$farmer_name',
	supplier_id='39'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error()); 




	
}







mysql_close($cnn);


?>


