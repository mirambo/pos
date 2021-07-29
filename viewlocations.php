<?php
$id=$_GET['cat'];
$view=$_GET['view'];
$convert=$_GET['convert'];
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$quotation_id=$_GET['quotation_id'];
$sqlrec="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

 ?>
 
 <?php
if (isset($_GET['subDELETELocation']))
{

delete_country_project($job_card_id,$booking_id,$user_id);
}
 ?>
 
  <?php
if (isset($_POST['add_job_card']))
{

assign_projectdonor($booking_id,$task_name,$task_cost,$start_date,$end_date,$currency,$customer_item,$part_id,$quantity,$remarks,$user_id);
}
 ?>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript" src="suggest.js"></script>
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
    return confirm("Are you sure want to delete a task from the job card?");
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
	      '<input type="text" name="task_name[]" id="task_name[]" value="" size="30" > Amount <input type="textbox" name="task_cost[]" id="task_cost[]" size="10">');
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
<form  name="emp" id="emp" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="suggestSearch"> 
<table width="100%" border="0">
 <tr height="30" bgcolor="#FFFFCC">
    
    <td colspan="7" align="center">
	<br/>
	<img src="images/car.png" align="left" style="margin-left:100px; margin-right:0px;">
	<p><strong>Quotation No : <i><font color="#ff0000"><?php echo $quotation_id;  ?></font></i></strong></p>
	<strong>Customer Name : <i><font color="#ff0000"><?php echo ' - '.$supplier_name=$rowsrec->customer_name.' ';  ?></font></i>
	
	Contact Person: <i><font color="#ff0000"><?php echo $rowsrec->contact_person;  ?></i></font>
	
	Email Address: <font color="#ff0000"><i><?php echo $curr_name=$rowsrec->email;  ?></i></font>
	
Phone Number :<font color="#ff0000"><i><?php echo $terms=$rowsrec->phone;  ?></i></font></strong>
	<!--<strong>Term Of Payments :<i><?php echo $mop_name=$rowsrec->mop_name;  ?></i>
	
	
	<br/>
	<br/>
	<strong>Freight Charges : </strong><i><?php echo $freight_charge=$rowsrec->freight_charge;  ?></i>
	
	<strong>Comments : </strong><i><?php echo $rowsrec->comments;  ?></i> 
	<a rel="facebox" href="edit_sales_code.php?sales_code_id=<?php echo $rowsrec->sales_code_id;?>&sales_type=<?php echo $sales_type; ?>"><img src="images/edit.png"> </a>-->
		<br/>
	<br/>
	
	<strong>Vehicle Registration No :   <i><font color="#ff0000"><?php echo $reg_no=$rowsrec->reg_no.' ';  ?></i></font>
	
	Vehicle Make And Model: <i><font color="#ff0000"><?php echo $rowsrec->vehicle_make.' - '.$rowsrec->vehicle_model;  ?></i></font>
	
Engine: <i><font color="#ff0000"><?php echo $curr_name=$rowsrec->engine;  ?></i></font>
	
Chasis No :<i><font color="#ff0000"><?php echo $terms=$rowsrec->chasis_no;  ?></i></font></strong>
	<!--<strong>Term Of Payments :</strong><i><?php echo $mop_name=$rowsrec->mop_name;  ?></i>
	
	
	<br/>
	<br/>
	<strong>Freight Charges : </strong><i><?php echo $freight_charge=$rowsrec->freight_charge;  ?></i>
	
	<strong>Comments : </strong><i><?php echo $rowsrec->comments;  ?></i> 
	<a rel="facebox" href="edit_sales_code.php?sales_code_id=<?php echo $rowsrec->sales_code_id;?>&sales_type=<?php echo $sales_type; ?>"><img src="images/edit.png"> </a>-->
<!--<img src="images/client.png" align="right" style="margin-right:20px; ">		-->
	<br/>
</table>	

<?php 
if ($job_card_id!=0)
{
include('view_job_card_details.php');
?>

<?php
}
else
{
?>

	<h3 align="center">Enter Job Card Details</h3>
	
	
	
<table width="90%" border="0" align="center">
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Created Successfully!!</font></strong></p></div>';

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
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Task Details</font></strong></td></tr>
<tr height="30">
<td align="center">
<div id='emp_date_from_errorloc' class="error_strings"></div><div id='emp_date_to_errorloc' class="error_strings"></div>
Start Date<input type="text" name="date_from" size="20" id="date_from" readonly="readonly" />

End Date<input type="text" name="date_to" size="20" id="date_to" readonly="readonly" />
</td></tr>
<tr><td align="center"><div id='emp_currency_errorloc' class="error_strings"></div>
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
									
                               </select></br/></br/>


</td></tr>

<tr height="50" bgcolor="#FFFFCC">
<td valign="top" height="100" width="50%">
<table width="100%" border="1" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Task Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_more_quotation_task.php?quotation_id=<?php echo $quotation_id; ?>&booking_id=<?php echo $booking_id; ?>&convert=1"></a></td></tr>
<tr><td>
<table width="100%">

<tr>
<td align="center"><strong>Task Name</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>Assign Technician</strong></td>
<!--<td align="center"><strong>Edit</strong></td>
<td align="center"><strong>Delete</strong></td>-->
</tr>
<?php 
$task_totals=0;
$sqlts="SELECT * from quotation_task,task where quotation_task.task_id=task.task_id AND quotation_task.quotation_id='$quotation_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
?>
<tr>
<td ><?php echo $rowsts->task_name;?><input type="hidden" name="task_name[]" value="<?php echo $rowsts->task_name;?>" size="30"></td>
<td><input type="text" name="task_cost[]" value="<?php echo $rowsts->task_cost;?>" size="10"></td>

<td align="right">Assign Technician <select name="technician_id[]" ><option value="0">Select...........................</option><?php $query1="select * from users where user_group_id='30' order by f_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option> <?php  } } ?></select></td>

</tr>

<?php
$task_totals=$task_totals+$task_cost;

}
?>
<?php

}
else
{
?>
<tr><td align="center" colspan="4"><font color="#ff0000">No task created!!</font></td></tr>
<?php
}

?>


</td></tr>
</table>
</table>
</td></tr>
<table width="100%" border="1" class="table">
<tr bgcolor="#2E3192"><td colspan="4"  align="center"><img src="images/parts.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Parts Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_more_quotation_item.php?quotation_id=<?php echo $quotation_id; ?>&booking_id=<?php echo $booking_id; ?>&convert=1"></a></td></tr>
<tr><td>
<table width="100%">
<tr><td align="center"><strong>Part Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Price</strong></td>
<td align="center"><strong>Amount</strong></td>
<!--<td align="center"><strong>Edit</strong></td>
<td align="center"><strong>Delete</strong></td>--></tr>

<?php 
$sqlpt="SELECT * from quotation_item,items  where quotation_item.item_id=items.item_id AND quotation_item.quotation_id='$quotation_id'";
$resultspt= mysql_query($sqlpt) or die ("Error $sqlpt.".mysql_error());
if (mysql_num_rows($resultspt) > 0)
						  {
						  while ($rowspt=mysql_fetch_object($resultspt))
						  {
?>
<tr>
<td ><?php echo $rowspt->item_name.' ('.$rowspt->item_code.')'?><input type="hidden" name="part_id[]" value="<?php echo $rowspt->item_id;?>" size="30"></td>
<td align="center"><?php echo $item_quantity=$rowspt->item_quantity;?><input type="hidden" name="quantity[]" value="<?php echo $rowspt->item_quantity;?>" size="30"></td>
<td align="right"><?php echo $item_cost=$rowspt->item_cost;?></td>
<td align="right"><?php echo number_format($item_amount=$item_quantity*$item_cost,2);?></td>
<!--<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a rel="facebox" href="edit_quotation_item.php?quotation_item_id=<?php echo $rowspt->quotation_item_id; ?>&booking_id=<?php echo $booking_id; ?>&quotation_id=<?php echo $quotation_id; ?>&convert=1"><img src="images/edit.png"></a>
	<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?></td>
<td align="center">
<?php 
	
	$sess_allow_delete;
if ($sess_allow_delete==1)
{
	?>

<a href="delete_quotation_item.php?quotation_item_id=<?php echo $rowspt->quotation_item_id; ?>&booking_id=<?php echo $booking_id; ?>&quotation_id=<?php echo $quotation_id; ?>&convert=1" onClick="return confirmDeleteItem();"><img src="images/delete.png"></a>

<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
</td>-->

</tr>

<?php

$ttl_item_cost=$ttl_item_cost+$item_amount;
}

?>
<!--<tr>
<td><strong>Parts Totals</strong></td>
<td></td>
<td></td>
<td align="right"><strong><?php echo number_format($ttl_item_cost,2);?></strong></td>
<td></td>
<td></td>
</tr>-->
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



</table>

</td>




<td valign="top"><td valign="top" height="200" width="50%">
<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Customer Belongings</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td align="center"><input type='button' value='Add Customer Item' id='addBelong'>
<input type='button' value='Remove Customer Item' id='removeBelong'>

<div id='TextBoxesGroup2'>
	<div id="TextBoxDiv2">
		Item 1 : <input type="textbox" name="customer_item[]" id="customer_item[]" size="50">
	</div>
</div></td></tr>


</table>

<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/vehicle.png" align="left" width="30" height="20"><strong><font color="#ffffff">Vehicle Description</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td align="center" colspan="2">
Vehicle Description / More Information On the Vehicle</br>
<textarea name="remarks" rows="5" cols="50"></textarea>



</td></tr>


</table>

</td></td>


</tr>

<tr height="30" bgcolor="#FFFFCC"><td colspan="10" align="center"><input type="submit" name="submit" value="Save Job Card Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;">
	<input type="hidden" name="add_job_card" id="add_job_card" value="1">&nbsp;&nbsp;</td></tr>
<?php 
}
?>	

</table>

</form>
<?php 
	}
	
	?>
<?php
if ($job_card_id!=0)
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
  
  Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
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
	

 frmvalidator.addValidation("date_from","req",">>Please enter begin date");
 frmvalidator.addValidation("date_to","req",">>Please enter completion date");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("task_name[]","req",">>Please enter atleast one task name");
 frmvalidator.addValidation("task_cost[]","req",">>Please task amount");
 

  
//]]></script>



