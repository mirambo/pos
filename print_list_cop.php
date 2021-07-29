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
<body onLoad="window.print();">
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>List Of Items Used For Cost Of Production</H2>
	
	</td>
	
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Cost No</strong></td>
    <td align="center" width="150"><strong>Item Name</strong></td>
    <td align="center" width="150"><strong>Date Recorded</strong></td>
    <td align="center" width="150"><strong>Quantity</strong></td>
    <td align="center" width="150"><strong>Value (SSP)</strong></td>
	<td align="center" width="100"><strong>Amount (SSP)</strong></td>
	<td align="center" width="100"><strong>Recorded By</strong></td>


    
    </tr>


  </tr>
	 <?php 
// query executed if a super administrator

if (!isset($_POST['generate']))
{
  
$sql="SELECT * from requisition_item,items where requisition_item.item_id=items.item_id order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$client_id=$_POST['client_id'];
$item_name=$_POST['item_name'];
$item_code=$_POST['item_code'];

if ( $client_id!=0 && $item_name=='' && $item_code=='')
{

$sql="SELECT * from requisition_item,items where requisition_item.item_id=items.item_id and items.cat_id='$client_id' 
order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif ( $client_id==0 && $item_name!='' && $item_code=='')
{
$sql="SELECT * from requisition_item,items where requisition_item.item_id=items.item_id and items.item_name LIKE '%$item_name%'
order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ( $client_id==0 && $item_name=='' && $item_code!='')
{

$sql="SELECT * from requisition_item,items where requisition_item.item_id=items.item_id and items.item_code LIKE '%$item_code%'
order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT * from requisition_item,items where requisition_item.item_id=items.item_id order by item_name asc";
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
  
    <td ><?php echo $rows->requisition_item_id;?></td>
    <td ><?php echo $rows->item_name.' ('.$rows->item_code.')';?></td>
    <td align="center"><?php 
	
	$requisition_id=$rows->requisition_id;
$sqlstr="SELECT * FROM  requisition where requisition_id='$requisition_id'";
$resultstr= mysql_query($sqlstr) or die ("Error $sqlstr.".mysql_error());	
$rowstr=mysql_fetch_object($resultstr);
	echo $rowstr->requisition_date;
	
	
	?></td>
    <td align="center"><?php echo $item_quantity=$rows->item_quantity;?></td>
    <td align="right"><?php 
	echo number_format($item_value=$rows->item_value,2);
/* $sqlc="SELECT * FROM bookings where customer_id='$cat' ";
$resultsc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$count=mysql_num_rows($resultsc);
	echo $count; */
	
	?></td>
	
	<td align="right">
	<?php 
	echo $ttl_value=$item_value*$item_quantity;?>
	
	</td>
	<td><i><font size="-2">
	<?php $staff=$rowstr->user_id;
$sqlst="SELECT * FROM  users where user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i></td>
 
	
   
    </tr>
  <?php 
  
  }
   
  
  }
  
  else 
  
  {
  ?>
  
  <tr bgcolor="#ffffcc" height="30"><td colspan="9" align="center"><font color="#ff0000"><strong>Sorry!! No Results found. </strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
</body>


