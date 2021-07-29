<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

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

<?php 
$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);

?>



<body onLoad="window.print();">
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="right"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="30"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person; ?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
<td colspan="9" height="20" align="center">
<H2>List Of Received Items</H2>
	
	</td>
	
    </tr>
  

	<tr style="background:url(images/description.gif);" height="30" >
	<td width="7%"><div align="center"><strong>Product Code</strong></td>
    <td width="20%"><div align="center"><strong>Product Name</strong></td>
    <td width="5%"><div align="center"><strong>Order No</strong></td>
    <td width="5%"><div align="center"><strong>GRN No.</strong></td>
	<!--<td width="15%"><div align="center"><strong>Date Recorded</strong></td>-->
<td width="9%"><div align="center"><strong>Qty Received</strong></td>
<td width="9%"><div align="center"><strong>Delivery Date</strong></td>
<td width="9%"><div align="center"><strong>Batch Number</strong></td>
<td width="9%"><div align="center"><strong>Mfg. Date</strong></td>
<td width="9%"><div align="center"><strong>Exp Date</strong></td>



    </tr>


  <?php 	

if (!isset($_POST['generate']))
{
 
$querydc="select * from items,received_stock,received_stock_code
where items.item_id=received_stock.product_id and received_stock_code.stock_code_id=received_stock.stock_code_id
ORDER BY received_stock.date_received desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());
}
else
{

$client_id=$_POST['client_id'];
$item_name=$_POST['item_name'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];

$querydc= "SELECT * FROM items,received_stock,received_stock_code";
    $conditions = array();
    if($client_id!=0) 
	
	{
	
    $conditions[] = "items.cat_id='$client_id'";
	
    }
	
	    if($item_name!='') 
	
	{
	
    $conditions[] = "items.item_name LIKE '%$item_name%'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = "received_stock_code.delivery_date>='$date_from' AND received_stock_code.delivery_date<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND items.item_id=received_stock.product_id and received_stock_code.stock_code_id=received_stock.stock_code_id
ORDER BY received_stock.date_received desc";
    }
	else
	{	
	
$querydc="select * from items,received_stock,received_stock_code
where items.item_id=received_stock.product_id and received_stock_code.stock_code_id=received_stock.stock_code_id
ORDER BY received_stock.date_received desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}



if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
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
  <td><?php echo $rows->item_code;?></td>
    <td><?php echo $rows->item_name;?></td>	
	<td><?php echo 
	
	$order_code_id=$rows->order_code_id;
	
	
	?></td>
		<td><?php echo 
	
	$note_no=$rows->delivery_note_no;
	
	
	?></td>
	<!--<td><?php echo $rows->date_received;?></td>-->


    <td align="center">
	
	<?php echo 	$rec_prod=$rows->quantity_rec;
	
    
	
	
	
	
	?></td>
	

	
	

	
	
	<td align="center"><?php echo $bp=$rows->delivery_date;?></td>
	<td align=""><?php echo $bp=$rows->batch_no;?></td>
	<td align="center"><?php echo $bp=$rows->man_date;?></td>
	<td align="center"><?php echo $bp=$rows->expiry_date;?></td>

	
</tr>
  <?php 
$ttl_rec_prod=$ttl_rec_prod+$rec_prod;
  }
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td width="400"><div align="center"><strong></strong></td>
		<td width="300"><div align="center"></td>
	<td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong></strong></td>

	<td width="300"><div align="center"><strong><?php echo $ttl_rec_prod;?></strong></td>

	
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"></td>
	<td width="300"><div align="center"></td>



    </tr>
  
  
  <?php 
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
</body>


