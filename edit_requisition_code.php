<?php 
include('Connections/fundmaster.php'); 
$order_code=$_GET['order_code'];
$view=$_GET['view'];
$cs=$_GET['cs'];
$show_approve=$_GET['show_approve'];

////////////////////////prevent issuee requsition from adjustments
$sqlrec3="select COUNT(*) as ttl_req FROM requisition_item WHERE requisition_id='$order_code'";
$resultsrec3= mysql_query($sqlrec3) or die ("Error $sqlrec3.".mysql_error());	
$rowsrec3=mysql_fetch_object($resultsrec3);

echo $ttl_req=$rowsrec3->ttl_req;



$sqlrec4="select COUNT(*) as ttl_issue FROM issued_items WHERE requisition_id='$order_code'";
$resultsrec4= mysql_query($sqlrec4) or die ("Error $sqlrec4.".mysql_error());	
$rowsrec4=mysql_fetch_object($resultsrec4);

echo $ttl_issue=$rowsrec4->ttl_issue;


if ($ttl_reqttttttttttt!=$ttl_issueuuuuuuuuuu)
{
	
	?>
<script type="text/javascript">
alert('SORRY!! THIS REQUISITION HAS BEEN ISSUED IT CANNOT BE ADJUSTED');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php
	
}

else
{

$sqlrec="select * FROM requisition WHERE requisition_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$requested_by=$rowsrec->requested_by;
$shipper_id=$rowsrec->shipper_id;
$requisition_no=$rowsrec->requisition_no;
$ref_no=$rowsrec->ref_no;
$lpo_date=$rowsrec->date_generated;
$status=$rowsrec->status;
$comments=$rowsrec->comments;

$querysup="select * from users where user_id ='$requested_by'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


?>
<?php 
include('select_search.php');
?>

<link rel="stylesheet" type="text/css" href="style.css" />  

<form name="start_invoice" action="process_edit_requisition_code.php?order_code=<?php echo $order_code;?>&view=<?php echo $view ?>&show_approve=<?php echo $show_approve; ?>" method="post">	
<table width="100%" border="0">
   <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top" align="right">Date Requested <font color="#FF0000"></font></td>
    <td width="15%" valign="top">
	
<input type="text" name="date_from" id="date_from" required value="<?php echo $rowsrec->date_generated;?>" size="30" />	
	
	</td>
    <td width="10%" valign="top">Requested By</td>
    <td width="10%" valign="top"><select name="sup" required id="account_from" style="width:250px;">
	
<option value="<?php echo $requested_by; ?>"><?php echo $rowssupp->f_name; ?></option>
								  <?php
								  
								  $query1="select * from users order by f_name";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
								  <td valign="top" width="10%"><font color="#FF0000"></font></td>
								  <td valign="top" width="15%">
								  
								
								  
								  </td>
								  
  </tr>
  
   <tr height="20" bgcolor="#C0D7E5">

    <td width="15%" valign="top" align="right">Comments<font color="#FF0000"></font></td>
    <td width="15%" valign="top">
	
<textarea name="comments" cols="40" rows="2"><?php echo $comments;  ?></textarea>
	
	</td>
    <td width="10%" valign="top">Ref No</td>
    <td width="10%" valign="top"><input type="text" name="ref_no" size="20" value="<?php echo $ref_no; ?>" /></td>
								  <td valign="top" width="10%"><font color="#FF0000"></font></td>
								  <td valign="top" width="15%">
								  
								
								  
								  </td>
								  
  </tr>


  <tr height="50" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit"  value="Update Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
 

  </tr>
  
  
  <tr height="90" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div id='start_invoice_errorloc' class='error_strings'></div></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
 

  </tr>		
	</table>		

</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
  /*Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  */
  
  
  </script>
  
  <script>


$("#account_from").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>	

<?php 
}

?>