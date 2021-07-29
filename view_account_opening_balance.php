<title>Chart Of Accounts</title>
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
  
    <td align="" width="50"><strong>No</strong></td>  
    <td align="" width="150"><strong>Date Recorded</strong></td>  
    <td align="" width="150"><strong>Account Name</strong></td>  
    <td align="" width="150"><strong>Opening Balance Amount</strong></td>  
    <td align="" width="150"><strong>Comments</strong></td>	
    <td align="" width="100"><strong>Edit</strong></td>
	<!--<td align="" width="150"><strong>Delete</strong></td>-->

    
    </tr>
  </thead>
  <?php 
 if (!isset($_POST['generate']))
{ 
$sql="SELECT * FROM account_opening_balances,account_type WHERE account_type.account_type_id=account_opening_balances.account_id  
order by account_type.account_code asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{

$item_name=$_POST['item_name'];


if ( $item_name!='')
{
$sql="SELECT * FROM items where item_name LIKE '%$item_name%' order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

else
{
$sql="SELECT * FROM items order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
}

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

 
 
 ?>
  <tr>
   <td><?php echo $count=$count+1;?></td>

   <td><?php echo $rows->date_recorded; ?></td>
   <td><?php echo $rows->account_code.' '.$rows->account_type_name; ?></td>
   <td><?php echo number_format($rows->amount,2); ?></td>
   <td><?php echo $rows->comments; ?></td>
   

   
    
	<td align="">
	
	<?php if ($sess_allow_edit==1) 
	{
	?>
	
	<a  href="home.php?opening_balances&id=<?php echo $rows->opening_balance_id; ?>"><?php
	echo $redit;

	?></a>
	
	<?php
		}
	else
	{ 
	echo $med;
	
	}?>
	
	</td>
    <!--<td align="">
	<?php if ($sess_allow_delete==1) 
	{
		
		
	if ($amountx==0)	
	{
	
	?>
	<a href="delete_chart.php?id=<?php echo $rows->account_type_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	<?php
	}
	else
	{
		
		
	}
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
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>

   </div> 
</table>
</form>

 <?php }?>
