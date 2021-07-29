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
		
		<h3>:: All Dispose Fixed Asset</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<?php

if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Fixed Asset Disposed Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td width="300" align="center"><strong>Fixed Asset Name</strong></td>
    <td width="10%" align="center"><strong>Date Purchased</strong></td>
    <td width="200" ><div align="center"><strong>Value(Other Currency)</strong></td>
	<td width="150"><div align="center"><strong>Exchange Rate</strong></td>
    <td width="150"><div align="center"><strong>Value(Kshs)</strong></td>
	<td width="150"><div align="center"><strong>Depr. Value(Kshs)</strong></td>
	<td width="10%" align="center"><strong>Period (Years)</strong></td>
    <td width="200"><div align="center"><strong>Total Deprec. (Kshs)</strong></td>
	 <td width="200"><div align="center"><strong>Current Value (Kshs)</strong></td>
	 <td width="100"><div align="center"><strong>Status</strong></td>
    <!--<td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>  
  <?php 
  	 	 	 	 	 	 	  
$sql="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,
fixed_assets.value,fixed_assets.dep_value,fixed_assets.amount_paid,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency 
where fixed_assets.currency=currency.curr_id AND fixed_assets.status='1' order by fixed_assets.fixed_asset_id desc ";
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
    <td align="center"><?php echo $date_purchased=$rows->date_purchased; ?></td>
	    <td align="right"><?php echo $rows->curr_name.' '.number_format($value=$rows->value,2);?></td>
    <td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	    <td align="right"><?php echo number_format($value_kshs=$value*$curr_rate,2); $dep_value=$rows->dep_value;?></td>
		  <td align="right"><?php echo number_format($dep_value_kshs=$dep_value*$curr_rate,2); ?></td>
    <td align="center"><?php 
	
$curr_date=date('Y-m-d');
$date_purchased;

$curr_date_string= strtotime ($curr_date);	
 $purchase_date_string= strtotime ($date_purchased);

 $period_sec=$curr_date_string-$purchase_date_string;

 $period_days= $period_sec/86400;
 
 $period_years= $period_days/365;
 
 echo $period_years_final=number_format( $period_years,3)
	
	
	
	?></td>
    <td align="right"><?php 
	echo number_format($ttl_dep=$dep_value_kshs*$period_years_final,2);
	
	?></td>
	 <td align="right"><?php
	 
	 echo number_format($curr_value=$value_kshs-$ttl_dep,2);

	 ?></td>
    <td align="center"><font color="#ff0000" size="-2">Disposed</font></td>
    
    </tr>
  <?php 
  $grnd_ttl=$grnd_ttl+$rows->value;
  $grnd_value_kshs=$grnd_value_kshs+$value_kshs;
  $grnd_ttl_dep=$grnd_ttl_dep+$ttl_dep;
  $grnd_ttl_curr_value=$grnd_ttl_curr_value+$curr_value;
  }
  
  ?>
  
 <tr bgcolor="#FFFFCC" height="30">
    <td><div align="center"><strong>Grand Totals</strong></td>
    <td width="400"><div align="right"></td>
    <td width="100" ><div align="center"><strong></strong></td>
    <td width="100"><div align="center"><strong></strong></td>
	<td width="100" ><div align="center"><strong><?php echo number_format($grnd_value_kshs,2); ?></strong></td>
    <td width="100"><div align="center"><strong><font color="#009900"><?php echo number_format($grnd_ttl_paid,2); ?></font></strong></td>
	    <td width="100" ><div align="right"><strong><font color="#ff0000"></font></strong></td>
    <td width="100"><div align="right"><strong><?php echo number_format($grnd_ttl_dep,2); ?></strong></td>
	   <td width="100" ><div align="right"><strong><?php echo number_format($grnd_ttl_curr_value,2); ?></strong></td>
	   <td width="100" ><div align="center"><strong></strong></td>

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