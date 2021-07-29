<?php 
 $id=$_GET['booking_id'];
 $job_card_id=$_GET['job_card_id'];
if (isset($_POST['edit_location']))
{
editlocation ($booking_date,$customer_name,$contact_person,$address,$email,$phone,$reg_no,$make,$model,$chasis_no,$engine,$trim_code,$odometer,$fuel_tank,$user_id);
}

$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND booking_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$engine_range_id=$rows->engine_range_id;

$sql1="SELECT * FROM engine_range where engine_range_id='$engine_range_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
$rows1=mysql_fetch_object($results1);

if ($engine_range_id==999)
{
$range_name='N/A';
}
else
{
$range_name=$rows1->min_capacity.' To '.$rows1->max_capacity;
}

?>


<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>



<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="4" height="10" align="center"><?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Record Exist</font></strong></p></div>';
?></td>
    </tr>
  <tr height="10">
	<td>&nbsp;</td>
	<td colspan="4" ><h3>Booking Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    <td width="5%">&nbsp;</td>
    <td width="20%">Booking Number<font color="#FF0000"></font></td>
    <td bgcolor="">
	<div id='emp_f_name_errorloc' class="error_strings"></div>
	<input type="text" size="41" name="booking_no" value="<?php echo $booking_no=$rows->booking_id;?>" readonly="readonly"></td>
    <td width="30%">Booking Date<font color="#FF0000">*</font></td>
    <td width="5%"><div id='emp_booking_date_errorloc' class="error_strings"></div>
	<input type="text" name="booking_date" size="41" id="booking_date" value="<?php echo $rows->booking_date;?>"/></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  
  <tr height="10">
	<td>&nbsp;</td>
	<td colspan="4" ><h3>Customer Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Customer Name <font color="#FF0000">*</font></td>
    <td>
	<input type="text" size="41" name="customer_name" value="<?php echo $rows->customer_name;?>">
	<input type="hidden" size="41" name="customer_id" value="<?php echo $rows->customer_id;?>">
	
	</td>
    <td>Contact Person</td>
	
	

    <td><input type="text" size="41" name="contact_person" value="<?php echo $rows->contact_person;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Postal Address<font color="#FF0000"></font></td>
    <td><div id='emp_address_errorloc' class="error_strings"></div><input type="text" size="41" name="address" value="<?php echo $rows->address;?>"></td>
    <td>City / Town<font color="#FF0000"></font></td>
    <td><div id='emp_nat_id_errorloc' class="error_strings"></div><input type="text" size="41" name="town" value="<?php echo $rows->town;?>"></td>
    </tr>
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Email Address<font color="#FF0000"></font></td>
    <td><input type="text" size="41" name="email" value="<?php echo $rows->email;?>"></td>
    <td>Phone Number<font color="#FF0000"></font></td>
    <td><input type="text" size="41" name="phone" value="<?php echo $rows->phone;?>"></td>
    </tr>
	
	  <tr height="10">
	<td>&nbsp;</td>
	<td colspan="4" ><h3>Vehicle Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Registration No. <font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="reg_no" value="<?php echo $rows->reg_no;?>"></td>
    <td>Make</td>
    <td><div id='emp_dob_errorloc' class="error_strings"></div><input type="text" size="41" name="make" value="<?php echo $rows->vehicle_make;?>"></td>
    </tr>
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Model<font color="#FF0000"></font></td>
    <td><div id='emp_gender_errorloc' class="error_strings"></div><input type="text" size="41" name="model" value="<?php echo $rows->vehicle_model;?>"></td>
    <td>Chasis No</td>
    <td><input type="text" size="41" name="chasis_no" value="<?php echo $rows->chasis_no;?>"></td>
    </tr>
	
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Engine Capacity</td>
    <td><!--<select name="engine_range_id">


<option value="<?php echo $rows->engine_range_id;?>"><?php echo $range_name;?></option>


	

	
	
								  <?php
								  
								  $query1="select * from engine_range order by engine_range_id asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->engine_range_id; ?>"><?php echo $rows1->min_capacity; ?> To  <?php echo $rows1->max_capacity; ?></option>
                                    
                                
										  
										<?php  }
									  ?>
									  <option value="999">N/A</option>
									  <?php
									  
									  }
								  
								  
								  
								  
								  
								  ?>
</select>--> <!--Exact Ca--> <input type="text" size="40" name="engine" value="<?php echo $rows->engine;?>"></td>
    <td>Trim Code<font color="#FF0000"></font></td>
    <td><input type="text" size="41" name="trim_code" value="<?php echo $rows->trim_code;?>"></td>
    </tr>
	
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Odometer</td>
    <td><input type="text" size="41" name="odometer" value="<?php echo $rows->odometer;?>"></td>
    <td>Fuel Tank<font color="#FF0000"></font></td>
    <td><input type="text" size="41" name="fuel_tank" value="<?php echo $rows->fuel_tank;?>"></td>
    </tr>
	
	
	
	
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<input type="submit" name="submit" value="Update!!">
	<input type="hidden" name="edit_location" id="edit_location" value="Update!!">
	
	&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "booking_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "booking_date"       // ID of the button
    }
  );
  
  
  </script>

