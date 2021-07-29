<?php include('Connections/fundmaster.php'); 
$product_id=$_GET['product_id'];
$order_code_id=$_GET['order_code_id'];




?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
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

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}
</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/issue_items_submenu.php');  ?>
		
		<h3>::List Of All Issued Items To Staff</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
<?php include ('top_grid_includes.php');?>
			
<form name="filter" method="post" action="">				
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	<?php
	
$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="12" align="center" valign="top">
	<strong>Filter By Item Category
    </strong>
    <select name="client_id" style="width:150px;">
	<option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from items_category order by cat_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id;?>"><?php echo $rows1->cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
							  
    
    
	

	
	<strong>Or By Item Name</strong>	
	<input type="text" name="item_name" size="30" />
	

	
	<strong>Delivery Date</strong>
						<strong>From : </strong><input type="text" name="from" size="15" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="15" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Search">
			
 <!--<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_received_stock.php">Print</a>	-->		
 
	
	</td>
	
    </tr>
	</table>
	<table  border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px; width:10%" id="example">	

    <thead>
	
	
  
    <tr style="background:url(images/description.gif);" height="30" >
	<td width="7%"><div align="center"><strong>Item Code</strong></td>
    <td width="15%"><div align="center"><strong>Item Name</strong></td>
    <td width="5%"><div align="center"><strong>Requisition No</strong></td>
    <td width="5%"><div align="center"><strong>Ref No</strong></td>
	<td width="9%"><div align="center"><strong>Qty Issued</strong></td>
<td width="9%"><div align="center"><strong>Date Issued</strong></td>
<td width="9%"><div align="center"><strong>Issued To</strong></td>
<td width="9%"><div align="center"><strong>Issued By</strong></td>
<!--<td width="9%"><div align="center"><strong>Account Credited</strong></td>-->
<!--<td width="9%"><div align="center"><strong>Account Debited</strong></td>-->
<td width="9%"><div align="center"><strong>Delete</strong></td>
	<!--<td width="8%"><div align="center"><strong>Delete</strong></td>-->


    </tr>
	</thead>
  

  
  			<?php 	

if (!isset($_POST['generate']))
{
 
$querydc="select * FROM issued_items,items,requisition 
WHERE issued_items.requisition_id=requisition.requisition_id AND issued_items.item_id=items.item_id order by issued_item_id desc";
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
$id=$rows->issue_item_id; 
 
 ?>
  <td><?php echo $rows->item_code;?></td>
    <td><?php echo $rows->item_name;?></td>	
	<td><?php echo 
	
	$order_code_id=$rows->requisition_no;
	
	
	?></td>
		<td><?php echo 
	
	$ref_no=$rows->ref_no;
	
	
	?></td>
		<td><?php echo 
	
	$note_no=$rows->quantity_issued;
	
	
	?></td>
<td><?php echo $rows->date_issued;?></td>



	

	
	

	
	
	<td align=""><?php  
	$requested_by=$rows->requested_by;
	$sqlq="select * from users where user_id='$requested_by'";
$resultsq= mysql_query($sqlq) or die ("Error $sqlq.".mysql_error());

$rowsq=mysql_fetch_object($resultsq);

echo $rowsq->f_name;
	
	?></td>
		<td align=""><?php  
	$issued_by=$rows->issued_by;
	$sqlq="select * from users where user_id='$issued_by'";
$resultsq= mysql_query($sqlq) or die ("Error $sqlq.".mysql_error());

$rowsq=mysql_fetch_object($resultsq);

echo $rowsq->f_name;
	
	?></td>

	<!--<td><?php $atc=$rows->account_to_credit;
	
$sqlq2="select * from account_type where account_type_id='$atc'";
$resultsq2= mysql_query($sqlq2) or die ("Error $sqlq.".mysql_error());

$rowsq2=mysql_fetch_object($resultsq2);

echo $rowsq2->account_code.' '.$rowsq2->account_type_name;	
	
	
	
	
	
	
	
	
	
	
	
	?></td>
	<td><?php $atb=$rows->account_to_debit;
	
	
	$sqlq2="select * from account_type where account_type_id='$atb'";
$resultsq2= mysql_query($sqlq2) or die ("Error $sqlq.".mysql_error());

$rowsq2=mysql_fetch_object($resultsq2);

echo $rowsq2->account_code.' '.$rowsq2->account_type_name;	
	
	
	
	
	
	?></td>-->


	<!--<td align="center">
	
		<?php if ($sess_allow_edit==1) 
	{
	?>
	
	<a rel="facebox" href="edit_issued_item.php?issue_item_id=<?php echo $rows->issued_item_id; ?>&order_code_id=<?php echo $order_code_id; ?>"><img src="images/edit.png"></a>
	<?php 
	}
	else
	{
		
		
	}
	
	?>
	
	
	</td>-->
    <td align="center"><a href="delete_issued_items.php?issued_item_id=<?php echo $rows->issued_item_id; ?>&order_code_id=<?php echo $order_code_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    
	
</tr>
  <?php 
$ttl_rec_prod=$ttl_rec_prod+$rec_prod;
  }
  ?>
  <!--<tr bgcolor="#FFFFCC" height="30">
    <td width="400"><div align="center"><strong></strong></td>
		<td ><div align="center"></td>
	<td ><div align="center"><strong></strong></td>
	<td ><div align="center"><strong></strong></td>

	<td ><div align="center"><strong><?php echo $ttl_rec_prod;?></strong></td>

	
	<td ><div align="center"></td>
	<td ><div align="center"></td>
	<td ><div align="center"></td>
	<td ><div align="center"></td>
	<td ><div align="center"></td>



    </tr>-->
  
  
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