<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?>
<?php
if(isset($_GET['subDELETELocation']))
  { 
$booking_id=$_GET['booking_id'];
delete_location($booking_id,$user_id);
  }
$cat=$_GET['cat'];
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
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>

<!--<SCRIPT language="javascript">
function reload(form)
{
var val=form.cat_id.options[form.cat_id.options.selectedIndex].value;
self.location='home.php?viewcountries=viewcountries&cat=' + val ;

}

</script>-->
 <form name="search" method="post" action="">  
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delete']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center" valign="top">
	<strong>Filter By Customer 
    </strong>
    <select name="client_id">
	<option value="0">Select..........................................................</option>
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
								  
							  
    
    
	

	
	<strong>Or By Period</strong>	
	<strong>Date From :</strong>
<input type="text" name="date_from" size="30" id="date_from" readonly="readonly" /><strong>Date To:</strong>
		<input type="text" name="date_to" size="30" id="date_to" readonly="readonly" />
			<input type="submit" name="generate" value="Search">
	<!--<a href="home.php?perdm=perdm"><img src="images/newcar.png" style="margin-top:5px; margin-left:20px;"></a>-->
	</td>
	
    </tr>




	
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Booking Number</strong></td>
    <td align="center" width="150"><strong>Booking Date</strong></td>
    <td align="center" width="150"><strong>Customer Name</strong></td>
    <td align="center" width="150"><strong>Vehicle Make and Model</strong></td>
    <td align="center" width="150"><strong>Reg. No.</strong></td>
		<td align="center" width="100"><strong>Chasis No</strong></td>
    <td align="center" width="150"><strong>Engine</strong></td>
    <td align="center" width="150"><strong>Booked By</strong></td>
	<td align="center" width="100"><strong>Generate Estimates</strong></td>

    
    </tr>
	 <?php 
	 if ($user_group_id==15)
{
if (!isset($_POST['generate']))
{
  
$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id and bookings.status='0' order by booking_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$client_id=$_POST['client_id'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ( $client_id!=0 && $date_from=='' && $date_to=='')
{

$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id and bookings.status='0' and bookings.customer_id='$client_id' order by booking_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif ( $client_id==0 && $date_from!='' && $date_to!='')
{
$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id and bookings.booking_date BETWEEN '$date_from' AND '$date_to' and bookings.status='0' order by booking_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ( $client_id!=0 && $date_from!='' && $date_to!='')
{

$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id and bookings.booking_date 
BETWEEN '$date_from' AND '$date_to' AND bookings.customer_id='$client_id' and bookings.status='0' order by booking_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id and bookings.status='0' order by booking_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}
}
else
{


if (!isset($_POST['generate']))
{
  
$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND bookings.user_id='$user_id' and bookings.status='0' order by booking_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$client_id=$_POST['client_id'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ( $client_id!=0 && $date_from=='' && $date_to=='')
{

$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND bookings.user_id='$user_id' and bookings.status='0' and bookings.customer_id='$client_id' order by booking_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif ( $client_id==0 && $date_from!='' && $date_to!='')
{
$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND bookings.user_id='$user_id' and bookings.booking_date BETWEEN '$date_from' AND '$date_to' and bookings.status='0' order by booking_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ( $client_id!=0 && $date_from!='' && $date_to!='')
{

$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND bookings.user_id='$user_id' and bookings.booking_date 
BETWEEN '$date_from' AND '$date_to' AND bookings.customer_id='$client_id' and bookings.status='0' order by booking_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND bookings.user_id='$user_id' and bookings.status='0' order by booking_id desc";
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
  
    <td ><?php echo $rows->booking_id;?></td>
    <td ><?php echo $rows->booking_date;?></td>
    <td ><?php echo $rows->customer_name;?></td>
    <td ><?php echo $rows->vehicle_make .' - '.$rows->vehicle_model; ;?></td>
    <td align="center"><?php 
	echo $rows->reg_no;
/* $sqlc="SELECT * FROM bookings where customer_id='$cat' ";
$resultsc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$count=mysql_num_rows($resultsc);
	echo $count; */
	
	?></td>
	<td>
	<?php echo $rows->chasis_no;?>
	
	</td>
    <td><?php echo $rows->engine;?></td>
    <td><i><font size="-2"><?php $staff=$rows->user_id;
$sqlst="SELECT * FROM  users where user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?><i></font></td>
    <td align="center">
	
	<a href="home.php?areareport=areareport&booking_id=<?php echo $rows->booking_id; ?>">Generate Estimate</a>
	</td>
	
   
    </tr>
  <?php 
  
  }
   
  
  }
  
  else 
  
  {
  ?>
  
  <tr height="30" bgcolor="#FFFFCC"><td colspan="9" align="center"><font color="#ff0000"><strong>Sorry!! No Results found</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
</form>

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

   <?php }?>
