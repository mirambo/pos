<?php 
    include('Connections/fundmaster.php');
//basic invoice details
//$invoice_id=90;
//$invoice_ttl=0;

$mop_id = $_GET['mop_id'];

		  
if ($mop_id==3)
{
	?>
<table width="100%" align="center">	
<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Description:<font color="#FF0000"></font></td>
    <td valign="top"><input type="text" name="description" size="20" /></td>
							   <td valign="top">Client Bank<font color="#FF0000"></font></td>
							   <td valign="top"><input type="text" name="client_bank" size="20" /></td>
							   <!--<td valign="top">Date Transfered</td>
							    <td><input type="text" name="date_trans" size="40" id="date_trans" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>-->
								  <td colspan="4">Our Bank<select name="our_bank">
	                  <option>Sel Our Bank</option>
								  
										  
                                    <?php 
$sqlbnk="SELECT * FROM banks order by bank_name asc";
$resultsbnk= mysql_query($sqlbnk) or die ("Error $sqlbnk.".mysql_error()); 
if (mysql_num_rows($resultsbnk) > 0)
{
						while ($rowsbnk=mysql_fetch_object($resultsbnk))
							{						
								?>  
										  
                                    <option value="<?php echo $rowsbnk->bank_id;?>"><?php echo $rowsbnk->bank_name.' ('.$rowsbnk->account_name.')';?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
							   
    </tr>	 
 </table>
  
   

 
	
	<?php 
	
	
	
	
}

elseif ($mop_id==2)
{
	
?>	
<table width="100%" align="center">	
<tr height="20" bgcolor="#FFFFCC">

    <td valign="top">Description:<font color="#FF0000"></font></td>
	   <td valign="top"><textarea cols="24" rows="5"></textarea></td>
    <td valign="top"> Cheque Number <input type="text" required name="cheque_no" size="20" />Cheque Drawer <input required type="text" name="cheq_drawer" size="20" /></td>
							   <td valign="top"><font color="#FF0000"></font></td>
							
							   <!--<td valign="top">Date Transfered</td>
							    <td><input type="text" name="date_trans" size="40" id="date_trans" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>-->
								  <td colspan="4"></td>
							   
    </tr>	 
 </table>
	
	
<?php	
}


elseif ($mop_id==1 || $mop_id==4)
{
	
?>	
<table width="100%" align="center">	
<tr height="20" bgcolor="#FFFFCC">

    <td valign="top" align="right">Description:<font color="#FF0000"></font></td>
	   <td valign="top"><textarea cols="24" rows="5" name="desc"></textarea></td>
    
							   
    </tr>	 
 </table>
	
	
<?php	
}
