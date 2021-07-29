<?php
$get_credit_note_id=$_GET['credit_card_id'];
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?>

  <?php
if (isset($_POST['add_job_card']))
{

create_credit_note($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id);
}
 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="jquery-1.8.3.js"></script>-->

<script src="js/jquery-1.10.2.min.js"></script>	
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />

<script type="text/javascript">
    $(document).ready(function() {
     
    $("#parent_cat").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('loadsubcat.php?parent_cat=' + $(this).val(), function(data) {
    $("#sub_cat").html(data);
    $("#sub_cat2").html(data);
    $("#sub_cat3").html(data);
    $("#sub_cat23").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	
    
    });
		



    </script>		
		
			
		

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);
table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:1px solid black;
font-size:12px;

</style>



<script type="text/javascript">
        

function confirmDelete()
{
    return confirm("Are you sure you want to save?");
}

</script>

<script type="text/javascript"> 
  $(document).ready(function () {
       $(".txtMult input").keyup(multInputs);

       function multInputs() {
           var mult = 0;
           // for each row:
           $("tr.txtMult").each(function () {
               // get the values from this row:
               var $val1 = $('.val1', this).val();
               var $val2 = $('.val2', this).val();
               var $val4 = $('.val4', this).val();
               var $total = ($val1 * 1) * ($val2 * 1)
               $('.multTotal',this).text($total);
               mult += $total;
               //multdiff += $total - ($val4 * 1);
           }); 
           $("#grandTotal").text(mult);
          // $("#grandDiff").text(multdiff);
       }
  });

  
  
  
 


</script>

 <form name="search" method="post" action="">

 <?php 
if ($get_credit_note_id!=0)
{
include('view_credit_note_details.php');
?>

<?php
}
else
{
?>
 
  <h3 align="center">Enter Credit Note Details</h3>
 
<table width="90%" border="1" align="center">
 
<tr bgcolor="#cccccc" >
<td width="10%">&nbsp;</td>
<td width="10%">


<?php
/* 
$new_id=$_GET['new_id'];
$querync="select * from customer where customer_id='$new_id'";
$resultsnc=mysql_query($querync) or die ("Error: $querync.".mysql_error());	
$rowsnc=mysql_fetch_object($resultsnc);							  
$customer_name=$rowsnc->customer_name; */
 ?>
 <div id='search_customer_id_errorloc' class="error_strings"></div>
Select Customer : 
<select name="customer_id">
<option value="0">Select Customer...........................</option>

	
								  <?php
								  
								  $query1="select * from customer order by customer_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->customer_id;?>"><?php echo $rows1->customer_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
</td>
<td>

<?php 
$queryempno="select * from credit_note order by  credit_note_id desc limit 1";
$resultsempno=mysql_query($queryempno) or die ("Error: $queryempno.".mysql_error());								  
$rowsempno=mysql_fetch_object($resultsempno);
$emp_no=$rowsempno->credit_note_id;
$job_card_no=$emp_no+1;
	
?>
<div id='search_date_from_errorloc' class="error_strings"></div>
Credit Note Date : <input type="text" name="date_from" size="20" id="date_from" readonly="readonly" />
Credit Note No : <input type="textbox" size="20" value="<?php echo $job_card_no;?>" name="job_card_id" readonly></br></br>
<div id='search_currency_errorloc' class="error_strings"></div>
 <div id='search_curr_rate_errorloc' class="error_strings"></div>
Select Currency
<select name="currency" id="parent_cat">
	<option value="0">Select Currency.............</option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM currency order by curr_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['curr_id']; ?>"><?php echo $row['curr_name']; ?></option>
    <?php endwhile; ?>
    </select>

Exchange Rate (To SSP) : <input type="textbox" size="10" name="curr_rate" class="val3">	
	</td>

<td width="10%">&nbsp;</td>
</tr>

<tr>
<!--<td>&nbsp;</td>-->
<td colspan="3">
 <table class="table">
        <tr style="background:url(images/description.gif);" height="20" align="center">
<td width="20%"><strong>Service Item</strong></td>
<td width="10%"><strong>Description<strong></td>
<td width="10%"><strong>Quantity<strong></td>
<td width="15%"><strong>Unit Cost (<span id="sub_cat2"></span>)<strong></td>
<td width="15%"><strong>(<span id="sub_cat3"></span>)<strong></td>


</td>



</tr>
        <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                   <strong> <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
       <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		    <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                   <strong> <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
         <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		    <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
        <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
      <tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
		<tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
		<tr class="txtMult" height="20" align="center" bgcolor="#FFFF66">
		<td width="20%"><select name="service_item_id[]" style="width:150px;"><option value="0">Select...........................</option><?php $query1="select * from service_item order by service_item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option> <?php  } } ?></select><a href="#">New</a></td>
        <td width="10%"><input type="textbox" size="30" name="remarks[]"></td>   
		   <td>
                <input name="quantity[]" class="val1" size="10" />
            </td>
            <td>
                <input name="unit_cost[]" class="val2" size="20" />
            </td>
            <td>
                  <strong>  <span class="multTotal">0.00</span><strong>
            </td>
        </tr>
	  
	  
	  
	  
	  
	  
	  
         <tr height="60" bgcolor="#CCCCCC">
 <td valign="top"><strong>Remarks: </strong><br/>
 <textarea rows="2" cols="50" name="gen_remarks"></textarea>
 </td>
    <td  colspan="4">
       <strong><font size="" color="#000000"> Grand Total (<span id="sub_cat23"></span>): </strong><span id="grandTotal">0.00</span></font><br/>
	   
	 <strong><font color="#000000">Amount Paid : </strong><input name="amount_paid" class="val4" size="20" /> 
	 Date Paid  : <input type="text" name="date_paid" size="10" id="date_paid" readonly="readonly" /> 
	 Balance Payment Date: <input type="text" name="bal_date" size="10" id="bal_date" readonly="readonly" /> 
	  <!--<strong><font size="+1" color="#000000"> Grand Total (SSP): </strong><span id="grandDiff">0.00</span></font><br/> -->
    </td>

</tr>	

<tr bgcolor="#cccccc"><td colspan="6" align="center"><input onClick="return confirmDelete();" type="submit" name="submit" value="Save" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;">
	<input type="hidden" name="add_job_card" id="add_job_card" value="1">&nbsp;&nbsp;</td></tr>


 
</table>       
        
 










</tr>

 
	
	
	
</table>
</form>

<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("search");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
 frmvalidator.addValidation("customer_id","req",">>Please select customer");
 frmvalidator.addValidation("date_from","req",">>Please enter quotation date");
  frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("curr_rate","req",">>Please enter current exchange rate to SSP");
  frmvalidator.addValidation("amount_paid","req",">>Please enter amount paid");
  frmvalidator.addValidation("date_paid","req",">>Please enter date paid");
 frmvalidator.addValidation("service_item","dontselect=0",">>Please select atleast one service item");
 </script>

<?php 
	}
	
	?>

 

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
    
  Calendar.setup(
    {
      inputField  : "date_paid",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_paid"       // ID of the button
    }
  );
  
  
  
  
  
  
  </script>
<?php 
  
  //}
  
  ?>




   <?php }?>

