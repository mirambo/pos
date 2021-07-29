<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$client_id=mysql_real_escape_string($_POST['sales_rep']);
$comm_perc=mysql_real_escape_string($_POST['comm_perc']);



$queryprof="select * from  client_discount where client_id='$client_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  


$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

//header ("Location:assign_discount.php? recordexist=1");
?>
<script type="text/javascript">
alert('SORRY!!! Record Exist');
//window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else 

{



$sql= "insert into client_discount values ('','$client_id','$comm_perc','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


?>
<script type="text/javascript">
alert('Record Added Successfuly');
window.location = "home.php?viewcountries=viewcountries";
</script> 

<?php

}




mysql_close($cnn);


?>


