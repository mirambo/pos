<?php
include('Connections/fundmaster.php');
$sales_id=$_GET['sales_id'];
$expense_item_id=$_GET['expense_item_id'];
$view=$_GET['view'];
$approved=$_GET['approved'];
$sqltemp="select * FROM expenses,account_type WHERE expenses.account_to_debit=account_type.account_type_id AND 
expenses.expenses_id='$expense_item_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);

$vat=$rowstemp->expenses_vat;

if ($vat==1)
{

$vat_name='Yes';	
	
}
else
{

$vat_name='No';		
	
}


if (isset($_POST['submit']))
{
$sales_id=mysql_real_escape_string($_POST['sales_id']);
$expense_item_id=mysql_real_escape_string($_POST['expense_item_id']);

?>
 <script language="Javascript">

        function redirectToFB(){
            window.opener.location.href="add_expenses.php?sales_id=<?php echo $sales_id; ?>";
            self.close();
        }

    </script>
<?php


	
$item_name=mysql_real_escape_string($_POST['countryname']);
$prod2=mysql_real_escape_string($_POST['country_no']);
$vend_price=mysql_real_escape_string($_POST['phone_code']);
$expenses_vat=mysql_real_escape_string($_POST['vat']);

$queryprofcv="select * from vat_settings";
$resultsprofcv=mysql_query($queryprofcv) or die ("Error: $queryprofcv.".mysql_error());
$rowsprofcv=mysql_fetch_object($resultsprofcv);
$vat_set_perc=$rowsprofcv->vat_setting_perc;
$vat_perc=$vat_set_perc/100;

if ($expenses_vat==1)
{
	
$vat_value=$vend_price*$vat_perc;	

$expense_vat_account=69;
	
}
else
{

$vat_value=0;	
$expense_vat_account=0;
	
}


$department_code=mysql_real_escape_string($_POST['department_code']);

$sql="SELECT region_id FROM customer_region WHERE region_code='$department_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$department_id=$rows->region_id;

$sql="UPDATE expenses SET 
account_to_debit='$prod2',
expenses_vat='$expenses_vat',
expenses_vat_value='$vat_value',
expenses_vat_account='$expense_vat_account',
department_code='$department_code',
department_id='$department_id',
amount_received='$vend_price' 
where expenses_id='$expense_item_id'";
$resultsx= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("LOcation:add_expenses.php?sales_id=$sales_id");

/* if ($resultsx)
{ ?>
<script>
redirectToFB();
</script>
<?php
} */
}
else
{

?>

<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />    
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!--<form name="new_machine_category" action="process_add_lpo_item.php" onsubmit="return closeSelf(this);" method="post">-->	
<form name="new_machine_category" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return closeSelf(this);" method="post">	


  
	<input type="hidden" size="41" name="sales_id" value="<?php echo $sales_id;?>">
	<input type="hidden" size="41" name="expense_item_id" value="<?php echo $expense_item_id;?>">


<table width="80%" border="1" class="table" style="margin:auto;">
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Expenses Details</strong></td></tr>

							<tr>
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    <!--<th>S. No</th>-->
							    <th>Expenses Accounts To Debit</th>
							 
		
							    <th>Amount</th>
							    <th>VAT</th>
					
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" style='height:30px; border-radius:5px;' size="60" type='text' id='countryname_1' name='countryname' value="<?php echo $rowstemp->account_code.' '.$rowstemp->account_type_name; ?>"/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' id='country_no_1' name='country_no' value="<?php echo $rowstemp->account_to_debit; ?>"/>
								<input class="form-control" type='text'  style='height:30px; border-radius:5px;' name='phone_code' value="<?php echo $rowstemp->amount_received; ?>"/>
								
								</td>
								<td align="center" width="10%"><select name='vat'>
								<option value='<?php echo $vat; ?>'><?php echo $vat_name; ?></option>
								<option value='0'>No</option>
								<option value='1'>Yes</option></select></td>
				
						  	</tr>
						
				</table>
					
					  	<!--<div style="margin:auto; width:100%; background:;"><button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>-->
					











<p align="center"><input type="submit" name="submit" value="Update Items"  style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

	


</form>

 <script src="js/auto_expenses.js"></script>
	<?php 
	}
	
	
	
	?>