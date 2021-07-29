<?php 
/* $qr_confirm23v="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `add`='A' and user_group_id='$user_group_id'";
$qr_res23v=mysql_query($qr_confirm23v) or die ('Error : $qr_confirm23v.' .mysql_error());
$num_rows23v=mysql_num_rows($qr_res23v); 
if ($num_rows23v!=0) 
{ 
include ('includes/restricted.php');

}
else
{ */
	

$id=$_GET['account_type_id'];
	
	
$sqlemp_det="select * from account_type where account_type_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

//include ('top_grid_includes.php');

$date_from=$_POST['date_from']; 

$date_to=$_POST['date_to']; 

?>

<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

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

<script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#FF9900';
    }
    else
    {
      tableRow.style.backgroundColor = '';
    }
  }
  
  $(document).ready(function() {

    $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});


 
  </script>

<form name="search" method="post" action="">  
  


<table width="60%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="20" id="date_from" value="<?php echo $date_from; ?>" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="20" id="date_to" value="<?php echo $date_to; ?>" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1">

	
<span style="float:rig;"><a target="_blank" href="print_detailed_bal.php?date_from=<?php echo $date_from; ?>&id=<?php echo $id; ?>&date_to=<?php echo $date_to; ?>"><img src="images/print_icon.gif"></a></span>
<span style="float:rig;" style="margin-right:x;"><a href="excel_detailed_bal.php?date_from=<?php echo $date_from; ?>&id=<?php echo $id; ?>&date_to=<?php echo $date_to; ?>"><img src="images/excel.png"></a></span>
		
	
	</td>
	</tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align=""><font size="">
	<font size="+1">
	<?php 
	if ($date_from!='' && $date_to!='')
	{ 
?>

<strong>Balance Sheet for the period between : <font color="#ff0000"><?php echo $date_from; ?></font> and <font color="#ff0000"><?php echo $date_to; ?></font></strong>
<?php
		
		
	}
	elseif ($date_from=='' && $date_to!='')
	{
		
?>

<strong>Balance Sheet for the period ending : <font color="#ff0000"><?php echo $date_to; ?></font></strong>
<?php
		
		
	}
	
		elseif ($date_from!='' && $date_to=='')
	{
	?>

<strong>Balance Sheet for the period ending : <font color="#ff0000"><?php echo $date_from; ?></font></strong>
<?php	
		
	}
	else
	{
		?>
<strong>Balance Sheet for the period ending : <font color="#ff0000"><?php echo date('Y-m-d'); ?></font></strong>
<?php		
		
	}
	
	?>

	

</font>
</td>
	</tr>
	
	
	</table>
	
	
<table width="60%" border="0" align="center" style="margin:auto;" bgcolor="#fff" class="table">	
	<tr>
 <td colspan="9"> 
 <table border="0" width="100%">
 <tr height="30"><td colspan="2">FIXED ASSET</td></tr>
 <?php 
 
 
$queryop="select * FROM account_type where account_cat_id='1' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());



while ($rows=mysql_fetch_object($results))
	
{
	
$account_type_id=$rows->account_type_id;
	

if ($date_from!='' && $date_to!='')
{

$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
AND transaction_date>='$date_from' and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);	
	
}
elseif ($date_from=='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);		
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
and transaction_date<='$date_from'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);		
	
}

else
{
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
}




$fa_amount=$rows2->ttl_amount;

if ($fa_amount==0)
{
	
	
}

else
{
 
 ?>
 
 
 
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>'"><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 
 
 
 echo $rows->balance_type;

echo number_format($fa_amount,2);
 $ttl_fa=$ttl_fa+$fa_amount;
 ?></td></tr>
 
 <?php 
}

}



 
 ?>
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>Totals Fixed Assets</strong></td><td align="right"><strong><?php echo number_format($ttl_fa,2); ?></strong></td></tr>
 
 
 <tr height="40"><td colspan="2">CURRENT ASSETS</td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='2' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
if ($date_from!='' && $date_to!='')
{

$queryop2="select SUM(amount*curr_rate) AS ttl_amount2 FROM chart_transactions where account_type_id='$account_type_id' 
AND transaction_date>='$date_from' and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);	
	
}
elseif ($date_from=='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount2 FROM chart_transactions where account_type_id='$account_type_id' 
and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);		
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount2 FROM chart_transactions where account_type_id='$account_type_id' 
and transaction_date<='$date_from'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);		
	
}

else
{
$queryop2="select SUM(amount*curr_rate) AS ttl_amount2 FROM chart_transactions where account_type_id='$account_type_id'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
}





$ca_amount2=$rows2->ttl_amount2;

if ($ca_amount2==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>'"><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($ca_amount2,2);
 $ttl_ca=$ttl_ca+$ca_amount2;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>Totals Current Assets</strong></td><td align="right"><strong><?php echo number_format( $ttl_ca,2); ?></strong></td></tr>
 
 
 

 
 
 
 
 
 <tr height="30"><td colspan="2">CURRENT LIABILITY</td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='3' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
if ($date_from!='' && $date_to!='')
{

$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
AND transaction_date>='$date_from' and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);	
	
}
elseif ($date_from=='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);		
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
and transaction_date<='$date_from'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);		
	
}

else
{
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
}

$cl_amount=$rows2->ttl_amount;

if ($cl_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td width="70%" onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>'"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($cl_amount,2);
 $ttl_cl_amount=$ttl_cl_amount+$cl_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>Totals Current Liability</strong></td><td align="right"><strong><?php echo number_format($ttl_cl_amount,2); ?></strong></td></tr>
 
 
 <tr height="20" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>Net Current Asset/(Liability)</strong></td><td align="right"><strong><font size=""><?php echo number_format($net_curr_asset=$ttl_ca-$ttl_cl_amount,2); ?></font></strong></td></tr>
 
 
 
  <tr height="30" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>TOTAL NET ASSETS</strong></td><td align="right"><strong><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format($ttl_fa+$net_curr_asset,2); ?></span></strong></td></tr>
 
 <tr height="30"><td colspan="2">CAPITAL & RESERVES</td></tr>
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td>2700-100 Profit For The Year</td><td align="right"><?php include('tpl_net_profit.php'); ?></td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='4'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
if ($date_from!='' && $date_to!='')
{

$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
AND transaction_date>='$date_from' and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);	
	
}
elseif ($date_from=='' && $date_to!='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
and transaction_date<='$date_to'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);		
	
}

elseif ($date_from!='' && $date_to=='')
{
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' 
and transaction_date<='$date_from'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);		
	
}

else
{
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
}





$oq_amount=$rows2->ttl_amount;

if ($oq_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td width="70%" onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to; ?>'"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($oq_amount,2);
 $ttl_oq_amount=$ttl_oq_amount+$oq_amount;
 ?></td></tr>
 
 <?php 
}

}

 
 ?>
 
 <tr height="30" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);"><td><strong>TOTAL CAPITAL & RESERVES</strong></td><td align="right"><strong><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format($ttl_oq_amount+$ttl_profit,2); ?></span></strong></td></tr>
 
 </table>
 </td></tr>
 </table>
 </table>

 
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>


<?php 
//}

?>