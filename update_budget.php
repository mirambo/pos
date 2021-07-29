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
	<td align="center" width="150"><strong>Budget ID</strong></td>  
	<td align="center" width="150"><strong>Budget Year</strong></td>  
    <td align="center" width="50"><strong>Date Recorded</strong></td>  
    <td align="center" width="150"><strong>Account</strong></td>  
	    <td align="center" width="150"><strong>Amount</strong></td>  
    <td align="center" width="150"><strong>Rate</strong></td>  
    <td align="center" width="150"><strong>Amount</strong></td>  
    <td align="center" width="150"><strong>Recorded By</strong></td>  
    <td align="center" width="100"><strong>Edit</strong></td>
	<!--<td align="center" width="150"><strong>Delete</strong></td>-->

    
    </tr>
  </thead>
  <?php 
 if (!isset($_POST['generate']))
{ 
$sql="SELECT * FROM budget_code,currency,account_type where budget_code.budget_account=account_type.account_type_id AND 
currency.curr_id=budget_code.currency order by budget_code_id desc";
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
   <td><?php echo $budget_code_id=$rows->budget_code_id;?></td>
      <td><?php echo $rows->budget_year;?></td>

      <td align="center">   <?php

echo $rows->budget_date.' ';
	  
   //echo number_format($amount=$rows->journal_amount,2);
   
   ?></td>
   <td align="">
   <?php 


echo $rows->account_code.' '.$rows->account_type_name;
   
   ?>
   
   </td>
   
   <td>
   
     <?php 
echo $rows->curr_name.' ';

$queryop2="select SUM(budget_amount) AS ttl_amount FROM budget,budget_code where budget.budget_code_id=budget_code.budget_code_id and
budget.budget_code_id='$budget_code_id'";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
echo number_format($amountx=$rows2->ttl_amount,2);


   
   ?> 
   
   </td>

   <td>     <?php 


echo $curr_rate=$rows->curr_rate;
   
   ?> </td>
   
      <td><?php 
 
echo number_format($amountx_tshs=$amountx*$curr_rate,2); 
   
   
   ?></td>
     

      <td align="center">
   <?php 
$recorded_by=$rows->budget_recorded_by;
   

$sqlemp_det2="select * from users where user_id='$recorded_by'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
$rowsemp_det2=mysql_fetch_object($resultsemp_det2);

echo $rowsemp_det2->f_name;
   
   ?>
   
   </td>




   
    
	<td align="center">
	
	
	
	<a  href="home.php?create_budget=create_budget&id=<?php echo $rows->budget_code_id; ?>&sub_module_id=<?php echo $sub_module_id ?>"><img src="images/edit.png"></a>

	
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
