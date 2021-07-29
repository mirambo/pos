<?php 
include('Connections/fundmaster.php');


$sqlts="SELECT * FROM customer order by customer_id asc";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  echo $customer_id=$rowsts->customer_id;
						  echo $customer_name=$rowsts->customer_name;
						  echo $address=$rowsts->address;
						  echo $town=$rowsts->town;
						  echo $phone=$rowsts->phone;
						  echo $contact_person=$rowsts->contact_person;
						  echo $email=$rowsts->email;
						  					  
						  //echo $item_name=$rowsts->item_name;
						  
$sql= "insert into clients values('$customer_id', '$customer_name', '$address', '$town', '$c_street','$address',
 '$phone','$c_telephone','$contact_person','$email','$allow_add','$date_sent',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


						  
						  
						  
						  
						  
						  
						  }
						  
						  }










?>