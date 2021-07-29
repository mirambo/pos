<?
/**
 * 
 */
 
   include("dbconnection.php");
   


$pagesection=1;
if(isset($_POST['savesummary']))
 //if(isset($_POST['subassociate2']))
  { 
  $start_date= $_POST['start_date'];
            $count = $_POST['txtcount'];
			
			$end_date =$_POST['end_date']; 
			
			
			
			 
			       if(! $form->num_errors > 0)
					     {
													for($i=0;$i<$count;$i++)
													   { 
														   $strIndicator_ID = $_POST['Indicator_ID'][$i]; 
														   $strproject_id = $_POST['txtproject_id'][$i]; 
														    $strtotal = $_POST['txttotal'][$i]; 
														   $strnarration = $_POST['txtnarration'][$i];
														   
														   
														    
														
																	if($strIndicator_ID!="")
																			{
																			
														  
	
																			  $sql = "insert into update_indicator set 
																						Indicator_ID ='$strIndicator_ID',
																						
																						start_date='$start_date',
																						end_date='$end_date',																				
																																												
																						project_id='$strproject_id',
																						total='$strtotal',
																						narration='$strnarration'";
																					
																			  //$result = mysql_query($sql); 
																			   if (@mysql_query($sql)) { ?>
																			                        <script type = "text/javascript">
                                        <!--
										  alert('Data Updated Successfully. Thankyou!');
										 // var myurl="home.php?submit_biweekly=submit_biweekly?>"
										 window.close()
							                //window.location.assign(myurl)
                                       // -->
                                       </script>  
																									<? }     	else
																												echo "error processing salary".mysql_error();
																												{  ?>
																												 <? }
																			} 
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
  <script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

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
  <title>All Employees Qualification Report</title>
  <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  <br />&nbsp;&nbsp;<br /> <table width="98%" border="0" cellspacing="0" cellpadding="5" align="center">
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
          <h4></span></h4></td>
        </tr>
        <tr valign="bottom" bgcolor="#E2E2F1"> 
          <td height="32" bgcolor="#FFFFFF"><tr valign="bottom" bgcolor="#E2E2F1"> 
              <td height="35" bgcolor="#eeeeee" class="style3"> 
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="style3"><table width="510" border="0">
  <tr>
    <td>Start Date</td>
    <td><span id="sprytextfield1">
      <input type="text" name="start_date" id="start_date" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
  </tr>
  <tr>
    <td>End Daate</td>
    <td><span id="sprytextfield2">
      <input type="text" name="end_date" id="end_date" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

              <table width='100%' border='0' cellpadding='3' cellspacing='0' bordercolorlight="#FFFFFF" bordercolordark="#123B95">
                      <tr>
					   <td width="17%" height="29" bgcolor='#eeeeee' class="ewTableHighlightRow">Sub Project Code</td>
                        <td width="17%" height="29" bgcolor='#eeeeee' class="ewTableHighlightRow">Competence</td>
						<td width="17%" height="29" bgcolor='#eeeeee' class="ewTableHighlightRow">indicator</td>
						<td width="17%" height="29" bgcolor='#eeeeee' class="ewTableHighlightRow">Target</td>
						<td height="29" colspan="3" bgcolor='#eeeeee' class="ewTableHighlightRow">Total Achieved</td>
                        <td height="29" colspan="3" bgcolor='#eeeeee' class="ewTableHighlightRow">Achieved</td>

<td height="29" colspan="3" bgcolor='#eeeeee' class="ewTableHighlightRow">Narration</td>

                </tr>
                <?
			  $sub_project_id=$_GET['sub_project_id'];
			
	           		$ppresc = @mysql_query("SELECT * from indicators,sub_projects where sub_projects.sub_project_id=indicators.sub_project_id and indicators.sub_project_id='$sub_project_id'    group   by Indicator_ID  DESC");	
	       			 
					  if (!$ppresc) {
									   exit('<p>Error displaying details Details: ' . mysql_error() . '</p>');
									}
						if(mysql_num_rows($ppresc) != 0)
						   { 
						   
						      
							 
							   
							   
							   
                            }	
									   while ($row = mysql_fetch_array($ppresc)) { 
									    $count = mysql_num_rows($ppresc);
							  
							   if ($i == 0)

{
$bgcolor = '#FFA500';
$i = 1;
} else {
$bgcolor = '#E0D6E1';
$i = '0';
}
									   
									   $project_id=$row['project_id']; 
									   $sub_project_id=$row['sub_project_id']; 
									   $sub_project_code=$row['sub_project_code']; 
									   $core_competency=$row['core_competency']; 
									   $Indicator_ID=$row['Indicator_ID']; 
									   
									   $job_title_code=$row['job_title_code'];  
									     
									   
									   
									   ?>
                <tr bordercolor='#FFFFFF' bgcolor='<? echo $bgcolor;?>'> 
                 <td><span class="style3"><input type="hidden" checked name="Indicator_ID[]" id="Indicator_ID[]" value="<?php echo $Indicator_ID; ?>"><?php echo $sub_project_code;?>
                   <input type="hidden" name="txtIndicator_ID[]" id="txtIndicator_ID[]"  value="<?php echo $Indicator_ID; ?>"/>
                 </span>&nbsp;<input name="txtproject_id[]" type="hidden" value="<?php echo $project_id; ?>" /></td>
				 <td><span class="style3"><? echo $core_competency; ?></span>&nbsp;</td>

				  <td><span class="style3"><? echo $row['indicator']; ?>&nbsp;</span>&nbsp;</td>  <td><font face='tahoma' size='2'> <span class="style3">
				 </span> 
                      <label>
                     <? echo $row['target']; ?>                      </label>
                  </font></td>
				 
                  <td colspan="3"><span class="style3">
                  <?php 
				   $ss=@mysql_query("Select sum(update_indicator.total) as total  from update_indicator where Indicator_ID='$Indicator_ID' group by Indicator_ID");
while($rr=mysql_fetch_array($ss))
{
	$total=$rr['total'];
	echo $total;
	
}
					  //echo displaypaysummary($core_competency);
				  
				  ?></span>&nbsp;</td>
                  <td colspan="3"><input type="text" name="txttotal[]" id="txttotal[]" />                    &nbsp;</td>
                  <td colspan="3"><span class="style3"><textarea name="txtnarration[]" cols="" rows=""></textarea></span>&nbsp;</td>
                </tr>
                <? } 
											   
											  
											  ?>
                <tr bordercolor='#FFFFFF' bgcolor='#f5f8f7'> 
                  <td colspan='5' align='center'><input name="txtcount" type="hidden" id="txtcount" value="<? echo $count; ?>">Total Records:<?php echo $count?> <input name="Finish" type="submit" class="style6" id="Finish" value="Save Record"><input type="hidden" name="savesummary" id="savesummary" value="1"></td>
                </tr>
              </table>
              </form>
              <script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "start_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "start_date"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "end_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "end_date"       // ID of the button
    }
  );
  
  
  
  </script>
            <span class="style3"><a href="javascript:window.print()">Print</a>... </span></td>
        </tr>
      </table>
    </form>
    &nbsp;</td>
  </tr>
</table>




<script type="text/javascript">
<!--
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"-1", validateOn:["blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
//-->
</script>
