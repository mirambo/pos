<?php 

include('Connections/fundmaster.php'); 

$need_del=$_POST['need_delete'];

// Check if delete button active, start this

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>



<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to plough back and increase the shares capital?");
}

</script>

<script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#dcfac9';
    }
    else
    {
      tableRow.style.backgroundColor = '';
    }
  }
  
  $(document).ready(function() {

    $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});


 
  </script>


<body>
<form name="form1" method="post" action="">	
	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/sharessubmenu.php');  ?>
		
		<h3>:: View All Shareholders Withdrawals</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
		
<table width="100%" border="0" id="example">
  <tr bgcolor="#FFFFCC" >
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Dividend Ploughed Back Successfully!!</font></strong></p></div>';

if ($_GET['successpay']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Dividend Paid Successfully!!</font></strong></p></div>';

if ($_GET['exist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! This dividend has already been ploughed back</font></strong></p></div>';


?>	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="150"><strong>Shares Shareholder's Name</strong></td>
   <td align="center" width="300"><strong>Description</strong></td>
	<td align="center" width="150"><strong>Financial Year</strong></td>
	<!--<td align="center" width="220"><strong>Total Dividents Collected (Kshs)</strong></td>
    
   
	<td align="center" width="200"><strong>Percentage Allocation (%)</strong></td>-->
    <td width="150" align="center"><strong>Amount (Kshs.)</strong></td>

	<td width="150" align="center"><strong>Date Transacted</strong></td>
		<!--<td width="100" align="center"><strong>Pay</strong></td>
    <td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php   
//$sql="select financial_year.start_fyear,financial_year.end_fyear,dividends.dividend_amount from financial_year,dividends where dividends.financial_year_id=financial_year.financial_year_id";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$sql="SELECT withdrawn_dividends.dividend,withdrawn_dividends.description,withdrawn_dividends.transaction_date,shares.shares_id,shares.share_holder_name 
FROM shares,withdrawn_dividends where shares.shares_id=withdrawn_dividends.shares_id";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" 
              >';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" 
              >';
}
 
 
 ?>
    

<td><?php //echo $rows->start_fyear."/".$rows->end_fyear;
	
	echo $share_holder_name=$rows->share_holder_name;
	
	?></td>
	<td><?php //echo $rows->start_fyear."/".$rows->end_fyear;
	
	echo $desc=$rows->description;
	
	?></td>
   <td align="center"><?php $origfyid=$rows->financial_year_id; 
   
   echo $rows->start_fyear.' / '.$rows->end_fyear;?></td>

	
	
	
	
	
	<td align="right">
	
	<?php 
	
	 $divident_amnt=$rows->dividend;
	 
	 
	 
	 echo 	 number_format($divident_amnt,2);
	 
  ?>
</td>
	
    

	<td align="center">
	<?php 
	
	echo $rows->transaction_date;
	 
	 
	 
	
	 
  ?>

	</td>
	    
	
    </tr>
  <?php 
  $grnd_div=$grnd_div+$divident_amnt;
  }
  
 ?>
  
  
  
  <tr  height="30" bgcolor="#FFFFCC">
  <td align="center" ><strong>Grand Totals</strong></td>
	<td align="center" ><strong></strong></td>
	<td align="center" ><strong></strong></td>
	<td align="right" ><strong><?php echo  number_format($grnd_div,2); ?></strong></td>
	<td align="center" ><strong></strong></td>
    
   
	
    </tr>
	
	<?php
                // Check if delete button active, start this
               
               
          

	
	
	
	
	
  
  }
  
  
  ?>
</table>

<?php


?>
		
</form>			

			
			
			
					
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