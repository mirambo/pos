<?php
$qtn_type=$_GET['quote'];
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$sqlrec="SELECT * FROM customer,bookings WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);



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

submit_invoice($booking_id,$task_name,$task_cost,$invoice_date,$currency,$part_id,$quantity,$terms,$discount,$vat,$labour_cost,$user_id);

}
 ?>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript" src="suggest.js"></script>

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

	<p><strong>Job Card No : <i><font color="#ff0000"><?php echo $job_card_id;  ?></font></i></strong></p>
	<img src="images/car.png" align="left" style="margin-left:100px; margin-right:0px;">
	<strong>Customer Name : <i><font color="#ff0000"><?php echo ' - '.$supplier_name=$rowsrec->customer_name.' ';  ?></font></i>
	
	Contact Person: <i><font color="#ff0000"><?php echo $rowsrec->contact_person;  ?></i></font>
	
	Email Address: <font color="#ff0000"><i><?php echo $curr_name=$rowsrec->email;  ?></i></font>
	
Phone Number :<font color="#ff0000"><i><?php echo $terms=$rowsrec->phone;  ?></i></font></strong>
	<br/>
	<br/>
	
	<strong>Vehicle Registration No :   <i><font color="#ff0000"><?php echo $reg_no=$rowsrec->reg_no.' ';  ?></i></font>
	
	Vehicle Make And Model: <i><font color="#ff0000"><?php echo $rowsrec->vehicle_make.' - '.$rowsrec->vehicle_model;  ?></i></font>
	
Engine: <i><font color="#ff0000"><?php echo $curr_name=$rowsrec->engine;  ?></i></font>
	
Chasis No :<i><font color="#ff0000"><?php echo $terms=$rowsrec->chasis_no;  ?></i></font></strong>
	
	<br/>
</table>	

<?php 
if ($view==1)
{

}
else
{
?>

	<h3 align="center">Enter Invoice Details</h3>
	
	<?php 
	}
	
	?>
	
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
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Task Details</font></strong><a style="color:#ffffff; float:right;" href="#">Add More Task</a></td></tr>
<tr height="30"><td align="center">Invoice Date<input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /></td></tr>
<tr><td align="center">
Select Currency : <select name="currency">
	                  <option value="<?php echo $rowsitd->currency; ?>"><?php echo $rowsitd->curr_name;?></option>
								  
										  
                                    
									
                               </select></br/></br/>
							   
					<table width="100%">	

<tr><td align="center"><strong>Task Done</strong></td><td align="center"><strong>Cost (<?php echo $rowsitd->curr_name;?>)</strong></td><td align="center"><strong>Edit</strong></td><td align="center"><strong>Delete</strong></td></tr>					
			<?php 
$grnd_amnt=0;	
$grnd_disc=0; 
$grnd_vat=0;
$grnd_ttl_amnt=0;
$sqllpdet="SELECT * from job_card_task where job_card_id='$job_card_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
if (mysql_num_rows($resultslpdet) > 0)
						  {
							  
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  {?>
							  <tr>
						<td><?php echo $task_name=$rowslpdet->task_name ?>
						
						<input type="hidden" name="task_name[]" value="<?php echo $task_name=$rowslpdet->task_name ?>">
						
						
						
						</td>
						<td align="right"><?php echo number_format($task_cost=$rowslpdet->task_cost,2);?>
						<input type="hidden" name="task_cost[]" value="<?php echo $task_cost=$rowslpdet->task_cost ?>">
						
						</td>
						<td></td>
						<td></td>
						</tr>
							 <?php 
							 
							 $task_amount=$task_amount+$task_cost;
							  }
							  ?>
							  <td><strong>Task Totals (<?php echo $rowsitd->curr_name;?>)</strong></td>
						
						<td align="right"><strong><?php echo number_format($task_amount,2); ?><strong></td>
						<td></td>
						<td></td>
						
						</tr>	
							
							<?php   
							  }
			
			
			
			?>				   
							   
							   
	</table>						   
							   
							   
</td></tr>


</table>

<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/parts.png" align="left" width="20" height="20"><strong><font color="#ffffff">Parts Details</strong><a style="color:#ffffff; float:right;" href="#">Add More Part</a></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td align="center" colspan="2">

<table width="100%">	

<tr>
<td align="center"><strong>Part Replaced</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Unit Cost (<?php echo $rowsitd->curr_name;?>)</strong></td>
<td align="center"><strong>Amount (<?php echo $rowsitd->curr_name;?>)</strong></td>				
<td align="center"><strong>Edit</strong></td>			
<td align="center"><strong>Delete</strong></td></tr>					
			<?php 
$grnd_amnt=0;	
$grnd_disc=0; 
$grnd_vat=0;
$grnd_ttl_amnt=0;
$sqllpdet2="SELECT * from job_card_item,items where job_card_item.item_id=items.item_id AND job_card_item.job_card_id='$job_card_id'";
$resultslpdet2= mysql_query($sqllpdet2) or die ("Error $sqllpdet2.".mysql_error());
if (mysql_num_rows($resultslpdet2) > 0)
						  {
							  
							  while ($rowslpdet2=mysql_fetch_object($resultslpdet2))
							  {?>
							  <tr>
						<td><?php echo $rowslpdet2->item_name.' '.$rowslpdet2->item_code;?>
						<input type="hidden" name="part_id[]" value="<?php echo $rowslpdet2->item_id ?>">
						</td>  
						<td><?php echo $quantity=$rowslpdet2->item_quantity;?>
						<input type="hidden" name="quantity[]" value="<?php echo $rowslpdet2->item_quantity;?>">
						</td>
						<td><?php echo number_format($amount=$rowslpdet2->item_cost,2);?>
						<input type="hidden" name="unit_cost[]" value="<?php echo $rowslpdet2->item_cost;?>">
						
						</td>
						<td align="right"><?php echo number_format($ttl_cost=$amount*$quantity,2);?></td>
						<td align="center"><img src="images/edit.png"></td>
						<td align="center"><img src="images/delete.png"></td>
						</tr>
							 <?php 
							$parts_amount=$parts_amount+$ttl_cost;
							 
							 
							 
							  }
							  
							 ?> 
						<tr>
						
						<td><strong>Parts Totals (<?php echo $rowsitd->curr_name;?>)</strong></td>
						<td></td>
						<td></td>
						<td align="right"><strong><?php echo number_format($parts_amount,2); ?><strong></td>
						<td></td>
						<td></td>
						
						</tr>	 
							 
							 
							 <?php 
							  }
			
			
			
			?>				   
							   
							   
	</table>


</td></tr>


</table>

</td>




<td valign="top"><td valign="top" height="200" width="50%">


<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/vehicle.png" align="left" width="30" height="20"><strong><font color="#ffffff">Labour Cost Details</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td align="" colspan="2">
Labour Cost (<?php echo $rowsitd->curr_name;?>)<input type="textbox" name="labour_cost" size="30"> </br></br>





</td></tr>


</table>

<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/vehicle.png" align="left" width="30" height="20"><strong><font color="#ffffff">Discount And VAT Details</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td align="" colspan="2">
Discount (%) <input type="textbox" name="discount" size="30"> </br></br>

Apply VAT (16%) <input type="radio" name="vat" value="1">Yes<input type="radio" name="vat" value="0" checked="checked">No



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

<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="3"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Invoice Totals</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
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


</table>
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
if ($view==1)
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
	

 frmvalidator.addValidation("date_from","req",">>Please enter begin date");
 frmvalidator.addValidation("date_to","req",">>Please enter completion date");
 frmvalidator.addValidation("technician","dontselect=0",">>Please assign technician");
 

  
//]]></script>



