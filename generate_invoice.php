<?php 
include('includes/session.php'); 
include('Connections/fundmaster.php'); 
 $sales_id=$_GET['sales_id'];

 $sess_allow_view;
if ($sess_allow_add==0 && $sales_id=='')
{

?>

<script type="text/javascript">
alert('Not Allowed');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
	
<?php
} 
else
{

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

function confirmDeleteItem()
{
    return confirm("Are you sure want to delete a part from the job card?");
}

function confirmDeleteBelong()
{
    return confirm("Are you sure want to delete a customer belonging from this job card?");
}

</script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="jquery.js"></script>	
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#customer_id").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_delivery.php?parent_cat=' + $(this).val(), function(data) {
    $("#sub_cat").html(data);
       $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    
    });
	
	

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
	
    </script>	



<script src="jquery.min.js"></script>




    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />    
	<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	

	
	
	
	
 
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>



<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/salessubmenu.php');  ?>
		
		<h3>::  Generate Invoice</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">			
	
<form name="start_order" action="process_sales.php" method="post">	
<?php 
if ($sales_id!=0)
{
include('view_cash_sales_details.php');
?>

<?php
}
else
{
?>

<h3 align="center">Enter Invoice Details</h3>
	
	
	
<div style="width:99%; height:160px; margin:auto;background:#FFFFCC;">
<p align="center">

<span id='emp_date_from_errorloc' class="error_strings"></span>
Transaction Date<input type="text" name="date_from" size="20" id="date_from" value="<?php echo date('Y-m-d');?>" readonly="readonly" />
<span id='start_order_customer_id_errorloc' class="error_strings"></span>
Select Customer
<select name="customer_id" id="customer_id" required style="width:150px;">
	
<option value="">Select..............................</option>
								  <?php
								  
								  $query1="select * from customer order by customer_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->customer_id; ?>"><?php echo $rows1->customer_name.' - '.$rows1->customer_code; ?>  </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> <!--<a href="add_supplier.php?newsup=newsup">New Customer</a>-->
<!--Discount(%)<input type="text" name="discount" size="10" />
VAT Inclusive
	<input type="radio" name="vat" value="1" checked>Yes
	  <input type="radio" name="vat" value="0">No
	  

	  -->
	

</p>

<p align="center">


Terms
<textarea cols="30" rows="3" name="terms"></textarea>

Currency:

<select name="currency" id="parent_cat12" required style="width:150px;">
	
<option value="">Select..............................</option>
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
							   Rate: <input type="text" name="curr_rate" size="10">
							   </span> 
								  
								   Address
								  <span id="sub_cat">
<textarea cols="30" rows="3" name="delivery_address"></textarea>
</span>
</br>
</br>
<span style="margin-left:650px;">Ref No : <input type="text" name="order_no" size="20" /></span>

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
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Services Details</strong></td></tr>

							<tr>
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    
							    <th>Service Name</th>
							
							    <th>Service Cost</th>
							    <th>Attendant</th>
							    <!--<th>Discount</th>-->
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
						    	<!--<td align="center"><input class="form-control" type='text'  style="height:30px; border-radius:5px;" name='discount[]'/> </td>-->
						  	</tr>
						
				</table>
					
					  	<div style="margin:auto; width:100%; background:;"><button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>
						
						
					
						
						
						



</table>





	
<?php 
}
?>	

 <script src="js/auto_cash_sales.js"></script>
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

  
  <p align="center"><input type="submit" name="submit" value="Save " style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>

 <?php 
 
}
 ?> 
  
  </form>
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
<?php 
}
?>
</html>