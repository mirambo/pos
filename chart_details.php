<?php 
/* $qr_confirm23v="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `add`='A' and user_group_id='$user_group_id'";
$qr_res23v=mysql_query($qr_confirm23v) or die ('Error : $qr_confirm23v.' .mysql_error());
$num_rows23v=mysql_num_rows($qr_res23v); 
if ($num_rows23v==0) 
{ 
include ('includes/restricted.php');

}
else
{ */
	
$id=$_GET['account_type_id'];
	
	
$sqlemp_det="select * from account_type where account_type_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

//include ('top_grid_includes.php');

$date_from=$_POST['date_from']; 
$date_to=$_POST['date_to']; 

$get_date_from=$_GET['date_from']; 
$get_date_to=$_GET['date_to'];

$op_bal=mysql_real_escape_string($_POST['op_bal']);

?>

<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
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


p {


}
</style>

<form name="search" method="post" action="">  
  


<table width="60%" border="0" align="center" style="margin:auto;" class="table">

	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="">


<span style="float:rig;"><a target="_blank" href="print_chart_details.php?date_from=<?php echo $date_from; ?>&id=<?php echo $id; ?>&date_to=<?php echo $date_to; ?>&op_bal=<?php echo $op_bal; ?>"><img src="images/print_icon.gif"></a></span>
<span style="float:rig;" style="margin-right:x;"><a href="print_chart_details_excel.php?date_from=<?php echo $date_from; ?>&id=<?php echo $id; ?>&date_to=<?php echo $date_to; ?>"><img src="images/excel.png"></a></span>
	</td>
	</tr>


	
	
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align=""><font size="">

	
<strong>Account Code : </strong><?php echo $debit_account_name=$rowsemp_det->account_code;?>

<strong>Account Name : 	</strong><?php echo $rowsemp_det->account_type_name;?>


<font size="">
	<?php 
	
	
if (isset($_POST['generate']))	
{
	
	if ($date_from!='' && $date_to!='')
	{ 
?>

<strong>for the period between : <font color="#ff0000"><?php echo $date_from; ?></font> and <font color="#ff0000"><?php echo $date_to; ?></font></strong>
<?php
		
		
	}
	elseif ($date_from=='' && $date_to!='')
	{
		
?>

<strong>for the period ending : <font color="#ff0000"><?php echo $date_to; ?></font></strong>
<?php
		
		
	}
	
		elseif ($date_from!='' && $date_to=='')
	{
	?>

<strong>for the period ending : <font color="#ff0000"><?php echo $date_from; ?></font></strong>
<?php	
		
	}
	else
	{
		?>
<strong>for the period ending : <font color="#ff0000"><?php echo date('Y-m-d'); ?></font></strong>
<?php		
		
	}
}	
	
	
	


else
{
	
	
	
	
	if ($get_date_from!='' && $get_date_to!='')
	{ 
?>

<strong>for the period between : <font color="#ff0000"><?php echo $get_date_from; ?></font> and <font color="#ff0000"><?php echo $get_date_to; ?></font></strong>
<?php
		
		
	}
	elseif ($get_date_from=='' && $get_date_to!='')
	{
		
?>

<strong>for the period ending : <font color="#ff0000"><?php echo $get_date_to; ?></font></strong>
<?php
		
		
	}
	
		elseif ($get_date_from!='' && $get_date_to=='')
	{
	?>

<strong>for the period ending : <font color="#ff0000"><?php echo $get_date_from; ?></font></strong>
<?php	
		
	}
	else
	{
		?>
<strong>for the period ending : <font color="#ff0000"><?php echo date('Y-m-d'); ?></font></strong>
<?php		
		
	}
}	
	?>

	

</font>

</td>
	</tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="20" id="date_from" value="<?php echo $date_from; ?>" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="20" id="date_to" value="<?php echo $date_to; ?>" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
		<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Include Opening Balance
    </strong>
	
	
	<?php 
	
	if (isset($_POST['generate']))	
{
	
	if ($op_bal=='')
	{
		?>
		
   <input type="checkbox" name="op_bal" size="20" value="1" />			
		<?php
		
	}
	
	else
	{
		?>

   <input type="checkbox" checked name="op_bal" size="20" value="1" />		
		
		<?php
		
		
	}
	
	
}
else
{
	
	?>

   <input type="checkbox" checked name="op_bal" size="20" value="1" />		
		
		<?php
	
	
	
}
	
	
	
	?>
    
 
</td>
	
    </tr>
	
			<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">

	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	
	</table>
	
	
	<table width="60%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>
	<tr>
 

  <tr  style="background:url(images/description.gif);" height="30" >
 <td width="20%"><strong>Date</strong></td>
 <td width="30%"><strong>Transaction</strong></td>
 <td width="15%" align="center"><strong>Debit</strong></td>
 <td width="15%" align="center"><strong>Credit</strong></td>
 <td width="20%" align="center"><strong>Balance</strong></td>
 
 
 
 </tr>
 
 </thead>
 
 <?php 
 
 if (isset($_POST['generate']))	
{
	
	
	if ($op_bal=='')
	{
		
		
	}
	else
	{
	
 ?>
 
 <tr bgcolor="#FFFFCC" height="25">
 <td><?php 
 
 
 echo $bf_date=date( "Y-m-d", strtotime( $date_from . "-1 day"));
 
 
 
 ?></td>
 <td><strong>Balance b/f</strong></td>
 <td align="right"><?php $querybf_dr="select SUM(debit) as bf_debit FROM chart_transactions where account_type_id='$id' and transaction_date<='$bf_date'";
$resultsbf_dr= mysql_query($querybf_dr) or die ("Error $querybf_dr.".mysql_error()); 
$rowsbf_dr=mysql_fetch_object($resultsbf_dr);

echo number_format($ttl_bf_dr=$rowsbf_dr->bf_debit,2); ?>

</td>
 <td align="right">
 
 <?php $querybf_cr="select SUM(credit) as bf_credit FROM chart_transactions where account_type_id='$id' and transaction_date<='$bf_date'";
$resultsbf_cr= mysql_query($querybf_cr) or die ("Error $querybf_cr.".mysql_error()); 
$rowsbf_cr=mysql_fetch_object($resultsbf_cr);

echo number_format($ttl_bf_cr=$rowsbf_cr->bf_credit,2); 


?>

 </td>
 <td align="right"><strong>
 <?php 
 
$querybf="select SUM(amount) as bf FROM chart_transactions where account_type_id='$id' and transaction_date<='$bf_date'";
$resultsbf= mysql_query($querybf) or die ("Error $querybf.".mysql_error()); 
$rowsbf=mysql_fetch_object($resultsbf);

echo number_format($ttl_bf=$rowsbf->bf,2);
 
 
 ?>
 </strong>
 </td>
 
 
 </tr>
 <?php 
 
	}
}
else
{
	
	
}
 
 
 
 if (!isset($_POST['generate']))
 {
	 
	 if ($get_date_from!='' && $get_date_to!='')
	 {
		 
$queryop="select * FROM chart_transactions where account_type_id='$id' and transaction_date>='$get_date_from' and transaction_date<='$get_date_to'
order by transaction_date asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error()); 
		 
	 }
	 elseif ($get_date_from=='' && $get_date_to!='')
	 {
$queryop="select * FROM chart_transactions where account_type_id='$id' and transaction_date<='$get_date_to'
order by transaction_date asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error()); 
		 
		 
		 
	 }
	 
	 	 elseif ($get_date_from!='' && $get_date_to=='')
	 {

$queryop="select * FROM chart_transactions where account_type_id='$id' and transaction_date<='$get_date_from'
order by transaction_date asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error()); 		 
		 
		 
	 }
	 else
	 {


$queryop="select * FROM chart_transactions where account_type_id='$id' order by transaction_date asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
}
 }
 else
 {

	
	if ($date_from!='' && $date_to!='')
	 {
		 
$queryop="select * FROM chart_transactions where account_type_id='$id' and transaction_date>='$date_from' and transaction_date<='$date_to'
order by transaction_date asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error()); 
		 
	 }
	 elseif ($date_from=='' && $date_to!='')
	 {
$queryop="select * FROM chart_transactions where account_type_id='$id' and transaction_date<='$date_to'
order by transaction_date asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error()); 
		 
		 
		 
	 }
	 
	 	 elseif ($date_from!='' && $date_to=='')
	 {

$queryop="select * FROM chart_transactions where account_type_id='$id' and transaction_date<='$date_from'
order by transaction_date asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error()); 		 
		 
		 
	 }
	 else
	 {


$queryop="select * FROM chart_transactions where account_type_id='$id' order by transaction_date asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
}
	 
	 
	 
 }

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


$curr_rate=$rows->curr_rate;
 
 ?>
 
 
 

 
 <td width=""><?php echo $rows->transaction_date; ?></td>
  <td><?php echo $rows->memo; 
  
   $bal_type=$rows->balance_type;
  
  
  ?></td>
  
  
  
  
  
  
 <td width="" align="right"><?php 



echo number_format($dr_amount=$rows->debit*$curr_rate,2);
 $ttl_dr=$ttl_dr+$dr_amount;
 

 
 ?></td>

 <td width="" align="right"><?php 


echo number_format($cr_amount=$rows->credit*$curr_rate,2);
 $ttl_cr=$ttl_cr+$cr_amount;
 

 ?></td>
 
 <td align="right"><strong>
 <?php 
 echo number_format($bal=$bal+$rows->amount*$curr_rate+$ttl_bf,2);
 
 
 $grnd_bal=$grnd_bal+$bal;
 
 
 ?>
 
 </strong>
 </td>
 
 
 </tr>
 
 <?php 
}


 
 ?>

 <tr height="30" bgcolor="#ccc">
 <td><strong>Totals</strong></td>
 <td></td>


 <td align="right"><strong><?php echo  number_format($ttl_dr,2);?></strong></td>
 <td align="right"><strong><?php echo  number_format($ttl_cr,2);?></strong></td>
 <td align="right"><strong><?php echo  number_format($bal,2);?></strong></td>
 
 
 </tr>

 </table>

  




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


<?php 
//}

?>