<?
/**
 * 
 */
 
   include("dbconnection.php");
   


$pagesection=1;




 
  
  
  
 //this  updates the edited message
 if(isset($_POST['subassociate']))
  { 
            $count = $_POST['txtcount'];
			$jobtit_code= $_POST['txtsupplier']; 
									for($i=0;$i<$count;$i++){   
														  
														  $associd= $_POST['checkbox'][$i]; 
																				
																	if($associd!= "")
																			{
																			  $sql = "delete from jobtvsedu
																						where jobvseduid='$associd'";
																					
																			  //$result = mysql_query($sql); 
																			   if (@mysql_query($sql)) { ?>
																			                        <script type = "text/javascript">
                                        <!--
										  alert('Operation completed successfully.');
										  var myurl="javascript:history.go(-1)"
							                window.location.assign(myurl)
                                       // -->
                                       </script>  
																								<?	 }     	else
																												echo "Error Denying Rights".mysql_error();
																												{  ?>
																												 <? }
																			} 
														
         	}
  }
  ?><?
  if(isset($_POST['subdeleteskill']))
  { 
            $count = $_POST['txtcount'];
			$jobtit_code= $_POST['txtsupplier']; 
									for($i=0;$i<$count;$i++){   
														  
														  $associd= $_POST['checkbox2'][$i]; 
																				
																	if($associd!= "")
																			{
																			  $sql = "delete from jobtvsskill
																						where code='$associd'";
																					
																			  //$result = mysql_query($sql); 
																			   if (@mysql_query($sql)) { ?>
																			                        <script type = "text/javascript">
                                        <!--
										  alert('Operation completed successfully.');
										  var myurl="javascript:history.go(-1)"
							                window.location.assign(myurl)
                                       // -->
                                       </script>  
																								<?	 }     	else
																												echo "Error Denying Rights".mysql_error();
																												{  ?>
																												 <? }
																			} 
														
         	}
  }
  ?>
  <?
  if(isset($_POST['subdeleteworkexperience']))
  { 
            $count = $_POST['txtcount'];
			$jobtit_code= $_POST['txtsupplier']; 
									for($i=0;$i<$count;$i++){   
														  
														  $associd= $_POST['checkbox3'][$i]; 
																				
																	if($associd!= "")
																			{
																			  $sql = "delete from jobvsexperience
																						where experienceid='$associd'";
																					
																			  //$result = mysql_query($sql); 
																			   if (@mysql_query($sql)) { ?>
<script type = "text/javascript">
                                        <!--
										  alert('Operation completed successfully.');
										  var myurl="javascript:history.go(-1)"
							                window.location.assign(myurl)
                                       // -->
                                       </script>  
																								<?	 }     	else
																												echo "Error Denying Rights".mysql_error();
																												{  ?>
																												 <? }
																			} 
														
         	}
  }
  ?>
  
  <?
  if(isset($_POST['subdeletecertification']))
  { 
            $count = $_POST['txtcount'];
			$jobtit_code= $_POST['txtsupplier']; 
				
			
									for($i=0;$i<$count;$i++){   
														  
														  $associd= $_POST['checkbox4'][$i]; 
																				
																	if($associd!= "")
																			{
																			  $sql = "delete from jobvscertification
																						where certificationid='$associd'";
																					
																			  //$result = mysql_query($sql); 
																			   if (@mysql_query($sql)) { ?>
<script type = "text/javascript">
                                        <!--
										  alert('Operation completed successfully.');
										
										   var myurl="javascript:history.go(-1)"
							                window.location.assign(myurl)
                                       // -->
                                       </script>  
																								<?	 }     	else
																												echo "Error Denying Rights".mysql_error();
																												{  ?>
																												 <? }
																			} 
														
         	}
  }
  ?>
  <?
  if(isset($_POST['subdeletelanguage']))
  { 
            $count = $_POST['txtcount'];
			$jobtit_code= $_POST['txtsupplier']; 
									for($i=0;$i<$count;$i++){   
														  
														  $associd= $_POST['checkbox5'][$i]; 
																				
																	if($associd!= "")
																			{
																			  $sql = "delete from jobvslanguage
																						where languageid='$associd'";
																					
																			  //$result = mysql_query($sql); 
																			   if (@mysql_query($sql)) { ?>
<script type = "text/javascript">
                                        <!--
										  alert('Operation completed successfully.');
										  var myurl="javascript:history.go(-1)"
							                window.location.assign(myurl)
                                       // -->
                                       </script>  
																								<?	 }     	else
																												echo "Error Denying Rights".mysql_error();
																												{  ?>
																												 <? }
																			} 
														
         	}
  }
  ?>
  
  
<?
   if(isset($_POST['subupdate']))
  { 
            $count = $_POST['txtcount'];
			$strresponsibilityid = $_POST['txtoffice']; 
			$strgroupid = $_POST['txtcustomer']; 
			$strusername = $_POST['txtusername']; 
			$strstatus = $_POST['txtstatus']; 
			
			       if(! $form->num_errors > 0)
					     {
													for($i=0;$i<$count;$i++)
													   {   
														  
														  $associd =$_POST['checkbox'][$i]; 
														  
														
																	if( $associd != "")
																			{
																			  $sql = "UPDATE products set 
																						status ='$strstatus'
																						
																						 where ProductID='$associd'";
																					
																			  //$result = mysql_query($sql); 
																			   if (@mysql_query($sql)) { ?>
																			                        <script type = "text/javascript">
                                        <!--
										  alert('Successfully  Employee-Asset Disasociation. Thankyou!');
										  var myurl="index.php?dissassociateassetvsemployee=dissassociateassetvsemployee"
							                window.location.assign(myurl)
                                       // -->
                                       </script>  
																									<? }     	else
																												echo "error associating Asset to Employee".mysql_error();
																												{  ?>
																												 <? }
																			} 
														}
         	}
  }
  ?>

  <?php
/*
$accessLevels = array("0",authenticate_group($_SERVER['PHP_SELF'],$session->userlevel));
$validLevel = $session->userlevel; 
if(array_search($validLevel, $accessLevels)== false){
?>
   <? 
     echo "<html><body>
           
            You are not allowed to access this page.<a href='../index.php'>HOME</a>
	</body></html>";
	?>
<?php
}

if(array_search($validLevel, $accessLevels)== true)
{
*/
include("FusionCharts/Code/PHP/Includes/FusionCharts.php");
?>
  <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
  <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
  
  <style type="text/css">
<!--
.style3 {color: #000000}
-->
  </style>
  <link href="booth.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
<!--
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style7 {
	font-size: 12px;
	font-weight: bold;
}
.style9 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
-->
  </style>
  <style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.bodyTXT {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #666666;
}
.loginTXT {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #666666;
	height: 19px;
	vertical-align: middle;
	padding-top:0;
}
-->
  </style>
<style>
		BODY, TABLE, TH, TD, TR, FORM {font: 11px Tahoma,Arial,Helvetica,sans-serif; vertical-align: top}
		FORM {margin: 0px; padding: 0px}
		TEXTAREA, INPUT, SELECT, LABEL, BUTTON {font: 11px Tahoma,Arial,Helvetica,sans-serif}
		TD.label { text-align: right; vertical-align: middle}
		TABLE {border-collapse: collapse}
		TH {font: bold; background: #FFF3CB; border: 1px solid #D6D6D6; padding: 5px; text-align: center}
		.bordered {border: 1px solid #D6D6D6}
		.evenrow {background-color: #EFEFEF}
	</style>


<link href="styles.css" rel="stylesheet" type="text/css">
<STYLE type=text/css>
A {
	TEXT-DECORATION: none
}
A:link {
	COLOR: white; TEXT-DECORATION: none;
}
A:visited {
	COLOR:  white; TEXT-DECORATION: none;
}
A:hover {
	COLOR: red; FONT-FAMILY: Tahoma; font-style: normal; TEXT-DECORATION: underline; TEXT-TRANSFORM: none
}
.style24 {color: #FFFFFF}
.style25 {
	color: #000080;
	font-weight: bold;
}
.style27 {color: #FFFFFF; font-size: 14px; }
.style29 {c
<style type="text/css">
    @import url(calender/calendar-win2k-1.css);
.style5 {color: #FF0000}
.maincopy table tr td .style3 h2 {
	color: #000080;
}
.sdf {
	color: #000080;
}
.maincopy table tr td .style3 h1 {
	color: #FF8040;
}
.maincopy table tr td h4 .sdf {
	color: #00F;
}
.maincopy table tr td h4 .sdf {
	color: #00F;
}
.maincopy table tr td h2 .sdf {
	color: #0000A0;
}
</style>
  <title>All Employees Qualification Report</title><br />&nbsp;&nbsp;<br /> <table width="98%" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr> 
    <td width="1196" height="344" align="center" valign="top" class="maincopy" id=""> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          
          <td width="1184"> </td>
        </tr>
        <tr> 
          <td><span class="style3"><?php $sub_project_id=$_GET['sub_project_id'];
			
	           		$ppresc = @mysql_query("SELECT * from sub_projects where sub_project_id='$sub_project_id' ");	
	       			 
					  if (!$ppresc) {
									   exit('<p>Error displaying details Details: ' . mysql_error() . '</p>');
									}
						if(mysql_num_rows($ppresc) != 0)
						   { 
						   
						      			 
							   
							   
							   
                            }	
									   while ($row = mysql_fetch_array($ppresc))
									    { 
																			  
									    $count = mysql_num_rows($ppresc);
							  
							   if ($i == 0)

{
$bgcolor = '#FFA500';
$i = 1;
} else {
$bgcolor = '#E0D6E1';
$i = '0';
}
									   
			$sub_project_code=$row['sub_project_code']; 
									  
									   $sub_project_code=$row['sub_project_code']; 
			
			$sub_project_start_date=$row['sub_project_start_date']; 
			$sub_project_end_date=$row['sub_project_end_date']; 						
									   $sub_project_name=$row['sub_project_name']; 
						   
									     
									   
									   
										}?>
          <h1>Norwegian Refugee Council</h1></span><h2><hr color="#ff0000"><span class="sdf">Indicator</span>:<?php echo $sub_project_name;?></h2></span>
          <h4><span class="sdf">Start Date</span>:<?php echo $sub_project_start_date;?></h4>
          </span>
          <h4><span class="sdf">End date</span>:<?php echo $sub_project_start_date;?></h4>
          </span></td>
        </tr>
        <tr valign="bottom" bgcolor="#E2E2F1"> 
          <td height="32" bgcolor="#FFFFFF"><tr valign="bottom" bgcolor="#E2E2F1"> 
              <td height="35" bgcolor="#eeeeee" class="style3"> 
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="style3">
            </form>
            <span class="style3"><a href="javascript:window.print()">P</a> </span><?php
   //Create an XML data document in a string variable
   $strXML1  = "";
   $strXML1 .= "<graph xAxisName='Indicator' showValues='1' yAxisName='Percentage Complete'
   decimalPrecision='2'>";
   
  
	  
	    $sub_project_id=$_GET['sub_project_id'];
			
	           		
	   
	    $sql22=@mysql_query("SELECT * from indicators,sub_projects where sub_projects.sub_project_id=indicators.sub_project_id and indicators.sub_project_id='$sub_project_id'    group   by Indicator_ID  DESC
");	
	 
while($row22=mysql_fetch_array($sql22)){
                    
					 $count = mysql_num_rows($sql22);
					   
				$target=$row22['target'];
				$color4=$row22['status'];  
				//echo $color4;
									   $sub_project_id=$row22['sub_project_id']; 
									   $sub_project_code=$row22['sub_project_code']; 
									   $core_competency=$row22['core_competency']; 
									   $jobcard=$row22['advance']; 
									   $Indicator_ID=$row22['Indicator_ID']; 
									    $indicator=$row22['indicator']; 
									   $job_title_code=$row22['job_title_code'];  
									     								   
					 
				 

if ($i == 0)

{
$bgcolor = '#f5f8f7';
$i = 1;
} else {
$bgcolor = '#eeeeee';
$i = '0';
}
			  
					//$status=$row22['status'];
					//$customer_title=$row1[''];
					
				$ss=@mysql_query("Select sum(update_indicator.total) as total  from update_indicator where Indicator_ID='$Indicator_ID' group by Indicator_ID");
while($rr=mysql_fetch_array($ss))
{
	$mytotal=$rr['total'];
	$percentage=($mytotal/$target)*100;
		
}
					
	
   $strXML1 .= "<set name='$indicator' value='$percentage' color='$color4' />";
  }
   $strXML1 .= "</graph>";

   //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
   echo renderChartHTML("FusionCharts/Charts/FCF_Column3D.swf", "", $strXML1, "one", 1000, 300);
?></td>
        </tr>
      </table>
    </form>
    &nbsp;</td>
  </tr>
</table>




<script type="text/javascript">
<!--
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"-1", validateOn:["blur"]});
//-->
</script>
