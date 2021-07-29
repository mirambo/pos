<?php 

include('Connections/fundmaster.php'); 

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
	<?php require_once('includes/customsubmenu.php');  ?>
		
		<h3>:: List of All Custom Clearance Tax and Freight</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="450"><strong>Custom Clearance Description</strong></td>
    <td align="center" width="200"><strong>Amount (Mixed Currency)</strong></td>
	<td align="center" width="150"><strong>Exchange Rate (To Kshs.)</strong></td>
	<td align="center" width="160"><strong>Amount (Kshs.)</strong></td>
    <td align="center" width="150"><strong>Mode of payment</strong></td>
	<td align="center" width="150"><strong>Date recorded</strong></td>
	<td align="center" width="50"><strong>Edit</strong></td>
    <td align="center" width="50"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  $ttlkshs=0;
$sql="SELECT custom_clearance.custom_clearance_id,custom_clearance.description,custom_clearance.curr_id,custom_clearance.amount,custom_clearance.mop,custom_clearance.date_of_transaction,custom_clearance.curr_rate,currency.curr_name 
FROM custom_clearance,currency where currency.curr_id=custom_clearance.curr_id order by custom_clearance.custom_clearance_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


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
 
 
 ?>
   
    <td><?php echo $rows->description;?></td>
    <td align="right"><?php echo $rows->curr_name.' '.number_format($amount=$rows->amount,2);?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);
	
	
	?></td>
	<td align="right"><?php 
	echo number_format($kshs=$curr_rate*$amount,2);
	
	?></td>
	<td align="center"><?php echo $rows->mop;?></td>
	<td align="center"><?php echo $rows->date_of_transaction;?></td>
	<td align="center"><a href="edit_custom_clearance.php?custom_clearance_id=<?php echo $rows->custom_clearance_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_custom_clearance.php?custom_clearance_id=<?php echo $rows->custom_clearance_id;?>&custom_clearance_desc=<?php echo $rows->description;?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  $ttlkshs=$ttlkshs+$kshs;
  
  }
  ?>
  <tr  height="30" bgcolor="#FFFFCC"  >
 
    <td align="center" width="450"><strong><font size="+1">Totals</font></strong></td>
    <td align="center" width="100"><strong></strong></td>
	<td align="right" width="150"></td>
    <td align="right" width="150"><strong><font color="#ff0000"><?php
	echo  number_format($ttlkshs,2);



	?></font></strong></td>
	<td align="center" width="150"><strong></strong></td>
	<td align="center" width="50"><strong></strong></td>
    <td align="center" width="50"><strong></strong></td>
	 <td align="center" width="50"><strong></strong></td>
    </tr>
  
  <?php
  
  }
  
  
  ?>
</table>
		
			

			
			
			
					
			  </div>
				
				
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
</body>

</html>