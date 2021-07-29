<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

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
<H2>Supplier Balances</H2>
	
	</td>
	
    </tr>
<tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="100"><strong>Supplier Code.</strong></td>    
    <td align="center" width="160"><strong>Supplier Name</strong></td>
	<td align="center" width="200"><strong>Balance Amount</strong></td>


    </tr>


 <?php 
   if (!isset($_POST['generate']))
{

 
$sql="SELECT SUM(amount*curr_rate) as ttl_bal,suppliers.sup_code,suppliers.supplier_name,suppliers.supplier_id FROM suppliers,supplier_transactions where 
supplier_transactions.supplier_id=suppliers.supplier_id GROUP BY supplier_transactions.supplier_id order by ttl_bal desc";
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
    <td><?php echo $supplier_code=$rows->sup_code;
	
	$supplier_id=$rows->supplier_id;
	
	?></td>
    <td><?php echo $rows->supplier_name;?></td>
    <td align="right"><?php 
	
	//include ('supplier_balance.php');
		echo number_format($ttl_bal=$rows->ttl_bal,2);
	
	$job_card_ttl=$job_card_ttl+$ttl_bal;
	
	
	?></td>
	
</tr>
  <?php 
					}
  }
  
  ?>
  <tr height="30" bgcolor="#FFFFCC">
  <td colspan="2" align="center"><strong>Total Payables</strong></td>

  <td align="right"><strong><?php echo number_format($job_card_ttl,2);?></strong></td>
  
  </tr>
  <?php 
  
  }
  
  
  ?>


</table>
</body>


