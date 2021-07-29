<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?>
<?php
if(isset($_GET['subDELETECountry']))
  { 
$country_id=$_GET['country_id'];
delete_country($country_id);
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

<SCRIPT language="javascript">
function reload(form)
{
var val=form.cat_id.options[form.cat_id.options.selectedIndex].value;
self.location='home.php?viewcountries=viewcountries&cat=' + val ;

}

</script>
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
	<strong>Select Client 
    </strong>
    <select name="cat_id" onChange="reload(this.form)">
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
    
    
	
	<!--<input type="submit" name="generate" value="Search">-->
	<a href="home.php?perdm=perdm"><img src="images/newcar.png" style="margin-top:5px; margin-left:20px;"></a>
	</td>
	
    </tr>

<?php
if (!$cat)
{

 ?>
	
<tr bgcolor="#FFFFCC"><td colspan="6" height="40"></td></tr>

<?php 
}
else
{

?>


	<tr bgcolor="#FFFFCC"><td colspan="6" height="25" align="center"><strong><font size="+0">List Of Vehicles Ever Booked By Client:<font color="#ff0000">
	<?php 
	$query1c="select * from customer where customer_id='$cat'";
    $results1c=mysql_query($query1c) or die ("Error: $query1c.".mysql_error());
	$rows1c=mysql_fetch_object($results1c);
	echo $rows1c->customer_name;
	?>
</font>	<strong>
	</td></tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Vehicle Make</strong></td>
    <td align="center" width="150"><strong>Vehicle Model</strong></td>
    <td align="center" width="150"><strong>Reg. No.</strong></td>
		<td align="center" width="100"><strong>Times Booked</strong></td>
    <td align="center" width="150"><strong>Date Last Booked</strong></td>
	<td align="center" width="100"><strong>Rebook</strong></td>

    
    </tr>
	 <?php 
  
  
$sql="SELECT * FROM bookings where customer_id='$cat' group by reg_no order by booking_date asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
  
    <td ><?php echo $rows->vehicle_make;?></td>
    <td ><?php echo $rows->vehicle_model;?></td>
    <td ><?php echo $reg_no=$rows->reg_no;?></td>
    <td align="center"><?php 
$sqlc="SELECT * FROM bookings where customer_id='$cat' and reg_no='$reg_no'";
$resultsc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$count=mysql_num_rows($resultsc);
	echo $count;
	
	?></td>
	<td align="center">
	<?php echo $rows->booking_date;?>
	
	</td>
    <td align="center">
	<a href="home.php?perdm=perdm&customer_id=<?php echo $cat;?>&booking_id=<?php echo $rows->booking_id; ?>">Rebook This Vehicle</a>
	</td>
	
   
    </tr>
  <?php 
  
  }
  
  ?>
 <tr bgcolor="#FFFFCC"><td colspan="6" height="25" align="right"><a href="home.php?perdm=perdm&customer_id=<?php echo $cat;?>"><img src="images/newvehicle.png" style="margin-top:5px; margin-right:20px;"></a></td></tr> 
  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Vehicle for this client has been booked. <a href="home.php?perdm=perdm&customer_id=<?php echo $cat;?>"><img src="images/newbooking.png" style="margin-top:5px; margin-right:20px;"></a></strong></font></td></tr>
  
  <?php 
  
  
  }
  
  }
  ?>
</table>
</form>
   <?php }?>

