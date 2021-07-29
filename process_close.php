<?php
include('Connections/fundmaster.php'); 
echo $date_from=mysql_real_escape_string($_POST['date_from']);
$remarks=mysql_real_escape_string($_POST['remarks']);

$querylcc="select * from closed_accounts where date_closed < '$date_from' ";
$resultslcc=mysql_query($querylcc) or die ("Error: $querylcc.".mysql_error());								  
$rowslcc=mysql_fetch_object($resultslcc);
$numrowscc=mysql_num_rows($resultslcc);


 ?>