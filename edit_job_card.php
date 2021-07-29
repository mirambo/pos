<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$job_card_item_id=$_GET['job_card_item_id'];

$sql="SELECT * from job_cards WHERE job_card_id='$job_card_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$sale_type=$rows->sale_type;

$curr_id=$rows->currency;
//$customer_id=$rows->customer_id;
$querycr="select * from currency where curr_id='$curr_id'";
$resultscr=mysql_query($querycr) or die ("Error: $queryc.".mysql_error());								  
$rowscr=mysql_fetch_object($resultscr);
$curr_name=$rowscr->curr_name;
$curr_rate=$rows->curr_rate;
$discount=$rows->discount;
$sale_type=$rows->sale_type;


$customer_id=$rows->customer_id;
$queryc="select * from customer where customer_id='$customer_id'";
$resultsc=mysql_query($queryc) or die ("Error: $queryc.".mysql_error());								  
$rowsc=mysql_fetch_object($resultsc);

$c_name=$rowsc->customer_name;



$technician_id=$rows->technician_id;
$queryt="select * from users where user_id='$technician_id'";
$resultst=mysql_query($queryt) or die ("Error: $queryt.".mysql_error());								  
$rowst=mysql_fetch_object($resultst);

$tech_name=$rowst->f_name;




?>
<script type="text/javascript"> 
function confirmSave()
{
    return confirm("Are you sure want to save changes?");
}
</script>
<form name="new_machine_category" action="process_edit_job_card.php" method="post">			
<table width="100%" border="1" class="table1" id="tbl1">

  
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
	

	<td colspan="2"><strong>Job Card Detail </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Start Date : </strong></td>
	<td width="100"><input type="text" name="start_date" value="<?php echo $rows->start_date;?>" size="50"></strong></td>

  </tr>
    <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>End Date : </strong></td>
	<td width="100"><input type="text" name="end_date" value="<?php echo $rows->end_date;?>" size="50"></strong></td>

  </tr>
     <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Type Of Sale : </strong></td>
	<td width="100">
	<?php 
	
	if ($sale_type=='cr')
{
?>	
	<input type="radio" name="sale_type" value="cr" checked>Credit Sale
	<input type="radio" name="sale_type" value="ch">Cash Sale
	<?php 
	}
if ($sale_type=='cs')
{
?>	
 	<input type="radio" name="sale_type" value="cr" >Credit Sale
	<input type="radio" name="sale_type" value="ch" checked>Cash Sale
<?php	
	}
	
	
	?>
</td>

  </tr>
     <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Customer : </strong></td>
	<td width="100"><select name="customer_id">
	<option value="<?php echo $customer_id;?>"><?php echo $c_name; ?></option>
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
									  
									  
								  
								  
								  
								  
								  
								  ?></select></td>

  </tr>
     <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Discount (%) : </strong></td>
	<td width="100"><input type="text" name="discount" value="<?php echo $rows->discount;?>" size="50"></strong></td>

  </tr>
     <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Technician : </strong></td>
	<td width="100"><select name="technician_id">
<option value="<?php echo $technician_id;?>"><?php echo $tech_name; ?></option>
<?php $query1="select * from users where user_group_id='30' order by f_name asc"; 
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); 
if (mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) 
{ ?> <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option> 
<?php  
} 
} ?></select></strong></td>

  </tr>
     <tr style="background:url(images/description.gif);" height="20" >
	<td width="100" align="right"><strong>Currency : </strong></td>
	<td width="100"><select name="currency">
	<option value="<?php echo $curr_id;?>"><?php echo $curr_name; ?></option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM currency order by curr_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['curr_id']; ?>"><?php echo $row['curr_name']; ?></option>
    <?php endwhile; ?>
    </select></td>

  </tr>
  <tr style="background:url(images/description.gif) repeat x;" height="20" >
	<td width="100" align="right"><strong>Exchange Rate To (SSP) : </strong></td>
	<td width="100"><input type="textbox" size="10" name="curr_rate" value="<?php echo $curr_rate;?>"></td>

  </tr>
  
  <tr style="background:url(images/description.gif) repeat x;" height="20" >
	<td width="100" align="right"><strong>Remarks
	</strong></td>
	<td width="100"><textarea rows="5" cols="30" name="gen_remarks"><?php echo $rows->general_remarks; ?></textarea>	</td>

  </tr>
  
	
	
	
  
  
  
  <tr height="40">
    <td align="center" colspan="2"><input type="submit" onClick="return confirmSave();" name="submit" value="Update">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>    
  </tr>
 
</table>


</form>



			
			
			
			