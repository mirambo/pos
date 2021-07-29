<?php
include('Connections/fundmaster.php'); 
$invoice_payment_id=$_GET['invoice_payment_id'];





?>



<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<script type="text/javascript"> 

function confirmApprove()
{
    return confirm("Are you sure you want to approve this payment?");
}

</script>

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

<?php require_once('includes/invoice_payment_submenu.php');  ?>
		
		<h3>:: Approval Confirmation </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="process_approve_client_payment.php?invoice_payment_id=<?php echo $invoice_payment_id;?>" method="post">			
			<table width="100%" border="0">
  <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="9" align="center">

<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:40px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Approved Successfully!!</font></strong></p></div>';

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order Updated successfully!!</font></strong></p></div>';

?>

<?php

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order Deleted Successfully</font></strong></p></div>';
?>

<br/>
<div align="center" style="background: #009900; height:40px; width:300px; border:#ffffff solid 1px; font-size:11px; color:#ffffff;" class="br-5"> <p align="center"><font color="#FFffff" ><a target="_blank" style="color:#ffffff;" href="sales_receipt.php?invoice_payment_id=<?php echo $invoice_payment_id;?>">Print Receipts</a></font></strong></p></div>
<br/>

</td>
 
	


  </tr>
  
  
  
  
  
 
  
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