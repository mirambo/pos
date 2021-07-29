

    <?php
     include('Connections/fundmaster.php');
     
   $sub_cat12 = $_GET['parent_cat'];
     
   $query12 = mysql_query("select * from customer WHERE customer_id = {$sub_cat12}");
   $rows12=mysql_fetch_object($query12);
  
    
    ?>
	Customer Name: <input type="text" name="new_cus_name" size="20" value="<?php echo $rows12->customer_name; ?>" />
							
Phone No : <input type="text" name="new_cus_phone" size="20" value="<?php echo $rows12->phone; ?>"/>
Email Address : <input type="text" name="new_cus_email" size="20" value="<?php echo $rows12->email; ?>" />