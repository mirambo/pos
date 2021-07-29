<?php 
include('includes/session.php'); 
include('Connections/fundmaster.php'); 
$order_code=$_GET['sales_id'];

$sqlrec="SELECT * FROM expenses_code WHERE expense_code_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$department_id=$rowsrec->department_id;
$account_to_credit=$rowsrec->account_to_credit;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$general_remarks=$rowsrec->expense_description;
$receipt_no=$rowsrec->expense_receipt_no; 
$sales_date=$rowsrec->expense_date;


$queryshp="select * from customer_region where region_id='$department_id'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$shop_name=$rowshp->region_name;


$querytcsp="select * from account_type where account_type_id='$account_to_credit'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);
$account_to_credit_name=$rowstcsp->account_code.' '.$rowstcsp->account_type_name;


$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$curr_name=$rowstcs->curr_name;



?>

<script type="text/javascript" src="jquery.js"></script>	
<script type="text/javascript">
    $(document).ready(function() {
     
    $("#customer_id").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_cus_details.php?parent_cat=' + $(this).val(), function(data) {
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

<form name="start_invoice" action="process_edit_expenses_code.php?order_code=<?php echo $order_code;?>&q=<?php echo $q; ?>" method="post">	
<table width="100%" border="0">
   <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top" align="center">

	<h2>Panel To Update Expenses Details</h2>

	<font color="#FF0000"></font></td>
    

  </tr>

	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">
	
	<div style="width:99%; height:auto; margin:auto;background:#FFFFCC;">
<!--<p align="center">Select Department : <select name="department_id"  required style="width:150px;">
	
<option value="<?php echo $department_id; ?>"><?php echo $shop_name;?></option>

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
Date<input type="text" name="date_from" size="20" id="date_from" value="<?php echo $sales_date;?>" readonly="readonly" />
<span id='start_order_customer_id_errorloc' class="error_strings"></span>
Accout To Credit
<select name="credit_account_id"  required style="width:300px;">
	
<option value="<?php echo $account_to_credit; ?>"><?php echo $account_to_credit_name; ?></option>

								  <?php
								  
								  $query1="select * from account_type where account_cat_id='2' order by account_type_name asc";
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
	
<option value="<?php echo $currency; ?>"><?php echo $curr_name; ?></option>
								  <?php
								  
								  $query1="select * from currency order by curr_name asc";
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
							   Rate: <input type="text" name="curr_rate" required size="10" value="<?php echo $curr_rate; ?>">
							   </span>
	  

	  
	

</p>

<p align="center">
<!--Order No : <input type="text" name="order_no" size="20" />-->

Description
<textarea cols="40" rows="2" name="terms"><?php echo $general_remarks;  ?></textarea>


							<span id="sub_cat">	  
								  Receipt No: <input type="text" name="receipt_no" size="20" value="<?php echo $receipt_no;?>" />
							
<!--Phone No : <input type="text" name="new_cus_phone" size="20" />
Email Address : <input type="text" name="new_cus_email" size="20" />-->
<span>
</p>



</div>
	
	</td>
    
								 
							   
    </tr>
	

	  
	 
 
  
  

 

	
	

  <tr height="15" bgcolor="#FFFFCC">


    <td align="center"><input onClick="return confirmSave();" type="submit" name="submit" value="Save Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;"></td>
   

   
 

  </tr>
  
  
 	
	</table>		

</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
  
  
  </script>