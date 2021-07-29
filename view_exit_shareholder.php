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
    return confirm("Are you sure you want to exit shareholder?");
}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/sharessubmenu.php');  ?>
		
		<h3>:: List of All Exited Share Holders</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['exitconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Share Holder Exit Successfully !!</font></strong></p>";
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="400"><strong>Share Holder Name</strong></td>
	<td align="center" width="200"><strong>Contact Person</strong></td>
	<td align="center" width="200"><strong>Next of Kin</strong></td>
    <td align="center" width="260"><strong>Share Percentage (%)</strong></td>
	<td align="center" width="260"><strong>Capital Share Amount(KSHS)</strong></td>

	
    <td align="center" width="100" colspan="2"><strong>Reason</strong></td>
    </tr>
  
  <?php 
 
$sql="SELECT * FROM shares where status='1'";
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
   
    <td><?php echo $rows->share_holder_name;?></td>
    <td><?php echo $rows->contact_person;?></td>
	<td><?php echo $rows->next_of_kin;?></td>
    <td align="center"><?php echo number_format($rows->perc_shares,2);?></td>
	<td align="right"><?php echo number_format($rows->shares_amount,2);
	
	$shares=$rows->shares_amount;
	
	
	?></td>
	
	<!--<td align="center"><a href="edit_shares.php?shares_id=<?php echo $rows->shares_id; ?>"><img src="images/edit.png"></a></td>-->
    <td align="center" colspan="2"><?php 
	$shares_id=$rows->shares_id;
$queryrsn="select * from  exited_shareholder where shares_id='$shares_id'";
$resultsrsn=mysql_query($queryrsn) or die ("Error: $queryrsn.".mysql_error());
$rowsrsn=mysql_fetch_object($resultsrsn);
	
	
	echo $rowsrsn->reason; ?></td>
    </tr>
  <?php 
  $grndttlcap=$grndttlcap+$shares;
  }
  ?>
  <tr height="30" >
 
    <td align="center" width="400"><strong>Totals</strong></td>
    <td align="center" width="260"><strong></strong></td>
	<td align="center" width="260"><strong></strong></td>
	<td align="center" width="260"><strong></strong></td>
	<td width="260" align="right"><strong><?php echo number_format($grndttlcap,2); ?></strong></td>
    <!--<td align="center" width="200"><strong>Mode of payment</strong></td>
	<td align="center" width="200"><strong>Date recorded</strong></td>-->
	<td align="center" width="100"><strong></strong></td>
    <td align="center" width="100"><strong></strong></td>
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