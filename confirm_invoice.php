<?php
$qtn_type=$_GET['quote'];
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$invoice_id=$_GET['invoice_id'];
$confirmed_invoice_id=$_GET['confirmed_invoice_id'];
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

confirm_invoice($booking_id,$invoice_date,$user_id);

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
	      '<select name="task_name[]"><option>Select..........................................................</option><?php $query1="select * from task order by task_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) { ?> <option value="<?php echo $rows1->task_id; ?>"><?php echo $rows1->task_name; ?> </option> <?php  } } ?></select> <!--Amount : <input type="text" name="task_cost[]" size="20">-->');
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
	<strong>Customer Name : <i><font color="#ff0000"><?php echo ' - '.$supplier_name=$rowsrec->customer_name.' ';  ?></font></i>
	
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
	
	<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center" height="50"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Invoice Approved Successfully!!</font></strong></p></div>';

?></td></tr>
</table>	

<?php 
if ($confirmed_invoice_id!='')
{
?>
<p align="center" style="background:#2E3192; font-size:14px; margin:auto; color:#ffffff; font-weight:bold; width:200px; height:20px; border-radius:5px;">
<a  style="color:#ffffff; font-weight:bold;" target="_blank" href="print_admin_invoice.php?invoice_id=<?php echo $invoice_id; ?>&booking_id=<?php echo $booking_id; ?>&job_card_id=<?php echo $job_card_id ?>">Print The invoice</a>
</p>
<?php
}
else
{
include('invoice_to_confirm.php');

?>

	<table align="center">
	<tr height="30" ><td align="center"><input type="submit" name="submit" value="Approve The Invoice" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;">
	<input type="hidden" name="add_invoice" id="add_invoice" value="1">&nbsp;&nbsp;</td></tr>
	</table>
</form>

<?php
}
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



