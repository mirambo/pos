<?php

if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
if(isset($_GET['subDELETEsettlement']))
  { 
$settlement_id=$_GET['settlement_id'];
 delete_settlement($settlement_id);
  }
  
  include ('top_grid_includes.php'); 
?>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>


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
								  
								  <strong>Search By Date</strong>
						<strong>From : </strong><input type="text" name="date_from" size="30" id="date_from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="date_to" size="25" id="date_to" readonly="readonly" />			  
								  
<input type="submit" name="generate" value="Generate">								  
								  
								  </td>
    
  </tr>
  
  	</table>
	<table width="100%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  
   <td align="center" width="50"><strong>Requisition No</strong></td>
   <td align="center" width="50"><strong>Ref No</strong></td>
   <td align="center" width="50"><strong>Item Name</strong></td>
   <td align="center" width="50"><strong>Amount Posted</strong></td>
    <td align="center" width="150"><strong>Date Posted</strong></td>
    <td align="center" width="150"><strong>Account Debited</strong></td>   
    <td align="center" width="150"><strong>Account Credited</strong></td>   
    <td align="center" width="150"><strong>Posted By</strong></td>    
	<td align="center" width="150"><strong>Edit</strong></td> 
  

    </tr>
</thead>

 <?php 

  if (!isset($_POST['generate']))
{ 

 
$sql="SELECT * FROM account_issued_stock_code,account_issued_stock,items,requisition WHERE requisition.requisition_id=account_issued_stock.requisition_id and
 items.item_id=account_issued_stock.issued_item_id 
AND account_issued_stock.account_stock_code_id=account_issued_stock_code.account_stock_code_id order by 
account_issued_stock.account_stock_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

else
{
	
$client=$_POST['client'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];


$queryop= "SELECT * FROM account_issued_stock_code,account_issued_stock,items,requisition";
    $conditions = array();

	


if($date_from!='' && $date_to!='') 
 {
	
      $conditions[] = "account_issued_stock_code.posted_date>='$date_from' AND account_issued_stock_code.posted_date<='$date_to'";
} 

if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." AND requisition.requisition_id=account_issued_stock.requisition_id and
 items.item_id=account_issued_stock.issued_item_id 
AND account_issued_stock.account_stock_code_id=account_issued_stock_code.account_stock_code_id order by 
account_issued_stock.account_stock_code_id desc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$sql="SELECT * FROM account_issued_stock_code,account_issued_stock,items,requisition WHERE requisition.requisition_id=account_issued_stock.requisition_id and
 items.item_id=account_issued_stock.issued_item_id 
AND account_issued_stock.account_stock_code_id=account_issued_stock_code.account_stock_code_id order by 
account_issued_stock.account_stock_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
 
 }
	
	

    $results = mysql_query($queryop) or die ("Error $queryop.".mysql_error());

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


$id=$rows->account_stock_id;
$account_stock_code_id=$rows->account_stock_code_id;
 

 ?>
  
   
  
    <td><strong><a href="create_requisition.php?order_code=<?php echo $rows->requisition_id; ?>"><strong><?php echo $requisition_id=$rows->requisition_no;?></a></strong></td>
	    <td><?php echo $rows->ref_no;?></td>
			    <td><?php echo $rows->item_name;?></td>
	    <td align="right"><?php echo number_format($rows->amount_debited,2);?></td>
		<td align="center"><?php echo $rows->posted_date;?></td>
		<td align=""><?php 
		
		$account_to_debit=$rows->account_to_debit;
		
		
		
$sqlst23="SELECT * FROM account_type where account_type_id='$account_to_debit'";
$resultst23= mysql_query($sqlst23) or die ("Error $sqlst23.".mysql_error());	
$rowst23=mysql_fetch_object($resultst23);	
echo $rowst23->account_code.' '.$rowst23->account_type_name;
		
		
		
		
		
		
		
		?></td>
		<td align=""><?php $account_to_credit2=$rows->account_to_credit;
		
		
		
		if ($account_to_credit2==0)
		{
			
			
			
			$sqlst23y="SELECT * FROM account_issued_stock_code where account_stock_code_id='$account_stock_code_id'";
$resultst23y= mysql_query($sqlst23y) or die ("Error $sqlst23y.".mysql_error());	
$rowst23y=mysql_fetch_object($resultst23y);	
$account_to_credit=$rowst23y->account_to_credit;
			
		}
		else
		{

	
	$account_to_credit=$account_to_credit2;
			

			
			
		}
		


		
$sqlst234="SELECT * FROM account_type where account_type_id='$account_to_credit'";
$resultst234= mysql_query($sqlst234) or die ("Error $sqlst234.".mysql_error());	
$rowst234=mysql_fetch_object($resultst234);	
echo $rowst234->account_code.' '.$rowst234->account_type_name;		
		
		
		
		
		
		
		?></td>

	

    
    <td align="">
	
	
	
	<i><font size="-2">
	<?php $requested_by=$rows->posted_by;
$sqlst2="SELECT * FROM  users where user_id='$requested_by'";
$resultst2= mysql_query($sqlst2) or die ("Error $sqlst2.".mysql_error());	
$rowst2=mysql_fetch_object($resultst2);	
echo $rowst2->f_name;
	?>
	
	</font></i>
	
</td>
    
    
	


	
	
	

  <td align="center">
 <!--
  
  <a style="font-weight:bold;" href="home.php?post_issue_items_to_accounts&order_code=<?php echo $rows->requisition_id; ?>">Post To Accounts>></a>
  
-->
  </td>

<!--<td></td>-->
	
   
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
 <?php }?>