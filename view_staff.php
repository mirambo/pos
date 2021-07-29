<?php 
include('Connections/fundmaster.php');
?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />
<script src="jquery.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="jquery-ui.css">

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
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

<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteuniversityconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
</table>
<DIV class=fakeContainer>
<table width="100%" border="0" class=demoTable id=demoTable>
 



	
 <tr  style="background:url(images/description.gif);" height="30" >
  <?php 
$sql="SELECT * FROM form_fields  order by sort_order asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
if (mysql_num_rows($results) > 0)
						  {
					 while ($rows=mysql_fetch_object($results))
							  { 

 ?>
 <td align="center" width="150"><strong><?php echo $rows->form_field_name;  $form_id=$rows->form_field_id; ?></strong></td>
 
 <?php 


	}
		
	}
	
	?>
	  
    </tr>

<?php
//loop results
$sqlp="SELECT * FROM hr_form_logs where form_id='1'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());
	if (mysql_num_rows($resultsp) > 0)
						  {
						    $RowCounter=0;
					 while ($rowsp=mysql_fetch_object($resultsp))
							  { 
							  $RowCounter++;
if($RowCounter % 2==0)
$data_id=$rowsp->data_id;
else 
{
echo '<tr bgcolor="#FFFFCC" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" 
              >';
}


$sql="SELECT * FROM form_fields order by sort_order asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
	if (mysql_num_rows($results) > 0)
						  {
						
					 while ($rows=mysql_fetch_object($results))
							  { ?>
	
<td onClick="document.location.href='home.php?editstaff=editstaff&emp_id=<?php echo $data_id=$rowsp->data_id;?>'">
<?php $form_id=$rows->form_field_id;
//to display information keyed in	
$sql2="SELECT * FROM hr_form_logs where form_id='$form_id' and data_id='$data_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);
echo $rows2->response;
	
	
	?></td></a>
	
	<?php 
	}
	
	}
	
	?>
	
	</tr>
	<?php
}

}
	?>
	
	
<tr></tr>	
  
  
</table>
<SCRIPT src="js/superTables.js" 
type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[

(function() {
	var mySt = new superTable("demoTable", {
		cssSkin : "sSky",
		fixedCols : 1,
		headerRows : 1,
		onStart : function () {
			this.start = new Date();
		},
		onFinish : function () {
			document.getElementById("testDiv").innerHTML += "Finished...<br>" + ((new Date()) - this.start) + "ms.<br>";
		}
	});
})();

//]]>
</SCRIPT>



</div>


