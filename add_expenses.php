<?php include('Connections/fundmaster.php'); 
$sales_id=$_GET['sales_id'];
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

			<?php require_once('includes/expensessubmenu.php');  ?>
		
		<h3>::  Record Expenses</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">			
	
<form name="start_order" action="process_add_expenses.php" method="post">	
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

<h3 align="center">Enter Expenses Details</h3>
	
	
	
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
Date<input type="text" name="date_from" size="20" id="date_from" value="<?php echo date('Y-m-d'); ?>" readonly="readonly" />
<span id='start_order_customer_id_errorloc' class="error_strings"></span>
Accout To Credit
<select name="credit_account_id"  id="account_from" required id="account_from" style="width:250px;">
	
<option value="">Select..............................</option>

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
								  
								  Currency:

<select name="currency" id="parent_cat12" required style="width:150px;">
	
<option value="7">Tshs.</option>
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
							   Rate: <input type="text" name="curr_rate" value="1" required size="10">
							   </span>
	  

	  
	

</p>

<p align="center">
<!--Order No : <input type="text" name="order_no" size="20" />-->

Description
<textarea cols="40" rows="2" required name="terms"></textarea>

<!---Sales Reps:

<select name="sales_rep" style="width:150px;">
	
<option value="0">Select..............................</option>
								  <?php
								  
								  $query1="select * from users where user_group_id='35'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  <option value="1000">None</option>
								  </select> -->
							<span id="sub_cat">	  
								  Receipt No: <input type="text" required name="receipt_no" size="20" />
							
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
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Expenses Breakdown Details</strong></td></tr>

							<tr>
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    
							    <th>Expenses Accounts To Debit</th>
							
							    <th>Amount</th>
							    <th>VAT</th>
		
							    <!--<th>Department</th>-->
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" required type='text' placeholder="start to type..if list doesn't appeaer, your item doesn't exist" id='countryname_1' size="60" style="height:30px; border-radius:5px;" name='countryname[]'/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' required id='country_no_1' name='country_no[]'/>
								
								<input class="form-control" type='text' required style="height:30px; border-radius:5px;" id='phone_code_1' name='phone_code[]'/>
								
								</td>
								
								<td align="center" width="20%"><select name='vat[]'><option value='0'>No</option><option value='1'>Yes</option></select></td>
						    
						  	</tr>
						
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