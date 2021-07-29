<?php
#include connection
include('Connections/fundmaster.php');



$sqlsp="select * FROM farmers_grn";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
while ($rowsp=mysql_fetch_object($resultssp))
{
	
$famers_grn_id=$rowsp->famers_grn_id;	
$farmer_name=mysql_real_escape_string($rowsp->farmer_name);	

$sqlspx="select * FROM farmers where farmer_name='$farmer_name'";
$resultsspx= mysql_query($sqlspx) or die ("Error $sqlspx.".mysql_error());
$rowspx=mysql_fetch_object($resultsspx);
$farmer_id=$rowspx->farmer_id;


$sql34="UPDATE farmers_grn SET 
	farmer_id='$farmer_id' 
	where famers_grn_id='$famers_grn_id' " or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error()); 




	
}







mysql_close($cnn);


?>


