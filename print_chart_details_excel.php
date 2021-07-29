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
/* header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
include ('Connections/fundmaster_excel.php'); */
$id=$_GET['id'];
		
$sqlemp_det="select * from account_type where account_type_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

$date_from=$_GET['date_from']; 
$date_to=$_GET['date_to']; 






?>


<table width="100%" border="1">

<tr bgcolor="">
   
    <td  height="30"  colspan="5" align="center">
	<p><strong><?php echo $rowscont->cont_person;?></strong></p>
		<p>Account Detailed Transactions</p>
		
			<p><strong>For Period From : </strong><?php echo $date_from; ?> <strong>To :</strong><?php echo $date_to; ?></p>
	
	
	</td>
	
    </tr>
	
	<tr>
   
    <td colspan="5" height="30" align="center"><font size="">

<strong>Account Code : </strong><?php echo $debit_account_name=$rowsemp_det->account_code;?>

<strong>Account Name : 	</strong><?php echo $rowsemp_det->account_type_name;?>

</td>
	</tr>
	
	
	</table>
	
	
<table width="100%" border="1">	
	<tr>


  <tr   height="30" >
 <td width="20%"><strong>Date</strong></td>
 <td width="30%"><strong>Transaction</strong></td>
 <td width="15%" align="center"><strong>Debit</strong></td>
 <td width="15%" align="center"><strong>Credit</strong></td>
 <td width="20%" align="center"><strong>Balance</strong></td>
 
 
 
 </tr>
 <?php 
 
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



$curr_rate=$rows->curr_rate;
 
 ?>
 
 
 
<tr>
 
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
 echo number_format($bal=$bal+$rows->amount*$curr_rate,2);
 
 
 $grnd_bal=$grnd_bal+$bal;
 
 
 ?>
 
 </strong>
 </td>
 
 
 </tr>
 
 <?php 
}


 
 ?>

 
 

 </table>

<?php 
//}

?>