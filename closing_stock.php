<?php include('Connections/fundmaster.php'); 



$cat_id=$_POST['cat_id'];

$sql_m="SELECT * FROM items_category where cat_id='$cat_id'";
$results_m= mysql_query($sql_m) or die ("Error $sql_m.".mysql_error());
$rows_m=mysql_fetch_object($results_m);
$cat_name=$rows_m->cat_name;




?>
<title>Stock In The Warehouse</title>
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
<!--<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>-->
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="jquery.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
     
    $("#parent_cat").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_items.php?parent_cat=' + $(this).val(), function(data) {
    $("#sub_cat").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
 $("#sub_cat").change(function() {
  // $(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_student.php?sub_cat=' + $(this).val(), function(data2) {
    $("#combobox").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });	
	 
	
	 });
 
 </script>
 
 <?php 
  include ('top_grid_includes.php'); 
 
 ?>

<body>

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
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="11" align="center" valign="top">
	<strong>Search By Category
    </strong>
    
<select name="cat_id" id="customer_id" required style="width:260px;"><option value='<?php echo $cat_id; ?>'><?php echo $cat_name; ?></option>
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
	
	
	
	
	
	<input type="submit" name="generate" value="Search">
	<!--
<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_items.php">Print</a>						  

-->
	</td>
	
    </tr>
	
	
	
  </table>
  <table width="98%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px; background:#ff0000" id="example">	

    <thead>
    <tr style="background:url(images/description.gif);" height="30" >
	<td width="7%"><div align="center"><strong>Item Code</strong></td>
    <td width="18%"><div align="center"><strong>Item Name</strong></td>
    <td width="13%"><div align="center"><strong>Category</strong></td>
    <td align="center" width="50"><strong>Item Sub Category</strong></td>
    <td width="6%"><div align="center"><strong>Qty Received</strong></td>

	<td width="6%"><div align="center"><strong>Qty Issued</strong></td>

	<td width="6%"><div align="center"><strong>Qty Avlb</strong></td>
	<td width="6%"><div align="center"><strong>BP</strong></td>
	<td width="6%"><div align="center"><strong>Value(Tshs)</strong></td>

	
    <td width="7%"><div align="center"><strong>Reorder level  </strong></td>
    <td width="8%"><div align="center"><strong>Alert Now</strong></td>
    </tr>
  </thead>
  
  <?php  

//$grnd_ttl_cost_of_sales=0;  
$ret_prod=0;
$rec_prod=0;
$prod_sold=0;
if (!isset($_POST['generate']) && isset($_GET['item_id']))
{

$queryop="SELECT * FROM items,items_category where items.cat_id=items_category.cat_id 
AND items.item_section='S' order by item_name asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());	
}


else
{
$code=$_POST['code'];
$prod_name=$_POST['prod_name'];	
$location_id=$_POST['location_id'];	

$queryop= "SELECT * FROM items,items_category";
    $conditions = array();
	

 if($cat_id!='') 
 {
	
      $conditions[] = "items.cat_id='$cat_id'";
}


 	
if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." and items.cat_id=items_category.cat_id 
AND items.item_section='S' order by item_name asc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$queryop="SELECT * FROM items,items_category where items.cat_id=items_category.cat_id 
AND items.item_section='S' order by item_name asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
 
 
 }
	
	

    $results = mysql_query($queryop) or die ("Error $queryop.".mysql_error());
	
	
	
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
 
$prod_id=$rows->item_id;
 ?>
  <td><?php echo $rows->item_code;?></td>
   <td><a href="view_stock_card.php?item_id=<?php echo $item_id=$rows->item_id;?>"><?php echo $rows->item_name; $curr_sp=$rows->curr_sp; $curr_rate=$rows->exchange_rate;?></a></td>

<td><?php echo $rows->cat_name;?></td>

 <td><?php $sub_cat_id=$rows->sub_cat_id;
 $query_valc = mysql_query("SELECT sub_cat_name FROM items_sub_category WHERE sub_cat_id ='$sub_cat_id'");
$row_valc = mysql_fetch_array($query_valc);
   echo $row_valc['sub_cat_name']; 
   ?></td>
    <td align="center">
	
	<?php 
	
$sqlrec="select SUM(quantity_rec) as ttl_rec from received_stock
	where product_id='$prod_id'";
	$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());
	$rowsrec=mysql_fetch_object($resultsrec);
	
 	
	echo number_format($rec_prod=$rowsrec->ttl_rec,2);
	$curr_bp=$rows->curr_bp;
	$curr_sp=$rows->curr_sp;
	
	$ttl_rec=$ttl_rec+$rec_prod;
	
   
	$purchase_order_id=$rows->purchase_order_id; 
	
	
	
	?></td>
	
	
		

	<td align="center">
	
	
	<?php 
	
	$sqlsold2="select SUM(quantity_issued) as ttl_sold from issued_items
	where item_id='$prod_id'";
	$resultssold2= mysql_query($sqlsold2) or die ("Error $sqlsold2.".mysql_error());
	$rowsold2=mysql_fetch_object($resultssold2);
	
  number_format($prod_sold=$rowsold2->ttl_sold,0);
 
	echo number_format($prod_sold,2);

$ttl_cash_sold=$ttl_cash_sold+$prod_sold;
	

	 
	
	
	?></td>
	

	<td align="center"><strong><font size="">
	
	
	<?php echo number_format($avail_prod=$rec_prod-$prod_sold,2);
	
	$ttl_avl=$ttl_avl+$avail_prod;
	
	
	
	//echo $rows->curr_bp;?></strong></td>
	<td align="right"><?php echo number_format($curr_bp=$rows->curr_bp,2); ?></td>
	<td align="right"><strong><?php echo number_format($stock_value=$curr_bp*$avail_prod,2); 
	
	$ttl_stock_value=$ttl_stock_value+$stock_value;
	?><strong></td>



	
	<td align="center"><strong><?php
	
echo $reorder_level=$rows->reorder_level;
	
	
	?></strong></td>
  
	<td align="center">
	
	<?php 
	
	
	if ($reorder_level>=$avail_prod)
	
	{
	
	echo "<blink><font color='#ff0000'>Reorder</font></blink>";
	
	}
	
	
	?>
	
	
	</td>
	
	
	
  
    </tr>
  <?php 
  /* $grnt_amnt_ttl_cost=$grnt_amnt_ttl_cost+$ttl_cost;
  $ttl_stock=$ttl_stock+$avail_prod;
  $ttl_qnty_sold=$ttl_qnty_sold+$all_sold_prod;
  $grnd_ttl_cost_of_sales=$grnd_ttl_cost_of_sales+$ttl_cost_of_sales; */
  }
  ?>
  <table>
  <tr bgcolor="#FFFFCC" height="30">
    <td width="400"><div align="center"><strong></strong></td>
    <td width="400"><div align="center"><strong></strong></td>
    <td width="400"><div align="center"><strong></strong></td>
    <td width="400"><div align="center"><strong></strong></td>

	<td width="300"><div align="center"><strong>Totals</strong></td>
	<td width="300"><div align="center"><strong><?php echo number_format($ttl_rec,0); ?></strong></td>
	<td width="300"><div align="center"><strong><?php echo number_format($ttl_ret,0); ?></strong></td>
    <td width="300"><div align="center"><strong><?php echo number_format($ttl_cash_sold,0); ?></strong></td>
	<td width="400"><div align="center"><strong><?php echo number_format($ttl_avl,0); ?></strong></td>
	<td width="400"><div align="center"><strong></strong></td>
	<td width="400" colspan="" align="left"><strong><font size="+1" color="#ff0000"><?php echo number_format($ttl_stock_value,0); ?></font></strong></td>
	<td width="300"><div align="right"><strong></strong></td>
	<!--<td width="300"><div align="right"><strong></strong></td>-->




    </tr>
  
  </table>
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