<?php

include('Connections/fundmaster.php');

$major_term=mysql_real_escape_string($_POST['major_term']);
$minor_term=mysql_real_escape_string($_POST['minor_term']);


$queryprof="select * from  minor_terminologies where minor_terminology_name='$minor_term'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:add_account_term_category.php? recordexist=1");

}

else 

{



$sql= "insert into minor_terminologies values ('','$major_term','$minor_term')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:add_account_term_category.php? addtermconfirm=1");

}




mysql_close($cnn);


?>


