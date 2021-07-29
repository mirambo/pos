<?php include('Connections/fundmaster.php'); 


$id=$_GET['id'];

$queryop="select * FROM mop,cheque_received_code,currency where cheque_received_code.mop=mop.mop_id and 
cheque_received_code.currency=currency.curr_id AND cheque_received_code.cheque_received_code_id='$id'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
$rows=mysql_fetch_object($results);

$account_to_credit=$rows->account_to_credit;

$sql34c="select * FROM account_type where account_type_id='$account_to_credit'";
$results34c= mysql_query($sql34c) or die ("Error $sql34c.".mysql_error());
$rows34c=mysql_fetch_object($results34c);
$account_to_credit_name=$rows34c->account_code.' - '.$rows34c->account_type_name;






?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>


<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete this item from the lpo?");
}

function confirmSend()
{
    return confirm("Are you sure want to send this LPO via email?");
}

function confirmDeleteItem()
{
    return confirm("Are you sure want to delete a part from the job card?");
}

function confirmDeleteBelong()
{
    return confirm("Are you sure want to delete a customer belonging from this job card?");
}

</script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#parent_cat12").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_curr.php?parent_cat12=' + $(this).val(), function(data) {
    $("#sub_cat12").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });

    });
</script>
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
<?php 
include('select_search.php');
?>


    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />    

	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
 



<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php');?>
		</div>

			<?php require_once('includes/pay_cheque_payment_submenu.php');  ?>
		
		<h3>::  Record Cheque/Cash Paid </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">			
	
<form name="start_order" action="process_pay_cheque.php?id=<?php echo $id; ?>" method="post">	
<?php 
if ($sales_id!=0)
{
include('view_expense_details.php');
?>

<?php
}
else
{
?>

<h3 align="center">Enter Paid Details</h3>
	
	
	
<div style="width:99%; height:auto; margin:auto;background:#FFFFCC;">
<!--<p align="center">Select Department : <select name="department_id"  required style="width:150px;">
	
<option value="">Select..............................</option>

								  <?php
								  
								  $query1="select * from customer_region order by region_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->region_id; ?>"><?php echo $rows1->region_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></p>-->
<p align="center">

<span id='emp_date_from_errorloc' class="error_strings"></span>
Date <input type="text" name="date_from" required size="20" id="date_from" value="<?php echo $rows->date_recorded; ?>" />
<span id='start_order_customer_id_errorloc' class="error_strings"></span>
Accout To Credit
<select name="credit_account_id"  id="account_from" required style="width:250px;">
	
<option value="<?php echo $account_to_credit; ?>"><?php echo $account_to_credit_name; ?></option>

								  <?php
								  
								  $query1="select * from account_type order by account_type_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->account_type_id; ?>"><?php echo $rows1->account_code.' '.$rows1->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> 
								  
								  Amount : <input type="text" name="credit_amount" value="<?php echo $rows->credit_amount; ?>" required size="20">
								  
								  Currency:

<select name="currency" id="parent_cat12" required style="width:150px;">
	
<option value="<?php echo $rows->curr_id; ?>"><?php echo $rows->curr_name; ?></option>
								  <?php
								  
								  $query1="select * from currency";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->curr_id; ?>"><?php echo $rows1->curr_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								 
								  </select> 
								  
								 							<span id="sub_cat12">
							   Rate: <input type="text" name="curr_rate" value="<?php echo $rows->curr_rate; ?>" required size="10">
							   </span>
	  

	  
	

</p>

<p align="center">
<!--Order No : <input type="text" name="order_no" size="20" />-->

Comments
<textarea cols="40" rows="2" required name="terms"><?php echo $rows->comments; ?></textarea>

Mode Of Payment:

<select name="mop" required style="width:150px;">
	
<option value="<?php echo $rows->mop; ?>" required><?php echo $rows->mop_name; ?></option>
								  <?php
								  
								  $query1="select * from mop order by mop_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->mop_id; ?>"><?php echo $rows1->mop_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
							<span id="sub_cat">	  
								  Cheque/Ref No: <input type="text" required value="<?php echo $rows->ref_no; ?>" name="receipt_no" size="20" />
							
<!--Phone No : <input type="text" name="new_cus_phone" size="20" />
Email Address : <input type="text" name="new_cus_email" size="20" />-->
<span>
</p>



</div>


<?php 
if ($view==1)
{

}
else
{
?>

<table width="60%" border="1" class="table" style="margin:auto;">
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Account To Debit Details</strong></td></tr>

							<tr>
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    
							    <th>Accounts To Debit</th>
							
							    <th>Amount</th>
							    <th>VAT</th>
		
							    <!--<th>Department</th>-->
							</tr>
							
							<?php 
							
							if ($id!='')
							{
								
								
$ttl_credit_amount=0;
$sqlemp_det2="select * from cheque_received,account_type 
where cheque_received.account_to_debit=account_type.account_type_id AND 
cheque_received.cheque_received_code_id='$id'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
//$rowsemp_det2=mysql_fetch_object($resultsemp_det);

while ($rowsemp_det2=mysql_fetch_object($resultsemp_det2))
							  {
								  
								  
  $cheque_received_id=$rowsemp_det2->cheque_received_id;
 $vat=$rowsemp_det2->vat; 
 
 
 if ($vat==0)
 {
	 
	$vat_status='No'; 
 }
 elseif ($vat==1)
 {
	 
$vat_status='Yes';

 }
 else
 {
	
$vat_status='No';	
	 
 }
  
   ?>
							
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center">
								<input type="hidden" name="cheque_received_id[<?php echo $cheque_received_id; ?>]" value="<?php echo $cheque_received_id; ?>">
								<input class="form-control" required type='text' placeholder="start to type..if list doesn't appeaer, your item doesn't exist" id='countryname_1' size="60" style="height:30px; border-radius:5px;" name='countryname[<?php echo $cheque_received_id; ?>]' value="<?php echo $rowsemp_det2->account_code.' '.$rowsemp_det2->account_type_name; ?>"/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' required id='country_no_1' value="<?php echo $rowsemp_det2->account_to_debit; ?>" name='country_no[<?php echo $cheque_received_id; ?>]'/>
								
								<input class="form-control" type='text' required style="height:30px; border-radius:5px;" value="<?php echo $rowsemp_det2->debit_amount; ?>" id='phone_code_1' name='phone_code[<?php echo $cheque_received_id; ?>]'/>
								
								</td>
								
								<td align="center" width="20%"><select name='vat[<?php echo $cheque_received_id; ?>]'><option value='<?php echo $vat; ?>'><?php echo $vat_status; ?></option><option value='1'>Yes</option></select></td>
						    
						  	</tr>
							
							<?php
							}
							
							}
							else
							{
								
								
							}
							
							
							
							if ($id!='')
							{
								
								
							}
							else
							{
						
							?>
							
							
							
							
							
							
							
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" required type='text' placeholder="start to type..if list doesn't appeaer, your item doesn't exist" id='countryname_1' size="60" style="height:30px; border-radius:5px;" name='countryname[]'/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' required id='country_no_1' name='country_no[<?php echo $cheque_received_id; ?>]'/>
								
								<input class="form-control" type='text' required  style="height:30px; border-radius:5px;" id='phone_code_1' name='phone_code[]'/>
								
								</td>
								
								<td align="center" width="20%"><select name='vat[]'><option value='0'>No</option><option value='1'>Yes</option></select></td>
						    
						  	</tr>
							
							<?php 
							
							}
							?>
						
				</table>
					
					  	<div style="margin:auto; width:100%; background:;"><button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>
						
						
					
						
						
						



</table>





	
<?php 
}
?>	

 <script src="js/auto_expenses.js"></script>
<?php 
	}
	
	?>
<?php
if ($sales_id!=0)
{

}

else
{
 ?>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
  
  
  </script>
  
  <?php 
  
  }
  
  ?>
  <?php
if ($sales_id!='')
{

}

else
{
 ?>

  
  <p align="center"><input type="submit" name="submit" value="Save Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

 <?php 
 
}
 ?> 
  
  </form>
  
  <script>


$("#account_from").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>
<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("start_order");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	

frmvalidator.addValidation("customer_id","dontselect=0",">>Please select customer");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("mop","dontselect=0",">>Please terms of payment");
 

  
//]]></script>		
			
			
			
	<script>
$(".todolist").focus(function() {
  if (document.getElementById('todolist').value === '') {
    document.getElementById('todolist').value += '• ';
  }
});

$(".todolist").keyup(function(event) {
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if (keycode == '13') {
    document.getElementById('todolist').value += '• ';
  }
  var txtval = document.getElementById('todolist').value;
  if (txtval.substr(txtval.length - 1) == '\n') {
    document.getElementById('todolist').value = txtval.substring(0, txtval.length - 1);
  }
});
</script>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			
			
			
					
			  </div>
				
				<!--<div id="cont-right" class="br-5">
					
				</div>-->
			
			
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