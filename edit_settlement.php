<?php
if(isset($_GET['subDELETEsettlement']))
  { 
$settlement_id=$_GET['settlement_id'];
 delete_settlement($settlement_id);
  }
?>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>


<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
	<tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="8" align="center">   <strong>Filter By Customer<font color="#FF0000">* </font></strong>
	<select name="location_id"><option value="0">Select..........................................................</option>
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
								  
								  
								  <strong>Or By Vehicle Registratio No<font color="#FF0000">* </font>
								  
				 <input type="text" name="settlement_name" size="40" />				  
								  
<input type="submit" name="generate" value="Generate">								  
								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="150"><strong>Estimates/Booking No</strong></td>
    <td align="center" width="150"><strong>Estimates/Booking Date</strong></td>
    <td align="center" width="150"><strong>Customer Name</strong></td>
    <td align="center" width="150"><strong>Registration No</strong></td>
    <td align="center" width="150"><strong>Make / Model</strong></td>
    <td align="center" width="150"><strong>Estimate Value (Kshs)</strong></td>
    <td align="center" width="150"><strong>Generated By</strong></td>
    <td align="center" width="150"><strong>View /Update Details</strong></td> 
	<!--<td align="center" width="100"><strong>Cancel</strong></td>-->
    </tr>


 <?php 
 if ($user_group_id==15)
{
 
 
if (!isset($_POST['generate']))
{ 

 
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND customer.customer_id=bookings.customer_id AND estimates.item_id=items.item_id AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$location_id=$_POST['location_id'];
$settlement_name=$_POST['settlement_name'];
if ($location_id!=0 && $settlement_name=='')
{
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,
customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model
 FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND customer.customer_id=bookings.customer_id 
AND estimates.item_id=items.item_id AND bookings.customer_id='$location_id'  AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($location_id==0 && $settlement_name!='')
{
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,
customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model
 FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND customer.customer_id=bookings.customer_id 
AND estimates.item_id=items.item_id AND bookings.reg_no LIKE '%$settlement_name%'  AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($location_id!=0 && $settlement_name!='')
{
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,
customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model
 FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND customer.customer_id=bookings.customer_id 
AND estimates.item_id=items.item_id AND bookings.reg_no LIKE '%$settlement_name%' AND bookings.customer_id='$location_id' AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND customer.customer_id=bookings.customer_id AND estimates.item_id=items.item_id AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}
}
else
{

if (!isset($_POST['generate']))
{ 

 
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND estimates.user_id='$user_id' AND customer.customer_id=bookings.customer_id AND estimates.item_id=items.item_id AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$location_id=$_POST['location_id'];
$settlement_name=$_POST['settlement_name'];
if ($location_id!=0 && $settlement_name=='')
{
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,
customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model
 FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND estimates.user_id='$user_id' AND customer.customer_id=bookings.customer_id 
AND estimates.item_id=items.item_id AND bookings.customer_id='$location_id'  AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($location_id==0 && $settlement_name!='')
{
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,
customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model
 FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND estimates.user_id='$user_id' AND customer.customer_id=bookings.customer_id 
AND estimates.item_id=items.item_id AND bookings.reg_no LIKE '%$settlement_name%'  AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($location_id!=0 && $settlement_name!='')
{
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,
customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model
 FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND estimates.user_id='$user_id' AND customer.customer_id=bookings.customer_id 
AND estimates.item_id=items.item_id AND bookings.reg_no LIKE '%$settlement_name%' AND bookings.customer_id='$location_id' AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT estimates.curr_sp,estimates.item_id,estimates.booking_id,estimates.estimates_date,estimates.quantity,estimates.discout,SUM(estimates.discount_value) as ttl_disc,
SUM(estimates.vat_value) as ttl_vat,estimates.vat,estimates.estimates_id,estimates.user_id,items.item_name,items.item_code,customer.customer_name,bookings.reg_no,bookings.booking_date,bookings.vehicle_make,bookings.vehicle_model FROM bookings,customer,estimates,items 
where estimates.booking_id=bookings.booking_id AND estimates.user_id='$user_id' AND customer.customer_id=bookings.customer_id AND estimates.item_id=items.item_id AND estimates.job_card_status='0' GROUP BY estimates.booking_id order by estimates.estimates_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}




}





}

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
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
  
   
    <td><?php echo $booking_id=$rows->booking_id;?></td>
    <td><?php echo $booking_date=$rows->estimates_date;?></td>
    <td><?php echo $rows->customer_name;?></td>
    <td><?php echo $rows->reg_no;?></td>
    <td><?php echo $rows->vehicle_make.' - '.$rows->vehicle_model;?></td>
    <td align="right"><strong><?php 
	//echo $booking_id;
	 //$ttl_disc=$rows->ttl_disc;
	 //$ttl_vat=$rows->ttl_vat;
	 
$grnd_amnt=0;	
$grnd_disc=0; 
$grnd_vat=0;
$grnd_ttl_amnt=0;
$sqllpdet="SELECT * from estimates where booking_id='$booking_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
if (mysql_num_rows($resultslpdet) > 0)
						  {
							  
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  {
						$quantity=$rowslpdet->quantity;
						$curr_sp=$rowslpdet->curr_sp;
						$amnt=$curr_sp*$quantity;
						$discount_value=$rowslpdet->discount_value;
						$vat_value=$rowslpdet->vat_value;
						$ttl_amnt=$amnt-$discount_value+$vat_value;
						
	$grnd_amnt=$grnd_amnt+$amnt;
	$grnd_disc=$grnd_disc+$discount_value;
	$grnd_vat=$grnd_vat+$vat_value;
	$grnd_ttl_amnt=$grnd_ttl_amnt+$ttl_amnt;
							  
							  }
							  
							  
							  echo number_format($grnd_ttl_amnt,2);
							  
							  }
	
	?></strong></td>
	<td>
	<i><font size="-2">
	<?php $staff=$rows->user_id;
$sqlst="SELECT * FROM  users where user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i></td>
<td align="center"><a href="home.php?areareport=areareport&booking_id=<?php echo $rows->booking_id;?>&view=1">View Estimate Details</a></td>
<!--<td></td>-->
	
   
    </tr>

  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr bgcolor="#FFFFCC" height="30"><td colspan="8" align="center"><font color="#ff0000"><strong>No Results found!!</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
  
  </table>
   </td></tr>	 
  
  
  
  
  
  
</table>
</form>