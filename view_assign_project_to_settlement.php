<?php

if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
if(isset($_GET['subDELETEsettlement']))
  { 
$settlement_id=$_GET['settlement_id'];
 delete_settlement($settlement_id);
  }
  
$supplier=$_POST['location_id'];
$shop_id=$_POST['shop_id'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$sale_type=$_POST['sale_type'];
?>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to cancel this invoice?");
}

</script>


<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<?php 
 include ('top_grid_includes.php'); 
?>

<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="15" height="30" align="center"> 
	<?php

if ($_GET['cancelconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Invoice No. '.$_GET['invoice_no']. ' Cancelled Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
	<tr height="30" bgcolor="#FFFFCC">
   

    <td  colspan="15" align="center">   <strong>Filter By Service<font color="#FF0000">* </font></strong>
	<select name="location_id"><option value="0">Select.....................</option>
								  <?php
								  
								  $query1="select * from items where item_section='I' order by item_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  <strong>Or By Service Type</strong>
								  <select name="sale_type">
	<option value="">Select.....................</option>
	<option value="cr">Credit Services</option>
	<option value="cs">Cash Services</option>
								  
								  
								  </select>
								  
	<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="20" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="20" id="to" readonly="readonly" />							  
								  		  
								  
<input type="submit" name="generate" value="Generate">	

<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_sales_items.php?location_id=<?php echo $supplier; ?>&from=<?php echo $date_from ?>&to=<?php echo $date_to; ?>&shop_id=<?php echo $shop_id; ?>&sale_type=<?php echo $sale_type ?>">Print</a>						  
							  
								  
								  </td>
    
  </tr>
  
  
  </table>
  	<table width="99%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  
<td align="center" width="150"><strong>Invoice No</strong></td>   
<td align="center" width="150"><strong>Transaction Date</strong></td>
<td align="center" width="150"><strong>Service Name</strong></td> 
<td align="center" width="150"><strong>Attendant</strong></td> 
<td align="center" width="150"><strong>Service Cost </strong></td> 
<td align="center" width="150"><strong>Gross Revenue</strong></td> 
<td align="center" width="150"><strong>Rate</strong></td> 
<td align="center" width="150"><strong>Totals Revenue (TZS)</strong></td> 
<td align="center" width="150"><strong>Generated By</strong></td>    


</tr>
</thead>

 <?php 
 $job_card_ttl=0;
 $inv_ttl=0;
 $gnd_bal=0;
 
 

 
 if (!isset($_POST['generate']))
{
 
$querydc="SELECT * FROM sales,sales_item,items,currency where currency.curr_id=sales.currency and sales_item.item_id=items.item_id 
and sales.sales_id=sales_item.sales_id order by sales.datetime_generated desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());
}
else
{


$querydc= "SELECT * FROM sales,sales_item,items";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "sales_item.item_id='$supplier'";
	
    }
	

	
	if($sale_type!='') 
	{
	
    $conditions[] = " sales.sale_type='$sale_type'";
	  
    }
	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = " sales.sale_date >='$date_from' AND sales.sale_date<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND sales_item.item_id=items.item_id 
and sales.sales_id=sales_item.sales_id order by sales.datetime_generated desc";
    }
	else
	{	
	
$querydc="SELECT * FROM sales,sales_item,items where sales_item.item_id=items.item_id 
and sales.sales_id=sales_item.sales_id order by sales.datetime_generated desc";
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

  
   

    <td><?php echo $inv_no=$rows->invoice_no;
	
	$job_card_id=$rows->sales_id;
	
	
	?></td>
  
  

    <td><?php 
  
 echo $rows->sale_date;
  
  
  ?></td>
    <td>
	<?php 
	
	
	 /* $customer_id=$rows->customer_id;
	
$sqllpdet="SELECT * from customer where customer_id='$customer_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet); */
	
	
	echo $rows->item_name;?>
	
	
	</td>
    <td align="right"><?php
echo number_format($item_quantity=$rows->item_quantity,2);

$ttl_quant=$ttl_quant+$item_quantity;

	//include ('invoice_value.php');
	
	
	?></td>


	
	
	
	<td align="right">
	
	<?php
//echo $rows->curr_name.' ';
	//include ('invoice_payment_value.php');
	
	echo number_format($sp=$rows->item_cost,5);
	
	
	
	?>
	
	
	</td>

	
	<td align="right">
	
	<?php //include ('invoice_payment_value.php');
	
	echo number_format($ttl_sales=$sp*$item_quantity,2);
	
	
	$ttl_presale=$ttl_presale+$ttl_sales;
	
	
	?>
	
	
	</td>
	
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2); ?></td>
	<td align="right">
	
	<?php 
	
	echo number_format($sales_tshs=$curr_rate*$ttl_sales,2);
	
	
	$ttl_sales_tshs=$ttl_sales_tshs+$sales_tshs;
	
	?>
	
	</td>

   

	
	
	

	
	
	
	
<td>
	<i><font size="-2">
	<?php $staff=$rows->user_id;
$sqlst="SELECT * FROM  users where user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i>
	
	</td>
	
 <!--
 <td align="right"><a rel="facebox" href="cancel_submited_invoices.php?sales_id=<?php echo $rows->sales_id;?>" onClick="return confirmDelete();">Cancel Invoice</a></td>

<td></td>-->
	
   
    </tr>

  <?php 
  
  }
  
  ?>
  <tr bgcolor="#FFFFCC">
 

  <td>Totals</td>

  <td></td>
  <td></td>

    <td align="right"><strong><?php echo number_format($ttl_quant,2); ?></strong></td>


   <td></td>



  <td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($ttl_presale,2); ?></font></strong></td>
  <td align="right"><strong><font size="+1" color="#ff0000"><?php //echo number_format($gnd_bal,2); ?></font></strong></td>
  <td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($ttl_sales_tshs,2); ?></font></strong></td>


  <td></td>
 
  
  </tr>
  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr bgcolor="#FFFFCC" height="30"><td colspan="11" align="center"><font color="#ff0000"><strong>No Results found!!</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
  
  </table>
   </td></tr>	 
  
  
  
  
  
  
</table>
</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "to"       // ID of the button
    }
  );
  
  
  
  </script> 
 <?php }?>