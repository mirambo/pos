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
     <td width="23%" colspan="11" align="center">   <strong>Search By Employee<font color="#FF0000">* </font></strong>
	
		<select name="client">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from users order by f_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>						  
								  
								  <strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="date_from" size="30" id="date_from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="date_to" size="25" id="date_to" readonly="readonly" />			  
								  
<input type="submit" name="generate" value="Generate">								  
								  
								  </td>
    
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  
   <td align="center" width="50"><strong>Requisition No</strong></td>
   <td align="center" width="50"><strong>Ref No</strong></td>
    <td align="center" width="150"><strong>Date Generated</strong></td>
    <td align="center" width="150"><strong>Requisition Value</strong></td>   
    <td align="center" width="150"><strong>Requested By</strong></td>    
		<td align="center" width="150"><strong>Generated By</strong></td> 
    <td align="center" width="150"><strong>Issue Items</strong></td>    

    </tr>


 <?php 

  if (!isset($_POST['generate']))
{ 

 
$sql="SELECT * FROM requisition order by requisition_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

else
{
	
$client=$_POST['client'];
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];


$queryop= "SELECT * FROM requisition";
    $conditions = array();

	
if($client!=0) 
{
	
      $conditions[] = "requisition.requested_by='$client'";
} 

if($date_from!='' && $date_to!='') 
 {
	
      $conditions[] = "requisition.date_generated>='$date_from' AND requisition.date_generated<='$date_to'";
} 

if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." order by requisition_id asc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$sql="SELECT * FROM requisition order by date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
 
 }
	
	

    $results = mysql_query($queryop) or die ("Error $queryop.".mysql_error());

}




if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
$order_code=$rows->requisition_id;					  
						  
$sqlredx="SELECT SUM(item_quantity) AS item_req from requisition,requisition_item,items where requisition.requisition_id=requisition_item.requisition_id 
AND requisition_item.item_id=items.item_id and requisition_item.requisition_id='$order_code'";
$resultsredx= mysql_query($sqlredx) or die ("Error $sqlredx.".mysql_error());
$rowsredx=mysql_fetch_object($resultsredx);


$qnty_ordered=$rowsredx->item_req;

//echo ' - ';
$sqlord1i="select SUM(quantity_issued) as ttl_quant_rec FROM requisition_item,issued_items,items where 
requisition_item.requisition_item_id=issued_items.requisition_item_id AND issued_items.item_id=items.item_id AND 
issued_items.requisition_id='$order_code'";
$resultsord1i= mysql_query($sqlord1i) or die ("Error $sqlord1i.".mysql_error());
$rowsord1i=mysql_fetch_object($resultsord1i);

$quant_issued=$rowsord1i->ttl_quant_rec;

//echo ' - ';
$sqlord1p="select SUM(quantity_issued) as ttl_quant_post from account_issued_stock,items where 
account_issued_stock.issued_item_id=items.item_id AND 
account_issued_stock.requisition_id='$order_code'";
$resultsord1p= mysql_query($sqlord1p) or die ("Error $sqlord1.".mysql_error());
$rowsord1p=mysql_fetch_object($resultsord1p);


$qnty_post=$rowsord1p->ttl_quant_post;	


	  
if ($qnty_ordered==$quant_issued && $qnty_post==$quant_issued)
  {
	  
 
	  
	  
	  
  }
  else
  { 	 


if ($qnty_ordered==$quant_issued)
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
  
   
  
    <td><strong><a href="create_requisition.php?order_code=<?php echo $rows->requisition_id; ?>"><strong><?php echo $requisition_id=$rows->requisition_no;?></a></strong></td>
	    <td><?php echo $rows->ref_no;?></td>
	    <td><?php echo $rows->date_generated;?></td>
	 <td><?php include ('requisition_value.php'); ?></td>

    
    <td align="">
	
	
	
	<i><font size="-2">
	<?php $requested_by=$rows->requested_by;
$sqlst2="SELECT * FROM  users where user_id='$requested_by'";
$resultst2= mysql_query($sqlst2) or die ("Error $sqlst2.".mysql_error());	
$rowst2=mysql_fetch_object($resultst2);	
echo $rowst2->f_name;
	?>
	
	</font></i>
	
</td>
    
    
	


	
	
	
	
	<td>
	<i><font size="-2">
	<?php $staff=$rows->user_id;
$sqlst="SELECT * FROM  users where user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i>
	
	</td>
  <td align="center">
 
  
  <a style="font-weight:bold;" href="home.php?post_issue_items_to_accounts&order_code=<?php echo $rows->requisition_id; ?>">Post To Accounts>></a>
  

  </td>

<!--<td></td>-->
	
   
    </tr>

  <?php 
  	
}
 else
{
  
  } 
							 }
							  
							  
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