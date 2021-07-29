<?php 
include('Connections/fundmaster.php'); 
$sales_code_id=$_GET['sales_code_id'];
$view=$_GET['view'];
//$cs=$_GET['cs'];
$sales_type=$_GET['sales_type'];
$sqllpdet="select sales_code.invoice_no,sales_code.sale_date,sales_code.terms,sales_code.currency,sales_code.date_generated,sales_code.curr_rate,
sales_code.user_id,sales_code.sales_code_id,sales_code.sales_rep_id,sales_code.client_id,clients.c_name,currency.curr_name FROM currency,clients,sales_code WHERE 
currency.curr_id=sales_code.currency and sales_code.client_id=clients.client_id AND sales_code.sales_code_id='$sales_code_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowsrec=mysql_fetch_object($resultslpdet);
$client_id=$rowsrec->client_id;

$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$curr_name=$rowsrec->curr_name;
$freight_charge=$rowsrec->freight_charge;
$shipper_name=$rowsrec->shipper_name;
$terms=$rowsrec->terms;
$mop=$rowsrec->sales_rep_id;

$sqltc="select * from mop where mop_id='$mop'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc);
$mop_name=$rowstc->mop_name;

?>

<form name="start_invoice" action="process_edit_sales_code.php?sales_code_id=<?php echo $sales_code_id;?>&view=<?php echo $view ?>&sales_type=<?php echo $sales_type ?>" method="post">	
<table width="100%" border="0">
   <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top">Client<font color="#FF0000"></font></td>
    <td width="15%" valign="top">
	

	
<select name="client"><option value="<?php echo $rowsrec->client_id;?>"><?php echo $rowsrec->c_name;?></option>
								  <?php
								  
								  $query1="select * from clients order by c_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->client_id; ?>"><?php echo $rows1->c_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select> <!--<a href="add_supplier.php?newsup=newsup">New Supplier</a>-->
	
	</td>
    <td width="10%" valign="top"><font color="#FF0000"></font>Mode Of Payment</td>
    <td width="10%" valign="top"><select name="mop">
	                  <option value="<?php echo $mop ?>"><?php echo $mop_name; ?></option>
								  
										  
                                    <?php 
$sqlmop="SELECT * FROM mop order by mop_name asc";
$resultsmop= mysql_query($sqlmop) or die ("Error $sqlmop.".mysql_error()); 
if (mysql_num_rows($resultsmop) > 0)
{
						while ($rowsmop=mysql_fetch_object($resultsmop))
							{						
								?>  
										  
                                    <option value="<?php echo $rowsmop->mop_id;?>"><?php echo $rowsmop->mop_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>	</td>
								  <td valign="top" width="10%">Currency<font color="#FF0000"></font></td>
								  <td valign="top" width="15%"><select name="currency">
<option value="<?php echo $currency; ?>"><?php echo $curr_name;?></option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM currency order by curr_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->curr_id;?>"><?php echo $rowscurr->curr_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>
								  
								
								  
								  </td>
								  
  </tr>

	
	
<tr height="15" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"></td>
   
    <td>Terms Of Payment</td>
    <td rowspan="3" valign="top"><textarea cols="30" rows="2" name="terms"><?php echo $terms;?></textarea></td>
   
 

  </tr>
	 
 
  
  

 

	
	

  <tr height="15" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Update Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
    <td>&nbsp;</td>
   
   
 

  </tr>

  
  
  <tr height="90" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div id='start_invoice_errorloc' class='error_strings'></div></td>
   
    <td>&nbsp;</td>

   
 

  </tr>		
	</table>		

</form>