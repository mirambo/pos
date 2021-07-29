<?php

if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?>
<?php

if(isset($_GET['subDELETELocation']))
  { 
$booking_id=$_GET['booking_id'];
delete_location($booking_id,$user_id);
  }
$cat=$_GET['cat'];

include('includes/facebox.php');
?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to cancel this transfer?");
}

</script>


<!--<SCRIPT language="javascript">
function reload(form)
{
var val=form.cat_id.options[form.cat_id.options.selectedIndex].value;
self.location='home.php?viewcountries=viewcountries&cat=' + val ;

}

</script>-->
 <form name="search" method="post" action="">  
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['cancelconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Stock Transfer No. '.$_GET['invoice_no']. ' Cancelled Successfully!!</font></strong></p></div>';
?>  

<?php 

if ($_GET['delete']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center" valign="top">
	<strong>Filter By Source
    </strong>
    <select name="source">
	<option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from shop order by shop_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shop_id;?>"><?php echo $rows1->shop_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  
								  <strong>Or By Destination
    </strong>
    <select name="destination">
	<option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from shop order by shop_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shop_id;?>"><?php echo $rows1->shop_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
							  
    
    
	

	
	<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="20" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="20" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Search">
			
 <a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_cop.php">Print</a>						  
	
	</td>
	
    </tr>




	
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Stock Transfer No</strong></td>
    <td align="center" width="150"><strong>Transfer Date</strong></td>
    <td align="center" width="150"><strong>Source Center</strong></td>
    <td align="center" width="150"><strong>Destination Shop</strong></td>
    <td align="center" width="150"><strong>Issueing Person</strong></td>
    <td align="center" width="150"><strong>Receiving Person</strong></td>
	<td align="center" width="100"><strong>View Details</strong></td>
	<td align="center" width="100"><strong>Cancel Stock Transfer</strong></td>
    <!--<td align="center" width="150"><strong>Edit</strong></td>
	<td align="center" width="100"><strong>Delete</strong></td>-->

    
    </tr>
	 <?php 
// query executed if a super administrator


if ($incharge==1)
{

if (!isset($_POST['generate']))
{
 
$sql="select * FROM stock_transfer where status='0' order by stock_transfer.transfer_date desc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$source=$_POST['source'];
$destination=$_POST['destination'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];

$querydc= "SELECT * FROM stock_transfer";
    $conditions = array();
    if($source!=0) 
	
	{
	
    $conditions[] = "shop_from='$source'";
	
    }
	

	if($destination!=0) 
	{
	
   $conditions[] = "shop_to='$destination'";
	  
    }
	

	if($date_from!='' && $date_to!='' ) {
	
      $conditions[] = " transfer_date >='$date_from' AND transfer_date<='$date_to' ";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND status='0' order by transfer_date desc";
    }
	else
	{	
	
$querydc="select * FROM stock_transfer AND status='0' order by stock_transfer.transfer_date desc";
$resultsdc=mysql_query($querydc) or die ("Error: $querydc.".mysql_error()); 

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}

}
//separeys shops
else
{

if (!isset($_POST['generate']))
{
 
$sql="select * FROM stock_transfer where shop_to='$incharge' AND status='0' order by stock_transfer.transfer_date desc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$source=$_POST['source'];
$destination=$_POST['destination'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];

$querydc= "SELECT * FROM stock_transfer";
    $conditions = array();
    if($source!=0) 
	
	{
	
    $conditions[] = "shop_from='$source'";
	
    }
	

	if($destination!=0) 
	{
	
   $conditions[] = "shop_to='$destination'";
	  
    }
	

	if($date_from!='' && $date_to!='' ) {
	
      $conditions[] = " transfer_date >='$date_from' AND transfer_date<='$date_to' ";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND where shop_to='$incharge' AND status='0' order by transfer_date desc";
    }
	else
	{	
	
$querydc="select * FROM stock_transfer WHERE where shop_to='$incharge' AND status='0' order by stock_transfer.transfer_date desc";
$resultsdc=mysql_query($querydc) or die ("Error: $querydc.".mysql_error()); 

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}

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
  
    <td ><?php echo $rows->stock_transfer_id;?></td>
    <td ><?php echo $rows->transfer_date;?></td>
    <td align="center"><?php 
	
	$shop_from=$rows->shop_from;
$sqlsp="select * from shop where shop_id='$shop_from'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultsp);

echo $rowssp->shop_name;
	
	
	?></td>
    <td align="left"><?php 
		$shop_to=$rows->shop_to;
$sqlspt="select * from shop where shop_id='$shop_to'";
$resultspt= mysql_query($sqlspt) or die ("Error $sqlspt.".mysql_error());
$rowsspt=mysql_fetch_object($resultspt);

echo $rowsspt->shop_name;
	
	?></td>
    <td align=""><?php 
	echo $rows->releasing_person;
	
	?></td>
	
	<td align="">
	<?php 
echo $rows->receiving_person;	
	
	?>
	
	</td>
	<td align="center"><i>
	<a href="begin_stock_transfer.php?order_code=<?php echo $rows->stock_transfer_id;?>">View Items</a>
	
	</font></i></td>
	
    <td align="center"><a onClick="return confirmDelete();" rel="facebox" href="cancel_stock_transfer_reason.php?order_code=<?php echo $rows->stock_transfer_id; ?>">Cancel Transfer</a></td>
  <!--  <td align="center">
	<a onClick="return confirmDelete();" href="delete_requisition_item.php?requisition_item_id=<?php echo $rows->requisition_item_id; ?>&booking_id=<?php echo $booking_id; ?>&requisition_id=<?php echo $requisition_id; ?>" onClick="return confirmDeleteItem();"><img src="images/delete.png"></a>
	</td>-->
	
   
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
</form>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "to"       // ID of the button
    }
  );
  
  
  
  </script> 
 <?php }?>

