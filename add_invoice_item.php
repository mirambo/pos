<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 

$order_code=$_GET['sales_id'];

$sqlrec="select * FROM sales WHERE sales_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$posted=$rowsrec->posted;


if ($posted==1)
{
?>

 <script language="Javascript">

 function redirectToFB(){
            window.opener.location.href="generate_invoice.php?sales_id=<?php echo $order_code; ?>";
            setTimeout("self.close()", 100);
        }

    </script>


	</br></br>
<p align="center" style="height:50px;" ><input type="submit" name="submit" value="SORRY!! THIS INVOICE HAS BEEN POSTED. CANNOT BE ADJUSTED" OnClick="redirectToFB()" style="background:#ff0000; top:50px; font-size:14px; color:#ffffff; font-weight:bold; width:auto; height:30px; border-radius:5px;"></p>
</BR>
<p align="center" style="height:50px;" ><input type="submit" name="submit" value="OK" OnClick="redirectToFB()" style="background:#2E3192; top:50px; font-size:14px; color:#ffffff; font-weight:bold; width:100px; height:30px; border-radius:5px;"></p>


<?php	
	
}

else
{
?>
<!-- <script language="Javascript">

        function redirectToFB(){
            window.opener.location.href="view_cash_sales_details.php?sales_code=<?php echo $order_code; ?>";
            setTimeout("self.close()", 2000);
        }

    </script>-->
    <link rel="stylesheet" type="text/css" href="css.css" />    
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />    
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<form name="new_machine_category" action="process_add_invoice_sales_item.php" onsubmit="return closeSelf(this);" method="post">			


  
	<input type="hidden" size="41" name="order_code" value="<?php echo $order_code;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">

<table width="80%" border="1" class="table" style="margin:auto;">
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Items Details</strong></td></tr>

							<tr>
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    <!--<th>S. No</th>-->
							    <th>Item Name</th>
							    <!--<th>Item Code</th>-->
							    <th>Price</th>
							    <th>Quantity</th>
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" type='text' required id='countryname_1' size="60" style="height:30px; border-radius:5px;" name='countryname[]'/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' id='country_no_1' name='country_no[]'/>
								
								<input class="form-control" type='text' required style="height:30px; border-radius:5px;" id='phone_code_1' name='phone_code[]'/>
								
								</td>
						    	<td align="center"><input class="form-control" required type='text'  style="height:30px; border-radius:5px;" name='country_code[]'/> </td>
						  	</tr>
						
				</table>
					
					  	<div style="margin:auto; width:100%; background:;"><button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>
					











<p align="center"><input type="submit" name="submit" value="Save More Items" OnClick="redirectToFB()" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

	


</form>



 <script src="js/auto_cash_sales.js"></script>

	<?php 
}
	?>		
			
			
			