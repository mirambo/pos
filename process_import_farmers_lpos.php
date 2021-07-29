<?php
include ('includes/session.php');
include('Connections/fundmaster.php'); 


//$conn = mysqli_connect("localhost","root","","family");

$date_imported=date('Y-m-d', time());

require_once('vendor/php-excel-reader/excel_reader2.php');

require_once('vendor/SpreadsheetReader.php');



$sql_m= "insert into imported_farmers_grn_code SET
imported_by='$user_id',
date_imported='$date_imported'";
$results_m= mysql_query($sql_m) or die ("Error $sql_m.".mysql_error());
$imported_farmers_grn_code_id=mysql_insert_id();



  
    
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  
  if(in_array($_FILES["file"]["type"],$allowedFileType))
  
  {

        $targetPath = 'farmers_uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
		
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          

                    echo $date_grn = mysql_real_escape_string($Row[0]);
					
					echo '----';
					//echo date("Y-m-d", strtotime($employee_id));
					//'-';
					
					
/* $var = $employee_id;
$date = str_replace('/', '-', $var);
echo date('Y-m-d', strtotime($date)); */


					
                   echo  $id_field_book = mysql_real_escape_string($Row[1]);
				   echo '---';
                   echo $number = mysql_real_escape_string($Row[2]);
					echo '---';
                  echo $client = mysql_real_escape_string($Row[3]);
					echo '----';
					
					echo $flower = mysql_real_escape_string($Row[4]);
					


					
					
					
					
					
					
					echo '----';
					
					echo $farmer = mysql_real_escape_string($Row[5]);
					
					echo '----';
					
					echo $area = mysql_real_escape_string($Row[6]);
					
$hodnxr="SELECT * FROM farmers_region WHERE farmer_region_name='$area'";
$result2xr = mysql_query($hodnxr) or die ("Error $hodnxr.".mysql_error());
$num_rowhodnxr=mysql_num_rows($result2xr);					
$rowhodnxr=mysql_fetch_object($result2xr);	

if ($num_rowhodnxr>0)
{
	
echo $region_id=$rowhodnxr->farmer_region_id;	
	
}
else
{
	
	
$sql_jb="INSERT INTO farmers_region SET 
farmer_region_name='$area'" or die(mysql_error());
$results_jb= mysql_query($sql_jb) or die ("Error $sql_jb.".mysql_error());
$region_id=mysql_insert_id();
	
	
	
}
					
					
					
					echo '----';
					
				echo $harvest = mysql_real_escape_string($Row[7]);
					
					echo '----';
					
	           echo $price_kg = mysql_real_escape_string($Row[8]);
					
					echo '----';
					
               echo $amount = mysql_real_escape_string($Row[9]);
					
					//echo '-';
					
					
					
$hodnx="SELECT * FROM items WHERE item_name LIKE '%$flower%'";
$result2x = mysql_query($hodnx) or die ("Error $hodnx.".mysql_error());
$num_rowhodnx=mysql_num_rows($result2x);					
$rowhodnx=mysql_fetch_object($result2x);	

if ($num_rowhodnx>0)
{
echo $item_id=$rowhodnx->item_id;	
	
}	

else
{
	
$sql_jb="INSERT INTO items SET 
item_name='$flower',
cat_id='9',
sub_cat_id='37',
curr_bp='$price_kg',
item_section='S'" or die(mysql_error());
$results_jb= mysql_query($sql_jb) or die ("Error $sql_jb.".mysql_error());

$item_id=mysql_insert_id();	
	
}	







$hodnxf="SELECT * FROM farmers WHERE farmer_name LIKE '%$farmer%'";
$result2xf = mysql_query($hodnxf) or die ("Error $hodnxf.".mysql_error());
$num_rowhodnxf=mysql_num_rows($result2xf);					
$rowhodnxf=mysql_fetch_object($result2xf);

if ($num_rowhodnxf>0)
{
echo $farmer_id=$rowhodnxf->farmer_id;	
	
}

else
{
	
$sql_jb="INSERT INTO farmers SET 
farmer_name='$farmer',
farmer_code='$number',
supplier_id='39',
farmer_region_id='$region_id'" or die(mysql_error());
$results_jb= mysql_query($sql_jb) or die ("Error $sql_jb.".mysql_error());

$farmer_id=mysql_insert_id();	
	
}



//////////////////generate farmers order

$currency=7;
$curr_rate=1;

$ref_no=$number;

$mop=1;
					
					
$sqlpo= "insert into order_code_get SET
supplier_id='39',
farmer_id='$farmer_id',
shipper_id='$ship_agency',
user_id='$user_id',
mop_id='$mop',
currency='$currency',
curr_rate='$curr_rate',
comments='$comments',
ref_no='$ref_no',
lpo_expiry_date='$expiry_date',
imported_farmers_grn_code_id='$imported_farmers_grn_code_id',
date_generated='$date_grn'";
$resultspo= mysql_query($sqlpo) or die ("Error $sqlpo.".mysql_error());
$order_code=mysql_insert_id();


$sqlpr= "insert into approved_lpo values('','$order_code','$user_id',NOW(),'0')";
$resultspr= mysql_query($sqlpr) or die ("Error $sqlpr.".mysql_error());

$sql3pr= "UPDATE order_code_get SET status='2' WHERE order_code_id='$order_code'";
$results3pr= mysql_query($sql3pr) or die ("Error $sql3pr.".mysql_error());

$tempnum=$order_code;
$year=date('Y');

if($tempnum < 10)
            {
              $lpo_no = "0000".$tempnum;
              //$lpo_no = $client_abrev.'/'.$month."/0000".$tempnum;
			   //echo $newnum;
			  
			  
            } 
			
			else if($tempnum < 100) 
			{
             $lpo_no = "000".$tempnum;
			 
			 //echo $newnum;
            } 
			
			else if($tempnum < 1000) 
			{
             $lpo_no = "00".$tempnum;
			 
			 //echo $newnum;
            }
			
						else if($tempnum < 10000) 
			{
             $lpo_no = "0".$tempnum;
			 
			 //echo $newnum;
            }
			
			
			else 
			{ 
			$lpo_no = $tempnum;
			
			//echo $newnum;
			}


$sqllpono="UPDATE order_code_get set lpo_no='$lpo_no' where order_code_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());



$query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;

$prod=$item_id;

$qnty=$harvest;
$vend_price=$price_kg;


$sqlp= "INSERT into purchase_order SET
order_code='$order_code',
product_id='$prod',
description='$description',
quantity='$qnty',
order_vat='$vat',
vendor_prc='$vend_price',
order_vat_value='$vat_value'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());




//$transaction2='Imported Order No: '.$lpo_no.' (Item : '.$flower.' ) GRN : '.$ref_no;

$transaction2='Imported <a href="begin_order.php?order_code='.$order_code.'">Order No : '.$lpo_no.' (Item : '.$flower.') GRN : '.$ref_no.'  </a>';

$memo2=$transaction2;

$order_amount=$vend_price*$qnty;

$transaction_code2='imprtfgrn'.$order_code;

$sqltransc="INSERT INTO supplier_transactions SET 
supplier_id='39',
farmer_id='$farmer_id',
transaction='$transaction2',
order_code='$order_code',
amount='$order_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_grn',
transaction_code='$transaction_code2'";
$resultstransc=mysql_query($sqltransc) or die ("Error $sqltransc.".mysql_error());
					
					
					
echo '</br>';
        
         }
		 
		 
		}	 
		 
	?>

<script type="text/javascript">
alert('Record Imported Successfully');
window.location = "view_imported_farmers_lpos.php";
</script>

<?php	 
		 
		 
		 
		 
		 
  }
  else
  { 

		
		
	?>

<script type="text/javascript">
alert('Sorry!! Invalid File Type. Upload Excel File');
window.location = "<?php $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php	
		
		
		
		
		
		
		
  }

?>




