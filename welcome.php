<?php 
include('includes/session.php');
include('Connections/fundmaster.php'); 


if ($_GET['loginfirst']==1)

{

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Logged into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


$sqlpd= "UPDATE users SET islogged_in='1' where user_id='$user_id'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());

}




?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<div id="zone-bar2" class="br-5">
<marquee><strong>:::BRISK DIAGNOSTICS LIMITED | ACCOUNTING FINANCIAL REPORTS | INVENTORY | POS | PAYROLL :::</strong></marquee>


</div>
		
		<h3>:: Home >>>> </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-welcome" class="br-5">


<table width="90%" border="0" align="center" style="margin-left:80px;">
<tr>
<td colspan="6" height="40" align="center"><strong><font size="+1">Welcome To Brisk Accounting And Inventory System</font></strong></td>

</tr>
<tr align="center">
<td><img src="images/users_process.png"></a></td>
<td>
	
	<?php
if($user_group_id!='15')
{

}

else
{
	
$gnd_amnt=0;
$sql34="SELECT * from petty_cash_income";
$results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
if (mysql_num_rows($results34) > 0)
						  {
							
							  while ($rows34=mysql_fetch_object($results34))
							  { 
    

	number_format($amount34=$rows34->amount,2);

  
  $gnd_amnt=$gnd_amnt+$amount34;
 
  }
 
   //echo $gnd_amnt.' ';
  }
  
 $gnd_amnt_exp=0; 
 $sql35="SELECT * from petty_cash_expense";
$results35= mysql_query($sql35) or die ("Error $sql35.".mysql_error());
if (mysql_num_rows($results35) > 0)
						  {
							
							  while ($rows35=mysql_fetch_object($results35))
							  { 
    

	$amount35=$rows35->amount;

  
  $gnd_amnt_exp=$gnd_amnt_exp+$amount35;
  }
 //echo $gnd_amnt_exp;
  
  }
  
 $bal=$gnd_amnt-$gnd_amnt_exp;

if ($bal<1000)
{ ?>
<span style="float:right;"><blink> <font color="#ff0000"><a href="add_petty_cash_income.php" style="float:right; color:#ff0000; font-size:13px; text-decoration:blink;">Replenish Petty Cash Fund!!</a></blink></span>
<?php
}
}		
?>
	
	
	</font></td>
<td><img src="images/settings.png"></a></td>
<td><?php

/*

$sqlexp="select purchase_order.product_id,suppliers.supplier_name,purchase_order.purchase_order_id,purchase_order.quantity,products.curr_bp,products.product_id,products.product_name,
products.prod_code,products.reorder_level,received_stock.quantity_rec,received_stock.supplier_id,products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date from purchase_order,products,suppliers, received_stock 
where purchase_order.supplier_id=suppliers.supplier_id and products.product_id=received_stock.product_id AND purchase_order.product_id=received_stock.product_id and purchase_order.order_code=received_stock.order_code ORDER BY products.product_name asc";
$resultsexp= mysql_query($sqlexp) or die ("Error $sqlexp.".mysql_error());

if (mysql_num_rows($resultsexp) > 0)
						  {
							 
							  while ($rowsexp=mysql_fetch_object($resultsexp))
							  { 
$curr_date=date('Y-m-d');
$expiry_date=$rowsexp->expiry_date;
	
$curr_date_string= strtotime ($curr_date);	
$expiry_date_string= strtotime ($expiry_date);

 $period_sec=$expiry_date_string-$curr_date_string;

 $period_days= $period_sec/86400;
 


	
							  
		}
if ($period_days<='120' && $period_days>0 )
	
	{
	?>
	<a href="view_prod_condition.php" style="float:right; color:#ff0000; font-size:13px; text-decoration:blink;">Some Products are almost expiring!!</a>
	
	<?php 
	}
							  
}

 */
 
 ?></td>
<td><img src="images/report.png"></a></td>
</tr>
<tr align="center">
<td style="font-weight:bold; color:#FF6600;">Access Control</td>
<td ></td>
<td style="font-weight:bold; color:#FF6600;">Inventory Management</a></td>
<td>




</td>
<td style="font-weight:bold; color:#FF6600;">Accounting & Financial Reports</a></td>
</tr>
<tr height="20">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr align="center">
<td></td>
<td><img src="images/money.png"></a></td>
<td></td>
<td><img src="images/invoice.png"></a></td>
<td></td>
</tr>
<tr align="center">
<td></td>
<td style="font-weight:bold; color:#FF6600;">Employees Payroll</a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;">Point Of Sale</a></td>
<td></td>
</tr>
<tr align="center" height="30">
<td></td>
<td style="font-weight:bold; color:#FF6600;"></a></td>
<td></td>
<td style="font-weight:bold; color:#FF6600;"></a></td>
<td></td>
</tr>
</table>



 </div>
				
				<div id="cont-right-welcome" class="br-5">
		<?php

$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);		?>		
				
				
				
				<table width="100%" border="0">
				<?php 
$sqllog="SELECT * FROM audit_trail where user_id='$user_id' AND action LIKE '%Signed%' order by date_of_event desc limit 1,1";
$resultslog= mysql_query($sqllog) or die ("Error $sqllog.".mysql_error());
$rowslog=mysql_fetch_object($resultslog);


$sqllogin="SELECT * FROM users where islogged_in='1'";
$resultslogin= mysql_query($sqllogin) or die ("Error $sqllogin.".mysql_error());
$rowslogin=mysql_num_rows($resultslogin);


?>
				
				<tr ><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;"><u>::Last Logged In :</u> <span style="color:#000000; font-size:11px;"><?php echo $rowslog->date_of_event;  ?></span></p></td></tr>
								<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::Online Users : <span style="color:#000000; font-size:11px;">
								
								
								<?php echo $rowslogin;?> <a href="online_users.php" onclick="javascript:void window.open('online_users.php','1368794944167',
'width=1000,height=200,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=1,left=200,top=300');return false;">View Them</a>
								
								</span></p></td></tr>
			
				<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::Today : <span style="color:#000000; font-size:11px;"><?php echo date('d-F-Y');?></span></p></td></tr>
				
				<tr height="30"><td bgcolor='#FFFFCC'align="center"><strong>Company Details</strong></td></tr>
				
				
				<tr ><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::Brisk Diagnostics Limited</p></td></tr>
				<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px; ">::<?php echo $rowscont->cont_person;?></p></td></tr>
				<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::P.O. BOX<?php echo $rowscont->address;?></p></td></tr>
				<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::<?php echo $rowscont->town;?></p></td></tr>
				<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::<?php echo $rowscont->building;?></p></td></tr>
				<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::<?php echo $rowscont->street;?></p></td></tr>
				<!--<tr><td><p style="font:15px; color:#ff0000; font-weight:bold; margin:2px;">::<?php echo date('d-F-Y');?></p></td></tr>-->
				
				
				
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