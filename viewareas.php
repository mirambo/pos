<?php

if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
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
   
    <td colspan="11" height="30" align="center"> 
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
   

    <td width="23%" colspan="11" align="center">   <strong>Filter By Customer<font color="#FF0000">* </font></strong>
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
  
    <!--<td align="center" width="150"><strong>Job Card No</strong></td>-->
    <td align="center" width="150"><strong>Quotation No</strong></td>
    <td align="center" width="150"><strong>Date Generated</strong></td>
    <td align="center" width="150"><strong>Make and Model</strong></td>
	 <td align="center" width="150"><strong>Registration No</strong></td>
    <td align="center" width="150"><strong>Customer Name</strong></td>   
	<!--<td align="center" width="150"><strong>Amount(Kshs)</strong></td>-->
	<td align="center" width="150"><strong>Tasks Allocated</strong></td>
    <td align="center" width="150"><strong>Parts Replaces</strong></td>  
<!--<td align="center" width="100"><strong>Customer Belongings</strong></td>-->	
    <td align="center" width="300"><strong>Quotation Value (Kshs)</strong></td>    
    <td align="center" width="150"><strong>Generated By</strong></td>    
    <td align="center" width="150"><strong>View Details</strong></td>    
  <!--  <td align="center" width="150"><strong>Job Card Details</strong></td> -->
	
	<!--<td align="center" width="100"><strong>Cancel</strong></td>-->
    </tr>


 <?php 
if ($user_group_id==15)
{
  if (!isset($_POST['generate']))
{ 

 
$sql="SELECT * FROM quotation WHERE convert_status='1' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$location_id=$_POST['location_id'];
$settlement_name=$_POST['settlement_name'];
if ($location_id!=0 && $settlement_name=='')
{
$sql="SELECT * FROM quotation where customer_id='$location_id' AND convert_status='1' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($location_id==0 && $settlement_name!='')
{
$sql="SELECT * FROM quotation,bookings where quotation.booking_id=bookings.booking_id AND convert_status='1'  AND 
bookings.reg_no LIKE '%$settlement_name%' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($location_id!=0 && $settlement_name!='')
{
$sql="SELECT * FROM quotation,bookings where quotation.booking_id=bookings.booking_id AND 
quotation.customer_id='$location_id' AND convert_status='1' AND bookings.reg_no LIKE 
'%$settlement_name%' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT * FROM quotation WHERE convert_status='1' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}




}
}
else
{

  if (!isset($_POST['generate']))
{ 

 
$sql="SELECT * FROM quotation where convert_status='1' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$location_id=$_POST['location_id'];
$settlement_name=$_POST['settlement_name'];
if ($location_id!=0 && $settlement_name=='')
{
$sql="SELECT * FROM quotation where customer_id='$location_id' AND convert_status='1' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($location_id==0 && $settlement_name!='')
{
$sql="SELECT * FROM quotation,bookings where convert_status='1' AND quotation.booking_id=bookings.booking_id AND 
bookings.reg_no LIKE '%$settlement_name%' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($location_id!=0 && $settlement_name!='')
{
$sql="SELECT * FROM quotation,bookings where quotation.booking_id=bookings.booking_id AND 
quotation.customer_id='$location_id' AND convert_status='1' AND bookings.reg_no LIKE 
'%$settlement_name%' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT * FROM quotation WHERE convert_status='1' order by date_generated desc";
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
  
   

    <td><?php echo $quotation_id=$rows->quotation_id;?></td>
    <td><?php echo $rows->date_generated;?></td>
    <td>
	<?php 
	 $booking_id=$rows->booking_id;
	
$sqllpdet="SELECT * from bookings,customer where bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
	
	
	echo $rowslpdet->vehicle_make.' - '.$rowslpdet->vehicle_model;?>
	
	
	</td>
    <td align="center"><?php echo $reg_no=$rowslpdet->reg_no;?></td>
    <td>
	
	<?php echo $rowslpdet->customer_name;?>
	
	
	</td>
    <!--<td align="right"><strong><?php 
	
	$booking_id=$rows->booking_id;
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
	
	?></strong></td>-->
	<td align="center">
	
	<?php
$sqlts="SELECT * from quotation_task where quotation_id='$quotation_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
echo $rowsts=mysql_num_rows($resultsts);

	?>
	
	
	
	</td>
	<td align="center">
	
	<?php
$sqlpt="SELECT * from quotation_item where quotation_id='$quotation_id'";
$resultspt= mysql_query($sqlpt) or die ("Error $sqlpt.".mysql_error());
echo $rowspt=mysql_num_rows($resultspt);

	?>
	
	
	
	</td>

	
	
	
	<td align="right"><strong>
	<?php 
	
	include ('quotation_value.php');
//task_totals


//parts  totals


//grand totals	
	
	//echo $rows->terms;
	
	
	
	
	
	
	?></strong></td>
	<td>
	<i><font size="-2">
	<?php $staff=$rows->user_id;
$sqlst="SELECT * FROM  users where user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i>
	
	</td>
 <td align="right"><a href="home.php?submit_biweekly=submit_biweekly&booking_id=<?php echo $rows->booking_id;?>&quotation_id=<?php echo $rows->quotation_id; ?>">View Quotation Details</a></td>

<!--<td></td>-->
	
   
    </tr>

  <?php 
  
  }
  
  ?>
  <tr bgcolor="#FFFFCC">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td align="right"><strong><font size="+1" color="#ff0000"><?php echo number_format($quotation_ttl,2); ?></font></strong></td>
  <td></td>
  <td></td>
 
  
  </tr>
  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr bgcolor="#FFFFCC" height="30"><td colspan="11" align="center"><font color="#ff0000"><strong>No Results found!!</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
  
  </table>
   </td></tr>	 
  
  
  
  
  
  
</table>
</form>
 <?php }?>