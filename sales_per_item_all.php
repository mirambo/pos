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
?>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to cancel this invoice?");
}

</script>

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
   

    <td  colspan="11" align="center">   <strong>Filter By Customer<font color="#FF0000">* </font></strong>
	<select name="location_id"><option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from customer order by customer_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->customer_id;?>"><?php echo $rows1->customer_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  <?php
if ($incharge==1)
{

	?>
	
<strong>Or By Shop </strong>
	
	
	
	<select name="shop_id">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from account where account_type_id='10' order by account_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_id; ?>"><?php echo $rows1->account_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
								  
								  <?php 
								  
								 } 
								  ?>
								  
	<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />							  
								  		  
								  
<input type="submit" name="generate" value="Generate">	

<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_all_sales_items.php?location_id=<?php echo $supplier; ?>&from=<?php echo $date_from ?>&to=<?php echo $date_to; ?>">Print</a>						  
							  
								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="150"><strong>Invoice No</strong></td>   
    <!--<td align="center" width="150"><strong>Shop</strong></td>   -->
    <td align="center" width="150"><strong>Sales Date</strong></td>
<td align="center" width="300"><strong>Customer Name</strong></td>  
<td align="center" width="150"><strong>Invoice Value </strong></td> 
    <td align="center" width="150"><strong>Amount Paid</strong></td>
<td align="center" width="150"><strong>Balance</strong></td> 
	<!--<td align="center" width="150"><strong>Amount(Kshs)</strong></td>
	<td align="center" width="150"><strong>Balance Payment Date</strong></td>  
	 <td align="center" width="150"><strong>Balance Payment Alert</strong></td>-->  
	<td align="center" width="150"><strong>Generated By</strong></td>    
	<td align="center" width="150"><strong>Sale Type</strong></td>    
    <td align="center" width="150"><strong>View Details</strong></td>
<td align="center" width="150"><strong>Cancel Invoice</strong></td>      
   <!-- <td align="center" width="150"><strong>Job Card Details</strong></td> -->
	
	<!--<td align="center" width="100"><strong>Cancel</strong></td>-->
    </tr>


 <?php 
 $job_card_ttl=0;
 $inv_ttl=0;
 $gnd_bal=0;
 
 if ($user_group_id==15 || $user_group_id==34)

 {

 
 if (!isset($_POST['generate']))
{

$querydc="SELECT * FROM sales where canceled_status='0' order by sales_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $sql.".mysql_error());
}
else
{
$supplier=$_POST['location_id'];
$shop_id=$_POST['shop_id'];
echo $date_from=$_POST['from'];
echo $date_to=$_POST['to'];

$querydc= "SELECT * FROM sales";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "sales.customer_id='$supplier'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = " sales.sale_date>='$date_from' AND sales.sale_date<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." and canceled_status='0' order by sales_id desc";
    }
	else
	{	
	
$querydc="SELECT * FROM sales and canceled_status='0' order by sales_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}

 }
 ////send of super dmin
 else
	 
	 {
		 
	if (!isset($_POST['generate']))
{

$querydc="SELECT * FROM sales where sales_rep='$user_id' and canceled_status='0' order by sales_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $sql.".mysql_error());
}
else
{
$supplier=$_POST['location_id'];
$shop_id=$_POST['shop_id'];
echo $date_from=$_POST['from'];
echo $date_to=$_POST['to'];

$querydc= "SELECT * FROM sales";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "sales.customer_id='$supplier'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = " sales.sale_date>='$date_from' AND sales.sale_date<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND sales_rep='$user_id' and canceled_status='0' order by sales_id desc";
    }
	else
	{	
	
$querydc="SELECT * FROM sales where sales_rep='$user_id' and canceled_status='0' order by sales_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

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

  
   

<?php $job_card_id=$rows->sales_id;?>
    <td>
	<a style="font-weight:bold; color:#000; text-decoration:none;" href="generate_invoice.php?sales_id=<?php echo $rows->sales_id;?>">
	
	<?php echo $invoice_no=$rows->invoice_no;?></a></td>
    <!--<td><?php 

	$shop_id=$rows->shop_id;
	
	
	
$sqlsp="select * from account where account_id='$shop_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$row=mysql_fetch_object($resultsp);

echo $row->account_name;
	
	
	
	?></td>-->
  
    <td><?php echo $rows->sale_date;?></td>
    <td>
	<?php 
	 $customer_id=$rows->customer_id;
	
$sqllpdet="SELECT * from customer where customer_id='$customer_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
	
	
	echo $rowslpdet->customer_name;?>
	
	
	</td>
    <td align="right"><?php include ('invoice_value.php');?></td>
    <td align="right">
	
<?php 
	
	$sale_type=$rows->sale_type;
	
	if ($sale_type=='cr')
	
	{
	
	include ('invoice_payment_value.php');
	$grnd_inv_payment=$grnd_inv_payment+$all_amnt_totals;
	$bal=$task_totals-$all_amnt_totals;
	}
	else
	{
		
	echo number_format($task_totals,2);
	
	$grnd_cash_payment=$grnd_cash_payment+$task_totals;
		$bal=0;
	}
	
	

	
	?>
	
	
	</td>
   
	<td align="right">
	
	<?php
echo number_format($bal,2);


$gnd_bal=$gnd_bal+$bal;
	?>
	
	
	
	</td>
	

	
	
	
	
<td>
	<i><font size="-2">
	<?php $gen_by=$rows->user_id;
$sqlst="SELECT * FROM  users where user_id='$gen_by'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i>
	
	</td>
	
	<td>
	<i><font size="-2">
	<?php 
	$sale_type=$rows->sale_type;
	if ($sale_type=='cr')
	
	{

echo "Invoice";
	}
	else
	{


echo "Cash Sale";		
		
	}

?>

</td>
	
	</font></i>
	
	</td>
	<td align="center">
	
	<?php 

	if ($sale_type=='cr')
	
	{

?>

<a href="generate_invoice.php?sales_id=<?php echo $rows->sales_id;?>">View invoice Details</a>

<?php 
	}
	else
	{

?>

<a href="generate_cash_sales.php?sales_id=<?php echo $rows->sales_id;?>">View Cash Sales Details</a>

<?php 
		
		
	}

?>

</td>
	</td>

 <td align="right"><a rel="facebox" href="cancel_submited_invoices.php?sales_id=<?php echo $rows->sales_id;?>" onClick="return confirmDelete();">Cancel Invoice</a></td>

 <!--<td></td>-->
	
   
    </tr>

  <?php 
  
  }
  
  ?>
  <tr bgcolor="#FFFFCC">

  <td></td>
  <td></td>
    <td></td>
  <td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($job_card_ttl,2); ?></font></strong></td>
  <td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($grnd_cash_payment+$grnd_inv_payment,2); ?></font></strong></td>
  <td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($gnd_bal,2); ?></font></strong></td>
 <td></td>
 <td></td>


   
  <td></td>
  <td></td>
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