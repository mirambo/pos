<?php
#include connection
include('Connections/fundmaster.php');

$id=$_GET['pack_size_id'];





$sql= "delete from pack_size where pack_size_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:view_packsize.php? deleteconfirm=1");






mysql_close($cnn);


?>


