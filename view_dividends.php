<?php 
include('Connections/fundmaster.php'); 

$need_del=$_POST['need_delete'];

// Check if delete button active, start this

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
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

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/sharessubmenu.php');  ?>
		
		<h3>:: List of all dividends and its allocations</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
<?php
 if (!isset($_POST['generate']))
{

?>			
<form name="search" method="post" action="">   
<?php 
include('bs_net_profit.php');	

?> 
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
<tr bgcolor="#FFFFCC" >
   
    <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	</td>
	
    </tr>	
  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="250"><strong>Shares Shareholder's Name</strong></td>
	<td align="center" width="150"><strong>Financial Year</strong></td>
	<td align="center" width="220"><strong>Total Dividents Collected (Kshs)</strong></td>
    
   
	<td align="center" width="200"><strong>Percentage Allocation (%)</strong></td>
    <td width="150" align="center"><strong>Dividend (Kshs.)</strong></td>

	<td width="150" align="center"><strong>Plough Back</strong></td>
		<!--<td width="100" align="center"><strong>Pay</strong></td>
    <td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php   
$sql="SELECT * FROM shares where status='0'";
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
   <td align="center"><?php echo $origfyid=$rows->financial_year_id; 
   
   echo $rows->start_fyear.' / '.$rows->end_fyear;?></td>

	<td align="right"><?php //echo $rows->start_fyear."/".$rows->end_fyear;
	
	echo number_format($net_pl,2);
	
	?></td>
	
	
	
	<td align="center"><?php echo number_format($perc=$rows->perc_shares,2);?></td>
	<td align="right">
	
	<?php 
	
	 $divident_amnt=$net_pl;
	 
	 $indiv_div=$perc/100*$divident_amnt;
	 
	 echo 	 number_format($indiv_div,2);
	 
  ?>
</td>
	
    

	<td align="center">
<?php 
/*$dividend_id=$rows->dividend_id;
$sqlred="SELECT * FROM ploughed_back_dividend where dividend_id='$dividend_id'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$rowsfyid=mysql_fetch_object($resultsred);

$fyid=$rowsfyid->financial_year_id;

if ($origfyid==$fyid)
{
echo "-";

}

else
{
	*/?>
	
	<a href="plough_back2.php?shares_id=<?php echo $rows->shares_id; ?>&dividend=<?php echo $indiv_div;?>&dividend_id=<?php echo $rows->dividend_id;?>&financial_year_id=<?php echo $rows->financial_year_id; ?>">Plough Back </a>
	<?php/*
	}
	
	*/?>
	</td>
	    <!--<td align="center">
	<?php 

/*if ($origfyid==$fyid)
{
echo "-";

}

else
{*/
	
?>

<a href="pay_dividend.php?shares_id=<?php echo $rows->shares_id;?>&dividend=<?php echo $indiv_div;?>&dividend_id=<?php echo $rows->dividend_id;?>&financial_year_id=<?php echo $rows->financial_year_id; ?>">Pay</a>
	
<?php 
	
//}
	
?>
	
	</td>-->
	<!--<td align="center"><a href="employee_det.php?emp_id=<?php echo $rows->emp_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="editemp.php?emp_id=<?php echo $rows->emp_id; ?>"><img src="images/delete.png"></a></td>-->
    </tr>
  <?php 
  $grnd_div=$grnd_div+$indiv_div;
  }
  
 ?>
  
  
  
  <tr  height="30" bgcolor="#FFFFCC">
  <td align="center" width="250"><strong>Grand Totals</strong></td>
	<td align="center" width="150"><strong></strong></td>
	<td align="center" width="220"><strong>Total Dividents Collected (Kshs)</strong></td>
    
   
	<td align="center" width="200"><strong></strong></td>
    <td width="150" align="right"><font color="#ff0000"><strong><?php echo number_format($grnd_div,2);  ?></strong></font></td>

	<td width="150" align="center"><strong></strong></td>
		 <!--<td width="100" align="center"><strong></strong></td>
   <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>-->
    </tr>
	
	<?php
                // Check if delete button active, start this
               
               
          

	
	
	
	
	
  
  }
  
  
  ?>
</table>

<?php


?>
		
</form>	

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>	

<?php 
}
else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];
if ($date_from!='' && $date_to!='')
{

?>			
	 <form name="search" method="post" action="">   
<?php 
include('bs_net_profit.php');	
?> 

	 
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
<tr bgcolor="#FFFFCC" >
   
    <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	</td>
	
    </tr>	
	
	<tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="6"><div align="center"><strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong></div></td>
  </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="250"><strong>Shares Shareholder's Name</strong></td>
	<td align="center" width="150"><strong>Financial Year</strong></td>
	<td align="center" width="220"><strong>Total Dividents Collected (Kshs)</strong></td>
    
   
	<td align="center" width="200"><strong>Percentage Allocation (%)</strong></td>
    <td width="150" align="center"><strong>Dividend (Kshs.)</strong></td>

	<td width="150" align="center"><strong>Plough Back</strong></td>
		<!--<td width="100" align="center"><strong>Pay</strong></td>
    <td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php   
$sql="SELECT * FROM shares where status='0'";
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
   <td align="center"><?php echo $origfyid=$rows->financial_year_id; 
   
   echo $rows->start_fyear.' / '.$rows->end_fyear;?></td>

	<td align="right"><?php //echo $rows->start_fyear."/".$rows->end_fyear;
	
	echo number_format($net_pl,2);
	
	?></td>
	
	
	
	<td align="center"><?php echo number_format($perc=$rows->perc_shares,2);?></td>
	<td align="right">
	
	<?php 
	
	 $divident_amnt=$net_pl;
	 
	 $indiv_div=$perc/100*$divident_amnt;
	 
	 echo 	 number_format($indiv_div,2);
	 
  ?>
</td>
	
    

	<td align="center">
<?php 
/*$dividend_id=$rows->dividend_id;
$sqlred="SELECT * FROM ploughed_back_dividend where dividend_id='$dividend_id'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$rowsfyid=mysql_fetch_object($resultsred);

$fyid=$rowsfyid->financial_year_id;

if ($origfyid==$fyid)
{
echo "-";

}

else
{
	*/?>
	
	<a href="plough_back2.php?shares_id=<?php echo $rows->shares_id; ?>&dividend=<?php echo $indiv_div;?>&dividend_id=<?php echo $rows->dividend_id;?>&financial_year_id=<?php echo $rows->financial_year_id; ?>">Plough Back </a>
	<?php/*
	}
	
	*/?>
	</td>
	    <!--<td align="center">
	<?php 

/*if ($origfyid==$fyid)
{
echo "-";

}

else
{*/
	
?>

<a href="pay_dividend.php?shares_id=<?php echo $rows->shares_id;?>&dividend=<?php echo $indiv_div;?>&dividend_id=<?php echo $rows->dividend_id;?>&financial_year_id=<?php echo $rows->financial_year_id; ?>">Pay</a>
	
<?php 
	
//}
	
?>
	
	</td>-->
	<!--<td align="center"><a href="employee_det.php?emp_id=<?php echo $rows->emp_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="editemp.php?emp_id=<?php echo $rows->emp_id; ?>"><img src="images/delete.png"></a></td>-->
    </tr>
  <?php 
  $grnd_div=$grnd_div+$indiv_div;
  }
  
 ?>
  
  
  
  <tr  height="30" bgcolor="#FFFFCC">
  <td align="center" width="250"><strong>Grand Totals</strong></td>
	<td align="center" width="150"><strong></strong></td>
	<td align="center" width="220"><strong>Total Dividents Collected (Kshs)</strong></td>
    
   
	<td align="center" width="200"><strong></strong></td>
    <td width="150" align="right"><font color="#ff0000"><strong><?php echo number_format($grnd_div,2);  ?></strong></font></td>

	<td width="150" align="center"><strong></strong></td>
		 <!--<td width="100" align="center"><strong></strong></td>
   <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>-->
    </tr>
	
	<?php
                // Check if delete button active, start this
               
               
          

	
	
	
	
	
  
  }
  
  
  ?>
</table>

<?php


?>
		
</form>	

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>	

<?php



}
else
{

?>			
<form name="search" method="post" action="">   
<?php 
include('bs_net_profit.php');	

?> 
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
<tr bgcolor="#FFFFCC" >
   
    <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	</td>
	
    </tr>	
  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="250"><strong>Shares Shareholder's Name</strong></td>
	<td align="center" width="150"><strong>Financial Year</strong></td>
	<td align="center" width="220"><strong>Total Dividents Collected (Kshs)</strong></td>
    
   
	<td align="center" width="200"><strong>Percentage Allocation (%)</strong></td>
    <td width="150" align="center"><strong>Dividend (Kshs.)</strong></td>

	<td width="150" align="center"><strong>Plough Back</strong></td>
		<!--<td width="100" align="center"><strong>Pay</strong></td>
    <td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php   
$sql="SELECT * FROM shares where status='0'";
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
   <td align="center"><?php echo $origfyid=$rows->financial_year_id; 
   
   echo $rows->start_fyear.' / '.$rows->end_fyear;?></td>

	<td align="right"><?php //echo $rows->start_fyear."/".$rows->end_fyear;
	
	echo number_format($net_pl,2);
	
	?></td>
	
	
	
	<td align="center"><?php echo number_format($perc=$rows->perc_shares,2);?></td>
	<td align="right">
	
	<?php 
	
	 $divident_amnt=$net_pl;
	 
	 $indiv_div=$perc/100*$divident_amnt;
	 
	 echo 	 number_format($indiv_div,2);
	 
  ?>
</td>
	
    

	<td align="center">
<?php 
/*$dividend_id=$rows->dividend_id;
$sqlred="SELECT * FROM ploughed_back_dividend where dividend_id='$dividend_id'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$rowsfyid=mysql_fetch_object($resultsred);

$fyid=$rowsfyid->financial_year_id;

if ($origfyid==$fyid)
{
echo "-";

}

else
{
	*/?>
	
	<a href="plough_back2.php?shares_id=<?php echo $rows->shares_id; ?>&dividend=<?php echo $indiv_div;?>&dividend_id=<?php echo $rows->dividend_id;?>&financial_year_id=<?php echo $rows->financial_year_id; ?>">Plough Back </a>
	<?php/*
	}
	
	*/?>
	</td>
	    <!--<td align="center">
	<?php 

/*if ($origfyid==$fyid)
{
echo "-";

}

else
{*/
	
?>

<a href="pay_dividend.php?shares_id=<?php echo $rows->shares_id;?>&dividend=<?php echo $indiv_div;?>&dividend_id=<?php echo $rows->dividend_id;?>&financial_year_id=<?php echo $rows->financial_year_id; ?>">Pay</a>
	
<?php 
	
//}
	
?>
	
	</td>-->
	<!--<td align="center"><a href="employee_det.php?emp_id=<?php echo $rows->emp_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="editemp.php?emp_id=<?php echo $rows->emp_id; ?>"><img src="images/delete.png"></a></td>-->
    </tr>
  <?php 
  $grnd_div=$grnd_div+$indiv_div;
  }
  
 ?>
  
  
  
  <tr  height="30" bgcolor="#FFFFCC">
  <td align="center" width="250"><strong>Grand Totals</strong></td>
	<td align="center" width="150"><strong></strong></td>
	<td align="center" width="220"><strong>Total Dividents Collected (Kshs)</strong></td>
    
   
	<td align="center" width="200"><strong></strong></td>
    <td width="150" align="right"><font color="#ff0000"><strong><?php echo number_format($grnd_div,2);  ?></strong></font></td>

	<td width="150" align="center"><strong></strong></td>
		 <!--<td width="100" align="center"><strong></strong></td>
   <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>-->
    </tr>
	
	<?php
                // Check if delete button active, start this
               
               
          

	
	
	
	
	
  
  }
  
  
  ?>
</table>

<?php


?>
		
</form>	

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>	

<?php 



}






}





?>  

			
			
			
					
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