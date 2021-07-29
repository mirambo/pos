<?php

/* $qr_confirm23v="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `view`='V' and user_group_id='$user_group_id'";
$qr_res23v=mysql_query($qr_confirm23v) or die ('Error : $qr_confirm23v.' .mysql_error());
$num_rows23v=mysql_num_rows($qr_res23v); 
if ($num_rows23v==0) 
{ 
include ('includes/restricted.php');

}
else
{ */
    
 include ('top_grid_includes.php'); 
 

?>


 
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to deactivate this item?");
}

</script>

<?php //include ('row_color.php'); ?>
 <form name="search" method="post" action="">  

	<table width="99%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>


  <tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="50"><strong>No</strong></td>  
	<td align="center" width="150"><strong>Invoice No</strong></td>  
	<td align="center" width="150"><strong>Ref. No</strong></td>  
    <td align="center" width="50"><strong>Date Posted</strong></td>  
    <td align="center" width="150"><strong>Amount</strong></td>	
    <td align="center" width="150"><strong>Rate</strong></td>	
    <td align="center" width="150"><strong>Amount (Tshs)</strong></td>	
	    <td align="center" width="150"><strong>Account Debited</strong></td>  
    <td align="center" width="150"><strong>Account Credited</strong></td>  
    <td align="center" width="150"><strong>Posted By</strong></td>  
    <td align="center" width="100"><strong>Edit</strong></td>
	<!--<td align="center" width="150"><strong>Delete</strong></td>-->

    
    </tr>
  </thead>
  <?php 
 if (!isset($_POST['generate']))
{ 
$sql="SELECT * FROM account_invoice_code,sales where sales.sales_id=account_invoice_code.invoice_id 
order by account_invoice_code.posted_date desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
	
	
	
}

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
 
 $journal_code_id=$rows->account_invoice_code_id;
 $invoice_id=$rows->invoice_id;
 ?>
  
   <td><?php echo $count=$count+1;?></td>
   <td><?php echo $rows->invoice_no;?></td>
      <td><?php echo $rows->order_no;?></td>
   <td><?php echo $rows->posted_date;
   ?></td>
      <td align="center">   <strong><?php

echo $rows->curr_name.' ';
	  
   echo number_format($amount=$rows->amount_debited,2);
   
   ?></strong></td>
         <td align="center">   <?php

echo $curr_rate=$rows->curr_rate;
	  

   
   ?></td>
            <td align="center">   <?php

echo number_format($amount_tshs=$curr_rate*$amount,2);
	  

   
   ?></td>
   <td align="">
   <?php 
$account_from=$rows->account_to_debit;
   
   $sqlemp_det="select * from account_type where account_type_id='$account_from'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

echo $rowsemp_det->account_code.' '.$rowsemp_det->account_type_name;
   
   ?>
   
   </td>
   

   <td><table>
   <?php 
$sqlemp_det2="select * from account_invoice,account_type where account_invoice.account_to_credit=account_type.account_type_id AND 
account_invoice.account_invoice_code_id='$journal_code_id'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
//$rowsemp_det2=mysql_fetch_object($resultsemp_det);

while ($rowsemp_det2=mysql_fetch_object($resultsemp_det2))
							  {
   
   ?>
   
   <tr>
   <td><?php echo $rowsemp_det2->account_code.' '.$rowsemp_det2->account_type_name;?></td>
   <td align="right"><?php echo number_format($amount_credited=$rowsemp_det2->amount_credited,2);
   
   
   $ttl_amount_credited=$ttl_amount_credited+$amount_credited;
   ?></td>
   </tr>
   
   <?php 
							  }
   
   ?>
   <tr>
   <td><strong>Totals</strong></td>
   <td align="right"><strong><?php echo number_format($ttl_amount_credited,2); ?></strong></td>
   
   </tr>
   </table></td>
     

      <td align="center">
   <?php 
$recorded_by=$rows->posted_by;
   

$sqlemp_det2="select * from users where user_id='$recorded_by'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
$rowsemp_det2=mysql_fetch_object($resultsemp_det2);

echo $rowsemp_det2->f_name;
   
   ?>
   
   </td>




   
    
	<td align="center">
	
	
	
	<a  href="home.php?post_invoices2&id=<?php echo $rows->account_invoice_code_id; ?>&sales_id=<?php echo $invoice_id; ?>&sub_module_id=<?php echo $sub_module_id ?>"><img src="images/edit.png"></a>

	
	</td>
    <!--<td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	
	?>
	<a href="deactivate_item.php?item_id=<?php echo $rows->item_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	<?php
		}
	else
	{ 
	echo $me;
	
	}
	
	?>
	
	</td>-->
	
   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="9" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>

   </div> 
</table>
</form>

 <?php //}
 
 ?>
