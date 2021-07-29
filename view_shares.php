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
		
		
		
		<?php require_once('includes/sharessubmenu.php');  ?>
		
		<h3>:: Company Statement Of Owners Equity</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	
	<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_shares.php">Print</a>						  
<a  style="float:right; margin-right:100px; font-weight:bold; font-size:13px; color:#000000" href="print_list_shares_excel.php">Export To Excel</a>						  

	</td>
	</tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="400"><strong>Share Holder Name</strong></td>
	<td align="center" width="200"><strong>Contact Person</strong></td>
	<td align="center" width="200"><strong>Next of Kin</strong></td>
	<td align="center" width="200"><strong>Date Paid</strong></td>
    <td align="center" width="160"><strong>Share Percentage (%)</strong></td>
	<td align="center" width="460"><strong>Net Share Amount</strong></td>
		<td align="center" width="260"><strong>Share Amount(SSP)</strong></td>
	<td align="center" width="100"><strong>Edit</strong></td>
    <td align="center" width="100"><strong>Delete</strong></td>
    </tr>
  
  <?php 
 $ttl_shares=0;
 $grnd_shares_kshs=0;
 $ttl_shares34=0;
 
$sql="SELECT * FROM shares where status='0' OR status='2'";
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
 
 $shares_id=$rows->shares_id;
 ?>
   
    <td><?php echo $rows->share_holder_name;?></td>
    <td><?php echo $rows->contact_person;?></td>
	<td><?php echo $rows->next_of_kin;?></td>
	<td><?php echo $rows->date_paid;?></td>
    <td align="center">
	<?php 
//include ('all_shares_value.php');

//include ('specific_shares_value.php');

$task_totals=0;
$shares_amnt=0;
$sqlts="select * from shareholder_transactions where shareholder_id='$shares_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  
						  $shares_amnt=$rowsts->amount;
						  $curr_rate=$rowsts->curr_rate;
						  $task_ttl_kshs=$shares_amnt*$curr_rate;
						  $task_totals=$task_totals+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  
   number_format($task_totals,2); 
  
 

//$grnd_shares_kshs=$grnd_shares_kshs+$task_totals;

$task_totals2=0;
$shares_amnt2=0;
$task_ttl_kshs2=0;
$sqlts2="select * from shareholder_transactions";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
if (mysql_num_rows($resultsts2) > 0)
						  {
						  while ($rowsts2=mysql_fetch_object($resultsts2))
						  {
						  
						  $shares_amnt2=$rowsts2->amount;
						  $curr_rate2=$rowsts2->curr_rate;
						  $task_ttl_kshs2=$shares_amnt2*$curr_rate2;
						  $task_totals2=$task_totals2+$task_ttl_kshs2;
						  }
						  //echo $task_totals;
			
						  }
						  
   number_format($task_totals2,2); 



echo $perc=number_format($task_totals/$task_totals2*100,2);	
	
	?></td>
	<td align="right">
	<?php




$task_totalsx=0;
$shares_amntx=0;
$sqltsx="select * from shareholder_transactions where shareholder_id='$shares_id'";
$resultstsx= mysql_query($sqltsx) or die ("Error $sqltsx.".mysql_error());
if (mysql_num_rows($resultstsx) > 0)
						  {
						  while ($rowstsx=mysql_fetch_object($resultstsx))
						  {
						  
						  
						  
$currency_code=$rowstsx->currency;
$sqlcurr="select * from currency where curr_id='$currency_code'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo $curr_name=$rowcurr->curr_name.' ';
						  
						   $shares_amntx=$rowstsx->amount;
						  echo number_format ($shares_amntx,2).' ';
						 echo 'Rate :'.$curr_ratex=$rowstsx->curr_rate.'</br>';
						  
						  $task_totalsx=$task_totalsx+$task_ttl_kshsx;
						  }
						  //echo $task_totals;
			
						  }
						  
  // number_format($task_totalsx,2); 



	
	?>
	
	
	</td>
	
	<td align="right"><?php 
include ('specific_shares_value2.php');
	?></td>
	
	<td align="center"><a href="edit_shares.php?shares_id=<?php echo $rows->shares_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_shareholder.php?shares_id=<?php echo $rows->shares_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  //$grndttlcap=$grndttlcap+$shares;

  }
  ?>
  <tr height="30" bgcolor="#FFFFCC" >
 
    <td align="center" ><strong>Totals</strong></td>
    <td align="center" ><strong></strong></td>
    <td align="center" ><strong></strong></td>

	<td align="center" ><strong><?php echo $gnrt_perc_shares;?></strong></td>
	<td width="260" align="right"><strong><?php //echo number_format($grndttlcap,2); ?></strong></td>
    <!--<td align="center" width="200"><strong>Mode of payment</strong></td>
	<td align="center" width="200"><strong>Date recorded</strong></td>-->
	<td align="center" ><strong></strong></td>
   <td  align="right"><strong><?php echo number_format($grnd_shares_kshs,2); ?></strong></td>
   	<td align="center" ><strong></strong></td>
   	<td align="center" ><strong></strong></td>

  
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