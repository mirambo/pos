<?php
$qtn_type=$_GET['quote'];
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$invoice_id=$_GET['invoice_id'];
$sqlrec="SELECT * FROM customer,bookings WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);


$engine_range_id=$rowsrec->engine_range_id;

$sql1="SELECT * FROM engine_range where engine_range_id='$engine_range_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$range_name=$rows1->min_capacity.' To '.$rows1->max_capacity;



$sqlitd="SELECT * from job_cards,currency where job_cards.currency=currency.curr_id AND job_cards.job_card_id='$job_card_id'";
$resultsitd= mysql_query($sqlitd) or die ("Error $sqlitd.".mysql_error()); 
$rowsitd=mysql_fetch_object($resultsitd);


 ?>
 
 <?php
if (isset($_GET['subDELETELocation']))
{

delete_country_project($job_card_id,$booking_id,$user_id);
}
 ?>
 
  <?php
if (isset($_POST['add_invoice']))
{

submit_invoice($booking_id,$task_name,$task_cost,$task_remarks,$invoice_date,$currency,$part_id,$quantity,$terms,$discount,$vat,$labour_cost,$user_id);

}
 ?>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript" src="suggest.js"></script>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
 
<style type="text/css">
	div{
		padding:5px;
	}
</style>
<script type="text/javascript">
 
$(document).ready(function(){ 
    var counter = 2; 
    $("#addButton").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
 	newTextBoxDiv.after().html('Task '+ counter + ' : ' +
	      '<select name="task_name[]" style="width:200px;"><option>Select..........................................................</option><?php $query1="select * from task order by task_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->task_id; ?>"><?php echo $rows1->task_name; ?> </option> <?php  } } ?></select> Remarks : <input type="text" name="task_remarks[]" size="30">');
 	newTextBoxDiv.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeButton").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv" + counter).remove();
 
     });
 
     
  });
  
  
  /////for client properties
  
$(document).ready(function(){ 
    var counter = 2; 
    $("#addBelong").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv2 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv2' + counter);
 	newTextBoxDiv2.after().html('Item '+ counter + ' : ' +
	      '<input type="text" name="customer_item[]" id="customer_item[]" value="" size="50" >');
 	newTextBoxDiv2.appendTo("#TextBoxesGroup2");
 	counter++;
     });
     $("#removeBelong").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv2" + counter).remove();
 
     });
 
     
  });
  
  
  
  /////for parts section
  
$(document).ready(function(){ 
    var counter = 2; 
    $("#addPart").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv3 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv3' + counter); 	
 	newTextBoxDiv3.after().html('Part '+ counter + ' : ' +'<select name="part_id[]"><option value="0">Select........................</option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option><?php  }}?></select> Quantity : <input type="textbox" name="quantity[]" id="quantity[]" size="10">');
 	newTextBoxDiv3.appendTo("#TextBoxesGroup3");
 	counter++;
     });
     $("#removePart").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv3" + counter).remove();
 
     });
 
     
  });
  
  
  
</script>

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
    return confirm("Are you sure want to delete?");
}

</script>

<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
 
<style type="text/css">
	div{
		padding:5px;
	}
</style>

<form  name="emp" id="emp" method="post" action="<?php $_SERVER['PHP_SELF'];?>" id="suggestSearch"> 
<table width="100%" border="0">
 <tr height="30" bgcolor="#FFFFCC">
    
    <td colspan="7" align="center">
	
	
	<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

 $currpage=curPageURL();


$phphh=str_replace ("/home.php/", "", $_SERVER['PHP_SELF']); 

?>
	


	<p><strong>Job Card No : <i><font color="#ff0000"><?php echo $job_card_id;  ?></font>Invoice No : <i><font color="#ff0000"><?php echo $invoice_id;  ?></font></i></strong></p>
	<img src="images/car.png" align="left" style="margin-left:100px; margin-right:0px;">
	<strong>Customer Name : <i><font color="#ff0000"><?php echo ' - '.$c_name=$rowsrec->customer_name.' ';  ?></font></i>
	
	Contact Person: <i><font color="#ff0000"><?php echo $rowsrec->contact_person;  ?></i></font>
	
	Email Address: <font color="#ff0000"><i><?php echo $curr_name=$rowsrec->email;  ?></i></font>
	
Phone Number :<font color="#ff0000"><i><?php echo $terms=$rowsrec->phone;  ?></i></font></strong>
	<br/>
	<br/>
	
	<strong>Vehicle Registration No :   <i><font color="#ff0000"><?php echo $reg_no=$rowsrec->reg_no.' ';  ?></i></font>
	
	Vehicle Make And Model: <i><font color="#ff0000"><?php echo $rowsrec->vehicle_make.' - '.$rowsrec->vehicle_model;  ?></i></font>
	
Engine: <i><font color="#ff0000"><?php echo $curr_name=$rowsrec->engine;  ?></i></font><strong> Engine Range : </strong><i><font color="#ff0000"><?php echo $range_name;?></font></i>
	
Chasis No :<i><font color="#ff0000"><?php echo $terms=$rowsrec->chasis_no;  ?></i></font></strong>
	
	<br/>
</table>	

<?php 
if ($invoice_id!='')
{

include('invoice_details_to_be_canceled.php');

}
else
{
?>

	<h3 align="center">Invoice Details</h3>
	
	
	
<table width="90%" border="0" align="center">
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Invoice Submited Successfully!!</font></strong></p></div>';

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Updated Successfully!!</font></strong></p></div>';


?>
<?php

if ($_GET['delete']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
<?php
if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td></tr>



<!--<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><a style="font-weight:bold; color:#ff0000;" href="home.php?areareport=areareport&booking_id=<?php echo $booking_id; ?>">!!!!!Click Here To Add More Parts!!!!</a></td></tr>-->


<?php 
if ($view==1)
{

}
else
{
?>

<tr height="50" bgcolor="#FFFFCC">
<td valign="top" height="200" width="50%">
<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Task Details</font></strong><a style="color:#ffffff; float:right;" href="#"></a></td></tr>
<tr height="30"><td align="center">

<div id='emp_date_from_errorloc' class="error_strings"></div>
Invoice Date<input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /></td></tr>
<tr><td align="center">
<!--<div id='emp_currency_errorloc' class="error_strings"></div>
Select Currency : <select name="currency">
	                  <option value="0">------------------Select--------------------</option>
								  
										  
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
									
                               </select></br/></br/>-->
							   
					<table width="100%">	

<tr><td align="center" colspan="2"><strong>Task Recorded At Job Card Creation Stage</strong></td></tr>	
<tr><td align="center" width="60%"><strong>Task Name</strong></td><td align="center"><strong>Amount</strong></td></tr>					
			<?php 
$grnd_amnt=0;	
$grnd_disc=0; 
$grnd_vat=0;
$grnd_ttl_amnt=0;
$sqllpdet="SELECT * from job_card_task,task,users where job_card_task.task_id=task.task_id AND job_card_task.technician_id=users.user_id AND job_card_task.job_card_id='$job_card_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
?>
					
						<?php 
						if (mysql_num_rows($resultslpdet) > 0)
						  {
							  
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  {?>
						<tr>
						<td><?php echo $task_name=$rowslpdet->task_name;?><input type="hidden" name="task_nameold[]" value="<?php echo $rowslpdet->task_id; ?>"></td>
						<td><?php echo number_format($task_cost=$rowslpdet->task_cost,2);?><input type="hidden" name="task_costold[]" value="<?php echo $task_cost; ?>"></td>

						
<?php
}
?>

						</tr>
<?php


}
						
						
						
						?></td>
						
						
						</tr>
							 
							 
							
									   
							   
							   
	</table>





<table width="100%">	

<tr><td align="center"><strong>Cost The Real Task Done</strong></td></tr>					
			
							  <tr>
						<td>
						
						<input type='button' value='Add Task' id='addButton'>
<input type='button' value='Remove Task' id='removeButton'>


<div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">
		Task 1 : <select name="task_name[]" style="width:200px;">
		<option value="0">Select..........................................................</option>
		<?php $query1="select * from task order by task_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->task_id; ?>"><?php echo $rows1->task_name; ?> </option> <?php  } } ?></select> Remarks : <input type="text" name="task_remarks[]" size="30">
	</div>
</div>
						</td>
						
						
						</tr>
							 
							 
							
									   
							   
							   
	</table>
							   
							   
</td></tr>


</table>

<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/parts.png" align="left" width="20" height="20"><strong><font color="#ffffff">Parts Details</strong></td></tr>
<tr><td>
<table width="100%">
<tr><td align="center"><strong>Part Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Price</strong></td>
<td align="center"><strong>Amount</strong></td>
</tr>

<?php 
$sqlpt="SELECT * from released_item,items where released_item.item_id=items.item_id AND released_item.job_card_id='$job_card_id'";
$resultspt= mysql_query($sqlpt) or die ("Error $sqlpt.".mysql_error());
if (mysql_num_rows($resultspt) > 0)
						  {
						  while ($rowspt=mysql_fetch_object($resultspt))
						  {
?>
<tr>
<td ><?php echo $rowspt->item_name.' ('.$rowspt->item_code.')'?><input type="hidden" name="part_id[]" value="<?php echo $rowspt->item_id;?>"></td>
<td align="center"><?php echo $item_quantity=$rowspt->released_quantity;?><input type="hidden" name="quantity[]" value="<?php echo $rowspt->released_quantity;?>"></td>
<td align="right"><?php echo $item_cost=$rowspt->curr_sp; 
//echo $item_bp=$rowspt->curr_bp;

//echo $item_value=$item_quantity*$item_bp;

?><input type="hidden" name="item_cost[]" value="<?php echo $rowspt->curr_sp;?>"></td>
<td align="right"><?php echo number_format($item_amount=$item_quantity*$item_cost,2);?></td>


</tr>

<?php

$ttl_item_cost=$ttl_item_cost+$item_amount;
}

?>
<tr>
<td><strong>Parts Totals</strong></td>
<td></td>
<td></td>
<td align="right"><strong><?php echo number_format($ttl_item_cost,2);?></strong></td>

</tr>
<?php




}
else
{
?>
<tr><td align="center" colspan="6"><font color="#ff0000">No parts assigned!!</font></td></tr>
<?php
}

?>

</table>

</td></tr>
<!--<tr><td  colspan="2"><input type='button' value='Add More Part' id='addPart'>
<input type='button' value='Remove Part' id='removePart'>

<div id='TextBoxesGroup3'>
	<div id="TextBoxDiv3">Part 1 : <select name="part_id[]"><option value="0">Select........................</option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option><?php  }}?></select> Quantity : <input type="textbox" name="quantity[]" id="quantity[]" size="10">

	</div>
</div></td></tr>-->


</table>

</td>




<td valign="top"><td valign="top" height="200" width="50%">


<!--<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/vehicle.png" align="left" width="30" height="20"><strong><font color="#ffffff">Labour Cost Details</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>
<tr><td align="" colspan="2">
Labour Cost (<?php echo $rowsitd->curr_name;?>)<input type="textbox" name="labour_cost" size="30"> </br></br>





</td></tr>


</table>-->

<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/vehicle.png" align="left" width="30" height="20"><strong><font color="#ffffff">Discount And VAT Details</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td align="" colspan="2">

<?php
$sqlitd="SELECT * from quotation where booking_id='$booking_id'";
$resultsitd= mysql_query($sqlitd) or die ("Error $sqlitd.".mysql_error()); 
$rowsitd=mysql_fetch_object($resultsitd);
$discount=$rowsitd->discount_perc;
$vat_val=$rowsitd->vat;
 ?>



Discount (%) <input type="textbox" name="discount" size="30" value="<?php echo $discount;?>"> </br></br>



Apply VAT (16%) 

<?php 
	if ($vat_val!=0)
        {
	?>
      <input type="radio" name="vat" value="1" checked>Yes
	  <input type="radio" name="vat" value="0">No
	  <?php 
	  }
	  else
	  {?>
	  
	  <input type="radio" name="vat" value="1">Yes
	  <input type="radio" name="vat" value="0" checked>No
	  
	  <?php 
	  }
	  
	  ?>
	



</td></tr>


</table>


<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Terms</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td align="">
Payment Terms / Others Terms</br>
<textarea name="terms" rows="2" cols="50"></textarea>
</td></tr>


</table>

<!--<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="3"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Invoice Totals</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>
<tr>
<td align="" width="40%"><strong>Descrption</strong></td>
<td align="" width="20%"><strong>Amount (<?php echo $rowsitd->curr_name;?>)</strong></td>
<td align=""><strong></strong></td>

</tr>

<tr>
<td align="">Task Total (<?php echo $rowsitd->curr_name;?>)</td>
<td align="right"><?php echo number_format($task_amount,2); ?></td>
<td></td>

</tr>

<tr>
<td align="">Parts Total (<?php echo $rowsitd->curr_name;?>)</td>
<td align="right"><?php echo number_format($parts_amount,2); ?></td>
<td></td>
</tr>

<tr>
<td align="">Labour (<?php echo $rowsitd->curr_name;?>)</td>
<td align="right"><strong></strong></td>
<td></td>
</tr>

<tr>
<td align="">Discount (<?php echo $rowsitd->curr_name;?>)</td>
<td align=""></td>
<td></td>
</tr>

<tr>
<td align="">VAT (16%)</td>
<td align=""></td>
<td></td>
</tr>


</table>-->
</td></td>


</tr>

<tr height="30" bgcolor="#FFFFCC"><td colspan="10" align="center"><input type="submit" name="submit" value="Submit For Invoicing" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;">
	<input type="hidden" name="add_invoice" id="add_invoice" value="1">&nbsp;&nbsp;</td></tr>
<?php 
}
?>	

</table>

</form>
<?php 
	}
	
	?>
<?php
if ($invoice_id!='')
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
  var frmvalidator  = new Validator("emp");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	

 frmvalidator.addValidation("date_from","req",">>Please enter invoicing date");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 

  
//]]></script>



