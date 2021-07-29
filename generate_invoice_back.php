<?php
session_start(); 
$get_client_id=$_SESSION['get_client_id'];
$get_sales_code=$_SESSION['sales_code'];
$get_sales_rep=$_SESSION['sales_rep'];
$currency=$_SESSION['currency'];



$id=$_GET['cat'];
$get_avl_quant=$_GET['avl_quant'];
$get_prod=$_GET['product_id'];
include('Connections/fundmaster.php');
$sqlprodname="select product_name,pack_size,weight from products where product_id='$get_prod'";
$resultsprodname= mysql_query($sqlprodname) or die ("Error $sqlprodname.".mysql_error());
$rowprodnamw=mysql_fetch_object($resultsprodname);

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

?>


<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<SCRIPT language="javascript">
function reload(form)
{
var val=form.prod_cat.options[form.prod_cat.options.selectedIndex].value;
self.location='generate_invoice.php?cat=' + val ;

}

</script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to remove the item from the list?");
}

</script>



<script>
function toggle() {
 if( document.getElementById("hidethis").style.display=='none' || document.getElementById("hidethis1").style.display=='none'  )
 {
   document.getElementById("hidethis").style.display = '';
   document.getElementById("hidethis1").style.display = '';
   document.getElementById("hidethis2").style.display = '';
   document.getElementById("hidethis3").style.display = '';
 }else
 {
   document.getElementById("hidethis").style.display = 'none';
   document.getElementById("hidethis1").style.display = 'none';
   document.getElementById("hidethis2").style.display = 'none';
   document.getElementById("hidethis3").style.display = 'none';
 }
}
</script>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/invoicessubmenu.php');  ?>
		
		<h3>:: Generate Invoice to Client -- <?php
		
$sqlsup="SELECT * FROM clients where client_id='$get_client_id'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());
$rows=mysql_fetch_object($resultssup);


?> <span style="color:#000066"><?php echo $rows->c_name;
		
		
		 ?>  </span></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="processgensales.php" method="post">			
<table width="100%" border="0">
  <tr height="30">

    <td colspan="11" align="center">

<?php

if ($_GET['saveconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Invoice Saved successfully!!</font></strong></p></div>';

if ($_GET['saveconfirmc']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Cash Sales Receipt Saved successfully!!</font></strong></p></div>';


?>

<?php

if ($_GET['overproduct']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Quantity available for '.$rowprodnamw->product_name.'('.$rowprodnamw->pack_size.') are <span style="font-size:14px; font-weight:bold;">'.$get_avl_quant.'</span> Units Only</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    <td><input type="hidden" name="client_id" size="20" value="<?php echo $get_client_id; ?>">
	<input type="hidden" name="sales_code" size="20" value="<?php echo $get_sales_code; ?>">
	<input type="hidden" name="currency1" size="20" value="<?php echo $currency; ?>">
	<input type="hidden" name="curr_rate" size="20" value="<?php echo $curr_rate; ?>">
	<input type="hidden" name="sales_rep" size="20" value="<?php echo $get_sales_rep; ?>">
	
	</td>
    
  </tr>
  <tr height="30">
   
   
   
    <td colspan="13" rowspan="3" valign="top" align="center" ><a href="begin_invoice.php"><img src="images/generate_another.jpg"></a><br/><br/><a href="begin_cash_sales.php"><img src="images/generate_anotherc.jpg"></a></td>
    
  
  </tr>
  <tr height="30">
  
     <td>&nbsp;</td> 
    <td width="10%">
								  </td>
    <td width="15%">&nbsp;
	
	
	
	</td>
    <td>&nbsp;<a href="#"><!--Add Product--></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="right">&nbsp;</td>
    <td valign="top" align="center"></td>
	     <td valign="top" width="15%" align="right"></td>
	   <td valign="top" width="15%"></td>
    <td valign="top" width="10%"></td>
    <td valign="top">
      
  </td>
    <td valign="top" width="15%" align="right"></td>
    <td valign="top" colspan="2">
    </td>
 
    <td valign="top"><div align="center"></div></td>
    <td valign="top"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
    <td colspan="2" align="right"></td>
    
    <td colspan="5" align="right"></td>
  <!--  <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>-->
  </tr>
  
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("gen_order");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 //frmvalidator.addValidation("prod_cat","dontselect=0","Please select product category");
 frmvalidator.addValidation("prod","dontselect=0","Please select product");
 frmvalidator.addValidation("prod_code","req","Please enter product code");
 frmvalidator.addValidation("qnty","req","Please enter quantity");
 frmvalidator.addValidation("discount","req","Please enter discount allowed");
 

</SCRIPT>




  
  
  

			
			
			
					
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