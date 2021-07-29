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
		
		<h3>:: List of All Fixed Assets</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="14" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_fixed_assets.php">Print</a>						  

	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td width="300" align="center"><strong>Asset Name</strong></td>
	<td width="5%" align="center"><strong>Quantity</strong></td>	
    <td width="10%" align="center"><strong>Date Purchased</strong></td>
    <td width="200" ><div align="center"><strong>Value(Other Currency)</strong></td>
	<td width="150"><div align="center"><strong>Ex. Rate</strong></td>
    <td width="150"><div align="center"><strong>Value(Kshs)</strong></td>
	  <td width="150"><div align="center"><strong>Totals(Kshs)</strong></td>
	<td width="150"><div align="center"><strong>Deprec. Percentage(%)</strong></td>
	<td width="10%" align="center"><strong>Depre Value (Kshs) / Per Year</strong></td>
	<td width="10%" align="center"><strong>Depreciation (Todate)</strong></td>
	<td width="10%" align="center"><strong>CUrrent Value (Kshs)</strong></td>

    <td width="50"><div align="center"><strong>Edit</strong></td>
	   <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  $grnd_ttl_dep_tdt=0;
  	 	 	 	 	 	 	  
$sql="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_asset_category.fixed_asset_category_name,fixed_assets.useful_life,fixed_assets.quantity,fixed_assets.description,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,fixed_assets.value,fixed_assets.fixed_asset_category_id,fixed_assets.dep_value,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency,fixed_asset_category where 
fixed_assets.currency=currency.curr_id and fixed_asset_category.fixed_asset_category_id=fixed_assets.fixed_asset_category_id and fixed_assets.status='0' order by fixed_assets.date_purchased desc ";
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
  
    <td><?php echo $rows->fixed_asset_name;
	
$fixed_asset_category_id=$rows->fixed_asset_category_id;
$sqldep="select * from fixed_asset_category where fixed_asset_category_id='$fixed_asset_category_id'";
$resultsdep= mysql_query($sqldep) or die ("Error $sqldep.".mysql_error());
$rowdep=mysql_fetch_object($resultsdep);
echo '('. $rowdep->fixed_asset_category_name.' )';
	
	
	?></td>
    <td><?php echo $quantity=$rows->quantity;?></td>

    <td align="center"><?php echo $date_purchased=$rows->date_purchased; ?></td>
	    <td align="right"><?php echo $rows->curr_name.' '.number_format($value=$rows->value,2);?></td>
    <td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	    <td align="right"><?php echo number_format($value_kshs=$value*$curr_rate,2); $dep_value=$rows->dep_value;?></td>
		 <td align="right"><?php echo number_format($ttl_value_kshs=$value_kshs*$quantity,2); //$dep_value=$rows->dep_value;?></td>
		  <td align="center"><?php //echo number_format($dep_value_kshs=$dep_value*$curr_rate,2); 
		  echo $rows->useful_life;
		  ?></td>
		  
		 
		  <td align="right"><?php //echo number_format($dep_value_kshs=$dep_value*$curr_rate,2); 
		  $dep_value=$rows->dep_value;
		  echo number_format($dep_value_kshs=$dep_value*$curr_rate*$quantity,2);
		  ?></td>
		  	<td align="right"><font size="-2"><?php 
			
			$curr_date=date('Y-m-d');
$date_purchased;

$curr_date_string= strtotime ($curr_date);	
$purchase_date_string= strtotime ($date_purchased);

 $period_sec=$curr_date_string-$purchase_date_string;

 $period_days= $period_sec/86400;
 
 $period_years= $period_days/365;
 
 $period_years_final=number_format( $period_years,3);
 
 echo number_format($ttl_dep=$dep_value_kshs*$period_years_final,2);
 
 $grnd_ttl_dep_tdt= $grnd_ttl_dep_tdt+$ttl_dep;
			
			
			//echo $rows->description;?></font></td>
		   
   <!-- <td align="right"><?php $fixed_asset_id=$rows->fixed_asset_id;
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
	
	?></td>-->
    <td align="right"><?php
echo number_format($curr_value=$ttl_value_kshs-$ttl_dep,2);

$grnd_curr_value=$grnd_curr_value+$curr_value;


	?></td>
  <td align="center"><a href="edit_fixed_assets.php?fixed_asset_id=<?php echo $rows->fixed_asset_id; ?>&fa_name=<?php echo $rows->fixed_asset_name;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_fixed_assets.php?fixed_asset_id=<?php echo $rows->fixed_asset_id; ?>&fa_name=<?php echo $rows->fixed_asset_name;?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  $grnd_ttl=$grnd_ttl+$rows->value;
  $grnd_value_kshs=$grnd_value_kshs+$ttl_value_kshs;
  $grnt_bal_fp=$grnt_bal_fp+$bal_fp;
  $grnd_ttl_paid=$grnd_ttl_paid+$ttl_paid;
  $grnd_dep_value_kshs=$grnd_dep_value_kshs+$dep_value_kshs;
  $grnd_salvage_value_kshs=$grnd_salvage_value_kshs+$salvage_value_kshs;
  }
  
  ?>
  
 <tr bgcolor="#FFFFCC" height="30">
    <td><div align="center"><strong>Grand Totals</strong></td>
    <td width="400"><div align="right"></td>
    <td width="400"><div align="right"></td>
    <td width="100" ><div align="center"><strong></strong></td>
    <td width="100"><div align="center"><strong></strong></td>
	 <td width="100" ><div align="center"><strong></strong></td>
	   
    <td width="100"><div align="right"><strong><?php echo number_format($grnd_value_kshs,2); ?></strong></td>
	
	 <td width="100" ><div align="center"><strong></strong></td>
	
	
   
	    <td width="100" ><div align="right"><strong><?php echo number_format($grnd_dep_value_kshs,2); ?></strong></td>
		 <td width="100"><div align="right"><strong><?php echo $grnd_ttl_dep_tdt;?></strong></td>
		 <td width="100"><div align="right"><strong><?php echo number_format($grnd_curr_value,2)?></strong></td>
    
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