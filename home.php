<?php include ('includes/session.php'); ?>
<?php include ('Connections/fundmaster.php'); ?>
<?php include ('functions.php'); ?>
<?php include ('title.php'); ?>
<?php include ('header.php'); ?>
<?php include ('add_form.php'); ?>
<?php include ('edit_form.php'); ?>
<?php include ('delete_form.php'); 
$monitor=$_GET['monitor'];

?>
<body>

<?php
if ($_GET['loginfirst']==1)
{

$curr_date=date("Y-m-d H:i:s", time());
$sqlauditsav= "insert into audit_trails values('','$user_id','$curr_date','Logged Into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

}

if ($sess_allow_delete==1) {
$rdelete="delete";
$me="";
}
else
{$rdelete="";
$me="Operation NOT Allowed";
}

?>
<!--Top menu Div-->
<div id="mainmenux">
<?php require_once('mainmenunew.php') ?>

</div>

<div id="wrapper2">
<?php //$monitor="monitor";

if ($monitor=="monitor")
{



?>

<div id="submenu">
<marquee><strong>::: <span style="text-transform:uppercase;">WELCOME TO BUSINESS MANAGEMENT SYSTEM:::<span></strong></marquee>
</div>
<?php

echo display_landing_page();
}
else
{
echo display_submenu();
}

?>


</div>


<table width="100%" border="0">
<tr><td>
<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
</td>
</tr>

	
</body>
</html>
