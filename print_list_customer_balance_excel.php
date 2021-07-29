<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Customer_Balances.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


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
<table width="700" border="1" class="table" align="center">


<tr height="40"> <td colspan="3" align="center"><H4>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H4></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="3" height="30" align="center">
<H5>Customers Balance Report</H5>
	
	</td>
	
    </tr>
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" ><strong>Customer No.</strong></td>    
    <td align="center" ><strong>Customer Name</strong></td>
	<td align="center" ><strong>Balance Amount (SSP)</strong></td>


    </tr>
 <?php 
   if (!isset($_POST['generate']))
{

 
$sql="SELECT * FROM customer order by customer_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$supp_name=$_POST['supp_name'];

if ($supp_name!='')
{
$sql="SELECT * FROM customer where customer_name LIKE '%$supp_name%' order by customer_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT * FROM customer order by customer_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}





if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
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
    <td><?php echo $supplier_id=$rows->customer_id;?></td>
    <td><?php echo $rows->customer_name;?></td>
    <td align="right"><?php 
	
	include ('customer_balance.php');
	
	
	?></td>
	
</tr>
  <?php 
  
  }
  
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


