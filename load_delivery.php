

    <?php
     include('Connections/fundmaster.php');
     
   $sub_cat12 = $_GET['parent_cat'];
     
   $query12 = mysql_query("select * from customer WHERE customer_id = {$sub_cat12}");
   $rows12=mysql_fetch_object($query12);
	$address=$rows12->customer_name."\n".$rows12->address."\n".$rows12->town."\n".$rows12->email."\n".$rows12->phone;
    
    ?>
	<textarea cols="30" rows="3" name="delivery_address"><?php echo $address; ?></textarea>