<?php

include('Connections/fundmaster.php');

$post_grad_scholarship_id=$_GET['post_grad_scholarship_id'];





$sql= "delete from post_grad_scholarship where post_grad_scholarship_id='$post_grad_scholarship_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?postgraduatereport=postgraduatereport&post_grad_scholarship_id=$post_grad_scholarship_id&delconfirm=1");



mysql_close($cnn);


?>


