<?php
include('Connections/fundmaster.php');
$order_code=$_GET['order_code'];

$sqllpdet="select * FROM mop,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND 
order_code_get.order_code_id='$order_code'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowsrec=mysql_fetch_object($resultslpdet);

$approved_status=$rowsrec->status;

if ($approved_status==3)
{
	
?>
<script type="text/javascript">
alert('SORRY THIS ORDER HAS BEEN APPROVED AND POSTED IT CANNOT BE ADJUSTED');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php	
	
}
else
	
	{


if (isset($_POST['submit']))
{
	
$order_code=mysql_real_escape_string($_POST['order_code']);

?>
 <script language="Javascript">

        function redirectToFB(){
            window.opener.location.href="begin_order.php?order_code=<?php echo $order_code; ?>";
            self.close();
        }

    </script>
<?php
//echo "cliecked";


	
foreach($_POST['countryname'] as $row=>$CountryName)
{
	
$prod=mysql_real_escape_string($_POST['country_no'][$row]);
$qnty=mysql_real_escape_string($_POST['country_code'][$row]);
$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);

$sql= "INSERT INTO purchase_order SET
order_code='$order_code',
quantity='$qnty',
product_id='$prod',
vendor_prc='$vend_price'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/* $sql= "insert into purchase_order values('','$order_code','$part_id','$description','$quantity','$price',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

}


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
    <link rel="stylesheet" type="text/css" href="style.css" />    
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!--<form name="new_machine_category" action="process_add_lpo_item.php" onsubmit="return closeSelf(this);" method="post">-->	
<form name="new_machine_category" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return closeSelf(this);" method="post">	


  
	<input type="hidden" size="41" name="order_code" value="<?php echo $order_code;?>">
	<input type="hidden" size="41" name="purchase_order_id2" value="<?php echo $purchase_order_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">

<table width="80%" border="1" class="table" style="margin:auto;">
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Items Details</strong></td></tr>

							<tr bgcolor="#2E3192">
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    
							    <th><font color="#fff">Item Name</font></th>
							
							    <th><font color="#fff">Price</font></th>
							    <th><font color="#fff">Quantity</font></th>
							    <th><font color="#fff">VAT</font></th>
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" type='text' id='countryname_1' size="60" style="height:30px; border-radius:5px;" name='countryname[]'/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' id='country_no_1' name='country_no[]'/>
								
								<input class="form-control" type='text' style="height:30px; border-radius:5px;" id='phone_code_1' name='phone_code[]'/>
								
								</td>
						    	<td align="center"><input class="form-control" type='text'  style="height:30px; border-radius:5px;" name='country_code[]'/> </td>
								<td align="center" width="60%"><select name='vat[]'><option value='0'>No</option><option value='1'>Yes</option></select></td>
						  	</tr>
						
				</table>
<div style="margin; width:100%; background:;">

<button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>
					


<p align="center"><input type="submit" name="submit" value="Update Items"  style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

	


</form>

 <script src="js/auto.js"></script>
	<?php 
	}
	}	
	?>