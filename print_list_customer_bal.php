<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$supp_name=$_GET['supp_name'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont); 

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

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
</style>
<body onLoad="window.print();">
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person; ?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>Customer Balances</H2>
	
	</td>
	
    </tr>
<tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="100"><strong>Customer Code.</strong></td>    
    <td align="center" width="160"><strong>Customer Name</strong></td>
	<td align="center" width="200"><strong>Balance Amount</strong></td>


    </tr>


 <?php 
if ($supp_name!='' && $date_from=='' && $date_to=='')
{
$sql="SELECT SUM(amount*curr_rate) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id  and customer.customer_name LIKE '%$supp_name%' GROUP BY 
customer_transactions.customer_id 
order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($supp_name=='' && $date_from!='' && $date_to!='')
{
$sql="SELECT SUM(amount*curr_rate) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id  
and customer_transactions.transaction_date>='$date_from' AND customer_transactions.transaction_date<='$date_to' GROUP BY 
customer_transactions.customer_id order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($supp_name!='' && $date_from!='' && $date_to!='')
{
$sql="SELECT SUM(amount*curr_rate) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id  
and customer_transactions.transaction_date>='$date_from' AND customer_transactions.transaction_date<='$date_to' and customer.customer_name LIKE '%$supp_name%' 
GROUP BY customer_transactions.customer_id order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT SUM(amount*curr_rate) as ttl_bal,customer.customer_code,customer.customer_name,customer.customer_id FROM 
customer,customer_transactions where customer_transactions.customer_id=customer.customer_id  GROUP BY 
customer_transactions.customer_id 
order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
						  
						  $ttl_bal_lop=$rows->ttl_bal;
					
					if ($ttl_bal_lop==0)
					{
						
						
					}
					else
					{
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 
 
 ?>
    <td><?php 
 $supplier_id=$rows->customer_id;
	echo $customer_code=$rows->customer_code;
	
	?></td>
    <td><?php echo $rows->customer_name;?></td>
    <td align="right"><?php 
	
	//include ('customer_balance.php');
	
	echo number_format($ttl_bal=$rows->ttl_bal,2);
	
	$job_card_ttl=$job_card_ttl+$ttl_bal;
	
	
	?></td>
	
</tr>
  <?php 
  
							  }}
  
  ?>
  <tr height="30" bgcolor="#FFFFCC">
  <td colspan="2" align="center"><strong>Total Receivables</strong></td>

  <td align="right"><strong><?php echo number_format($job_card_ttl,2);?></strong></td>
  
  </tr>
  <?php 
  
  }
  
  
  ?>


</table>
</body>


