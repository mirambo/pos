<?php include('Connections/fundmaster.php'); ?>

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
		
		
		
		<?php require_once('includes/fixedassetsubmenu.php');  ?>
		
		<h3>:: List of All Available Fixed Assets</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
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
    <td width="300" align="center"><strong>Fixed Asset Name</strong></td>
	<td width="10%" align="center"><strong>Description</strong></td>
    <td width="10%" align="center"><strong>Date Purchased</strong></td>
    <td width="200" ><div align="center"><strong>Value(Other Currency)</strong></td>
	<td width="150"><div align="center"><strong>Exchange Rate</strong></td>
    <td width="150"><div align="center"><strong>Value(Kshs)</strong></td>
	<td width="150"><div align="center"><strong>Depr. Value(Kshs)</strong></td>
	<td width="10%" align="center"><strong>Amount Paid(Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance</strong></td>
	 <td width="100"><div align="center"><strong>Pay</strong></td>
    <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  	 	 	 	 	 	 	  
$sql="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_assets.description,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,
fixed_assets.value,fixed_assets.dep_value,fixed_assets.amount_paid,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency where 
fixed_assets.currency=currency.curr_id AND fixed_assets.status='0' order by fixed_assets.fixed_asset_id desc ";
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
  
    <td><?php echo $rows->fixed_asset_name;?></td>
	<td><font size="-2"><?php echo $rows->description;?></font></td>
    <td align="center"><?php echo $rows->date_purchased; ?></td>
	    <td align="right"><?php echo $rows->curr_name.' '.number_format($value=$rows->value,2);?></td>
    <td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	    <td align="right"><?php echo number_format($value_kshs=$value*$curr_rate,2); $dep_value=$rows->dep_value;?></td>
		  <td align="right"><?php echo number_format($dep_value_kshs=$dep_value*$curr_rate,2); ?></td>
    <td align="right"><?php 
	$fixed_asset_id=$rows->fixed_asset_id;
$ttl_paid=0;	
$sqlp="select * from fixed_assets_payments where fixed_asset_id='$fixed_asset_id'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());
if (mysql_num_rows($resultsp) > 0)
{
while ($rowsp=mysql_fetch_object($resultsp))
		{
		 $amount_paid=$curr_rate*$rowsp->amount_paid;
		 $ttl_paid=$ttl_paid+$amount_paid;
		
		}
		echo number_format($ttl_paid,2);
//echo number_format($ttl_cash1,2);

}


//$curr_rate=$rowcurr->curr_rate;
	
	
	?></td>
    <td align="right"><?php echo number_format($bal_fp= $value_kshs-$ttl_paid,2);?></td>
    <td align="center"><?php 
	if ($value_kshs==$ttl_paid)
	{
	echo "<i>Fully Paid</i>";
	}
	elseif($value_kshs>$ttl_paid && $ttl_paid!=0 )
	{?>
	<a href="pay_fixed_asset.php?fixed_asset_id=<?php echo $rows->fixed_asset_id;?>&amount_paid=<?php echo $ttl_paid; ?>&balance=<?php echo $bal_fp;?>">Pay Balance</a>
	<?php
	}
	elseif($bal_fp==$value_kshs )
	{?>
	<a href="pay_fixed_asset.php?fixed_asset_id=<?php echo $rows->fixed_asset_id;?>&amount_paid=<?php echo $ttl_paid; ?>&balance=<?php echo $bal_fp;?>">Pay</a>
	<?php 
	}
	
	?></td>
    <td align="center"><a href="edit_fixed_asset.php?fixed_asset_id=<?php echo $rows->fixed_asset_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_fixed_assets.php?fixed_asset_id=<?php echo $rows->fixed_asset_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  $grnd_ttl=$grnd_ttl+$rows->value;
  $grnd_value_kshs=$grnd_value_kshs+$value_kshs;
  $grnt_bal_fp=$grnt_bal_fp+$bal_fp;
  $grnd_ttl_paid=$grnd_ttl_paid+$ttl_paid;
  $grnd_dep_value_kshs=$grnd_dep_value_kshs+$dep_value_kshs;
  }
  
  ?>
  
 <tr bgcolor="#FFFFCC" height="30">
    <td><div align="center"><strong>Grand Totals</strong></td>
    <td width="400"><div align="right"></td>
    <td width="100" ><div align="center"><strong></strong></td>
    <td width="100"><div align="center"><strong></strong></td>
	    <td width="100" ><div align="center"><strong></strong></td>
    <td width="100"><div align="center"><strong><?php echo number_format($grnd_value_kshs,2); ?></strong></td>
	    <td width="100" ><div align="right"><strong><?php echo number_format($grnd_dep_value_kshs,2); ?></strong></td>
    <td width="100"><div align="center"><strong><font color="#009900"><?php echo number_format($grnd_ttl_paid,2); ?></font></strong></td>
	   <td width="100" ><div align="center"><strong><font color="#ff0000"><?php echo number_format($grnt_bal_fp,2); ?></font></strong></td>
    <td width="100"><div align="center"><strong></strong></td>
	<td width="100"><div align="center"><strong></strong></td>
	<td width="100"><div align="center"><strong></strong></td>
    </tr> 
  
  
  <?php
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
		
			

			
			
			
					
			  </div>
				
				<!--<div id="cont-right" class="br-5">
					
				</div>-->
			
			
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