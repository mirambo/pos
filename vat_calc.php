<?php 
include('Connections/fundmaster.php');
//vat calculations
$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;

echo $vat_perc=$vat_set_perc/100;


?>