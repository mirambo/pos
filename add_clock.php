<?php
$id=$_GET['cat'];
$view=$_GET['view'];
$booking_id=$_GET['booking_id'];
$requisition_id=$_GET['requisition_id'];
$sqlrec="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);



$engine_range_id=$rowsrec->engine_range_id;

$sql1="SELECT * FROM engine_range where engine_range_id='$engine_range_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$range_name=$rows1->min_capacity.' To '.$rows1->max_capacity;

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

create_requisition($requisition_date,$job_card_id,$part_id,$quantity,$remarks,$user_id);
}

include('includes/facebox.php');
 ?>
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
    return confirm("Are you sure want to save items to cost of production center?");
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
	      '<select name="task_name[]"><option value="0">Select...........................</option><?php $query1="select * from task order by task_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->task_id; ?>"><?php echo $rows1->task_name; ?> </option> <?php  } } ?></select> Assign Technician <select name="technician_id[]"><option value="0">Select...........................</option><?php $query1="select * from users where user_group_id='30' order by f_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option> <?php  } } ?></select>');
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
 	newTextBoxDiv3.after().html('Item '+ counter + ' : ' +'<select style="width:300px;" name="part_id[]"><option value="0">Select........................</option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option><?php  }}?></select> Quantity : <input type="textbox" name="quantity[]" id="quantity[]" size="10"> Amount : <input type="textbox" name="amount[]" id="amount[]" size="10">');
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
	

<?php 
if ($requisition_id!=0)
{
include('view_requisition_details.php');
?>

<?php
}
else
{
?>

	<h3 align="center">Enter Return Inwards Details</h3>
	
	
	
<table width="90%" border="0" align="center">
<tr style="display:none;" bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

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
<tr bgcolor="#2E3192"><td colspan="2"  align="center">
<img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">Details</font></strong></td></tr>
<tr height="30">
<td align="center">
<div id='emp_date_from_errorloc' class="error_strings"></div>
<div id='emp_job_card_id_errorloc' class="error_strings"></div>
Date<input type="text" name="date_from" size="20" id="date_from" readonly="readonly" />

<!--Select Job Card No : <select name="job_card_id" >
	                  <option value="0" >Select------------------------</option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM job_cards order by job_card_id asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->job_card_id;?>"><?php echo $rowscurr->job_card_id;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>-->
</td></tr>



</table>

<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/parts.png" align="left" width="20" height="20"><strong><font color="#ffffff">Items Details</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td align="center" colspan="2">
<div id='emp_part_id_errorloc' class="error_strings"></div>
<input type='button' value='Add Part' id='addPart'>
<input type='button' value='Remove Part' id='removePart'>

<div id='TextBoxesGroup3'>
	<div id="TextBoxDiv3">Item 1 : <select style="width:200px;" name="part_id[]"><option value="0">Select........................</option><?php $query1="select * from items order by item_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) {while ($rows1=mysql_fetch_object($results1)) { ?>	<option value="<?php echo $rows1->item_id;?>"><?php echo $rows1->item_name.' ('.$rows1->item_code.')'; ?> </option><?php  }}?></select> Quantity : <input type="textbox" name="quantity[]" id="quantity[]" size="10"> Amount : <input type="textbox" name="amount[]" id="amount[]" size="10">

	</div>
</div></td></tr>


</table>

</td>




<td valign="top"><td valign="top" height="200" width="50%">


<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/vehicle.png" align="left" width="30" height="20"><strong>
<font color="#ffffff">Cost Center Remarks</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td align="center" colspan="2">
Cost Center Remarks</br>
<textarea name="remarks" rows="5" cols="50"></textarea>



</td></tr>


</table>

</td></td>


</tr>

<tr height="30" bgcolor="#FFFFCC"><td colspan="10" align="center"><input onClick="return confirmDelete();" type="submit" name="submit" value="Save Cost Of Production Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;">
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
if ($requisition_id!=0)
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
  
   /*  Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  ); */
  
  
  
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
	

 frmvalidator.addValidation("date_from","req",">>Please enter costing date");

 frmvalidator.addValidation("part_id[]","dontselect=0",">>Please select atleast one item");
  frmvalidator.addValidation("job_card_id","dontselect=0",">>Please select job card number");

 

  
//]]></script>



