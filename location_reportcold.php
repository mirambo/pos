<?php
$id=$_GET['cat'];
$view=$_GET['view'];
$booking_id=$_GET['booking_id'];
$estimates_id=$_GET['estimates_id'];
$sqlrec="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);


$sqlitd="SELECT item_id from estimates where booking_id='$booking_id'";
$resultsitd= mysql_query($sqlitd) or die ("Error $sqlitd.".mysql_error());

if (mysql_num_rows($resultsitd) > 0)
						  {
						  while ($rowsitd=mysql_fetch_object($resultsitd))
						  {
						  $item_id=$rowsitd->item_id;
						  
	//items available in store					  
$sqlav="SELECT SUM(quant_rec) as ttl_rec from received_stock where item_id='$item_id'";
$resultsav= mysql_query($sqlav) or die ("Error $sqlav.".mysql_error());
$rowsav=mysql_fetch_object($resultsav);
$ttl_rec=$rowsav->ttl_rec.',';

//items sold
//$ttl_avail=0;
$sqlsd="SELECT SUM(quantity) as ttl_sold from estimates where item_id='$item_id' AND inventory_status='1'";
$resultsd= mysql_query($sqlsd) or die ("Error $sqlsd.".mysql_error());
$rowsd=mysql_fetch_object($resultsd);
$ttl_sold=$ttl_sold+$rowsd->ttl_sold.',';


//items avalable
 $avail_quant=$ttl_rec-$ttl_sold;
	
$ttl_avail=$ttl_avail+$avail_quant;
//what is in the estimates	
$ttl_est_quant=0;	
				  
$sqlest="SELECT SUM(quantity) as est_quant from estimates where booking_id='$booking_id'";
$resultsest= mysql_query($sqlest) or die ("Error $sqlest.".mysql_error());	
$rowsest=mysql_fetch_object($resultsest);		
$est_quantity=$rowsest->est_quant;	
$ttl_est_quant=$ttl_est_quant+$rowsest->est_quant;
						  
						  }
						  }
//$ttl_rec;
//$est_quantity;
$ttl_avail;
$ttl_est_quant;
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

assign_projectdonor($booking_id,$start_date,$end_date,$technician,$work_desc,$user_id);
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
<SCRIPT language="javascript">
function reload(form)
{
var val=form.cat_id.options[form.cat_id.options.selectedIndex].value;
self.location='home.php?areareport=areareport&booking_id=<?php echo $booking_id;  ?>&cat=' + val ;

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
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>
<form  name="emp" id="emp" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="suggestSearch"> 
<table width="100%" border="0">
 <tr height="30" bgcolor="#FFFFCC">
    
    <td colspan="7" align="center">
	<br/>
	<img src="images/car.png" align="left" style="margin-left:100px; margin-right:0px;">
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
if ($view==1)
{

}
else
{
?>

	<h3 align="center">Enter Job Card Details</h3>
	
	<?php 
	}
	
	?>
	
<table width="90%" border="0" align="center">
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Created Successfully!!</font></strong></p></div>';

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
<td><strong>Begining Date</strong></td>
<td>
<div id='emp_date_from_errorloc' class="error_strings"></div>
<input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /></td>
<td><strong>Completion Date</strong></td>
<td>
<div id='emp_date_to_errorloc' class="error_strings"></div>
<input type="text" name="date_to" size="20" id="date_to" readonly="readonly" />
</td>
<td><strong>Assign Technician</strong></td>
<td>
<div id='emp_technician_errorloc' class="error_strings"></div>

<select name="technician"><option value="0">Select...............................................</option>
								  <?php
								  
								  $query1="select * from users where user_group_id='30' order by f_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select></td>
<td><strong>Work Description</strong></td>
<td><textarea name="work_desc" cols="30" rows="3"></textarea></td>

</tr>

<tr height="30" bgcolor="#FFFFCC"><td colspan="10" align="center"><input type="submit" name="submit" value="Save">
	<input type="hidden" name="add_job_card" id="add_job_card" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td></tr>
<?php 
}
?>	
<tr bgcolor="#000033" height="30">	<td colspan="10" align="center">
	<span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::Job Card Details</span>
	<span style="color:#FFFFFF; float:right; font-weight:bold;">
	<a target="_blank" href="print_admin_job_card.php?booking_id=<?php echo $booking_id;?>" style="color:#FFFFFF;">Print Administration Job Card</a> | 
	
	<a target="_blank" href="print_tech_job_card.php?booking_id=<?php echo $booking_id;?>" style="color:#FFFFFF; font-weight:bold;" target="_blank">Print Technician Job Card</a> | 
	
	
	
	
	</span>
	</td>
</tr>

<tr><td colspan="8">
<table width="100%" border="0">
<tr style="background:url(images/description.gif);" height="30" align="center">
<td><strong>Begin Date</strong></td>
<td><strong>End Date</strong></td>
<td><strong>Technician</strong></td>
<td><strong>Work Description</strong></td>
<td><strong>Edit</strong></td>
<td><strong>Delete</strong></td>
</tr>
<?php 
$sqlj= "SELECT * from job_cards,users where job_cards.technician=users.user_id AND job_cards.booking_id='$booking_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());


if (mysql_num_rows($resultsj) > 0)
						  {
						  
						  while ($rowsj=mysql_fetch_object($resultsj))
							  { 
						
?>
<tr height="30" align="center">
<td><?php echo $rowsj->begin_date; ?></td>
<td><?php echo $rowsj->end_date; ?></td>
<td><?php echo $rowsj->f_name; ?></td>
<td width="200" align="left"><?php echo $rowsj->work_description; ?></td>
<td><a rel="facebox" href="edit_job_card.php?job_card_id=<?php echo $rowsj->job_card_id;?>&booking_id=<?php echo $booking_id;?>"><img src="images/edit.png"></a></td>
<td><?php if ($sess_allow_delete==1) 
	{
	?>
	<a href="home.php?locationreportc=locationreportc&subDELETELocation&booking_id=<?php echo $booking_id;?>&job_card_id=<?php echo $rowsj->job_card_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	<?php
		}
	else
	{ 
	echo $me;
	
	}?></td>
</tr>

<?php 
}}
else
{?>
<tr bgcolor="#ffffcc" height="25" align="center"><td colspan="10"><strong><font color="#ff0000">No Job Card Details Found !!</font></strong></td></tr>
<?php


}

?>



</table>



</td>





</tr>
	
	
	
<tr bgcolor="#000033" height="30">	<td colspan="10" align="center">
	<span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::Estimates Details</span>
	<!--<span style="color:#FFFFFF; float:right; font-weight:bold;"><a href="generate_invoice_back.php?saveconfirm=1"style="color:#FFFFFF;">Save Estimates</a> | 
	
	<a href="print_estimates.php?booking_id=<?php echo $booking_id;?>" style="color:#FFFFFF; font-weight:bold;" target="_blank">Print Estimates</a> | 
	
	
	
	
	</span>-->
	</td>
</tr>


</table>

<table width="90%" border="0" align="center">
<tr align="center" bgcolor="#FFFFCC" height="30">
<td><strong>Part Code</strong></td>
<td><strong>Part Name</strong></td>
<td><strong>Quantity</strong></td>
<td><strong>Unit Price (Kshs) </strong></td>
<td><strong>Amount (Kshs)</strong></td>
<td><strong>Discount (Kshs)</strong></td>
<td><strong>VAT (16%)</strong></td>
<td><strong>Totals</strong></td>
<!--<td><strong>Edit</strong></td>
<td><strong>Delete</strong></td>-->

</tr>

<?php 
$grnd_ttl_amnt=0;
$sqllpdet="SELECT estimates.curr_sp,estimates.item_id,estimates.quantity,estimates.discout,estimates.discount_value,estimates.vat_value,estimates.vat,estimates.estimates_id,
items.item_name,items.item_code FROM estimates,items where estimates.item_id=items.item_id AND estimates.booking_id='$booking_id' ORDER BY estimates_id asc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());


if (mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 
 
 ?>
<td><?php echo $rowslpdet->item_code;?></td>
    <td ><?php echo $rowslpdet->item_name; ?></td>
    <td><?php echo $quantity=$rowslpdet->quantity; ?></td>
    <td align="right"><?php echo number_format($curr_sp=$rowslpdet->curr_sp,2);?></td>
    <td align="right"><strong><?php echo number_format($amnt=$curr_sp*$quantity,2);?></strong></td>
    <td align="right"><?php echo number_format($discount_value=$rowslpdet->discount_value,2).' ('.$rowslpdet->discout.'%)';?></td>
    <td align="right"><?php echo number_format($vat_value=$rowslpdet->vat_value,2);?></td>
    <td align="right"><strong><font size=""><?php 
	
	//$qnty=$rowslpdet->quantity;
	echo number_format($ttl_amnt=$amnt-$discount_value+$vat_value,2);
	
	?></font></strong></td>
    <!--<td align="center"><a rel="facebox" href="edit_estimates.php?estimates_id=<?php echo $rowslpdet->estimates_id;?>&booking_id=<?php echo $booking_id;?>"><img src="images/edit.png"></a></td>
    <td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	?>
	<a href="home.php?areareport=areareport&subDELETELocation&booking_id=<?php echo $booking_id;?>&estimates_id=<?php echo $rowslpdet->estimates_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	<?php
		}
	else
	{ 
	echo $me;
	
	}?></td>-->
	</tr>
	
	<?php 
	$grnd_amnt=$grnd_amnt+$amnt;
	$grnd_disc=$grnd_disc+$discount_value;
	$grnd_vat=$grnd_vat+$vat_value;
	$grnd_ttl_amnt=$grnd_ttl_amnt+$ttl_amnt;
	
	
	}?>
	<tr bgcolor="#FFFFCC" height="30">
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td align="right"><font size="+0"><strong><?php echo number_format($grnd_amnt,2);?></strong></font></td>
	<td align="right"><?php echo number_format($grnd_disc,2);?></td>
	<td align="right"><?php echo number_format($grnd_vat,2);?></td>
	<td align="right"><font size="+1" color="#ff0000"><strong><?php echo number_format($grnd_ttl_amnt,2);?></strong></font></td>
	<td></td>
	<td></td>
	
	
	
	</tr>
	
	<?php
	
	
	}
	
	?>


</table>	
	

</td>
    

  </tr>
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
 frmvalidator.addValidation("technician","dontselect=0",">>Please assign technician");
 

  
//]]></script>



