<?php include('Connections/fundmaster.php'); 
$payroll_id=$_GET['payroll_id'];
$net_pay=$_GET['net_pay'];

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

<?php require_once('includes/payslipsubmenu.php');  ?>
		
		<h3>:: Choose Whether To Pay Staff : <?php

$sqlsup="SELECT payroll.payment_month,payroll.net_pay,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname FROM 
payroll,employees where payroll.emp_id=employees.emp_id and payroll.payroll_id='$payroll_id'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());
$rows=mysql_fetch_object($resultssup);

echo $rows->emp_firstname.' '.$rows->emp_middle_name.' '.$rows->emp_lastname.' ';
		?>.Net Salary : <?php echo number_format($rows->net_pay,2); ?></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">

			
<form name="start_invoice" action="process_gen_sales_code.php?sale_type=<?php echo 'i';?>" method="post">			
<table width="100%" border="0" bgcolor="#FFFFCC">
  
 <tr height="50">
    <td width="1%">&nbsp;</td>
    <td align="center"></td>
    <td align="center"></td>
    
  </tr>

 
  <tr>
    
    <td align="center" width="35%" ><a href="pay_staff_now.php?payroll_id=<?php echo $payroll_id ?>"><img src="images/paystaff_now.png"></a></td>
	<td width="5%">&nbsp;</td>
    <td align="center"><a href="print_payslip.php?payroll_id=<?php echo $payroll_id ?>"><img src="images/paystaff_later.png"></td>
    
  </tr>
  <tr height="50">

    <td width="35%" align="center"><font color="#ff0000"></font></td>
	<td width="5%">&nbsp;</td>
    <td width="40%"  align="center"><font color="#ff0000"></font></td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("start_invoice");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("client","dontselect=0",">>Please select client");
 frmvalidator.addValidation("sales_rep","dontselect=0",">>Please select sales representative");
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
  /*frmvalidator.addValidation("pay_term","dontselect=0","Please select term of payment");*/

 
 
 
  </SCRIPT>

			
			
			
					
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