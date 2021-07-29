<?php 
/* $qr_confirm23v="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `add`='A' and user_group_id='$user_group_id'";
$qr_res23v=mysql_query($qr_confirm23v) or die ('Error : $qr_confirm23v.' .mysql_error());
$num_rows23v=mysql_num_rows($qr_res23v); 
if ($num_rows23v==0) 
{ 
include ('includes/restricted.php');

}
else
{ */


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
include ('Connections/fundmaster_excel.php');


//include ('Connections/fundmaster_pr.php');
$id=$_GET['id'];
		
$sqlemp_det="select * from account_type where account_type_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

$date_from=$_GET['date_from']; 
$date_to=$_GET['date_to']; 






?>



<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}


p {


}
</style>
<table width="700" border="0" align="center" style="margin:auto;">

<tr bgcolor="#FFFFff">
   
    <td  height="30"  colspan="2" align="center">
	<p><strong><?php echo $rowscont->cont_person;?></strong></p>
		<p>Consolidated Profit and Loss Account</p>
		
			
			
			
			<?php 
	if ($date_from!='' && $date_to!='')
	{ 
?>

<strong>For the period between : <font color="#ff0000"><?php echo $date_from; ?></font> and <font color="#ff0000"><?php echo $date_to; ?></font></strong>
<?php
		
		
	}
	elseif ($date_from=='' && $date_to!='')
	{
		
?>

<strong>For the period ending : <font color="#ff0000"><?php echo $date_to; ?></font></strong>
<?php
		
		
	}
	
		elseif ($date_from!='' && $date_to=='')
	{
	?>

<strong>For the period ending : <font color="#ff0000"><?php echo $date_from; ?></font></strong>
<?php	
		
	}
	else
	{
		?>
<strong>For the period ending : <font color="#ff0000"><?php echo date('Y-m-d'); ?></font></strong>
<?php		
		
	}
	
	?>
	
	
	</td>
	
    </tr>
	

	
	
	</table>
	
	

	
	
	<table width="60%" border="0" align="center" style="margin:auto;" class="table">


	
	
	</table>
	
	
<table width="60%" border="0" align="center" style="margin:auto;" bgcolor="#fff" class="table">	
	<tr>
 <td colspan="2"> 
 <table border="1" width="100%">
 <tr height="40"><td colspan="2">INCOME</td></tr>
 <?php 
 
 //sales income
$queryop="select * FROM account_type where account_cat_id='7' group by main_account_code";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{

	


$main_account_code=$rows->main_account_code;

	
if ($date_from!='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' AND 
transaction_date>='$date_from' and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
	
}
elseif ($date_from=='' && $date_to!='')
{
	
	$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
 and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
 and transaction_date<='$date_from'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
}
else
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
}


$ttl_amount=$rows2->ttl_amount;

if ($ttl_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" onClick="document.location.href='home.php?chart_details_cons=chart_details_cons&main_account_code=<?php echo $rows->main_account_code; ?>&sub_module_id=<?php echo $sub_module_id ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>'"><td width="70%"><?php echo $rows->main_account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($ttl_amount,2);
 $ttl_sales=$ttl_sales+$ttl_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>Totals Sales  Income</strong></td><td align="right"><strong><?php echo number_format($ttl_sales,2); ?></strong></td></tr>
 
 
 <tr height="40"><td colspan="2">COST OF SALES</td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='5' group by main_account_code";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	///$account_type_id=$rows->account_type_id;
	
$main_account_code=$rows->main_account_code;
	
if ($date_from!='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' AND 
transaction_date>='$date_from' and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
	
}
elseif ($date_from=='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
 and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
 and transaction_date<='$date_from'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
}
else
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
}



$ttl_cos_amount=$rows2->ttl_amount;

if ($ttl_cos_amount==0)
{
	
	
}

else
	
{
 
 ?>
 
 
 
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" onClick="document.location.href='home.php?chart_details_cons=chart_details_cons&main_account_code=<?php echo $rows->main_account_code; ?>&sub_module_id=<?php echo $sub_module_id ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>'"><td width="70%"><?php echo $rows->main_account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($ttl_cos_amount,2);
 $ttl_cost_sales=$ttl_cost_sales+$ttl_cos_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>Totals Cost Of Sales</strong></td><td align="right"><strong><?php echo number_format( $ttl_cost_sales,2); ?></strong></td></tr>
 
 
 
  <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" height="30"><td><strong>GROSS MARGIN</strong></td><td align="right"><strong><?php echo number_format($gross_margin=$ttl_sales-$ttl_cost_sales,2); ?></strong></td></tr>
 
 
 
 
 
 <tr height="40"><td colspan="2">OPERATING EXPENSES</td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='6' and account_type_id!='492' AND account_type_id!='493' AND account_type_id!='494' AND account_type_id!='496' GROUP BY main_account_code";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	//$account_type_id=$rows->account_type_id;
		$main_account_code=$rows->main_account_code;
		
		
if ($date_from!='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' AND 
transaction_date>='$date_from' and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
	
}
elseif ($date_from=='' && $date_to!='')
{
	
	$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
 and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
 and transaction_date<='$date_from'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
}
else
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
}



$op_amount=$rows2->ttl_amount;

if ($op_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" onClick="document.location.href='home.php?chart_details_cons=chart_details_cons&main_account_code=<?php echo $rows->main_account_code; ?>&sub_module_id=<?php echo $sub_module_id ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>'"><td width="70%"><?php echo $rows->main_account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($op_amount,2);
 $ttl_op_amount=$ttl_op_amount+$op_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>Totals Operating Expenses</strong></td><td align="right"><strong><?php echo number_format($ttl_op_amount,2); ?></strong></td></tr>
 
 
 
 <tr height="40"><td colspan="2">DEPRECIATION</td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='6' and (account_type_id='492' OR account_type_id='493' OR account_type_id='494' OR account_type_id='496') GROUP BY main_account_code";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	//$account_type_id=$rows->account_type_id;
		$main_account_code=$rows->main_account_code;
		
		
if ($date_from!='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' AND 
transaction_date>='$date_from' and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
	
}
elseif ($date_from=='' && $date_to!='')
{
	
	$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
 and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code' 
 and transaction_date<='$date_from'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
	
}
else
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions,account_type 
where chart_transactions.account_type_id=account_type.account_type_id and account_type.main_account_code='$main_account_code'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
}



$dep_amount=$rows2->ttl_amount;

if ($dep_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" onClick="document.location.href='home.php?chart_details_cons=chart_details_cons&main_account_code=<?php echo $rows->main_account_code; ?>&sub_module_id=<?php echo $sub_module_id ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>'"><td width="70%"><?php echo $rows->main_account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($dep_amount,2);
 $ttl_dep_amount=$ttl_dep_amount+$dep_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>Totals Depreciation</strong></td><td align="right"><strong><?php echo number_format($ttl_dep_amount,2); ?></strong></td></tr>
 
 
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" height="40"><td><strong>2700 Profit For The Year</strong></td><td align="right"><strong><font size=""><?php echo number_format($gross_margin-$ttl_op_amount-$ttl_dep_amount,2); ?></font></strong></td></tr>
 
 </table>







<?php 
//}

?>