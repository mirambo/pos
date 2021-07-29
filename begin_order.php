<?php include('Connections/fundmaster.php'); 
$order_code=$_GET['order_code'];
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

<script type="text/javascript">
    $(document).ready(function() {
     
    $("#account_from").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_farmer.php?farmer_id=' + $(this).val(), function(data) {
    $("#sub_cat").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    }); 
    });
		
	////////////////////////////////// To select access status roles
	
	
	
	
	
//////calendar-en

 

    </script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/lposubmenu.php');  ?>
		
		<h3>:: Start New Purchase Order</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">			
	
<form name="start_order" action="process_gen_order_code.php" method="post">	
<?php 
if ($order_code!=0)
{
include('view_lpo_details.php');
?>

<?php
}
else
{
?>

<h3 align="center">Enter LPO Details

<!--<span style="color:#ff0000; float:right; margin-left:-340px; margin-right:340px;">Normal LPO
<input type="radio" checked name="lpo_type" value="lpo">&nbsp; &nbsp; Supplier Invoice<input type="radio" name="lpo_type" value="inv"></span>
-->


</h3>
	
	
	
<div style="width:99%; min-height:70px; margin:auto;background:#FFFFCC;">
<p align="center">

<span id='emp_date_from_errorloc' class="error_strings"></span>
LPO Date<input type="text" name="date_from" size="20" id="date_from" required value="<?php echo date('Y-m-d'); ?>" readonly="readonly" />
<span id='start_order_sup_errorloc' class="error_strings"></span>
Select Supplier
<select name="sup" required id="account_from" style="width:250px;">
	
<option value="">Select..............................</option>
								  <?php
								  
								  $query1="select * from suppliers order by supplier_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->supplier_id; ?>"><?php echo $rows1->supplier_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> <a href="add_supplier.php?newsup=newsup">New Supplier</a>
								  
								 <span id='start_order_mop_errorloc' class="error_strings"></span>
Mode Of Payment
<select name="mop" required style="width:100px;">
	                  <option value="">Select..............................</option>
								  
										  
                                    <?php 
$sqlmop="SELECT * FROM mop order by mop_name asc";
$resultsmop= mysql_query($sqlmop) or die ("Error $sqlmop.".mysql_error()); 
if (mysql_num_rows($resultsmop) > 0)
{
						while ($rowsmop=mysql_fetch_object($resultsmop))
							{						
								?>  
										  
                                    <option value="<?php echo $rowsmop->mop_id;?>"><?php echo $rowsmop->mop_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>
							   
							  <span id='start_order_currency_errorloc' class="error_strings"></span>
Currency
<select name="currency" required id="parent_cat12" style="width:100px;">

	               <option value="">Select..............................</option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM currency order by curr_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->curr_id;?>"><?php echo $rowscurr->curr_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>
							   
							<span id="sub_cat12">
							   Rate: <input type="text" required name="curr_rate" size="10">
							   </span>   
							   </br>
							   </br>
							   <span id="sub_cat">
							  
							   </span>
							   </br>
							   </br>

 Terms of Payment : <textarea name="payment_schedule" cols="40" rows="2"></textarea>
 
 

Comments:  <textarea name="comments" cols="40" rows="2"></textarea>

Ref No: <input type="text" required name="ref_no" size="20"/>

<!--Expiry Date<input type="text" name="date_to" size="20" id="date_to"  readonly="readonly" />-->

</p>





</div>


<?php 
if ($view==1)
{

}
else
{
?>





<table width="60%" border="1" class="table1" style="margin:auto;">
<tr bgcolor=""><td colspan="6"  align=""><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff"><h3>Items Details</h3></strong></td></tr>

							<tr bgcolor="#2E3192">
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    
							    <th><font color="#fff">Item Name</font></th>
							
							    <th><font color="#fff">Price</font></th>
							    <th><font color="#fff">Quantity</font></th>
							    <th width="60%"><font color="#fff">VAT</font></th>
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						   
						   	 	<td align="center"><input class="form-control" type='text' required id='countryname_1' size="60" style="height:30px; border-radius:5px;" name='countryname[]'/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' id='country_no_1' name='country_no[]'/>
								
								<input class="form-control" type='text' style="height:30px; border-radius:5px;" required id='phone_code_1' name='phone_code[]'/>
								
								</td>
						    	<td align="center"><input class="form-control" type='text' required style="height:30px; border-radius:5px;" name='country_code[]'/> </td>
						    	<td align="center" width="60%"><select name='vat[]'><option value='0'>No</option><option value='1'>Yes</option></select></td>
						  	</tr>
						
				</table>
					
					  	<div style="margin; width:100%; background:;"><button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>
						
						
					
		








<p align="center"><input type="submit" name="submit" value="Save LPO Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>
	
<?php 
}
?>	



</form>

 <script src="js/auto.js"></script>
<?php 
	}
	
	?>
<?php
if ($order_code!=0)
{

}

else
{
 ?>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
  /*Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  */
  
  
  </script>
  
  <?php 
  
  }
  
  ?>
  
    <script>


$("#account_from").select2( {
	placeholder: "Select Supplier",
	allowClear: true
	} );
	

	
	
</script>
<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("start_order");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	

 frmvalidator.addValidation("sup","dontselect=0",">>Please select supplier");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("mop","dontselect=0",">>Please terms of payment");
 

  
//]]></script>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			
			
			
					
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