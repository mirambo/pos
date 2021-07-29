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
		
		
		
		<?php require_once('includes/pettycashsubmenu.php');  ?>
		
		<h3>:: List of All Petty Cash Fund</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Income Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="300"><strong>Petty Cash Fund Description</strong></td>
    <td align="center" width="200"><strong>Amount(Kshs)</strong></td>
	<td align="center" width="200"><strong>Date recorded</strong></td>
	<td align="center" width="50"><strong>Edit</strong></td>
    <td align="center" width="50"><strong>Delete</strong></td>

    </tr>
  
  <?php 
 
$sql="SELECT * from petty_cash_income";
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

	<td align="right"><?php echo number_format($amount=$rows->amount,2);?></td>
	<td align="center"><?php echo $rows->date_recorded;?></td>
	<td align="center"><a href="edit_petty_cash_income.php?petty_cash_income_id=<?php echo $rows->petty_cash_income_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_petty_cash_income.php?petty_cash_income_id=<?php echo $rows->petty_cash_income_id;?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  
  $gnd_amnt=$gnd_amnt+$amount;
  }
  
  
  ?>
   <tr  height="30" bgcolor="#FFFFCC" >
 
    <td align="center" width="300"><strong>Grand Totals</strong></td>
    
	<td align="right" width="200"><strong><?php echo  number_format($gnd_amnt,2); ?></strong></td>
	<td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>
	<td align="center"><strong></strong></td>

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