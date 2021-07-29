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
include ('Connections/fundmaster_pr.php');
$id=$_GET['id'];
		
$sqlemp_det="select * from account_type where account_type_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

$date_from=$_GET['date_from']; 
$date_to=$_GET['date_to']; 
$op_bal=$_GET['op_bal']; 






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
<body onLoad="window.print();">
<form name="search" method="post" action="">  
  
</br>

<table width="700" border="0" align="center" style="margin:auto;">

<tr bgcolor="#FFFFff">
   
    <td  height="30"  colspan="9" align="center">
	<p align="center"><strong><?php echo $rowscont->cont_person;?></strong></br>
		<span style="font-size:9px;">Account Detailed Transactions</span>
		
		<span style="font-size:9px;"><strong>For Period From : </strong><?php echo $date_from; ?> <strong>To :</strong><?php echo $date_to; ?></span></p>
	
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFFF">
   
    <td colspan="9" align="center"><font size="">

<strong><span style="font-size:9px;">Account Code : </strong></span><span style="font-size:9px;"><?php echo $debit_account_name=$rowsemp_det->account_code;?></span>

<strong><span style="font-size:9px;">Account Name : 	</strong><span style="font-size:9px;"><?php echo $rowsemp_det->account_type_name;?>

</span></td>
	</tr>
	
	
	</table>
	
	
<table width="700" border="0" align="center" style="margin:auto;" class="table" bgcolor="#fff">	
	<tr>


  <tr   height="10" >
<td width="12%"><strong><span style="font-size:9px; text-decoration:none;">Date</strong></span></td>
 <td width="58%"><strong><span style="font-size:9px;"><span style="font-size:9px;">Transaction</span></strong></td>
 <td width="10%" align="center"><strong><span style="font-size:9px;">Debit</span></strong></td>
 <td width="10%" align="center"><strong><span style="font-size:9px;">Credit</span></strong></td>
 <td width="10%" align="center"><strong><span style="font-size:9px;">Balance</span></strong></td>
 
 
 
 </tr>
 
 <?php 
  if ($date_from!='' && $date_to!='')
 {
	 
	 	if ($op_bal=='')
	{
		
		
	}
	else
	{
 
 
 ?>
 
 <tr bgcolor="#FFFFCC" height="10">
 <td><span style="font-size:9px;"><?php 
 
 
 echo $bf_date=date( "Y-m-d", strtotime( $date_from . "-1 day"));
 
 
 
 ?></span></td>
 <td><strong><span style="font-size:9px;">Balance b/f</span></strong></td>
 <td align="right"><span style="font-size:9px;"><?php $querybf_dr="select SUM(debit) as bf_debit FROM chart_transactions where account_type_id='$id' and transaction_date<='$bf_date'";
$resultsbf_dr= mysql_query($querybf_dr) or die ("Error $querybf_dr.".mysql_error()); 
$rowsbf_dr=mysql_fetch_object($resultsbf_dr);

echo number_format($ttl_bf_dr=$rowsbf_dr->bf_debit,2); ?>

</span></td>
 <td align="right"><span style="font-size:9px;">
 
 <?php $querybf_cr="select SUM(credit) as bf_credit FROM chart_transactions where account_type_id='$id' and transaction_date<='$bf_date'";
$resultsbf_cr= mysql_query($querybf_cr) or die ("Error $querybf_cr.".mysql_error()); 
$rowsbf_cr=mysql_fetch_object($resultsbf_cr);

echo number_format($ttl_bf_cr=$rowsbf_cr->bf_credit,2); 


?>

</span> </td>
 <td align="right"><span style="font-size:9px;"><strong>
 <?php 
 
$querybf="select SUM(amount) as bf FROM chart_transactions where account_type_id='$id' and transaction_date<='$bf_date'";
$resultsbf= mysql_query($querybf) or die ("Error $querybf.".mysql_error()); 
$rowsbf=mysql_fetch_object($resultsbf);

echo number_format($ttl_bf=$rowsbf->bf,2);
 
 
 ?>
 </span></strong>
 </td>
 
 
 </tr>
 <?php 
	}
 }
 else
 {}
 
 //cost of sales income
 if ($date_from!='' && $date_to!='')
 {

$queryop="select * FROM chart_transactions where account_type_id='$id' and transaction_date>='$date_from' and transaction_date<='$date_to'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error()); 
	 
 }
 else
 {
	$queryop="select * FROM chart_transactions where account_type_id='$id'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error()); 
	 
 }


while ($rows=mysql_fetch_object($results))
{
	

	
	$RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="15">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="15" >';
}


$curr_rate=$rows->curr_rate;
 
 ?>
 
 
 

 
 <td width=""><span style="font-size:9px;"><?php echo $rows->transaction_date; ?></span></td>
  <td><span style="font-size:9px;"><?php echo $rows->memo; 
  
   $bal_type=$rows->balance_type;
  
  
  ?></span></td>
  
  
  
  
  
  
 <td width="" align="right"><span style="font-size:9px;"><?php 



echo number_format($dr_amount=$rows->debit*$curr_rate,2);
 $ttl_dr=$ttl_dr+$dr_amount;
 

 
 ?></span></td>

 <td width="" align="right"><span style="font-size:9px;"><?php 


echo number_format($cr_amount=$rows->credit*$curr_rate,2);
 $ttl_cr=$ttl_cr+$cr_amount;
 

 ?></span></td>
 
 <td align="right"><span style="font-size:9px;"><strong>
 <?php 
 echo number_format($bal=$bal+$rows->amount*$curr_rate+$ttl_bf,2);
 
 
 $grnd_bal=$grnd_bal+$bal;
 
 
 ?>
 
 </strong></span>
 </td>
 
 
 </tr>
 
 <?php 
}


 
 ?>
 <tr height="10" bgcolor="#ccc">
 <td><strong><span style="font-size:9px;">Totals</span></strong></td>
 <td></td>


 <td align="right"><strong><span style="font-size:9px;"><?php echo  number_format($ttl_dr,2);?></span></strong></td>
 <td align="right"><strong><span style="font-size:9px;"><?php echo  number_format($ttl_cr,2);?></span></strong></td>
 <td align="right"><strong><span style="font-size:9px;"><?php echo  number_format($bal,2);?></span></strong></td>
 
 
 </tr>
 
 

 </table>







<?php 
//}

?>