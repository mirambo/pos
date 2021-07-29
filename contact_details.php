	<?php
$querycon = "SELECT * FROM employee_contacts where employee_id='$employee_id'";
$resultscon= mysql_query($querycon) or die ("Error $querycon.".mysql_error());
$rowscon=mysql_fetch_object($resultscon);	


$region_id=$rowscon->region_id;
$querycon2r = "SELECT * FROM region where region_id='$region_id'";
$resultscon2r= mysql_query($querycon2r) or die ("Error $querycon2r.".mysql_error());
$rowscon2r=mysql_fetch_object($resultscon2r);



$county_id=$rowscon->county_id;
$querycon2 = "SELECT * FROM county where county_id='$county_id'";
$resultscon2= mysql_query($querycon2) or die ("Error $querycon2.".mysql_error());
$rowscon2=mysql_fetch_object($resultscon2);


$sub_county_id=$rowscon->sub_county_id;

//$sub_county_id=$rowscon->sub_county_id;


$querycon23 = "SELECT * FROM sub_county where sub_county_id='$sub_county_id'";
$resultscon23= mysql_query($querycon23) or die ("Error $querycon23.".mysql_error());
$rowscon23=mysql_fetch_object($resultscon23);
/* 

$section_id=$rowscon->section_id; 

				  
$queryprof3="select * from people_section where section_id='$section_id'";
$resultsprof3=mysql_query($queryprof3) or die ("Error: $queryprof3.".mysql_error());	 
$rowsprof3=mysql_fetch_object($resultsprof3); 

$rowsprof3->section_name;


$neigh_id=$rowscon->neigh_id;
$querycon23n = "SELECT * FROM neighbourhood where neigh_id='$neigh_id'";
$resultscon23n= mysql_query($querycon23n) or die ("Error $querycon23n.".mysql_error());
$rowscon23n=mysql_fetch_object($resultscon23n);


$street_id=$rowscon->street_id;

$querycon2w = "SELECT * FROM streets where street_id='$street_id'";
$resultscon2w= mysql_query($querycon2w) or die ("Error $querycon2w.".mysql_error());
$rowscon23w=mysql_fetch_object($resultscon2w);
 */

	
	
	?>	
	
	
<script type="text/javascript">

function checkform2()
{  

var phone2=document.empf2.alternative_mobile.value;
var address=document.empf2.per_address.value;
var address2=document.empf2.po_address.value;
var code=document.empf2.po_code.value;
var city=document.empf2.city.value;
var email=document.empf2.oemail.value;
var email2=document.empf2.pemail .value;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  



if(isNaN(phone)||phone.indexOf(" ")!=-1)
           {
              alert("Mobile number should be numerical")
              return false; 
           }
  /*          if (phone.length < 10 || phone.length > 10)
           {
                alert("Mobile number should have 10 characters and above");
                return false;
           } */
           /* if (phone.charAt(0)!="0" || phone.charAt(1)!="7")
           {
                alert("Mobile number should start with 07");
                return false
           } */
           if(isNaN(phone2)||phone2.indexOf(" ")!=-1)
           {
              alert("Alternative mobile number should be numerical")
              return false; 
           } 
           

		   
		   
if (mailformat.test(email)==false)  
  {  
    alert("You have entered an invalid email address!")  
    return (false)
  } 
  if (mailformat.test(email2)==false && email2=='')  
  {  
    alert("You have entered an invalid email address!")  
    return (false)
  } 




 

} 
</script> 
<form name="empf2" action="process_add_contact_details.php?sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id; ?>" onsubmit="return checkform2()" enctype="multipart/form-data" method="post">		
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>"> 
<?php  
			  if (isset($_GET['successffff']))
				  
			  
              echo '<div class="alert alert-success alert-dismissible" style="width:97%; margin:10px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p align="center"><i class="icon fa fa-check"></i> 
                Record Saved Successful</p>
              </div>';

			  ?>  
<table width="98%" border="0" align="center" class="table_new" frame="box">
<tr><td colspan="5"><h1><?php $english_text9="Contact Details";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></h1></td></tr>



  <tr height="40">
     
    <td width="10%" align="right">
	
	<?php $english_text9="Province";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> : 
	

	
	
	</td>
    <td width="1%"><select name="region_id"  required id="region" class="form-control" style="width:100%; padding:5px;">
	<?php 

	
	if ($region_id==0)
	{
		?>
		
<option value="">Select Region</option>		
		<?php
		
	}
	else
	{
	
	?>
    <option value="<?php echo $region_id; ?>"><?php echo $region_name=$rowscon2r->region_name; ?></option>
	<?php 
	}
	

	$query_parent = mysql_query("SELECT * FROM region order by region_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
	
    <option value="<?php echo $row['region_id']; ?>"><?php echo $row['region_name']; ?></option>
    <?php endwhile;  ?>
	
     
</select></td>
 <td width="16%" align="right"><?php $english_text9="District";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> : </td>
 
 <td width="10%">
 <select name="county_id" required id="county" class="form-control" style="width:100%; padding:5px;">
	<?php 

	
	if ($county_id=='')
	{
		?>
		
<option value="">Select County</option>		
		<?php
		
	}
	else
	{
	
	?>
    <option value="<?php echo $county_id; ?>"><?php echo $county_name=$rowscon2->county_name; ?></option>
	<?php 
	}
	

 ?>
	    
</select>
 </td>

  </tr>
  
    <tr height="40">
     
    <td width="10%" align="right">
	
	<?php $english_text9="Location";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> : 
	

	
	
	</td>
    <td width="1%"><select name="sub_county_id" required id="subcounty" class="form-control" style="width:100%; padding:5px;">
	
	
	
	<?php
	if ($sub_county_id==0)
	{
		?>
	
	<option value=''>Select Sub-County</option>
	
	<?php 
	}
	else
	{
		
	?>
	
	<option value='<?php echo $sub_county_id; ?>'><?php echo $rowscon23->sub_county_name; ?></option>
	
	<?php	
		
	}
	
	?>
	
	
	</select></td>
 <td width="10%" align="right"></td>
 
 <td width="10%">
 
 </td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>


  
      <tr height="40">

    <td width="1%" align="right"><?php $english_text9="Mobile No";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> : <font color="#FF0000">*</font></td>
    <td width="10%"><div id='mobile_errorloc' class="error_strings"></div><input type="text" required value="<?php echo $rowscon->mobile_no; ?>" size="41"  name="mobile" class="form-control" style="width:100%; padding:5px;"></td>
        <td width="10%" align="right"><?php $english_text9="Alternative Mobile";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> : </td>
    <td width="10%"><input type="text"  size="41" value="<?php echo $rowscon->alternative_mobile_no; ?>" name="alternative_mobile" class="form-control" style="width:100%; padding:5px;"></td>

     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
  <tr height="30">
    <td width="20%" align="right"><?php $english_text9="Parmanent Address ";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> : </td>
    <td width="30%"><div id='adress_errorloc' class="error_strings"></div><input type="text" value="<?php echo $rowscon->permanent_address; ?>" size="41" name="per_address" class="form-control" style="width:100%; padding:5px;"></td>
    <td width="10%" align="right"><?php $english_text9="Postal Address";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> : </td>
    <td width="10%"><div id='padress_errorloc' class="error_strings"></div><input type="text" value="<?php echo $rowscon->postal_address; ?>" size="41" name="po_address" class="form-control" style="width:100%; padding:5px;"></td>
    

  </tr>
  <tr height="40">

    <td width="1%" align="right"><?php $english_text9="Postal Code";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> : <font color="#FF0000"></font></td>
    <td width="10%"><input type="text" size="41" class="form-control" style="width:100%; padding:5px;" value="<?php echo $rowscon->postal_code; ?>" name="po_code") 
   || event.which == 8 || event.which == 46'></td>
    <td width="10%" align="right"><?php $english_text9="Town ";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?> : </td>
    <td width="30%"><input type="text"  size="41" class="form-control" style="width:100%; padding:5px;" value="<?php echo $rowscon->city; ?>" name="city" ></td>

  </tr>

  <tr height="30">

    <td width="1%" align="right">Office Email : <font color="#FF0000"></font></td>
    <td width="10%"><div id='emp_adm_date_errorloc' class="error_strings"></div><input type="text" class="form-control" style="width:100%; padding:5px;" value="<?php echo $rowscon->office_mail; ?>" name="oemail"  size="41" id="adm_date"/></td>
    <td width="1%" align="right">Personal Email : <font color="#FF0000"></font></td>
    <td width="10%"><div id='emp_adm_date_errorloc' class="error_strings"></div><input type="text"  name="pemail" size="41" value="<?php echo $rowscon->personal_mail; ?>" class="form-control" style="width:100%; padding:5px;" /></td>
    <td width="10%"></td>
  </tr>
 <tr height="40">
 <td width="10%"></td>
 <td align="right""><input type="submit" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="<?php $english_text9="Save Details";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?>">
</td>
<td align="left" >
</td>
</tr>			
</table>		
</form>