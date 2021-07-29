<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['bank_id'];
$bank_name=mysql_real_escape_string($_POST['bank_name']);
$branch_name=mysql_real_escape_string($_POST['branch_name']);
$account_name=mysql_real_escape_string($_POST['account_name']);
$account_no=mysql_real_escape_string($_POST['account_no']);

 
$sqlupdt= "UPDATE banks SET bank_name='$bank_name',branch_name='$branch_name',account_name='$account_name',account_number='$account_no' 
WHERE bank_id='$id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



//header ("Location:edit_bank.php?bank_id=$id&editsuccess=1");

?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "view_received_stock.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


mysql_close($cnn);

?>


