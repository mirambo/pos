<?php
$booking_id=$_GET['booking_id'];
$customer_id=$_GET['customer_id'];

if (isset($_POST['add_booking']))
{
add_location ($booking_date,$customer_name,$contact_person,$address,$town,$email,$phone,$reg_no,$make,$model,$chasis_no,$engine_range_id,$engine,$trim_code,$odometer,$fuel_tank,$user_id);
}

if ($customer_id!='' && $booking_id=='')
{

$sql="SELECT * FROM customer WHERE customer_id='$customer_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

}
if ($customer_id!='' && $booking_id!='')
{
$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id 
AND bookings.booking_id='$booking_id'";
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


}

?>
<SCRIPT language="javascript">
function reload(form)
{
var val=form.country.options[form.country.options.selectedIndex].value;
self.location='home.php?perdm=perdm&cat=' + val ;

}

</script>
<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->
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



<form name="emp" id="emp" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">			
			<table width="80%" border="0" align="center">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="4" height="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
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

<?php 
$queryempno="select * from bookings order by  booking_id desc limit 1";
$resultsempno=mysql_query($queryempno) or die ("Error: $queryempno.".mysql_error());								  
$rowsempno=mysql_fetch_object($resultsempno);
$emp_no=$rowsempno->booking_id;
$booking_no=$emp_no+1;
	
	?>


	<div id='emp_f_name_errorloc' class="error_strings"></div>
	<input type="text" size="41" name="booking_no" value="<?php echo $booking_no;?>" readonly="readonly"></td>
    <td width="30%">Booking Date<font color="#FF0000">*</font></td>
    <td width="5%"><div id='emp_booking_date_errorloc' class="error_strings"></div><input type="text" name="booking_date" size="41" id="booking_date" readonly="readonly" /></td>
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
    <td><div id='emp_customer_name_errorloc' class="error_strings"></div>
	<input type="text" size="41" name="customer_name" value="<?php echo $rows->customer_name;?>"></td>
    <td>Contact Person</td>
	
	

    <td><div id='emp_emp_no_errorloc' class="error_strings"></div><input type="text" size="41" name="contact_person" value="<?php echo $rows->contact_person;?>"></td>
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
    <td><div id='emp_pin_no_errorloc' class="error_strings"></div><input type="text" size="41" name="email" value="<?php echo $rows->email;?>"></td>
    <td>Phone Number<font color="#FF0000"></font></td>
    <td><div id='emp_town_errorloc' class="error_strings"></div><input type="text" size="41" name="phone" value="<?php echo $rows->phone;?>"></td>
    </tr>
	
	  <tr height="10">
	<td>&nbsp;</td>
	<td colspan="4" ><h3>Vehicle Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	  <td>&nbsp;</td>
	  <td>Registration No. <font color="#FF0000">*</font></td>
    <td><div id='emp_reg_no_errorloc' class="error_strings"></div><input type="text" size="41" name="reg_no" value="<?php echo $rows->reg_no;?>"></td>
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
	  <td>Engine Capacity<font color="#FF0000">*</font></td>
    <td><!--<div id='emp_engine_range_id_errorloc' class="error_strings"></div>
	<select name="engine_range_id">
	<?php
if ($customer_id!='' && $booking_id!='')
{?>

<option value="<?php echo $rows->engine_range_id;?>"><?php echo $range_name;?></option>

<?php
}
else
{
	?>
	
	<option value="0">Select...</option>
	
	
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
								  <?php 
}
?>
								  </select> --><!--Exact Engine --><input type="text" size="40" name="engine" value="<?php echo $rows->engine;?>"></td>
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

  <tr height="60">

    <td ></td>
    <td colspan="6" align="center">
	<input type="submit" name="submit" value="Save">
	<input type="hidden" name="add_booking" id="add_booking" value="Save">
	
	&nbsp;&nbsp;<input type="reset" value="Cancel"></td>

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


<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("emp");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
 frmvalidator.addValidation("booking_date","req",">>Please enter booking date");
 frmvalidator.addValidation("customer_name","req",">>Please enter customer name");
 frmvalidator.addValidation("reg_no","req",">>Please enter vehicle registration number");
 frmvalidator.addValidation("engine_range_id","dontselect=0",">>Select Engine range");
 
 

  
//]]></script>