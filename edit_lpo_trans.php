<?php
include('Connections/fundmaster.php');
$order_code=$_GET['order_code'];
$purchase_order_id=$_GET['purchase_order_id'];
$view=$_GET['view'];
$approved=$_GET['approved'];
$sqltemp="select * FROM purchase_order,items WHERE purchase_order.product_id=items.item_id 
AND purchase_order.purchase_order_id='$purchase_order_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);

$order_vat=$rowstemp->order_vat;
$order_vat_value=$rowstemp->order_vat_value;

$sqlrec2="select * FROM order_code_get WHERE order_code_id='$order_code'";
$resultsrec2= mysql_query($sqlrec2) or die ("Error $sqlrec2.".mysql_error());	
$rowsrec2=mysql_fetch_object($resultsrec2);

$approved_status=$rowsrec2->status;
$approved_status=$rowsrec2->status;

if ($approved_status==3)
{
?>

 <script language="Javascript">

 function redirectToFB(){
            window.opener.location.href="begin_order.php?order_code=<?php echo $order_code; ?>";
            setTimeout("self.close()", 100);
        }

    </script>


	</br></br>
<p align="center" style="height:50px;" ><input type="submit" name="submit" onClick="return redirectToFB();" value="SORRY!! THIS ORDER HAS BEEN HAS POSTED. CANNOT BE ADJUSTED"  style="background:#ff0000; top:50px; font-size:14px; color:#ffffff; font-weight:bold; width:auto; height:30px; border-radius:5px;"></p>
</BR>
<p align="center" style="height:50px;" >
<input type="submit" name="submit" onClick="return redirectToFB();" value="OK"  style="background:#2E3192; top:50px; font-size:14px; color:#ffffff; font-weight:bold; width:150px; height:30px; border-radius:5px;">



<?php	
	
}

else
{


if (isset($_POST['submit']))
{
$order_code=mysql_real_escape_string($_POST['order_code']);
$purchase_order_id2=mysql_real_escape_string($_POST['purchase_order_id2']);

?>
 <script language="Javascript">

        function redirectToFB(){
            window.opener.location.href="begin_order.php?order_code=<?php echo $order_code; ?>";
            self.close();
        }

    </script>
<?php
//echo "cliecked";
//$order_code=mysql_real_escape_string($_POST['order_code']);

	
$item_name=mysql_real_escape_string($_POST['countryname']);
$prod2=mysql_real_escape_string($_POST['country_no']);

$qnty=mysql_real_escape_string($_POST['phone_code']);
$vend_price=mysql_real_escape_string($_POST['country_code']);
$vat=mysql_real_escape_string($_POST['vat']);
$order_vat_value=mysql_real_escape_string($_POST['order_vat_value']);

if ($vat==1)
{
	
	
	
//$vat_value=$vend_price*$qnty*0.18;
$vat_value=$order_vat_value;



}
else
{
	
$vat_value=0;	
}



$sql= "update purchase_order set product_id='$prod2',description='$description',order_vat='$vat',order_vat_value='$vat_value',quantity='$qnty',vendor_prc='$vend_price' 
where purchase_order_id='$purchase_order_id2'";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());

//header ("Location:begin_order.php?order_code=$order_code&addpartconfirm=1");

if ($results)
{ ?>
<script>
redirectToFB();
</script>
<?php
}
}
else
{

?>

<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />    
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" /> 
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!--<form name="new_machine_category" action="process_add_lpo_item.php" onsubmit="return closeSelf(this);" method="post">-->	
<form name="new_machine_category" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return closeSelf(this);" method="post">	


  
	<input type="hidden" size="41" name="order_code" value="<?php echo $order_code;?>">
	<input type="hidden" size="41" name="purchase_order_id2" value="<?php echo $purchase_order_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">

<table width="80%" border="1" class="table" style="margin:auto;">
<tr bgcolor="#2E3192"><td colspan="6"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Items Details</strong></td></tr>

							<tr>
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    <!--<th>S. No</th>-->
							    <th>Item Name</th>
							 
							    <th>Enter Quantity</th>
							    <th>Price</th>
							    <th>VAT</th>
							    <th>VAT Value</th>
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" style='height:30px; border-radius:5px;' size="60" type='text' id='countryname_1' name='countryname' value="<?php echo $rowstemp->item_name; ?>"/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' id='country_no_1' name='country_no' value="<?php echo $rowstemp->item_id; ?>"/>
								<input class="form-control" type='text'  style='height:30px; border-radius:5px;' name='phone_code' value="<?php echo $rowstemp->quantity; ?>"/>
								
								</td>
						    	<td align="center"><input class="form-control" type='text' style='height:30px; border-radius:5px;' name='country_code' value="<?php echo $rowstemp->vendor_prc; ?>"/> </td>
						    	<td align="center"><input class="form-control" type='text' style='height:30px; border-radius:5px;' name='order_vat_value' value="<?php echo $rowstemp->order_vat_value; ?>"/> </td>
			

<td align="center" width="60%">

<?php 

if ($order_vat==1)
{
?>
<input type="radio" required checked='checked' name="vat" value="1">Yes</br>
<input type="radio" required  name="vat" value="0">No
<?php 
}
else
{
	?>
<input type="radio" required name="vat" value="1">Yes</br>
<input type="radio" required checked='checked' name="vat" value="0">No	
	
	<?php
	
	
}
?>

</td>



								</td>
						  	</tr>
						
				</table>
					
					  	<!--<div style="margin:auto; width:100%; background:;"><button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>-->
					











<p align="center"><input type="submit" name="submit" value="Update Items"  style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

	


</form>

 <script src="js/auto.js"></script>
	<?php 
	}
	
	}
	
	?>