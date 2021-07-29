<?php

if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
 $client_id=$_POST['client_id'];
$item_name=$_POST['item_name'];
$item_code=$_POST['item_code'];
 
 
 
if(isset($_GET['subDELETEDitem']))
  { 
$item_id=$_GET['item_id'];
delete_item($item_id,$user_id);
  }
  
 //include('select_search.php');
 
  include ('top_grid_includes.php'); 
?>


 
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>

<?php //include ('row_color.php'); 

$item_name=$_POST['item_name'];
echo $cat_id=$_POST['cat_id'];


?>
 <form name="search" method="post" action="">  
 
 
 
 <table>
<tr height="30" bgcolor="#FFFFCC">
     <td width="23%" colspan="11" align="center">   <strong>Search By Item Category<font color="#FF0000">* </font></strong>
	
		<select name="cat_id">
	<option value="">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from items_category order by cat_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id; ?>"><?php echo $rows1->cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>						  
								  
								  <strong>Or By Item Name</strong>
<input type="text" name="item_name" size="30" id="date_from" />
				  
								  
<input type="submit" name="generate" value="Generate">								  
								  
								  </td>
    
  </tr>
 
 
 </table>
 

<div style="height:auto; width:100%; overflow-y:scroll;">
	<table width="100%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>


  <tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="150"><strong>Item Code</strong></td>  
    <td align="center" width="150"><strong>Item Name</strong></td>  
    <td align="center" width="150"><strong>Item Category</strong></td>	
    <td align="center" width="150"><strong>Date</strong></td>	
    <td align="center" width="50"><strong>Opening Qnty</strong></td>	
    <td align="center" width="50"><strong>Cost</strong></td>
    <td align="center" width="150"><strong>Value</strong></td>
    <td align="center" width="300"><strong>Debit Account</strong></td>
	<td align="center" width="350"><strong>Credit Account</strong></td>
	<td align="center" width="50"><strong>Delete</strong></td>

    
    </tr>
  </thead>
  <?php 
 if (!isset($_POST['generate']))
{ 

$sql="SELECT * FROM items,items_category,items_opening_balances WHERE items_opening_balances.item_id=items.item_id 
and items.cat_id=items_category.cat_id order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{

$queryop= "SELECT * FROM items,items_category,items_opening_balances";
    $conditions = array();

	
if($cat_id!='') 
{
	
      $conditions[] = "items.cat_id='$cat_id'";
} 

if($item_name!='') 
 {
	
      $conditions[] = "items.item_name LIKE '%$item_name%'";
} 

if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." and items_opening_balances.item_id=items.item_id 
and items.cat_id=items_category.cat_id order by item_name asc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$sql="SELECT * FROM items,items_category,items_opening_balances WHERE items_opening_balances.item_id=items.item_id 
and items.cat_id=items_category.cat_id order by item_name asc";
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
echo '<tr bgcolor="#C0D7E5" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
 
 
 ?>
  
   <td><?php echo $rows->item_code;?></td>
   <td><a href="view_stock_card.php?item_id=<?php echo $item_id=$rows->item_id;?>"><?php echo $rows->item_name;?></a>
   
      <input type="hidden" name="item_id[<?php echo $item_id; ?>]" size="10" value="<?php echo $item_id; ?>">
   
   
   </td>
   <td><?php echo $rows->cat_name;?></td>
   <td>
   <?php
echo $op_date2=$rows->opening_bal_date;

if ($op_date2=='0000-00-00')
{
	
$op_date='';	
}
else
{
	
$op_date=$rows->opening_bal_date;	
	
}

   ?>
   
   
   </td>
  

    <td><?php  echo number_format($op=$rows->opening_balance,0);?>	
	
	
	</td>
	
    
    <td align="right"><?php echo number_format($curr_bp=$rows->curr_bp,2);?>
	
	
		
	
	</td>
    <td align="right"><?php echo number_format($value=$curr_bp*$op,2);?>
	
	
			
	
	</td>
    
    
<td align="">
 <?php
 
$account_debited=$rows->account_debited;
$query1="select * from account_type where account_type_id='$account_debited' order by account_type_name asc";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

echo $rows1->account_type_name;
?>
								  
								  
	
	</td>
    <td align="">
	
	 <?php
 
$account_credited=$rows->account_credited;
$query1="select * from account_type where account_type_id='$account_credited' order by account_type_name asc";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

echo $rows1->account_type_name;
?>

	</td>
	<td align="center">
	<a onClick="return confirmDelete()" href="delete_item_opening_balance.php?id=<?php echo $rows->opening_balance_id; ?>&item_id=<?php echo $rows->item_id; ?>"><img src="images/delete.png"></a>
	
	</td>
	
   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>

   </div> 
</table>
</div>


  


 <?php }?>
