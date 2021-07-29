<?php include('Connections/fundmaster.php'); 
$order_code=$_GET['order_code'];
include('ajax_loader.php');
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
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/requisition_submenu.php');  ?>
		
		<h3>:: Start New Item Requisition</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">			
	
<form name="start_order" action="process_requisition.php" method="post">	
<?php 
if ($order_code!=0)
{
include('view_requsition_details.php');
?>

<?php
}
else
{
?>

<h3 align="center">Enter Item Requisition Details
<!--
<span style="color:#ff0000; float:right; margin-left:-340px; margin-right:340px;">Normal LPO
<input type="radio" checked name="lpo_type" value="lpo">&nbsp; &nbsp; Supplier Invoice<input type="radio" name="lpo_type" value="inv"></span>
-->


</h3>
	
	
	
<div style="width:99%; min-height:70px; margin:auto;background:#FFFFCC;">
<p align="center">

<span id='emp_date_from_errorloc' class="error_strings"></span>
Requisition Date<input type="text" name="date_from" size="20" id="date_from" value="<?php echo date('Y-m-d'); ?>" readonly="readonly" />
<span id='start_order_sup_errorloc' class="error_strings"></span>
Requested By 
<select name="sup" required id="account_from" style="width:250px;">
	
<option value="">Select..............................</option>
								  <?php
								  
								  $query1="select * from users order by f_name";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> <!--<a href="add_supplier.php?newsup=newsup">New Supplier</a>-->
								  
								   
							   </br>
							   </br>

 
 
 

Comments:  <textarea name="comments" cols="40" rows="2"></textarea>


Ref No: <input type="text" name="ref_no" size="20" />
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
<tr bgcolor=""><td colspan="5"  align=""><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff"><h3>Items Details</h3></strong></td></tr>

														<tr bgcolor="#2E3192">
							    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
							    
							    <th><font color="#fff">Item Name</font></th>
							
							    <th><font color="#fff">Price</font></th>
							    <th><font color="#fff">Quantity</font></th>
							</tr>
							<tr>
						    	<td><input type='checkbox' class='case'/></td>
						    	<!--<td><span id='snum'>1.</span></td>-->
						   	 	<td align="center"><input class="form-control" required type='text' id='countryname_1' size="60" style="height:30px; border-radius:5px;" name='countryname[]'/></td>
						    	
						    	<td align="center">
								<input class="form-control" type='hidden' id='country_no_1' name='country_no[]'/>
								
								<input class="form-control" type='text' required style="height:30px; border-radius:5px;" id='phone_code_1' name='phone_code[]'/>
								
								</td>
						    	<td align="center"><input class="form-control" required type='text'  style="height:30px; border-radius:5px;" name='country_code[]'/> </td>
						  	</tr>
						
				</table>
					
					  	<div style="margin; width:100%; background:;"><button style="margin-left:270px;" type="button" class='btn btn-danger delete'>- Delete</button>
						<button type="button"  class='btn btn-success addmore'>+ Add More</button></div>
						
						
					
		








<p align="center"><input type="submit" name="submit" onClick="validate_form()" value="Save Requisition Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></p>
	
<?php 
}
?>	



</form>

 <script src="js/auto_requisition.js"></script>
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
  
  

  
  
  </script>
  
  <?php 
  
  }
  
  ?>
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

<script>


$("#account_from").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
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