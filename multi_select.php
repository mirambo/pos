<?php
    include ('Connections/fundmaster.php');

    $account_panel = mysql_query("SELECT * FROM customer where customer_id='2'")
            or die(mysql_error());
?>
<select name="event_country" id="event_country"  required />
<?php
            while($row1 = mysql_fetch_array( $account_panel )) 
    {
?>

        <option selected="selected" value="<?php echo $row1['customer_id']; ?>"><?php echo $row1['customer_name']; ?></option>

        <?php           
            $countries = mysql_query("SELECT * FROM suppliers ")
            or die(mysql_error());

            while($row = mysql_fetch_array( $countries )) 
            {
                echo "<option value='". $row['supplier_id'] ."'>". $row['supplier_name'] ."</option>";
            }   
                //echo "</select>";
        ?>

        <?php
        }
		?>
		</select>
		<?php
        mysql_close($connection);
        ?>