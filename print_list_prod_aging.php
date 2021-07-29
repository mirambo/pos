<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont); 

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

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
<body onLoad="window.print();">
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person; ?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>Items Expiry Aging Report</H2>
	
	</td>
	
    </tr>
<tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="60"><strong>Serial No.</strong></td>    
    <td align="center" width="100"><strong>Days To Expiry (Days)</strong></td>
	<td align="center" width="250"><strong>Items Expiry</strong></td>


    </tr>
<tr bgcolor="#ff0000" height="25">

    <td align="center"><?php echo $serial_no=$serial_no+1;?></td>
    <td align="center">
	
	
	30 days
	
	
	</td>
    <td align="center" valign="top"><strong>
	
		<table width="100%" border="0">
		<tr  height="30" >
		<td align="center"><strong>Item Name</strong></td>
		<td align="center"><strong>Expiry Date</strong></td>
		<td align="center"><strong>Quantity</strong></td>
		
		</tr>
	<?php
//echo $to_date=date('Y-m-d',strtotime("+30 day"));	
$leo=date('Y-m-d', time());	

$dest_date=date('Y-m-d',strtotime("+30 day", strtotime($leo)));
	
	
	
$sqlrec="SELECT product_id,stock_code_id,batch_number,expiry_date,item_name, DATEDIFF(expiry_date,CURDATE()) AS days_past_due, 
SUM(quantity_rec) as ttl_rec FROM received_stock_batch,items WHERE items.item_id=received_stock_batch.product_id and 
received_stock_batch.sold='0' GROUP BY received_stock_batch.product_id,
received_stock_batch.stock_code_id order by received_stock_batch.expiry_date asc";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());


if (mysql_num_rows($resultsrec) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsrec=mysql_fetch_object($resultsrec))
							  {
								$dpd=$rowsrec->days_past_due; 
								if ($dpd>=0 && $dpd<'30')
{
								 $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr  height="25">';
}
else 
{
echo '<tr  height="25" >';
} 

?>

<td width="50%"><?php echo $rowsrec->item_name;?></td>
<td width="30%" align="center"><?php echo $rowsrec->expiry_date;?></td>
<td align="center" width="20%"><?php echo $rowsrec->ttl_rec;?></td>
</tr>


<?php

}
else
{
	
	
}

								  
								  
							  }
							  
						  }

else
{
?>
							  <tr><td align="center" colspan="3"><font color="#fff">No results found</font></td></tr>
							  <?php
							  
						  }
?>
	

	
	</strong>
	
	
	
	
	</table>
	</td>
	
</tr>

<tr bgcolor="#C0D7E5"  height="25">

    <td align="center"><?php echo $serial_no=$serial_no+1;?></td>
    <td align="center">
	
	
	60 days
	
	
	</td>
    <td align="center">
	<table width="100%" border="0">
		
	<?php
//echo $to_date=date('Y-m-d',strtotime("+30 day"));	
 $leo2=$dest_date;	

$dest_date2=date('Y-m-d',strtotime("+30 day", strtotime($leo2)));
	
		
$sqlrec="SELECT product_id,stock_code_id,batch_number,expiry_date,item_name, DATEDIFF(expiry_date,CURDATE()) AS days_past_due, 
SUM(quantity_rec) as ttl_rec FROM received_stock_batch,items WHERE items.item_id=received_stock_batch.product_id and 
received_stock_batch.sold='0' GROUP BY received_stock_batch.product_id,
received_stock_batch.stock_code_id order by received_stock_batch.expiry_date asc";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());


if (mysql_num_rows($resultsrec) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsrec=mysql_fetch_object($resultsrec))
							  {
								$dpd=$rowsrec->days_past_due; 
								if ($dpd>=30 && $dpd<60)
{
								 $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr  height="25">';
}
else 
{
echo '<tr  height="25" >';
} 

?>

<td width="50%"><?php echo $rowsrec->item_name;?></td>
<td width="30%" align="center"><?php echo $rowsrec->expiry_date;?></td>
<td align="center" width="20%"><?php echo $rowsrec->ttl_rec;?></td>
</tr>


<?php

}
else
{
	
	
}

								  
								  
							  }
							  
						  }

else
{
?>
							  <tr><td align="center" colspan="3"><font color="#fff">No results found</font></td></tr>
							  <?php
							  
						  }
?>
	

	
	</strong>
	
	
	
	
	</table>
</td>
	
</tr>

<tr bgcolor="#0B9F3D" height="25">

    <td align="center"><?php echo $serial_no=$serial_no+1;?></td>
    <td align="center">
	
	
	90 days
	
	
	</td>
    <td align="center">
	
<table width="100%" border="0">
		
	<?php
//echo $to_date=date('Y-m-d',strtotime("+30 day"));	
 $leo3=$dest_date2;	

$dest_date3=date('Y-m-d',strtotime("+30 day", strtotime($leo3)));
	
	
$sqlrec="SELECT product_id,stock_code_id,batch_number,expiry_date,item_name, DATEDIFF(expiry_date,CURDATE()) AS days_past_due, 
SUM(quantity_rec) as ttl_rec FROM received_stock_batch,items WHERE items.item_id=received_stock_batch.product_id and 
received_stock_batch.sold='0' GROUP BY received_stock_batch.product_id,
received_stock_batch.stock_code_id order by received_stock_batch.expiry_date asc";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());


if (mysql_num_rows($resultsrec) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsrec=mysql_fetch_object($resultsrec))
							  {
								$dpd=$rowsrec->days_past_due; 
								if ($dpd>=60 && $dpd<90)
{
								 $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr  height="25">';
}
else 
{
echo '<tr  height="25" >';
} 

?>

<td width="50%"><?php echo $rowsrec->item_name;?></td>
<td width="30%" align="center"><?php echo $rowsrec->expiry_date;?></td>
<td align="center" width="20%"><?php echo $rowsrec->ttl_rec;?></td>
</tr>


<?php

}
else
{
	
	
}

								  
								  
							  }
							  
						  }

else
{
?>
							  <tr><td align="center" colspan="3"><font color="#fff">No results found</font></td></tr>
							  <?php
							  
						  }
?>
	

	
	</strong>
	
	
	
	
	</table>	
	
	
	
	
	
	
	
	
	
	
	</td>
	
</tr>


<tr bgcolor="#ccc" height="25">

    <td align="center"><?php echo $serial_no=$serial_no+1;?></td>
    <td align="center">
	
	
120 days
	
	
	</td>
    <td align="center">
	
<table width="100%" border="0">
		
	<?php
//echo $to_date=date('Y-m-d',strtotime("+30 day"));	
 $leo4=$dest_date3;	

$dest_date4=date('Y-m-d',strtotime("+30 day", strtotime($leo4)));
	
$sqlrec="SELECT product_id,stock_code_id,batch_number,expiry_date,item_name, DATEDIFF(expiry_date,CURDATE()) AS days_past_due, 
SUM(quantity_rec) as ttl_rec FROM received_stock_batch,items WHERE items.item_id=received_stock_batch.product_id and 
received_stock_batch.sold='0' GROUP BY received_stock_batch.product_id,
received_stock_batch.stock_code_id order by received_stock_batch.expiry_date asc";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());


if (mysql_num_rows($resultsrec) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsrec=mysql_fetch_object($resultsrec))
							  {
								$dpd=$rowsrec->days_past_due; 
								if ($dpd>=90 && $dpd<120)
{
								 $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr  height="25">';
}
else 
{
echo '<tr  height="25" >';
} 

?>

<td width="50%"><?php echo $rowsrec->item_name;?></td>
<td width="30%" align="center"><?php echo $rowsrec->expiry_date;?></td>
<td align="center" width="20%"><?php echo $rowsrec->ttl_rec;?></td>
</tr>


<?php

}
else
{
	
	
}

								  
								  
							  }
							  
						  }

else
{
?>
							  <tr><td align="center" colspan="3"><font color="#fff">No results found</font></td></tr>
							  <?php
							  
						  }
?>
	

	
	</strong>
	
	
	
	
	</table>	
	
	
	
	
	
	
	
	
	
	
	</td>
	
</tr>


<tr bgcolor="#FFFF00" height="25">

    <td align="center"><?php echo $serial_no=$serial_no+1;?></td>
    <td align="center">
	
	
150 days
	
	
	</td>
    <td align="center">
	
<table width="100%" border="0">
		
	<?php
//echo $to_date=date('Y-m-d',strtotime("+30 day"));	
/*  $leo5=$dest_date4;	

$dest_date5=date('Y-m-d',strtotime("+30 day", strtotime($leo5))); */
	
	
$sqlrec="SELECT product_id,stock_code_id,batch_number,expiry_date,item_name, DATEDIFF(expiry_date,CURDATE()) AS days_past_due, 
SUM(quantity_rec) as ttl_rec FROM received_stock_batch,items WHERE items.item_id=received_stock_batch.product_id and 
received_stock_batch.sold='0' GROUP BY received_stock_batch.product_id,
received_stock_batch.stock_code_id order by received_stock_batch.expiry_date asc";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());


if (mysql_num_rows($resultsrec) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsrec=mysql_fetch_object($resultsrec))
							  {
								$dpd=$rowsrec->days_past_due; 
								if ($dpd>=120 && $dpd<150)
{
								 $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr  height="25">';
}
else 
{
echo '<tr  height="25" >';
} 

?>

<td width="50%"><?php echo $rowsrec->item_name;?></td>
<td width="30%" align="center"><?php echo $rowsrec->expiry_date;?></td>
<td align="center" width="20%"><?php echo $rowsrec->ttl_rec;?></td>
</tr>


<?php

}
else
{
	
	
}

								  
								  
							  }
							  
						  }

else
{
?>
							  <tr><td align="center" colspan="3"><font color="#fff">No results found</font></td></tr>
							  <?php
							  
						  }
?>
	

	
	</strong>
	
	
	
	
	</table>	
	
	
	
	
	
	
	
	
	
	
	</td>
	
</tr>

<tr bgcolor="#378CC7" height="25">

    <td align="center"><?php echo $serial_no=$serial_no+1;?></td>
    <td align="center">
	
	
Over 180 days
	
	
	</td>
    <td align="center">
	
<table width="100%" border="0">
		
	<?php
//echo $to_date=date('Y-m-d',strtotime("+30 day"));	
/* $leo6=$dest_date5;	

$dest_date6=date('Y-m-d',strtotime("+30 day", strtotime($leo6))); */
	
		
$sqlrec="SELECT product_id,stock_code_id,batch_number,expiry_date,item_name, DATEDIFF(expiry_date,CURDATE()) AS days_past_due, 
SUM(quantity_rec) as ttl_rec FROM received_stock_batch,items WHERE items.item_id=received_stock_batch.product_id and 
received_stock_batch.sold='0' GROUP BY received_stock_batch.product_id,
received_stock_batch.stock_code_id order by received_stock_batch.expiry_date asc";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());


if (mysql_num_rows($resultsrec) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsrec=mysql_fetch_object($resultsrec))
							  {
								$dpd=$rowsrec->days_past_due; 
								if ($dpd>=180)
{
								 $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr  height="25">';
}
else 
{
echo '<tr  height="25" >';
} 

?>

<td width="50%"><?php echo $rowsrec->item_name;?></td>
<td width="30%" align="center"><?php echo $rowsrec->expiry_date;?></td>
<td align="center" width="20%"><?php echo $rowsrec->ttl_rec;?></td>
</tr>


<?php

}
else
{
	
	
}

								  
								  
							  }
							  
						  }

else
{
?>
							  <tr><td align="center" colspan="3"><font color="#fff">No results found</font></td></tr>
							  <?php
							  
						  }
?>
	

	
	</strong>
	
	
	
	
	</table>	
	
	
	
	
	
	
	
	
	
	
	</td>
	
</tr>

<!--<tr bgcolor="#C0D7E5" height="25">

    <td align="center"><?php echo $serial_no=$serial_no+1;?></td>
    <td align="center">
	
	
	Above 90 days
	
	
	</td>
    <td align="center"><strong>
	<?php 
	

	
	?></strong></td>
	
</tr>-->


  <?php 
  
  
  
  
  ?>


</table>

</br>
</br>
</br>
</br>


</body>


