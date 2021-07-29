<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/opening_balance_submenu.php');?>
		
		<h3>:: List of All Opening Balances in the System</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC" height="30"><td colspan="5" align="center">
    <?php

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';



?>	</td>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td width="400" align="center"><strong>Terminology / Account</strong></td>
    <td width="400"><div align="center"><strong>Client</strong></td>
	<td width="400"><div align="center"><strong>Amount (Kshs.)</strong></td>
    <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  
$sql="select  clients.c_name,accounting_terminologies.terminology_name,opening_balances.amount,opening_balances.date_recorded,opening_balances.opening_balance_id
 from opening_balances, accounting_terminologies,clients where opening_balances.client_id=clients.client_id AND 
 accounting_terminologies.terminology_id=opening_balances.terminology_id";
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
  
    <td><?php echo $rows->terminology_name;?></td>
	<td><?php echo $rows->c_name;?></td>
    <td align="right"><strong><?php echo number_format($rows->amount,2);?></strong></td>
    <td align="center"><a href="edit_opening_balance.php?opening_balance_id=<?php echo $rows->opening_balance_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_opening_balance.php?opening_balance_id=<?php echo $rows->opening_balance_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  
  }
  
  }
  
  
  ?>
</table>
		
			

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
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