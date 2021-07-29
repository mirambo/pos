<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$c_name=mysql_real_escape_string($_POST['c_name']);
$contact_person=mysql_real_escape_string($_POST['contact_person']);
$c_phone=mysql_real_escape_string($_POST['c_phone']);
$c_telephone=mysql_real_escape_string($_POST['c_telephone']);
$c_email=mysql_real_escape_string($_POST['c_email']);
$c_address=mysql_real_escape_string($_POST['c_address']);
$cp_address=mysql_real_escape_string($_POST['cp_address']);
$c_street=mysql_real_escape_string($_POST['c_street']);
$c_town=mysql_real_escape_string($_POST['c_town']);
$allow_add=mysql_real_escape_string($_POST['allow_add']);
$date_sent=mysql_real_escape_string($_POST['date_sent']);


$id=$_GET['client_id'];


$sql= "update clients set c_name='$c_name', c_address='$c_address',c_paddress='$cp_address',c_phone='$c_phone',c_email='$c_email'
,contact_person='$contact_person',c_telephone='$c_telephone',c_street='$c_street',c_town='$c_town',monthly_statement='$allow_add',statement_date='$date_sent' where client_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav="Insert into audit_trail values('','$user_id',NOW(),'Edited customer details for $c_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


//header ("Location:edit_customer.php?client_id=$id&updateconfirm=1");
?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "view_received_stock.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
mysql_close($cnn);


?>