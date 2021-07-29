<?php 
include('Connections/fundmaster.php'); 
$order_code=$_GET['order_code'];
$sqlrec="SELECT * FROM stock_transfer WHERE stock_transfer_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
 $source=$rowsrec->shop_from;
 $destination=$rowsrec->shop_to;
 $releasing_person=$rowsrec->releasing_person;
 $receiving_person=$rowsrec->receiving_person;
 $order_date=$rowsrec->transfer_date;
 
$querytcsp="select * from shop where shop_id='$source'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);
$source_shop=$rowstcsp->shop_name;


$querytcs="select * from shop where shop_id='$destination'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$destination_shop=$rowstcs->shop_name;
?>

<script type="text/javascript"> 
function confirmSave()
{
    return confirm("Are you sure want to save?");
}
</script>

<form name="start_invoice" action="process_edit_stock_transfer.php?order_code=<?php echo $order_code;?>&view=<?php echo $view ?>" method="post">	
<table width="100%" border="0">
   <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top">Select Source<font color="#FF0000"></font></td>
    <td width="15%" valign="top">
	
	<select name="source">
	
<option value="<?php echo $source; ?>"><?php echo $source_shop?></option>
								  <?php
								  
								  $query1="select * from shop order by shop_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shop_id; ?>"><?php echo $rows1->shop_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> <!--<a href="add_supplier.php?newsup=newsup">New Supplier</a>-->
	
	</td>

								  <td valign="top" width="10%">Transfer Date<font color="#FF0000"></font></td>
								  <td valign="top" width="15%">
								  <input type="textbox" size="10" name="date_from" value="<?php echo $order_date; ?>">	
								
								  
								  </td>
								  
  </tr>

	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Destination<font color="#FF0000"></font></td>
    <td valign="top"><select name="destination">
	
<option value="<?php echo $destination; ?>"><?php echo $destination_shop;?></option>
								  <?php
								  
								  $query1="select * from shop order by shop_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shop_id; ?>"><?php echo $rows1->shop_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
							   
							   
					<br/>
				   
							   </td>

							   <td valign="top">Releasing Person</td>
							   <td><input type="textbox" size="10" name="release" value="<?php echo $releasing_person ?>"></td>
							   
    </tr>
	
	<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Receiving Person<font color="#FF0000"></font></td>
    <td valign="top"><input type="textbox" size="10" name="receive" value="<?php echo $receiving_person ?>">
							   
							   
					<br/>
				   
							   </td>

							   <td valign="top">Comments</td>
							   <td><textarea name="comments" cols="30" rows="3"><?php echo $comments; ?></textarea></td>
							   
    </tr>
	
	
	  
	 
 
  
  

 

	
	

  <tr height="15" bgcolor="#FFFFCC">


    <td>&nbsp;</td>
    <td colspan="2" align="center"><input onClick="return confirmSave();" type="submit" name="submit" value="Update Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
    <td>&nbsp;</td>

   
 

  </tr>
  
  
  <tr height="90" bgcolor="#FFFFCC">


    <td>&nbsp;</td>
    <td colspan="2"><div id='start_invoice_errorloc' class='error_strings'></div></td>
   
    <td>&nbsp;</td>
   
 

  </tr>		
	</table>		

</form>