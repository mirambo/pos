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
	<td align="center" width="150"><strong>Posting No</strong></td>  
    <td align="center" width="50"><strong>Transaction Date</strong></td>  
    <td align="center" width="150"><strong>Transaction Description</strong></td>	
    <!--<td align="center" width="150"><strong>Journal Amount</strong></td> 
    <td align="center" width="150"><strong>Source Account</strong></td> -->  
	    <td align="center" width="150"><strong>Debit Transaction</strong></td>  
    <td align="center" width="150"><strong>Credit Transactions</strong></td>  
    <td align="center" width="150"><strong>Recorded By</strong></td>  
    <td align="center" width="100"><strong>Edit</strong></td>
	<!--<td align="center" width="150"><strong>Delete</strong></td>-->

    
    </tr>
  </thead>
  <?php 
 if (!isset($_POST['generate']))
{ 
$sql="SELECT * FROM journal_code,currency where currency.curr_id=journal_code.currency order by journal_code_id desc";
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
 
 
 ?>
  
   <td><?php echo $count=$count+1;?></td>
   <td><?php echo $journal_code_id=$rows->journal_code_id;?></td>
      <td><?php echo $rows->journal_date;?></td>
   <td><?php echo $rows->transaction_description;
   ?></td>
      <!--<td align="center">   <?php

echo $rows->curr_name.' ';
	  
   echo number_format($amount=$rows->journal_amount,2);
   
   ?></td>
   <td align="">
   <?php 
$account_from=$rows->account_from;
   
   $sqlemp_det="select * from account_type where account_type_id='$account_from'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

echo $rowsemp_det->account_code.' '.$rowsemp_det->account_type_name;
   
   ?>
   
   </td>-->
   
   <td>
   <table>
   <?php 
   $ttl_debit=0;
$sqlemp_det2="select * from journal_transaction,account_type where journal_transaction.debit_account_id=account_type.account_type_id AND 
journal_transaction.journal_code_id='$journal_code_id' AND debit_account_id!='0'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
//$rowsemp_det2=mysql_fetch_object($resultsemp_det);

while ($rowsemp_det2=mysql_fetch_object($resultsemp_det2))
							  {
   
   ?>
   
   <tr>
   <td><?php echo $rowsemp_det2->account_code.' '.$rowsemp_det2->account_type_name;?></td>
   <td align="right"><?php echo number_format($journal_debit_amount=$rowsemp_det2->journal_debit_amount,2);
   
   $ttl_debit=$ttl_debit+$journal_debit_amount;
   
   ?></td>
   </tr>
   
   <?php 
							  }
   
   ?>
   
   <tr>
   <td><strong>Totals</strong></td>
   <td><strong><?php echo number_format($ttl_debit,2); ?></strong></td>
   </tr>
   </table>
   
   
   </td>
   <td><table>
   <?php 
   $ttl_credit=0;
$sqlemp_det2="select * from journal_transaction,account_type where journal_transaction.credit_account_id=account_type.account_type_id AND 
journal_transaction.journal_code_id='$journal_code_id' AND credit_account_id!='0'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
//$rowsemp_det2=mysql_fetch_object($resultsemp_det);

while ($rowsemp_det2=mysql_fetch_object($resultsemp_det2))
							  {
   
   ?>
   
   <tr>
   <td><?php echo $rowsemp_det2->account_code.' '.$rowsemp_det2->account_type_name;?></td>
   <td><?php echo number_format($journal_credit_amount=$rowsemp_det2->journal_credit_amount,2);
   
   
   $ttl_credit=$ttl_credit+$journal_credit_amount;
   ?></td>
   </tr>
   
   <?php 
							  }
   
   ?>
   
      <tr>
   <td><strong>Totals</strong></td>
   <td><strong><?php echo number_format($ttl_credit,2); ?></strong></td>
   </tr>
   
   </table></td>
     

      <td align="center">
   <?php 
$recorded_by=$rows->journal_recorded_by;
   

$sqlemp_det2="select * from users where user_id='$recorded_by'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
$rowsemp_det2=mysql_fetch_object($resultsemp_det2);

echo $rowsemp_det2->f_name;
   
   ?>
   
   </td>




   
    
	<td align="center">
	
	
	
	<a  href="home.php?general_journal=general_journal&id=<?php echo $rows->journal_code_id; ?>&sub_module_id=<?php echo $sub_module_id ?>"><img src="images/edit.png"></a>

	
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
