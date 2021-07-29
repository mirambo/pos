<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('pop_up_title.php'); 

$order_code=$_GET['sales_id'];

if (isset($_POST['submit']))
{
	
$order_code=mysql_real_escape_string($_POST['order_code']);

?>
 <script language="Javascript">

        function redirectToFB(){
            window.opener.location.href="add_expenses.php?sales_id=<?php echo $order_code; ?>";
            self.close();
        }

    </script>
<?php
//echo "cliecked";


	
foreach($_POST['countryname'] as $row=>$CountryName)
{
	
$prod=mysql_real_escape_string($_POST['country_no'][$row]);
$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);
$department_code=mysql_real_escape_string($_POST['department_code'][$row]);
echo $vat=mysql_real_escape_string($_POST['vat'][$row]);

$sql="SELECT region_id FROM customer_region WHERE region_code='$department_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$department_id=$rows->region_id;


$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;
$vat_perc=$vat_set_perc/100;



if ($vat==1)
{
	
$vat_value=$vend_price*$vat_perc;	

$expense_vat_account=69;
	
}
else
{

$vat_value=0;	
$expense_vat_account=0;
	
}






$sqlxx = "INSERT INTO expenses SET 
account_to_debit='$prod',
expense_code_id='$order_code',
expenses_vat='$vat',
expenses_vat_value='$vat_value',
expenses_vat_account='$expense_vat_account',
department_code='$department_code',
department_id='$department_id',
amount_received='$vend_price'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());

}


//header ("Location:begin_order.php?order_code=$order_code&addpartconfirm=1");

if ($resultxx)
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
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<form name="new_machine_category" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return closeSelf(this);" method="post">			


  
	<input type="hidden" size="41" name="order_code" value="<?php echo $order_code;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">

<table width="80%" border="1" class="table" style="margin:auto;">
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Expenses Details</strong></td></tr>

							<tr>
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    <!--<th>S. No</th>-->
							    <th>Expenses Account To Credit</th>
							    <!--<th>Item Code</th>-->
							    <th>Amount</th>
							    <!--<th>Department</th>-->
				
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" type='text' required id='countryname_1' placeholder="start to type..if list doesn't appeaer, your item doesn't exist" size="60" style="height:30px; border-radius:5px;" name='countryname[]'/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' id='country_no_1' name='country_no[]'/>
								
								<input class="form-control" type='text' required style="height:30px; border-radius:5px;" id='phone_code_1' name='phone_code[]'/>
								<td align="center" width="20%"><select name='vat[]'><option value='0'>No</option><option value='1'>Yes</option></select></td>
								
								</td>
						    	
						  	</tr>
						
				</table>
					
					  	<div style="margin:auto; width:100%; background:;"><button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>
					











<p align="center"><input type="submit" name="submit" value="Save More Items" OnClick="redirectToFB()" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

	


</form>



 <script src="js/auto_expenses.js"></script>

	<?php 
}


	?>		
			
			
			