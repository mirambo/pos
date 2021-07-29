<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['id'];
$newsup=$_GET['newsup'];
$newsupb=$_GET['newsupb'];
$sup_name=mysql_real_escape_string($_POST['sup_name']);
$sup_type=mysql_real_escape_string($_POST['item_section']);
$sup_code=mysql_real_escape_string($_POST['sup_code']);
$date_dep=mysql_real_escape_string($_POST['date_dep']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$value_at_hand=mysql_real_escape_string($_POST['value_at_hand']);
$cont_person=mysql_real_escape_string($_POST['cont_person']);
$country=mysql_real_escape_string($_POST['country']);
$address=mysql_real_escape_string($_POST['address']);
$phone=mysql_real_escape_string($_POST['phone']);
$town=mysql_real_escape_string($_POST['town']);
$email=mysql_real_escape_string($_POST['email']);




if ($id=='')
{


$queryprof="select * from suppliers where supplier_name='$sup_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


if ($numrowscomp>0)

{

?>
<script type="text/javascript">
alert('Sorry!! Supplier exist');
//window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else 

{

/* $sql= "insert into suppliers values('', '$sup_name', '$sup_type','$sup_code','$cont_person', '$country', '$address', '$town', '$phone', '$email',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */


$sql= "INSERT INTO suppliers set 
supplier_name='$sup_name', 
sup_type='$sup_type', 
cont_person='$cont_person',
country='$country',
postal='$address',
town='$town',
phone='$phone',
opening_balance='$value_at_hand',
opening_balance_date='$date_dep',
supplier_currency='$currency',
supplier_curr_rate='$curr_rate',
email='$email',
sup_code='$sup_code'";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());


$latest_id=mysql_insert_id();

$transaction_code="supop".$latest_id;

$memo="Supplier Opening Balance for supplier ".$sup_name."as at ".$date_dep;

$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$latest_id',
transaction='$memo',
order_code='$order_code_id',
amount='$value_at_hand',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_dep',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Created a supplier $sup_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($newsup=='' && $newsupb=='' )
{

///header ("Location:add_supplier.php? addsupplierconfirm=1");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


}

elseif ($newsupb!='')
{

//header ("Location:begin_invoice.php? addsupplierconfirm=1");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else
{
//header ("Location:begin_order.php? addsupplierconfirm=1");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "begin_order.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}


}
}



////////////////edit
else
{
	
$queryprof="select * from suppliers where supplier_name='$sup_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


if ($numrowscomp>789999999990)

{

?>
<script type="text/javascript">
alert('Sorry!! Supplier exist');
//window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else 

{

$sql= "UPDATE suppliers set 
supplier_name='$sup_name', 
sup_type='$sup_type', 
cont_person='$cont_person',
country='$country',
postal='$address',
opening_balance='$value_at_hand',
opening_balance_date='$date_dep',
supplier_currency='$currency',
supplier_curr_rate='$curr_rate',
town='$town',
phone='$phone',
email='$email',
sup_code='$sup_code' 
where supplier_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$latest_id=$id;

$transaction_code="supop".$latest_id;

$memo="Supplier Opening Balance for supplier ".$sup_name."as at ".$date_dep;


$sqlprof="select * from supplier_transactions where transaction_code='$transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{





$sqltransc="UPDATE supplier_transactions SET 
supplier_id='$latest_id',
transaction='$memo',
order_code='$order_code_id',
amount='$value_at_hand',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_dep' WHERE transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());

}
else
{
	
$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='$latest_id',
transaction='$memo',
order_code='$order_code_id',
amount='$value_at_hand',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_dep',
transaction_code='$transaction_code'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());
	
}






$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Created a supplier $sup_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

if ($newsup=='' && $newsupb=='' )
{

///header ("Location:add_supplier.php? addsupplierconfirm=1");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


}

elseif ($newsupb!='')
{

//header ("Location:begin_invoice.php? addsupplierconfirm=1");
?>
<script type="text/javascript">
alert('Record updated Successfuly');
//window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else
{
//header ("Location:begin_order.php? addsupplierconfirm=1");
?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "begin_order.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}


}
	
	
	
	
	
}

/*$queryprof="select * from  user_groups where group_name='$group_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);*/
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
/*if ($numrowscomp>0)

{

header ("Location:add_user_groups.php? recordexist=1");

}

else 

{



$sql= "insert into user_groups values ('','$group_name','$group_desc','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:add_user_groups.php? addgroupconfirm=1");

}
*/


mysql_close($cnn);


?>


