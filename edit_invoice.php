<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$booking_id=$_GET['booking_id'];
$invoice_id=$_GET['invoice_id'];
$job_card_id=$_GET['job_card_id'];
$invoice_item_id=$_GET['invoice_item_id'];
$approve=$_GET['approve'];

$sql="SELECT * from invoice,currency WHERE invoice.currency=currency.curr_id AND invoice.invoice_id='$invoice_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);



?>
<form name="new_machine_category" action="process_edit_invoice.php?approve=<?php echo $approve;?>" method="post">			
<table width="100%" border="0" class="table1" id="tbl1">

  
	<input type="hidden" size="41" name="invoice_id" value="<?php echo $invoice_id;?>">
	<input type="hidden" size="41" name="job_card_id" value="<?php echo $job_card_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">


	<td colspan="2" height="30"><?php

if ($_GET['addbenefitsconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Benefit Type Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>

	
	<tr  align="center">	
	

	<td colspan="2"><strong>Invoice Detail </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Invoice Date : </strong></td>
	<td width="100"><input type="text" name="date_from" value="<?php echo $rows->invoice_date;?>" size="50"></strong></td>

  </tr>
    <!--<tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Currency : </strong></td>
	<td width="100"> <select name="currency">
	                  <option value="<?php echo $rows->currency;?>"><?php echo $rows->curr_name; ?></option>
								  
										  
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
									
                               </select></td>

  </tr>-->
    <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Discount (%): </strong></td>
	<td width="100"><input type="text" name="discount" value="<?php echo $rows->discount_perc;?>" size="50"></strong></td>

  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>VAT (16%) : </strong></td>
	<td width="100">
	<?php  $vat_val=$rows->vat; 
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
	
	</td>

  </tr>
  <tr style="background:url(images/description.gif) repeat x;" height="20" >
	<td width="100" align="right"><strong>Terms : </strong></td>
	<td width="100"><textarea name="terms" rows="3" cols="50"><?php echo $rows->terms;?></textarea></td>

  </tr>
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input type="submit" name="submit" value="Update">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>



			
			
			
			