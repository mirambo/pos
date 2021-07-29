<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?>
<?php
if(isset($_GET['subDELETEsettlement']))
  { 
$settlement_id=$_GET['settlement_id'];
 delete_settlement($settlement_id);
  }
  
  
  
/* $date1 = strtotime('2013-07-03');
$date2 = DATE('Y-mm-dd');
$subTime = $date1 - $date2;
$y = ($subTime/(60*60*24*365));
$d = ($subTime/(60*60*24))%365;
$h = ($subTime/(60*60))%24;
$m = ($subTime/60)%60;

echo "Difference between ".date('Y-m-d H:i:s',$date1)." and ".date('Y-m-d H:i:s',$date2)." is:\n";
//echo $y." years\n";
echo $d." days\n";
//echo $h." hours\n";
//echo $m." minutes\n"; */
  
?>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

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
   

    <td width="23%" colspan="11" align="center">   
<strong>Filter By Customer<font color="#FF0000">* </font></strong>
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
								  
	<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />							  
								  		  
								  
<input type="submit" name="generate" value="Generate">	
								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="150"><strong>Invoice No</strong></td>
    <td align="center" width="150"><strong>Job Card No</strong></td>
    <td align="center" width="150"><strong>Date Generated</strong></td>
    <td align="center" width="150"><strong>Invoice Value (SSP)</strong></td>
    <td align="center" width="150"><strong>Customer Name</strong></td>  
    <td align="center" width="150"><strong>Date Canceled</strong></td> 
    <td align="center" width="150"><strong>Cancelled By </strong></td> 
		<td align="center" width="150"><strong>Reason</strong></td>
	<td align="center" width="150"><strong>View Details</strong></td>  
	<!--<td align="center" width="100"><strong>Terminate</strong></td>
	<td align="center" width="100"><strong>Cancel</strong></td>-->
    </tr>


 <?php 
 

 
  if (!isset($_POST['generate']))
{ 

 
$sql="SELECT * FROM job_cards,cancelled_invoices where job_cards.job_card_id=cancelled_invoices.invoice_id and cancelled_invoices.status='3' 
order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$location_id=$_POST['location_id'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];
if ($location_id!=0 && $date_from=='' && $date_to=='')
{
$sql="SELECT * FROM invoice, cancelled_invoices where invoice.invoice_id=cancelled_invoices.invoice_id and cancelled_invoices.status='3' 
and invoice.customer_id='$location_id' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($location_id==0 && $date_from!='' && $date_to!='')
{
$sql="SELECT * FROM invoice, cancelled_invoices where invoice.invoice_id=cancelled_invoices.invoice_id and cancelled_invoices.status='3'  and invoice.date_generated >='$date_from' AND date_generated<='$date_to' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($location_id!=0 && $date_from!='' && $date_to!='')
{
$sql="SELECT * FROM invoice, cancelled_invoices where invoice.invoice_id=cancelled_invoices.invoice_id and cancelled_invoices.status='3'  and invoice.date_generated BETWEEN '$date_from' AND '$date_to' order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT * FROM invoice, cancelled_invoices where invoice.invoice_id= cancelled_invoices.invoice_id and cancelled_invoices.status='3'  order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

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
  
   
    <td><?php echo $invoice_id=$rows->invoice_id;?></td>
    <td><?php echo $job_card_id=$rows->job_card_id;?></td>
    <td><?php echo $rows->date_generated;?></td>
   <td>
	<?php 
	include ('invoice_value.php');
	?>
	
	
	</td>

    <td>
	
	<?php $customer_id=$rows->customer_id;
	
$sqllpdet="SELECT * from customer where customer_id='$customer_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
	
	
	echo $rowslpdet->customer_name;?>
	
	
	</td>
    <td align="center"><?php 
	
	//include ('invoice_value.php');

	echo $rows->date_cancelled;
	
	

	
	?></td>
   
	<td><i><font size="-2">
	<?php $staff=$rows->canceling_user;
$sqlst="SELECT * FROM  users where user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i></td>
	<td><i><font size="-2">
	<?php 
echo $rows->reasons;
	?>
	
	</font></i></td>
    <td align="center"><a href="home.php?viewcountries=viewcountries&job_card_id=<?php echo $job_card_id;?>">View Invoice Details</a></td>
<!--<td align="center"></td>
<td></td>-->
	
   
    </tr>

  <?php 
  
  }
  
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
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "to"       // ID of the button
    }
  );
  
  
  
  </script> 
   <?php }?>