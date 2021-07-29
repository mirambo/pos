<?php include('Connections/fundmaster.php');?>
  <?php //include('bs_net_profit.php'); ?>
<?php //include('bs_net_profit.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
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
</style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/financials_submenu.php');  ?>
		
		<h3>:: Balance Sheet</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			

 <form name="search" method="post" action="">  
  


<table width="50%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="20" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">

	
<a target="_blank" style="float:right; margin-right:100px; font-weight:bold; font-size:13px; color:#000000" href="print_balancesheet.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to ?>">Print</a>						  
<a  style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_balancesheet_word.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to?>">Export To Excel</a>						  
	
	
	</td>
	</tr>
	
	
	</table>
	
	
<table width="50%" border="0" align="center" style="margin:auto;" bgcolor="#fff" class="table">	
	<tr>
 <td colspan="9"> 
 <table border="0" width="100%">
 <tr height="40"><td colspan="2">FIXED ASSET</td></tr>
 <?php 
 
 //sales income
$queryop="select * FROM account_type where account_cat_id='1' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
$fa_amount=$rows2->ttl_amount;

if ($fa_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>'"><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($fa_amount,2);
 $ttl_fa=$ttl_fa+$fa_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr><td><strong>Totals Fixed Assets</strong></td><td align="right"><strong><?php echo number_format($ttl_fa,2); ?></strong></td></tr>
 
 
 <tr height="40"><td colspan="2">CURRENT ASSETS</td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='2' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount2 FROM chart_transactions where account_type_id='$account_type_id'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
$ca_amount2=$rows2->ttl_amount2;

if ($ca_amount2==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>'"><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($ca_amount2,2);
 $ttl_ca=$ttl_ca+$ca_amount2;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr><td><strong>Totals Current Assets</strong></td><td align="right"><strong><?php echo number_format( $ttl_ca,2); ?></strong></td></tr>
 
 
 

 
 
 
 
 
 <tr height="40"><td colspan="2">CURRENT LIABILITY</td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='3' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' ";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
$cl_amount=$rows2->ttl_amount;

if ($cl_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($cl_amount,2);
 $ttl_cl_amount=$ttl_cl_amount+$cl_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr><td><strong>Totals Current Liability</strong></td><td align="right"><strong><?php echo number_format($ttl_cl_amount,2); ?></strong></td></tr>
 
 
 <tr height="20"><td><strong>Net Current Asset/(Liability)</strong></td><td align="right"><strong><font size=""><?php echo number_format($net_curr_asset=$ttl_ca-$ttl_cl_amount,2); ?></font></strong></td></tr>
 
 
 
  <tr height="40"><td><strong>TOTAL NET ASSETS</strong></td><td align="right"><strong><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format($ttl_fa+$net_curr_asset,2); ?></span></strong></td></tr>
 
 <tr height="40"><td colspan="2">CAPITAL & RESERVES</td></tr>
 <tr><td>Profit For The Year</td><td align="right"><?php include('tpl_net_profit.php'); ?></td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='4'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' ";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
$oq_amount=$rows2->ttl_amount;

if ($oq_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($oq_amount,2);
 $ttl_oq_amount=$ttl_oq_amount+$oq_amount;
 ?></td></tr>
 
 <?php 
}

}

 
 ?>
 
 <tr height="50"><td><strong>TOTAL CAPITAL & RESERVES</strong></td><td align="right"><strong><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format($ttl_oq_amount+$ttl_profit,2); ?></span></strong></td></tr>
 
 </table>
 </td></tr>
 </table>
 </table>
  
  <br/>
  
</br></br>



<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>
		
			
	  </div>
				
				<div id="cont-right" class="br-5">
					
				</div>
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			
			
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
	

	
</body>

</html>