<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>
<body onLoad="window.print();">
<table width="700" border="0" class="table" style="margin:auto;">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person; ?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>List Of Quotations</H2>
	
	</td>
	
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
  
     <td align="center" width="150"><strong>Quotation No</strong></td>   
    <td align="center" width="150"><strong>Date Generated</strong></td>
<td align="center" width="300"><strong>Customer Name</strong></td>  
<td align="center" width="200"><strong>Generate By</strong></td>  

    </tr>

<?php 
 $job_card_ttl=0;
 $inv_ttl=0;
 $gnd_bal=0;
 

 if (!isset($_POST['generate']))
{

$querydc="SELECT * FROM quote order by sales_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $sql.".mysql_error());
}
else
{
$supplier=$_POST['customer_name'];
$shop_id=$_POST['shop_id'];
echo $date_from=$_POST['from'];
echo $date_to=$_POST['to'];

$querydc= "SELECT * FROM quote";
    $conditions = array();
    if($supplier!='') 
	
	{
	
    $conditions[] = "quote.customer_name LIKE '%$supplier%'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = "quote.sale_date>='$date_from' AND quote.sale_date<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." order by sales_id desc";
    }
	else
	{	
	
$querydc="SELECT * FROM quote order by sales_id desc";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}

 
 


if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
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

  
   

<?php $job_card_id=$rows->sales_id;?>
    <td>
	<a style="font-weight:bold; color:#000; text-decoration:none;" href="generate_invoice.php?sales_id=<?php echo $rows->sales_id;?>">
	
	<?php echo $invoice_no=$rows->invoice_no;?></a></td>
    
  
    <td><?php echo $rows->sale_date;?></td>
    <td>
	<?php 
	 /* $customer_id=$rows->customer_id;
	
$sqllpdet="SELECT * from customer where customer_id='$customer_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet); */
	
	
	echo $rows->customer_name;?>
	
	
	</td>
    
    
	

	
	
	
	
<td>
	<i><font size="-2">
	<?php $staff=$rows->user_id;
$sqlst="SELECT * FROM  users where user_id='$staff'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	?>
	
	</font></i>
	
	</td>

	
   
    </tr>

  <?php 
  
  }
  
  ?>

  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr bgcolor="#FFFFCC" height="30"><td colspan="11" align="center"><font color="#ff0000"><strong>No Results found!!</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
  
  </table>
   </td></tr>	 
  
  
  
  
  
  
</table>
</body>


