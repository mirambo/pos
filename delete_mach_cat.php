<?php

include('Connections/fundmaster.php');

$id=$_GET['mach_cat_id'];





$sql= "delete from product_categories where cat_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:view_mach_cat.php? deletemachcatconfirm=1");



mysql_close($cnn);


?>


