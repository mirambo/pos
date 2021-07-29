<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$bank_name=mysql_real_escape_string($_POST['bank_name']);
$branch_name=mysql_real_escape_string($_POST['branch_name']);
$account_name=mysql_real_escape_string($_POST['account_name']);
$account_no=mysql_real_escape_string($_POST['account_no']);

$queryprof="select * from banks where account_name='$bank_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?bankaccount=bankaccount&recordexist=1");

}
else
{

$sql= "insert into banks VALUES ('','$bank_name','$branch_name','$account_name','$account_no')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


//header ("Location:add_bank.php?addconfirm=1");

?>
<script type="text/javascript">
alert('Record Added successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

mysql_close($cnn);


?>


