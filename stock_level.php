<?php 
include('Connections/fundmaster.php'); 

include('row_color.php');

$supplier=$_POST['supplier'];
$item_name=$_POST['item_name'];
$shop_id=$_POST['shop_id'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}
</script>
<?php include('includes/facebox.php'); ?>

<body onload="javascript:window.opener.childClosed(); window.close();">

	<div id="page-wrap">

		<?php include ('header.php')?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/warehousesubmenu.php');  ?>
		
		<h3>::Inventory / Stock</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
				
<form name="filter" method="post" action="">				
			
<table width="80%" border="0" align="center">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="13" height="30" align="center"> 
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
	
	
	<tr align="center" height="40">
	<td colspan="13" bgcolor="#FFFFCC" height="20" align="center" ><strong>Search By Item Category:</strong>
	
	<select name="supplier">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from items_category order by cat_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id; ?>"><?php echo $rows1->cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
	
	<?php
if ($incharge==14)
{

	?>
	
	
	
<!--<strong>Or By Shop </strong>
	
	
	
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
								  
								  </select>-->
								  
								  <?php 
								  
								 } 
								  ?>

				<strong>Or By Item Name</strong>				  
<input type="text" name="item_name" size="20" />								  
								  
								  <input type="submit" name="generate" value="Filter">
								  
								  
								  
								  <a target="_blank" style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_list_inventory.php">Print</a>						  
<a  style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_list_inventory_excel.php">Export To Excel</a>						  

								  
								  </td>
	
    </tr>
	
	<!--<tr style="background:url(images/description.gif);" height="30">
	<td><strong>Shop Name</strong></td>
	<td colspan="10">Stock Details</td>
	</tr>-->
	
	<tr style="background:url(images/description.gif);" height="30" >

    <!--<td width="10%"><div align="center"><strong>Shop Name</strong></td>-->
    <td width="10%"><div align="center"><strong>Item Name</strong></td>
	<!--<td width="10%"><div align="center"><strong>Adjust</strong></td>-->
	<td width="8%"><div align="center"><strong>Availlable Stock</strong></td>
    <!--<td width="7%"><div align="center"><strong>Reorder level  </strong></td>
    <td width="16%"><div align="center"><strong>Alert Now</strong></td>-->
    </tr>
	 
  <?php 

//$grnd_ttl_cost_of_sales=0;  
$tt_received_prod=0;
if (!isset($_POST['generate']))
{
		 
/* $sql="select SUM(item_transactions.quantity) as ttl_avail,items.item_name,items.item_id,item_transactions.shop_id,account.account_name from account,item_transactions,items
 where item_transactions.item_id=items.item_id and item_transactions.shop_id=account.account_id group by  
 item_transactions.shop_id ORDER BY item_name asc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

$sql="select SUM(item_transactions.quantity) as ttl_avail,items.item_name,items.item_id,item_transactions.shop_id,account.account_name from account,item_transactions,items
 where item_transactions.item_id=items.item_id and item_transactions.shop_id=account.account_id GROUP BY item_transactions.shop_id, item_transactions.item_id ORDER BY item_name asc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error()); 
}
else
{


$item_name=$_POST['item_name'];
$shop_id=$_POST['shop_id'];

$querydc= "select SUM(item_transactions.quantity) as ttl_avail,items.item_name,items.item_id,item_transactions.shop_id,account.account_name from account,item_transactions,items";
    $conditions = array();

	
	if($shop_id!=0) 
	
	{
	
    $conditions[] = "item_transactions.shop_id='$shop_id'";
	
    }
	
	if($item_name!='') 
	
	{
	
    $conditions[] = "item_transactions.shop_id='$shop_id'";
	
    }

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND item_transactions.item_id=items.item_id and item_transactions.shop_id=account.account_id 
	  GROUP BY item_transactions.item_id ORDER BY item_name asc";
    }
	else
	{	
	
$querydc="select SUM(item_transactions.quantity) as ttl_avail,items.item_name,items.item_id,item_transactions.shop_id,account.account_name from account,item_transactions,items
 where item_transactions.item_id=items.item_id and item_transactions.shop_id=account.account_id GROUP BY item_transactions.item_id ORDER BY item_name asc";
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
echo '<tr bgcolor="#C0D7E5" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
 
 $prod_id=$rows->item_id;	
 ?>
  <!--<td><?php echo $rows->account_name;?></td>-->
  <td><?php echo $rows->item_name;?></td>

  <td onClick="document.location.href='view_stock_card.php?item_id=<?php echo $item_id=$rows->item_id;?>'"><?php echo $rows->ttl_avail;?></td>
  
	

    </tr>
  <?php 
  $grnt_amnt_ttl_cost=$grnt_amnt_ttl_cost+$ttl_cost;
  $ttl_stock=$ttl_stock+$avail_prod;
  $ttl_qnty_sold=$ttl_qnty_sold+$sold_prod;
  $grnd_ttl_cost_of_sales=$grnd_ttl_cost_of_sales+$ttl_cost_of_sales;
  }
  ?>
  <tr bgcolor="#FFFFCC" height="30">

    <!--<td width="400"><div align="center"><strong></strong></td>-->
    <td width="400"><div align="center"><strong></strong></td>

	<td width="300"><div align="center"><strong><?php //echo number_format($tt_received_prod,0);?></strong></td>
	
   
    </tr>
  
  
  <?php 
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="13" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>


</td>							  
							  
							  
							  
							  <?php


							  ?>
	
	
	
	
	
	
	
	
  
    
</table>
</form>		


			

			
			
			
					
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