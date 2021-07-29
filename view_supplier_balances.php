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
		
		
		
		<?php require_once('includes/suppliersubmenu.php');  ?>
		
		<h3>:: List of All Suppliers</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">

<?php

?>
 <form name="search" method="post" action="">  			
				
			
<table width="70%" border="0" style="margin:auto;">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<a target="_blank" style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_list_supplier_bal.php">Print</a>						  
	<a target="" style="float:right; margin-right:30px; font-weight:bold; font-size:13px; color:#000000" href="print_list_supplier_balance_excel.php"><!--Export To Excel--></a>						  

	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center">
	<strong>Search Supplier - Enter Name: 
    </strong>
    
    
    <input type="text" name="supp_name" size="20" />
	
	<strong>Date From:</strong>
    <input type="text" name="date_from" id="date_from" size="20" />
	
		<strong>Date To:</strong>
    <input type="text" name="date_to" id="date_to" size="20" />
	
	<input type="submit" name="generate" value="Search">
	
	
	</td>
	
    </tr>	
	
  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="100"><strong>Supplier Code.</strong></td>    
    <td align="center" width="160"><strong>Supplier Name</strong></td>
	<td align="center" width="200"><strong>Balance Amount </strong></td>


    </tr>
  
  <?php 
   if (!isset($_POST['generate']))
{

 
$sql="SELECT SUM(amount*supplier_transactions.curr_rate) as ttl_bal,suppliers.sup_code,suppliers.supplier_name,suppliers.supplier_id FROM suppliers,supplier_transactions where 
supplier_transactions.supplier_id=suppliers.supplier_id GROUP BY supplier_transactions.supplier_id order by ttl_bal desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$supp_name=$_POST['supp_name'];

if ($supp_name!='')
{
$sql="SELECT * FROM customer where customer_name LIKE '%$supp_name%' order by customer_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT * FROM customer order by customer_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}





if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
						  
					$ttl_bal_lop=$rows->ttl_bal;
					
					if ($ttl_bal_lop==0)
					{
						
						
					}
					else
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
 $supplier_id=$rows->supplier_id;
 
 ?>
    <td><?php echo $supplier_code=$rows->sup_code;?></td>
    <td><a href="supplier_statement.php?supplier_id=<?php echo $supplier_id; ?>"><?php echo $rows->supplier_name;?></a></td>
    <td align="right"><?php 
	
	//include ('customer_balance.php');
	
	echo number_format($ttl_bal=$rows->ttl_bal,2);
	
	$job_card_ttl=$job_card_ttl+$ttl_bal;
	
	
	?></td>
	
</tr>
  <?php 
  
							  } }
  
  ?>
  <tr height="30" bgcolor="#FFFFCC">
  <td colspan="2" align="center"><strong>Total Payables</strong></td>

  <td align="right"><strong><?php echo number_format($job_card_ttl,2);?></strong></td>
  
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