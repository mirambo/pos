<?php
include('Connections/fundmaster.php');

 $id=$_GET['incurred_prepaid_expenses_id'];

$sqltemp="select * FROM incurred_prepaid_expenses WHERE incurred_prepaid_expenses_id='$id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);


?>


<form name="gen_order" action="process_edit_incurr_prepaid.php?incurred_prepaid_expenses_id=<?php echo $id;?>&prepaid_expenses_id=<?php echo $rowstemp->prepaid_expenses_id; ?>" method="post">			
<table width="100%" border="0">
    
  
   <tr bgcolor="#FFFFCC">

    
    <td height="40">&nbsp;</td>
 
    <td width="40%">Incurred Amount :<input type="text" name="amount" size="20" value="<?php echo $vendor_prc=$rowstemp->amount_incurred; ?>"></td>
    
    <td>&nbsp;</td>
    
  </tr>
 
  <tr bgcolor="#C0D7E5">

    <td height="40">&nbsp;</td>
<td align="center"><input type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;Save Transaction&nbsp;&nbsp;&nbsp;">&nbsp;<!--<input type="reset" value="Cancel">--></td>
    
    
   
    <td>&nbsp;</td>

   
    

  </tr>
  
 
  
  
  

</table>

</form>
