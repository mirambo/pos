<?php

include('Connections/fundmaster.php');


$minor_term=mysql_real_escape_string($_POST['minor_term']);
$sub_cat_term=mysql_real_escape_string($_POST['sub_cat_term']);

$queryprof="select * from  sub_cat_terminologies where sub_cat_teminology='$sub_cat_term'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:add_account_term_sub_category.php? recordexist=1");

}

else 

{



$sql= "insert into sub_cat_terminologies values ('','$minor_term','$sub_cat_term')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:add_account_term_sub_category.php? addtermconfirm=1");

}




mysql_close($cnn);


?>


