<?php 

include('Connections/fundmaster.php'); 



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
		
		
		
		<?php require_once('includes/suppliersubmenu.php');  ?>
		
		<h3>:: Begining to generate order </h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<span style="font-size:17px; font-weight:bold; color:#FF0000;">:::Select the supplier</span>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>Supplier Name</strong></td>
    <td align="center" width="160"><strong>Contact Person</strong></td>
	<td align="center"><strong>Country</strong></td>
    <td align="center" width="100"><strong>Postal Address</strong></td>
	<td align="center"><strong>Town</strong></td>
	<td align="center" width="150"><strong>Phone Number</strong></td>
    <td width="180" align="center"><strong>Email Address</strong></td>
    
    </tr>
  
  <?php 
 
$sql="SELECT * FROM suppliers";
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
  
    <td><a href="process_gen_order_code.php?supplier_id=<?php echo $rows->supplier_id;?>" style="color: #000066; font-size:11px; font-weight:bold;"><?php echo $rows->supplier_name;?></a></td>
    <td><?php echo $rows->cont_person;?></td>
	<td><?php echo $rows->country;?></td>
	<td><?php echo $rows->postal;?></td>
	<td><?php echo $rows->town;?></td>
	<td align="center">
	<?php echo $rows->phone;?>
    </td>
	
	<td><?php echo $rows->email;?></td>
	
    
    </tr>
  <?php 
  
  }
  
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