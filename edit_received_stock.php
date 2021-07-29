<?php 
include('Connections/fundmaster.php'); 
$received_stock_id=$_GET['received_stock_id'];
$view=$_GET['view'];
$rec_order_code=$_GET['rec_order_code'];
$sqllpdet="select * from suppliers,items,received_stock 
where items.item_id=received_stock.product_id and suppliers.supplier_id=received_stock.supplier_id AND received_stock.received_stock_id='$received_stock_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
?>
<!--<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>-->
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<form name="rec_prod" action="process_edit_received_stock.php?received_stock_id=<?php echo $received_stock_id;?>" method="post">					
				<table width="100%" border="0">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><strong><font color="#ff0000">Panel for Updating Stock in the Warehouse</strong></td>
    </tr>
  <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><?php
if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:450px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Stock Received successfully into the warehouse</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";

if ($_GET['exist']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! The Record Exists!!</font></p>";

if ($_GET['abnormal']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! Qantity Received cannot be more than ordered!!</font></p>";
?>
</td>
    </tr>
  
 
	<tr height="30">
    <td>&nbsp;</td>
    <td  width="30%">Select Product<font color="#FF0000">*</font></td>
    <td>
	<select name="prod"><option value="<?php echo $rowslpdet->product_id?>"><?php echo $rowslpdet->item_name;?></option>
								  <?php
								  
$sql1="select * from items
,purchase_order where purchase_order.product_id=items.item_id and purchase_order.order_code='$order_code'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->item_id; ?>"><?php echo $rows1->item_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>	</td>
    </tr>
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address</td>
    <td><input type="text" size="41" name="email" value="<?php echo $email;?>"></td>
    </tr>-->
	<tr height="30" >
    <td width="10%">
	<input type="hidden" name="order_code" size="20" value="<?php echo $order_code; ?>">
<input type="hidden" name="supplier_id" size="20" value="<?php echo $supplier_id;?>">
<input type="hidden" name="purchase_order_id" size="20" value="<?php echo $rows1->purchase_order_id;?>"></td>
    <td>Quantity Received<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="qnty_rec" value="<?php echo $rowslpdet->quantity_rec;?>">
	
	
	
	</td>
    </tr>
	<!--<tr height="30">
    <td>&nbsp;</td>
    <td>Current Exchange Rate</td>
    <td><input type="text" name="delivery_date" size="41" id="delivery_date" readonly="readonly" /></td>
    </tr>-->
	<tr height="30">
    <td>&nbsp;</td>
    <td>Enter Delivery Date</td>
    <td><input type="text" name="delivery_date" size="41" id="delivery_date" value="<?php echo $rowslpdet->delivery_date;?>"/></td>
    </tr>
	<tr height="30">
    <td>&nbsp;</td>
    <td>Enter Expiry Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="expiry_date" size="41" id="expiry_date" value="<?php echo $rowslpdet->expiry_date;?>"/></td>
    </tr>
<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Over-Payment / Under-Payment? <font color="#FF0000">*</font></td>
    <td>
	Over-Payment&nbsp;<input type="radio" size="41" name="bal_type"  value="1">&nbsp;&nbsp;
	Under-Payment<input type="radio" size="41" name="bal_type" checked="checked" value="0">&nbsp;&nbsp;
	Zero Balance<input type="radio" size="41" name="bal_type" checked="checked" value="x">
	
	
	</td>
    </tr>-->
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>

  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td colspan="2"><div id='rec_prod_errorloc' class='error_strings'></div></td>
   
    </tr>
 
</table>

	</form>		

</form>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "delivery_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "delivery_date"       // ID of the button
    }
  );
		
	  </SCRIPT>